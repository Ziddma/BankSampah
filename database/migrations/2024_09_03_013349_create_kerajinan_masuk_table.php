<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kerajinan_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kerajinan');
            $table->string('kode_barang')->unique();
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah');
            $table->string('pembuat');
            $table->decimal('harga_satuan', 10, 2)->unsigned();
            $table->date('tanggal_masuk')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerajinan_masuk');
    }
};
