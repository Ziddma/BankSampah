<?php

namespace App\Http\Controllers;

use App\Models\SampahKeluar;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;

class SampahKeluarController extends Controller
{
    public function index()
    {
        $sampahKeluar = SampahKeluar::with('kategori')->get();
        return view('sampah_keluar.index', compact('sampahKeluar'));
    }

    public function create()
    {
        $kategoriSampah = KategoriSampah::all();
        return view('sampah_keluar.create', compact('kategoriSampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        SampahKeluar::create($request->all());

        return redirect()->route('sampah-keluar.index')
            ->with('success', 'Data sampah keluar berhasil ditambahkan.');
    }

    public function show(SampahKeluar $sampahKeluar)
    {
        return view('sampah_keluar.show', compact('sampahKeluar'));
    }

    public function edit(SampahKeluar $sampahKeluar)
    {
        $kategoriSampah = KategoriSampah::all();
        return view('sampah_keluar.edit', compact('sampahKeluar', 'kategoriSampah'));
    }

    public function update(Request $request, SampahKeluar $sampahKeluar)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $sampahKeluar->update($request->all());

        return redirect()->route('sampah-keluar.index')
            ->with('success', 'Data sampah keluar berhasil diperbarui.');
    }

    public function destroy(SampahKeluar $sampahKeluar)
    {
        $sampahKeluar->delete();

        return redirect()->route('sampah-keluar.index')
            ->with('success', 'Data sampah keluar berhasil dihapus.');
    }
}
