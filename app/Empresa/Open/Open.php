<?php

namespace App\Empresa\Open;
use App\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;

class Open extends Model
{
	public function empresa(){
		return $this->belongsTo(Empresa::class);
	}
}
