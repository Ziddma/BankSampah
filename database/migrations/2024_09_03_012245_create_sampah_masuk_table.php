<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sampah_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama');
            $table->foreignId('kategori_id')->constrained('kategori_sampah');
            $table->foreignId('satuan_id')->constrained('satuan_sampah');
            $table->foreignId('produk_id')->constrained('produk_sampah');
            $table->decimal('jumlah', 10, 2)->unsigned();
            $table->decimal('harga_satuan', 10, 2)->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sampah_masuk');
    }
};
