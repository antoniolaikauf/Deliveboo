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

        Schema::table('restaurants', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('restaurant_type', function (Blueprint $table) {
            $table->foreignId('restaurant_id')->constrained();
            $table->foreignId('type_id')->constrained();
        });
        Schema::table('dishes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreignId('dish_id')->constrained();
            $table->foreignId('order_id')->constrained();
        });
        
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('restaurant_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign('restaurants_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('restaurant_type', function (Blueprint $table) {
            $table->dropForeign('restaurant_type_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
            $table->dropForeign('restaurant_type_type_id_foreign');
            $table->dropColumn('type_id');
        });
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('dish_order', function (Blueprint $table) {
            $table->dropForeign('dish_order_dish_id_foreign');
            $table->dropColumn('dish_id');
            $table->dropForeign('dish_order_order_id_foreign');
            $table->dropColumn('order_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });
    }
};
