<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsisTable extends Migration
{
    public function up()
    {
        Schema::create('osis', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->string('struktur_organisasi')->nullable();;
            $table->string('pengurus')->nullable();
            $table->string('program')->nullable();
            $table->string('pelaksanaan_dan_dokumentasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('osis');
    }
};
