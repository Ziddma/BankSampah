<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sampah');
            $table->enum('jenis_sampah', ['organik', 'anorganik']);
            $table->foreignId('kategori_id')->constrained('kategori'); // Ensure this is correct
            $table->decimal('berat', 8, 2);
            $table->date('tanggal_diterima');
            $table->foreignId('diterima_oleh')->constrained('users');
            $table->string('sumber_sampah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sampah');
    }
}
