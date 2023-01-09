<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UpdateDataController extends Controller
{
    public function updateEvent(Request $request)
    {
        if($request->eventName && $request->stages && $request->eventId)
        {
            DB::update('update events set eventName = ?, stages = ?  where id = ?',[$request->eventName, $request->stages, $request->eventId]);

            return redirect('loged/edit')->with('success', 'Nauji duomenys išsaugoti!');
        } else {
            return redirect('loged/edit')->with('error','Ne visi duomenys suvesti!');
        }
    }
    public function updateGame(Request $request)
    {
        if($request->gameName && $request->stage && $request->gameId)
        {
            DB::update('update games set gameName = ?, stage = ? where id = ?',[$request->gameName, $request->stage, $request->gameId]);

            return redirect('loged/edit')->with('success', 'Nauji duomenys išsaugoti!');
        } else {
            return redirect('loged/edit')->with('error','Ne visi duomenys suvesti!');
        }

        //pataisyti errorą 
    }
    public function updateTask(Request $request)
    {
        $taskID = $request->taskId;

        $data = DB::table('tasks')
        ->join('answers', 'answers.taskId', 'tasks.id')
        ->where('tasks.id', '=', $taskID)
        ->select('answers.id', 'answers.answer')
        ->get();

        if($request->time){
            $taskTime = $request->time;
            DB::update('update tasks set time = ? where id = ?' , [$taskTime, $taskID]);
        }
        
        $answerId = $request->answerId;

        $url1 = $request->url;
        

        $type = $request->type;

        if($type == 4 || $type == 5) {
            
            $url = str_replace("watch?v=", "embed/", $url1);
            $url = substr($url, 0, strpos($url, "&ab_channel="));

            // https://www.youtube.com/watch?v=S3Dpfyc15qQ&ab_channel=IntroAndOutro
            // to : 
            // https://www.youtube.com/embed/S3Dpfyc15qQ?autoplay=1&controls=0
            if(!substr($url, 0, strpos($url, "?autoplay=1&controls=0"))){
                $url = $url . "?autoplay=1&controls=0";
            }
        } else {
            $url = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $url1);
        }

        
        $data = json_decode($data, true);

       
        if($url && $request->question && $answerId && $taskID && $request->answerInput1 
            && $request->answerInput2 && $request->answerInput3 && $request->answerInput4)
        {
            DB::update('update tasks set url = ? where id = ?' , [$url, $taskID]);

            DB::update('update tasks set question = ?,  answerId = ? where id = ?',[$request->question, $answerId, $taskID]);
            DB::update('update answers set answer = ? where id = ?' , [$request->answerInput1, $data[0]['id']]);
            DB::update('update answers set answer = ? where id = ?' , [$request->answerInput2, $data[1]['id']]);
            DB::update('update answers set answer = ? where id = ?' , [$request->answerInput3, $data[2]['id']]);
            DB::update('update answers set answer = ? where id = ?' , [$request->answerInput4, $data[3]['id']]);
            
            return redirect('loged/edit')->with('success', 'Nauji duomenys išsaugoti!');
        } else {
            return redirect('loged/edit')->with('error','Ne visi duomenys suvesti!');
        }
    }
}
