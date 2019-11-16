<?php

namespace App\Permission;
use App\User;
use App\Post\Post;
use App\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function empresas(){
        return $this->hasOne(Empresa::class);
    }
}
