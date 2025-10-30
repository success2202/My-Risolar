<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_shipments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('address_id')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_address')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('receipient_name')->nullable();
            $table->string('receipient_address')->nullable();
            $table->string('receipient_phone')->nullable();
            $table->string('receipient_email')->nullable();
            $table->string('fee')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('item_category')->nullable();
            $table->string('description')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('create_shipments');
    }
}
