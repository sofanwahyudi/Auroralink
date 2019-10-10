<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Section::class, function (Faker $faker) {
    return [
        'title' => 'ini judul',
        'sub_title' => 'ini sub judul',
        'content' => 'ini content',
        'image' => null,
    ];
});
