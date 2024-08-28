<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index(Request $request)
    {
        $query = Sampah::query();

        if ($request->has('jenis_sampah') && $request->jenis_sampah !== '') {
            $query->where('jenis_sampah', $request->jenis_sampah);
        }

        if ($request->has('kategori') && $request->kategori !== '') {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('nama_sampah', 'like', '%' . $request->kategori . '%');
            });
        }

        if ($request->has('sumber_sampah') && $request->sumber_sampah !== '') {
            $query->where('sumber_sampah', 'like', '%' . $request->sumber_sampah . '%');
        }

        $sampah = $query->with('kategori', 'penerima')->get();
        $totalBerat = $sampah->sum('berat');

        return view('sampah.index', [
            'sampah' => $sampah,
            'totalBerat' => $totalBerat,
        ]);
    }

    // Method untuk menampilkan form tambah data
    public function create()
    {
        $users = User::all();
        $kategori = Kategori::all(); // Ambil data kategori
        return view('sampah.create', compact('users', 'kategori'));
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_sampah' => 'required|string|max:255',
            'jenis_sampah' => 'required|in:organik,anorganik', // Validasi jenis sampah
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
            'berat' => 'required|numeric',
            'tanggal_diterima' => 'required|date',
            'diterima_oleh' => 'required|exists:users,id',
            'sumber_sampah' => 'required|string|max:255', // Mengubah validasi menjadi string
        ]);

        Sampah::create($request->all());
        return redirect()->route('sampah.index')->with('success', 'Data sampah berhasil ditambahkan.');
    }

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        $sampah = Sampah::findOrFail($id);
        $users = User::all();
        $kategori = Kategori::all(); // Ambil data kategori
        return view('sampah.edit', compact('sampah', 'users', 'kategori'));
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sampah' => 'required|string|max:255',
            'jenis_sampah' => 'required|in:organik,anorganik', // Validasi jenis sampah
            'kategori_id' => 'required|exists:kategori,id', // Validasi kategori_id
            'berat' => 'required|numeric',
            'tanggal_diterima' => 'required|date',
            'diterima_oleh' => 'required|exists:users,id',
            'sumber_sampah' => 'required|string|max:255', // Mengubah validasi menjadi string
        ]);

        $sampah = Sampah::findOrFail($id);
        $sampah->update($request->all());
        return redirect()->route('sampah.index')->with('success', 'Data sampah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sampah = Sampah::findOrFail($id);
        $sampah->delete();

        return redirect()->route('sampah.index')->with('success', 'Data sampah berhasil dihapus.');
    }
}
