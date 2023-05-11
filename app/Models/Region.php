<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "code", "country_id"
    ];

    public $timestamps = false;

    public function country(): BelongsTo{
        return $this->belongsTo(Country::class);
    }

    public function cities(): MorphMany{
        return $this->morphMany(City::class, "containable");
    }
}
