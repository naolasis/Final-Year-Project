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
                'fullname' => 'Abe Kebe',
                'username' => 'abe',
                'email' => 'abe@gmail.com',
                'password' => Hash::make('abe123'),
                'role' => 'admin',
                'image' => 'images/admin.jpg',
            ],
            [
                'fullname' => 'John Doe',
                'username' => 'john',
                'email' => 'john@example.com',
                'password' => Hash::make('john123'),
                'role' => 'committee_head',
                'image' => 'images/committee_head.jpg',
            ],
            [
                'fullname' => 'Bill Gates',
                'username' => 'bill',
                'email' => 'bill@gmail.com',
                'password' => Hash::make('bill123'),
                'role' => 'advisor',
                'image' => 'images/advisor.jpg',
            ],
            [
                'fullname' => 'Selam Tesfaye',
                'username' => 'selam',
                'email' => 'selam@gmail.com',
                'password' => Hash::make('selam123'),
                'role' => 'student',
                'image' => 'images/student.jpg',
            ],
        ];

        // Insert the sample users into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
