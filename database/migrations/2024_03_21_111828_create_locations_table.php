<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('forest_name');
            $table->string('village_name');
            $table->text('address')->nullable();
            $table->string('city_name')->nullable();
            $table->string('province_name')->nullable();
            $table->string('forest_category')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
