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
    public function loadGame()
    { 
        if(Session::get('nickname')) {
            if(Game::where('status','=', 1)->first()) {
                $game = Game::where('status','=', 1)->first();
                $gameId = $game->id;
    
                DB::update('update tasks set status = ? where gameId = ?' , [1, $gameId]);
    
                
                return redirect('task');
            }
        }
        /// Kodas po etapo
        ///////////////////
        return view('/game');
    }
    public function task()
    { 
        if(Session::get('nickname')) {
            $game = Game::where('status','=', 1)->first();
            $gameId = $game->id;


            if(Task::where('status','=', 1)->first())
            {
                $task = Task::where('status','=', 1)->first();
                $taskId = $task->id;
                $taskType = $task->type;

                $answers = Answer::where('taskId','=', $taskId)->get();


                DB::update('update tasks set status = ? where id = ?' , [0, $taskId]);

                return view('task')->with('game', $game)->with('task', $task)->with('taskType', $taskType)->with('answers', $answers);
            } else {
                DB::update('update games set status = ? where id = ?' , [0, $gameId]);

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
