<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ProdukSampah::create([
            'produk' => 'Gelas Plastik',
            'keterangan' => '',
        ]);

        \App\Models\ProdukSampah::create([
            'produk' => 'Ban Bekas',
            'keterangan' => '',
        ]);

        \App\Models\ProdukSampah::create([
            'produk' => 'Kopi Sachet',
            'keterangan' => '',
        ]);

        \App\Models\ProdukSampah::create([
            'produk' => 'Botol Kaca',
            'keterangan' => '',
        ]);
    }
}
