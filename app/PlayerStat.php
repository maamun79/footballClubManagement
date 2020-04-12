<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    protected $guarded = [];
    
    public function player(){
        return $this->belongsTo('App\Player');
    }

    public function match(){
        return $thid->belongsTo('App\Match');
    }
}
