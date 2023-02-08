<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulanbayarsTable extends Migration
{
   
    public function up()
    {
        Schema::create('bulanbayars', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique()->nullable();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bulanbayars');
    }
}
