<?php
// app/Models/KategoriSampah.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSampah extends Model
{
    use HasFactory;

    protected $table = 'kategori_sampah'; // Ensure this matches your table name

    protected $fillable = [
        'jenisSampah',
        'namaSampah',
        'satuan',
        'keterangan',
    ];
}
