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

    {{-- <form action="{{ route('sampah_jual.update', $sampahJual->id) }}" method="POST">
        @csrf
        @method('PUT') --}}


        <div class="container mt-5">
            <form id="verificationForm" method="POST" action="{{ route('sampah_jual.update', $sampahJual->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Kolom 1 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $sampahJual->kode_barang) }}" readonly>
                        </div>
                        <div id="additionalFields">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" class="form-control" id="kategori" name="kategori_id" value="{{ old('kategori_id', $sampahJual->kategori_id) }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" class="form-control" id="satuan" name="satuan_id" value="{{ old('satuan_id', $sampahJual->satuan_id) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="produk">Produk</label>
                                        <input type="text" class="form-control" id="produk" name="produk_id" value="{{ old('produk_id', $sampahJual->produk_id) }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jumlah">Jumlah</label>
                                        <!-- Tampilkan data dari sampahMasuk jika ada, atau nilai kosong jika tidak -->
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $sampahMasuk->jumlah ?? 0) }}" readonly>
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="harga">Harga Satuan</label>
                                        <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga', $sampahJual->harga) }}" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- Kolom 2 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pembeli">Nama Pembeli</label>
                            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="{{ old('nama_pembeli', $sampahJual->nama_pembeli) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Pembelian</label>
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal" value="{{ old('tanggal', $sampahJual->tanggal) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pengambilan">Jumlah Pengambilan</label>
                            <input type="number" class="form-control" id="jumlah_pengambilan" name="jumlah" value="{{ old('jumlah', $sampahJual->jumlah) }}" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $sampahJual->keterangan) }}" required></textarea>
                        </div> --}}
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>



        {{-- <div class="form-group">
            <label for="namaBarang">Nama Pembeli</label>
            <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="{{ old('namaBarang', $penjualan->namaBarang) }}" required>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategoriSampah as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $sampahMasuk->kategori_id) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="satuan_id">Satuan</label>
            <select class="form-control" id="satuan_id" name="satuan_id" required>
                <option value="">Pilih Satuan</option>
                @foreach($satuanSampah as $satuan)
                    <option value="{{ $satuan->id }}" {{ old('satuan_id', $sampahMasuk->satuan_id) == $satuan->id ? 'selected' : '' }}>
                        {{ $satuan->satuan }}
                    </option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="kategoriBarang">Kategori</label>
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
    </form> --}}

    {{-- <script>
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
