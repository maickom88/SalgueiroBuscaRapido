<?php

namespace App\Empresa\Contrato;

use App\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    public function empresas(){
		return $this->belongsTo(Empresa::class, 'id');
	}
}
