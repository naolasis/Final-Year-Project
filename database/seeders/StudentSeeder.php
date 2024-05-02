<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'username' => 'selam',
                'student_attribute1' => 'attribute1',
                'student_attribute2' => 'attribute2',
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
