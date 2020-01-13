<?php

namespace App\Evento;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function user(){
	return $this->belongsTo(User::class);
    }
}
