@extends('layouts.admin')

@section('title', 'Edit Kerajinan')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Edit Kerajinan</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kerajinan_masuk.update', $kerajinan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama_kerajinan">Nama Kerajinan</label>
        <input type="text" id="nama_kerajinan" name="nama_kerajinan" class="form-control" value="{{ old('nama_kerajinan', $kerajinan->nama_kerajinan) }}" required>
    </div>
    <div class="form-group">
        <label for="pembuat">Nama Pembuat</label>
        <input type="text" id="pembuat" name="pembuat" class="form-control" value="{{ old('pembuat', $kerajinan->pembuat) }}" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" class="form-control">{{ old('deskripsi', $kerajinan->deskripsi) }}</textarea>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', $kerajinan->jumlah) }}" required>
    </div>
    <div class="form-group">
        <label for="harga_satuan">Harga Satuan</label>
        <input type="number" step="0.01" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan', $kerajinan->harga_satuan) }}" required>
    </div>
    {{-- <div class="form-group">
        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="{{ $kerajinan->tanggal_masuk }}" required>
    </div> --}}
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
