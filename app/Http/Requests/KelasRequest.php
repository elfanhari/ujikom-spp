<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KelasRequest extends FormRequest
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

     public function messages()
    {
        return [
            'kompetensikeahlian_id' => 'Nama Prodi kudu diisi woi',
        ];
    }

    public function rules()
    {   
        $unique = Rule::unique('kelas')->ignore($this->kela); // Pengeculian Unique Saat Update

        return [
            'kompetensikeahlian_id' => ['required'],
            'name'                  => ['required', $unique],
            'identifier' => [$unique],
        ];
    }

    
}
