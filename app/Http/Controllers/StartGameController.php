<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Game;
use App\Models\Task;
use App\Models\Player;
use App\Events\CheckStatus;
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
            // for update all stage status
            $data = Game::where(['eventId'=>$eventId,'stage'=>$stage])->update(['status'=>1]);

            // just to fire event
            $game = Game::whereid($gameId)->first();
            $game->status = 1;
            $game->save();  
            event(new CheckStatus("active"));

            Player::truncate();
            

            return redirect()->back()->with('success', 'Žaidimas paleistas');
        }
        else if($active !== null)
        {
            if($game->status === 1)
            {
                //DB::update('update games set status = ? where eventId = ? AND stage = ?',[0, $eventId, $stage]);
                Game::where(['eventId'=>$eventId,'stage'=>$stage])->update(['status'=>0]);
                DB::update('update tasks set status = ? where status = ?' , [0, 1]);
                return redirect()->back()->with('success', 'Žaidimas sustabdytas');
            }
            else
            {
                return redirect()->back()->with('error', 'Vienu metu gali būti paleistas tik vienas žaidimas');
            }
        } 
    }
}
