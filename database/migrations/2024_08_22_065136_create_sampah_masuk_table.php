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
        Schema::create('sampah_masuk', function (Blueprint $table) {
            $table->id(); // Menggunakan kolom id sebagai primary key
            $table->unsignedBigInteger('sampah_id');
            $table->float('berat_masuk');
            $table->date('tanggal_masuk');
            $table->unsignedBigInteger('diterima_oleh');
            $table->timestamps();

            $table->foreign('sampah_id')->references('id')->on('sampah')->onDelete('cascade');
            $table->foreign('diterima_oleh')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampah_masuk');
    }
};
