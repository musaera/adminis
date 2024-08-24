<?php

namespace App\Models\administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    use HasFactory;

    protected $table = 'perpustakaan';

    protected $fillable = [
        'tahun_ajaran',
        'tatib_perpustakaan',
        'denah_perpustakaan',
        'daftar_buku',
        'proker_perpus',
        'struktur',
        'sk',
        'daftar_pengunjung',
    ];
}
