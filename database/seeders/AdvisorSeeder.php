<?php

namespace Database\Seeders;

use App\Models\Advisor;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the specific user from the users table
        $user = User::where('username', 'advisor1')->first();

        // Check if the user exists
        if ($user) {
            $advisor = new Advisor([
                // advisor data
            ]);

            $advisor->user_id = $user->id;
            $advisor->save();
        }
    }
}
