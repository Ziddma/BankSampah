<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTotalHargaColumnInPenjualanTable extends Migration
{
    public function up()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->integer('totalharga')->default(0)->change(); // Set a default value of 0
        });
    }

    public function down()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->integer('totalharga')->default(null)->change(); // Remove default value
        });
    }
}
