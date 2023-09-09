@extends('layouts.default')
@section('content')
<div class="container">
  <div class="card-body">
    <h2 class="card-title pricing-card-title">Your Appointment has been Scheduled!</h2>
    <h3>Check out the details below:</h3>
      <ul class="list-unstyled mt-3 mb-4" id="appointment_details">
        <li style="list-style-type: none; font-size: 12pt">For: {{ $appointmentDetail->user->name }}</li>
        <li style="list-style-type: none; font-size: 12pt">Date & Time: {{ $formatAppt }}</li>
        <li style="list-style-type: none; font-size: 12pt">Type of Appointment: {{ ucwords($appointmentDetail->type->name) }}</li>
      </ul>
      <div>
        <p>Thank you for scheduling this appointment. We look forward to seeing you soon!</p>
        <p>If you have any questions, please contact our office. </p>
      </div>
      <div>
        <ul style="padding-left: 0pt">
          <li style="list-style-type: none; font-size: 11pt">Phone: 972-999-8888</li>
          <li style="list-style-type: none; font-size: 11pt">Email: appointments@dentistoffice.com</li>
        </ul>
      </div>
  </div>
</div>
@stop
