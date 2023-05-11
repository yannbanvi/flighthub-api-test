<?php

namespace App\Http\Filters;

class FlightFilterFactory
{
    public static function getFilter(string $type): FlightFilter{
        return match ($type){
            "rt" => new RoundTripFlightFilter(),
            default => new OneWayFlightFilter()
        };
    }
}
