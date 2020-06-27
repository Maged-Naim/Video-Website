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
            'm2_1592973812.jpeg',
            'm5_1592973721.jpeg',
            'm_1592974312.png',
            'm_1592973597.jpeg'
        ];

        $videourl = [
            '1593054858FiMelab4Wy.mp4',
            '1593056182xeNAVbSp4g.mp4',
            '1593057285afnFEecRt4.mp4',
            '1593104046eTaZOdjq2Z.mp4',
        ];

        $ids = [1,2,3,4,5,6,7,8,9];

        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
                'cat_id' => 1,
                'video' => $videourl[rand(0,3)],
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