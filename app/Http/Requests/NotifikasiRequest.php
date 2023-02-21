<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifikasiRequest extends FormRequest
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
            'penerima_id' => ['required'],
            'tipe' => ['required'],
            'pesan' => ['required'],
        ];
    }
}
