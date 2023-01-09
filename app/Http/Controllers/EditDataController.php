<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Event;
use App\Models\Game;
use App\Models\Task;

class EditDataController extends Controller
{
    public function editEvent(Request $request)
    {
        $eventID = $request->event;

        $event = Event::findOrFail($eventID);

        if(Auth::check()){
            return view('loged/editEvent', ['event'=>$event]);
        }
  
        return  redirect()->with('error', 'You are not loged in!');
    }
    public function editGame(Request $request)
    {
        $gameID = $request->game;
        $game = Game::findOrFail($gameID);

        $eventID = $game->eventId;
        $event = Event::where('id','=', $eventID)->first();

        if(Auth::check()){
            return view('loged/editGame', ['game'=>$game, 'event'=>$event]);
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function editTask(Request $request)
    {
        $taskID = $request->task;
        $task = Task::findOrFail($taskID);
        $taskQuestion = $task->question;
        $taskTime = $task->time;
        $taskFile = $task->url;
        $answerId = $task->answerId;

        $data = DB::table('tasks')
        ->join('answers', 'answers.taskId', 'tasks.id')
        ->where('tasks.id', '=', $taskID)
        ->select('answers.id', 'answers.answer')
        ->get();
    


        if(Auth::check()){
            if($task->type == 1 || $task->type == 2 || $task->type == 3)
            {
                return view('loged/editTask1', ['data'=>$data, 'type'=>$task->type, 'taskId'=>$taskID, 'taskFile'=>$taskFile, 'answerId'=>$answerId, 'question'=>$taskQuestion]);
            }
            if($task->type == 4 || $task->type == 5 || $task->type == 6)
            {
                return view('loged/editTask2', ['data'=>$data, 'type'=>$task->type, 'taskId'=>$taskID, 'taskFile'=>$taskFile, 'answerId'=>$answerId, 'question'=>$taskQuestion, 'time'=>$taskTime]);
            }
            
                
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
}
