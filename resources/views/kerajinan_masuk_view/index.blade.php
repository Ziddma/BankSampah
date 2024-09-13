@extends('layouts.user')

@section('title', 'Data Kerajinan Masuk')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Kerajinan Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Kerajinan</th>
                        <th>Nama Pembuat</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerajinanMasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_kerajinan }}</td>
                            <td>{{ $item->pembuat }}</td>
                            <td>{{ $item->deskripsi ?? 'N/A' }}</td>
                            <td>{{ number_format($item->jumlah, 0) }}</td>
                            <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                            {{-- <td>{{ $item->tanggal_masuk }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
