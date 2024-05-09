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
                'group_name' => 'Test Group1',
                'project_title' => 'Project Management System',
                'description'=> 'This is a description for group 1 project.',
                'advisor_id' => 1,
            ],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}