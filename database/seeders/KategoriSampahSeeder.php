<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriSampah;

class KategoriSampahSeeder extends Seeder
{
    public function run(): void
    {
        KategoriSampah::create([
            'kategori' => 'Kertas',
            'satuan' => 'kg',
            'keterangan' => 'Sampah kertas dan kardus',
        ]);

        KategoriSampah::create([
            'kategori' => 'Plastik',
            'satuan' => 'kg',
            'keterangan' => 'Sampah plastik berbagai jenis',
        ]);
        
        KategoriSampah::create([
            'kategori' => 'Besi',
            'satuan' => 'gr',
            'keterangan' => 'Sampah besi bekas sekolah',
        ]);

        // Tambahkan kategori lain sesuai kebutuhan
    }
}
