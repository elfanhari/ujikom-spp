<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
        $unique = Rule::unique('users')->ignore($this->admin); // Pengeculian Unique Saat Update

        return [
            'name'      => ['required'],
            'level'     => ['required'],
            'telepon'   => ['required', 'numeric'],
            'email'     => ['required', 'email', $unique],
            'username'  => ['required', 'min:8', 'max:20', $unique],
            'password'  => ['required', 'min:8'],
        ];
    }
}