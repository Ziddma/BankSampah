<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Update this if your model name is different
use Illuminate\Http\Request;

class KategoriSampahController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori_sampah.index', compact('kategori'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('kategori_sampah.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'nama_sampah' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategori_sampah.index')->with('success', 'Kategori sampah berhasil ditambahkan.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori_sampah.edit', compact('kategori'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'nama_sampah' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect()->route('kategori_sampah.index')->with('success', 'Kategori sampah berhasil diperbarui.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori_sampah.index')->with('success', 'Kategori sampah berhasil dihapus.');
    }
}
