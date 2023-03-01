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
                'tahun' => '2020',
                'nominal' => '100000',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //2
                'tahun' => '2021',
                'nominal' => '110000',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //3
                'tahun' => '2022',
                'nominal' => '120000',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [   //4
                'tahun' => '2023',
                'nominal' => '130000',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
        ])->each(function($spp){
            Spp::create($spp);
        });
    }
}
