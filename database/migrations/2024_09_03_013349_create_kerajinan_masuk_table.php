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
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah');
            $table->string('pembuat');
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerajinan_masuk');
    }
};
