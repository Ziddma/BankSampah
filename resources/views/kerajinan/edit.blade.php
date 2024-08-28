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

    <form action="{{ route('kerajinan.update', $kerajinan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kerajinan">Nama Kerajinan</label>
            <input type="text" id="nama_kerajinan" name="nama_kerajinan" class="form-control" value="{{ old('nama_kerajinan', $kerajinan->nama_kerajinan) }}" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" value="{{ old('kategori', $kerajinan->kategori) }}" required>
        </div>
        <div class="form-group">
            <label for="bahan">Bahan</label>
            <input type="text" id="bahan" name="bahan" class="form-control" value="{{ old('bahan', $kerajinan->bahan) }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_dibuat">Tanggal Dibuat</label>
            <input type="date" id="tanggal_dibuat" name="tanggal_dibuat" class="form-control" value="{{ $kerajinan->tanggal_dibuat }}" required>
        </div>

        <div class="form-group">
            <label for="pengrajin">Pengrajin</label>
            <input type="text" id="pengrajin" name="pengrajin" class="form-control" value="{{ old('pengrajin', $kerajinan->pengrajin) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
