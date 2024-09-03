<?php

namespace App\Http\Controllers;

use App\Models\KategoriSampah;
use Illuminate\Http\Request;

class KategoriSampahController extends Controller
{
    public function index()
    {
        $kategoriSampah = KategoriSampah::all();
        return view('kategori_sampah.index', compact('kategoriSampah'));
    }

    public function create()
    {
        return view('kategori_sampah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        KategoriSampah::create($request->all());

        return redirect()->route('kategori_sampah.index')
            ->with('success', 'Kategori sampah berhasil ditambahkan.');
    }

    public function show(KategoriSampah $kategoriSampah)
    {
        return view('kategori_sampah.show', compact('kategoriSampah'));
    }

    public function edit(KategoriSampah $kategoriSampah)
    {
        return view('kategori_sampah.edit', compact('kategoriSampah'));
    }

    public function update(Request $request, KategoriSampah $kategoriSampah)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategoriSampah->update($request->all());

        return redirect()->route('kategori_sampah.index')
            ->with('success', 'Kategori sampah berhasil diperbarui.');
    }

    public function destroy(KategoriSampah $kategoriSampah)
    {
        $kategoriSampah->delete();

        return redirect()->route('kategori_sampah.index')
            ->with('success', 'Kategori sampah berhasil dihapus.');
    }
}
