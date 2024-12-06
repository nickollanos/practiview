<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                [
                    'title' => 'Cita #1',
                    'start' => '2024-12-05 08:00:00',
                    'end' => '2024-12-05 11:00:00',
                ],
                [
                    'title' => 'Cita #2',
                    'start' => '2024-12-06 08:00:00',
                    'end' => '2024-12-06 11:00:00',
                ],
                [
                    'title' => 'Cita #3',
                    'start' => '2024-12-07 08:00:00',
                    'end' => '2024-12-07 11:00:00',
                ],
                [
                    'title' => 'Cita #4',
                    'start' => '2024-12-09 08:00:00',
                    'end' => '2024-12-09 11:00:00',
                ],
            ]
            
        ];
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
