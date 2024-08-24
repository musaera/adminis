<?php

namespace App\Http\Requests\administrasi;

use Illuminate\Foundation\Http\FormRequest;

class OsisRequest extends FormRequest
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
            'struktur_organisasi' => 'nullable|file|max:2048',
            'pengurus' => 'nullable|file|max:2048',
            'program' => 'nullable|file|max:2048',
            'pelaksanaan_dan_dokumentasi' => 'nullable|file|max:2048',
        ];
    }
}
