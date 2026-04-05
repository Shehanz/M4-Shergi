<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArmadaPesawatTempurStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    return [
        'kode_armada' => 'required|string|unique:armada_pesawat_tempurs,kode_armada',
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
