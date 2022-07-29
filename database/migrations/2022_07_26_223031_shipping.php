<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Shipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consument_id')->unsigned();
            $table->foreign('consument_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_alamat')->unsigned();
            $table->text('status');
            $table->foreign('id_alamat')->references('id')->on('alamat')->onDelete('cascade');
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
        //
    }
}
