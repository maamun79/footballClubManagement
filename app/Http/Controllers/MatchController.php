<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Tournament;
use App\MatchStat;

class MatchController extends Controller
{    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create($tournamentId){
        $tournament = Tournament::findOrFail($tournamentId);

        return view('admin.match.create', compact('tournament'));
    }

    public function store(Request $request, $tournamentId){
        $request->validate([
            'match_date'         => 'required',
            'starting_time'      => 'required',
            'venue_name'         => 'required',
            'venue_country'      => 'required', 
            'opposite_team'      => 'required',
            'match_type'         => 'required',
            'match_day'          => 'required',
            'opposite_team_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072'          
        ]);

        if($request->opposite_team_logo){

            $logoName = time().'.'.request()->opposite_team_logo->getClientOriginalExtension();
            request()->opposite_team_logo->move(public_path('admin/image/club-logo/'), $logoName);
        }

        $match = new Match();
        $match->tournament_id      = $tournamentId;
        $match->match_date         = $request->match_date;
        $match->starting_time      = $request->starting_time;
        $match->venue_name         = $request->venue_name;
        $match->venue_country      = $request->venue_country;
        $match->opposite_team      = $request->opposite_team;
        $match->match_type         = $request->match_type;
        $match->match_day          = $request->match_day;
        $match->opposite_team_logo = $logoName;

        $match->save();
        return redirect('/tournaments/'.$tournamentId)->with('message', 'Match added successfully');
    }

    public function show($tournamentId, $matchId){
        $tournament = Tournament::findOrFail($tournamentId);
        $match = Match::findOrFail($matchId);
        $matchStat = MatchStat::where('match_id', $matchId)->get();
        // $matchStat = MatchStat::findOrFail($matchId);
        // dd($matchStat);

        return view('admin.match.show', compact('match', 'tournament', 'matchStat'));
    }

    public function createMatchStats($tournamentId, $matchId){
        $tournament = Tournament::findOrFail($tournamentId);
        $match = Match::findOrFail($matchId);
        
        return view('admin.match.createMatchStats', compact('tournament', 'match'));
    }

    public function storeMatchStats(Request $request, $tournamentId, $matchId){
        $request->validate([
            'shots'           => 'required',
            'shots_on_target' => 'required',
            'possession'      => 'required',
            'passes'          => 'required', 
            'pass_accuracy'   => 'required',
            'foul_commited'   => 'required',
            'foul_conside'    => 'required',       
            'yellow_cards'    => 'required',       
            'red_cards'       => 'required',       
            'offsides'        => 'required',       
            'corners'         => 'required',       
            'goal'            => 'required',       
            'goal_consided'   => 'required',       
        ]);

        $matchStat = new MatchStat();
        $matchStat->match_id      = $matchId;
        $matchStat->shots         = $request->shots;
        $matchStat->shots_on_target      = $request->shots_on_target;
        $matchStat->possession         = $request->possession;
        $matchStat->passes      = $request->passes;
        $matchStat->pass_accuracy      = $request->pass_accuracy;
        $matchStat->foul_commited         = $request->foul_commited;
        $matchStat->foul_conside          = $request->foul_conside;
        $matchStat->yellow_cards          = $request->yellow_cards;
        $matchStat->red_cards          = $request->red_cards;
        $matchStat->offsides          = $request->offsides;
        $matchStat->corners          = $request->corners;
        $matchStat->goal          = $request->goal;
        $matchStat->goal_consided          = $request->goal_consided;

        $matchStat->save();

    
        $match = Match::find($matchId);
        $match->status = 'Defined';

        $match->save();
        return redirect('/tournaments/'.$tournamentId.'/matches/'.$matchId)->with('message', 'Match added successfully');
        
    }
}
