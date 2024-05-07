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
                'fullname' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'image' => 'images/admin.jpg',
            ],
            [
                'fullname' => 'Committee Head1',
                'username' => 'head',
                'email' => 'head1@example.com',
                'password' => Hash::make('head123'),
                'role' => 'committee_head',
                'image' => 'images/committee_head.jpg',
            ],
            [
                'fullname' => 'Committee Member1',
                'username' => 'member1',
                'email' => 'member1@example.com',
                'password' => Hash::make('member123'),
                'role' => 'committee_member',
                'image' => 'images/committee_member.jpg',
            ],
            [
                'fullname' => 'Advisor1',
                'username' => 'advisor1',
                'email' => 'advisor1@example.com',
                'password' => Hash::make('advisor123'),
                'role' => 'advisor',
                'image' => 'images/advisor.jpg',
            ],
            [
                'fullname' => 'Student1',
                'username' => 'student1',
                'email' => 'student1@example.com',
                'password' => Hash::make('student123'),
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
