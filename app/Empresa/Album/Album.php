<?php

namespace App\Empresa\Album;

use Illuminate\Database\Eloquent\Model;
use App\Empresa\Empresa;

class Album extends Model
{
	function empresa(){
		return $this->belongsToMany(Empresa::class);
	}
}
