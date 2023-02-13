<?php

namespace Database\Seeders;

use App\Models\User;
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
            KelasSeeder::class,
            KompetensikeahlianSeeder::class,
            SppSeeder::class,
            PembayaranSeeder::class,
            BulanbayarSeeder::class,
            MetodepembayaranSeeder::class
        ]);
    }
}
