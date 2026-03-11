<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senjata extends Model
{
    protected $table = 'senjata';

    protected $fillable = [
        'nama_senjata',
        'jenis',
        'kaliber',
        'negara_asal',
        'tahun_produksi'
    ];
}
