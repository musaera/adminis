<?php

namespace App\Models\administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';

    protected $fillable = [
        'tahun_ajaran',
        'kelas',
        'mapel',
        'kategori_kurikulum',
        'pkg',
        'silabus',
        'ki_kd_skl',
        'kode_etik',
        'program_semester',
        'program_tahunan',
        'kaldik_sekolah',
        'jak',
        'analisi_waktu',
        'daftar_hadir_siswa',
        'jadwal_pelajaran',
        'kisi_kisi_soal_kartu_soal',
        'rpp_1',
        'pendukung_rpp_1',
        'rpp_2',
        'pendukung_rpp_2',
        'rpp_3',
        'pendukung_rpp_3',
        'rpp_4',
        'pendukung_rpp_4',
        'rpp_5',
        'pendukung_rpp_5',
        'rpp_6',
        'pendukung_rpp_6',
        'rpp_7',
        'pendukung_rpp_7',
        'rpp_8',
        'pendukung_rpp_8',
        'rpp_9',
        'pendukung_rpp_9',
        'rpp_10',
        'pendukung_rpp_10',
        'rpp_11',
        'pendukung_rpp_11',
        'rpp_12',
        'pendukung_rpp_12',
        'rpp_13',
        'pendukung_rpp_13',
    ];
}
