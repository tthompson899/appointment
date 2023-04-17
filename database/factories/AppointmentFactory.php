<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Appointment>
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
        return [
            'date_of_appointment' => $this->faker->dateTimeBetween(Carbon::now('America/Chicago'), '+2 years', 'America/Chicago'),
            'completed' => $this->faker->boolean(false),
            'cancelled' => $this->faker->boolean(false),
            'no_show' => $this->faker->boolean(false),
            'created_at' => Carbon::now('America/Chicago'),
            'updated_at' => Carbon::now('America/Chicago')
        ];
    }
}
