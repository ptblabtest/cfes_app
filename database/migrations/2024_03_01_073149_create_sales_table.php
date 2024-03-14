<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('interest');
            $table->string('source');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
        });

        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->decimal('potential_revenue', 15, 2);
            $table->date('expected_close_date');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->foreign('lead_id')->references('id')->on('deals')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });

        Schema::create('sales_activities', function (Blueprint $table) {
            $table->id();
            $table->string('sales_type');
            $table->text('notes')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('deal_id')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_activities');
        Schema::dropIfExists('deals');
        Schema::dropIfExists('leads');
    }
};
