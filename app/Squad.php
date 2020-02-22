<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    protected $guarded = [];

    public function match(){
        return $this->belongsTo('App\Match');
    }
}
