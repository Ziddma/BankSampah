@extends('layouts.admin')

@section('title', 'Data Kerajinan Masuk')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Kerajinan Masuk</h1>

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

    <a href="{{ route('kerajinan_masuk.create') }}" class="btn btn-success mb-3">Tambah Data Kerajinan</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kerajinan</th>
                        <th>Nama Kerajinan</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Pembuat</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerajinanMasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_kerajinan }}</td>
                            <td>{{ $item->deskripsi ?? 'N/A' }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->pembuat }}</td>
                            <td>{{ $item->tanggal_masuk }}</td>
                            <td>
                                <a href="{{ route('kerajinan_masuk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('kerajinan_masuk.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kerajinan masuk ini?');">
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
