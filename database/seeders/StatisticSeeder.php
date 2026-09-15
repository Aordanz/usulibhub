<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['label' => 'Anggota Terdaftar', 'value' => '27.826', 'sublabel' => 'Mahasiswa & Dosen', 'icon' => 'group', 'color_scheme' => 'green', 'sort_order' => 1],
            ['label' => 'Jumlah Pinjaman', 'value' => '3.055.147', 'sublabel' => 'Sirkulasi Aktif', 'icon' => 'import_contacts', 'color_scheme' => 'amber', 'sort_order' => 2],
            ['label' => 'Penjajaran Koleksi', 'value' => '150.615', 'sublabel' => 'Judul & Eksemplar', 'icon' => 'menu_book', 'color_scheme' => 'green', 'sort_order' => 3],
            ['label' => 'Jumlah Pengunjung', 'value' => '256.191', 'sublabel' => 'Kunjungan Fisik & Daring', 'icon' => 'sensor_occupied', 'color_scheme' => 'amber', 'sort_order' => 4],
        ];

        foreach ($stats as $stat) {
            Statistic::create($stat);
        }
    }
}
