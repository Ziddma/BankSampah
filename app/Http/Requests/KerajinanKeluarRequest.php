<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KerajinanKeluarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_kerajinan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'pembeli' => 'nullable|string|max:255',
            'tanggal_keluar' => 'required|date',
        ];
    }
}
