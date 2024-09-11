<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sampah_jual', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penjualan')->unique();
            $table->string('kode_barang');
            $table->string('nama_pembeli');
            $table->foreignId('kategori_id')->constrained('kategori_sampah');
            $table->foreignId('satuan_id')->constrained('satuan_sampah');
            $table->foreignId('produk_id')->constrained('produk_sampah');
            $table->integer('jumlah'); 
            $table->decimal('harga', 10, 2)->nullable();
            $table->decimal('harga_total', 10, 2);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampah_jual');
    }
};
