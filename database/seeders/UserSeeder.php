<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [   // 1 - PETUGAS
                'name' => 'Yasrifan S.Kom',
                'telepon' => '0837427647263',
                'email' => 'yasrifan@gmail.com',
                'username' => 'yasrifan',
                'level' => 'petugas',
                'password' => bcrypt('petugas'),
            ],
            [   // 2 - PETUGAS
                'name' => 'Dian Nugraha, S.Pd',
                'telepon' => '085878434176',
                'email' => 'dian@gmail.com',
                'username' => 'dian',
                'level' => 'petugas',
                'password' => bcrypt('petugas'),
            ],
            [   // 3 - ADMIN
                'name' => 'Maman Suparman, S.T',
                'telepon' => '087623481434',
                'email' => 'maman@gmail.com',
                'username' => 'maman',
                'level' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [   // 4 - ADMIN
                'name' => 'Wahyu Suryaman, S.T',
                'telepon' => '086273647241',
                'email' => 'wahyu@gmail.com',
                'username' => 'wahyu',
                'level' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [   // 5 - SISWA
                'name' => 'Elfan Hari Saputra',
                'kelas_id' => '1',
                'spp_id' => '3',
                'nisn' => '3071526318',
                'nis' => '10.2021.334',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Raya Lakbok',
                'email' => 'elfan@gmail.com',
                'username' => 'elfan',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 6 - SISWA
                'name' => 'Alfitka Haerul Kurniawan',
                'kelas_id' => '3',
                'spp_id' => '4',
                'nisn' => '3071526387',
                'nis' => '10.2021.323',
                'telepon' => '081234567878',
                'alamat' => 'Jl. Raya Langensari',
                'email' => 'alfitka@gmail.com',
                'username' => 'alfitka',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 7 - SISWA
                'name' => 'Khikmal Kurniawan',
                'kelas_id' => '3',
                'spp_id' => '4',
                'nisn' => '3071526312',
                'nis' => '10.2021.001',
                'telepon' => '081234567432',
                'alamat' => 'Jl. Raya Padaringan',
                'email' => 'khikmal@gmail.com',
                'username' => 'khikmal',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 8 - SISWA
                'name' => 'Dwi Utami',
                'kelas_id' => '1',
                'spp_id' => '4',
                'nisn' => '3071576343',
                'nis' => '10.2021.002',
                'telepon' => '081290567523',
                'alamat' => 'Jl. Raya Padaringan',
                'email' => 'dwi@gmail.com',
                'username' => 'dwi',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 9 - SISWA
                'name' => 'Intan',
                'kelas_id' => '3',
                'spp_id' => '4',
                'nisn' => '3781576387',
                'nis' => '10.2021.003',
                'telepon' => '081234567523',
                'alamat' => 'Jl. Raya Pondokunyur',
                'email' => 'intan@gmail.com',
                'username' => 'intan',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 10 - SISWA
                'name' => 'Cantika Aurelia April',
                'kelas_id' => '1',
                'spp_id' => '4',
                'nisn' => '3071587387',
                'nis' => '10.2021.004',
                'telepon' => '081231267523',
                'alamat' => 'Jl. Raya Kiarapayung',
                'email' => 'cantika@gmail.com',
                'username' => 'cantika',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 11 - SISWA
                'name' => 'Delista',
                'kelas_id' => '8',
                'spp_id' => '4',
                'nisn' => '3079076387',
                'nis' => '10.2021.005',
                'telepon' => '081212567523',
                'alamat' => 'Jl. Raya Majenang',
                'email' => 'delista@gmail.com',
                'username' => 'delista',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 12 - SISWA
                'name' => 'Fera Asti Setiani',
                'kelas_id' => '9',
                'spp_id' => '3',
                'nisn' => '3082576387',
                'nis' => '10.2021.006',
                'telepon' => '081230967523',
                'alamat' => 'Jl. Raya Banjar',
                'email' => 'fera@gmail.com',
                'username' => 'fera',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
            [   // 13 - SISWA
                'name' => 'Andre Daniswara Putra',
                'kelas_id' => '1',
                'spp_id' => '4',
                'nisn' => '3071626387',
                'nis' => '10.2021.007',
                'telepon' => '081231267523',
                'alamat' => 'Jl. Raya Kalapasawit',
                'email' => 'andre@gmail.com',
                'username' => 'andre',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
        ])->each(function($user){
            User::create($user);
        });
    }

}