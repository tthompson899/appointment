<?php

namespace App\Http\Controllers;

use App\Interfaces\AppointmentInterface;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @var AppointmentInterface
     */
    protected $appointments;

    public function __construct(UserInterface $user, AppointmentInterface $appt)
    {
        $this->user = $user;
        $this->appointments = $appt;
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $userAppts = $this->appointments->search($params);

        return $userAppts;
    }
}
