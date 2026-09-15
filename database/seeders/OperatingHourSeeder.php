<?php

namespace Database\Seeders;

use App\Models\OperatingHour;
use Illuminate\Database\Seeder;

class OperatingHourSeeder extends Seeder
{
    public function run(): void
    {
        $hours = [
            ['label' => 'Senin', 'day_start' => 1, 'day_end' => 1, 'open_time' => '08:00', 'close_time' => '20:00', 'is_closed' => false, 'service_type' => 'fisik', 'description' => 'Pelayanan Penuh', 'icon' => 'calendar_today', 'sort_order' => 1],
            ['label' => 'Selasa – Kamis', 'day_start' => 2, 'day_end' => 4, 'open_time' => '08:00', 'close_time' => '20:00', 'is_closed' => false, 'service_type' => 'fisik', 'description' => 'Pelayanan Penuh', 'icon' => 'date_range', 'sort_order' => 2],
            ['label' => 'Jumat', 'day_start' => 5, 'day_end' => 5, 'open_time' => '08:00', 'close_time' => '17:00', 'is_closed' => false, 'service_type' => 'fisik', 'description' => 'Jeda Shalat Jumat', 'icon' => 'event_available', 'sort_order' => 3],
            ['label' => 'Sabtu – Minggu', 'day_start' => 6, 'day_end' => 7, 'open_time' => null, 'close_time' => null, 'is_closed' => true, 'service_type' => 'fisik', 'description' => 'Hari Libur Akhir Pekan', 'icon' => 'event_busy', 'sort_order' => 4],
            ['label' => 'Ruang Baca Terbuka (Lt. 1)', 'day_start' => 1, 'day_end' => 5, 'open_time' => '08:00', 'close_time' => '21:00', 'is_closed' => false, 'service_type' => 'belajar', 'description' => 'Bebas Belajar', 'icon' => 'chair', 'sort_order' => 5],
            ['label' => 'Akses Online Mandiri', 'day_start' => null, 'day_end' => null, 'open_time' => null, 'close_time' => null, 'is_closed' => false, 'service_type' => 'online', 'description' => 'E-Journal, E-Book, Repositori', 'icon' => 'public', 'sort_order' => 6],
        ];

        foreach ($hours as $hour) {
            OperatingHour::create($hour);
        }
    }
}
