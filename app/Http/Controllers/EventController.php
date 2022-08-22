<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function home()
    {
        if(Auth::user()){
            return view('loged/home');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function event()
    {
        if(Auth::user()){
            return view('loged/event');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function createEvent()
    {
        if(Auth::user()){
            return view('loged/createEvent');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    
    public function createGame()
    {
        if(Auth::user()){
            return view('loged/createGame');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function createTask()
    {
        if(Auth::user()){
            return view('loged/createTask');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }

    public function edit()
    {
        if(Auth::user()){
            return view('loged/edit');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function delete()
    {
        if(Auth::user()){
            return view('loged/delete');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }

    public function startGame()
    {
        if(Auth::user()){
            return view('loged/startGame');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }

    ///

    public function task($taskName = null, $taskType = null)
    {
        if(Auth::user()){
            return view('/loged/tasks/' . $taskName)->with('taskType', $taskType);
        }
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    
    public function photoBlur()
    {
        if(Auth::user()){
            return view('loged/tasks/photoBlur');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function photoMosaic()
    {
        if(Auth::user()){
            return view('loged/tasks/photoMosaic');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function photo()
    {
        if(Auth::user()){
            return view('loged/tasks/photo');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function videoBlur()
    {
        if(Auth::user()){
            return view('loged/tasks/videoBlur');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function video()
    {
        if(Auth::user()){
            return view('loged/tasks/video');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
    public function audio()
    {
        if(Auth::user()){
            return view('loged/tasks/audio');
        }
  
        return  redirect()->route('login')->with('error', 'You are not loged in!');
    }
}
