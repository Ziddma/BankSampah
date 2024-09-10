<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use App\Models\KategoriSampah;
use App\Models\KerajinanMasuk;
use App\Models\SatuanSampah;
use Illuminate\Http\Request;

class SampahJualController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        $sampahJual = SampahJual::all();
        return view('sampah_jual.index', compact('sampahJual'));
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     */
    public function create()
    {
        
        $kerajinan = KerajinanMasuk::all();
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        return view('sampah_jual.create', compact('kategoriSampah', 'satuanSampah', 'kerajinan'));
    }

    /**
     * Menyimpan resource baru ke dalam storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tujuan_jual' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'nullable|numeric',
            'tanggal' => 'required|date',
        ]);

        SampahJual::create($request->all());

        return redirect()->route('sampah_jual.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show(SampahJual $sampahJual)
    {
        return view('sampah_jual.show', compact('sampahJual'));
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik.
     */
    public function edit(SampahJual $sampahJual)
    {
        $kerajinan = KerajinanMasuk::all();
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        return view('sampah_jual.edit', compact('sampahJual', 'kategoriSampah', 'satuanSampah', 'kerajinan'));
    }

    /**
     * Memperbarui resource yang spesifik dalam storage.
     */
    public function update(Request $request, SampahJual $sampahJual)
    {
        $request->validate([
            'tujuan_jual' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'nullable|numeric',
            'tanggal' => 'required|date',
        ]);

        $sampahJual->update($request->all());

        return redirect()->route('sampah_jual.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Menghapus resource yang spesifik dari storage.
     */
    public function destroy(SampahJual $sampahJual)
    {
        $sampahJual->delete();
        return redirect()->route('sampah_jual.index')->with('success', 'Data berhasil dihapus.');
    }
}
