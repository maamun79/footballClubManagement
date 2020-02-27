<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [];

    public function injuredPlayers(){
        return $this->hasMany('App\InjuredPlayer');
    }
}
