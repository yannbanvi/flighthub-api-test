<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                "name" => "Toronto",
                "code" => "YYZ",
                "containable_id" => 9,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Montréal",
                "code" => "YUL",
                "containable_id" => 13,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Vancouver",
                "code" => "YVR",
                "containable_id" => 2,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Calgary",
                "code" => "YYC",
                "containable_id" => 1,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Edmonton",
                "code" => "YEG",
                "containable_id" => 1,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Ottawa",
                "code" => "YOW",
                "containable_id" => 9,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Winnipeg",
                "code" => "YWG",
                "containable_id" => 3,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Québec City",
                "code" => "YQB",
                "containable_id" => 13,
                "containable_type" => "App\\Models\\Region"
            ],
            [
                "name" => "Hamilton",
                "code" => "YHM",
                "containable_id" => 9,
                "containable_type" => "App\\Models\\Region"
            ]
        ];

        City::insert($cities);

    }
}
