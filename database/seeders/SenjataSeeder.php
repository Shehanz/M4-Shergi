<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Senjata;

class SenjataSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_senjata' => 'AK-47',
                'jenis' => 'Assault Rifle',
                'kaliber' => '7.62×39mm',
                'negara_asal' => 'Rusia',
                'tahun_produksi' => 1947
            ],
            [
                'nama_senjata' => 'M16',
                'jenis' => 'Assault Rifle',
                'kaliber' => '5.56×45mm',
                'negara_asal' => 'Amerika Serikat',
                'tahun_produksi' => 1964
            ],
            [
                'nama_senjata' => 'Glock 17',
                'jenis' => 'Pistol',
                'kaliber' => '9mm',
                'negara_asal' => 'Austria',
                'tahun_produksi' => 1982
            ],
            [
                'nama_senjata' => 'Desert Eagle',
                'jenis' => 'Pistol',
                'kaliber' => '.50 AE',
                'negara_asal' => 'Israel',
                'tahun_produksi' => 1983
            ],
            [
                'nama_senjata' => 'MP5',
                'jenis' => 'Submachine Gun',
                'kaliber' => '9mm',
                'negara_asal' => 'Jerman',
                'tahun_produksi' => 1966
            ],
            [
                'nama_senjata' => 'FN SCAR',
                'jenis' => 'Assault Rifle',
                'kaliber' => '5.56×45mm',
                'negara_asal' => 'Belgia',
                'tahun_produksi' => 2004
            ],
            [
                'nama_senjata' => 'Barrett M82',
                'jenis' => 'Sniper Rifle',
                'kaliber' => '.50 BMG',
                'negara_asal' => 'Amerika Serikat',
                'tahun_produksi' => 1989
            ],
            [
                'nama_senjata' => 'Uzi',
                'jenis' => 'Submachine Gun',
                'kaliber' => '9mm',
                'negara_asal' => 'Israel',
                'tahun_produksi' => 1950
            ],
            [
                'nama_senjata' => 'Steyr AUG',
                'jenis' => 'Assault Rifle',
                'kaliber' => '5.56×45mm',
                'negara_asal' => 'Austria',
                'tahun_produksi' => 1977
            ],
            [
                'nama_senjata' => 'M1911',
                'jenis' => 'Pistol',
                'kaliber' => '.45 ACP',
                'negara_asal' => 'Amerika Serikat',
                'tahun_produksi' => 1911
            ],
        ];

        foreach ($data as $item) {
            Senjata::create($item);
        }
    }
}
