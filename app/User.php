<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'date_of_birth'
    ];

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
