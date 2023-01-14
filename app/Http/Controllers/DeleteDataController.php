<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Game;
use App\Models\Task;

class DeleteDataController extends Controller
{
    public function deleteEvent(Request $request)
    {  
        $event = Event::findOrFail($request->event);
        
        if($event->delete()){
            return redirect()->back()->with('success', 'Renginys ištrintas');
        } else {
            
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
