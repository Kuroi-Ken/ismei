<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Fixed — always visible even when empty
            [
                'slug'         => 'call_for_submission',
                'label'        => 'Call for Submissions',
                'type'         => 'fixed',
                'title'        => 'Call for Submissions',
                'body'         => null,
                'release_date' => null,
                'is_active'    => true,
                'order'        => 1,
            ],
            [
                'slug'         => 'schedule',
                'label'        => 'Schedule',
                'type'         => 'fixed',
                'title'        => 'Schedule',
                'body'         => null,
                'release_date' => null,
                'is_active'    => true,
                'order'        => 2,
            ],
            // Optional — hidden (with "no info" notice) when empty
            [
                'slug'         => 'announcement_1',
                'label'        => 'Announcement 1',
                'type'         => 'optional',
                'title'        => null,
                'body'         => null,
                'release_date' => null,
                'is_active'    => true,
                'order'        => 3,
            ],
            [
                'slug'         => 'announcement_2',
                'label'        => 'Announcement 2',
                'type'         => 'optional',
                'title'        => null,
                'body'         => null,
                'release_date' => null,
                'is_active'    => true,
                'order'        => 4,
            ],
            [
                'slug'         => 'announcement_3',
                'label'        => 'Announcement 3',
                'type'         => 'optional',
                'title'        => null,
                'body'         => null,
                'release_date' => null,
                'is_active'    => true,
                'order'        => 5,
            ],
        ];

        foreach ($items as $item) {
            Information::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}