<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function date(){
        return $this->hasOne('App\Date');
    }

    public function user(){
        return $this->hasOne('App\User');
    }

    public function status(){
        return $this->hasMany('App\Status');
    }
}
