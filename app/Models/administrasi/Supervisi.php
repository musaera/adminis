<?php

namespace App\Models\administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisi extends Model
{
    use HasFactory;

    protected $table = 'supervisi';

    protected $fillable = [
        'tahun_ajaran',
        'nama_guru',
        'kelas',
        'mapel',
    ];
}
