@extends('layouts.admin')

@section('title', 'Edit Data Penjualan')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Edit Data Penjualan</h1>

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
    <form action="{{ route('kerajinan_jual.update', $kerajinanJual->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Kolom 1 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $kerajinanJual->kode_barang) }}" readonly>
                </div>
                <div id="additionalFields">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nama_kerajinan">Nama Kerajinan</label>
                                <input type="text" class="form-control" id="nama_kerajinan" name="nama_kerajinan" value="{{ old('nama_kerajinan', $kerajinanJual->nama_kerajinan) }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="pembuat">Pembuat</label>
                                <input type="text" class="form-control" id="pembuat" name="pembuat" value="{{ old('pembuat', $kerajinanJual->pembuat) }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $kerajinanMasuk->jumlah ?? 0) }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="harga">Harga Satuan</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga', $kerajinanJual->harga) }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Kolom 2 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_pembeli">Nama Pembeli</label>
                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="{{ old('nama_pembeli', $kerajinanJual->nama_pembeli) }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Pembelian</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal" value="{{ old('tanggal', $kerajinanJual->tanggal) }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_pengambilan">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah_pengambilan" name="jumlah" value="{{ old('jumlah', $kerajinanJual->jumlah) }}" required>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Mengambil data pembuat saat halaman edit dimuat
        var kodeBarang = $('#kode_barang').val();
        getPembuat(kodeBarang);

        function getPembuat(kodeBarang) {
            $.ajax({
                url: "{{ route('get_pembuat') }}",  // Endpoint untuk mendapatkan data pembuat
                type: 'POST',
                data: {
                    kode_barang: kodeBarang,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Isi field pembuat dengan data dari server
                        $('#pembuat').val(response.data.pembuat);
                    } else {
                        $('#pembuat').val('');  // Kosongkan jika data tidak ditemukan
                        alert('Data pembuat tidak ditemukan');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengambil data pembuat');
                }
            });
        }
    });
</script>



        {{-- <div class="form-group">
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="{{ old('namaBarang', $penjualan->namaBarang) }}" required>
        </div>

        <div class="form-group">
            <label for="kategoriBarang">Kategori Barang</label>
            <input type="text" name="kategoriBarang" class="form-control" id="kategoriBarang" value="{{ old('kategoriBarang', $penjualan->kategoriBarang) }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', $penjualan->jumlah) }}" required>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" id="satuan" value="{{ old('satuan', $penjualan->satuan) }}" required>
        </div>

        <div class="form-group">
            <label for="tglPenjualan">Tanggal Penjualan</label>
            <input type="date" name="tglPenjualan" class="form-control" id="tglPenjualan" value="{{ old('tglPenjualan', $penjualan->tglPenjualan) }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga', $penjualan->harga) }}" required>
        </div>

        <div class="form-group">
            <label for="totalHarga">Total Harga</label>
            <input type="number" name="totalHarga" class="form-control" id="totalHarga" value="{{ old('totalHarga', $penjualan->totalHarga) }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Batal</a>
   

    <script>
        document.getElementById('jumlah').addEventListener('input', calculateTotal);
        document.getElementById('harga').addEventListener('input', calculateTotal);

        function calculateTotal() {
            var jumlah = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga').value;
            var total = jumlah * harga;
            document.getElementById('totalHarga').value = total ? total : 0;
        }

        // Calculate total initially
        calculateTotal();
    </script> --}}

@endsection
