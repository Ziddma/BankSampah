<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerajinansTable extends Migration
{
    public function up()
    {
        Schema::create('kerajinans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kerajinan');
            $table->string('kategori');
            $table->string('bahan');
            $table->date('tanggal_dibuat');
            $table->string('pengrajin');
            $table->string('sumber_kerajinan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kerajinans');
    }
}