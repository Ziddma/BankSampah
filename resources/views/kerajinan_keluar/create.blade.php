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

<form method="POST" action="{{ route('kerajinan_keluar.store') }}">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-body">
            <div id="dynamicForm">
                <div class="form-row align-items-center mb-3">
                    <div class="col-auto">
                        <label for="nama_tujuan">Nama</label>
                        <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" required>
                    </div>
                    <div class="col-auto">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoriSampah as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" step="0.01" class="form-control form-control-sm" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="col-auto">
                        <label for="satuan_id">Satuan</label>
                        <select class="form-control" id="satuan_id" name="satuan_id" required>
                            <option value="">Pilih Satuan</option>
                            @foreach($satuanSampah as $satuan)
                                <option value="{{ $satuan->id }}">{{ $satuan->satuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="col-auto">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                    </div>
                    <div class="col-auto mt-4">
                        <button type="button" class="btn btn-success" onclick="addRow()">Tambah</button>
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="{{ route('kerajinan_keluar.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

<script>
    function addRow() {
        const formRow = document.querySelector('.form-row').cloneNode(true);
        formRow.querySelectorAll('input, select').forEach(input => input.value = '');
        document.getElementById('dynamicForm').appendChild(formRow);
    }

    function removeRow(button) {
        const formRow = button.closest('.form-row');
        if (document.querySelectorAll('.form-row').length > 1) {
            formRow.remove();
        } else {
            alert('Tidak dapat menghapus semua baris!');
        }
    }
</script>

@endsection
