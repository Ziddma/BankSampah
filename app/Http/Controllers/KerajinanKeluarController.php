<?php

namespace App\Http\Controllers;

use App\Models\KerajinanKeluar;
use App\Models\KategoriSampah;
use App\Models\SatuanSampah;
use App\Models\ProdukSampah;
use App\Models\SampahMasuk;
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
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        $produkSampah = ProdukSampah::all();

        return view('kerajinan_keluar.create', compact('kategoriSampah', 'satuanSampah', 'produkSampah'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'produk_id' => 'required|exists:produk_sampah,id',
            'nama_tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jumlah_out' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);
    
        $kerajinanKeluar = new KerajinanKeluar();
        $kerajinanKeluar->kategori_id = $validatedData['kategori_id'];
        $kerajinanKeluar->satuan_id = $validatedData['satuan_id'];
        $kerajinanKeluar->produk_id = $validatedData['produk_id'];
        $kerajinanKeluar->nama_tujuan = $validatedData['nama_tujuan'];
        $kerajinanKeluar->tanggal = $validatedData['tanggal'];
        $kerajinanKeluar->jumlah = $validatedData['jumlah_out'];
        $kerajinanKeluar->keterangan = $validatedData['keterangan'];
        $kerajinanKeluar->save();
    
        return response()->json(['success' => true]);
    }
    

    
    public function verifyKodeBarang(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string'
        ]);
    
        $barang = \App\Models\SampahMasuk::where('kode_barang', $request->kode_barang)->first();
    
        if ($barang) {
            return response()->json([
                'exists' => true,
                'data' => [
                    'nama' => $barang->nama,
                    'kategori' => $barang->kategori_id,
                    'satuan' => $barang->satuan_id,
                    'produk' => $barang->produk_id,
                    'stok' => $barang->jumlah,
                ]
            ]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
    
    

    public function show(KerajinanKeluar $kerajinanKeluar)
    {
        return view('kerajinan_keluar.show', compact('kerajinanKeluar'));
    }

    public function edit(KerajinanKeluar $kerajinanKeluar)
    {
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        return view('kerajinan_keluar.edit', compact('kerajinanKeluar', 'kategoriSampah', 'satuanSampah'));
    }

    public function update(Request $request, KerajinanKeluar $kerajinanKeluar)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'nama_tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $kerajinanKeluar->update($request->all());

        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil diupdate.');
    }

    public function destroy(KerajinanKeluar $kerajinanKeluar)
    {
        $kerajinanKeluar->delete();

        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil dihapus.');
    }
}
