<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    
    protected $fillable = [
        'type_id', 'date_of_appointment', 'completed', 'no_show', 'cancelled'
    ];
}
