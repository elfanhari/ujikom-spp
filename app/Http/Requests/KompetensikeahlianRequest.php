<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KompetensikeahlianRequest extends FormRequest
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
        $unique = Rule::unique('kompetensikeahlians')->ignore($this->prodi); // Pengeculian Unique Saat Update

        return [
            'name'      => ['required', 'string', $unique],
            'singkatan' => ['required', 'string', $unique],
        ];
    }
}
