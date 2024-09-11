@extends('layouts.admin')

@section('title', 'Tambah Data Kerajinan Keluar')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Tambah Data Kerajinan Keluar</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="container mt-5">
    <form id="verificationForm" method="POST" action="{{ route('kerajinan_keluar.store') }}">
        @csrf
        <div class="row">
            <!-- Kolom 1 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                    <button type="button" class="btn btn-primary mt-2" id="verifyButton">Cek Kode Barang</button>
                    <div id="verificationResult" class="mt-2"></div>
                </div>
                <div id="additionalFields" style="display: none;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori_id" value="{{ $kategori->kategori ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan_id" value="{{ $satuan->satuan ?? '' }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="produk">Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk_id" value="{{ $produk->produk ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Kolom 2 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input_pemohon">Input Pemohon</label>
                    <input type="text" class="form-control" id="input_pemohon" name="nama_tujuan" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_pengambilan">Jumlah Pengambilan</label>
                    <input type="number" class="form-control" id="jumlah_pengambilan" name="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

<script>
    const HOST_URL = "{{ url('/') }}"; // Menggunakan helper Laravel untuk mendapatkan URL dasar
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#verifyButton').on('click', function() {
            var kodeBarang = $('#kode_barang').val();
            $.ajax({
                url: `${HOST_URL}/verify_kode_barang`, // Replace with your actual endpoint
                type: 'POST',
                data: { kode_barang: kodeBarang },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    if (response.exists) {
                        $('#verificationResult').html('<span class="text-success">Data ditemukan</span>');
                        $('#kategori').val(response.data.kategori);
                        $('#satuan').val(response.data.satuan);
                        $('#produk').val(response.data.produk);
                        $('#stok').val(response.data.stok);
                        $('#additionalFields').show();
                    } else {
                        $('#verificationResult').html('<span class="text-danger">Data tidak ditemukan</span>');
                        $('#additionalFields').hide();
                    }
                },
                error: function() {
                    $('#verificationResult').html('<span class="text-danger">Terjadi kesalahan saat memverifikasi</span>');
                    $('#additionalFields').hide();
                }
            });
        });
    });
</script>


@endsection

{{-- <form method="POST" action="{{ route('kerajinan_keluar.store') }}">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <!-- Column 1: Search Data -->
                <div class="col-md-6">
                    <h5>Search Data Sampah Masuk</h5>
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" readonly>
                    </div>
                
                    <!-- Row for two columns -->
                    <div class="row">
                        <!-- Column 1: Kategori and Satuan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" readonly>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan" readonly>
                            </div>
                        </div>
                
                        <!-- Column 2: Produk and Stok -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produk">Produk</label>
                                <input type="text" class="form-control" id="produk" name="produk" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_masuk">Stok</label>
                                <input type="number" class="form-control" id="jumlah_masuk" name="jumlah_masuk" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary" onclick="checkData()">Cek</button>
                    <div id="checkResult"></div>
                </div>
                

                <!-- Column 2: Input Additional Information -->
                <div class="col-md-6">
                    <h5>Tambah Data Kerajinan Keluar</h5>
                    <div class="form-group">
                        <label for="nama_tujuan">Nama Tujuan</label>
                        <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Pengambilan</label>
                        <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Tambah Data</button>
                    <a href="{{ route('kerajinan_keluar.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form> --}}


{{-- <script>
    function checkData() {
        const kodeBarang = document.getElementById('kode_barang').value;

        // AJAX request to check data
        fetch(`{{ url('/api/check-sampah-masuk') }}/${kodeBarang}`)
            .then(response => response.json())
            .then(data => {
                if (data.found) {
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('kategori').value = data.kategori;
                    document.getElementById('produk').value = data.produk;
                    document.getElementById('satuan').value = data.satuan;
                    document.getElementById('jumlah_masuk').value = data.jumlah;
                    document.getElementById('checkResult').innerText = 'Sampah ditemukan';
                    document.getElementById('submitBtn').disabled = false;
                } else {
                    document.getElementById('checkResult').innerText = 'Sampah tidak ditemukan';
                    document.getElementById('submitBtn').disabled = true;
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script> --}}


