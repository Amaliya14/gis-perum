<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoperumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoperum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_perumahan')->unsigned();
            $table->string('tipe'); //membuat kolom nama
            $table->string('harga'); //membuat kolom email
            $table->text('keterangan'); //membuat kolom alamat dengan tipe text
            $table->string('foto');
            $table->timestamps();

            $table->foreign('id_perumahan')->references('id')->on('perumahan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infoperum');
    }
}
