<?php

namespace App\Empresa\Novidades;

use App\Empresa\Novidade;
use App\Empresa\Feed\Post;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	public function post(){
		return $this->belongsTo(Post::class);
	}
}
