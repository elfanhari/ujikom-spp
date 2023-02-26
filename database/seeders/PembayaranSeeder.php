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
        $petugas_id = [1, 2, 3, 4, 5, 6];
        $siswa_id = [7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
        $jumlahbayar = [100000, 200000, 300000, 400000];
        $tanggal = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15'];
        $char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $rand = substr(str_shuffle($char), 0, 9);

        collect([
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '8',
                'tanggalbayar' => '2023-02-01',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-01 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '8',
                'tanggalbayar' => '2023-02-01',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-01 11:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '9',
                'tanggalbayar' => '2023-02-02',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-02 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '10',
                'tanggalbayar' => '2023-02-03',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-03 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '12',
                'tanggalbayar' => '2023-02-04',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-04 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '12',
                'tanggalbayar' => '2023-02-06',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-06 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '12',
                'tanggalbayar' => '2023-02-10',
                'bulanbayar_id' => '3',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-10 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '13',
                'tanggalbayar' => '2023-02-13',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '110000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-13 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '13',
                'tanggalbayar' => '2023-02-13',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '110000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-13 10:53:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '14',
                'tanggalbayar' => '2023-02-14',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-14 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '14',
                'tanggalbayar' => '2023-02-14',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '120000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-14 10:44:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '15',
                'tanggalbayar' => '2023-02-02',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-02 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '15',
                'tanggalbayar' => '2023-02-03',
                'bulanbayar_id' => '2',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-03 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '15',
                'tanggalbayar' => '2023-02-09',
                'bulanbayar_id' => '3',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-09 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '15',
                'tanggalbayar' => '2023-02-14',
                'bulanbayar_id' => '4',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-14 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '15',
                'tanggalbayar' => '2023-02-15',
                'bulanbayar_id' => '5',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-15 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '16',
                'tanggalbayar' => '2023-02-24',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-24 10:43:23'
            ],  
            [   //1
                'petugas_id' => Arr::random($petugas_id),
                'siswa_id' => '11',
                'tanggalbayar' => '2023-02-25',
                'bulanbayar_id' => '1',
                'tahunbayar' => '2023',
                'jumlahbayar' => '100000',
                'identifier' => 'i' . Str::random(9),
                'metodepembayaran_id' => '8',
                'jenistransaksi' => 'petugas',
                'status' => 'sukses',
                'created_at' => '2023-02-25 10:43:23'
            ],  
        ])->each(function($pembayaran){
            Pembayaran::create($pembayaran);
        });
    }
}
