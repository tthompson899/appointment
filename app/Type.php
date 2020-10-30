<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    
    public function appointments()
    {
        return $this->belongsToMany('App\Appointment', 'appointments');
    }

    public function apps()
    {
        return $this->hasMany('App\Appointment');
    }
}
