<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kerajinan_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kerajinan');
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->string('pembeli')->nullable();
            $table->date('tanggal_keluar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerajinan_keluar');
    }
};
