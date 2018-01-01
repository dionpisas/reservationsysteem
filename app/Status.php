<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    public function type(){
        return $this->hasMany('App\StatusType');
    }



}
