<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('account_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('set null');
        });

        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->decimal('amount', 15, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('set null');
        });

        Schema::create('advances', function (Blueprint $table) {
            $table->id();
            $table->string('advance_number');
            $table->decimal('amount', 15, 2);
            $table->text('description')->nullable();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
        });

        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_item_id')->nullable();
            $table->decimal('amount', 15, 2);
            $table->date('date');
            $table->text('description')->nullable();
            $table->string('model_type'); 
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('advance_id')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->foreign('account_item_id')->references('id')->on('account_items')->onDelete('set null');
            $table->foreign('advance_id')->references('id')->on('advances')->onDelete('set null');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('advances');
        Schema::dropIfExists('budgets');
        Schema::dropIfExists('account_items');
    }
};
