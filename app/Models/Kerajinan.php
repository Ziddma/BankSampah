<?php

// File: app/Models/Kerajinan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerajinan extends Model
{
    protected $fillable = [
        'nama_kerajinan',
        'kategori',
        'bahan',
        'tanggal_dibuat',
        'pengrajin',
        'sumber_kerajinan',
    ];

    protected $dates = [
        'tanggal_dibuat',
    ];
}

