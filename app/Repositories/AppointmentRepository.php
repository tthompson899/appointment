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
            // @todo Can I use the user appointments relationship to find the appointments?
            $appts = Appointment::with('user', 'type')->where('date_of_appointment', 'like', $appointment_date . '%');
        }

        return response()->json([$appts->get()]);
    }

    public function create($params)
    {
        $user = User::find(Arr::get($params, 'user_id'));
        // @todo check if user if found, if not...return false 'no user found'

        if (! $user) {
            return 'Unable to create appointment: User not found';
        }

        $appt = $user->appointments()->create([
            'date_of_appointment' => Arr::get($params, 'date_of_appointment'),
            'type_id' => Arr::get($params, 'type_id')
        ]);

        return response()->json($appt);
    }

    public function update($id, $params)
    {
        $appt = Appointment::find($id);
        // @todo check if appointment is found, if not return false with error 'Appointment not found'

        if (! $appt) {
            return 'Unable to update appointment: Appointment does not exist.';
        }
        return $appt->update($params);
    }

    public function delete($id)
    {
        $appt = Appointment::find($id);
        
        if (! $appt) {
            return 'Appointment not found!';
        }

        return $appt->delete();
    }
}
