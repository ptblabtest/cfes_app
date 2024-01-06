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
        Schema::create('forest_covers', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->foreignId('location_id')->constrained('locations');
            $table->decimal('amount', 15, 2);
            $table->text('description')->nullable();
            $table->string('action')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forest_covers');
    }
};
