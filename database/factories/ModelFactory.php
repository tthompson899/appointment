<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Appointment;
use App\UserAppointment;
use App\Type;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'date_of_birth' => $faker->dateTimeBetween($startDate = '-80 years', $endDate = '-2 years', $timezone = null), 
        // birth date sould be for 2yrs - 80
    ];
});



$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'type_id' => rand(Type::first()->id, Type::count()),
        'date_of_appointment' => $faker->dateTimeBetween($startDate = '2020-07-31', $endDate = '+2 years', $timezone = null),
        'completed' => $faker->boolean(),
        'cancelled' => $faker->boolean(),
        'no_show' => $faker->boolean()
    ];
});

$factory->define(UserAppointment::class, function (Faker $faker) {
    return [
        'user_id' => rand(User::first()->id, User::count()),
        'appointment_id' => rand(Appointment::first()->id, Appointment::count())
    ];
});
