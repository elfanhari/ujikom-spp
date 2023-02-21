<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'identifier' => $row[1],
            'name' => $row[2],
            'level' => $row[3],
            'kelas_id' => $row[4],
            'jk' => $row[5],
            'spp_id' => $row[6],
            'nisn' => $row[7],
            'nis' => $row[8],
            'telepon' => $row[9],
            'alamat' => $row[10],
            'email' => $row[11],
            'username' => $row[12],
            'password' => $row[14],
        ]);
    }
}
