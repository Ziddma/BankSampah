<!-- resources/views/sampah/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Data Sampah')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Edit Data Sampah</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form method="POST" action="{{ route('sampah.update', $sampah->id) }}">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_sampah">Nama Sampah</label>
                    <input type="text" class="form-control" id="nama_sampah" name="nama_sampah" value="{{ old('nama_sampah', $sampah->nama_sampah) }}" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori', $sampah->kategori) }}" required>
                </div>
                <div class="form-group">
                    <label for="berat">Berat (kg)</label>
                    <input type="number" step="0.01" class="form-control" id="berat" name="berat" value="{{ old('berat', $sampah->berat) }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_diterima">Tanggal Diterima</label>
                    <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" value="{{ old('tanggal_diterima', $sampah->tanggal_diterima->format('Y-m-d')) }}" required>
                </div>
                <div class="form-group">
                    <label for="diterima_oleh">Diterima Oleh</label>
                    <select class="form-control" id="diterima_oleh" name="diterima_oleh" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ (old('diterima_oleh', $sampah->diterima_oleh) == $user->id) ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sumber_sampah">Sumber Sampah</label>
                    <select class="form-control" id="sumber_sampah" name="sumber_sampah" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ (old('sumber_sampah', $sampah->sumber_sampah) == $user->id) ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('sampah.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>

@endsection
