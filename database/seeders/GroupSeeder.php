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
                'group_id' => 'testgroupid1',
                'group_name' => 'Test group name',
                'group_title' => 'Test Group Name',
            ],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
