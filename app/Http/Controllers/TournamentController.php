<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Match;
use App\MatchStat;

class TournamentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $tournaments = Tournament::all();

        return view('admin.tournament.index', compact('tournaments'));
    }

    public function create(){

        return view('admin.tournament.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'        => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required',
            'organizer'   => 'required', 
            'season'      => 'required',
            'logo'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072'          
        ]);

        if($request->logo){

            $logoName = time().'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('admin/image/tournament-logo/'), $logoName);
        }

        $tournament                = new Tournament();
        $tournament->name          = $request->name;
        $tournament->start_date    = $request->start_date;
        $tournament->end_date      = $request->end_date;
        $tournament->organizer     = $request->organizer;
        $tournament->season        = $request->season;
        $tournament->logo          = $logoName;

        $tournament->save();
        return redirect('/tournaments')->with('message', 'New Tournament added successfully');

    }

    public function show($id){
        $tournament = Tournament::findOrFail($id);
        $matches = Match::where('tournament_id', $id)->get();
        $matchStats = MatchStat::all();

        return view('admin.tournament.show', compact('tournament','matches', 'matchStats'));
    }
}
