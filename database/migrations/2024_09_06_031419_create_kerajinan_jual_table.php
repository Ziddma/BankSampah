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
        Schema::create('kerajinan_jual', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan_jual');
            $table->foreignId('kerajinan_id')->constrained('kerajinan_masuk');
            $table->integer('jumlah'); 
            $table->foreignId('satuan_id')->constrained('satuan_sampah');
            $table->decimal('harga', 10, 2)->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerajinan_jual');
    }
};
