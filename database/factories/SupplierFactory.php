<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Supplier::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'alamat' => $faker->address,
        'email' =>  $faker->email,
        'telepon' => $faker->phoneNumber,
        'status' => 'active',
    ];
});
