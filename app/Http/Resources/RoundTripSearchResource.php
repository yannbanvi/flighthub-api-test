<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoundTripSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "flight_id" => $this->id,
            "flight_number" => $this->number,
            "flight_price" => $this->price,
            "airline" =>[
                "id" => $this->airline_id,
                "name" => $this->airline_name,
                "code" => $this->airline_code
            ],
            "departure_airport" =>[
                "id" => $this->departure_airport_id,
                "name" => $this->departure_airport_name,
                "code" => $this->departure_airport_code,
                "latitude" => $this->departure_airport_latitude,
                "longitude" => $this->departure_airport_longitude,
                "city" => $this->departure_airport_city_name,
                "timezone" => $this->departure_airport_timezone,
                "date" => $this->departure_airport_date,
                "time" => $this->departure_airport_time,
            ],
            "arrival_airport" =>[
                "id" => $this->arrival_airport_id,
                "name" => $this->arrival_airport_name,
                "code" => $this->arrival_airport_code,
                "latitude" => $this->arrival_airport_latitude,
                "longitude" => $this->arrival_airport_longitude,
                "city" => $this->arrival_airport_city_name,
                "timezone" => $this->arrival_airport_timezone,
                "date" => $this->arrival_airport_date,
                "time" => $this->arrival_airport_time
            ]
        ];
    }
}
