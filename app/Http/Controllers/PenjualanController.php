<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index()
    {
        
        $penjualan = Penjualan::all();

        // Calculate the total revenue
        $totalPendapatan = $penjualan->sum('harga');
    
        // Pass the total revenue to the view
        return view('penjualan.index', compact('penjualan', 'totalPendapatan'));
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required|string|max:255',
            'kategoriBarang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string|max:255',
            'tglPenjualan' => 'required|date',
            'harga' => 'required|integer',
        ]);

        $jumlah = $request->input('jumlah');
        $harga = $request->input('harga');
        $totalHarga = $jumlah * $harga; // Calculate totalHarga

        penjualan::create([
            'namaBarang' => $request->input('namaBarang'),
            'kategoriBarang' => $request->input('kategoriBarang'),
            'jumlah' => $request->input('jumlah'),
            'satuan' => $request->input('satuan'),
            'tglPenjualan' => $request->input('tglPenjualan'),
            'harga' => $request->input('harga'),
            'totalHarga' => $totalHarga,
            ]);

        return redirect()->route('penjualan.index')->with('success', 'Data Penjualan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->tglPenjualan = Carbon::parse($penjualan->tglPenjualan); // Ensure it's a Carbon instance
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaBarang' => 'required',
            'kategoriBarang' => 'required',
            'satuan' => 'required',
            'tglPenjualan' => 'required|date',
            'harga' => 'required|numeric',
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Data Penjualan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data Penjualan berhasil dihapus.');
    }
}
