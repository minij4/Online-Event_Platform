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
    public function getUser()
    {
        return Auth::id();
        //$email = Auth::user()->email;
    }
    public function getEvents()
    {
        
        $data = Event::where('userId','=',self::getUser())->get();
        
        return view('/loged/createGame', ['data'=>$data]);
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
        ->select('events.userId', 'events.id as eventId' , 'events.eventName','games.stage', 'games.id', 'games.gameName', 'games.status')
        ->orderBy('events.id')
        ->orderBy('games.stage')
        ->groupBy('events.id')
        ->groupBy('games.stage')
        ->get();
        
        
        // ->


        // reikia atrinkti pagal etapus ir eventId;;;;;;;;;;;;;

        return view('/loged/startGame', ['data'=>$data]);
        //return $data;
    }
    public function getAllGames()
    {
        // $data = DB::table('events')
        //     ->select('events.eventName', 'games.gameName', 'tasks.question', 'tasks.id')
        //     ->join('games', 'games.eventId', '=', 'events.id')
        //     ->join('tasks', 'tasks.gameId', '=', 'games.id')
        //     ->get();

        $events = Event::where('userId','=', self::getUser())->get();
        //$tasks = Task::all();


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
        //$tasks = Task::all();


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
}
