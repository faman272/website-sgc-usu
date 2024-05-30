<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisis = [
            [
                'nama' => 'BPH (Badan Pengurus Harian)',
                'slug' => 'bph',
                'deskripsi' => 'Badan yang bertanggung jawab atas kebijakan pengelolaan keuangan SGC USU dan mengkoordinir iuran pengurus SGC USU.'
            ],
            [
                'nama' => 'PSDM (Pengembangan Sumber Daya Manusia)',
                'slug' => 'psdm',
                'deskripsi' => 'Badan yang melaksanakan program pengkaderan mahasiswa muslim dan melaksanakan pembinaan anggota pengurus dan mahasiswa umum serta melakukan monitoring dan evaluasi pengurus SGC dalam menjalankan tugas.'
            ],
            [
                'nama' => 'Innovative HUB',
                'slug' => 'innovative-hub',
                'deskripsi' => 'Badan yang mengelola lini start-up SGC dalam bentuk edukasi, pengelolaan, dan pengembangan berbasis inovasi yang terintegrasi dengan sistem digital.'
            ],
            [
                'nama' => 'RISTEK (Riset dan Teknologi)',
                'slug' => 'ristek',
                'deskripsi' => 'Badan yang bertanggungjawab untuk menjaring, mempersiapkan, dan membentuk kelompok riset dengan bimbingan dan arahan yang jelas. Serta, menumbuhkan keinginan pengurus SGC USU agar berpartisipasi aktif dalam setiap kegiatan lomba akademik maupun kegiatan kebermanfaatan lainnya.'
            ],
            [
                'nama' => 'PENGMAS (Pengabdian Masyarakat)',
                'slug' => 'pengmas',
                'deskripsi' => 'Badan yang bertanggungjawab untuk melaksanakan program pengabdian yang bertujuan untuk mengoptimalkan potensi masyarakat suatu daerah dan mengelola mahasiswa untuk turut serta dalam kebermanfaatan.'
            ],
            [
                'nama' => 'Jnk (Jaringan dan Kemitraan)',
                'slug' => 'jnk',
                'deskripsi' => 'Badan yang bertugas sebagai pusat informasi SGC, bertugas untuk menyiapkan, menggiatkan, dan mengelola media publikasi organisasi SGC, baik cetak maupun elektronik. Selain itu, kementerian JnK juga bertanggung jawab dalam membangun citra positif SGC di tingkat eksternal dan internal lingkungan kampus USU, memelihara jaringan dengan pihak eksternal SGC, serta membangun peluang-peluang kerja sama.'
            ],
            [
                'nama' => 'USMAN (Usaha Mandiri)',
                'slug' => 'usman',
                'deskripsi' => 'Badan yang bertanggung jawab dalam melakukan berbagai kegiatan yang dapat meningkatkan finansial SGC secara keseluruhan. Kementerian Usman juga berperan aktif untuk menumbuhkan keinginan berwirausaha di kalangan anggota SGC.'
            ],
            [
                'nama' => 'PP (Pemberdayaan Perempuan)',
                'slug' => 'pp',
                'deskripsi' => 'Badan yang mengarahkan tata cara bersikap dan melakukan pembinaan untuk pengurus akhwat di SGC USU dan mahasiswi umum, serta melakukan monitoring dan evaluasi guna memperkuat rukhiyah islamiyah pada tiap akhwat.'
            ],

        ];

        foreach ($divisis as $divisi) {
            Divisi::create($divisi);
        }

    }
}
