<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PembayaranRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        $unique = Rule::unique('pembayarans')->ignore($this->pembayaran);

        return [
            'petugas_id'    => ['required', 'numeric'],
            'siswa_id'      => ['required', 'numeric'],
            'tanggalbayar'  => ['required', 'date'],
            'bulanbayar_id' => ['required'],
            'tahunbayar'    => ['required', 'numeric'],
            'jumlahbayar'   => ['required', 'numeric'],
            'identifier' => [$unique],
        ];
    }
}
