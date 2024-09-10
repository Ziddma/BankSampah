<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SatuanSampah;

class SatuanSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\SatuanSampah::create([
            'satuan' => 'Kilogram (kg)',
            'keterangan' => '',
        ]);
        \App\Models\SatuanSampah::create([
            'satuan' => 'Gram (g)',
            'keterangan' => '',
        ]);
        \App\Models\SatuanSampah::create([
            'satuan' => 'Meter (m)',
            'keterangan' => '',
        ]);
        \App\Models\SatuanSampah::create([
            'satuan' => 'Kilometer (km)',
            'keterangan' => '',
        ]);

        \App\Models\SatuanSampah::create([
            'satuan' => 'Piece (pcs)',
            'keterangan' => '',
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
