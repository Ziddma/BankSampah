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
            $table->foreignId('kategori_id')->constrained('kategori_sampah');
            $table->decimal('jumlah', 10, 2);
            $table->foreignId('satuan_id')->constrained('satuan_sampah');
            $table->string('nama_tujuan');
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerajinan_keluar');
    }
};
