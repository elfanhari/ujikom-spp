<?php

namespace Database\Seeders;

use App\Models\Spp;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
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
                'tahun' => '2021',
                'nominal' => '1440000'
            ],
            [   //2
                'tahun' => '2022',
                'nominal' => '1500000'
            ],
            [   //3
                'tahun' => '2023',
                'nominal' => '1560000'
            ],
            [   //4
                'tahun' => '2024',
                'nominal' => '1600000'
            ],
        ])->each(function($spp){
            Spp::create($spp);
        });;
    }
}
