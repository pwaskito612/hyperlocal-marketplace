<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merchandise_id');
            $table->bigInteger('seller_id');
            $table->bigInteger('buyer_id');
            $table->bigInteger('buyer_phone');
            $table->bigInteger('buyer_address');
            $table->integer('amount');//stapa tau seller merubah harganya nanti
            $table->time('date');
            $table->date('confirmed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
