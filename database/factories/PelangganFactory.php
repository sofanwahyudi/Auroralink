<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Pelanggan;
use Faker\Generator as Faker;

$factory->define(\App\Model\Pelanggan::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' =>  $faker->email,
        'telepon' => $faker->phoneNumber,
        'alamat' => $faker->bs,
        'users_id' => 2,
    ];
});
