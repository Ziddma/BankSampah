<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahJual extends Model
{
    use HasFactory;

    protected $table = 'sampah_jual';

    protected $fillable = [
        'kode_penjualan',
        'kode_barang',
        'nama_pembeli',
        'kategori_id',
        'satuan_id',
        'produk_id',
        'jumlah',
        'harga',
        'harga_total',
        'tanggal',
    ];

    /**
     * Get the category associated with the sale.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }

    /**
     * Get the unit associated with the sale.
     */
    public function satuan()
    {
        return $this->belongsTo(SatuanSampah::class, 'satuan_id');
    }

    /**
     * Get the product associated with the sale.
     */
    public function produk()
    {
        return $this->belongsTo(ProdukSampah::class, 'produk_id');
    }
}
