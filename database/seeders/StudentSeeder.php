<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the specific user from the users table
        $user = User::where('username', 'student1')->first();

        // Check if the user exists
        if ($user) {
            $student = new Student([
                // student data
            ]);

            $student->user_id = $user->id;
            $student->save();
        }
    }
}
