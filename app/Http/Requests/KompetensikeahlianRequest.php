<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class KompetensikeahlianRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        $unique = Rule::unique('kompetensikeahlians')->ignore($this->prodi); // Pengeculian Unique Saat Update

        return [
            'name'      => ['required', 'string', $unique],
            'singkatan' => ['required', 'string', $unique],
            'identifier' => [$unique],
        ];
    }
}
