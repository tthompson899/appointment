<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Interfaces\AppointmentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateAppointment;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * @var AppointmentInterface
     */
    protected $appointment;

    public function __construct(AppointmentInterface $appt)
    {
        $this->appointment = $appt;
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $userAppts = $this->appointment->index($params);

        return $userAppts;
    }

    public function create(Request $request)
    {
        $params = $request->query();

        $newAppt = $this->appointment->create($params);

        // send email
        $this->sendEmail($newAppt);

        return $newAppt;
    }

    public function update($id, Request $request)
    {
        $params = $request->query();
        Log::info('update_params', [
            'params' => $params
        ]);
        $appt = $this->appointment->update($id, $params);

        if (! $appt) {
            return 'Unable to update appointment';
        }

        return 'Appointment has been updated.';
    }

    public function delete($id)
    {
        $appt = $this->appointment->delete($id);

        return $appt;
    }

    private function sendEmail(Appointment $appointmentDetails)
    {
        Mail::to($appointmentDetails->user->email)->send(new CreateAppointment($appointmentDetails));
    }
}
