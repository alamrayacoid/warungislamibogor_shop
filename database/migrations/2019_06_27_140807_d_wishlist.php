<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DWishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_wishlist', function (Blueprint $table) {
            $table->bigIncrements('cart_id');
            $table->string('wl_ciproduct',50);
            $table->string('wl_cmember',50);
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
        Schema::dropIfExists('d_wishlist');
    }
}
