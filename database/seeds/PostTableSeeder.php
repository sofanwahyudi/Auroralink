<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset posts table
        DB::table('post')->truncate();

        //generate 10 dummy posts
        $image = "http://placehold.it/750x300";

        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2018, 7, 10, 11);

        for($i=1; $i<=10; $i++){
	        $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate = clone($date);

        	$posts[] = [
                'users_id' => rand(1,3),
                'category_id' => rand(1,3),
        		'title' => $faker->sentence(rand(8,12)),
        		'content' => $faker->paragraphs(rand(10,15), true),
        		'slug' => $faker->slug(),
        		'image' => rand(0,1) == 1 ? $image : null,
        		'created_at' => $createdDate,
                'updated_at' => $createdDate,
                'view_count' => rand(1,10) * 10,
                'published_at' => $i < 5 ? $publishedDate : ( rand(0,1) == 0 ? NULL : $publishedDate->addDays(4)),
        	];
        }

        DB::table('post')->insert($posts);

    }
}
