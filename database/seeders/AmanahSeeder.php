<?php

namespace Database\Seeders;

use App\Models\Amanah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amanahs = [
            [
                'nama' => 'Presiden',
                'slug' => 'presiden',
            ],
            [
                'nama' => 'Dewan Pembina',
                'slug' => 'dewan-pembina',
            ],
            [
                'nama' => 'Dewan Pakar',
                'slug' => 'dewan-pakar',
            ],
            [
                'nama' => 'Dewan Konsultatif',
                'slug' => 'dewan-konsultatif',
            ],
            [
                'nama' => 'Sekretaris Jenderal',
                'slug' => 'sekretaris-jenderal',
            ],
            [
                'nama' => 'Wakil Sekretaris Jenderal',
                'slug' => 'wakil-sekretaris-jenderal',
            ],
            [
                'nama' => 'Menteri',
                'slug' => 'menteri',
            ],
            [
                'nama' => 'Sekretaris Menteri',
                'slug' => 'sekretaris-menteri',
            ],
            [
                'nama' => 'Staff Ahli',
                'slug' => 'staff-ahli',
            ],
            [
                'nama' => 'Staff Muda',
                'slug' => 'staff-muda',
            ],
            [
                'nama' => 'Bendahara Umum',
                'slug' => 'bendahara-umum',
            ],
            [
                'nama' => 'Wakil Bendahara Umum',
                'slug' => 'wakil-bendahara-umum',
            ],            
        ];

        foreach ($amanahs as $amanah) {
            Amanah::create($amanah);
        }
    }
}
