<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->create(
            [
            'name' => '超级管理员',
            ]
        );
        Role::query()->create(

            [
                'name' => '编辑',
            ]

        );

        Role::query()->create(

            [
                'name' => '普通管理员',
            ]
        );

        Role::query()->create(
            [
                'name' => '测试',
            ]
        );
    }
}
