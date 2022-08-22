<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Game;
use Illuminate\Http\Request;

class StartGameController extends Controller
{
     public function startGame(Request $request)
    {  
        $gameId = $request->gameId;
        $game = DB::table('games')->where('id', $gameId)->first();

        $stage = $game->stage;
        $eventId = $game->eventId;


        $active = Game::where('status', '=', 1)->first();

        
        if ($active === null) {
            // DB::update('update games set status = ? where eventId = ? AND stage = ?',[1, $eventId, $stage]);
            Game::where(['eventId'=>$eventId,'stage'=>$stage])->update(['status'=>1]);
            return redirect()->back()->with('success', 'Žaidimas paleistas');
        }
        else if($active !== null)
        {
            if($game->status === 1)
            {
                //DB::update('update games set status = ? where eventId = ? AND stage = ?',[0, $eventId, $stage]);
                Game::where(['eventId'=>$eventId,'stage'=>$stage])->update(['status'=>0]);

                return redirect()->back()->with('success', 'Žaidimas sustabdytas');
            }
            else
            {
                return redirect()->back()->with('error', 'Vienu metu gali būti paleistas tik vienas žaidimas');
            }
        } 
    }
}
