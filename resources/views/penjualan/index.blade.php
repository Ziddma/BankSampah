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
                            <td>{{ $item->id }}</td> <!-- Changed from idPenjualan to id -->
                            <td>{{ $item->namaBarang }}</td>
                            <td>{{ $item->kategoriBarang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->tglPenjualan->format('d-m-Y') }}</td> <!-- Using Carbon for date formatting -->
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ number_format($item->totalHarga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('penjualan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kerajinan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right font-weight-bold">Total Pendapatan Bulan Ini: </td>
                        <td colspan="3" class="font-weight-bold">Rp. {{ number_format($totalPendapatanBulan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right font-weight-bold">Total Pendapatan Tahun Ini: </td>
                        <td colspan="3" class="font-weight-bold">Rp. {{ number_format($totalPendapatanTahun, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
