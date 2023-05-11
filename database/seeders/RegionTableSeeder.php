<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::insert([
            ["name" => "Alberta", "code" => "AB", "country_id"=> 1],
            ["name" => "British Columbia", "code" => "BC", "country_id"=> 1],
            ["name" => "Manitoba", "code" => "MB", "country_id"=> 1],
            ["name" => "New Brunswick", "code" => "NB", "country_id"=> 1],
            ["name" => "Newfoundland and Labrador", "code" => "NL", "country_id"=> 1],
            ["name" => "Northwest Territories", "code" => "NT", "country_id"=> 1],
            ["name" => "Nova Scotia", "code" => "NS", "country_id"=> 1],
            ["name" => "Nunavut", "code" => "NU", "country_id"=> 1],
            ["name" => "Ontario", "code" => "ON", "country_id"=> 1],
            ["name" => "Prince Edward Island", "code" => "PE", "country_id"=> 1],
            ["name" => "Quebec", "code" => "QC", "country_id"=> 1],
            ["name" => "Saskatchewan", "code" => "SK", "country_id"=> 1],
            ["name" => "Yukon", "code" => "YT", "country_id"=> 1]
        ]);
    }
}
