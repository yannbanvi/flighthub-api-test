<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class OneWayFlightSearchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_search_one_way_flight_with_all_required_params(): void
    {

        $headers = [
            "Accept" => "application/json",
            "Content-type" => "application/json"
        ];

        $response = $this->get("api/v1/trip?departure_airport[eq]=YYZ&departure_date[eq]=2023-05-11&trip_type=ow", $headers);
        $response->assertJsonPath("data.0.departure_airport.code", "YYZ");
        $response->assertJsonPath("data.0.departure_airport.date", "2023-05-11");
        $response->assertStatus(200);
    }

    public function test_search_one_way_flight_with_restricted_to_airline(): void
    {

        $headers = [
            "Accept" => "application/json",
            "Content-type" => "application/json"
        ];

        $response = $this->get("api/v1/trip?airline[eq]=LH&departure_airport[eq]=YYZ&departure_date[eq]=2023-05-11&trip_type=ow", $headers);
        $response->assertJsonPath("data.0.departure_airport.code", "YYZ");
        $response->assertJsonPath("data.0.departure_airport.date", "2023-05-11");
        $response->assertJsonPath("data.0.airline.code", "LH");
        $response->assertStatus(200);
    }

    public function test_search_one_way_flight_with_price_less_than_500(): void
    {

        $headers = [
            "Accept" => "application/json",
            "Content-type" => "application/json"
        ];

        $response = $this->get("api/v1/trip?price[lt]=500&departure_airport[eq]=YYZ&departure_date[eq]=2023-05-11&trip_type=ow", $headers);
        $response->assertJsonPath("data.0.departure_airport.code", "YYZ");
        $response->assertJsonPath("data.0.departure_airport.date", "2023-05-11");
        $response->assertJsonPath("data.0.flight_price", fn (float $price) => $price < 500);
        $response->assertStatus(200);
    }

    public function test_search_one_way_flight_without_departure_airport_should_throw_error(): void
    {

        $headers = [
            "Accept" => "application/json",
            "Content-type" => "application/json"
        ];

        $response = $this->get("api/v1/trip?departure_date[eq]=2023-05-11&trip_type=ow", $headers);
        $response->assertJsonValidationErrors('departure_airport');
        $response->assertStatus(422);
    }

    public function test_search_one_way_flight_without_departure_airport_date_should_throw_error(): void
    {

        $headers = [
            "Accept" => "application/json",
            "Content-type" => "application/json"
        ];

        $response = $this->get("api/v1/trip?departure_airport[eq]=YYZ&trip_type=ow", $headers);
        $response->assertJsonValidationErrors('departure_date');
        $response->assertStatus(422);
    }

    public function test_search_one_way_flight_without_trip_type_should_throw_error(): void
    {

        $headers = [
            "Accept" => "application/json",
            "Content-type" => "application/json"
        ];

        $response = $this->get("api/v1/trip?departure_airport[eq]=YYZ&departure_date[eq]=2023-05-11", $headers);
        $response->assertJsonValidationErrors('trip_type');
        $response->assertStatus(422);
    }
}
