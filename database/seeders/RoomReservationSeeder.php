<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomReservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoomReservationSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $user = User::where('role', 'mahasiswa')->first() ?? $admin;

        if (! $user) {
            return;
        }

        // Clean existing reservations to avoid duplicate seeds
        RoomReservation::truncate();

        // Get key room units
        $tgclRoom = Room::where('slug', 'tgcl')->first();
        $tgclUnit = $tgclRoom ? $tgclRoom->units()->first() : null;

        $rubelinRoom = Room::where('slug', 'rubelin')->first();
        $rubelinUnits = $rubelinRoom ? $rubelinRoom->units()->get() : collect();

        $rapat1Room = Room::where('slug', 'rapat-lt1')->first();
        $rapat1Units = $rapat1Room ? $rapat1Room->units()->get() : collect();

        $rapat2Room = Room::where('slug', 'rapat-lt2')->first();
        $rapat2Units = $rapat2Room ? $rapat2Room->units()->get() : collect();

        $rapat3Room = Room::where('slug', 'rapat-lt3')->first();
        $rapat3Unit = $rapat3Room ? $rapat3Room->units()->first() : null;

        $konferensiRoom = Room::where('slug', 'konferensi')->first();
        $konferensiUnit = $konferensiRoom ? $konferensiRoom->units()->first() : null;

        $today = Carbon::today();
        $dates = [
            $today->copy()->format('Y-m-d'),
            $today->copy()->addDay()->format('Y-m-d'),
            $today->copy()->addDays(2)->format('Y-m-d'),
            $today->copy()->addDays(3)->format('Y-m-d'),
        ];

        foreach ($dates as $index => $dateStr) {
            $isToday = ($index === 0);

            // 1. The Gade Creative Lounge (TGCL)
            if ($tgclUnit) {
                // Sesi Siang dipinjam
                RoomReservation::create([
                    'room_unit_id' => $tgclUnit->id,
                    'user_id' => $user->id,
                    'reservation_date' => $dateStr,
                    'start_time' => '13:00:00',
                    'end_time' => '15:00:00',
                    'title' => 'Workshop UI/UX Design Club — Komunitas Fasilkom-TI',
                    'organizer' => 'Himpunan Mahasiswa Fasilkom-TI USU',
                    'participant_count' => 25,
                    'notes' => 'Kegiatan pengenalan Figma dan prototyping aplikasi mobile.',
                    'status' => 'approved',
                    'reviewed_by' => $admin?->id,
                    'reviewed_at' => now(),
                ]);

                if (! $isToday) {
                    RoomReservation::create([
                        'room_unit_id' => $tgclUnit->id,
                        'user_id' => $user->id,
                        'reservation_date' => $dateStr,
                        'start_time' => '10:00:00',
                        'end_time' => '12:00:00',
                        'title' => 'Diskusi Panel Startup & Literasi Finansial',
                        'organizer' => 'Inkubator Bisnis USU & Galeri Investasi',
                        'participant_count' => 30,
                        'notes' => 'Acara sharing session bersama praktisi industri.',
                        'status' => 'approved',
                        'reviewed_by' => $admin?->id,
                        'reviewed_at' => now(),
                    ]);
                }
            }

            // 2. Ruang Belajar Individu (RUBELIN)
            if ($rubelinUnits->isNotEmpty()) {
                // Kubikel 01
                $k1 = $rubelinUnits->firstWhere('name', 'Kubikel 01') ?? $rubelinUnits[0];
                RoomReservation::create([
                    'room_unit_id' => $k1->id,
                    'user_id' => $user->id,
                    'reservation_date' => $dateStr,
                    'start_time' => '10:00:00',
                    'end_time' => '12:00:00',
                    'title' => 'Penyusunan Tesis & Analisis Data SPSS',
                    'organizer' => 'dr. Hendra Pratama (S2 Farmasi Klinis)',
                    'participant_count' => 1,
                    'notes' => 'Membutuhkan suasana hening untuk pengolahan sampel uji klinis.',
                    'status' => 'approved',
                    'reviewed_by' => $admin?->id,
                    'reviewed_at' => now(),
                ]);

                // Kubikel 02
                if (isset($rubelinUnits[1])) {
                    RoomReservation::create([
                        'room_unit_id' => $rubelinUnits[1]->id,
                        'user_id' => $user->id,
                        'reservation_date' => $dateStr,
                        'start_time' => '15:00:00',
                        'end_time' => '17:00:00',
                        'title' => 'Studi Literatur Jurnal Internasional Terindeks Scopus',
                        'organizer' => 'Nurfadilah, S.T. (Mahasiswa S2 Teknik Industri)',
                        'participant_count' => 1,
                        'notes' => 'Persiapan naskah publikasi konferensi internasional.',
                        'status' => 'approved',
                        'reviewed_by' => $admin?->id,
                        'reviewed_at' => now(),
                    ]);
                }
            }

            // 3. Ruang Rapat Lantai 1
            if ($rapat1Units->isNotEmpty()) {
                $r1c = $rapat1Units->firstWhere('name', 'Ruang Utama 1C') ?? $rapat1Units->last();
                RoomReservation::create([
                    'room_unit_id' => $r1c->id,
                    'user_id' => $user->id,
                    'reservation_date' => $dateStr,
                    'start_time' => '08:00:00',
                    'end_time' => '10:00:00',
                    'title' => 'Sidang Ujian Komprehensif Skripsi S1 Ilmu Komunikasi',
                    'organizer' => 'Departemen Ilmu Komunikasi FISIP USU',
                    'participant_count' => 12,
                    'notes' => 'Dihadiri Ketua Program Studi dan Dosen Pembimbing.',
                    'status' => 'approved',
                    'reviewed_by' => $admin?->id,
                    'reviewed_at' => now(),
                ]);

                $r1a = $rapat1Units->firstWhere('name', 'Ruang Diskusi 1A') ?? $rapat1Units[0];
                RoomReservation::create([
                    'room_unit_id' => $r1a->id,
                    'user_id' => $user->id,
                    'reservation_date' => $dateStr,
                    'start_time' => '13:00:00',
                    'end_time' => '15:00:00',
                    'title' => 'Bimbingan Kelompok Tugas Akhir Rekayasa Perangkat Lunak',
                    'organizer' => 'Tim Dosen Pembimbing TI USU',
                    'participant_count' => 6,
                    'notes' => 'Review milestone dan arsitektur database proyek mahasiswa.',
                    'status' => 'pending',
                ]);
            }

            // 4. Ruang Rapat Lantai 2
            if ($rapat2Units->isNotEmpty()) {
                $r2a = $rapat2Units->firstWhere('name', 'Ruang Rapat 2A') ?? $rapat2Units[0];
                RoomReservation::create([
                    'room_unit_id' => $r2a->id,
                    'user_id' => $user->id,
                    'reservation_date' => $dateStr,
                    'start_time' => '10:00:00',
                    'end_time' => '12:00:00',
                    'title' => 'Rapat Koordinasi Pengurus Badan Eksekutif Mahasiswa (BEM)',
                    'organizer' => 'BEM Universitas Sumatera Utara',
                    'participant_count' => 10,
                    'notes' => 'Koordinasi program kerja pekan literasi kampus.',
                    'status' => 'approved',
                    'reviewed_by' => $admin?->id,
                    'reviewed_at' => now(),
                ]);
            }

            // 5. Ruang Rapat Lantai 3 (Eksekutif)
            if ($rapat3Unit) {
                RoomReservation::create([
                    'room_unit_id' => $rapat3Unit->id,
                    'user_id' => $user->id,
                    'reservation_date' => $dateStr,
                    'start_time' => '15:00:00',
                    'end_time' => '17:00:00',
                    'title' => 'Konsultasi Disertasi Doktoral Ilmu Lingkungan',
                    'organizer' => 'Prof. Dr. Ir. H. Lubis (Promotor S3)',
                    'participant_count' => 5,
                    'notes' => 'Diskusi draft revisi bab hasil analisis laboratorium.',
                    'status' => 'approved',
                    'reviewed_by' => $admin?->id,
                    'reviewed_at' => now(),
                ]);
            }

            // 6. Ruang Konferensi
            if ($konferensiUnit && ($index % 2 === 0)) {
                RoomReservation::create([
                    'room_unit_id' => $konferensiUnit->id,
                    'user_id' => $user->id,
                    'reservation_date' => $dateStr,
                    'start_time' => '08:00:00',
                    'end_time' => '12:00:00',
                    'title' => 'Seminar Nasional Literasi Digital & Publikasi Bereputasi 2026',
                    'organizer' => 'UPT Perpustakaan & LPPM USU',
                    'participant_count' => 65,
                    'notes' => 'Acara resmi universitas dengan narasumber dari BRIN & Elsevier.',
                    'status' => 'approved',
                    'reviewed_by' => $admin?->id,
                    'reviewed_at' => now(),
                ]);
            }
        }
    }
}
