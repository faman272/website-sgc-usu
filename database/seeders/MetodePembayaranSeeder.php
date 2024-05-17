<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodes = [
            [
                "kode" => "SGC-DANA",
                "nama_metode" => "DANA",
                "norek" => "085267644976",
                "atas_nama" => "Nurhidayah arivin",
                "gambar" => "dana.png",

            ],
            [
                "kode" => "SGC-BRI",
                "nama_metode" => "BRI",
                "norek" => "028301060959506",
                "atas_nama" => "Nurhidayah arivin",
                "gambar" => "bri.png",
            ]
        ];
        foreach ($metodes as $metode) {
            PaymentMethod::create($metode);
        }
    }

}
