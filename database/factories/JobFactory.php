<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Job::class, function (Faker $faker) {
    return [
        'nama' => $faker->jobTitle,
        'deskripsi' => $faker->jobTitle,
    ];
});
