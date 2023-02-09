<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petugas_id = [1, 2, 3, 4];
        $siswa_id = [5, 6, 7, 8, 9, 10, 11, 12, 13];
        $jumlahbayar = [100000, 200000, 300000, 400000];

        $char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $rand = substr(str_shuffle($char), 0, 9);

        collect([
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => Arr::random($siswa_id),
                'tanggalbayar' => '2023-02-08',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
            ],  
        ])->each(function($pembayaran){
            Pembayaran::create($pembayaran);
        });
    }
}
