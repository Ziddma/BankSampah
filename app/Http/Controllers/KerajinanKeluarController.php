<?php

namespace App\Http\Controllers;

use App\Models\KerajinanKeluar;
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
        return view('kerajinan_keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kerajinan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'pembeli' => 'nullable|string|max:255',
            'tanggal_keluar' => 'required|date',
        ]);

        KerajinanKeluar::create($request->all());

        return redirect()->route('kerajinan-keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil ditambahkan.');
    }

    public function show(KerajinanKeluar $kerajinanKeluar)
    {
        return view('kerajinan_keluar.show', compact('kerajinanKeluar'));
    }

    public function edit(KerajinanKeluar $kerajinanKeluar)
    {
        return view('kerajinan_keluar.edit', compact('kerajinanKeluar'));
    }

    public function update(Request $request, KerajinanKeluar $kerajinanKeluar)
    {
        $request->validate([
            'nama_kerajinan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'pembeli' => 'nullable|string|max:255',
            'tanggal_keluar' => 'required|date',
        ]);

        $kerajinanKeluar->update($request->all());

        return redirect()->route('kerajinan-keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil diperbarui.');
    }

    public function destroy(KerajinanKeluar $kerajinanKeluar)
    {
        $kerajinanKeluar->delete();

        return redirect()->route('kerajinan-keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil dihapus.');
    }
}
