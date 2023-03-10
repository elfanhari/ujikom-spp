<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogaktivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logaktivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('aktivitas');
            $table->string('tabel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logaktivitas');
    }

    public function pembayaranTrigger() // cuma buat nyimpen sintaks trigger
    {
        // DELIMITER $$

        //     CREATE TRIGGER `update_pembayaran_sukses` AFTER UPDATE ON `pembayarans`
        //     FOR EACH ROW BEGIN
        //         IF NEW.status = 'sukses' THEN
        //         INSERT INTO logaktivitas (user_id, aktivitas, tabel, created_at) VALUES (NEW.petugas_id, CONCAT('Mengubah status pembayaran dari DIPROSES menjadi SUKSES. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
        //         END IF;
        //     END $$

        //     CREATE TRIGGER `add_pembayaran_mandiri` AFTER INSERT ON `pembayarans`
        //     FOR EACH ROW BEGIN
        //         IF NEW.petugas_id IS NULL THEN
        //         INSERT INTO logaktivitas (created_at, user_id, aktivitas, tabel, created_at) VALUES (now(), NEW.siswa_id, CONCAT('Melakukan transaksi secara mandiri. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
        //         END IF;
        //     END $$

        //     CREATE TRIGGER `update_pembayaran_gagal` AFTER UPDATE ON `pembayarans`
        //     FOR EACH ROW BEGIN
        //         IF NEW.status = 'gagal' THEN
        //         INSERT INTO logaktivitas (user_id, aktivitas, tabel, created_at) VALUES (NEW.petugas_id, CONCAT('Mengubah status pembayaran dari DIPROSES menjadi GAGAL. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
        //         END IF;
        //     END $$

        //     CREATE TRIGGER `add_pembayaran_petugas` AFTER INSERT ON `pembayarans`
        //     FOR EACH ROW BEGIN
        //         IF NEW.petugas_id IS NOT NULL THEN
        //         INSERT INTO logaktivitas (user_id, aktivitas, tabel, created_at) VALUES (NEW.petugas_id, CONCAT('Menambah transaksi pembayaran. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
        //         END IF;
        //     END $$

        // DELIMITER ;
    }
}
