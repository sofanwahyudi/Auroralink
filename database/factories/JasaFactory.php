<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Jasa::class, function (Faker $faker) {
    return [
        'nama' => 'Vacant',
        'gambar' => null,
        'deskripsi' => 'Vacant',
        'jam_support' => 'Vacant',
        'fitur' => 'Vacant',
        'benefit' => 'Vacant',
        'harga' => 'Vacant',
        'team_id' => null,
        'job_id' => null ,
    ];
});
