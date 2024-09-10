@extends('layouts.admin')

@section('title', 'Edit Produk Sampah')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Edit Produk Sampah</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('produk_sampah.update', $produkSampah->id) }}">
    @csrf
    @method('PUT')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="produk">Produk</label>
                <input type="text" class="form-control" id="produk" name="produk" value="{{ old('produk', $produkSampah->produk) }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $produkSampah->keterangan) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Produk</button>
            <a href="{{ route('produk_sampah.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection
