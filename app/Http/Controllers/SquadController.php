<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SquadSelectionMail;
use App\Tournament;
use App\Match;
use App\Player;
use App\Squad;
use App\PlayerSquad;

class SquadController extends Controller
{
    public function index(){
        return view('admin.squad.index');
    }
    
    public function create(){
        $tournaments = Tournament::all();
        // getting available players
        $players = Player::where('status', 'available')->get();
        // getting players positions
        $positions = Player::select('position')
                            ->groupBy('position')
                            ->get();

        return view('admin.squad.create', compact('tournaments', 'players', 'positions'));
    }

    public function matchView($tournamentId){
        // getting undefined matches through ajax
        $matches = Match::where('tournament_id', $tournamentId)
                        ->where('squad_status', 'Undefined')->get();

        // dd(response()->json($matches));
        return response()->json($matches);
    }

    public function store(Request $request){
        // validation

        // insert data into squad table
        $squad = new Squad();
        $squad->match_id          = $request->match_id;

        $squad->save();
        // insert data into playerSquad table
        $players = $request->player_id;
        

    //=========== sending email to selected players==============
        //fatching match information
        $matchId = $request->match_id;
        $selectedMatch = Match::where('id', $matchId)->first();
        
        // fatching selected players email
        $plrs = Player::whereIn('id', $players)->get();
        for($i=0; $i<count($plrs);$i++){
            $emails[] = $plrs[$i]->email;
        }
        // dd($emails);
        $details = [
            'title' => 'Squad selection for upcoming match',
            'body' => 'You are selected for the match vs '.$selectedMatch->opposite_team.' It is '.$selectedMatch->match_type. ' match. Match date is '.$selectedMatch->match_date. ' and starting time is '.$selectedMatch->starting_time. ' Please join with the team on time.'
        ];
   
        Mail::to($emails)->send(new SquadSelectionMail($details));
    //============ sending email to selected players==============
        foreach($players as $player){
            $playerSquad = new PlayerSquad();
            $playerSquad->squad_id = $squad->id;
            $playerSquad->player_id = $player;
            
            $playerSquad->save();
        }

        $match = Match::find($matchId);
        $match->squad_status = 'Defined';

        $match->save();
        return redirect('/squads')->with('message', 'Squad Published Successfully');
    }

    public function test(){
        return view('admin.test.squad');
    }
}
