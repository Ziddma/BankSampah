@extends('layouts.admin')

@section('title', 'Edit Satuan Sampah')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Edit Satuan Sampah</h1>

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

<form method="POST" action="{{ route('satuan_sampah.update', $satuanSampah->id) }}">
    @csrf
    @method('PUT')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan', $satuanSampah->satuan) }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $satuanSampah->keterangan) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Satuan</button>
            <a href="{{ route('satuan_sampah.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

@endsection