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

        Schema::table('restaurant_type', function (Blueprint $table) {
            $table->foreignId('restaurant_id')->constrained();
            $table->foreignId('type_id')->constrained();
        });
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreignId('dish_id')->constrained();
            $table->foreignId('order_id')->constrained();
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropForeign('dishes_user_id_foreign');
        });

        Schema::table('restaurant_type', function (Blueprint $table) {
            $table->dropColumn('restaurant_id');
            $table->dropColumn('type_id');

            $table->dropForeign('restaurant_type_restaurant_id_foreign');
            $table->dropForeign('user_type_type_id_foreign');
        });
        Schema::table('dish_order', function (Blueprint $table) {
            $table->dropColumn('dish_id');
            $table->dropColumn('order_id');

            $table->dropForeign('dish_order_dish_id_foreign');
            $table->dropForeign('dish_order_order_id_foreign');
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropForeign('restaurants_user_id_foreign');
        });
    }
};
