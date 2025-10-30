<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixOrderNoColumnInCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            //
            if (!Schema::hasColumn('cart_items', 'order_no')) {
                $table->string('order_no')->nullable()->after('id');
            }
        });

        if (Schema::hasColumn('cart_items', 'Order_no')) {
            DB::statement('UPDATE cart_items SET order_no = `Order_no`');

            Schema::table('cart_items', function (Blueprint $table) {
                $table->dropColumn('Order_no');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            //
            if (!Schema::hasColumn('cart_items', 'Order_no')) {
                $table->string('Order_no')->nullable()->after('id');
            }
        });

         if (Schema::hasColumn('cart_items', 'order_no')) {
            DB::statement('UPDATE cart_items SET `Order_no` = order_no');

            Schema::table('cart_items', function (Blueprint $table) {
                $table->dropColumn('order_no');
            });
        }
    }
}
