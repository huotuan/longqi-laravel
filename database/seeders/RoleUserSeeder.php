<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->get()->map(function ($user){
           $user->roles()->syncWithPivotValues(Role::query()->pluck('id'),['position'=>mt_rand(1,9)]);
        });
    }
}
