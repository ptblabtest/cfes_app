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
        Schema::table('deals', function (Blueprint $table) {
            $table->string('sales_reg_no')->nullable()->after('id');
        });
        
        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_reg_no')->nullable()->after('id');
            $table->foreignId('pm_user_id')->nullable()->constrained('users')->after('amount');
        });

        Schema::table('advances', function (Blueprint $table) {
            $table->renameColumn('advance_number', 'advance_reg_no');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->string('expense_reg_no')->nullable()->after('id');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('expense_reg_no');
        });

        Schema::table('advances', function (Blueprint $table) {
            $table->renameColumn('advance_reg_no', 'advance_number');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropConstrainedForeignId('pm_user_id');
            $table->dropColumn('project_reg_no');
        });

        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('sales_reg_no');
        });


    }
};
