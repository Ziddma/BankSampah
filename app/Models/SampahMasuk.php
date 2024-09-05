<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahMasuk extends Model
{
    use HasFactory;

    protected $table = 'sampah_masuk';
    
    protected $fillable = [
        'nama_siswa',
        'kategori_id',
        'jumlah',
        'satuan_id',
        'tanggal',
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
