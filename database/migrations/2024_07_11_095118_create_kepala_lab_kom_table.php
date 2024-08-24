<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepalaLabKomTable extends Migration
{
    public function up()
    {
        Schema::create('kepala_lab_kom', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->string('tatib_lab')->nullable();
            $table->string('denah_lab')->nullable();
            $table->string('data_lab')->nullable();
            $table->string('data_pengguna')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kepala_lab_kom');
    }
}
