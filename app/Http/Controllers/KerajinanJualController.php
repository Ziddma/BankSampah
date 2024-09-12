<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KerajinanJual;
use App\Models\KerajinanMasuk;
use App\Models\SampahMasuk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KerajinanJualController extends Controller
{
     /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        $kerajinanJual = KerajinanJual::all();
        return view('kerajinan_jual.index', compact('kerajinanJual'));
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     */
    public function create()
    {
        
        $kerajinanMasuk = KerajinanMasuk::all();

        return view('kerajinan_jual.create', compact('kerajinanMasuk'));
    }

    /**
     * Menyimpan resource baru ke dalam storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_pembeli' => 'required|string|max:255',
            'nama_kerajinan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'nullable|numeric|min:0',
            'tanggal' => 'required|date',
        ]);

        // Ambil stok dari tabel sampah_masuk
        $kerajinanMasuk = KerajinanMasuk::where('kode_barang', $validatedData['kode_barang'])->first();
        
        if (!$kerajinanMasuk || $kerajinanMasuk->jumlah < $validatedData['jumlah']) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah permintaan melebihi stok yang tersedia.'])->withInput();
        }

        // Generate kode_penjualan
        $validatedData['kode_penjualan'] = 'PJL-' . Str::upper(Str::random(8));

        // Hitung total harga
        $jumlah = $validatedData['jumlah'];
        $hargaSatuan = $validatedData['harga'] ?? 0;
        $totalHarga = $jumlah * $hargaSatuan;

        // Buat instance baru SampahJual dan simpan
        $kerajinanJual = new kerajinanJual();
        $kerajinanJual->fill($validatedData);
        $kerajinanJual->harga_total = $totalHarga;
        $kerajinanJual->save();

        // Kurangi stok di sampah_masuk
        $kerajinanMasuk->jumlah -= $jumlah;
        $kerajinanMasuk->save();

        return redirect()->route('kerajinan_jual.index')->with('success', 'Data berhasil ditambahkan.');
    }


    //ini kayanya ga fungsi deh
    public function verifyKodeKerajinanJual(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string'
        ]);
    
        $barang = \App\Models\KerajinanMasuk::where('kode_barang', $request->kode_barang)->first();
    
        if ($barang) {
            return response()->json([
                'exists' => true,
                'data' => [
                    // 'nama' => $barang->nama,
                    'nama_kerajinan' => $barang->nama_kerajinan,
                    'pembuat' => $barang->pembuat,
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
    public function show(KerajinanJual $kerajinanJual)
    {
        return view('kerajinan_jual.show', compact('kerajinanJual'));
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik.
     */
    public function edit(KerajinanJual $kerajinanJual)
    {
        $kerajinanMasuk = KerajinanMasuk::all();


        $kerajinanMasuk = KerajinanMasuk::where('kode_barang', $kerajinanJual->kode_barang)->first();
        return view('kerajinan_jual.edit', compact('kerajinanJual', 'kerajinanMasuk'));
    }

    /**
     * Memperbarui resource yang spesifik dalam storage.
     */
    public function update(Request $request, KerajinanJual $kerajinanJual)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_pembeli' => 'required|string|max:255',
            'nama_kerajinan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'nullable|numeric|min:0',
            'tanggal' => 'required|date',
        ]);

        // Dapatkan jumlah lama dan baru
        $jumlahLama = $kerajinanJual->jumlah;
        $jumlahBaru = $validatedData['jumlah'];
    
        // Hitung stok yang dibutuhkan untuk update
        $stokAdjustment = $jumlahLama - $jumlahBaru;

        // Ambil stok dari sampah_masuk
        $kerajinanMasuk = KerajinanMasuk::where('kode_barang', $kerajinanJual->kode_barang)->first();

        // Cek apakah stok mencukupi jika terjadi pengurangan stok
        if (!$kerajinanMasuk || ($stokAdjustment < 0 && $kerajinanMasuk->jumlah < abs($stokAdjustment))) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah permintaan melebihi stok yang tersedia.'])->withInput();
        }

        // Hitung harga total
        $jumlah = $validatedData['jumlah'];
        $hargaSatuan = $validatedData['harga'] ?? 0;
        $totalHarga = $jumlah * $hargaSatuan;
    
        // Update data SampahJual termasuk harga total
        $kerajinanJual->fill($validatedData);
        $kerajinanJual->harga_total = $totalHarga;
        $kerajinanJual->save();
    
        // Update stok di sampah_masuk
        $kerajinanMasuk->jumlah += $stokAdjustment;
        $kerajinanMasuk->save();

        return redirect()->route('kerajinan_jual.index')->with('success', 'Data berhasil diperbarui.');
    }
    
    public function getPembuat(Request $request)
    {
        $kodeBarang = $request->input('kode_barang');
    
        // Query untuk mendapatkan data pembuat berdasarkan kode barang
        $kerajinanMasuk = KerajinanMasuk::where('kode_barang', $kodeBarang)->first();
    
        if ($kerajinanMasuk) {
            return response()->json([
                'success' => true,
                'data' => [
                    'pembuat' => $kerajinanMasuk->pembuat,
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan.',
            ]);
        }
    }
    
    

    /**
     * Menghapus resource yang spesifik dari storage.
     */
    public function destroy(KerajinanJual $kerajinanJual)
    {
        // Ambil jumlah sebelum dihapus
        $jumlah = $kerajinanJual->jumlah;
    
        // Ambil stok dari sampah_masuk
        $kerajinanMasuk = KerajinanMasuk::where('kode_barang', $kerajinanJual->kode_barang)->first();
    
        if (!$kerajinanMasuk) {
            return redirect()->back()->withErrors(['jumlah' => 'Data tidak valid. Tidak ditemukan data stok.']);
        }
    
        // Kembalikan jumlah yang dijual ke stok
        $kerajinanMasuk->jumlah += $jumlah;
        $kerajinanMasuk->save();
    
        // Hapus data SampahJual
        $kerajinanJual->delete();
        return redirect()->route('kerajinan_jual.index')->with('success', 'Data berhasil dihapus.');
    }
}
