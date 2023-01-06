<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            User::factory(10)->create()->map(function ($post){
                $post->image()->create(['url' => app(Faker::class)->url]);
            });;
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
