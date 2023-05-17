<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administator',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'roles' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@mail.com',
                'password' => Hash::make('password'),
                'roles' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($user);
    }
}
