<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('order_no')->nullable();
            $table->integer('cart_items_id')->nullable();
            $table->string('payable')->nullable();
            $table->string('payment_ref')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('address_id')->nullable();
            $table->integer('is_paid')->default(0);
            $table->integer('is_delivered')->default(0);
            $table->integer('dispatch_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
