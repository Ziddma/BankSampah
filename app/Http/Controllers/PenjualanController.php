<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

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
            'namaBarang' => 'required',
            'kategoriBarang' => 'required',
            'satuan' => 'required',
            'tglPenjualan' => 'required|date',
            'harga' => 'required|numeric',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Data Penjualan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
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
