<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Video::factory(100)->create()->map(function ($video){
                $comments = [];
                $i = mt_rand(1,3);
                while ($i >0 ){
                    $i--;
                    $comments[] = [
                        'body'=> app(Faker::class)->paragraph,
                        'user_id'=> User::query()->inRandomOrder()->first()->id,
                    ];
                }

                $video->comments()->createMany($comments);
            });
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
