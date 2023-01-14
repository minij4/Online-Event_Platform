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

        $url = $request->url;

        if($task->type == 4 || $task->type == 5) {
            
            if(strpos($url, "watch?v=")) {
                $url = str_replace("watch?v=", "embed/", $url);
            }
            if(strpos($url, "&ab_channel=")) {
                $url = substr($url, 0, strpos($url, "&ab_channel="));
            }
            
            // https://www.youtube.com/watch?v=S3Dpfyc15qQ&ab_channel=IntroAndOutro
            // to : 
            // https://www.youtube.com/embed/S3Dpfyc15qQ?autoplay=1&controls=0

            if(!strpos($url, "?autoplay=1&controls=0")){
                $url = $url . "?autoplay=1&controls=0";
            }
            $task->url = $url;
        } else {
                    //DROPBOX
                    // https://www.dl.dropboxusercontent.com/s/k9dyyxm91pu63ci/1200px-Flag_of_Spain.svg.png?dl=0
                    // https://www.dropbox.com/s/k9dyyxm91pu63ci/1200px-Flag_of_Spain.svg.png?dl=0                  
            $task->url = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $url);
        }
        
        $task->save();

        $taskID = $task->id;
     
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
