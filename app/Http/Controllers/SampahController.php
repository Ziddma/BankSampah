<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index()
    {
        $sampah = Sampah::with(['penerima', 'sumber'])->get();
        return view('sampah.index', compact('sampah'));
    }

    // Method untuk menampilkan form tambah data
    public function create()
    {
        $users = User::all();
        return view('sampah.create', compact('users'));
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_sampah' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'berat' => 'required|numeric',
            'tanggal_diterima' => 'required|date',
            'diterima_oleh' => 'required|exists:users,id',
            'sumber_sampah' => 'required|exists:users,id',
        ]);

        Sampah::create($request->all());
        return redirect()->route('sampah.index')->with('success', 'Data sampah berhasil ditambahkan.');
    }

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        $sampah = Sampah::findOrFail($id);
        $users = User::all();
        return view('sampah.edit', compact('sampah', 'users'));
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sampah' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'berat' => 'required|numeric',
            'tanggal_diterima' => 'required|date',
            'diterima_oleh' => 'required|exists:users,id',
            'sumber_sampah' => 'required|exists:users,id',
        ]);

        $sampah = Sampah::findOrFail($id);
        $sampah->update($request->all());
        return redirect()->route('sampah.index')->with('success', 'Data sampah berhasil diperbarui.');
    }
}