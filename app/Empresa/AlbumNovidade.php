<?php

namespace App\Empresa;

use Illuminate\Database\Eloquent\Model;
use App\Empresa\Novidade;

class AlbumNovidade extends Model
{
   public function novidade(){
		return $this->belongsTo(Novidade::class);
	}

}
