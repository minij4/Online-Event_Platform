<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Event;
use App\Models\Game;
use App\Models\Task;
use App\Models\Answer;


class PostDataController extends Controller
{
    public function getUser()
    {
        return auth()->user()->id;
    }

    public function postEvent(Request $request)
    {  
        //$img = time()."_".$request->photo->getClientOriginalName();
        //$hobbies = implode(',', $request->hobbies);
        //$request->photo->move(public_path('uploads'), $img);

        $event = new Event;
        $event->eventName = $request->eventName;
        $event->stages = $request->stages;
        $event->userId = self::getUser();
   
        if($event->save()){
            return redirect()->back()->with('success', 'Renginys sukurtas');
        }
    }

    public function postGame(Request $request)
    {  
        $game = new Game;
        $id = $request->eventName;
        $game->eventId = $id;
        $game->stage = $request->input("". $id); //cause different inputs...
        $game->gameName = $request->gameName;
        

        if($game->save()){
            return redirect()->back()->with('success', 'Žaidimas sukurtas');
        }
    }

    public function postTask(Request $request)
    {
        // post task
        $task = new Task;
        $task->gameId = $request->gameId;
        $task->type = $request->taskType;

        if($request->time){
            $task->time = $request->time;
        }
        $task->question = $request->question;
        $task->answerId = $request->answerRadioId;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store(
                'photos', 'public'
            );
            $task->url = $path;
        }

        // asset('storage/avatars/avatar.jpg');
        $task->save();

        // task id
        $taskID = $task->id;
        //

        //post answers 

        $answer1 = new Answer;
        $answer1->taskId = $taskID;
        $answer1->answer = $request->answerInput1;
        $answer1->save();

        $answer2 = new Answer;
        $answer2->taskId = $taskID;
        $answer2->answer = $request->answerInput2;
        $answer2->save();

        $answer3 = new Answer;
        $answer3->taskId = $taskID;
        $answer3->answer = $request->answerInput3;
        $answer3->save();

        $answer4 = new Answer;
        $answer4->taskId = $taskID;
        $answer4->answer = $request->answerInput4;
        $answer4->save();

        // updating temp. id
        if($task->answerId == 1)
        {
            DB::update('update tasks set answerId = ? where id = ?',[$answer1->id,$taskID]);
            return redirect()->back()->with('success', 'Užduotis sukurta');
        } 
        else if($task->answerId == 2)
        {
            DB::update('update tasks set answerId = ? where id = ?',[$answer2->id,$taskID]);
            return redirect()->back()->with('success', 'Užduotis sukurta');
        }
        else if($task->answerId == 3)
        {
            DB::update('update tasks set answerId = ? where id = ?',[$answer3->id,$taskID]);
            return redirect()->back()->with('success', 'Užduotis sukurta');
            
        }
        else if($task->answerId == 4)
        {
            DB::update('update tasks set answerId = ? where id = ?',[$answer4->id,$taskID]);
            return redirect()->back()->with('success', 'Užduotis sukurta');
            
        }
    }
}
