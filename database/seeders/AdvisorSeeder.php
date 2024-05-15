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
        $user1 = User::where('username', 'advisor2')->first();


        // Check if the user exists
        if ($user) {
            $advisor = new Advisor([
                'description' => 'I am very respectfull advisor that have good performance in my acadamic reputaion. with long time experiance.',
            ]);

            $advisor->user_id = $user->id;
            $advisor->save();
        }

        if ($user1) {
            $advisor = new Advisor([
                'description' => 'I am very respectfull advisor that have good performance in my acadamic reputaion. with long time experiance.',
            ]);

            $advisor->user_id = $user1->id;
            $advisor->save();
        }
    }
}
