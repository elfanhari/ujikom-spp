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
                'identifier' => 'i' . Str::random(9),
                'pengirim_id' => '3',
                'penerima_id' => '5',
                'pesan' => 'Transaksi anda telah dikonfirmasi berhasil! Terima kasih telah melakukan pembayaran. #SemangatBelajar',
                'tipe' => 'sukses',
            ],
            [
                'identifier' => 'i' . Str::random(9),
                'pengirim_id' => '4',
                'penerima_id' => '5',
                'pesan' => 'Anda belum melakukan pembayaran pada bulan ini. Silahkan lakukan pembayaran segera. #SemangatBelajar',
                'tipe' => 'info',
            ],
            [
                'identifier' => 'i' . Str::random(9),
                'pengirim_id' => '3',
                'penerima_id' => '6',
                'pesan' => 'Transaksi anda telah dikonfirmasi berhasil! Terima kasih telah melakukan pembayaran. #SemangatBelajar',
                'tipe' => 'sukses',
            ],
            [
                'identifier' => 'i' . Str::random(9),
                'pengirim_id' => '1',
                'penerima_id' => '7',
                'pesan' => 'Transaksi anda gagal diproses! Lampirkan bukti pembayaran yang valid. #SemangatBelajar',
                'tipe' => 'peringatan',
            ],
        ])->each(function($notifikasi){
            Notifikasi::create($notifikasi);
        });
    }
}
