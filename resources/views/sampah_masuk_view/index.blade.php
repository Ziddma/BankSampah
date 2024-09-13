@extends('layouts.user')

@section('title', 'Data Sampah Masuk')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Sampah Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sampahMasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori->kategori ?? 'N/A' }}</td>
                            <td>{{ $item->satuan->satuan ?? 'N/A' }}</td>
                            <td>{{ $item->produk->produk ?? 'N/A' }}</td>
                            <td>{{ number_format($item->jumlah, 0) }}</td>
                            <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
