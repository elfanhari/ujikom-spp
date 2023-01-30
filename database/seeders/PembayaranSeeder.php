<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
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
                'petugas_id' => '1',
                'siswa_id' => '5',
                'tanggalbayar' => '2023-01-01',
                'bulanbayar' => 'Januari',
                'tahunbayar' => '2023',
                'jumlahbayar' => '200000',
            ],
            [   //2
                'petugas_id' => '1',
                'siswa_id' => '6',
                'tanggalbayar' => '2023-01-01',
                'bulanbayar' => 'Januari',
                'tahunbayar' => '2023',
                'jumlahbayar' => '300000',
            ],
            [   //3
                'petugas_id' => '3',
                'siswa_id' => '7',
                'tanggalbayar' => '2022-12-01',
                'bulanbayar' => 'Desember',
                'tahunbayar' => '2022',
                'jumlahbayar' => '180000',
            ],
        ])->each(function($pembayaran){
            Pembayaran::create($pembayaran);
        });
    }
}
