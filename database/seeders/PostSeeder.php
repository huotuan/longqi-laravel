<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Post::factory(100)->create()->map(function ($post) {
                $post->image()->create(['url' => app(Faker::class)->url]);

                $comments = [];
                $i = mt_rand(1,3);
                while ($i >0 ){
                    $i--;
                    $comments[] = [
                        'body'=> app(Faker::class)->paragraph,
                        'user_id'=> User::query()->inRandomOrder()->first()->id,
                    ];
                }

                $post->comments()->createMany($comments);
            });
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
