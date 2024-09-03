<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampahMasukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_siswa' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:255',
        ];
    }
}
