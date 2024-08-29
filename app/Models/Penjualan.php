<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'namaBarang',
        'kategoriBarang',
        'jumlah',
        'satuan',
        'tglPenjualan',
        'harga',
        'totalHarga',
    ];

    protected $dates = ['tglPenjualan'];

}
