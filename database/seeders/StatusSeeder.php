<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'PENDING', 'color' => 'text-dark', 'bg_color' => 'bg-dark'],
            ['name' => 'ONE MY WAY', 'color' => 'text-white', 'bg_color' => 'bg-warning'],
            ['name' => 'ARRIVED', 'color' => 'text-white', 'bg_color' => 'bg-warning'],
            ['name' => 'POB', 'color' => 'text-dark', 'bg_color' => 'bg-warning'],
            ['name' => 'COMPLETED', 'color' => 'text-white', 'bg_color' => 'bg-success'],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }

//     PENDING 

// ONE MY WAY 
// ARRIVED 
// POB
// Completed
}
