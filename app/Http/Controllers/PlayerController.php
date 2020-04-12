<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\InjuredPlayer;

class PlayerController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    // show all available player lists
    public function index(){
        $players = Player::where('status', 'available')->latest()->get();
        $injuredPlayers = Player::where('status', 'injured')->latest()->get();

        return view('admin.player.index', compact('players', 'injuredPlayers'));
    }

    // new player add option
    public function create(){
        return view('admin.player.create');
    }

    // store new player informations
    public function store(Request $request){
        //calling validation method
        $this->validateData($request);

        if($request->image){

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('admin/image/player/'), $imageName);
        }
        

        $player = new Player();
        $player->first_name          = $request->first_name;
        $player->last_name           = $request->last_name;
        $player->dob                 = $request->dob;
        $player->country             = $request->country;
        $player->email               = $request->email;
        $player->contact_no          = $request->contact_no;
        $player->father_name         = $request->father_name;
        $player->mother_name         = $request->mother_name;
        $player->agent_name          = $request->agent_name;
        $player->contract_start_date = $request->contract_start_date;
        $player->contract_end_date   = $request->contract_end_date;
        $player->salary_per_month    = $request->salary_per_month;
        $player->buying_price        = $request->buying_price;
        $player->previous_club       = $request->previous_club;
        $player->jersy_no            = $request->jersy_no;
        $player->position            = $request->position;
        $player->image               = $imageName;

        $player->save();
        return redirect('/players')->with('message', 'The Player added successfully');
    }

    //show player details
    public function show($id){
        $player = Player::findOrFail($id);

        return view('admin.player.show', compact('player'));
    }

    // edit player page
    public function edit($id){
        $player = Player::findOrFail($id);

        return view('admin.player.edit', compact('player'));
    }

    // update player information
    public function update(Request $request, $id){

        $player = Player::findOrFail($id);

        $this->validateData($request);
        
        $current_photo = $player->image;
        if($request->image != $current_photo ){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('image/player/'), $imageName);
            $request = new Request($request->all());
            $request->merge(['image' => $imageName]);
        }

        $playerPhoto = public_path('image/player/').$current_photo;
        if(file_exists($playerPhoto)){
            @unlink($playerPhoto);
        }

        $player->update($request->all());

        return redirect("/players/$id")->with('message', 'The Player updated successfully');
    }

    // delete players
    public function destroy($id){
        $player = Player::findOrFail($id);

        $player->destroy($id);
    }

    public function injuredCreate($playerId){
        $injuredPlayer = Player::findOrFail($playerId);

        return view('admin.player.injuredCreate', compact('injuredPlayer'));
    }
    // store injury update of players
    public function injuredStore(Request $request, $playerId){
        $request->validate([
            'injury_type'       => 'required',
            'injury_date'      => 'required',
            'possible_comeback_date'     => 'required',
            'treatment_status'  => 'required'           
        ]);

        $injuredPlayer = new InjuredPlayer();
        $injuredPlayer->player_id              = $playerId;
        $injuredPlayer->injury_type            = $request->injury_type;
        $injuredPlayer->injury_date            = $request->injury_date;
        $injuredPlayer->possible_comeback_date = $request->possible_comeback_date;
        $injuredPlayer->treatment_status       = $request->treatment_status;

        $injuredPlayer->save();

        $player = Player::find($playerId);
        $player->status = 'injured';

        $player->save();
        return redirect('/players/'.$playerId)->with('message', 'Injury Details Added');

    }
    // injury recovery update
    public function recoveryUpdate($playerId){
        
        $player = Player::find($playerId);
        $player->status = 'available';

        $player->save();
        return redirect('/players/'.$playerId)->with('message', 'Injury Recovery Status Updated');



    }

    // ================Validation Rules===================
    public function validateData(Request $request){
        $validatedData = $request->validate([
            'first_name'          => 'required',
            'last_name'           => 'required',
            'dob'                 => 'required',
            'country'             => 'required',
            'email'               => 'required',
            'contact_no'          => 'required',
            'father_name'         => 'required',
            'mother_name'         => 'required',
            'agent_name'          => 'required',
            'contract_start_date' => 'required',
            'contract_end_date'   => 'required',
            'salary_per_month'    => 'required',
            'buying_price'        => 'required',
            'previous_club'       => 'required',
            'jersy_no'            => 'required',
            'position'            => 'required',
            'image'               => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072'
            
        ]);
    }
}
