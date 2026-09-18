<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    public function run(): void
    {
        $holidays = [
            ['date' => '2026-12-25', 'name' => 'Hari Natal', 'description' => 'Perpustakaan tutup — Hari Natal'],
            ['date' => '2027-01-01', 'name' => 'Tahun Baru 2027', 'description' => 'Perpustakaan tutup — Tahun Baru Masehi'],
            ['date' => '2026-10-01', 'name' => 'Hari Kesaktian Pancasila', 'description' => 'Perpustakaan tutup — Hari libur nasional'],
        ];

        foreach ($holidays as $holiday) {
            Holiday::create($holiday);
        }
    }
}
