<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KerajinanKeluar;

class KerajinanKeluarSeeder extends Seeder
{
    public function run(): void
    {
        KerajinanKeluar::create([
            'nama_kerajinan' => 'Vas Bunga',
            'deskripsi' => 'Vas bunga dari botol plastik bekas',
            'jumlah' => 5,
            'harga' => 25000,
            'pembeli' => 'Toko Souvenir ABC',
            'tanggal_keluar' => now(),
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
