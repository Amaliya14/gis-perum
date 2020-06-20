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
            $table->string('nama'); //membuat kolom nama
            $table->string('perumahan'); //membuat kolom perumahan
            $table->string('email'); //membuat kolom email
            $table->text('alamat'); //membuat kolom alamat dengan tipe text
            $table->string('no_tlpn'); //membuat kolom no tlpn
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
        Schema::dropIfExists('pengembang');
    }
}
