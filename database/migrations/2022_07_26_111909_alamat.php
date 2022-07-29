<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alamat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consument_id')->unsigned();
            $table->foreign('consument_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_provinsi')->unsigned();
            $table->string('region');
            $table->string('nama');
            $table->string('email');
            $table->text('phonenumber');
            $table->text('fulladdress');
            $table->text('status');
            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('cascade');
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
