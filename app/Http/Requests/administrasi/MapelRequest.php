<?php

namespace App\Http\Requests\administrasi;

use Illuminate\Foundation\Http\FormRequest;

class MapelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'kategori_kurikulum' => 'required',
            'pkg' => 'nullable|file|max:2048',
            'silabus' => 'nullable|file|max:2048',
            'ki_kd_skl' => 'nullable|file|max:2048',
            'kode_etik' => 'nullable|file|max:2048',
            'program_semester' => 'nullable|file|max:2048',
            'program_tahunan' => 'nullable|file|max:2048',
            'kaldik_sekolah' => 'nullable|file|max:2048',
            'jak' => 'nullable|file|max:2048',
            'analisi_waktu' => 'nullable|file|max:2048',
            'daftar_hadir_siswa' => 'nullable|file|max:2048',
            'jadwal_pelajaran' => 'nullable|file|max:2048',
            'kisi_kisi_soal_kartu_soal' => 'nullable|file|max:2048',
            'rpp_1' => 'nullable|file|max:2048',
            'pendukung_rpp_1' => 'nullable|file|max:2048',
            'rpp_2' => 'nullable|file|max:2048',
            'pendukung_rpp_2' => 'nullable|file|max:2048',
            'rpp_3' => 'nullable|file|max:2048',
            'pendukung_rpp_3' => 'nullable|file|max:2048',
            'rpp_4' => 'nullable|file|max:2048',
            'pendukung_rpp_4' => 'nullable|file|max:2048',
            'rpp_5' => 'nullable|file|max:2048',
            'pendukung_rpp_5' => 'nullable|file|max:2048',
            'rpp_6' => 'nullable|file|max:2048',
            'pendukung_rpp_6' => 'nullable|file|max:2048',
            'rpp_7' => 'nullable|file|max:2048',
            'pendukung_rpp_7' => 'nullable|file|max:2048',
            'rpp_8' => 'nullable|file|max:2048',
            'pendukung_rpp_8' => 'nullable|file|max:2048',
            'rpp_9' => 'nullable|file|max:2048',
            'pendukung_rpp_9' => 'nullable|file|max:2048',
            'rpp_10' => 'nullable|file|max:2048',
            'pendukung_rpp_10' => 'nullable|file|max:2048',
            'rpp_11' => 'nullable|file|max:2048',
            'pendukung_rpp_11' => 'nullable|file|max:2048',
            'rpp_12' => 'nullable|file|max:2048',
            'pendukung_rpp_12' => 'nullable|file|max:2048',
            'rpp_13' => 'nullable|file|max:2048',
            'pendukung_rpp_13' => 'nullable|file|max:2048',
        ];
    }
}
