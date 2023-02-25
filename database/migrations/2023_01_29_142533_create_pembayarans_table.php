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
            $table->foreignId('petugas_id')->nullable();
            $table->foreignId('siswa_id');
            $table->foreignId('bulanbayar_id');
            $table->foreignId('metodepembayaran_id')->nullable();
            $table->date('tanggalbayar');
            $table->string('tahunbayar');
            $table->bigInteger('jumlahbayar');
            $table->enum('jenistransaksi', ['mandiri', 'petugas'])->nullable();
            $table->enum('status', ['diproses', 'sukses', 'gagal'])->nullable();
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
