<?php

namespace App\Http\Controllers;

use App\Interfaces\AppointmentInterface;
use Illuminate\Http\Request;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

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
        $this->sendEmail();

        return $newAppt;
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

    private function sendEmail()
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT')))
        ->setUsername(env('MAIL_USERNAME'))
        ->setPassword(env('MAIL_PASSWORD'))
        ;

        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('AYYYYY YO'))
        ->setFrom(['appointment@tthompson899.com' => 'Tiffany'])
        ->setTo(['email@example.com'])
        ->setBody('Here is the message itself')
        ;

        // Send the message
        $result = $mailer->send($message);
    }
}
