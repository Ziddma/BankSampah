@extends('layouts.admin')

@section('title', 'Edit Data Sampah Masuk')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Edit Data Sampah Masuk</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form method="POST" action="{{ route('sampah-masuk.update', $sampahMasuk->id) }}">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $sampahMasuk->nama_siswa) }}" required>
                </div>
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoriSampah as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id', $sampahMasuk->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $sampahMasuk->jumlah) }}" required>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <select class="form-control" id="satuan" name="satuan" required>
                        <option value="">Pilih Satuan</option>
                        <option value="Kg" {{ old('satuan', $sampahMasuk->satuan) == 'Kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                        <option value="G" {{ old('satuan', $sampahMasuk->satuan) == 'G' ? 'selected' : '' }}>Gram (g)</option>
                        <option value="lb" {{ old('satuan', $sampahMasuk->satuan) == 'lb' ? 'selected' : '' }}>Pound (lb)</option>
                        <option value="M" {{ old('satuan', $sampahMasuk->satuan) == 'M' ? 'selected' : '' }}>Meter (m)</option>
                        <option value="Cm" {{ old('satuan', $sampahMasuk->satuan) == 'Cm' ? 'selected' : '' }}>Centimeter (cm)</option>
                        <option value="Pcs" {{ old('satuan', $sampahMasuk->satuan) == 'Pcs' ? 'selected' : '' }}>Piece (pcs)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $sampahMasuk->tanggal) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('sampah-masuk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>

@endsection
