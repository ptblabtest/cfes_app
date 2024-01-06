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
        Schema::create('forest_areas', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->foreignId('location_id')->constrained('locations');
            $table->decimal('util_amount', 15, 2);
            $table->decimal('prot_amount', 15, 2);
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forest_areas');
    }
};
