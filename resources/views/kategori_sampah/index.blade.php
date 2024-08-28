@extends('layouts.admin')

@section('title', 'Daftar Kategori Sampah')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Daftar Kategori Sampah</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<a href="{{ route('kategori_sampah.create') }}" class="btn btn-success mb-3">Tambah Kategori Sampah</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis Sampah</th>
                    <th>Nama Sampah</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->jenis_sampah }}</td>
                    <td>{{ $kategori->nama_sampah }}</td>
                    <td>{{ $kategori->satuan }}</td>
                    <td>{{ $kategori->keterangan }}</td>
                    <td>
                        <a href="{{ route('kategori_sampah.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori_sampah.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
