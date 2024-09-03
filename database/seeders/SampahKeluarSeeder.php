<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SampahKeluar;
use App\Models\KategoriSampah;

class SampahKeluarSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = KategoriSampah::first();

        SampahKeluar::create([
            'kategori_id' => $kategori->id,
            'jumlah' => 50,
            'satuan' => 'kg',
            'tujuan' => 'Pabrik Daur Ulang XYZ',
            'tanggal_keluar' => now(),
            'keterangan' => 'Pengiriman rutin bulanan',
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
