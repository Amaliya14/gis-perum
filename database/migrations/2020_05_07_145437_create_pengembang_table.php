<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_perumahan')->unsigned();
            $table->string('nama'); //membuat kolom nama
            $table->string('username'); //membuat kolom email
            $table->string('password');
            $table->text('alamat'); //membuat kolom alamat dengan tipe text
            $table->string('no_tlpn'); //membuat kolom no tlpn
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
        Schema::dropIfExists('pengembang');
    }
}
