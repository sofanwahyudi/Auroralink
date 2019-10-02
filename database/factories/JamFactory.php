<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Jam::class, function (Faker $faker) {
    return [
        'nama' => $faker->title,
        'jam_start' => $faker->time,
        'jam_end' => $faker->time,
    ];
});
