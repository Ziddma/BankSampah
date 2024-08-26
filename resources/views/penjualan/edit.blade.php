@extends('layouts.admin')

@section('title', 'Edit Data Penjualan')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Edit Data Penjualan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjualan.update', $penjualan->idPenjualan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="{{ old('namaBarang', $penjualan->namaBarang) }}" required>
        </div>

        <div class="form-group">
            <label for="kategoriBarang">Kategori Barang</label>
            <input type="text" name="kategoriBarang" class="form-control" id="kategoriBarang" value="{{ old('kategoriBarang', $penjualan->kategoriBarang) }}" required>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" id="satuan" value="{{ old('satuan', $penjualan->satuan) }}" required>
        </div>

        <div class="form-group">
            <label for="tglPenjualan">Tanggal Penjualan</label>
            <input type="date" name="tglPenjualan" class="form-control" id="tglPenjualan" value="{{ old('tglPenjualan', $penjualan->tglPenjualan->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga', $penjualan->harga) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Batal</a>
    </form>

@endsection
