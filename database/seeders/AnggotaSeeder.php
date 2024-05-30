<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anggotas = [
            [
                "nim" => "221101025",
                "nama" => "Inayah Ananda Devira",
                "fakultas" => "FKep",
                "prodi" => "Keperawatan",
                "jk" =>"P",
                "divisi_id" => 8,
                "amanah_id" => 7,
            ],
            [
                "nim" => "221000027",
                "nama" => "Dinda Ayu Fania",
                "fakultas" => "FKM",
                "prodi" => "Kesehatan Masyarakat",
                "jk" =>"P",
                "divisi_id" => 8,
                "amanah_id" => 8,
            ],
            [
                "nim" => "210905015",
                "nama" => "Dewi Anggita",
                "fakultas" => "FISIP",
                "prodi" => "Antropologi Sosial",
                "jk" =>"P",
                "divisi_id" => 8,
                "amanah_id" => 9,
            ],
            [
                "nim" => "221301064",
                "nama" => "Fadia Dwi Cahya",
                "jk" =>"P",
                "fakultas" => "FPsi",
                "prodi" => "Psikologi",
                "divisi_id" => 8,
                "amanah_id" => 9,
            ],
            [
                "nim" => "210301254",
                "nama" => "Nabilatul Husna",
                "jk" =>"P",
                "fakultas" => "FP",
                "prodi" => "Agroteknologi",
                "divisi_id" => 8,
                "amanah_id" => 9,
            ],
            [
                "nim" => "221000013",
                "nama" => "Nurlaili Rahma",
                "jk" =>"P",
                "fakultas" => "FKM",
                "prodi" => "Kesehatan Masyarakat",
                "divisi_id" => 8,
                "amanah_id" => 9,
            ],
            [
                "nim" => "221301033",
                "nama" => "Nurul Hikmah",
                "jk" =>"P",
                "fakultas" => "FPsi",
                "prodi" => "Psikologi",
                "divisi_id" => 8,
                "amanah_id" => 9,
            ],
            [
                "nim" => "230701011",
                "jk" =>"P",
                "nama" => "Widya Kartika",
                "fakultas" => "FIB",
                "prodi" => "Sastra Indonesia",
                "divisi_id" => 8,
                "amanah_id" => 10,
            ],
            [
                "nim" => "231101170",
                "jk" =>"P",
                "nama" => "Suci Indah Sari",
                "fakultas" => "FKep",
                "prodi" => "Keperawatan",
                "divisi_id" => 8,
                "amanah_id" => 10,
            ],
            [
                "nim" => "220705005",
                "jk" =>"P",
                "nama" => "Neviya Silpandi",
                "fakultas" => "FIB",
                "prodi" => "Sastra Inggris",
                "divisi_id" => 8,
                "amanah_id" => 10,
            ],
            [
                "nim" => "220701032",
                "jk" =>"P",
                "nama" => "Anisah Dwi Meilani",
                "fakultas" => "FIB",
                "prodi" => "Sastra Indonesia",
                "divisi_id" => 8,
                "amanah_id" => 10,
            ],
            [
                "nim" => "230704030",
                "jk" =>"P",
                "nama" => "Nadia Fadila",
                "fakultas" => "FIB",
                "prodi" => "Sastra Arab",
                "divisi_id" => 8,
                "amanah_id" => 10,
            ],
        ];
        


        foreach ($anggotas as $anggota) {
            Anggota::create($anggota);
        }
    }
}
