<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
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
                'kompetensikeahlian_id' => '1', 
                'name' => 'XII RPL 1'
            ],
            [   //2
                'kompetensikeahlian_id' => '1',
                'name' => 'XII RPL 2'
            ],
            [   //3
                'kompetensikeahlian_id' => '2',
                'name' => 'XII AKL 2'
            ],
            [   //4
                'kompetensikeahlian_id' => '3',
                'name' => 'XII TBSM 1'
            ],
            [   //5
                'kompetensikeahlian_id' => '4',
                'name' => 'XII TKRO 1'
            ],
            [   //6
                'kompetensikeahlian_id' => '5',
                'name' => 'XII APHP 1'
            ],
            [   //7
                'kompetensikeahlian_id' => '6',
                'name' => 'XII APAT'
            ],
        ])->each(function($kelas){
            Kelas::create($kelas);
        });
    }
}
