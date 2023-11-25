<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],

            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => bcrypt('password'),//'$2y$10$7ZqYDrsotaZK8IhmYV8TWuQ6v.Yk2gieQ.pRB8w9zguTrvma48MWK',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
