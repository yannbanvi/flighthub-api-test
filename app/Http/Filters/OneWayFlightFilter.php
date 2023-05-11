<?php

namespace App\Http\Filters;

class OneWayFlightFilter extends FlightFilter {
    protected $safeParams = [
        "departure_airport" => ["eq"],
        "arrival_airport" => ["eq"],
        "departure_date" => ["eq"],
        "airline" => ["eq"],
        "total_price" => ["lt", "lte", "gt", "gte"]
    ];

    protected $columnMap = [
        "departure_airport" => "departure_airport_code",
        "departure_date" => "departure_airport_date",
        "arrival_airport" => "arrival_airport_code",
        "airline" => "airline_code",
        "total_price" => "price"
    ];

    protected $operatorMap = [
        "eq" => "=",
        "lt" => "<",
        "lte" => "<=",
        "gt" => ">",
        "gte" => ">="
    ];


}
