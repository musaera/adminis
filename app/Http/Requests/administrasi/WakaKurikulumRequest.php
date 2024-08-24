<?php

namespace App\Http\Requests\administrasi;

use Illuminate\Foundation\Http\FormRequest;

class WakaKurikulumRequest extends FormRequest
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
            'nomor_bimbingan' => 'string',
            'waktu_bimbingan' => 'string',
            'nama_bimbingan' => 'string',
            'kekurangan_bimbingan' => 'string',
            'bentuk_bimbingan' => 'string',
            'hasil_bimbingan' => 'string',
            'keterangan_bimbingan' => 'string',
            'nomor_capaian' => 'string',
            'mapel_capaian' => 'string',
            'guru_capaian' => 'string',
            'target_pencapaian_materi' => 'string',
            'realisasi_pencapaian' => 'string',
            'kendala' => 'string',
            'solusi' => 'string',
            'keterangan_capaian' => 'string',
            'kelas_10' => 'nullable|file|max:2048',
            'kelas_11' => 'nullable|file|max:2048',
            'kelas_12' => 'nullable|file|max:2048',
        ];
    }
}
