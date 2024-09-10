<?php

namespace App\Http\Controllers;

use App\Models\ProdukSampah;
use Illuminate\Http\Request;

class ProdukSampahController extends Controller
{
    public function index()
    {
        $produkSampah = ProdukSampah::all();
        return view('produk_sampah.index', compact('produkSampah'));
    }

    public function create()
    {
        return view('produk_sampah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        ProdukSampah::create($request->all());

        return redirect()->route('produk_sampah.index')
            ->with('success', 'Produk sampah berhasil ditambahkan.');
    }

    public function show(ProdukSampah $produkSampah)
    {
        return view('produk_sampah.show', compact('produkSampah'));
    }

    public function edit(ProdukSampah $produkSampah)
    {
        return view('produk_sampah.edit', compact('produkSampah'));
    }

    public function update(Request $request, ProdukSampah $produkSampah)
    {
        $request->validate([
            'produk' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $produkSampah->update($request->all());

        return redirect()->route('produk_sampah.index')
            ->with('success', 'Produk sampah berhasil diperbarui.');
    }

    public function destroy(ProdukSampah $produkSampah)
    {
        $produkSampah->delete();

        return redirect()->route('produk_sampah.index')
            ->with('success', 'Produk sampah berhasil dihapus.');
    }
}
