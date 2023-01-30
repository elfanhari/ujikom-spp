<?php

namespace Database\Seeders;

use App\Models\Kompetensikeahlian;
use Illuminate\Database\Seeder;

class KompetensikeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [   //1
                'name' => 'Rekayasa Perangkat Lunak', 
                'singkatan' => 'RPL',
            ],
            [   //2
                'name' => 'Akuntansi dan Keuangan Lembaga', 
                'singkatan' => 'AKL',
            ],
            [   //3
                'name' => 'Teknik Bisnis Sepeda Motor', 
                'singkatan' => 'TBSM',
            ],
            [   //4
                'name' => 'Teknik Kendaraan Ringan Otomotif', 
                'singkatan' => 'TKRO',
            ],
            [   //5
                'name' => 'Agribisnis Pengolahan Hasil Pertanian', 
                'singkatan' => 'APHP',
            ],
            [   //6
                'name' => 'Agribisnis Pengolahan Air Tawar', 
                'singkatan' => 'APAT',
            ],
        ])->each(function($kompetensikeahlian){
            Kompetensikeahlian::create($kompetensikeahlian);
        });
    }
}
