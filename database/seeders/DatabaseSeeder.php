<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //call the Seeders
        $this->call(UserTableSeeder::class);
        $this->call(CommitteeSeeder::class);
        $this->call(AdvisorSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(StudentSeeder::class);

    }
}
