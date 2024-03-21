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
        Schema::table('leads', function (Blueprint $table) {
            // First, drop the 'interest' column
            $table->dropColumn('interest');

            // Then, add the 'product_id' column after the 'phone' column
            $table->unsignedBigInteger('product_id')->nullable()->after('phone');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            // First, drop the 'product_id' column
            $table->dropColumn('product_id');

            // Then, re-add the 'interest' column
            $table->string('interest')->nullable()->after('email');
        });
    }
};
