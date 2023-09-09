<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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
        $appointmentDate = $this->faker->dateTimeBetween(Carbon::now(), '+2 years', 'America/Chicago')->format('Y-m-d H:i:s');
        return [
            'date_of_appointment' => $appointmentDate,
            'completed' => $this->faker->boolean(false),
            'cancelled' => $this->faker->boolean(false),
            'no_show' => $this->faker->boolean(false),
            'created_at' => Carbon::now('America/Chicago'),
            'updated_at' => Carbon::now('America/Chicago')
        ];
    }
}
