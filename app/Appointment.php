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
        'user_id',
        'date',
        'statuses_id',
        'start_time',
        'end_time'
    ];


    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function status(){
        return $this->belongsTo('App\Status','statuses_id');
    }
}
