<?php

namespace Database\Seeders;

use App\Models\Metodepembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MetodepembayaranSeeder extends Seeder
{
    public function run()
    {
        $char = '1234567890';
        $rand = substr(str_shuffle($char), 0, 9);

        collect([
            [   //1
                'identifier' => 'i' . Str::random(9),
                'payment' => 'Transfer Bank - BCA',
                'number' => $rand,
                'atasnama' => 'SMK REKAYASA'
            ],
            [   //2
                'identifier' => 'i' . Str::random(9),
                'payment' => 'Transfer Bank - MANDIRI',
                'number' => $rand,
                'atasnama' => 'SMK REKAYASA'
            ],
            [   //3
                'identifier' => 'i' . Str::random(9),
                'payment' => 'Transfer Bank - BRI',
                'number' => $rand,
                'atasnama' => 'SMK REKAYASA'
            ],
            [   //4
                'identifier' => 'i' . Str::random(9),
                'payment' => 'Transfer Bank - BJB',
                'number' => $rand,
                'atasnama' => 'SMK REKAYASA'
            ],
            [   //5
                'identifier' => 'i' . Str::random(9),
                'payment' => 'GOPAY',
                'number' => '085315755352',
                'atasnama' => 'SMK REKAYASA'
            ],
            [   //6
                'identifier' => 'i' . Str::random(9),
                'payment' => 'DANA',
                'number' => '085315755352',
                'atasnama' => 'SMK REKAYASA'
            ],
            [   //7
                'identifier' => 'i' . Str::random(9),
                'payment' => 'SHOPEEPAY',
                'number' => '085315755352',
                'atasnama' => 'SMK REKAYASA'
            ],
            [   //8
                'identifier' => 'i' . Str::random(9),
                'payment' => 'CASH',
            ],
            [   //9
                'identifier' => 'i' . Str::random(9),
                'payment' => 'Lainnya',
            ],
        ])->each(function($metodepembayaran){
            Metodepembayaran::create($metodepembayaran);
        });
    }
}
