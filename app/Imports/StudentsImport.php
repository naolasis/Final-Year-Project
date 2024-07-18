<?php
namespace App\Imports;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Check if the username already exists
        if (User::where('username', $row['username'])->exists()) {
            return null; // Skip this row
        }

        // Generate a random password
        $randomPassword = Str::random(8);

        // Hash the password
        $hashedPassword = Hash::make($randomPassword);

        // Create a new user record
        $user = User::create([
            'username' => $row['username'],
            'password' => $hashedPassword,
            'role' => 'student',
            'fullname' => $row['fullname'],
            'email' => $row['email'],
            'image' => 'images/default_image.png',
        ]);

        // Create a new student record
        return new Student([
            'user_id' => $user->id,
            'group_id' => null, // Default value for group_id
            'temp_password' => $randomPassword,
        ]);
    }
}
