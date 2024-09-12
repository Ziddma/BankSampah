<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerajinanJual extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kerajinan_jual';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_penjualan',
        'kode_barang',
        'nama_pembeli',
        'nama_kerajinan',
        'jumlah',
        'harga',
        'harga_total',
        'tanggal',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'harga' => 'decimal:2',
        'harga_total' => 'decimal:2',
        'tanggal' => 'date',
    ];

    /**
     * Get the kerajinan masuk associated with the kerajinan jual.
     */

}
