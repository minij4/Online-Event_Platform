<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\Game;
use App\Models\Task;
use App\Models\Answer;

class GetDataController extends Controller
{
    // used in this controller
    public function getUser()
    {
        return Auth::id();
    }
    public function getEvents()
    {
        $events = Event::where('userId','=', self::getUser())->get();
        return $events;
    }
    public function getGames()
    {
        $games = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('events.userId', 'events.eventName', 'games.eventId', 'games.id', 'games.gameName')
        ->get();
        return $games;
    }
    public function getTasks()
    {
        $tasks = DB::table('tasks')
        ->join('games', 'tasks.gameId', 'games.id')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('tasks.gameId', 'tasks.id', 'tasks.question')
        ->get();
        return $tasks;
    }

    // used in routes functions

    public function showEvents()
    {
        return view('/loged/createGame', ['data'=>self::getEvents()]);
    }
    public function showGames($taskName = null, $taskType = null)
    {
        return view('/loged/tasks/' . $taskName)->with('data', self::getGames())->with('taskType', $taskType);
    }
    public function showGroupedGames()
    {
        $data = DB::table('games')
        ->join('events', 'events.id', 'games.eventId')
        ->where('events.userId', '=', self::getUser())
        ->select('events.userId', 'events.id as eventId' , 'events.eventName','games.stage', 'games.id', 'games.gameName', 'games.status')
        ->orderBy('events.id')
        ->orderBy('games.stage')
        ->groupBy('events.id')
        ->groupBy('games.stage')
        ->get();
            
        return view('/loged/startGame', ['data'=>$data]);
    }
    public function delete()
    {   
        return view('/loged/delete', ['events'=>self::getEvents() , 'games'=>self::getGames(), 'tasks'=>self::getTasks()]);
    }
    public function edit()
    {
        return view('/loged/edit', ['events'=>self::getEvents() , 'games'=>self::getGames(), 'tasks'=>self::getTasks()]);
    }
    

}
