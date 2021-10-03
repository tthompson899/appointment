@extends('layouts.default')
@section('content')
<div class="container">
  <div class="card-body">
    <h1 class="card-title pricing-card-title">Your Appointment has been Scheduled!</h1>
    <h5>Check out the details below:</h5>
      <ul class="list-unstyled mt-3 mb-4">
        <li>{{ $appointmentDetail->user->name }}</li>
        <li>Date & Time: {{ $formatAppt }}</li>
        <li>For: {{ ucwords($appointmentDetail->type->name) }}</li>
      </ul>
      <p>
        Thank you for scheduling this appointment. We look forward to seeing you soon!
        If you have any questions, please contact our office. 
      </p>
  </div>
</div>
@stop
