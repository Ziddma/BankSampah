<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahJual extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     *
     * @var string
     */
    protected $table = 'sampah_jual';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'tujuan_jual',
        'kategori_id',
        'jumlah',
        'satuan_id',
        'harga',
        'tanggal',
    ];

    /**
     * Mendefinisikan relasi dengan model KategoriSampah.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }

    /**
     * Mendefinisikan relasi dengan model KerajinanMasuk.
     */
    public function kerajinan()
    {
        return $this->belongsTo(KerajinanMasuk::class, 'kerajinan_id');
    }

    /**
     * Mendefinisikan relasi dengan model SatuanSampah.
     */
    public function satuan()
    {
        return $this->belongsTo(SatuanSampah::class, 'satuan_id');
    }
}
