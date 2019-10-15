<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;



$factory->define(\App\model\PostTags::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween($min = 1, $max = 10),
        'tag_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
