<?php

namespace App\Models\administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WakaKurikulum extends Model
{
    use HasFactory;

    protected $table = 'waka_kurikulum';

    protected $fillable = [
        'tahun_ajaran',
        'nomor_bimbingan',
        'waktu_bimbingan',
        'nama_bimbingan',
        'kekurangan_bimbingan',
        'bentuk_bimbingan',
        'hasil_bimbingan',
        'keterangan_bimbingan',
        'nomor_capaian',
        'mapel_capaian',
        'guru_capaian',
        'target_pencapaian_materi',
        'realisasi_pencapaian',
        'kendala',
        'solusi',
        'keterangan_capaian',
        // 'kenaikan_kelas',
        'kelas_10',
        'kelas_11',
        'kelas_12',
    ];
}
