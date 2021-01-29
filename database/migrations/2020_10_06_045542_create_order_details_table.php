<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('qty', 15 ,2);
            $table->decimal('amount', 15, 2);
            $table->decimal('note',15 ,2);
            $table->bigInteger('item_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('order_details');
    }
}
