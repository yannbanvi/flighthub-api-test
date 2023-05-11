

## FlightHub-API-DEMO

This is a sample project of building an api for plane ticket search.
It's still an ongoing project. 

### THE APPROACH used for filtering

ENDPOINT : **api/v1/trip?departure_airport[eq]=YYZ&departure_date[eq]=2023-05-11&trip_type=ow&page=1&per_page=10&airline[eq]=LH**

- We have a FlightFilter class and factory that filter depending on wether it's One Way or Round trip.
- We do filtering with query parameters and FlightFilter is responsible of transforming the query to an array of conditions for Eloquent where clauses
- There is a OneWayFlightSearch Test class to test searching.
- **Only One way flight is implemented as of now**
