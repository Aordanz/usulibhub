<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\RoomRule;
use App\Models\RoomUnit;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'slug' => 'tgcl',
                'name' => 'The Gade Creative Lounge (TGCL)',
                'category' => 'Coworking Space Komunal',
                'icon' => 'groups',
                'location' => 'Lantai 1 Gedung Perpustakaan USU',
                'floor' => 1,
                'total_capacity' => 40,
                'description' => 'Coworking space modern hasil kerja sama dengan Pegadaian. Ruangan terbuka ber-AC yang nyaman untuk belajar mandiri, diskusi kelompok, dan kerja kolaboratif tanpa sekat kaku.',
                'requires_letter' => false,
                'min_participants' => null,
                'max_duration_hours' => null,
                'is_reservable' => true,
                'sort_order' => 1,
                'units' => [
                    ['name' => 'Area Utama TGCL', 'capacity' => 40, 'sort_order' => 1],
                ],
                'facilities' => [
                    '40+ Kursi & Meja Ergonomis',
                    'Stopkontak di Setiap Meja',
                    'Wi-Fi Kecepatan Tinggi (Eduroam & USU-Hotspot)',
                    'AC Central & Pencahayaan Optimal',
                    'Beanbag Area Santai',
                ],
                'rules' => [
                    'Dapat langsung digunakan tanpa reservasi jika kapasitas masih tersedia.',
                    'Menjaga ketenangan dan kebersihan bersama.',
                    'Dilarang membawa makanan berat ke dalam area lounge.',
                ],
            ],
            [
                'slug' => 'rubelin',
                'name' => 'Ruang Belajar Individu (RUBELIN)',
                'category' => 'Kubikel Hening Mandiri',
                'icon' => 'chair_alt',
                'location' => 'Lantai 1 Area Referensi Dosen & Pascasarjana',
                'floor' => 1,
                'total_capacity' => 5,
                'description' => '5 unit ruang belajar kubikel hening kedap suara khusus Dosen, Peneliti, dan Mahasiswa Pascasarjana (S2/S3) untuk fokus riset tesis/disertasi dan studi mandiri intensif.',
                'requires_letter' => false,
                'min_participants' => null,
                'max_duration_hours' => 3,
                'is_reservable' => true,
                'sort_order' => 2,
                'units' => [
                    ['name' => 'Kubikel 01', 'capacity' => 1, 'sort_order' => 1],
                    ['name' => 'Kubikel 02', 'capacity' => 1, 'sort_order' => 2],
                    ['name' => 'Kubikel 03', 'capacity' => 1, 'sort_order' => 3],
                    ['name' => 'Kubikel 04', 'capacity' => 1, 'sort_order' => 4],
                    ['name' => 'Kubikel 05', 'capacity' => 1, 'sort_order' => 5],
                ],
                'facilities' => [
                    'Partisi Kedap Suara Hening',
                    'Lampu Belajar LED Adjustable',
                    '2x Stopkontak Listrik Mandiri',
                    'Kursi Ergonomis High-back',
                    'Akses Dekat Koleksi Buku Referensi',
                ],
                'rules' => [
                    'Khusus Dosen, Peneliti, dan Mahasiswa Pascasarjana aktif USU.',
                    'Maksimal peminjaman 3 jam per sesi (dapat diperpanjang jika tidak ada antrean).',
                    'Wajib menjaga suasana hening dan tidak menerima panggilan telepon di dalam kubikel.',
                ],
            ],
            [
                'slug' => 'rapat-lt1',
                'name' => 'Ruang Rapat / Diskusi Lantai 1',
                'category' => 'Ruang Rapat & Diskusi Terbuka',
                'icon' => 'meeting_room',
                'location' => 'Lantai 1 Gedung Perpustakaan USU',
                'floor' => 1,
                'total_capacity' => 30,
                'description' => '3 unit ruang diskusi tertutup di Lantai 1 yang cocok untuk rapat prodi, bimbingan dosen, serta diskusi tugas kelompok.',
                'requires_letter' => false,
                'min_participants' => 4,
                'max_duration_hours' => null,
                'is_reservable' => true,
                'sort_order' => 3,
                'units' => [
                    ['name' => 'Ruang Diskusi 1A', 'capacity' => 6, 'sort_order' => 1],
                    ['name' => 'Ruang Diskusi 1B', 'capacity' => 6, 'sort_order' => 2],
                    ['name' => 'Ruang Utama 1C', 'capacity' => 18, 'sort_order' => 3],
                ],
                'facilities' => [
                    'Whiteboard Kaca & Spidol Lengkap',
                    'Proyektor HD & Layar Presentasi',
                    'Koneksi HDMI & Type-C Converter',
                    'AC Split Mandiri',
                    'Wi-Fi Dedicated Ruangan',
                ],
                'rules' => [
                    'Jumlah peserta minimal 4 orang untuk Ruang 1A/1B, dan minimal 10 orang untuk Ruang 1C.',
                    'Reservasi dilakukan minimal 1 hari sebelumnya.',
                    'Merapikan whiteboard dan mematikan AC/proyektor setelah selesai digunakan.',
                ],
            ],
            [
                'slug' => 'rapat-lt2',
                'name' => 'Ruang Rapat / Diskusi Lantai 2',
                'category' => 'Ruang Rapat Kelompok',
                'icon' => 'group_work',
                'location' => 'Lantai 2 Gedung Perpustakaan USU',
                'floor' => 2,
                'total_capacity' => 24,
                'description' => '2 ruang diskusi modern di Lantai 2 dilengkapi Smart TV 55 inci untuk presentasi nirkabel (wireless display), sangat ideal untuk sidang proposal, seminar kelompok, atau presentasi proyek.',
                'requires_letter' => false,
                'min_participants' => 6,
                'max_duration_hours' => null,
                'is_reservable' => true,
                'sort_order' => 4,
                'units' => [
                    ['name' => 'Ruang Rapat 2A', 'capacity' => 12, 'sort_order' => 1],
                    ['name' => 'Ruang Rapat 2B', 'capacity' => 12, 'sort_order' => 2],
                ],
                'facilities' => [
                    'Smart TV 55" dengan Screen Mirroring & HDMI',
                    'Meja Konferensi U-Shape 12 Kursi',
                    'Whiteboard Dinding',
                    'AC Split & Ruangan Kedap Suara',
                    'Stopkontak Multiple Port',
                ],
                'rules' => [
                    'Peserta minimal 6 orang per ruangan.',
                    'Menyerahkan KTM salah satu penanggung jawab ke meja petugas saat check-in.',
                    'Kabel HDMI dan remote TV dapat diambil di meja sirkulasi Lt. 2.',
                ],
            ],
            [
                'slug' => 'rapat-lt3',
                'name' => 'Ruang Rapat Lantai 3 (Eksekutif)',
                'category' => 'Ruang Rapat Eksekutif',
                'icon' => 'forum',
                'location' => 'Lantai 3 Gedung Perpustakaan USU',
                'floor' => 3,
                'total_capacity' => 8,
                'description' => 'Ruang rapat eksekutif di lantai 3 dengan suasana hening dan privat. Dilengkapi meja bundar dan kamera konferensi 360° untuk rapat hybrid.',
                'requires_letter' => false,
                'min_participants' => null,
                'max_duration_hours' => null,
                'is_reservable' => true,
                'sort_order' => 5,
                'units' => [
                    ['name' => 'Ruang Rapat Eksekutif Lt. 3', 'capacity' => 8, 'sort_order' => 1],
                ],
                'facilities' => [
                    'Kamera Konferensi 360° & Mic Array Speakerphone',
                    'Monitor Presentasi 50"',
                    'Meja Bundar Eksekutif & Kursi Kulit Nyaman',
                    'Acoustic Treatment Dinding Kedap Suara',
                    'Wi-Fi Dedicated Cepat',
                ],
                'rules' => [
                    'Khusus untuk rapat pimpinan, dosen, bimbingan pasca, atau tamu universitas.',
                    'Reservasi slot terlebih dahulu melalui portal web.',
                    'Tersedia kopi & dispenser di pantry luar ruangan.',
                ],
            ],
            [
                'slug' => 'konferensi',
                'name' => 'Ruang Konferensi (Auditorium Mini)',
                'category' => 'Auditorium & Mini Hall',
                'icon' => 'podium',
                'location' => 'Lantai 1 Sayap Barat Perpustakaan USU',
                'floor' => 1,
                'total_capacity' => 70,
                'description' => 'Auditorium mini bertingkat dengan panggung, sound system profesional, dual projector, dan mic podium. Sangat representatif untuk seminar nasional, workshop, webinar, dan bedah buku.',
                'requires_letter' => true,
                'min_participants' => 20,
                'max_duration_hours' => null,
                'is_reservable' => true,
                'sort_order' => 6,
                'units' => [
                    ['name' => 'Auditorium Utama', 'capacity' => 70, 'sort_order' => 1],
                ],
                'facilities' => [
                    '70 Kursi Kuliah Lipat Berkualitas',
                    'Panggung Mini & Podium Kayu Jati',
                    'Dual Proyektor HD + Dual Screen Motorized',
                    'Sound System & 4 Wireless Microphone',
                    'Kamera Recording & Live Streaming Setup',
                ],
                'rules' => [
                    'Wajib menyertakan surat pengajuan resmi dari fakultas/prodi/lembaga.',
                    'Pengajuan minimal H-3 sebelum tanggal pelaksanaan.',
                    'Wajib melakukan gladi bersih teknis minimal H-1 bersama petugas IT perpustakaan.',
                ],
            ],
        ];

        foreach ($rooms as $roomData) {
            $units = $roomData['units'];
            $facilities = $roomData['facilities'];
            $rules = $roomData['rules'];
            unset($roomData['units'], $roomData['facilities'], $roomData['rules']);

            $room = Room::create($roomData);

            foreach ($units as $unit) {
                RoomUnit::create(array_merge($unit, ['room_id' => $room->id]));
            }

            foreach ($facilities as $i => $facility) {
                RoomFacility::create([
                    'room_id' => $room->id,
                    'name' => $facility,
                    'sort_order' => $i + 1,
                ]);
            }

            foreach ($rules as $i => $rule) {
                RoomRule::create([
                    'room_id' => $room->id,
                    'rule' => $rule,
                    'sort_order' => $i + 1,
                ]);
            }
        }
    }
}
