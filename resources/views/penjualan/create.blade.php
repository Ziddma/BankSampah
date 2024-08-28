@extends('layouts.admin')

@section('title', 'Tambah Data Penjualan')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Tambah Data Penjualan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="{{ old('namaBarang') }}" required>
        </div>

        <div class="form-group">
            <label for="kategoriBarang">Kategori Barang</label>
            <input type="text" name="kategoriBarang" class="form-control" id="kategoriBarang" value="{{ old('kategoriBarang') }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah') }}" required>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" id="satuan" value="{{ old('satuan') }}" required>
        </div>

        <div class="form-group">
            <label for="tglPenjualan">Tanggal Penjualan</label>
            <input type="date" name="tglPenjualan" class="form-control" id="tglPenjualan" value="{{ old('tglPenjualan') }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga') }}" required>
        </div>

        <div class="form-group">
            <label for="totalHarga">Total Harga</label>
            <input type="number" name="totalHarga" class="form-control" id="totalHarga" value="{{ old('totalHarga') }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Batal</a>
    </form>

@endsection
