<?php

namespace App\Models\administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osis extends Model
{
    use HasFactory;

    protected $table = 'osis';

    protected $fillable = [
        'tahun_ajaran',
        'struktur_organisasi',
        'pengurus',
        'program',
        'pelaksanaan_dan_dokumentasi',
    ];
}
