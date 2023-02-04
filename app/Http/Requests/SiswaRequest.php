<?php

namespace App\Http\Requests;
// use Illuminate\Contracts\Validation\Rule;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $uniqueSiswa = Rule::unique('users')->ignore($this->siswa); // Pengeculian Unique Saat Update
        
        return [
            'name' => ['required'],
            'kelas_id' => ['required'],
            'level' => ['required'],
            'spp_id' => ['required'],
            'nisn' => ['required', 'digits:10'],
            'nis' => ['required', 'min:9',],
            'telepon' => ['required', 'numeric'],
            'alamat' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required', 'min:6', 'max:20', $uniqueSiswa],
            'password' => ['required', 'min:8' ],
        ];
    }
}
