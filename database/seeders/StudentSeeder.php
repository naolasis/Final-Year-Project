<?php

namespace Database\Seeders;

use App\Models\Group;
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
        $user = User::where('username', 'student1')->first();
        
        $group = Group::where('group_name', 'Test Group1')->first();

        // Check if both the user and the group exist
        if ($user && $group) {
            $student = new Student([
                // student data
            ]);

            $student->user_id = $user->id;
            $student->group_id = $group->id;
            $student->save();
        }
    }

}
