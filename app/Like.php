<?php

namespace App;

use App\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Like extends Model
{
   public function empresas(){
		return $this->belongsTo(Empresa::class,'id');
	}
	
	
}
