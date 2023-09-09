<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Appointment;
use Illuminate\Support\Carbon;

class CreateAppointment extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $formatDateOfAppointment = Carbon::create($this->appointment->date_of_appointment)->toDayDateTimeString();

        return $this->from('appointments@dentist.com', 'Dentist')
                    ->subject('New Appointment')
                    ->view('emails.create-appointment')
                    ->with([
                        'appointmentDetail' => $this->appointment,
                        'formatAppt' => $formatDateOfAppointment,
                    ]);
    }
}
