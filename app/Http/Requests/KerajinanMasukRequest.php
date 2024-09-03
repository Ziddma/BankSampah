<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KerajinanMasukRequest extends FormRequest
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
            'pembuat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ];
    }
}
