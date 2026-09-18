<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomReservation;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomScheduleController extends Controller
{
    /**
     * Display the room schedule page with real database data.
     */
    public function index(): View
    {
        $rooms = Room::with(['units.reservations' => function ($query) {
            $query->whereDate('reservation_date', today())
                ->whereIn('status', ['approved', 'pending']);
        }, 'facilities', 'rules'])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Attach computed today status for each room
        $rooms->each(function ($room) {
            $totalUnits = $room->units->count();
            $bookedUnits = $room->units->filter(function ($unit) {
                return $unit->reservations->where('status', 'approved')->isNotEmpty();
            })->count();

            if ($totalUnits === 0) {
                $room->current_status = 'available';
                $room->status_label = 'Tersedia';
                $room->status_subtext = 'Bebas tanpa antrean';
            } elseif ($bookedUnits === 0) {
                $room->current_status = 'available';
                $room->status_label = 'Tersedia';
                $room->status_subtext = 'Bebas tanpa antrean';
            } elseif ($bookedUnits < $totalUnits) {
                $freeCount = $totalUnits - $bookedUnits;
                $room->current_status = 'available';
                $room->status_label = "Tersedia ($freeCount/$totalUnits Unit)";
                $room->status_subtext = "$bookedUnits unit sedang digunakan";
            } else {
                $room->current_status = 'booked';
                $room->status_label = 'Sedang Digunakan';
                $room->status_subtext = 'Semua unit sedang terpakai';
            }
        });

        return view('jadwal-ruangan', compact('rooms'));
    }

    /**
     * API endpoint to get the schedule for a given room and date from the database.
     */
    public function getSchedule(Request $request): JsonResponse
    {
        $roomSlug = $request->query('room', 'tgcl');
        $dateStr = $request->query('date', today()->format('Y-m-d'));

        $room = Room::with(['units.reservations' => function ($query) use ($dateStr) {
            $query->whereDate('reservation_date', $dateStr)
                ->whereIn('status', ['approved', 'pending']);
        }, 'facilities', 'rules'])
            ->where('slug', $roomSlug)
            ->first();

        if (! $room) {
            return response()->json(['error' => 'Ruangan tidak ditemukan'], 404);
        }

        $date = Carbon::parse($dateStr);
        $dayOfWeek = $date->dayOfWeek; // 0 = Sunday, 6 = Saturday

        // Sunday: Closed
        if ($dayOfWeek === Carbon::SUNDAY) {
            return response()->json([
                'room' => $room->name,
                'date' => $dateStr,
                'is_open' => false,
                'slots' => [
                    [
                        'time' => '08.00 - 20.00 WIB',
                        'status' => 'closed',
                        'badge' => 'Perpustakaan Tutup',
                        'title' => 'Hari Minggu — Layanan Libur',
                        'organizer' => 'Perpustakaan Universitas Sumatera Utara',
                        'note' => 'Gedung Perpustakaan USU tutup pada hari Minggu. Silakan reservasi pada hari kerja (Senin s/d Sabtu).',
                    ],
                ],
            ]);
        }

        // Standard operational slots
        $operationalSlots = [
            ['time' => '08.00 - 10.00 WIB', 'start' => '08:00', 'end' => '10:00'],
            ['time' => '10.00 - 12.00 WIB', 'start' => '10:00', 'end' => '12:00'],
            ['time' => '12.00 - 13.00 WIB', 'start' => '12:00', 'end' => '13:00', 'is_break' => true],
            ['time' => '13.00 - 15.00 WIB', 'start' => '13:00', 'end' => '15:00'],
            ['time' => '15.00 - 17.00 WIB', 'start' => '15:00', 'end' => '17:00'],
            ['time' => '17.00 - 19.30 WIB', 'start' => '17:00', 'end' => '19:30'],
        ];

        // If Saturday, library closes earlier (14.00 WIB)
        if ($dayOfWeek === Carbon::SATURDAY) {
            $operationalSlots = [
                ['time' => '08.00 - 10.30 WIB', 'start' => '08:00', 'end' => '10:30'],
                ['time' => '10.30 - 14.00 WIB', 'start' => '10:30', 'end' => '14:00'],
            ];
        }

        $allReservations = collect();
        foreach ($room->units as $unit) {
            foreach ($unit->reservations as $res) {
                $allReservations->push([
                    'unit_name' => $unit->name,
                    'unit_id' => $unit->id,
                    'start_time' => Carbon::parse($res->start_time)->format('H:i'),
                    'end_time' => Carbon::parse($res->end_time)->format('H:i'),
                    'title' => $res->title,
                    'organizer' => $res->organizer,
                    'notes' => $res->notes,
                    'status' => $res->status,
                ]);
            }
        }

        $totalUnitsCount = max(1, $room->units->count());
        $calculatedSlots = [];

        foreach ($operationalSlots as $slot) {
            if (! empty($slot['is_break'])) {
                $calculatedSlots[] = [
                    'time' => $slot['time'],
                    'status' => 'break',
                    'badge' => 'Jam Istirahat',
                    'title' => 'Jam Istirahat Perpustakaan',
                    'organizer' => 'Perpustakaan USU',
                    'note' => 'Sterilisasi ruangan & jeda ibadah siang.',
                ];

                continue;
            }

            // Find overlapping reservations for this slot
            $slotStart = $slot['start'];
            $slotEnd = $slot['end'];

            $matchingReservations = $allReservations->filter(function ($res) use ($slotStart, $slotEnd) {
                return $res['start_time'] < $slotEnd && $res['end_time'] > $slotStart;
            });

            $approvedReservations = $matchingReservations->where('status', 'approved');
            $pendingReservations = $matchingReservations->where('status', 'pending');

            if ($approvedReservations->isNotEmpty()) {
                $bookedUnitsCount = $approvedReservations->pluck('unit_id')->unique()->count();
                $firstRes = $approvedReservations->first();

                if ($bookedUnitsCount >= $totalUnitsCount) {
                    // Fully booked
                    $calculatedSlots[] = [
                        'time' => $slot['time'],
                        'status' => 'booked',
                        'badge' => 'Dipesan Orang Lain',
                        'title' => $firstRes['title'],
                        'organizer' => $firstRes['organizer'],
                        'note' => $firstRes['notes'] ? $firstRes['notes'].' ('.$firstRes['unit_name'].')' : 'Dipesan oleh '.$firstRes['organizer'],
                    ];
                } else {
                    // Partially booked, still available
                    $freeUnits = $totalUnitsCount - $bookedUnitsCount;
                    $calculatedSlots[] = [
                        'time' => $slot['time'],
                        'status' => 'available',
                        'badge' => "Tersedia ($freeUnits/$totalUnitsCount Unit)",
                        'title' => "Slot Masih Bebas ($freeUnits Unit Kosong)",
                        'organizer' => 'Bebas Reservasi',
                        'note' => $firstRes['unit_name'].' sedang dipinjam ('.$firstRes['title'].'), sisa unit lainnya siap dipesan.',
                    ];
                }
            } elseif ($pendingReservations->isNotEmpty()) {
                $firstPending = $pendingReservations->first();
                $calculatedSlots[] = [
                    'time' => $slot['time'],
                    'status' => 'review',
                    'badge' => 'Menunggu Review',
                    'title' => $firstPending['title'],
                    'organizer' => $firstPending['organizer'],
                    'note' => 'Pengajuan reservasi dalam tahap verifikasi oleh staf perpustakaan.',
                ];
            } else {
                $calculatedSlots[] = [
                    'time' => $slot['time'],
                    'status' => 'available',
                    'badge' => 'Tersedia Bebas',
                    'title' => 'Ruangan Bebas Digunakan',
                    'organizer' => 'Bebas Reservasi',
                    'note' => 'Slot kosong dan dapat langsung direservasi sekarang.',
                ];
            }
        }

        // Apply sorting priority: available (0), review (1), break (2), booked (3), closed (4)
        $priorityMap = [
            'available' => 0,
            'review' => 1,
            'break' => 2,
            'booked' => 3,
            'closed' => 4,
        ];

        usort($calculatedSlots, function ($a, $b) use ($priorityMap) {
            $pA = $priorityMap[$a['status']] ?? 99;
            $pB = $priorityMap[$b['status']] ?? 99;
            if ($pA !== $pB) {
                return $pA - $pB;
            }

            return strcmp($a['time'], $b['time']);
        });

        return response()->json([
            'room' => $room->name,
            'slug' => $room->slug,
            'date' => $dateStr,
            'is_open' => true,
            'slots' => $calculatedSlots,
        ]);
    }

    /**
     * API endpoint to verify real-time room availability for a specific date and time slot.
     */
    public function checkAvailability(Request $request): JsonResponse
    {
        $roomSlug = $request->query('room', 'tgcl');
        $dateStr = $request->query('date', today()->format('Y-m-d'));
        $timeSlot = $request->query('time_slot', '08:00 - 10:00 WIB');

        $isRoom = in_array($roomSlug, ['tgcl', 'rubelin', 'rapat-lt1', 'rapat-lt2', 'rapat-lt3', 'konferensi']);

        // Non-room service
        if (! $isRoom) {
            return response()->json([
                'isAvailable' => true,
                'status' => 'available',
                'badge' => 'Layanan Tersedia',
                'message' => 'Layanan siap diproses pada jadwal operasional perpustakaan.',
                'availableSlots' => [
                    '08:00 - 10:00 WIB',
                    '10:00 - 12:00 WIB',
                    '13:00 - 15:00 WIB',
                    '15:00 - 17:00 WIB',
                    '17:00 - 19:30 WIB',
                ],
            ]);
        }

        $date = Carbon::parse($dateStr);
        if ($date->dayOfWeek === Carbon::SUNDAY) {
            return response()->json([
                'isAvailable' => false,
                'status' => 'closed',
                'badge' => 'Layanan Libur',
                'message' => 'Gedung Perpustakaan USU tutup pada hari Minggu. Silakan pilih hari Senin s/d Sabtu.',
                'availableSlots' => [],
            ]);
        }

        $room = Room::with('units')->where('slug', $roomSlug)->first();
        if (! $room) {
            return response()->json(['error' => 'Ruangan tidak ditemukan'], 404);
        }

        // Parse time slot start and end
        $times = explode('-', str_replace('WIB', '', $timeSlot));
        $startTime = isset($times[0]) ? trim(str_replace('.', ':', $times[0])).':00' : '08:00:00';
        $endTime = isset($times[1]) ? trim(str_replace('.', ':', $times[1])).':00' : '10:00:00';

        // Check booked units in database
        $unitIds = $room->units->pluck('id');
        $bookedUnitIds = RoomReservation::whereIn('room_unit_id', $unitIds)
            ->whereDate('reservation_date', $dateStr)
            ->where('status', 'approved')
            ->where('start_time', '<', $endTime)
            ->where('end_time', '>', $startTime)
            ->pluck('room_unit_id')
            ->unique();

        $totalUnits = max(1, $room->units->count());
        $isFull = ($bookedUnitIds->count() >= $totalUnits);

        // Find available slots for that date
        $standardSlots = [
            '08:00 - 10:00 WIB',
            '10:00 - 12:00 WIB',
            '13:00 - 15:00 WIB',
            '15:00 - 17:00 WIB',
            '17:00 - 19:30 WIB',
        ];

        $availableSlots = [];
        foreach ($standardSlots as $slotCandidate) {
            $cTimes = explode('-', str_replace('WIB', '', $slotCandidate));
            $cStart = trim(str_replace('.', ':', $cTimes[0])).':00';
            $cEnd = trim(str_replace('.', ':', $cTimes[1])).':00';

            $cBooked = RoomReservation::whereIn('room_unit_id', $unitIds)
                ->whereDate('reservation_date', $dateStr)
                ->where('status', 'approved')
                ->where('start_time', '<', $cEnd)
                ->where('end_time', '>', $cStart)
                ->pluck('room_unit_id')
                ->unique();

            if ($cBooked->count() < $totalUnits) {
                $availableSlots[] = $slotCandidate;
            }
        }

        if ($isFull) {
            $bookedRes = RoomReservation::whereIn('room_unit_id', $unitIds)
                ->whereDate('reservation_date', $dateStr)
                ->where('status', 'approved')
                ->where('start_time', '<', $endTime)
                ->where('end_time', '>', $startTime)
                ->first();

            $reason = $bookedRes ? $bookedRes->title.' ('.$bookedRes->organizer.')' : 'Sedang dipinjam oleh pemustaka lain';

            return response()->json([
                'isAvailable' => false,
                'status' => 'booked',
                'badge' => 'Sedang Digunakan / Penuh',
                'message' => "Ruangan ini telah dipesan pada sesi <strong>{$timeSlot}</strong> untuk: <em>{$reason}</em>.",
                'availableSlots' => $availableSlots,
            ]);
        }

        return response()->json([
            'isAvailable' => true,
            'status' => 'available',
            'badge' => 'Tersedia Bebas',
            'message' => "Ruangan bebas dan siap digunakan pada sesi <strong>{$timeSlot}</strong>.",
            'availableSlots' => $availableSlots,
        ]);
    }
}
