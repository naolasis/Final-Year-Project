<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notice;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //call the Seeders
        $this->call(UserTableSeeder::class);
        $this->call(NoticeSeeder::class);
    }
}
