<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sidebar_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('route')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('sidebar_items')->onDelete('cascade');
        });

        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->string('label')->nullable();
            $table->string('description')->nullable();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('doc_type');
            $table->text('description')->nullable();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
        });

        Schema::create('approval_logs', function (Blueprint $table) {
            $table->id();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->string('status');
            $table->text('comment')->nullable();
            $table->unsignedInteger('log_number');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {        
        Schema::dropIfExists('approval_logs');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('options');
        Schema::dropIfExists('sidebar_items');
    }
};
