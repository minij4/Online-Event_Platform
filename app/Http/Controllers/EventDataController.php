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

class EventDataController extends Controller
{
    public function postEvent(Request $request)
    {  
        //$img = time()."_".$request->photo->getClientOriginalName();
        //$hobbies = implode(',', $request->hobbies);
        //$request->photo->move(public_path('uploads'), $img);

        $event = new Event;
        $event->eventName = $request->eventName;
   
        if($event->save()){
            return redirect()->back()->with('success', 'Renginys sukurtas');
        }
    } 
    
    public function getEvents()
    {
        $data = Event::all();

        return view('/loged/createGame', ['data'=>$data]);
    }
    
    public function postGame(Request $request)
    {  
        $game = new Game;
        $game->eventId = $request->eventName;
        $game->gameName = $request->gameName;
        

        if($game->save()){
            return redirect()->back()->with('success', 'Žaidimas sukurtas');
        }
    } 

    public function getGames()
    {
        $data = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')->select('events.eventName', 'games.id', 'games.gameName') ->get();

        return view('/loged/tasks/photoBlur', ['data'=>$data]);
    }
    public function getGames2()
    {
        $data = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')->select('events.eventName', 'games.id', 'games.gameName') ->get();

        return view('/loged/startGame', ['data'=>$data]);
    }


    public function postTask(Request $request)
    {
        // post task
        $task = new Task;
        $task->gameId = $request->gameId;
        $task->question = $request->question;
        $task->answerId = $request->answerRadioId;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->storeAs(
                'photos',
                Auth::id() . '.' . $request->file('file')->getClientOriginalExtension(),
                'public',
            );
            $task->url = $path;
        }
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

        // updating temp. id
        if($task->answerId == 1)
        {
            DB::update('update tasks set answerId = ? where id = ?',[$answer1->id,$taskID]);
            return redirect()->back()->with('success', 'Užduotis sukurtas');
        } 
        else if($task->answerId == 2)
        {
            DB::update('update tasks set answerId = ? where id = ?',[$answer2->id,$taskID]);
            return redirect()->back()->with('success', 'Užduotis sukurtas');
        }
        else if($task->answerId == 3)
        {
            DB::update('update tasks set answerId = ? where id = ?',[$answer3->id,$taskID]);
            return redirect()->back()->with('success', 'Užduotis sukurtas');
            
        }
    }

    public function getAllGames()
    {
        // $data = DB::table('events')
        //     ->select('events.eventName', 'games.gameName', 'tasks.question', 'tasks.id')
        //     ->join('games', 'games.eventId', '=', 'events.id')
        //     ->join('tasks', 'tasks.gameId', '=', 'games.id')
        //     ->get();

        $events = Event::all();
        $games = Game::all();
        $tasks = Task::all();


        return view('/loged/delete', ['events'=>$events, 'games'=>$games, 'tasks'=>$tasks]);
    }


    public function deleteEvent(Request $request)
    {  
        $event = Event::findOrFail($request->event);

        if($event->delete()){
            return redirect()->back()->with('success', 'Renginys ištrintas');
        }
    } 
    public function deleteGame(Request $request)
    {  
        $game = Game::findOrFail($request->game);

        if($game->delete()){
            return redirect()->back()->with('success', 'Žaidimas ištrintas');
        }
    } 
    public function deleteTask(Request $request)
    {  
        $task = Task::findOrFail($request->task);

        if($task->delete()){
            return redirect()->back()->with('success', 'Užduotis ištrinta');
        }
    }


    
}
