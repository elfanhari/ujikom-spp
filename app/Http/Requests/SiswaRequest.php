<?php

namespace App\Http\Requests;
// use Illuminate\Contracts\Validation\Rule;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $unique = Rule::unique('users')->ignore($this->siswa); // Pengeculian Unique Saat Update
        
        return [
            'name'      => ['required'],
            'kelas_id'  => ['required'],
            'level'     => ['required'],
            'spp_id'    => ['required'],
            'nisn'      => ['required', 'digits:10', $unique],
            'nis'       => ['required', 'min:9', $unique],
            'telepon'   => ['required', 'numeric'],
            'alamat'    => ['required'],
            'email'     => ['required', 'email', $unique],
            'username'  => ['required', 'min:6', 'max:20', $unique],
            'password'  => ['required', 'min:8'],
            'identifier' => [$unique],
        ];
    }
}
