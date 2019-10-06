<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Model\Bagian::class, function (Faker $faker) {
    return [
        'nama' => $faker->jobTitle,
        'devisi_id' => $faker->randomElement(['10', '12', '13', '14', '15', '16', '17', '18']),
    ];
});
