<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \Illuminate\Support\Facades\DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::statement($this->dropView());
    }

    private function createView(): string{
        return <<<'EOT'
            CREATE VIEW view_one_way_flight_search AS
                SELECT
                    flights.id,
                    flights.number,
                    flights.price,

                    flights.airline_id,
                    (SELECT name FROM airlines WHERE airlines.id = flights.airline_id ) AS airline_name,
                    (SELECT code FROM airlines WHERE airlines.id = flights.airline_id ) AS airline_code,

                    flights.departure_airport_id,
                    (SELECT code FROM airports WHERE airports.id = flights.departure_airport_id ) AS departure_airport_code,
                    (SELECT name FROM airports WHERE airports.id = flights.departure_airport_id ) AS departure_airport_name,
                    (SELECT latitude FROM airports WHERE airports.id = flights.departure_airport_id ) AS departure_airport_latitude,
                    (SELECT longitude FROM airports WHERE airports.id = flights.departure_airport_id ) AS departure_airport_longitude,
                    (SELECT name FROM cities WHERE cities.id = (
                        SELECT city_id FROM airports WHERE airports.id = flights.departure_airport_id
                    ) ) AS departure_airport_city_name,
                    (SELECT timezone FROM airports WHERE airports.id = flights.departure_airport_id ) AS departure_airport_timezone,
                    DATE_FORMAT(flights.departure_datetime, "%Y-%m-%d") as departure_airport_date,
                    DATE_FORMAT(flights.departure_datetime, "%H:%i") as departure_airport_time,

                    flights.arrival_airport_id,
                    (SELECT code FROM airports WHERE airports.id = flights.arrival_airport_id ) AS arrival_airport_code,
                    (SELECT name FROM airports WHERE airports.id = flights.arrival_airport_id ) AS arrival_airport_name,
                    (SELECT latitude FROM airports WHERE airports.id = flights.arrival_airport_id ) AS arrival_airport_latitude,
                    (SELECT longitude FROM airports WHERE airports.id = flights.arrival_airport_id ) AS arrival_airport_longitude,
                    (SELECT name FROM cities WHERE cities.id = (
                        SELECT city_id FROM airports WHERE airports.id = flights.arrival_airport_id
                    ) ) AS arrival_airport_city_name,
                    (SELECT timezone FROM airports WHERE airports.id = flights.arrival_airport_id ) AS arrival_airport_timezone,
                    DATE_FORMAT(flights.arrival_datetime, "%Y-%m-%d") as arrival_airport_date,
                    DATE_FORMAT(flights.arrival_datetime, "%H:%i") as arrival_airport_time

                FROM flights;
            EOT;

    }

    private function dropView() : string{
        return <<<'EOT'
            DROP VIEW IF EXISTS `view_one_way_flight_search`;
            EOT;
    }
};
