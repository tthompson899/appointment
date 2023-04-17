<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'email', 'phone', 'date_of_birth'
    ];

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
