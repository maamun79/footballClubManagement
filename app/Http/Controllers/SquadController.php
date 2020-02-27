<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Match;
use App\Player;

class SquadController extends Controller
{
    public function create(){
        $tournaments = Tournament::all();
        $players = Player::where('status', 'available')->get();
        $positions = Player::select('position')
                            ->groupBy('position')
                            ->get();

        return view('admin.squad.create', compact('tournaments', 'players', 'positions'));
    }

    public function matchView($tournamentId){
        $matches = Match::where('tournament_id', $tournamentId)
                        ->where('status', 'Undefined')->get();

        // dd(response()->json($matches));
        return response()->json($matches);
    }
}
