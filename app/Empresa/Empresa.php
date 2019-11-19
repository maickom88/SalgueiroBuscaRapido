<?php

namespace App\Empresa;

use App\Permission\Permission;
use App\User;
use App\Comment\Comment;
use App\Permission\Permission as AppPermission;
use Illuminate\Database\Eloquent\Model;
use App\Empresa\facilities\Facilite;
use App\Empresa\Open\Open;
use App\Empresa\Album\Album;

class Empresa extends Model
{
	
	
	public function permissions(){
		return $this->belongsTo(Permission::class, 'permission_id');
	}

	public function comments(){
		return $this->hasMany(Comment::class,'empresa_id');
	}
	
	public function album(){
		return $this->hasMany(Album::class);
	}

	public function feeds(){
		return $this->hasMany(Feed::class);
	}
	public function facilities(){
	return $this->hasOne(Facilite::class);
	}
	public function open(){
	return $this->hasOne(Open::class);
	}
	
}