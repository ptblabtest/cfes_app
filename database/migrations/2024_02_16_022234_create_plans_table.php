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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->string('title');
            $table->string('project_target');
            $table->string('project_type');
            $table->foreignId('project_id')->nullable()->constrained('projects');
            $table->string('address');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes(); 
        });

        Schema::create('tors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->unique()->constrained('plans');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('budget', 15, 2);
            $table->string('approval_status')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->date('approval_date')->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes(); 
        });

        Schema::create('btors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->unique()->constrained('plans');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('cost', 15, 2);
            $table->string('approval_status')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->date('approval_date')->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes(); 
        });

        Schema::create('act_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->unique()->constrained('plans');
            $table->string('project_status')->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->date('approval_date')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->unique()->constrained('plans');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes(); 
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('act_reports');
        Schema::dropIfExists('btors');
        Schema::dropIfExists('tors');
        Schema::dropIfExists('plans');
    }
};
