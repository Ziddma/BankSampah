<?php

namespace App\Http\Controllers;

use App\Models\KerajinanMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        // Validate the incoming request data
        $request->validate([
            'kode_barang.*' => 'nullable|string', // kode_barang will be generated, so validation here is optional
            'nama_kerajinan.*' => 'required|string|max:255',
            'deskripsi.*' => 'nullable|string',
            'jumlah.*' => 'required|integer',
            'pembuat.*' => 'required|string|max:255',
            'harga_satuan.*' => 'required|numeric|min:0',
        ]);
    
        // Loop through each 'nama_kerajinan' entry to create a new record
        foreach ($request->nama_kerajinan as $index => $nama_kerajinan) {
            KerajinanMasuk::create([
                'kode_barang' => 'KRJ-' . Str::upper(Str::random(8)),
                'nama_kerajinan' => $nama_kerajinan,
                'deskripsi' => $request->deskripsi[$index] ?? null,
                'jumlah' => $request->jumlah[$index],
                'pembuat' => $request->pembuat[$index],
                'harga_satuan' => $request->harga_satuan[$index],
            ]);
        }
    
        // Redirect with success message
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
            // 'tanggal_masuk' => 'required|date',
            'harga_satuan' => 'required|numeric|min:0',
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
