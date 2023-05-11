<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        "number",
        "price",
        "airline_id",
        "departure_airport_id",
        "arrival_airport_id",
        "departure_datetime",
        "arrival_datetime"
    ];

    public $timestamps = false;

    protected $casts = [
        "departure_datetime" => "datetime",
        "arrival_datetime" => "datetime"
    ];

    public function airline(): BelongsTo{
        return $this->belongsTo(Airline::class);
    }

    public function departureAirport(): BelongsTo{
        return $this->belongsTo(Airport::class, "departure_airport_id");
    }

    public function arrivalAirport(): BelongsTo{
        return $this->belongsTo(Airport::class,"arrival_airport_id");
    }
}
