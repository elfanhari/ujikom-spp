<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'petugas_id' => ['required', 'numeric'],
            'siswa_id' => ['required', 'numeric'],
            'tanggalbayar' => ['required', 'date'],
            'bulanbayar' => ['required'],
            'tahunbayar' => ['required'],
            'jumlahbayar' => ['required', 'numeric'],
        ];
    }
}
