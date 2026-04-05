<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArmadaPesawatTempurUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_armada' => 'required|string',  // UNIQUE DIHAPUS!
            'nama_pesawat' => 'required|string|max:255',
            'tipe' => 'required|string',
            'tahun_produksi' => 'required|integer|min:1900|max:' . date('Y'),
            'negara_pembuat' => 'required|string',
            'jumlah_unit' => 'required|integer|min:1',
            'status' => 'required|in:Aktif,Perbaikan,Cadangan',
            'deskripsi' => 'nullable|string',
        ];
    }
}
