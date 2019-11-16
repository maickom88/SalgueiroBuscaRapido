<?php

namespace App\Empresa\facilities;
use App\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;

class Facilite extends Model
{
    public function empresa(){
		return $this->belongsTo(Empresa::class);
	 }
	 
}
