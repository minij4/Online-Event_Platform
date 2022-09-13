<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


class SessionController extends Controller
{
    public function setData(Request $request) {
        $score = $request->score;

        Session::forget('score');
        Session::put('score', $score);
    }
}
