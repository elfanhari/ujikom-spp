<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $rand = substr(str_shuffle($char), 0, 9);

        collect([
            [   // 1 - PETUGAS
                'name' => 'Yasrifan S.Kom',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'telepon' => '0837427647263',
                'email' => 'yasrifanpetugas@gmail.com',
                'username' => 'yasrifanpetugas',
                'level' => 'petugas',
                'password' => 'password',
            ],
            [   // 2 - PETUGAS
                'name' => 'Dian Nugraha, S.Pd',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'telepon' => '085878434176',
                'email' => 'dianpetugas@gmail.com',
                'username' => 'dianpetugas',
                'level' => 'petugas',
                'password' => 'password',
            ],
            [   // 3 - PETUGAS
                'name' => 'Rini, S.Kom',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'telepon' => '087623481434',
                'email' => 'rinipetugas@gmail.com',
                'username' => 'rinipetugas',
                'level' => 'petugas',
                'password' => 'password',
            ],
            [   // 4 - ADMIN
                'name' => 'Maman Suparman, S.T',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'telepon' => '087623481434',
                'email' => 'mamanadmin@gmail.com',
                'username' => 'mamanadmin',
                'level' => 'admin',
                'password' => 'password',
            ],
            [   // 5 - ADMIN
                'name' => 'Wahyu Suryaman, S.T',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'telepon' => '086273647241',
                'email' => 'wahyuadmin@gmail.com',
                'username' => 'wahyuadmin',
                'level' => 'admin',
                'password' => 'password',
            ],
            [   // 6 - ADMIN
                'name' => 'Deni, S.Kom',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'telepon' => '087623481434',
                'email' => 'deniadmin@gmail.com',
                'username' => 'deniadmin',
                'level' => 'admin',
                'password' => 'password',
            ],
            [   // 7 - SISWA
                'name' => 'Elfan Hari Saputra',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'kelas_id' => '1',
                'spp_id' => '1',
                'nisn' => '3071526318',
                'nis' => '10.2021.334',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Raya Lakbok',
                'email' => 'elfansiswa@gmail.com',
                'username' => 'elfansiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 8 - SISWA
                'name' => 'Alfitka Haerul Kurniawan',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'kelas_id' => '3',
                'spp_id' => '1',
                'nisn' => '3071526387',
                'nis' => '10.2021.323',
                'telepon' => '081234567878',
                'alamat' => 'Jl. Raya Langensari',
                'email' => 'alfitkasiswa@gmail.com',
                'username' => 'alfitkasiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 9 - SISWA
                'name' => 'Khikmal Kurniawan',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'kelas_id' => '3',
                'spp_id' => '1',
                'nisn' => '3071526312',
                'nis' => '10.2021.001',
                'telepon' => '081234567432',
                'alamat' => 'Jl. Raya Padaringan',
                'email' => 'khikmalsiswa@gmail.com',
                'username' => 'khikmalsiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 10 - SISWA
                'name' => 'Maya',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'perempuan',
                'kelas_id' => '9',
                'spp_id' => '3',
                'nisn' => '3071576343',
                'nis' => '10.2021.002',
                'telepon' => '081290567523',
                'alamat' => 'Jl. Raya Padaringan',
                'email' => 'mayasiswa@gmail.com',
                'username' => 'mayasiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 11 - SISWA
                'name' => 'Bunga',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'perempuan',
                'kelas_id' => '3',
                'spp_id' => '1',
                'nisn' => '3781576387',
                'nis' => '10.2021.003',
                'telepon' => '081234567523',
                'alamat' => 'Jl. Raya Pondokunyur',
                'email' => 'bungasiswa@gmail.com',
                'username' => 'bungasiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 12 - SISWA
                'name' => 'Cantika',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'perempuan',
                'kelas_id' => '1',
                'spp_id' => '1',
                'nisn' => '3071587387',
                'nis' => '10.2021.004',
                'telepon' => '081231267523',
                'alamat' => 'Jl. Raya Kiarapayung',
                'email' => 'cantikasiswa@gmail.com',
                'username' => 'cantikasiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 13 - SISWA
                'name' => 'Yesi',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'perempuan',
                'kelas_id' => '8',
                'spp_id' => '2',
                'nisn' => '3079076387',
                'nis' => '10.2021.005',
                'telepon' => '081212567523',
                'alamat' => 'Jl. Raya Majenang',
                'email' => 'yesisiswa@gmail.com',
                'username' => 'yesisiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 14 - SISWA
                'name' => 'Fera',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'perempuan',
                'kelas_id' => '9',
                'spp_id' => '3',
                'nisn' => '3082576387',
                'nis' => '10.2021.006',
                'telepon' => '081230967523',
                'alamat' => 'Jl. Raya Banjar',
                'email' => 'ferasiswa@gmail.com',
                'username' => 'ferasiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 15 - SISWA
                'name' => 'Andre Daniswara Putra',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'kelas_id' => '1',
                'spp_id' => '1',
                'nisn' => '3071626387',
                'nis' => '10.2021.007',
                'telepon' => '081231267523',
                'alamat' => 'Jl. Raya Kalapasawit',
                'email' => 'andresiswa@gmail.com',
                'username' => 'andresiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
            [   // 16 - SISWA
                'name' => 'Teguh Afriansyah',
                'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
                'jk' => 'laki-laki',
                'kelas_id' => '1',
                'spp_id' => '1',
                'nisn' => '3071626237',
                'nis' => '10.2021.008',
                'telepon' => '081232367523',
                'alamat' => 'Jl. Raya Pondokunyur',
                'email' => 'teguhsiswa@gmail.com',
                'username' => 'teguhsiswa',
                'level' => 'siswa',
                'password' => 'password',
            ],
        ])->each(function($user){
            User::create($user);
        });

    }

}