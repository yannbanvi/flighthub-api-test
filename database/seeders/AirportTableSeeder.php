<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $airports = [
            [
                "name" => "Toronto Pearson International Airport",
                "code" => "YYZ",
                "latitude" => 43.6777,
                "longitude" => -79.6248,
                "timezone" => "America/Toronto",
                "city_id" => 1
            ],
            [
                "name" => "Vancouver International Airport",
                "code" => "YVR",
                "latitude" => 49.1967,
                "longitude" => -123.1815,
                "timezone" => "America/Vancouver",
                "city_id" => 3
            ],
            [
                "name" => "Calgary International Airport",
                "code" => "YYC",
                "latitude" => 51.1139,
                "longitude" => -114.0192,
                "timezone" => "America/Edmonton",
                "city_id" => 4
            ],
            [
                "name" => "Montréal-Pierre Elliott Trudeau International Airport",
                "code" => "YUL",
                "latitude" => 45.4706,
                "longitude" => -73.7408,
                "timezone" => "America/Toronto",
                "city_id" => 2
            ],
            [
                "name" => "Edmonton International Airport",
                "code" => "YEG",
                "latitude" => 53.3097,
                "longitude" => -113.5808,
                "timezone" => "America/Edmonton",
                "city_id" => 5
            ],
            [
                "name" => "Ottawa Macdonald-Cartier International Airport",
                "code" => "YOW",
                "latitude" => 45.3208,
                "longitude" => -75.6703,
                "timezone" => "America/Toronto",
                "city_id" => 6
            ],
            [
                "name" => "Québec City Jean Lesage International Airport",
                "code" => "YQB",
                "latitude" => 46.7911,
                "longitude" => -71.3933,
                "timezone" => "America/Toronto",
                "city_id" => 8
            ],
            [
                "name" => "Winnipeg James Armstrong Richardson International Airport",
                "code" => "YWG",
                "latitude" => 49.9097,
                "longitude" => -97.2392,
                "timezone" => "America/Winnipeg",
                "city_id" => 7
            ]
        ];

        Airport::insert($airports);

    }
}
