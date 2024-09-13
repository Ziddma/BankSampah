<?php

namespace App\Http\Controllers;

use App\Models\KerajinanMasuk; // Pastikan model yang benar di-import
use Illuminate\Http\Request;

class KerajinanMasukViewController extends Controller
{
    // Method untuk menampilkan daftar semua kerajinan masuk
    public function index()
    {
        // Mengambil semua data dari tabel kerajinan_masuk
        $kerajinanMasuk = KerajinanMasuk::all();
        // Mengirim data ke view
        return view('kerajinan_masuk_view.index', compact('kerajinanMasuk'));
    }

    // Method untuk menampilkan detail dari item tertentu
    public function show(KerajinanMasuk $kerajinanMasuk)
    {
        // Mengirim data ke view untuk ditampilkan
        return view('kerajinan_masuk_view.show', compact('kerajinanMasuk'));
    }
}
