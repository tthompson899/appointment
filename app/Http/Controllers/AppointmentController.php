<?php

namespace App\Http\Controllers;

use App\Interfaces\AppointmentInterface;
use Illuminate\Http\Request;

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

        $this->appointment->create($params);
    }

    public function update($id, Request $request)
    {
        $params = $request->query();
        \Log::info('update_params', [
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
}
