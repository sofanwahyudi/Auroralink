<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Model\Tags::class, function (Faker $faker) {
    return [
        'tags' => $faker->unique()->sentence($nbWords = 6),
    ];
});
