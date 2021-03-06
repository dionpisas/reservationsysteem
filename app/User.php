<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

   public function role(){
       return $this->belongsTo('App\Role', 'roles_id');
   }

   public function appointment(){
       return $this->hasMany('App\Appointment');
   }

   public function isAdmin(){

       return $this->role->id == 2;
   }

   public function isUSer(){

   }
}
