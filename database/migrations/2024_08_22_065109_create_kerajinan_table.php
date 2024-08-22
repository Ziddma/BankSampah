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
        Schema::create('kerajinan', function (Blueprint $table) {
            $table->id(); // Menggunakan kolom id sebagai primary key
            $table->string('nama_kerajinan');
            $table->text('deskripsi');
            $table->date('tanggal_dibuat');
            $table->unsignedBigInteger('dibuat_oleh');
            $table->timestamps();

            $table->foreign('dibuat_oleh')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerajinan');
    }
};
