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
        'nama_tujuan',
        'tanggal',
        'keterangan',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class);
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanSampah::class);
    }
}
