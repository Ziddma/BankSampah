<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class sampah extends Model
{
    use HasFactory;

    protected $table = 'sampah';

    protected $fillable = [
        'nama_sampah',
        'kategori',
        'berat',
        'tanggal_diterima',
        'diterima_oleh',
        'sumber_sampah',
    ];

    protected $casts = [
        'tanggal_diterima' => 'datetime', // Cast the date field to a Carbon instance
    ];

    public function penerima()
    {
        return $this->belongsTo(User::class, 'diterima_oleh');
    }

    public function sumber()
    {
        return $this->belongsTo(User::class, 'sumber_sampah');
    }
}
