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
        $event->userId = self::getUser();
   
        if($event->save()){
            return redirect()->back()->with('success', 'Renginys sukurtas');
        }
    } 
    
    public function getEvents()
    {
        $data = Event::where('userId','=',self::getUser())->get();
        
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
    public function getGames($taskName = null, $taskType = null)
    {
        $data = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('events.userId','events.eventName', 'games.id', 'games.gameName') 
        ->get();
        
        

        return view('/loged/tasks/' . $taskName)->with('data', $data)->with('taskType', $taskType);
    }
    
    public function getGames2()
    {
        $data = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('events.userId', 'events.eventName', 'games.id', 'games.gameName', 'games.status')
        ->get();

        return view('/loged/startGame', ['data'=>$data]);
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

    public function getAllGames()
    {
        // $data = DB::table('events')
        //     ->select('events.eventName', 'games.gameName', 'tasks.question', 'tasks.id')
        //     ->join('games', 'games.eventId', '=', 'events.id')
        //     ->join('tasks', 'tasks.gameId', '=', 'games.id')
        //     ->get();

        $events = Event::where('userId','=', self::getUser())->get();
        $tasks = Task::all();


        $games = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('games.id', 'games.gameName')
        ->get();

        $tasks = DB::table('tasks')
        ->join('games', 'tasks.gameId', 'games.id')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('tasks.id', 'tasks.question')
        ->get();


        return view('/loged/delete', ['events'=>$events, 'games'=>$games, 'tasks'=>$tasks]);
    }
    public function getAllGames2()
    {
        // $data = DB::table('events')
        //     ->select('events.eventName', 'games.gameName', 'tasks.question', 'tasks.id')
        //     ->join('games', 'games.eventId', '=', 'events.id')
        //     ->join('tasks', 'tasks.gameId', '=', 'games.id')
        //     ->get();

        $events = Event::where('userId','=', self::getUser())->get();
        $tasks = Task::all();


        $games = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('games.id', 'games.gameName')
        ->get();

        $tasks = DB::table('tasks')
        ->join('games', 'tasks.gameId', 'games.id')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('tasks.id', 'tasks.question')
        ->get();


        return view('/loged/edit', ['events'=>$events, 'games'=>$games, 'tasks'=>$tasks]);
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
    public function startGame(Request $request)
    {  
        $gameId = $request->gameId;
        $active = Game::where('status', '=', 1)->first();
        if ($active === null) {
            DB::update('update games set status = ? where id = ?',[1, $gameId]);
            return redirect()->back()->with('success', 'Žaidimas paleistas');
        }
        else if($active !== null)
        {
           
            $game = Game::findOrFail($request->gameIdp);
            if($game->status === 1)
            {
                DB::update('update games set status = ? where id = ?',[0, $gameId]);
                return redirect()->back()->with('success', 'Žaidimas sustabdytas');
            }
            else
            {
                return redirect()->back()->with('error', 'Vienu metu gali būti paleistas tik vienas žaidimas');
            }
        } 
    }

    public function editEvent(Request $request)
    {
        $eventID = $request->event;
        $event = Event::findOrFail($eventID);

        if(Auth::check()){
            return view('loged/editEvent', ['event'=>$event]);
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function editGame(Request $request)
    {
        $gameID = $request->game;
        $game = Game::findOrFail($gameID);

        if(Auth::check()){
            return view('loged/editGame', ['game'=>$game]);
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

        $data = DB::table('tasks')
        ->join('answers', 'answers.taskId', 'tasks.id')
        ->where('tasks.id', '=', $taskID)
        ->select('answers.id', 'answers.answer')
        ->get();


        if(Auth::check()){
            if($task->type == 1 || $task->type == 2 || $task->type == 3)
            {
                return view('loged/editTask1', ['data'=>$data, 'taskId'=>$taskID, 'question'=>$taskQuestion]);
            }
            if($task->type == 4 || $task->type == 5 || $task->type == 6)
            {
                return view('loged/editTask2', ['data'=>$data, 'taskId'=>$taskID, 'question'=>$taskQuestion, 'time'=>$taskTime]);
            }
            
                
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }

    public function updateEvent(Request $request)
    {
        $chk = DB::update('update events set eventName = ? where id = ?',[$request->eventName,$request->eventId]);
        
        if($chk){
            return redirect('loged/edit')->with('success', 'Naujas renginio pavadinimas išsaugotas');
        }
    }
    public function updateGame(Request $request)
    {
        $chk = DB::update('update games set gameName = ? where id = ?',[$request->gameName,$request->gameId]);
        
        if($chk){
            return redirect('loged/edit')->with('success', 'Naujas žaidimo pavadinimas išsaugotas');
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
        }
        
        $answerId = $request->answerId;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store(
                'photos', 'public'
            );
            $taskUrl = $path;
        }else {
            $taskUrl = '/';
        }
        $data = json_decode($data, true);
        
        
        DB::update('update tasks set question = ?,  answerId = ?, url = ? where id = ?',[$request->question, $answerId, $taskUrl, $taskID]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput1, $data[0]['id']]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput2, $data[1]['id']]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput3, $data[2]['id']]);
        DB::update('update answers set answer = ? where id = ?' , [$request->answerInput4, $data[3]['id']]);
        DB::update('update tasks set answerId = ? where id = ?' , [$answerId, $taskID]);

        return redirect('loged/edit')->with('success', 'Užduotis išsaugota');
    }
   
    // updating temp. id
    



}
