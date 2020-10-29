<?php

namespace App\Repositories;

use App\Interfaces\AppointmentInterface;
use App\Appointment;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class AppointmentRepository implements AppointmentInterface
{
    public function search($params)
    {
        // @todo Refacter these User searches

        $appts = User::with('appointments', 'appointments.type');

        if ($name = Arr::get($params, 'name')) {
            $appts->where('name', 'like', $name . '%')->first();
        }

        if ($dob = Arr::get($params, 'date_of_birth')) {
            $appts->where('dob', 'like', $dob . '%')->first();
        }

        if ($phone = Arr::get($params, 'phone')) {
            $appts->where('phone', 'like', $phone . '%')->first();
        }

        if ($email = Arr::get($params, 'email')) {
            $user = $appts->where('email', 'like', $email . '%')->first();
        }

        if ($appointment_date = Arr::get($params, 'date_of_appointment')) {
            $appts = Appointment::with('user', 'type')->where('date_of_appointment', 'like', $appointment_date . '%')->get();
        }

        return $appts;
    }
}
