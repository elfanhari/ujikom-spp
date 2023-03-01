<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{

    public function run()
    {
        $char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $rand = substr(str_shuffle($char), 0, 9);
        
        collect([
            [   //1
                'kompetensikeahlian_id' => '1', 
                'name' => 'XII RPL 1',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //2
                'kompetensikeahlian_id' => '1',
                'name' => 'XII RPL 2',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //3
                'kompetensikeahlian_id' => '2',
                'name' => 'XII AKL 2',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //4
                'kompetensikeahlian_id' => '3',
                'name' => 'XII TBSM 1',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //5
                'kompetensikeahlian_id' => '4',
                'name' => 'XII TKRO 1',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //6
                'kompetensikeahlian_id' => '5',
                'name' => 'XII APHP 1',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //7
                'kompetensikeahlian_id' => '6',
                'name' => 'XII APAT',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //8
                'kompetensikeahlian_id' => '2',
                'name' => 'XI AKL 1',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //9
                'kompetensikeahlian_id' => '1',
                'name' => 'X RPL 1',
                 'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
        ])->each(function($kelas){
            Kelas::create($kelas);
        });
    }
}
