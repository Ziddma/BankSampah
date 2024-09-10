<?php

namespace App\Http\Controllers;

use App\Models\SampahMasuk;
use App\Models\KategoriSampah;
use App\Models\ProdukSampah;
use App\Models\SatuanSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SampahMasukController extends Controller
{
    public function index()
    {
        $sampahMasuk = SampahMasuk::with(['kategori', 'satuan', 'produk'])->get();
        return view('sampah_masuk.index', compact('sampahMasuk'));
    }

    public function create()
    {
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        $produkSampah = ProdukSampah::all();
        return view('sampah_masuk.create', compact('kategoriSampah', 'satuanSampah', 'produkSampah'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama.*' => 'required|string|max:255',
            'kategori_id.*' => 'required|integer|exists:kategori_sampah,id',
            'satuan_id.*' => 'required|integer|exists:satuan_sampah,id',
            'produk_id.*' => 'required|integer|exists:produk_sampah,id',
            'jumlah.*' => 'required|numeric|min:0',
            'harga_satuan.*' => 'required|numeric|min:0',
            
        ]);

        foreach ($request->nama as $index => $nama) {
            SampahMasuk::create([
                'kode_barang' => 'SPH-' . Str::upper(Str::random(8)),
                'nama' => $nama,
                'kategori_id' => $request->kategori_id[$index],
                'satuan_id' => $request->satuan_id[$index],
                'produk_id' => $request->produk_id[$index],
                'jumlah' => $request->jumlah[$index],
                'harga_satuan' => $request->harga_satuan[$index],
                
            ]);
        }

        return redirect()->route('sampah-masuk.index')
            ->with('success', 'Data sampah masuk berhasil ditambahkan.');
    }

    public function show(SampahMasuk $sampahMasuk)
    {
        return view('sampah_masuk.show', compact('sampahMasuk'));
    }

    public function edit(SampahMasuk $sampahMasuk)
    {
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        return view('sampah_masuk.edit', compact('sampahMasuk', 'kategoriSampah', 'satuanSampah', 'produkSampah'));
    }

    public function update(Request $request, SampahMasuk $sampahMasuk)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategori_sampah,id',
        'satuan_id' => 'required|exists:satuan_sampah,id',
        'produk_id' => 'required|exists:produk_sampah,id',
        'jumlah' => 'required|numeric|min:0',
        'harga_satuan' => 'required|numeric|min:0',
        
    ]);

    $sampahMasuk->update([
        'nama' => $request->nama,
        'kategori_id' => $request->kategori_id,
        'satuan_id' => $request->satuan_id,
        'produk_id' => $request->produk_id,
        'jumlah' => $request->jumlah,
        'harga_satuan' => $request->harga_satuan,
       
    ]);

    return redirect()->route('sampah-masuk.index')
        ->with('success', 'Data sampah masuk berhasil diperbarui.');
}

    public function destroy(SampahMasuk $sampahMasuk)
    {
        $sampahMasuk->delete();

        return redirect()->route('sampah_masuk.index')
            ->with('success', 'Data sampah masuk berhasil dihapus.');
    }
}
