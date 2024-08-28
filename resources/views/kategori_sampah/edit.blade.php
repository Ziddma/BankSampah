@extends('layouts.admin')

@section('title', 'Edit Kategori Sampah')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Edit Kategori Sampah</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form method="POST" action="{{ route('kategori_sampah.update', $kategori->id) }}">
    @csrf
    @method('PUT')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="jenis_sampah">Jenis Sampah</label>
                <select class="form-control" id="jenis_sampah" name="jenis_sampah" required>
                    <option value="organik" {{ $kategori->jenis_sampah == 'organik' ? 'selected' : '' }}>Organik</option>
                    <option value="anorganik" {{ $kategori->jenis_sampah == 'anorganik' ? 'selected' : '' }}>Anorganik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_sampah">Nama Sampah</label>
                <input type="text" class="form-control" id="nama_sampah" name="nama_sampah" value="{{ $kategori->nama_sampah }}" required>
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $kategori->satuan }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ $kategori->keterangan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Kategori</button>
            <a href="{{ route('kategori_sampah.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection
