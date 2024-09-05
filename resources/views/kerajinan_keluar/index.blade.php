@extends('layouts.admin')

@section('title', 'Data Kerajinan Keluar')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Request Sampah</h1>

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

    <!-- Filter Form -->
    {{-- <form method="GET" action="{{ route('kerajinan_keluar.index') }}" class="mb-3">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="kategori_id">Kategori</label>
                <input type="text" id="kategori_id" name="kategori_id" class="form-control" value="{{ request('kategori_id') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="nama_tujuan">Nama Tujuan</label>
                <input type="text" id="nama_tujuan" name="nama_tujuan" class="form-control" value="{{ request('nama_tujuan') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form> --}}

    <a href="{{ route('kerajinan_keluar.create') }}" class="btn btn-success mb-3">Tambah Data Request Sampah</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerajinanKeluar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_tujuan }}</td>
                            <td>{{ $item->kategori->kategori ?? 'N/A' }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->satuan->satuan ?? 'N/A' }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="{{ route('kerajinan_keluar.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('kerajinan_keluar.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kerajinan keluar ini?');">
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
