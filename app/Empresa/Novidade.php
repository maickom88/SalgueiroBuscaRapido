<?php

namespace App\Empresa;

use Illuminate\Database\Eloquent\Model;
use App\Empresa\Empresa;
use App\Empresa\AlbumNovidade;
use App\Empresa\Novidades\Photo;

class Novidade extends Model
{
    public function empresa(){
		return $this->belongsTo(Empresa::class);
	}
	public function photos(){
		return $this->hasMany(Photo::class);
	}
}
