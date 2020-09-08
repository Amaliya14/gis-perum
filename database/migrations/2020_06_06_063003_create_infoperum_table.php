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
            $table->string('rumah_tersedia'); 
            $table->string('tipe'); 
            $table->string('harga'); 
            $table->text('keterangan'); 
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
