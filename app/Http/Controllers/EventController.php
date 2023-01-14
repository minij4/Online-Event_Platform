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
    public function startGame()
    {
        return view('loged/startGame');
    }
}
