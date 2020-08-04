<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\User;
use App\Type;
use App\UserAppointment;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'date_of_birth' => $faker->dateTimeBetween('-80 years', '-2 years', 'CDT'),
    ];
});

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'type_id' => rand(Type::first()->id, Type::count()),
        'date_of_appointment' => $faker->dateTimeBetween('2020-08-03', '+2 years', 'CDT'),
        'completed' => $faker->boolean(false),
        'cancelled' => $faker->boolean(false),
        'no_show' => $faker->boolean(false)
    ];
});

$factory->define(UserAppointment::class, function (Faker $faker) {
    return [
        'user_id' => rand(User::first()->id, User::count()),
        'appointment_id' => rand(Appointment::first()->id, Appointment::count())
    ];
});
