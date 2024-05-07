<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Committee;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get specific users from the users table based on some criteria
        $users = User::where('role', 'committee_head')->orWhere('role', 'committee_member')->get();

        foreach ($users as $user) {
            // Create a committee for the user
            $committee = new Committee([
                'type' => $user->role, // Set the committee type based on the user's role
            ]);

            $committee->user_id = $user->id;
            $committee->save();
        }
    }
}
