<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerajinanMasuk extends Model
{
    use HasFactory;

    protected $table = 'kerajinan_masuk';

    protected $fillable = [
        'kode_barang',
        'nama_kerajinan',
        'deskripsi',
        'jumlah',
        'pembuat',
        'tanggal_masuk',
    ];
}
