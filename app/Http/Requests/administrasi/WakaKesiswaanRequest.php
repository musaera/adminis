<?php

namespace App\Http\Requests\administrasi;

use Illuminate\Foundation\Http\FormRequest;

class WakaKesiswaanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            // Buku Penyelesaian Kasus
            'nomor_penyelesaian_kasus' => 'integer',
            'nama_penyelesaian_kasus' => 'string',
            'tanggal_kejadian' => 'string',
            'uraian_kasus' => 'string',
            'cara_menyelesaikan' => 'string',
            'tindak_lanjut' => 'string',
            'keterangan_penyelesaian_kasus' => 'string',
            // Buku Hubin
            'nomor_hubin' => 'integer',
            'tanggal_kunjungan' => 'string',
            'tempat_kunjungan' => 'string',
            'nama_peserta' => 'string',
            'hasil_kunjungan' => 'string',
            'keterangan_hubin' => 'string',
            // CPD Tahun Pelajaran
            'tahun_pel' => 'nullable|file|max:2048',
            // Pelatihan Siswa
            'nomor_pelatihan_siswa' => 'integer',
            'nama_pelatihan_siswa' => 'string',
            'materi_pelatihan_siswa' => 'string',
            'tempat_pelatihan_siswa' => 'string',
            'tanggal_pelatihan_siswa' => 'string',
            'hasil_pelatihan_siswa' => 'string',
            'tingkat_pelatihan_siswa' => 'string',
            'lama_jam_pelatihan_siswa' => 'string',
            // Seminar
            'nomor_seminar' => 'integer',
            'nara_sumber' => 'string',
            'materi_seminar' => 'string',
            'tanggal_seminar' => 'string',
            'waktu_seminar' => 'string',
            'tingkat_seminar' => 'string',
            'hasil_seminar' => 'string',
            'keterangan_seminar' => 'string',
            // Piket Gromming
            'piket_gromming' => 'nullable|file|max:2048',
        ];
    }
}
