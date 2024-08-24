<?php

namespace App\Http\Requests\administrasi;

use Illuminate\Foundation\Http\FormRequest;

class PerpustakaanRequest extends FormRequest
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
            'tatib_perpustakaan' => 'nullable|file|max:2048',
            'denah_perpustakaan' => 'nullable|file|max:2048',
            'daftar_buku' => 'nullable|file|max:2048',
            'proker_perpus' => 'nullable|file|max:2048',
            'struktur' => 'nullable|file|max:2048',
            'sk' => 'nullable|file|max:2048',
            'daftar_pengunjung' => 'nullable|file|max:2048',
        ];
    }
}
