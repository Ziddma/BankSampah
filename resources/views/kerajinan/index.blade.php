@extends('layouts.admin')

@section('title', 'Data Kerajinan')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Kerajinan</h1>

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
    <form method="GET" action="{{ route('kerajinan.index') }}" class="mb-3">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="kategori_kerajinan">Kategori Kerajinan</label>
                <input type="text" id="kategori_kerajinan" name="kategori_kerajinan" class="form-control" value="{{ request('kategori_kerajinan') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="pengrajin">Pengrajin</label>
                <input type="text" id="pengrajin" name="pengrajin" class="form-control" value="{{ request('pengrajin') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="sumber_kerajinan">Sumber Kerajinan</label>
                <input type="text" id="sumber_kerajinan" name="sumber_kerajinan" class="form-control" value="{{ request('sumber_kerajinan') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <a href="{{ route('kerajinan.create') }}" class="btn btn-success mb-3">Tambah Data Kerajinan</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kerajinan</th>
                        <th>Kategori</th>
                        <th>Bahan</th>
                        <th>Tanggal Dibuat</th>
                        <th>Pengrajin</th>
                        <th>Sumber Kerajinan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerajinan as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_kerajinan }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->bahan }}</td>
                            <td>{{ $item->tanggal_dibuat->format('d-m-Y') }}</td>
                            <td>{{ $item->pengrajin }}</td>
                            <td>{{ $item->sumber_kerajinan }}</td>
                            <td>
                                <a href="{{ route('kerajinan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
