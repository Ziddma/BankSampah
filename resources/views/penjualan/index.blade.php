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

    <a href="{{ route('penjualan.create') }}" class="btn btn-success mb-3">Tambah Data Penjualan</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Penjualan</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Tanggal Penjualan</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan as $item)
                        <tr>
                            <td>{{ $item->idPenjualan }}</td>
                            <td>{{ $item->namaBarang }}</td>
                            <td>{{ $item->kategoriBarang }}</td>
                            <td>{{$item->jumlah</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->tglPenjualan)) }}</td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('penjualan.edit', $item->idPenjualan) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('penjualan.destroy', $item->idPenjualan) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right font-weight-bold">Total Pendapatan: </td>
                        <td colspan="2" class="font-weight-bold">Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
