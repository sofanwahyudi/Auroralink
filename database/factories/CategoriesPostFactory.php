<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Model\PostCategories::class, function (Faker $faker) {
    return [
        'category' => $faker->unique()->sentence($nbWords = 6),
    ];
});
