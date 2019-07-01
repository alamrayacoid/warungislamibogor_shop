<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DMemberpurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_memberpurchase', function (Blueprint $table) {
            $table->bigIncrements('mp_id');
            $table->string('mp_nota',50);
            $table->string('mp_cmember',50);
            $table->string('mp_path',50);
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
        Schema::dropIfExists('d_memberpurchase');
    }
}
