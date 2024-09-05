<?php

namespace App\Http\Controllers;

use App\Models\SampahMasuk;
use App\Models\KategoriSampah;
use App\Models\SatuanSampah;
use Illuminate\Http\Request;

class SampahMasukController extends Controller
{
    public function index()
    {
        $sampahMasuk = SampahMasuk::with('kategori')->get();
        return view('sampah_masuk.index', compact('sampahMasuk'));
    }

    public function create()
    {
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        return view('sampah_masuk.create', compact('kategoriSampah', 'satuanSampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa.*' => 'required|string|max:255',
            'kategori_id.*' => 'required|integer|exists:kategori_sampah,id',
            'jumlah.*' => 'required|numeric',
            'satuan_id.*' => 'required|string',
            'tanggal.*' => 'required|date',
        ]);
    
        foreach ($request->nama_siswa as $index => $nama_siswa) {
            SampahMasuk::create([
                'nama_siswa' => $nama_siswa,
                'kategori_id' => $request->kategori_id[$index],
                'jumlah' => $request->jumlah[$index],
                'satuan_id' => $request->satuan_id[$index],
                'tanggal' => $request->tanggal[$index],
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
        return view('sampah_masuk.edit', compact('sampahMasuk', 'kategoriSampah', 'satuanSampah'));
    }

    public function update(Request $request, SampahMasuk $sampahMasuk)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan_id' => 'required|string|max:255|exists:satuan_sampah,id',
            'tanggal' => 'required|date',
        ]);

        $sampahMasuk->update($request->all());

        return redirect()->route('sampah-masuk.index')
            ->with('success', 'Data sampah masuk berhasil diperbarui.');
    }

    public function destroy(SampahMasuk $sampahMasuk)
    {
        $sampahMasuk->delete();

        return redirect()->route('sampah-masuk.index')
            ->with('success', 'Data sampah masuk berhasil dihapus.');
    }
}
