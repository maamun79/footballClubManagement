<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InjuredPlayer extends Model
{
    protected $guarded = [];
    
    public function player(){
        return $this->belongsTo('App\Player');
    }
}
