@extends('layouts.admin')

@section('title', 'Tambah Data Kerajinan Masuk')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Tambah Data Kerajinan Masuk</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form method="POST" action="{{ route('kerajinan_masuk.store') }}">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-body">
            <div id="dynamicForm">
                <div class="form-row align-items-center mb-3">
                    <div class="col-auto">
                        <label for="nama_kerajinan">Nama Kerajinan</label>
                        <input type="text" class="form-control" id="nama_kerajinan" name="nama_kerajinan[]" required>
                    </div>
                    <div class="col-auto">
                        <label for="pembuat">Nama Pembuat</label>
                        <input type="text" class="form-control" id="pembuat" name="pembuat[]" required>
                    </div>
                    <div class="col-auto">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi[]"></textarea>
                    </div>
                    <div class="col-auto">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" step="0.01" class="form-control form-control-sm" id="jumlah" name="jumlah[]" required>
                    </div>
                    <div class="col-auto">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="text" class="form-control" id="harga_satuan" name="harga_satuan[]" required>
                    </div>
                    {{-- <div class="col-auto">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                    </div> --}}
                    <div class="col-auto mt-4">
                        <button type="button" class="btn btn-success" onclick="addRow()">Tambah</button>
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="{{ route('kerajinan_masuk.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

<script>
    function addRow() {
        const formRow = document.querySelector('.form-row').cloneNode(true);
        formRow.querySelectorAll('input, textarea').forEach(input => input.value = '');
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
