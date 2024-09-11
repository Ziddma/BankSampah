<?php

namespace App\Http\Controllers;

use App\Models\SampahJual;
use App\Models\KategoriSampah;
use App\Models\KerajinanMasuk;
use App\Models\SampahMasuk;
use App\Models\SatuanSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SampahJualController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        $sampahJual = SampahJual::all();
        return view('sampah_jual.index', compact('sampahJual'));
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     */
    public function create()
    {
        
        $kerajinan = KerajinanMasuk::all();
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();
        return view('sampah_jual.create', compact('kategoriSampah', 'satuanSampah', 'kerajinan'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_pembeli' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'produk_id' => 'required|exists:produk_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'nullable|numeric|min:0',
            'tanggal' => 'required|date',
        ]);
    
        // Ambil stok dari tabel sampah_masuk
        $sampahMasuk = SampahMasuk::where('kode_barang', $validatedData['kode_barang'])->first();
        
        if (!$sampahMasuk || $sampahMasuk->jumlah < $validatedData['jumlah']) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah permintaan melebihi stok yang tersedia.'])->withInput();
        }
    
        // Generate kode_penjualan
        $validatedData['kode_penjualan'] = 'PJL-' . Str::upper(Str::random(8));
    
        // Hitung total harga
        $jumlah = $validatedData['jumlah'];
        $hargaSatuan = $validatedData['harga'] ?? 0;
        $totalHarga = $jumlah * $hargaSatuan;
    
        // Buat instance baru SampahJual dan simpan
        $sampahJual = new SampahJual();
        $sampahJual->fill($validatedData);
        $sampahJual->harga_total = $totalHarga;
        $sampahJual->save();
    
        // Kurangi stok di sampah_masuk
        $sampahMasuk->jumlah -= $jumlah;
        $sampahMasuk->save();
    
        return redirect()->route('sampah_jual.index')->with('success', 'Data sampah jual berhasil disimpan.');
    }
    
    
    
    
    //ini kayanya ga fungsi deh
    public function verifyKodeSampahJual(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string'
        ]);
    
        $barang = \App\Models\SampahMasuk::where('kode_barang', $request->kode_barang)->first();
    
        if ($barang) {
            return response()->json([
                'exists' => true,
                'data' => [
                    // 'nama' => $barang->nama,
                    'kategori' => $barang->kategori_id,
                    'satuan' => $barang->satuan_id,
                    'produk' => $barang->produk_id,
                    'stok' => $barang->jumlah,
                    'harga' => $barang->harga_satuan,
                ]
            ]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show(SampahJual $sampahJual)
    {
        return view('sampah_jual.show', compact('sampahJual'));
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik.
     */
    public function edit(SampahJual $sampahJual)
    {
        $kerajinan = KerajinanMasuk::all();
        $kategoriSampah = KategoriSampah::all();
        $satuanSampah = SatuanSampah::all();

        $sampahMasuk = SampahMasuk::where('kode_barang', $sampahJual->kode_barang)->first();
        return view('sampah_jual.edit', compact('sampahJual', 'kategoriSampah', 'satuanSampah', 'kerajinan', 'sampahMasuk'));
    }

    /**
     * Memperbarui resource yang spesifik dalam storage.
     */
    public function update(Request $request, SampahJual $sampahJual)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_pembeli' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'produk_id' => 'required|exists:produk_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'nullable|numeric|min:0',
            'tanggal' => 'required|date',
        ]);
    
        // Dapatkan jumlah lama dan baru
        $jumlahLama = $sampahJual->jumlah;
        $jumlahBaru = $validatedData['jumlah'];
    
        // Hitung stok yang dibutuhkan untuk update
        $stokAdjustment = $jumlahLama - $jumlahBaru;
    
        // Ambil stok dari sampah_masuk
        $sampahMasuk = SampahMasuk::where('kode_barang', $sampahJual->kode_barang)->first();
        
        if (!$sampahMasuk || ($stokAdjustment < 0 && $sampahMasuk->jumlah < abs($stokAdjustment))) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah permintaan melebihi stok yang tersedia.'])->withInput();
        }
    
        // Update data SampahJual
        $sampahJual->update($validatedData);
    
        // Update stok di sampah_masuk
        $sampahMasuk->jumlah += $stokAdjustment;
        $sampahMasuk->save();
    
        return redirect()->route('sampah_jual.index')->with('success', 'Data berhasil diperbarui.');
    }
    
    

    /**
     * Menghapus resource yang spesifik dari storage.
     */
    public function destroy(SampahJual $sampahJual)
    {
        // Ambil jumlah sebelum dihapus
        $jumlah = $sampahJual->jumlah;
    
        // Ambil stok dari sampah_masuk
        $sampahMasuk = SampahMasuk::where('kode_barang', $sampahJual->kode_barang)->first();
    
        if (!$sampahMasuk) {
            return redirect()->back()->withErrors(['jumlah' => 'Data tidak valid. Tidak ditemukan data stok.']);
        }
    
        // Kembalikan jumlah yang dijual ke stok
        $sampahMasuk->jumlah += $jumlah;
        $sampahMasuk->save();
    
        // Hapus data SampahJual
        $sampahJual->delete();
    
        return redirect()->route('sampah_jual.index')->with('success', 'Data berhasil dihapus.');
    }
}    
