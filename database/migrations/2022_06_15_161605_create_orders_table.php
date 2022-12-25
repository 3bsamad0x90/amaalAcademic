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
            $table->string('user_id');
            $table->string('publisher_id');
            $table->string('date_time');
            $table->string('date_time_str');
            $table->string('status');
            $table->string('total');
            $table->string('coupun_code')->nullable();
            $table->string('coupun_id')->nullable();
            $table->string('net_total');
            $table->string('payment_method');
            $table->string('payment_method_id')->nullable();
            $table->string('shipping_method');
            $table->string('shipping_address_id')->nullable();
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
