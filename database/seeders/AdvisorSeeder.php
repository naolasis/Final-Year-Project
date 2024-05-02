<?php

namespace Database\Seeders;

use App\Models\Advisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advisors = [
            [
                'username' => 'Bill',
            ],
        ];

        foreach ($advisors as $advisor) {
            Advisor::create($advisor);
        }
    }
}
