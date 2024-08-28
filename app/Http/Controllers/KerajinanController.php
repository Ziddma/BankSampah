<?php

namespace App\Http\Controllers;

use App\Models\Kerajinan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KerajinanController extends Controller
{
    // Display a listing of the resource
    public function index(Request $request)
    {
        // Apply filters if provided
        $kerajinan = Kerajinan::query();

        if ($request->filled('kategori_kerajinan')) {
            $kerajinan->where('kategori', 'like', '%' . $request->kategori_kerajinan . '%');
        }

        if ($request->filled('pengrajin')) {
            $kerajinan->where('pengrajin', 'like', '%' . $request->pengrajin . '%');
        }

        if ($request->filled('sumber_kerajinan')) {
            $kerajinan->where('sumber_kerajinan', 'like', '%' . $request->sumber_kerajinan . '%');
        }

        $kerajinan = $kerajinan->get();

        return view('kerajinan.index', compact('kerajinan'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('kerajinan.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kerajinan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'tanggal_dibuat' => 'required|date',
            'pengrajin' => 'required|string|max:255',
            'sumber_kerajinan' => 'nullable|string|max:255',
        ]);

        Kerajinan::create($validatedData);

        return redirect()->route('kerajinan.index')->with('success', 'Kerajinan berhasil ditambahkan.');
    }

    // Show the form for editing the specified resource
    public function edit(Kerajinan $kerajinan)
    {
        // Pastikan tanggal_dibuat adalah objek DateTime atau Carbon
        $kerajinan->tanggal_dibuat = Carbon::parse($kerajinan->tanggal_dibuat)->format('Y-m-d');

        return view('kerajinan.edit', compact('kerajinan'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Kerajinan $kerajinan)
    {
        $validatedData = $request->validate([
            'nama_kerajinan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'tanggal_dibuat' => 'required|date',
            'pengrajin' => 'required|string|max:255',
        ]);

        $kerajinan->update($validatedData);

        return redirect()->route('kerajinan.index')->with('success', 'Kerajinan berhasil diperbarui.');
    }

    // Remove the specified resource from storage
    public function destroy(Kerajinan $kerajinan)
    {
        $kerajinan->delete();

        return redirect()->route('kerajinan.index')->with('success', 'Kerajinan berhasil dihapus.');
    }
}
