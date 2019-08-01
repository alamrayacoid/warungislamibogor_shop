<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_cart', function (Blueprint $table) {
            $table->bigIncrements('cart_id');
            $table->string('cart_ciproduct',50);
            $table->string('cart_cmember',50);
            $table->string('cart_label',20);
            $table->string('cart_cunit',20);
            $table->integer('cart_qty');
            $table->string('cart_location',50)->nullable();
            $table->string('status_data',5);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_cart');
    }
}
