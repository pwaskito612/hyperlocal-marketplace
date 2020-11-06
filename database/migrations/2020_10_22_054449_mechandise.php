<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mechandise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id');
            $table->string('title');
            $table->longText('description');
            $table->integer('weight');
            $table->integer('stock');
            $table->integer('price');
            $table->string('location');
            $table->string('categories');
            $table->boolean('deleted');

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
