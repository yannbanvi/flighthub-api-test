<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "code", "currency"
    ];

    public $timestamps = false;

    public function regions(): HasMany{
        return $this->hasMany(Region::class);
    }

    public function cities(): MorphMany{
        return $this->morphMany(City::class, "containable");
    }
}
