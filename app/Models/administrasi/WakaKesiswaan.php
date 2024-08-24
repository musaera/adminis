<?php

namespace App\Models\administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WakaKesiswaan extends Model
{
    use HasFactory;

    protected $table = 'waka_kesiswaan';

    protected $fillable = [
        'tahun_ajaran',
        // Buku Penyelesaian Kasus
        'nomor_penyelesaian_kasus',
        'nama_penyelesaian_kasus',
        'tanggal_kejadian',
        'uraian_kasus',
        'cara_menyelesaikan',
        'tindak_lanjut',
        'keterangan_penyelesaian_kasus',
        // Buku Hubin
        'nomor_hubin',
        'tanggal_kunjungan',
        'tempat_kunjungan',
        'nama_peserta',
        'hasil_kunjungan',
        'keterangan_hubin',
        // CPD Tahun Pelajaran
        'tahun_pel',
        // Pelatihan Siswa
        'nomor_pelatihan_siswa',
        'nama_pelatihan_siswa',
        'materi_pelatihan_siswa',
        'tempat_pelatihan_siswa',
        'tanggal_pelatihan_siswa',
        'hasil_pelatihan_siswa',
        'tingkat_pelatihan_siswa',
        'lama_jam_pelatihan_siswa',
        // Seminar
        'nomor_seminar',
        'nara_sumber',
        'materi_seminar',
        'tanggal_seminar',
        'waktu_seminar',
        'tingkat_seminar',
        'hasil_seminar',
        'keterangan_seminar',
        // Piket Grooming
        'piket_gromming',
    ];
}
