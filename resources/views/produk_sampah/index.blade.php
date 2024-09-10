@extends('layouts.admin')

@section('title', 'Daftar Produk Sampah')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Daftar Produk Sampah</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<a href="{{ route('produk_sampah.create') }}" class="btn btn-success mb-3">Tambah Produk Sampah</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produkSampah as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->produk }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('produk_sampah.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('produk_sampah.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk sampah ini?');">
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
