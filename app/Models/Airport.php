<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "code", "latitude", "longitude", "timezone", "city_id"
    ];

    public $timestamps = false;
}
