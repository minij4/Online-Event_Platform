<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function home()
    {
        return view('loged/home');
    }
    public function event()
    {
        return view('loged/event');
    }
    public function createEvent()
    {
        return view('loged/createEvent');
    }
    
    public function createGame()
    {
        return view('loged/createGame');
    }
    public function createTask()
    {
        return view('loged/createTask');
    }

    public function edit()
    {
        return view('loged/edit');
    }
    public function delete()
    {
        return view('loged/delete');
    }

    public function startGame()
    {
        return view('loged/startGame');
    }

    ///

    public function task($taskName = null, $taskType = null)
    {
        return view('/loged/tasks/' . $taskName)->with('taskType', $taskType);
    }
    
    public function photoBlur()
    {
        return view('loged/tasks/photoBlur');
    }
    public function photoMosaic()
    {
        return view('loged/tasks/photoMosaic');
    }
    public function photo()
    {
        return view('loged/tasks/photo');
    }
    public function videoBlur()
    {
        return view('loged/tasks/videoBlur');
    }
    public function video()
    {
        return view('loged/tasks/video');
    }
    public function audio()
    {
        return view('loged/tasks/audio');
    }
}
