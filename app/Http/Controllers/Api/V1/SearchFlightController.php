<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFlightRequest;
use App\Http\Services\FlightService;

class SearchFlightController extends Controller
{
    /**
     * Handle the incoming request.
     * @throws \Throwable
     */
    public function __invoke(SearchFlightRequest $request, FlightService $flightService)
    {

        return $flightService->searchFlight($request);
    }
}
