<?php

namespace App\Http\Services;

use App\Http\CustomExceptions\TripTypeNotSupportedException;
use App\Http\Filters\FlightFilter;
use App\Http\Filters\FlightFilterFactory;
use App\Http\Filters\OneWayFlightFilter;
use App\Http\Filters\RoundTripFlightFilter;
use App\Http\Resources\OneWayFlightSearchResource;
use App\Models\OneWayFlightSearch;
use Illuminate\Http\Request;

class FlightService
{
    /**
     * @throws TripTypeNotSupportedException
     */
    public function searchFlight(Request $request){
        $trip_type = $request->trip_type ?? "";

        if(isset($trip_type) && !in_array(strtolower($trip_type), ["ow", "rt"])){
            throw new TripTypeNotSupportedException("We only support OW and RT filters.");
        }

        $filter = FlightFilterFactory::getFilter($trip_type );
        $queryItems = $filter->transform($request);

        if($filter instanceof RoundTripFlightFilter){
            return $this->searchForRoundTripFlights($filter);
        }

        return $this->searchForOneWayFlights($queryItems);
    }

    private function searchForOneWayFlights(array $queryItems){
        return OneWayFlightSearchResource::collection(
            OneWayFlightSearch::where($queryItems["query"])->paginate($queryItems["pagination"]["per_page"])
        );
    }

    private function searchForRoundTripFlights(array $queryItems){
        // TODO: implements the roundtrip here
        // TODO: retrieve direct flights
        // TODO: search for connection flights
    }
}
