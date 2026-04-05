<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArmadaPesawatTempurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
{
    return [
        'id' => $this->id,
        'kode_armada' => $this->kode_armada,
        'nama_pesawat' => $this->nama_pesawat,
        'tipe' => $this->tipe,
        'tahun_produksi' => $this->tahun_produksi,
        'negara_pembuat' => $this->negara_pembuat,
        'jumlah_unit' => $this->jumlah_unit,
        'status' => $this->status,
        'deskripsi' => $this->deskripsi,
        'created_at' => $this->created_at->toDateTimeString(),
        'updated_at' => $this->updated_at->toDateTimeString(),
    ];
}
}
