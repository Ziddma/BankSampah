<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KerajinanMasuk;

class KerajinanMasukSeeder extends Seeder
{
    public function run(): void
    {
        KerajinanMasuk::create([
            'nama_kerajinan' => 'Tas Daur Ulang',
            'deskripsi' => 'Tas dari bahan plastik daur ulang',
            'jumlah' => 10,
            'pembuat' => 'Kelompok Kreatif A',
            'tanggal_masuk' => now(),
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
