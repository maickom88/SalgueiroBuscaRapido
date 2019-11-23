<?php

namespace App\pageView;

use Illuminate\Database\Eloquent\Model;
use App\Empresa\Empresa;
class View extends Model

{
   public function empresa()
	{
		return $this->belongsTo(Empresa::class);
	}
}
