<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->date('start_date');
            $table->date('expected_close_date');
            $table->decimal('amount', 15, 2);
            $table->unsignedBigInteger('deal_id')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('set null');
            $table->foreign('parent_id')->references('id')->on('projects')->onDelete('cascade');
        });

        Schema::create('project_activities', function (Blueprint $table) {
            $table->id();
            $table->string('project_type');
            $table->text('notes')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_activities');
        Schema::dropIfExists('projects');
    }
};
