<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Appointment
{
    protected $fillable = [
        'type_id', 'date_of_appointment', 'completed', 'no_show', 'cancelled'
    ];
}
