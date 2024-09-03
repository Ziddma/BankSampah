<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSampah extends Model
{
    use HasFactory;

    protected $table = 'kategori_sampah';
    
    protected $fillable = [
        'kategori',
        'satuan',
        'keterangan',
    ];

    public function sampah_masuk()
    {
        return $this->hasMany(SampahMasuk::class);
    }
}
