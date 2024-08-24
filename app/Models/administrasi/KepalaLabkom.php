<?php

namespace App\Models\administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaLabkom extends Model
{
    use HasFactory;

    protected $table = 'kepala_lab_kom';

    protected $fillable = [
        'tahun_ajaran',
        'tatib_lab',
        'denah_lab',
        'data_lab',
        'data_pengguna',
    ];
}
