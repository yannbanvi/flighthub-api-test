<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string("number", 10);
            $table->double("price");
            $table->foreignIdFor(\App\Models\Airline::class)->constrained();
            $table->foreignIdFor(\App\Models\Airport::class,"departure_airport_id")
                ->constrained("airports","id", "flight_dep_air_id");
            $table->dateTime("departure_datetime");
            $table->foreignIdFor(\App\Models\Airport::class,"arrival_airport_id")
                ->constrained("airports","id", "flight_arr_air_id");
            $table->dateTime("arrival_datetime");
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(\App\Models\Airline::class);
            $table->dropConstrainedForeignIdFor(\App\Models\Airport::class,"departure_airport_id");
            $table->dropConstrainedForeignIdFor(\App\Models\Airport::class,"arrival_airport_id");
        });
        Schema::dropIfExists('flights');
    }
};
