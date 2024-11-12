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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->integer('resident_count')->default(0); // Kolom untuk jumlah penghuni
            $table->integer('tree_count')->default(0);    // Kolom untuk jumlah pohon
            $table->integer('admin_count')->default(0);   // Kolom untuk jumlah administrator
            $table->timestamps(); // Kolom untuk timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
