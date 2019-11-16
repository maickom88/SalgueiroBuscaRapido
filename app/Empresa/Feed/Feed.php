<?php

namespace App\Empresa\Feed;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
}
