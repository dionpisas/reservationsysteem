<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date_time', 'end_date-time',
    ];

    public function appointment(){
        return $this->hasMany('App\Appointment');
    }
}
