<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerajinanKeluar extends Model
{
    use HasFactory;

    protected $table = 'kerajinan_keluar';
    
    protected $fillable = [
        'nama_kerajinan',
        'deskripsi',
        'jumlah',
        'harga',
        'pembeli',
        'tanggal_keluar',
    ];

    protected $casts = [
        'tanggal_keluar' => 'date',
    ];
}
