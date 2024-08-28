<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'jenis_sampah',
        'nama_sampah',
        'satuan',
        'keterangan',
    ];
    // Kategori.php
    // app/Models/Kategori.php

    public function sampah()
    {
        return $this->hasMany(Sampah::class, 'kategori_id');
    }


}
