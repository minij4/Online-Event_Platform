<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\Task;
use App\Models\Answer;
use App\Models\Player;

use App\Events\CheckPlayerPost;

class GameController extends Controller
{
    public function waitingRoom(Request $request)
    {
        $players= Player::orderBy('score', 'desc')->get();

        if(Session::get('nickname')) {
            if(Player::where('username','=', Session::get('nickname'))->first())
            {

                return view('/waitingRoom')->with('players', $players);
            } else {
                return view('/waitingRoom');
            }
        } else {
            return redirect('/');
        }
    }
    public function loadingScores()
    {
        return view('/loadingScores');

    }
    public function game()
    { 
        if(Session::get('nickname')) {
            return redirect('waitingRoom');
        }
        return view('/game');
    }
    public function loadGame(Request $request)
    { 
        if(Session::get('nickname')) {
            //DB::table('players')->update(['score' => 0]);
            
            if(Game::where('status','=', 1)->first()) {
                $game = Game::where('status','=', 1)->first();
                $gameId = $game->id;

                if(Session::get('gameId')) {
                    $request->session()->forget('gameId');
                } 
                session()->put('gameId', $gameId);

                DB::update('update tasks set status = ? where gameId = ?' , [1, $gameId]);

                $tasks = Task::where('status', 1)->get();
                $tasks = collect($tasks);
                
                session()->put('tasks', $tasks);

                return redirect('task');
            }
        }

        /// Kodas po etapo
        ///////////////////

        $username = Session::get('nickname');
        $score = Session::get('score');

        $player = new Player;
        $player->username = $username;
        $player->score = $score;
        $player->save();

        //Player::where('score', 0)->delete();

        if($player){
            Session::forget('score');
            Session::put('score', 0);
        
            return redirect('/loadingScores');
        }

    }
    public function task(Request $request)
    { 
        if(Session::get('nickname')) {
            $game = Game::where('id','=', Session::get('gameId'))->first();
            $gameId = $game->id;

            if(Session::get('tasks')->first())
            {
                $tasks = Session::get('tasks');
                $task = $tasks->first();
                $taskId = $task->id;
                $taskType = $task->type;

                $answerId = $task->answerId;
                $Answer = Answer::where('id','=', $answerId)->first();

                $answer = $Answer->answer;

                $answers = Answer::where('taskId','=', $taskId)->get();

                $tasks->shift();
               

                $request->session()->forget('tasks');
                
                session()->put('tasks', $tasks);


                return view('task')
                    ->with('game', $game)
                    ->with('task', $task)
                    ->with('taskType', $taskType)
                    ->with('answers', $answers)
                    ->with('answer', $answer)
                    ->with('answerId', $answerId);

            } else {
                DB::update('update games set status = ? where id = ?' , [0, $gameId]);
                DB::update('update tasks set status = ? where gameId = ?' , [0, $gameId]);
                $request->session()->forget('tasks');

                return redirect('/loadGame');
            }
        }
        return view('/game');
    }
    public function postPlayer(Request $request)
    {
        //$img = time()."_".$request->photo->getClientOriginalName();
        //$hobbies = implode(',', $request->hobbies);
        //$request->photo->move(public_path('uploads'), $img);

        $nickname = $request->nickname;
    
        if($nickname){
            Session::put('nickname', $nickname);
            Session::put('score', 0);

            $player = new Player;
            $player->username = $nickname;
            $player->save();
            event(new CheckPlayerPost("New player posted"));

            
            return redirect('waitingRoom');
        } else {
            return redirect()->back()->with('error', 'Vardas užimtas');
        }
    }

    public function sessionDelete(Request $request)
    {
        if($request->session()->has('nickname'))
        {
            event(new CheckPlayerPost("Player was deleted"));
            Player::where('username', Session::get('nickname'))->delete();

            $request->session()->flush();
        }
        return redirect('/');
    }
}
