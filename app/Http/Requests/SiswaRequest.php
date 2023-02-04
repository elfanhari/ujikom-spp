<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
        return [
            'name' => ['required'],
            'kelas_id' => ['required'],
            'level' => ['required'],
            'spp_id' => ['required'],
            'nisn' => ['required', 'unique:users', 'digits:10'],
            'nis' => ['required', 'unique:users', 'min:9'],
            'telepon' => ['required', 'numeric'],
            'alamat' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required', 'min:6', 'max:20'],
            'password' => ['required', 'min:8' ],
        ];
    }
}
