<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_sampah_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampahTable extends Migration
{
    public function up()
    {
        Schema::create('sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sampah');
            $table->foreignId('kategori_id')->constrained('kategori_sampah', 'idKategori');
            $table->decimal('berat', 8, 2);
            $table->date('tanggal_diterima');
            $table->foreignId('diterima_oleh')->constrained('users');
            $table->foreignId('sumber_sampah')->constrained('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sampah');
    }
}

