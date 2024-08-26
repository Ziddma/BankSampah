<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama', // Assuming you have a 'nama' field for the category name
    ];

    // Define any relationships here if necessary
}
