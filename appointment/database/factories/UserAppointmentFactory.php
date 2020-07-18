<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'date_of_birth' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
    ];
});

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date_of_appointment' => $faker->dateTimeBetween($startDate = '2020-07-31', $endDate = '+2 years', $timezone = null),
        'completed' => $faker->boolean(),
        'cancelled' => $faker->boolean(),
        'no-show' => $faker->boolean()
    ];
});

// factory(App\Type::class)->create([
//     ['name' => 'annual cleaning'],
//     ['name' => 'bonding'],
//     ['name' => 'bridges'],
//     ['name' => 'crowns'],
//     ['name' => 'dentures'],
//     ['name' => 'fillings'],
//     ['name' => 'hygiene'],
//     ['name' => 'implants'],
//     ['name' => 'inlays'],
//     ['name' => 'invisalign_vid'],
//     ['name' => 'orthodontics'],
//     ['name' => 'partial dentures'],
//     ['name' => 'perodontal'],
//     ['name' => 'TMJ'],
//     ['name' => 'root canal'],
//     ['name' => 'veneers'],
//     ['name' => 'whitening'],
// ]);
