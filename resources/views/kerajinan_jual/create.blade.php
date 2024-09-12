@extends('layouts.admin')

@section('title', 'Tambah Data Penjualan')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Tambah Data Penjualan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div class="container mt-5">
        <form id="verificationForm" method="POST" action="{{ route('kerajinan_jual.store') }}">
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
                                    <label for="nama_kerajinan">Nama Kerajinan</label>
                                    <input type="text" class="form-control" id="nama_kerajinan" name="nama_kerajinan" value="{{ $nama_kerajinan->nama_kerajinan ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="pembuat">Pembuat</label>
                                    <input type="text" class="form-control" id="pembuat" name="pembuat" value="{{ $pembuat->pembuat ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control" id="stok" name="stok" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="harga">Harga Satuan</label>
                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($harga->harga) ? 'Rp ' . number_format($harga->harga, 0, '', '.') : '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Kolom 2 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pembeli">Nama Pembeli</label>
                        <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Pembelian</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pengambilan">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah_pengambilan" name="jumlah" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                    </div> --}}
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
            url: `${HOST_URL}/verify_kode_jual_kerajinan`,
            type: 'POST',
            data: { kode_barang: kodeBarang },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.exists) {
                    $('#verificationResult').html('<span class="text-success">Data ditemukan</span>');
                    $('#nama_kerajinan').val(response.data.nama_kerajinan);
                    $('#pembuat').val(response.data.pembuat);
                    $('#stok').val(response.data.stok);

                    // Format harga dengan Rp dan menghilangkan .00
                    var formattedHarga = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(response.data.harga);
                    $('#harga').val(formattedHarga);
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

    // Clean up harga field before form submission
    $('#verificationForm').on('submit', function() {
        var hargaField = $('#harga');
        var hargaValue = hargaField.val();

        // Remove 'Rp' and thousand separators
        var cleanHarga = hargaValue.replace(/[Rp.,\s]/g, '');

        // Set cleaned value back to the input field
        hargaField.val(cleanHarga);
    });
});

    </script>





    {{-- <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="{{ old('namaBarang') }}" required>
        </div>

        <div class="form-group">
            <label for="kategoriBarang">Kategori Barang</label>
            <input type="text" name="kategoriBarang" class="form-control" id="kategoriBarang" value="{{ old('kategoriBarang') }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah') }}" required>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" id="satuan" value="{{ old('satuan') }}" required>
        </div>

        <div class="form-group">
            <label for="tglPenjualan">Tanggal Penjualan</label>
            <input type="date" name="tglPenjualan" class="form-control" id="tglPenjualan" value="{{ old('tglPenjualan') }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga') }}" required>
        </div>

        <div class="form-group">
            <label for="totalHarga">Total Harga</label>
            <input type="number" name="totalHarga" class="form-control" id="totalHarga" value="{{ old('totalHarga') }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Batal</a>
    </form>

    <script>
        document.getElementById('jumlah').addEventListener('input', calculateTotal);
        document.getElementById('harga').addEventListener('input', calculateTotal);

        function calculateTotal() {
            var jumlah = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga').value;
            var total = jumlah * harga;
            document.getElementById('totalHarga').value = total ? total : 0;
        }
    </script> --}}

@endsection
