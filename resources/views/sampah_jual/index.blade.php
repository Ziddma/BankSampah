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

    <a href="{{ route('sampah_jual.create') }}" class="btn btn-success mb-3">Tambah Data Penjualan</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Penjualan</th>
                        <th>ID Sampah</th>
                        <th>Nama Pembeli</th>
                        <th>Kategori</th>
                        <th>Produk</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        {{-- <th>Tanggal Penjualan</th> --}}
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sampahJual as $item)
                        <tr>
                            <td>{{ $item->kode_penjualan }}</td> <!-- Changed from idPenjualan to id -->
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_pembeli }}</td>
                            <td>{{ $item->kategori->kategori }}</td>
                            <td>{{ $item->produk->produk }}</td>
                            <td>{{ $item->satuan->satuan }}</td>
                            <td>{{ $item->jumlah }}</td>
                            {{-- <td>{{ $item->tglPenjualan->format('d-m-Y') }}</td> <!-- Using Carbon for date formatting -->
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td> --}}
                            <td>Rp {{ number_format($item->harga_total, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('sampah_jual.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('sampah_jual.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kerajinan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td colspan="5" class="text-right font-weight-bold">Total Pendapatan Bulan Ini: </td>
                        <td colspan="3" class="font-weight-bold">Rp. {{ number_format($totalPendapatanBulan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right font-weight-bold">Total Pendapatan Tahun Ini: </td>
                        <td colspan="3" class="font-weight-bold">Rp. {{ number_format($totalPendapatanTahun, 0, ',', '.') }}</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>

@endsection
