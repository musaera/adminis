<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpustakaanTable extends Migration
{
    public function up()
    {
        Schema::create('perpustakaan', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->string('tatib_perpustakaan')->nullable();;
            $table->string('denah_perpustakaan')->nullable();
            $table->string('daftar_buku')->nullable();
            $table->string('proker_perpus')->nullable();
            $table->string('struktur')->nullable();
            $table->string('sk')->nullable();
            $table->string('daftar_pengunjung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('perpustakaan');
    }
};
