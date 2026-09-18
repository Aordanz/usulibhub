<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['question' => 'Siapa saja yang bisa meminjam buku di Perpustakaan USU?', 'answer' => 'Seluruh mahasiswa aktif, dosen, dan tenaga kependidikan Universitas Sumatera Utara yang terdaftar serta memiliki Kartu Tanda Mahasiswa (KTM) / Kartu Anggota Perpustakaan yang aktif.', 'category' => 'Keanggotaan', 'sort_order' => 1],
            ['question' => 'Bagaimana cara memperpanjang buku yang dipinjam?', 'answer' => 'Perpanjangan dapat dilakukan 1× sebelum tanggal jatuh tempo melalui layanan sirkulasi di meja petugas atau menghubungi pustakawan via WhatsApp/telepon.', 'category' => 'Peminjaman', 'sort_order' => 2],
            ['question' => 'Bagaimana cara mengurus Surat Keterangan Bebas Pustaka (SKBP)?', 'answer' => 'SKBP dapat diurus secara online melalui layanan daring perpustakaan, atau secara langsung di meja sirkulasi Lantai 1 dengan mengembalikan seluruh koleksi pinjaman dan menyerahkan formulir yang diperlukan.', 'category' => 'SKBP', 'sort_order' => 3],
            ['question' => 'Apakah ruangan diskusi bisa direservasi secara online?', 'answer' => 'Ya! Anda dapat melihat jadwal ketersediaan ruangan melalui halaman Jadwal Ruangan dan melakukan reservasi langsung melalui fitur di website ini.', 'category' => 'Ruangan', 'sort_order' => 4],
            ['question' => 'Apakah Perpustakaan USU buka di hari Sabtu dan Minggu?', 'answer' => 'Jadwal operasional dapat bervariasi. Silakan cek informasi jam layanan terbaru di halaman Beranda bagian Jam Layanan.', 'category' => 'Jadwal', 'sort_order' => 5],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
