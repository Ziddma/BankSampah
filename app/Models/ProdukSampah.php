<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSampah extends Model
{
    use HasFactory;

    protected $table = 'produk_sampah';
    
    protected $fillable = [
        'produk',
        'keterangan',
    ];

    public function sampah_masuk()
    {
        return $this->hasMany(SampahMasuk::class);
    }
}
