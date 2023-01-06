<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TagSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            VideoSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
        ]);
    }
}
