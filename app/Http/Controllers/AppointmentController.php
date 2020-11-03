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
}
