<?php

namespace App\Empresa\Promotion;

use App\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function empresa(){
		return $this->belongsTo(Empresa::class);
	}
}
