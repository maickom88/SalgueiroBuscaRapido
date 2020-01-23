<?php

namespace App\Post;

use App\User;
use App\Permission\Permission;
use App\Comment\Comment;
use App\Post\PostView\PostView;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
     public function views(){
        return $this->hasOne(PostView::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
