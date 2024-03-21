<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable()->after('location_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // If you want to add a foreign key constraint to 'product_id', 
            // you can do it like this. Adjust the 'products' table name
            // if your products table has a different name.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
};
