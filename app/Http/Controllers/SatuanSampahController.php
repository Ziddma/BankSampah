<?php

namespace App\Http\Controllers;

use App\Models\SatuanSampah;
use Illuminate\Http\Request;

class SatuanSampahController extends Controller
{
    public function index()
    {
        $satuanSampah = SatuanSampah::all();
        return view('satuan_sampah.index', compact('satuanSampah'));
    }

    public function create()
    {
        $satuanSampah = SatuanSampah::all();
        return view('satuan_sampah.create', compact('satuanSampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        SatuanSampah::create($request->all());

        return redirect()->route('satuan_sampah.index')
            ->with('success', 'Satuan sampah berhasil ditambahkan.');
    }

    public function show(SatuanSampah $satuanSampah)
    {
        return view('satuan_sampah.show', compact('satuanSampah'));
    }

    public function edit(SatuanSampah $satuanSampah)
    {
        return view('satuan_sampah.edit', compact('satuanSampah'));
    }

    public function update(Request $request, SatuanSampah $satuanSampah)
    {
        $request->validate([
            'satuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $satuanSampah->update($request->all());

        return redirect()->route('satuan_sampah.index')
            ->with('success', 'Satuan sampah berhasil diperbarui.');
    }

    public function destroy(SatuanSampah $satuanSampah)
    {
        $satuanSampah->delete();

        return redirect()->route('satuan_sampah.index')
            ->with('success', 'Satuan sampah berhasil dihapus.');
    }
}
