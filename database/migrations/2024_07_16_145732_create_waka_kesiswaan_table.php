<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWakaKesiswaanTable extends Migration
{
    public function up()
    {
        Schema::create('waka_kesiswaan', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            // Adding columns for Buku Penyelesaian Kasus
            $table->integer('nomor_penyelesaian_kasus');
            $table->string('nama_penyelesaian_kasus');
            $table->string('tanggal_kejadian');
            $table->string('uraian_kasus');
            $table->string('cara_menyelesaikan');
            $table->string('tindak_lanjut');
            $table->string('keterangan_penyelesaian_kasus');
            // Adding columns for Buku Hubin
            $table->integer('nomor_hubin');
            $table->string('tanggal_kunjungan');
            $table->string('tempat_kunjungan');
            $table->string('nama_peserta');
            $table->string('hasil_kunjungan');
            $table->string('keterangan_hubin');
            // Adding columns for CPD
            $table->string('tahun_pel')->nullable();
            // Adding columns for Pelatihan Siswa
            $table->integer('nomor_pelatihan_siswa');
            $table->string('nama_pelatihan_siswa');
            $table->string('materi_pelatihan_siswa');
            $table->string('tempat_pelatihan_siswa');
            $table->string('tanggal_pelatihan_siswa');
            $table->string('hasil_pelatihan_siswa');
            $table->string('tingkat_pelatihan_siswa');
            $table->string('lama_jam_pelatihan_siswa');
            // adding columns for Seminar
            $table->integer('nomor_seminar');
            $table->string('nara_sumber');
            $table->string('materi_seminar');
            $table->string('tanggal_seminar');
            $table->string('waktu_seminar');
            $table->string('tingkat_seminar');
            $table->string('hasil_seminar');
            $table->string('keterangan_seminar');
            // Adding columns for Piket Gromming
            $table->string('piket_gromming')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('waka_kesiswaan');
    }
}
