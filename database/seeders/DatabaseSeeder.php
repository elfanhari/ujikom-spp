<?php

namespace Database\Seeders;

use App\Models\Buktipembayaran;
use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            UserphotoSeeder::class,
            KelasSeeder::class,
            KompetensikeahlianSeeder::class,
            SppSeeder::class,
            PembayaranSeeder::class,
            BulanbayarSeeder::class,
            MetodepembayaranSeeder::class,
            NotifikasiSeeder::class,
            BuktipembayaranSeeder::class,
        ]);
    }
}
