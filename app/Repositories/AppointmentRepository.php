<?php

namespace App\Repositories;

use App\Interfaces\AppointmentInterface;
use App\User;
use App\Appointment;
use Illuminate\Support\Arr;

class AppointmentRepository implements AppointmentInterface
{
    public function index($params)
    {
        $appts = User::with('appointments', 'appointments.type');

        if ($name = Arr::get($params, 'name')) {
            $appts->where('name', 'like', '%' . $name . '%');
        }

        if ($dob = Arr::get($params, 'date_of_birth')) {
            $appts->where('date_of_birth', 'like', $dob . '%');
        }

        if ($phone = Arr::get($params, 'phone')) {
            $appts->where('phone', 'like', $phone . '%');
        }

        if ($email = Arr::get($params, 'email')) {
            $appts->where('email', 'like', $email . '%');
        }

        if ($appointment_date = Arr::get($params, 'date_of_appointment')) {
            $appts = Appointment::with('user', 'type')->where('date_of_appointment', 'like', $appointment_date . '%');
        }

        return response()->json([$appts->get()]);
    }
}
