<?php

namespace App\Empresa\Feed;

use App\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
	public function empresa(){
		return $this->belongsTo(Empresa::class);
	}
}
