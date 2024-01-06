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
        Schema::create('btors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tor_id')->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->text('sch_detail')->nullable();
            $table->text('followup')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->decimal('cost', 15, 2);
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
        Schema::dropIfExists('btors');
    }
};
