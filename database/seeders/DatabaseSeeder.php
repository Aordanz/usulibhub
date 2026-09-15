<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpustakaan.usu.ac.id',
            'role' => 'admin',
            'nim_nip' => '198501012010011001',
            'fakultas' => null,
            'phone' => '081234567890',
        ]);

        // Pustakawan user
        User::factory()->create([
            'name' => 'Pustakawan USU',
            'email' => 'pustakawan@perpustakaan.usu.ac.id',
            'role' => 'pustakawan',
            'nim_nip' => '199003152015041002',
            'fakultas' => null,
            'phone' => '081298765432',
        ]);

        // Sample mahasiswa
        User::factory()->create([
            'name' => 'Mahasiswa Demo',
            'email' => 'mahasiswa@students.usu.ac.id',
            'role' => 'mahasiswa',
            'nim_nip' => '221402001',
            'fakultas' => 'Fasilkom-TI',
            'phone' => '085612345678',
        ]);

        $this->call([
            RoomSeeder::class,
            OperatingHourSeeder::class,
            ServiceSeeder::class,
            DigitalPortalSeeder::class,
            StatisticSeeder::class,
            NewsSeeder::class,
            FaqSeeder::class,
            ContactSeeder::class,
            HolidaySeeder::class,
        ]);
    }
}
