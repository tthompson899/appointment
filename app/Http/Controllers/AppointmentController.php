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

        // @todo add ability to search by name, dob, appointment date and show appointments for user
        $userAppts = $this->appointments->search($params);
        // dd(Appointment::find(43)->user);
        // dd(User::find(50)->appointments->first()->type);
        // dd(User::find(50)->appointments->first()->type);

        return $userAppts;
    }
}
