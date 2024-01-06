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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('forest_name');
            $table->string('village_name')->nullable();
            $table->unsignedBigInteger('forest_category');
            $table->foreign('forest_category')->references('id')->on('options');
            $table->decimal('x_coordinate', 10, 7)->nullable();
            $table->decimal('y_coordinate', 10, 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
