@extends('layouts.admin')

@section('title', 'Data Sampah')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Sampah</h1>

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
    <form method="GET" action="{{ route('sampah.index') }}" class="mb-3">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="jenis_sampah">Jenis Sampah</label>
                <select id="jenis_sampah" name="jenis_sampah" class="form-control">
                    <option value="">Semua Jenis</option>
                    <option value="organik" {{ request('jenis_sampah') == 'organik' ? 'selected' : '' }}>Organik</option>
                    <option value="anorganik" {{ request('jenis_sampah') == 'anorganik' ? 'selected' : '' }}>Anorganik</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="form-control" value="{{ request('kategori') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="sumber_sampah">Sumber Sampah</label>
                <input type="text" id="sumber_sampah" name="sumber_sampah" class="form-control" value="{{ request('sumber_sampah') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <a href="{{ route('sampah.create') }}" class="btn btn-success mb-3">Tambah Data Sampah</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Sampah</th>
                        <th>Kategori</th>
                        <th>Berat (kg)</th>
                        <th>Tanggal Diterima</th>
                        <th>Diterima Oleh</th>
                        <th>Sumber Sampah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sampah as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_sampah }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->berat }}</td>
                            <td>{{ $item->tanggal_diterima->format('d-m-Y') }}</td>
                            <td>{{ $item->penerima->name }}</td>
                            <td>{{ $item->sumber_sampah }}</td> <!-- Update to use input from form -->
                            <td>
                                <a href="{{ route('sampah.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
