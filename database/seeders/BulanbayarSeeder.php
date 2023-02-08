<?php

namespace Database\Seeders;

use App\Models\Bulanbayar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BulanbayarSeeder extends Seeder
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
                'name' => 'Januari',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Februari',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Maret',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'April',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Mei',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Juni',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Juli',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Agustus',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'September',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Oktober',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'November',
                'identifier' => 'i' . Str::random(9),
            ],
            [
                'name' => 'Desember',
                'identifier' => 'i' . Str::random(9),
            ],
        ])->each(function($bulanbayar){
            Bulanbayar::create($bulanbayar);
        });
    }
}
