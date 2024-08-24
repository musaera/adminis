<?php

namespace App\Http\Requests\administrasi;

use Illuminate\Foundation\Http\FormRequest;

class KepalaLabKomRequest extends FormRequest
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
            'tatib_lab' => 'nullable|file|max:2048',
            'denah_lab' => 'nullable|file|max:2048',
            'data_lab' => 'nullable|file|max:2048',
            'data_pengguna' => 'nullable|file|max:2048',
        ];
    }
}
