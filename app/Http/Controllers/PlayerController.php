<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function index(){
        $players = Player::latest()->get();

        return view('admin.player.index', compact('players'));
    }


    public function create(){
        return view('admin.player.create');
    }


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


    public function show($id){
        $player = Player::findOrFail($id);

        return view('admin.player.show', compact('player'));
    }


    public function edit($id){
        $player = Player::findOrFail($id);

        return view('admin.player.edit', compact('player'));
    }


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

    public function destroy($id){
        $player = Player::findOrFail($id);

        $player->destroy($id);
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
    // ======================Temporary======================

    public function squad(){
        $players = Player::all();

        return view('admin.squad.index', compact('players'));
    }
}
