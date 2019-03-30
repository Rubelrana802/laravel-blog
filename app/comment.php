<?php

namespace App;
use App\comment;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
