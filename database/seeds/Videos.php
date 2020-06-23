<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $images = [
            '1592163731SBC8QCE2RN.png',
            'bliss-night.jpg',
            '1592078210eipdtxFdzj.jpg',
            '1592009476W2Q3gJ0awc.png'
        ];

        $youtube = [
            'https://www.youtube.com/watch?v=AYj3yTPjwz8&t=7s',
            'https://www.youtube.com/watch?v=UF8uR6Z6KLc',
            'https://www.youtube.com/watch?v=MxZpaJK74Y4',
            'https://www.youtube.com/watch?v=BmYv8XGl-YU'
        ];

        $ids = [1,2,3,4,5,6,7,8,9];

        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des' => $faker->name,
                'cat_id' => 1,
                'youtube' => $youtube[rand(0,3)],
                'published' => rand(0,1),
                'image' => $images[rand(0,3)],
                'des' => $faker->paragraph,
                'user_id' => 1
            ];
            $video = \App\Models\Video::create($array);
            $video->skills()->sync(array_rand($ids , 2));
            $video->tags()->sync(array_rand($ids , 3));
        }
    }
}