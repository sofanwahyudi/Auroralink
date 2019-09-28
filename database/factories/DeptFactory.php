<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Dept::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'keterangan' => $faker->name,
    ];
});
