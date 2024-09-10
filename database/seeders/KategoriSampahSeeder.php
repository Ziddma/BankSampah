<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriSampah;

class KategoriSampahSeeder extends Seeder
{
    public function run(): void
    {

        \App\Models\KategoriSampah::create([
            'kategori' => 'Kertas',
            'keterangan' => 'Sampah kertas dan kardus',
        ]);
        \App\Models\KategoriSampah::create([
            'kategori' => 'Plastik',
            'keterangan' => 'Sampah plastik berbagai jenis',
        ]);
        \App\Models\KategoriSampah::create([
            'kategori' => 'Besi',
            'keterangan' => 'Sampah besi bekas sekolah',
        ]);
        \App\Models\KategoriSampah::create([
            'kategori' => 'Kayu',
            'keterangan' => 'Sampah meja kayu',
        ]);
        \App\Models\KategoriSampah::create([
            'kategori' => 'Kaca',
            'keterangan' => 'botol sirup',
        ]);

        // Tambahkan kategori lain sesuai kebutuhan
    }
}
