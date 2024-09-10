<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahMasuk extends Model
{
    use HasFactory;

    protected $table = 'sampah_masuk';

    protected $fillable = [
        'kode_barang',
        'nama',
        'kategori_id',
        'satuan_id',
        'produk_id',
        'jumlah',
        'harga_satuan',
        
    ];

    /**
     * Relasi ke tabel kategori_sampah.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }

    /**
     * Relasi ke tabel satuan_sampah.
     */
    public function satuan()
    {
        return $this->belongsTo(SatuanSampah::class, 'satuan_id');
    }

    /**
     * Relasi ke tabel produk_sampah.
     */
    public function produk()
    {
        return $this->belongsTo(ProdukSampah::class, 'produk_id');
    }
}
