<?php

namespace App\Empresa\Album;

use Illuminate\Database\Eloquent\Model;
use App\Empresa\Empresa;

class Album extends Model
{
	protected $fillable = ['photo'];


	function empresa(){
		return $this->belongsToMany(Empresa::class);
	}
}
