<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $guarded = [];

    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }

    public function matchStat(){
        return $this->hasOne('App\MatchStat');
    }

    public function squad(){
        return $this->hasOne('App\Squad');
    }

    public function playerStats(){
        return $thid->hasMany('App\PlayerStat');
    }
}
