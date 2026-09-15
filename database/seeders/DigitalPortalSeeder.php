<?php

namespace Database\Seeders;

use App\Models\DigitalPortal;
use Illuminate\Database\Seeder;

class DigitalPortalSeeder extends Seeder
{
    public function run(): void
    {
        $portals = [
            ['name' => 'Katalog Online (DIGILIB OPAC)', 'description' => 'Layanan katalog terpadu untuk mencari dan menelusuri ketersediaan koleksi buku tercetak di Perpustakaan Universitas dan cabang fakultas.', 'url' => 'https://digilib.usu.ac.id', 'icon' => 'search_check', 'badge_text' => 'Katalog Online', 'display_url' => 'digilib.usu.ac.id', 'sort_order' => 1],
            ['name' => 'Repositori Institusi USU', 'description' => 'Penyimpanan dan akses karya ilmiah sivitas akademika, skripsi, tesis, disertasi, dan laporan penelitian dosen Universitas Sumatera Utara.', 'url' => 'https://repositori.usu.ac.id', 'icon' => 'school', 'badge_text' => 'Open Access', 'display_url' => 'repositori.usu.ac.id', 'sort_order' => 2],
            ['name' => 'Jurnal Elektronik (E-Journal)', 'description' => 'Akses pangkalan data jurnal ilmiah terlanggan (ScienceDirect, Scopus, SpringerLink, IEEE, Emerald, ProQuest, EBSCO) bagi sivitas USU.', 'url' => 'https://resourceguide.usu.ac.id', 'icon' => 'article', 'badge_text' => 'Database Internasional', 'display_url' => 'resourceguide.usu.ac.id', 'sort_order' => 3],
            ['name' => 'Buku Elektronik (E-Book)', 'description' => 'Ribuan judul buku teks elektronik dan monograf ilmiah berkualitas tinggi yang dapat dibaca dan diunduh melalui perangkat mobile & laptop.', 'url' => 'https://resourceguide.usu.ac.id', 'icon' => 'tablet_mac', 'badge_text' => 'Buku Digital', 'display_url' => 'resourceguide.usu.ac.id', 'sort_order' => 4],
            ['name' => 'Panduan Sumber Daya (Resource Guide)', 'description' => 'Petunjuk navigasi basis data ilmiah per bidang ilmu (Kedokteran, Teknik, Pertanian, Hukum, Ekonomi, Ilmu Budaya, dll).', 'url' => 'https://resourceguide.usu.ac.id', 'icon' => 'travel_explore', 'badge_text' => 'Panduan Riset', 'display_url' => 'resourceguide.usu.ac.id', 'sort_order' => 5],
            ['name' => 'Cek Pinjaman Buku & Akun', 'description' => 'Cek status buku yang sedang dipinjam, tenggat pengembalian, perpanjangan masa pinjam mandiri, dan bebas pustaka.', 'url' => 'https://digilib.usu.ac.id/login.php', 'icon' => 'account_circle', 'badge_text' => 'Layanan Mandiri', 'display_url' => 'digilib.usu.ac.id', 'sort_order' => 6],
        ];

        foreach ($portals as $portal) {
            DigitalPortal::create($portal);
        }
    }
}
