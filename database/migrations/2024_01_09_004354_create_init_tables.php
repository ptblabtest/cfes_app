<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('forest_name')->unique();
            $table->string('village_name')->unique()->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->string('forest_legal')->nullable();
            $table->decimal('usable_area')->nullable();
            $table->decimal('usable_forest_area')->nullable(); 
            $table->decimal('protected_area')->nullable(); 
            $table->integer('tree_count')->nullable(); 
            $table->decimal('carbon_stock')->nullable(); 
            $table->decimal('village_area', 10, 2)->nullable();
            $table->integer('male_population')->nullable();
            $table->integer('female_population')->nullable();
            $table->softDeletes(); 
        });

        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('name');
            $table->string('species_name')->nullable();
            $table->string('iucn_id')->nullable();
            $table->string('cites_id')->nullable();
        });
        
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('name');
            $table->string('species_name')->nullable();
            $table->string('iucn_id')->nullable();
            $table->string('cites_id')->nullable();
            $table->string('usage')->nullable();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('cp_name')->nullable();
            $table->string('cp_email')->nullable();
            $table->string('cp_phone')->nullable();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('animals');
        Schema::dropIfExists('plants');
        Schema::dropIfExists('locations');
    }
};
