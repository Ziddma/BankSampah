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
        Schema::create('sampah', function (Blueprint $table) {
            $table->id(); // Menggunakan kolom id sebagai primary key
            $table->string('nama_sampah');
            $table->string('kategori');
            $table->float('berat');
            $table->date('tanggal_diterima');
            $table->unsignedBigInteger('diterima_oleh');
            $table->unsignedBigInteger('sumber_sampah');
            $table->timestamps();

            $table->foreign('diterima_oleh')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sumber_sampah')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampah');
    }
};
