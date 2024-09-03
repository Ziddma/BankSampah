<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahKeluar extends Model
{
    use HasFactory;

    protected $table = 'sampah_keluar';
    
    protected $fillable = [
        'kategori_id',
        'jumlah',
        'satuan',
        'tujuan',
        'tanggal_keluar',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_keluar' => 'date',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }
}
