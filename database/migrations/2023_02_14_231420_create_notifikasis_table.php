<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();
            $table->foreignId('pengirim_id');
            $table->foreignId('penerima_id')->nullable();
            $table->text('pesan');
            $table->enum('tipe', ['info', 'sukses', 'peringatan']);
            $table->boolean('dibaca')->default(false);
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
        Schema::dropIfExists('notifikasis');
    }
}
