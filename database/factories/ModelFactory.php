<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\User;
use App\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $name = $faker->firstName . ' ' . $faker->lastName,
//         'email' => strtolower(str_replace(' ', '.', $name)) . '@' . $faker->safeEmailDomain(),
//         'phone' => $faker->phoneNumber,
//         'date_of_birth' => $faker->dateTimeBetween('-80 years', '-2 years', 'America/Chicago'),
//         'created_at' => Carbon::now('America/Chicago'),
//         'updated_at' => Carbon::now('America/Chicago')
//     ];
// });

// $factory->define(Appointment::class, function (Faker $faker) {
//     return [
//         'user_id' => rand(User::first()->id, User::count()),
//         'type_id' => rand(Type::first()->id, Type::count()),
//         'date_of_appointment' => $faker->dateTimeBetween('2020-10-20', '+2 years', 'America/Chicago'),
//         'completed' => $faker->boolean(false),
//         'cancelled' => $faker->boolean(false),
//         'no_show' => $faker->boolean(false),
//         'created_at' => Carbon::now('America/Chicago'),
//         'updated_at' => Carbon::now('America/Chicago')
//     ];
// });
