<?php

namespace App\Http\Controllers;

use App\Models\KerajinanKeluar;
use App\Models\KategoriSampah;
use App\Models\SatuanSampah;
use App\Models\ProdukSampah;
use App\Models\KerajinanMasuk;
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
    
        // Assuming you want to pass the first item from each collection
        $kategori = $kategoriSampah->first();
        $satuan = $satuanSampah->first();
        $produk = $produkSampah->first();
    
        return view('kerajinan_keluar.create', compact('kategori', 'satuan', 'produk', 'kategoriSampah', 'satuanSampah', 'produkSampah'));
    }
    

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'kode_barang' => 'nullable|string|max:255',
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'produk_id' => 'required|exists:produk_sampah,id',
            'nama_tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);
    
        // Check if the sampahMasuk exists and has sufficient stock
        $sampahMasuk = SampahMasuk::where('kode_barang', $validatedData['kode_barang'])->first();
        
        if (!$sampahMasuk || $sampahMasuk->jumlah < $validatedData['jumlah']) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah permintaan melebihi stok yang tersedia.'])->withInput();
        }
    
        // Deduct the requested amount from the available stock in sampahMasuk
        $sampahMasuk->jumlah -= $validatedData['jumlah'];
        $sampahMasuk->save();
    
        // Remove kode_barang since it's not a column in the kerajinan_keluar table
        unset($validatedData['kode_barang']);
    
        // Create a new KerajinanKeluar instance and save it to the database
        $kerajinanKeluar = new KerajinanKeluar();
        $kerajinanKeluar->fill($validatedData);
        $kerajinanKeluar->save();
    
        // Redirect to the kerajinan_keluar index with a success message
        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil disimpan.');
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
                    // 'nama' => $barang->nama,
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
        
        // Fetch the corresponding SampahMasuk record
        $sampahMasuk = SampahMasuk::where('kode_barang', $kerajinanKeluar->kode_barang)->first();
    
        return view('kerajinan_keluar.edit', compact('kerajinanKeluar', 'kategoriSampah', 'satuanSampah', 'sampahMasuk'));
    }
    

    public function update(Request $request, KerajinanKeluar $kerajinanKeluar)
    {
        // dd($request->all());
        // Validasi data dari request
        $validatedData = $request->validate([
            'kode_barang' => 'nullable|string|max:255',
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'produk_id' => 'required|exists:produk_sampah,id',
            'nama_tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);
    
        // Dapatkan jumlah lama dan baru
        $jumlahLama = $kerajinanKeluar->jumlah;
        $jumlahBaru = $validatedData['jumlah'];
    
        // Hitung stok yang harus disesuaikan
        $stokAdjustment = $jumlahLama - $jumlahBaru;
    
        // Ambil stok dari tabel sampah_masuk berdasarkan kode_barang
        $sampahMasuk = SampahMasuk::where('kode_barang', $kerajinanKeluar->kode_barang)->first();
    
        // Jika stok tidak cukup, berikan pesan error
        if (!$sampahMasuk || ($stokAdjustment < 0 && $sampahMasuk->jumlah < abs($stokAdjustment))) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah permintaan melebihi stok yang tersedia.'])->withInput();
        }

        // Hitung harga total
        $jumlah = $validatedData['jumlah'];
        $hargaSatuan = $validatedData['harga'] ?? 0;
        $totalHarga = $jumlah * $hargaSatuan;

        // Update data SampahJual termasuk harga total
        $kerajinanKeluar->fill($validatedData);
        $kerajinanKeluar->harga_total = $totalHarga;
        $kerajinanKeluar->save();

        // Update stok di sampah_masuk
        $sampahMasuk->jumlah += $stokAdjustment;
        $sampahMasuk->save();
    
     
        // Redirect dengan pesan sukses
        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil diupdate.');
    }
    
    

    public function destroy(KerajinanKeluar $kerajinanKeluar)
    {
        // Ambil jumlah yang digunakan dari KerajinanKeluar
        $jumlah = $kerajinanKeluar->jumlah;
    
        // Ambil stok dari tabel sampah_masuk
        $sampahMasuk = SampahMasuk::where('kode_barang', $kerajinanKeluar->kode_barang)->first();
        
        if ($sampahMasuk) {
            // Tambahkan kembali jumlah yang dikeluarkan ke stok
            $sampahMasuk->jumlah += $jumlah;
            $sampahMasuk->save();
        }
    
        // Hapus data KerajinanKeluar
        $kerajinanKeluar->delete();
    
        return redirect()->route('kerajinan_keluar.index')
            ->with('success', 'Data kerajinan keluar berhasil dihapus.');
    }
    
}
