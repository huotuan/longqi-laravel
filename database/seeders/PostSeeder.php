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
            Post::factory(100)->create()->map(function ($post){
                $post->image()->create(['url' => app(Faker::class)->url]);
            });
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
