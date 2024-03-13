<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('user_type', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('type_id')->constrained();
        });
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreignId('dish_id')->constrained();
            $table->foreignId('order_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
