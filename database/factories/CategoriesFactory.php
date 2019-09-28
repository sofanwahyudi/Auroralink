<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Model\Categories::class, function (Faker $faker) {
    return [
        'nama' => $faker->jobTitle,
        'keterangan' => $faker->name,
        'biaya' => 0,
    ];
});
