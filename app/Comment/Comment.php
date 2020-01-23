<?php

namespace App\Comment;
use App\Post\Post;
use App\Empresa\Empresa;
use App\Info;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public function posts(){
		return $this->belongsTo(Post::class);
	}
	public function empresas(){
	return $this->belongsTo(Empresa::class);
	}
	public function user(){
		return $this->belongsTo(User::class);
	}
}
