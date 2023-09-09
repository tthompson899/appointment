<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    
    public function appointments()
    {
        return $this->belongsToMany('App\Models\Appointment', 'appointments');
    }

    public function apps()
    {
        return $this->hasMany('App\Models\Appointment');
    }
}
