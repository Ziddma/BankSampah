<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index()
    {
        // Retrieve all sales data
        $penjualan = Penjualan::all()->map(function ($item) {
            $item->tglPenjualan = Carbon::parse($item->tglPenjualan);
            return $item;
        });

        // Calculate the total revenue (yearly)
        $totalPendapatanTahun = $this->calculateTotalRevenue($penjualan);

        // Calculate the total revenue for the current month
        $totalPendapatanBulan = $this->calculateTotalRevenue(
            $penjualan->filter(function($item) {
                return $item->tglPenjualan->greaterThanOrEqualTo(Carbon::now()->startOfMonth());
            })
        );

        // Pass the total revenue to the view
        return view('penjualan.index', compact('penjualan', 'totalPendapatanBulan', 'totalPendapatanTahun'));
    }

    private function calculateTotalRevenue($penjualan)
    {
        return $penjualan->sum(function($item) {
            return $item->jumlah * $item->harga;
        });
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaBarang' => 'required|string|max:255',
            'kategoriBarang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:255',
            'tglPenjualan' => 'required|date',
            'harga' => 'required|numeric|min:0',
        ]);

        $totalHarga = $validatedData['jumlah'] * $validatedData['harga'];

        Penjualan::create(array_merge($validatedData, ['totalHarga' => $totalHarga]));

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
        $validatedData = $request->validate([
            'namaBarang' => 'required|string|max:255',
            'kategoriBarang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:255',
            'tglPenjualan' => 'required|date',
            'harga' => 'required|numeric|min:0',
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $totalHarga = $validatedData['jumlah'] * $validatedData['harga'];

        $penjualan->update(array_merge($validatedData, ['totalHarga' => $totalHarga]));

        return redirect()->route('penjualan.index')->with('success', 'Data Penjualan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data Penjualan berhasil dihapus.');
    }
}
