<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArmadaPesawatTempur extends Model
{
    protected $table = 'armada_pesawat_tempurs';

    protected $fillable = [
        'kode_armada',
        'nama_pesawat',
        'tipe',
        'tahun_produksi',
        'negara_pembuat',
        'jumlah_unit',
        'status',
        'deskripsi'
    ];
}
