<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'group_id' => 'e34r5t1q',
                'group_name' => 'The Pro',
                'group_title' => 'The Student Management System',
            ],
            [
                'group_id' => '3ed45t6y',
                'group_name' => 'We are',
                'group_title' => 'Hospital Management System',
            ],
            [
                'group_id' => '3g57knt1',
                'group_name' => 'Any way',
                'group_title' => 'Bank System',
            ],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
