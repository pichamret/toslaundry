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
            $table->bigIncrements('id');
            $table->string('code');
            $table->bigInteger('weight');
            $table->decimal('discount', 15 ,2);
            $table->decimal('price', 15, 2);
            $table->decimal('total', 15 ,2);
            $table->smallInteger('paid'); //0=unpaid 1= paid
            $table->smallInteger('status'); //0= inprocess , 1= Done
            $table->smallInteger('condition'); //0= laundrysimple , 1= laundryfull
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
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
