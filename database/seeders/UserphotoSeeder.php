<?php

namespace Database\Seeders;

use App\Models\Notifikasi;
use App\Models\Userphoto;
use Illuminate\Database\Seeder;

class UserphotoSeeder extends Seeder
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
                'user_id' => '7',
                'url' => 'gallery1678026555.jpg',
                'created_at' => '2023-03-05 21:29:15',
            ],
        ])->each(function($photo){
            Userphoto::create($photo);
        });
    }
}
