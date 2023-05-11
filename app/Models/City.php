<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name", "code", "containable_id", "containable_type"
    ];

    public function containable(): MorphTo{
        return $this->morphTo();
    }
}
