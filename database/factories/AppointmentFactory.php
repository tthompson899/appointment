<?php

namespace Database\Factories;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $appointmentDate = Carbon::parse($this->faker->unique()->dateTimeBetween(Carbon::now('America/Chicago'), '+2 years', 'America/Chicago'))->format('Y-m-d');
        $halfHourInterval = $this->getHalfHourInterval();
        $key = array_rand($halfHourInterval);
        $time = $halfHourInterval[$key];
        $newTimeInstance = Carbon::createFromFormat('H:i A', $time, 'America/Chicago')->format('H:i A');
        $dateTimeAppointment = Carbon::parse($appointmentDate . ' ' . $newTimeInstance)->format('Y-m-d H:i A');

        return [
            'date_of_appointment' => $dateTimeAppointment,
            'completed' => $this->faker->boolean(false),
            'cancelled' => $this->faker->boolean(false),
            'no_show' => $this->faker->boolean(false),
            'created_at' => Carbon::now('America/Chicago'),
            'updated_at' => Carbon::now('America/Chicago')
        ];
    }

    private function getHalfHourInterval() {
        $formatter = function ($time) {
            if ($time % 3600 == 0) {
            return date('H:i A', $time);
            } else {
            return date('H:i A', $time);
            }
        };
        $halfHourSteps = range(28800, 35*1800, 1800);
        return array_map($formatter, $halfHourSteps);
    }
}
