<?php

namespace Database\Seeders;

use App\Models\Airline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirlineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $airlines = [
            ['name' => 'Air Canada', 'code' => 'AC'],
            ['name' => 'WestJet', 'code' => 'WS'],
            ['name' => 'Air Transat', 'code' => 'TS'],
            ['name' => 'Porter Airlines', 'code' => 'PD'],
            ['name' => 'Delta Air Lines', 'code' => 'DL'],
            ['name' => 'American Airlines', 'code' => 'AA'],
            ['name' => 'British Airways', 'code' => 'BA'],
            ['name' => 'Lufthansa', 'code' => 'LH'],
            ['name' => 'Air France', 'code' => 'AF'],
            ['name' => 'KLM Royal Dutch Airlines', 'code' => 'KL'],
        ];

        Airline::insert($airlines);
    }
}
