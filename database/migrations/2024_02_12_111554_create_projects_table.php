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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('location_id')->constrained('locations');
            $table->string('sales_type');
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('approval_status');
            $table->foreignId('pmanager')->constrained('users');
            $table->foreignId('approver')->constrained('users');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes(); 
        });

        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes(); 
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('docs');
        Schema::dropIfExists('projects');
    }
};
