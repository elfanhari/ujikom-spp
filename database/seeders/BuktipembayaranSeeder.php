<?php

namespace Database\Seeders;

use App\Models\Buktipembayaran;
use Illuminate\Database\Seeder;

class BuktipembayaranSeeder extends Seeder
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
                'identifier' => 'iCYZo1678025609u5Gvo',
                'pembayaran_id' => '32',
                'url' => 'buktipembayaran1678025609.jpg',
                'created_at' => '2023-03-05 21:13:29',
            ],
            [
                'identifier' => 'ilcyb1678028312CyJk8',
                'pembayaran_id' => '33',
                'url' => 'buktipembayaran1678028312.png',
                'created_at' => '2023-03-05 21:58:32',
            ],
        ])->each(function($bukti){
            Buktipembayaran::create($bukti);
        });
    }
}
