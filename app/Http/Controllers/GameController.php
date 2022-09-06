<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Game;
use App\Events\CheckStatus;

class GameController extends Controller
{
    public function waitingRoom()
    {
        if(Session::get('nickname')) {

            return view('/waitingRoom');
        }
    }
    public function game()
    { 
        if(Session::get('nickname')) {
            return redirect('waitingRoom');
        }
        return view('/game');
    }
    public function postPlayer(Request $request)
    {
        //$img = time()."_".$request->photo->getClientOriginalName();
        //$hobbies = implode(',', $request->hobbies);
        //$request->photo->move(public_path('uploads'), $img);

        $nickname = $request->nickname;
    
        if($nickname){
            session()->put('nickname', $nickname);
            session()->put('score', 1500);
            return redirect('waitingRoom');
        } else {
            return redirect()->back()->with('error', 'Vardas užimtas');
        }
    }

    public function sessionDelete(Request $request)
    {
        if($request->session()->has('nickname'))
        {
            $request->session()->flush();
        }
        return redirect('/');
    }
}
