<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fullname' => 'Selam Tesfaye',
                'username' => 'uget/123/12',
                'email' => 'selam@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'student',
                'image' => 'path',
            ],
            [
                'fullname' => 'John Doe',
                'username' => 'uget/456/12',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'role' => 'committee_head',
                'image' => 'path',
            ],
        ];

        // Insert the sample users into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
