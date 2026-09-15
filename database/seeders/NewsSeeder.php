<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Perkuat Mutu Perpustakaan, Pustakawan USU Jadi Narasumber Sosialisasi Akreditasi',
                'slug' => 'pustakawan-usu-narasumber-akreditasi',
                'excerpt' => 'Pustakawan Perpustakaan USU menjadi narasumber dalam forum peningkatan standar mutu akreditasi perpustakaan perguruan tinggi.',
                'category' => 'Berita',
                'external_url' => 'https://library.usu.ac.id/id/berita',
                'published_at' => '2026-09-03',
            ],
            [
                'title' => 'Perpustakaan USU Gelar Pelatihan Dasar Canva Batch II Program Liburan',
                'slug' => 'pelatihan-canva-batch-2',
                'excerpt' => 'Menutup rangkaian kelas literasi informasi liburan, mahasiswa USU dibekali kompetensi desain visual dan publikasi digital.',
                'category' => 'Literasi Informasi',
                'external_url' => 'https://library.usu.ac.id/id/berita',
                'published_at' => '2026-08-10',
            ],
            [
                'title' => 'Kepala Perpustakaan Hadiri KPDI ke-17: Transformasi Perpustakaan di Era AI',
                'slug' => 'kpdi-17-transformasi-ai',
                'excerpt' => 'Penguatan integrasi teknologi kecerdasan buatan (AI) menuju Smart Academic Library berstandar internasional di lingkungan USU.',
                'category' => 'Transformasi Digital',
                'external_url' => 'https://library.usu.ac.id/id/berita',
                'published_at' => '2026-08-10',
            ],
        ];

        foreach ($articles as $article) {
            News::create($article);
        }
    }
}
