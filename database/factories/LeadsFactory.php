<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Leads::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'email' =>  $faker->email,
        'telepon' => $faker->phoneNumber,
        'komentar' => $faker->bs,
    ];
});
