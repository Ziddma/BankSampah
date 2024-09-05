<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KerajinanKeluarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'jumlah' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuan_sampah,id',
            'nama_tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ];
    }
}
