<?php

namespace App\Empresa\Album;

use App\Empresa\Feed\NovidadeEmpresa;
use App\Empresa\Novidade;
use Illuminate\Database\Eloquent\Model;
use App\Empresa\Empresa;
class PhotosFeed extends Model
{
   public function novidade(){
		return $this->belongsTo(NovidadeEmpresa::class, 'id');
	}
}
