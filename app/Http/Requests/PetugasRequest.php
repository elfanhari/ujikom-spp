<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetugasRequest extends FormRequest
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
            'level' => ['required'],
            'telepon' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'username' => ['required', 'min:8', 'max:20'],
            'password' => ['required', 'min:8'],
        ];
    }
}
