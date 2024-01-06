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
        Schema::create('ku_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ku_id')->constrained('ku_lists');
            $table->foreignId('group_type')->constrained('options');
            $table->foreignId('kups_class')->constrained('options');
            $table->string('sk_number')->nullable();
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ku_statuses');
    }
};
