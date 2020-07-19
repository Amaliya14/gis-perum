<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddTriggerNamaPerumahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_nama_perumahan AFTER INSERT ON `pengembang` FOR EACH ROW 
            BEGIN
                INSERT INTO `infoperum` (`id_perumahan`) VALUES (NEW.id_perumahan);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_add_trigger_nama_perumahan');
    }
}
