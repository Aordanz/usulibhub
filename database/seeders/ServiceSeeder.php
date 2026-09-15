<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug' => 'luring',
                'name' => 'Layanan Luring (Onsite)',
                'subtitle' => 'Sirkulasi & Koleksi Buku',
                'description' => 'Peminjaman, perpanjangan, pengembalian buku fisik, pembuatan KTM/kartu anggota, bimbingan literasi pemustaka, dan konsultasi referensi langsung di Gedung Perpustakaan USU.',
                'icon' => 'storefront',
                'badge_color' => '#0B6839',
                'image_path' => 'images/layanan/luring.jpg',
                'sort_order' => 1,
                'items' => [
                    ['name' => 'Layanan Sirkulasi', 'description' => 'Peminjaman, pengembalian, perpanjangan, dan pembayaran denda terintegrasi antar perpustakaan pusat & 14 cabang USU.', 'icon' => 'sync_alt', 'badge_text' => 'Lantai 1', 'sort_order' => 1],
                    ['name' => 'Keanggotaan & Aktivasi KTM', 'description' => 'Pendaftaran anggota baru, aktivasi barcode KTM mahasiswa, dan cetak kartu anggota perpustakaan.', 'icon' => 'badge', 'badge_text' => 'Lantai 1', 'sort_order' => 2],
                    ['name' => 'Bimbingan Pengguna (User Education)', 'description' => 'Panduan orientasi perpustakaan untuk mahasiswa baru, tur fasilitas, dan pengenalan sistem katalog OPAC.', 'icon' => 'school', 'badge_text' => 'Lantai 1', 'sort_order' => 3],
                    ['name' => 'Ruang Referensi Dosen & Pascasarjana', 'description' => 'Koleksi khusus referensi akademik untuk dosen dan mahasiswa pascasarjana (S2/S3) di area khusus Lantai 1.', 'icon' => 'auto_stories', 'badge_text' => 'Lantai 1', 'sort_order' => 4],
                    ['name' => 'Kelas Literasi Informasi', 'description' => 'Pelatihan berkala keterampilan penelusuran informasi, penggunaan database ilmiah, dan manajemen referensi (Mendeley/Zotero).', 'icon' => 'cast_for_education', 'badge_text' => 'Terjadwal', 'sort_order' => 5],
                ],
            ],
            [
                'slug' => 'daring',
                'name' => 'Layanan Daring (Online)',
                'subtitle' => 'SKBP & E-Journal Online',
                'description' => 'Pengurusan Surat Keterangan Bebas Pustaka (SKBP) mandiri wisuda, uji kemiripan dokumen Turnitin, akses pangkalan data jurnal ilmiah terindeks Scopus & ScienceDirect 24/7.',
                'icon' => 'cloud_sync',
                'badge_color' => '#15803D',
                'image_path' => 'images/layanan/daring.jpg',
                'sort_order' => 2,
                'items' => [
                    ['name' => 'Reservasi Koleksi Buku Standar', 'description' => 'Pemesanan buku cetak sirkulasi via daring sebelum diambil di perpustakaan agar buku disiapkan lebih awal oleh staf.', 'icon' => 'auto_stories', 'badge_text' => 'Katalog OPAC', 'external_url' => 'https://digilib.usu.ac.id', 'sort_order' => 1],
                    ['name' => 'Pengurusan SKBP Online', 'description' => 'Pengurusan Surat Keterangan Bebas Pustaka secara mandiri untuk syarat wisuda dan kelulusan mahasiswa USU.', 'icon' => 'workspace_premium', 'badge_text' => 'Syarat Wisuda', 'sort_order' => 2],
                    ['name' => 'Uji Turnitin Online', 'description' => 'Pemeriksaan tingkat kesamaan (similarity check) naskah skripsi, tesis, disertasi, dan jurnal secara daring.', 'icon' => 'plagiarism', 'badge_text' => 'Anti-Plagiarisme', 'sort_order' => 3],
                    ['name' => 'Pemesanan Penelusuran Literatur', 'description' => 'Permintaan bantuan pustakawan untuk menelusurkan artikel ilmiah, jurnal, dan referensi dari database terlanggan.', 'icon' => 'manage_search', 'badge_text' => 'Database Premium', 'sort_order' => 4],
                    ['name' => 'Unggah Mandiri Karya Akhir', 'description' => 'Penyerahan dan unggah mandiri file skripsi, tesis, dan disertasi ke Repositori Institusi USU secara daring.', 'icon' => 'cloud_upload', 'badge_text' => 'Repositori USU', 'external_url' => 'https://repositori.usu.ac.id', 'sort_order' => 5],
                ],
            ],
            [
                'slug' => 'area-belajar',
                'name' => 'Layanan Area Belajar & Ruangan',
                'subtitle' => 'TGCL & Ruang Rapat',
                'description' => 'Coworking space modern TGCL Lantai 1, kubikel fokus individu RUBELIN kedap suara, dan ruang rapat resmi berkapasitas 6 hingga 18 orang dengan sistem booking online.',
                'icon' => 'meeting_room',
                'badge_color' => '#EB680D',
                'image_path' => 'images/layanan/area-belajar.jpg',
                'sort_order' => 3,
                'items' => [],
            ],
        ];

        foreach ($services as $serviceData) {
            $items = $serviceData['items'];
            unset($serviceData['items']);

            $service = Service::create($serviceData);

            foreach ($items as $item) {
                ServiceItem::create(array_merge($item, ['service_id' => $service->id]));
            }
        }
    }
}
