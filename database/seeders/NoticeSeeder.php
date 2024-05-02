<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notices = [
            [
            'title' => 'Important Announcement',
            'content' => 'Lorem ipsum dolor sit amet...',
            'posted_by' => 'someone',
            'posted_at' => now(),
            'status' => 'active',
            ],
            [
            'title' => 'Another Announcement',
            'content' => 'Other Lorem ipsum dolor sit amet...',
            'posted_by' => 'otherone',
            'posted_at' => now(),
            'status' => 'archived',
            ],
        ];

        // Insert the sample users into the database
        foreach ($notices as $notice) {
            Notice::create($notice);
        }
        
    }
}