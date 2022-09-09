<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UpdateDataController extends Controller
{
    public function updateEvent(Request $request)
    {
        $chk = DB::update('update events set eventName = ?, stages = ?  where id = ?',[$request->eventName, $request->stages, $request->eventId]);
        
        if($chk){
            return redirect('loged/edit')->with('success', 'Nauji duomenys išsaugoti');
        }
    }
    public function updateGame(Request $request)
    {
        $chk = DB::update('update games set gameName = ?, stage = ? where id = ?',[$request->gameName, $request->stage, $request->gameId]);
        
        if($chk){
            return redirect('loged/edit')->with('success', 'Nauji duomenys išsaugoti');
        }
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

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store(
                'photos', 'public'
            );
            DB::update('update tasks set url = ? where id = ?' , [$path, $taskID]);
        }

        $data = json_decode($data, true);
        
        
        $chk = DB::update('update tasks set question = ?,  answerId = ? where id = ?',[$request->question, $answerId, $taskID]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput1, $data[0]['id']]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput2, $data[1]['id']]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput3, $data[2]['id']]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput4, $data[3]['id']]);
        
        if($chk) {
            return redirect('loged/edit')->with('success', 'Užduotis išsaugota');
        } else {
            return redirect()->back()->with('error', 'Užduotis neišsaugota, užpildykite visus duomenis');
        }
    }
}
