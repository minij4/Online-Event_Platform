<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartGameController extends Controller
{
    public function startGame(Request $request)
    {  
        $gameId = $request->gameId;
        $active = Game::where('status', '=', 1)->first();

        if ($active === null) {
            DB::update('update games set status = ? where id = ?',[1, $gameId]);
            return redirect()->back()->with('success', 'Žaidimas paleistas');
        }
        else if($active !== null)
        {
            $game = Game::findOrFail($request->gameId);

            if($game->status === 1)
            {
                DB::update('update games set status = ? where id = ?',[0, $gameId]);
                return redirect()->back()->with('success', 'Žaidimas sustabdytas');
            }
            else
            {
                return redirect()->back()->with('error', 'Vienu metu gali būti paleistas tik vienas žaidimas');
            }
        } 
    }
}
