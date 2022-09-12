<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\Task;
use App\Models\Answer;

use App\Events\CheckStatus;

class GameController extends Controller
{
    public function waitingRoom()
    {
        if(Session::get('nickname')) {

            return view('/waitingRoom');
        }
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
        return redirect('/waitingRoom');
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

                ///
                $answerId = $task->answerId;
                $answer = Answer::select('answer')->where('id','=', $answerId)->first();


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
                // bug
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
            session()->put('nickname', $nickname);
            session()->put('score', 1500);
            return redirect('waitingRoom');
        } else {
            return redirect()->back()->with('error', 'Vardas užimtas');
        }
    }

    public function sessionDelete(Request $request)
    {
        if($request->session()->has('nickname'))
        {
            $request->session()->flush();
        }
        return redirect('/');
    }
}
