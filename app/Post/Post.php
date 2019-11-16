<?php

namespace App\Post;

use App\User;
use App\Permission\Permission;
use App\Comment\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function permissions(){
        return $this->belongsTo(Permission::class, 'permission_id');
    }
    
    public function comments(){

        return $this->hasMany(Comment::class);
    } 
    
}
