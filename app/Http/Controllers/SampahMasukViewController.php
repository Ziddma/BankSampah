<?php

namespace App\Http\Controllers;

use App\Models\SampahMasuk;
use Illuminate\Http\Request;

class SampahMasukViewController extends Controller
{
    // Menampilkan daftar semua sampah masuk
    public function index()
    {
        // Mengambil semua data SampahMasuk beserta relasinya
        $sampahMasuk = SampahMasuk::with(['kategori', 'satuan', 'produk'])->get();
        
        // Mengirim data ke view
        return view('sampah_masuk_view.index', compact('sampahMasuk'));
    }

    // Menampilkan detail data sampah masuk tertentu
    public function show(SampahMasuk $sampahMasuk)
    {
        // Mengirim data ke view untuk ditampilkan
        return view('sampah_masuk_view.show', compact('sampahMasuk'));
    }
}
