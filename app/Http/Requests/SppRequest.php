<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SppRequest extends FormRequest
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
        $unique = Rule::unique('spps')->ignore($this->spp); // Pengeculian Unique Saat Update

        return [
            'tahun'   => ['required', 'numeric', $unique],
            'nominal' => ['required', 'numeric'],
            'identifier' => [$unique],
        ];
    }
}
