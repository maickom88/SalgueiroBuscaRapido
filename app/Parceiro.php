<?php

namespace App;
use Ap\User;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
   public function users(){
      return $this->belongsTo(User::class);
   }
}
