<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'sampah';

    protected $fillable = [
        'nama_sampah',
        'jenis_sampah', // Tambahkan atribut jenis_sampah
        'kategori_id', // Tambahkan atribut kategori_id
        'berat',
        'tanggal_diterima',
        'diterima_oleh',
        'sumber_sampah', // Ganti dengan string jika bukan ID user
    ];

    protected $casts = [
        'tanggal_diterima' => 'date', // Pastikan untuk meng-cast ke tipe date
    ];

    // Relasi ke model User untuk penerima
    // Sampah.php
    public function penerima()
    {
        return $this->belongsTo(User::class, 'diterima_oleh');
    }



    // Relasi ke model Kategori (pastikan model Kategori sudah ada)
    // app/Models/Sampah.php
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }



    // Jika sumber_sampah adalah string dan bukan ID user, hapus metode ini
    // Jika sumber_sampah adalah ID user, ganti menjadi relasi berikut:
    // public function sumber()
    // {
    //     return $this->belongsTo(User::class, 'sumber_sampah');
    // }
}
