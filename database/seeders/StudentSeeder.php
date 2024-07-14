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
        $user1 = User::where('username', 'student2')->first();
        $user2 = User::where('username', 'student3')->first();
        $user3 = User::where('username', 'student4')->first();
        $user4 = User::where('username', 'student5')->first();


        
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
        if ($user1) {
            $student = new Student([
                // student data
            ]);

            $student->user_id = $user1->id;
            $student->save();
        }
        if ($user2) {
            $student = new Student([
                // student data
            ]);

            $student->user_id = $user2->id;
            $student->save();
        }
        if ($user3) {
            $student = new Student([
                // student data
            ]);

            $student->user_id = $user3->id;
            $student->save();
        }
        if ($user4) {
            $student = new Student([
                // student data
            ]);

            $student->user_id = $user4->id;
            $student->save();
        }
    }

}
