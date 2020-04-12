<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerSquad extends Model
{
    protected $guarded = [];

    public function player(){
        return $this->belongsTo('App\players');
    }

    public function squads(){
        return $this->hasMany('App\Squad');
    }
}
