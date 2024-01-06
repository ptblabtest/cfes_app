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
        Schema::create('ku_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('revenue', 15, 2); // Adjust precision as needed
            $table->foreignId('ku_id')->constrained('ku_lists');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('tokopedia_url')->nullable();
            $table->string('shopee_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ku_products');
    }
};
