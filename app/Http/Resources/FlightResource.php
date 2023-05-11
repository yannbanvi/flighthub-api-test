<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "number" => $this->number,
            "price" => $this->price,
            "airline" => $this->airline,
            "departure_airport" => $this->departureAirport->code,
            "departure_datetime" => $this->departure_datetime->format("Y-m-d H:i"),
            "arrival_airport_id" => $this->arrivalAirport->code,
            "arrival_datetime" => $this->arrival_datetime->format("Y-m-d H:i")
        ];
    }
}
