<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique = Rule::unique('users')->ignore(auth()->user()->id); // Pengeculian Unique Saat Update

        return [
            'name'      => ['required'],
            'telepon'   => ['required', 'numeric'],
            'email'     => ['required', 'email', $unique],
            'username'  => ['required', 'min:8', 'max:20', $unique],
        ];
    }
}
