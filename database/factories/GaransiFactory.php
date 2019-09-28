<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Model\Garansi::class, function (Faker $faker) {
    return [
        'nama' => 'Bergaransi',
    ];
});
