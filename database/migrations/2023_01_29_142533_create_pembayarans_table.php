<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique()->nullable();
            $table->foreignId('petugas_id');
            $table->foreignId('siswa_id');
            $table->foreignId('bulanbayar_id');
            $table->string('tahunbayar');
            $table->date('tanggalbayar');
            $table->bigInteger('jumlahbayar');
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
        Schema::dropIfExists('pembayarans');
    }
}
