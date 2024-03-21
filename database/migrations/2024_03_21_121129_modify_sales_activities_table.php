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
        Schema::table('sales_activities', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->date('start_date')->nullable()->after('notes');
            $table->date('end_date')->nullable()->after('start_date');
        });

        Schema::table('project_activities', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->date('start_date')->nullable()->after('notes');
            $table->date('end_date')->nullable()->after('start_date');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_activities', function (Blueprint $table) {
            $table->date('date')->after('notes');
            $table->dropColumn(['start_date', 'end_date']);
        });
        
        Schema::table('sales_activities', function (Blueprint $table) {
            $table->date('date')->after('notes');
            $table->dropColumn(['start_date', 'end_date']);
        });
    }
};
