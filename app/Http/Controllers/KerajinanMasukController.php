<?php

namespace App\Http\Controllers;

use App\Models\KerajinanMasuk;
use Illuminate\Http\Request;

class KerajinanMasukController extends Controller
{
  
    public function index()
    {
        $kerajinanMasuk = KerajinanMasuk::all();
        return view('kerajinan_masuk.index', compact('kerajinanMasuk'));
    }

    public function create()
    {
        return view('kerajinan_masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kerajinan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'pembuat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        KerajinanMasuk::create($request->all());

        return redirect()->route('kerajinan_masuk.index')
                         ->with('success', 'Kerajinan masuk berhasil ditambahkan.');
    }

    public function show(KerajinanMasuk $kerajinanMasuk)
    {
        return view('kerajinan_masuk.show', compact('kerajinanMasuk'));
    }

    public function edit(KerajinanMasuk $kerajinanMasuk)
    {
        $kerajinan = $kerajinanMasuk; 
        return view('kerajinan_masuk.edit', compact('kerajinan'));
    }

    public function update(Request $request, KerajinanMasuk $kerajinanMasuk)
    {
        $request->validate([
            'nama_kerajinan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'pembuat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        $kerajinanMasuk->update($request->all());

        return redirect()->route('kerajinan_masuk.index')
                         ->with('success', 'Kerajinan masuk berhasil diupdate.');
    }

    public function destroy(KerajinanMasuk $kerajinanMasuk)
    {
        $kerajinanMasuk->delete();

        return redirect()->route('kerajinan_masuk.index')
                         ->with('success', 'Kerajinan masuk berhasil dihapus.');
    }
}
