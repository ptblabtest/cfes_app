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
        Schema::create('tors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('project_type')->constrained('options');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->text('background')->nullable();
            $table->text('purpose')->nullable();
            $table->text('output')->nullable();
            $table->text('result')->nullable();
            $table->text('activity')->nullable();
            $table->text('member')->nullable();
            $table->decimal('budget', 15, 2);
            $table->string('project_status');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->date('approval_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tors');
    }
};
