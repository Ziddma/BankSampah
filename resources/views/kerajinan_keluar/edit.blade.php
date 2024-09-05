@extends('layouts.admin')

@section('title', 'Data Kerajinan Keluar')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Kerajinan Keluar</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('kerajinan_keluar.create') }}" class="btn btn-success mb-3">Tambah Data Kerajinan Keluar</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kerajinan_keluar.update', $kerajinanKeluar->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_tujuan">Nama Tujuan</label>
                    <input type="text" id="nama_tujuan" name="nama_tujuan" class="form-control" value="{{ old('nama_tujuan', $kerajinanKeluar->nama_tujuan) }}" required>
                </div>
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoriSampah as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id', $kerajinanKeluar->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', $kerajinanKeluar->jumlah) }}" required>
                </div>
                <div class="form-group">
                    <label for="satuan_id">Satuan</label>
                    <select class="form-control" id="satuan_id" name="satuan_id" required>
                        <option value="">Pilih Satuan</option>
                        @foreach($satuanSampah as $satuan)
                            <option value="{{ $satuan->id }}" {{ old('satuan_id', $kerajinanKeluar->satuan_id) == $satuan->id ? 'selected' : '' }}>
                                {{ $satuan->satuan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $kerajinanKeluar->tanggal }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" class="form-control" required>{{ old('keterangan', $kerajinanKeluar->keterangan) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
