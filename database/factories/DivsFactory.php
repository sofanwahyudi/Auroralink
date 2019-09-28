<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Devisi::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'keterangan' => $faker->name,
    ];
});
