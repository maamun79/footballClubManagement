<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [];

    public function injuredPlayers(){
        return $this->hasMany('App\InjuredPlayer');
    }

    public function playerSquad(){
        return $this->hasMany('App\PlayerSquad');
    }

    public function playerStats(){
        return $thid->hasMany('App\PlayerStat');
    }
}
