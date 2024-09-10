<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KerajinanJualController extends Controller
{
     /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        $kerajinanJual = KerajinanJual::all();
        return view('kerajinan_jual.index', compact('kerajinanJual'));
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     */
    public function create()
    {
        
        $kerajinanMasuk = KerajinanMasuk::all();
        $satuanSampah = SatuanSampah::all();
        return view('kerajinan_jual.create', compact('satuanSampah', 'kerajinan'));
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

        KerajinanJual::create($request->all());

        return redirect()->route('kerajinan_jual.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show(KerajinanJual $kerajinanJual)
    {
        return view('kerajinan_jual.show', compact('kerajinanJual'));
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik.
     */
    public function edit(KerajinanJual $kerajinanJual)
    {
        $kerajinanMasuk = KerajinanMasuk::all();
        $satuanSampah = SatuanSampah::all();
        return view('kerajinan_jual.edit', compact('kerajinanJual', 'satuanSampah', 'kerajinan'));
    }

    /**
     * Memperbarui resource yang spesifik dalam storage.
     */
    public function update(Request $request, KerajinanJual $kerajinanJual)
    {
        $request->validate([
            'tujuan_jual' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'nullable|numeric',
            'tanggal' => 'required|date',
        ]);

        $kerajinanJual->update($request->all());

        return redirect()->route('kerajinan_jual.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Menghapus resource yang spesifik dari storage.
     */
    public function destroy(KerajinanJual $kerajinanJual)
    {
        $kerajinanJual->delete();
        return redirect()->route('kerajinan_jual.index')->with('success', 'Data berhasil dihapus.');
    }
}
