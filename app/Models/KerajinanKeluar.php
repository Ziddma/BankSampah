<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerajinanKeluar extends Model
{
    use HasFactory;

    protected $table = 'kerajinan_keluar'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'kategori_id',
        'jumlah',
        'satuan_id',
        'produk_id',
        'nama_tujuan',
        'tanggal',
        'keterangan',
    ];

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
