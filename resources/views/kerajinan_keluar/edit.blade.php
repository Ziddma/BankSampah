@extends('layouts.admin')

@section('title', 'Data Kerajinan Keluar')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Data Kerajinan Keluar</h1>

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

    <div class="container mt-5">
        <form id="verificationForm" method="POST" action="{{ route('kerajinan_keluar.update', $kerajinanKeluar->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Kolom 1 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $sampahMasuk->kode_barang ?? '') }}" readonly>
                    </div>
                    <div id="additionalFields" >
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="kategori_id">Kategori</label>
                                    <input type="text" class="form-control" id="kategori_id" name="kategori_id" value="{{ old('kategori_id', $kerajinanKeluar->kategori_id) }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="satuan_id">Satuan</label>
                                    <input type="text" class="form-control" id="satuan_id" name="satuan_id" value="{{ old('satuan_id', $kerajinanKeluar->satuan_id) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="produk_id">Produk</label>
                                    <input type="text" class="form-control" id="produk_id" name="produk_id" value="{{ old('produk_id', $kerajinanKeluar->produk_id) }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah_tersedia">Jumlah Tersedia</label>
                                    <input type="text" class="form-control" id="jumlah_tersedia" name="jumlah_tersedia" value="{{ old('jumlah_tersedia', $sampahMasuk->jumlah ?? 0) }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Kolom 2 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input_pemohon">Input Pemohon</label>
                        <input type="text" class="form-control" id="input_pemohon" name="nama_tujuan" value="{{ old('nama_tujuan', $kerajinanKeluar->nama_tujuan) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal" value="{{ old('tanggal', $kerajinanKeluar->tanggal) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pengambilan">Jumlah Pengambilan</label>
                        <input type="number" class="form-control" id="jumlah_pengambilan" name="jumlah" value="{{ old('jumlah', $kerajinanKeluar->jumlah) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $kerajinanKeluar->keterangan) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
