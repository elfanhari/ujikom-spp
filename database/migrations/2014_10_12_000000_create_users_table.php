<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();               
            $table->string('name');                         //WAJIB
            $table->enum('level', ['admin', 'petugas', 'siswa']);   //WAJIB
            $table->foreignId('kelas_id')->nullable();      // Wajib bagi siswa
            $table->enum('jk', ['laki-laki', 'perempuan']);   //WAJIB
            $table->foreignId('spp_id')->nullable();        // Wajib bagi siswa
            $table->string('nisn')->unique()->nullable();   // Wajib bagi siswa
            $table->string('nis')->unique()->nullable();    // Wajib bagi siswa
            $table->string('telepon');                      //WAJIB
            $table->text('alamat')->nullable();             // Wajib bagi siswa
            $table->string('email')->unique();              //WAJIB
            $table->string('username')->unique();           //WAJIB
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('aktif')->default(true)->nullable();
            $table->boolean('lulus')->default(false)->nullable();
            $table->text('password');   //WAJIB
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
