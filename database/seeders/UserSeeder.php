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
                'name' => 'Jamaludin S.Pd.I',
                'telepon' => '0837427647263',
                'email' => 'jamaludin@gmail.com',
                'username' => 'jamaludin',
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
                'name' => 'Teguh Afriansyah',
                'kelas_id' => '2',
                'spp_id' => '3',
                'nisn' => '3071576387',
                'nis' => '10.2021.348',
                'telepon' => '081234567523',
                'alamat' => 'Jl. Raya Pondokunyur',
                'email' => 'teguh@gmail.com',
                'username' => 'teguh',
                'level' => 'siswa',
                'password' => bcrypt('siswa'),
            ],
        ])->each(function($user){
            User::create($user);
        });
    }

}
