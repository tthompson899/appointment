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

    public function create($params)
    {
        $user = User::find(Arr::get($params, 'user'));

        $appt = $user->appointments()->create([
            'date_of_appointment' => Arr::get($params, 'date_of_appointment'),
            'type_id' => Arr::get($params, 'type')
        ]);

        return response()->json($appt);
    }

    public function update($id, $params)
    {
        $appt = Appointment::find($id);

        return $appt->update($params);
    }

    public function delete($id)
    {
        $appt = Appointment::find($id);
        
        if (empty($appt)) {
            return 'Appointment not found!';
        }

        return $appt->delete();
    }
}
