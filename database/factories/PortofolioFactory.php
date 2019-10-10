<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Portofolio::class, function (Faker $faker) {
    return [
        'title' => 'vacant',
        'deskripsi' => 'klien vacant',
        'gambar' => 'http://bit.ly/2Vpb4ZQ',
    ];
});
