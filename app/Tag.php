<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tag(){
    	return $this->belongsToMany('App\Post');
    }
}
