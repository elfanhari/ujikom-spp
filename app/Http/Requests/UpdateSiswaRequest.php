<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique = Rule::unique('users')->ignore($this->siswa); // Pengeculian Unique Saat Update

        return [
            'name'      => ['required'],
            'kelas_id'  => ['required'],
            'level'     => ['required'],
            'jk'        => ['required'],
            'spp_id'    => ['required'],
            'nisn'      => ['required', 'digits:10', $unique],
            'nis'       => ['required', 'min:9', $unique],
            'telepon'   => ['required', 'numeric'],
            'alamat'    => ['required'],
            'email'     => ['required', 'email', $unique],
            'username'  => ['required', 'min:6', 'max:20', $unique],
            'identifier' => [$unique],
            'aktif'    => ['required'],
        ];
    }
}
