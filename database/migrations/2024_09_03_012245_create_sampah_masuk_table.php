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
            $table->string('nama_siswa');
            $table->foreignId('kategori_id')->constrained('kategori_sampah');
            $table->decimal('jumlah', 10, 2);
            $table->string('satuan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sampah_masuk');
    }
};
