@extends('layouts.admin')

@section('title', 'Data Penjualan')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Penjualan</h1>

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

    <a href="{{ route('kerajinan_jual.create') }}" class="btn btn-success mb-3">Tambah Data Penjualan</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Penjualan</th>
                        <th>ID Kerajinan</th>
                        <th>Nama Kerajinan</th>
                        <th>Nama Pembeli</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerajinanJual as $item)
                        <tr>
                            <td>{{ $item->kode_penjualan }}</td> <!-- Changed from idPenjualan to id -->
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_kerajinan}}</td>
                            <td>{{ $item->nama_pembeli }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>Rp {{ number_format($item->harga_total, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('kerajinan_jual.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('kerajinan_jual.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kerajinan ini?');">
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
