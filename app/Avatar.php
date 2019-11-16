<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
}
