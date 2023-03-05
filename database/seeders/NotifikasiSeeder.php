<?php

namespace Database\Seeders;

use App\Models\Notifikasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'identifier' => 'iPrrr1678027953KUkvW',
                'pengirim_id' => '1',
                'penerima_id' => '7',
                'pesan' => 'Halo, Elfan Hari Saputra! Anda belum melakukan pembayaran untuk Januari - 2022. Segera lakukan pembayaran ya!',
                'tipe' => 'peringatan',
                'dibaca' => 1,
                'created_at' => '2023-03-05 20:13:29'
            ],
            [
                'identifier' => 'i5ib01678025609L2AT4',
                'pengirim_id' => '1',
                'penerima_id' => '7',
                'pesan' => 'Transaksi anda dengan kode I0LWQ1678025608MRU4H sedang diproses! Tunggu konfirmasi selanjutnya dari petugas!',
                'tipe' => 'info',
                'dibaca' => 0,
                'created_at' => '2023-03-05 21:13:29'
            ],
            [
                'identifier' => 'i4Wbq1678025609FEyLY',
                'pengirim_id' => '7',
                'penerima_id' => null,
                'pesan' => 'Elfan Hari Saputra - XII RPL 1 melakukan pembayaran mandiri untuk Januari 2022 dengan kode transaksi I0LWQ1678025608MRU4H pada tanggal 05-03-2023 pukul 21:13:29 WIB.',
                'tipe' => 'info',
                'dibaca' => 0,
                'created_at' => '2023-03-05 21:13:29'
            ],
            [
                'identifier' => 'iXLVT1678028312b1Jml',
                'pengirim_id' => '8',
                'penerima_id' => null,
                'pesan' => 'Alfitka Haerul Kurniawan - XII AKL 2 melakukan pembayaran mandiri untuk September 2020 dengan kode transaksi IWVCM16780283129PUE3 pada tanggal 05-03-2023 pukul 21:58:32 WIB.',
                'tipe' => 'info',
                'dibaca' => 1,
                'created_at' => '2023-03-05 21:58:32'
            ],
            [
                'identifier' => 'iWJ0I1678028364OGUDP',
                'pengirim_id' => '4',
                'penerima_id' => '8',
                'pesan' => 'Transaksi anda dengan kode IWVCM16780283129PUE3 gagal diproses! Silahkan lakukan pembayaran ulang dengan melampirkan bukti transfer yang valid atau melakukan pembayaran melalui petugas di Ruang Tata Usaha. Terima kasih',
                'tipe' => 'peringatan',
                'dibaca' => 1,
                'created_at' => '2023-03-05 21:59:24'
            ],
        ])->each(function($notifikasi){
            Notifikasi::create($notifikasi);
        });
    }
}
