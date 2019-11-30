<?php

namespace App\Empresa\Feed;

use App\Empresa\Album\PhotosFeed;
use Illuminate\Database\Eloquent\Model;
use App\Empresa\Empresa;
class NovidadeEmpresa extends Model
{
    public function empresa(){
		return $this->belongsTo(Empresa::class);
	}
	public function photos(){
		return $this->hasMany(PhotosFeed::class, 'novidade_empresa_id');
	}
}
