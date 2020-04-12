<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Tournament;
use App\MatchStat;
use App\Player;
use App\Squad;
use App\PlayerSquad;
use App\PlayerStat;

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

        $squads = Squad::where('match_id', $matchId)
                        ->join('player_squads', 'squads.id', '=', 'player_squads.squad_id')
                        ->join('players', 'players.id', '=', 'player_squads.player_id')->get();
        
        $stats = PlayerStat::where('match_id', $matchId)->get();


        // dd($squads[1]->first_name);
        // $matchStat = MatchStat::findOrFail($matchId);
        // dd($matchStat);

        return view('admin.match.show', compact('match', 'tournament', 'matchStat', 'squads', 'stats'));
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
        $matchStat->match_id        = $matchId;
        $matchStat->shots           = $request->shots;
        $matchStat->shots_on_target = $request->shots_on_target;
        $matchStat->possession      = $request->possession;
        $matchStat->passes          = $request->passes;
        $matchStat->pass_accuracy   = $request->pass_accuracy;
        $matchStat->foul_commited   = $request->foul_commited;
        $matchStat->foul_conside    = $request->foul_conside;
        $matchStat->yellow_cards    = $request->yellow_cards;
        $matchStat->red_cards       = $request->red_cards;
        $matchStat->offsides        = $request->offsides;
        $matchStat->corners         = $request->corners;
        $matchStat->goal            = $request->goal;
        $matchStat->goal_consided   = $request->goal_consided;

        $matchStat->save();

    
        $match = Match::find($matchId);
        $match->status = 'Defined';

        $match->save();
        return redirect('/tournaments/'.$tournamentId.'/matches/'.$matchId)->with('message', 'Match added successfully');
        
    }

    // schedule calendar
    public function calendar(){
        $matchCalendars = Match::all();
        // $tournaments = Tournament::join('matches', 'tournaments.id', '=', 'matches.tournament_id')->get();
                                // dd($tournaments);
        $tournaments = Tournament::all();

        return view('admin.match.matchCalendar', compact('matchCalendars', 'tournaments'));
    }

    //store player stats
    public function storePlayerStats(Request $request, $tournamentId, $matchId, $squadId, $playerId){
        
        $playerStat = new PlayerStat();
        $playerStat->player_id            = $playerId;
        $playerStat->match_id             = $matchId;
        $playerStat->rating               = $request->rating;
        $playerStat->time_played          = $request->time_played;
        $playerStat->goals                = $request->goals;
        $playerStat->assist               = $request->assist;
        $playerStat->yellow_card          = $request->yellow_card;
        $playerStat->red_card             = $request->red_card;
        $playerStat->shots                = $request->shots;
        $playerStat->shots_on_target      = $request->shots_on_target;
        $playerStat->shots_off_target     = $request->shots_off_target;
        $playerStat->dribbles_attempted   = $request->dribbles_attempted;
        $playerStat->dribbles_won         = $request->dribbles_won;
        $playerStat->offsides             = $request->offsides;
        $playerStat->fouled               = $request->fouled;
        $playerStat->total_passes         = $request->total_passes;
        $playerStat->accurate_passes      = $request->accurate_passes;
        $playerStat->pass_accuracy        = $request->pass_accuracy;
        $playerStat->key_passes           = $request->key_passes;
        $playerStat->through_balls        = $request->through_balls;
        $playerStat->crosses              = $request->crosses;
        $playerStat->long_balls           = $request->long_balls;
        $playerStat->aerials              = $request->aerials;
        $playerStat->aerials_won          = $request->aerials_won;
        $playerStat->tackles_attempted    = $request->tackles_attempted;
        $playerStat->successfull_tackles  = $request->successfull_tackles;
        $playerStat->clearances           = $request->clearances;
        $playerStat->interceptions        = $request->interceptions;
        $playerStat->foules               = $request->foules;
        $playerStat->dispossessed         = $request->dispossessed;
        $playerStat->dribbled_past        = $request->dribbled_past;

        $playerStat->save();

        $playerSquad = PlayerSquad::where('player_id', $playerId)
                                    ->where('squad_id', $squadId)->first();
        $playerSquad->stat_status = 'Defined';

        $playerSquad->save();

    
        return redirect('/tournaments/'.$tournamentId.'/matches/'.$matchId)->with('message', 'Player Stats added successfully');
        
    }

}
