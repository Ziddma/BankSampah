<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampahKeluarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ];
    }
}
