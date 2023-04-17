<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $name = $this->faker->firstName . ' ' . $this->faker->lastName,
            'email' => strtolower(str_replace(' ', '.', $name)) . '@' . $this->faker->safeEmailDomain(),
            'phone' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->dateTimeBetween('-80 years', '-2 years', 'America/Chicago'),
            'created_at' => Carbon::now('America/Chicago'),
            'updated_at' => Carbon::now('America/Chicago')
        ];
    }
}
