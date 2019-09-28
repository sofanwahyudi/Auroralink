<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Model\Team::class, function (Faker $faker) {
    return [
        'nik' => $faker->randomDigit,
        'foto' => null,
        'nama' => $faker->title,
        'alamat' => $faker->address,
        'email' => $faker->email,
        'telepon' => $faker->e164PhoneNumber,
        'dept_id' => 0,
        'devisi_id' => 0,
        'users_id' => 0,
    ];
});
