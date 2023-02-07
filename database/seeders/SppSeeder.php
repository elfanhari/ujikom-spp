<?php

namespace Database\Seeders;

use App\Models\Spp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $rand = substr(str_shuffle($char), 0, 9);
        
        collect([
            [   //1
                'tahun' => '2021',
                'nominal' => '1440000',
                'identifier' => 'i' . Str::random(9),
            ],
            [   //2
                'tahun' => '2022',
                'nominal' => '1500000',
                'identifier' => 'i' . Str::random(9),
            ],
            [   //3
                'tahun' => '2023',
                'nominal' => '1560000',
                'identifier' => 'i' . Str::random(9),
            ],
            [   //4
                'tahun' => '2024',
                'nominal' => '1600000',
                'identifier' => 'i' . Str::random(9),
            ],
        ])->each(function($spp){
            Spp::create($spp);
        });;
    }
}
