<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kerajinan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kerajinan');
            $table->string('kategori');
            $table->string('bahan');
            $table->date('tanggal_dibuat');
            $table->string('pengrajin');
            $table->string('sumber_kerajinan')->nullable();
            $table->timestamps();
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
