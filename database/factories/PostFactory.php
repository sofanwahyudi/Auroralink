<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Post::class, function (Faker $faker) {
    return [
        'slug' => $faker->unique()->word,
        'title' => $faker->unique()->sentence($nbWords = 6),
        'content' => $faker->text,
        'image' => $faker->randomElement($array = array ('blog-one.jpg','blog-two.jpg','blog-three.jpg')),
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
