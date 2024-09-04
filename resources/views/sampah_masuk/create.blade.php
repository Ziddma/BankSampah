@extends('layouts.admin')

@section('title', 'Tambah Data Sampah Masuk')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Tambah Data Sampah Masuk</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form method="POST" action="{{ route('sampah-masuk.store') }}">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-body">
            <div id="dynamicForm">
                <div class="form-row align-items-center mb-3">
                    <div class="col-auto">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa[]" required>
                    </div>
                    <div class="col-auto">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id[]" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoriSampah as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" step="0.01" class="form-control" id="jumlah" name="jumlah[]" required>
                    </div>
                    <div class="col-auto">
                        <label for="satuan">Satuan</label>
                        <select class="form-control" id="satuan" name="satuan[]" required>
                            <option value="">Pilih Satuan</option>
                            <option value="Kg">Kilogram (kg)</option>
                            <option value="G">Gram (g)</option>
                            <option value="lb">Pound (lb)</option>
                            <option value="M">Meter (m)</option>
                            <option value="Cm">Centimeter (cm)</option>
                            <option value="Pcs">Piece (pcs)</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal[]" required>
                    </div>
                    <div class="col-auto mt-4">
                        <button type="button" class="btn btn-success" onclick="addRow()">Tambah</button>
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="{{ route('sampah-masuk.index') }}" class="btn btn-secondary">Kembali</a>
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
