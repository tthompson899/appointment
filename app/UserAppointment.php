<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    protected $table = 'user_appointments';
    
    protected $fillable = [
        'user_id', 'appointment_id'
    ];
}
