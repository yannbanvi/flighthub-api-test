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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string("name", 80);
            $table->string("code", 5);
            $table->foreignIdFor(\App\Models\City::class)->constrained();
            $table->double("latitude");
            $table->double("longitude");
            $table->string("timezone");
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airports', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(\App\Models\City::class);
        });
        Schema::dropIfExists('airports');
    }
};
