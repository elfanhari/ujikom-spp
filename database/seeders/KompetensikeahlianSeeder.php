<?php

namespace Database\Seeders;

use App\Models\Kompetensikeahlian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KompetensikeahlianSeeder extends Seeder
{
    public function run()
    {
        $char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $rand = substr(str_shuffle($char), 0, 9);
        
        collect([
            [   //1
                'name' => 'Rekayasa Perangkat Lunak', 
                'singkatan' => 'RPL',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //2
                'name' => 'Akuntansi dan Keuangan Lembaga', 
                'singkatan' => 'AKL',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //3
                'name' => 'Teknik Bisnis Sepeda Motor', 
                'singkatan' => 'TBSM',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //4
                'name' => 'Teknik Kendaraan Ringan Otomotif', 
                'singkatan' => 'TKRO',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //5
                'name' => 'Agribisnis Pengolahan Hasil Pertanian', 
                'singkatan' => 'APHP',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //6
                'name' => 'Agribisnis Pengolahan Air Tawar', 
                'singkatan' => 'APAT',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
        ])->each(function($kompetensikeahlian){
            Kompetensikeahlian::create($kompetensikeahlian);
        });
    }
}
