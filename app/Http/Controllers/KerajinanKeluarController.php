<?php

namespace App\Http\Controllers;

use App\Models\KerajinanKeluar;
use App\Models\KategoriSampah;
use App\Models\SatuanSampah;
use Illuminate\Http\Request;

class KerajinanKeluarController extends Controller
{
    public function index()
    {
        $kerajinanKeluar = KerajinanKeluar::all();
        return view('kerajinan_keluar.index', compact('kerajinanKeluar'));
    }

    public function create()
    {
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();

        return view('kerajinan_keluar.create', compact('kategoriSampah', 'satuanSampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'nama_tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        KerajinanKeluar::create($request->all());

        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil ditambahkan.');
    }

    public function show(KerajinanKeluar $kerajinanKeluar)
    {
        return view('kerajinan_keluar.show', compact('kerajinanKeluar'));
    }

    public function edit(KerajinanKeluar $kerajinanKeluar)
    {
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        return view('kerajinan_keluar.edit', compact('kerajinanKeluar', 'kategoriSampah', 'satuanSampah'));
    }

    public function update(Request $request, KerajinanKeluar $kerajinanKeluar)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'nama_tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $kerajinanKeluar->update($request->all());

        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil diupdate.');
    }

    public function destroy(KerajinanKeluar $kerajinanKeluar)
    {
        $kerajinanKeluar->delete();

        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil dihapus.');
    }
}
