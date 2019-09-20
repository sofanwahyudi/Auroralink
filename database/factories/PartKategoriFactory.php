<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Kategori;
use Faker\Generator as Faker;

$factory->define(App\Model\Kategori::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'deskripsi' =>  $faker->jobTitle,
    ];
});
