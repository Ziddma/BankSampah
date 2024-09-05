<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanSampah extends Model
{
    use HasFactory;


    protected $table = 'satuan_sampah';
    
    protected $fillable = [
        'satuan',
        'keterangan',
    ];

    public function sampah_masuk()
    {
        return $this->hasMany(SampahMasuk::class);
    }
}
