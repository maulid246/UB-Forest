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
        Schema::create('gauges', function (Blueprint $table) {
            $table->id();
            $table->float('temperature'); // Kolom untuk suhu
            $table->float('humidity');    // Kolom untuk kelembapan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gauges');
    }
};
