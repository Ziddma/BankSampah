<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SampahMasuk;
use App\Models\KategoriSampah;

class SampahMasukSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = KategoriSampah::first();

        SampahMasuk::create([
            'nama_siswa' => 'John Doe',
            'kategori_id' => $kategori->id,
            'jumlah' => 5.5,
            'satuan' => 'kg',
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
