<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{

    protected $model = Flight::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $depart_airport_id = random_int(1,4);
        $arrival_airport_id = random_int(5,8);
        return [
            "number" => $this->faker->randomNumber(4,true),
            "price" => $this->faker->numberBetween(70, 800),
            "airline_id" => random_int(1,9),
            "departure_airport_id" => $depart_airport_id,
            "arrival_airport_id" => $arrival_airport_id,
            "departure_datetime" => $this->faker->dateTimeBetween("-30 minutes", "now"),
            "arrival_datetime" => $this->faker->dateTimeBetween("now", "+9 hours")
        ];
    }
}
