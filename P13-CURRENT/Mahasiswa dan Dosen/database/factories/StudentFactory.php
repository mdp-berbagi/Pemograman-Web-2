<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;


$factory->define(Student::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);

    return [
        'name' => $faker->name($gender),
        'gender' => $gender,
        'birthday' => $faker->dateTime(),
        'start_study' => $faker->dateTimeBetween('-3 years', 'now'),
        'major_id' => rand(24, 25),
        'register_id' => rand(1, 240)
    ];
});
