<?php

namespace App;

use App\Avatar;
use App\Comment\Comment;
use App\Empresa\Empresa;
use App\Permission\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\info;
use App\Parceiro;
use function Psy\info;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   public function permissions(){

      return $this->hasOne(Permission::class);
   }
   public function comments(){

      return $this->hasMany(Comment::class);
   }
   public function empresas(){
      return $this->hasOneThrough(Empresa::class,Permission::class);
   }
   public function posts(){
      return $this->hasManyThrough(Post::class,Permission::class);
   }    
   public function avatar(){

      return $this->hasOne(Avatar::class);
   }
	public function info(){
		return $this->hasOne(info::class);
	}
	public function parceiro(){
		return $this->hasOne(info::class, "user_id")
		;
	}

}
