<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuktiBayar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buktibayar', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('consument_id')->unsigned();
            $table->foreign('consument_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
            $table->text('picture');
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
        Schema::dropIfExists('order');
    }
}
