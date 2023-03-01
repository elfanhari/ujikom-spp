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
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Februari',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Maret',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'April',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Mei',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Juni',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Juli',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Agustus',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'September',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Oktober',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'November',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
            [
                'name' => 'Desember',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            ],
        ])->each(function($bulanbayar){
            Bulanbayar::create($bulanbayar);
        });
    }
}
