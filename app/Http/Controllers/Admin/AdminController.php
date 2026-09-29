<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomReservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    // ── Dashboard ─────────────────────────────────────────────────────────

    public function dashboard(): View
    {
        $stats = [
            'total_users' => User::where('role', 'mahasiswa')->count(),
            'total_rooms' => Room::where('is_active', true)->count(),
            'reservations_today' => RoomReservation::whereDate('reservation_date', today())->count(),
            'total_history' => RoomReservation::count(),
            'pending_reservations' => RoomReservation::where('status', 'pending')->count(),
            'confirmed_reservations' => RoomReservation::where('status', 'approved')->count(),
        ];

        $latestReservations = RoomReservation::with(['user', 'roomUnit.room'])
            ->latest()
            ->take(5)
            ->get();

        $latestUsers = User::where('role', 'mahasiswa')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'latestReservations',
            'latestUsers',
        ));
    }

    // ── Pengguna ──────────────────────────────────────────────────────────

    public function users(Request $request): View
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nim_nip', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->input('role'));
        }

        $users = $query->latest()->paginate(15)->withQueryString();

        return view('admin.users', compact('users'));
    }

    public function destroyUser(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        $user->delete();

        return back()->with('success', 'Pengguna berhasil dihapus.');
    }

    // ── Ruangan ───────────────────────────────────────────────────────────

    public function rooms(): View
    {
        $rooms = Room::withCount('units')->orderBy('sort_order')->get();

        return view('admin.rooms', compact('rooms'));
    }

    public function toggleRoom(Room $room): RedirectResponse
    {
        $room->update(['is_active' => ! $room->is_active]);

        $status = $room->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Ruangan \"{$room->name}\" berhasil {$status}.");
    }

    public function schedule(Request $request): View
    {
        $selectedDate = $request->input('date', today()->format('Y-m-d'));
        $selectedRoomId = $request->input('room_id');

        $roomsQuery = Room::with(['units.reservations' => function ($query) use ($selectedDate) {
            $query->whereDate('reservation_date', $selectedDate)
                ->whereIn('status', ['approved', 'pending'])
                ->with('user');
        }, 'facilities']);

        if ($selectedRoomId) {
            $roomsQuery->where('id', $selectedRoomId);
        }

        $rooms = $roomsQuery->orderBy('sort_order')->get();
        $allRooms = Room::where('is_active', true)->orderBy('sort_order')->get();

        // Standard operational slots
        $operationalSlots = [
            ['time' => '08:00 - 10:00 WIB', 'start' => '08:00', 'end' => '10:00'],
            ['time' => '10:00 - 12:00 WIB', 'start' => '10:00', 'end' => '12:00'],
            ['time' => '12:00 - 13:00 WIB', 'start' => '12:00', 'end' => '13:00', 'is_break' => true],
            ['time' => '13:00 - 15:00 WIB', 'start' => '13:00', 'end' => '15:00'],
            ['time' => '15:00 - 17:00 WIB', 'start' => '15:00', 'end' => '17:00'],
            ['time' => '17:00 - 19:30 WIB', 'start' => '17:00', 'end' => '19:30'],
        ];

        // Process slots and reservations for each room
        $rooms->each(function ($room) use ($operationalSlots) {
            $allReservations = collect();
            foreach ($room->units as $unit) {
                foreach ($unit->reservations as $res) {
                    $allReservations->push([
                        'reservation_id' => $res->id,
                        'unit_name' => $unit->name,
                        'unit_id' => $unit->id,
                        'start_time' => Carbon::parse($res->start_time)->format('H:i'),
                        'end_time' => Carbon::parse($res->end_time)->format('H:i'),
                        'title' => $res->title,
                        'organizer' => $res->organizer,
                        'user_name' => $res->user?->name,
                        'notes' => $res->notes,
                        'status' => $res->status,
                    ]);
                }
            }

            $totalUnits = max(1, $room->units->count());
            $slotStatuses = [];

            foreach ($operationalSlots as $slot) {
                if (! empty($slot['is_break'])) {
                    $slotStatuses[] = [
                        'time' => $slot['time'],
                        'status' => 'break',
                        'label' => 'Istirahat',
                        'title' => 'Jam Istirahat Perpustakaan',
                        'detail' => 'Sterilisasi & Jeda Siang',
                        'reservations' => collect(),
                    ];

                    continue;
                }

                $slotStart = $slot['start'];
                $slotEnd = $slot['end'];

                $matching = $allReservations->filter(function ($res) use ($slotStart, $slotEnd) {
                    return $res['start_time'] < $slotEnd && $res['end_time'] > $slotStart;
                });

                $approved = $matching->where('status', 'approved');
                $pending = $matching->where('status', 'pending');

                if ($approved->isNotEmpty()) {
                    $bookedUnits = $approved->pluck('unit_id')->unique()->count();
                    $isFull = ($bookedUnits >= $totalUnits);
                    $firstRes = $approved->first();

                    $slotStatuses[] = [
                        'time' => $slot['time'],
                        'status' => $isFull ? 'booked' : 'partial',
                        'label' => $isFull ? 'Penuh' : 'Tersedia ('.($totalUnits - $bookedUnits)."/{$totalUnits})",
                        'title' => $firstRes['title'],
                        'detail' => ($firstRes['organizer'] ?? $firstRes['user_name']).' ('.$firstRes['unit_name'].')',
                        'reservations' => $approved,
                    ];
                } elseif ($pending->isNotEmpty()) {
                    $firstPending = $pending->first();
                    $slotStatuses[] = [
                        'time' => $slot['time'],
                        'status' => 'pending',
                        'label' => 'Menunggu Review',
                        'title' => $firstPending['title'],
                        'detail' => ($firstPending['organizer'] ?? $firstPending['user_name']),
                        'reservations' => $pending,
                    ];
                } else {
                    $slotStatuses[] = [
                        'time' => $slot['time'],
                        'status' => 'available',
                        'label' => 'Tersedia',
                        'title' => 'Ruangan Bebas',
                        'detail' => 'Dapat digunakan/direservasi',
                        'reservations' => collect(),
                    ];
                }
            }

            $room->slot_statuses = $slotStatuses;
        });

        // Reservations on this date for table listing
        $reservationsOnDate = RoomReservation::with(['user', 'roomUnit.room'])
            ->whereDate('reservation_date', $selectedDate)
            ->when($selectedRoomId, function ($q) use ($selectedRoomId) {
                $q->whereHas('roomUnit', fn ($uq) => $uq->where('room_id', $selectedRoomId));
            })
            ->orderBy('start_time')
            ->get();

        $approvedCount = $reservationsOnDate->where('status', 'approved')->count();
        $pendingCount = $reservationsOnDate->where('status', 'pending')->count();
        $totalRooms = Room::where('is_active', true)->count();

        return view('admin.schedule', compact(
            'rooms',
            'allRooms',
            'selectedDate',
            'selectedRoomId',
            'reservationsOnDate',
            'approvedCount',
            'pendingCount',
            'totalRooms'
        ));
    }

    // ── Reservasi ─────────────────────────────────────────────────────────

    public function reservations(Request $request): View
    {
        $query = RoomReservation::with(['user', 'roomUnit.room']);

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('organizer', 'like', "%{$search}%")
                    ->orWhereHas('user', fn ($uq) => $uq->where('name', 'like', "%{$search}%"));
            });
        }

        $reservations = $query->latest()->paginate(15)->withQueryString();

        return view('admin.reservations', compact('reservations'));
    }

    public function approveReservation(RoomReservation $reservation): RedirectResponse
    {
        $reservation->update([
            'status' => 'approved',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return back()->with('success', "Reservasi \"{$reservation->title}\" berhasil disetujui.");
    }

    public function rejectReservation(Request $request, RoomReservation $reservation): RedirectResponse
    {
        $request->validate(['rejection_reason' => ['required', 'string', 'max:500']]);

        $reservation->update([
            'status' => 'rejected',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
            'rejection_reason' => $request->input('rejection_reason'),
        ]);

        return back()->with('success', "Reservasi \"{$reservation->title}\" berhasil ditolak.");
    }

    public function history(Request $request): View
    {
        $query = RoomReservation::with(['user', 'roomUnit.room', 'reviewer']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('organizer', 'like', "%{$search}%")
                    ->orWhere('notes', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($uq) use ($search) {
                        $uq->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('nim_nip', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('room_id')) {
            $roomId = $request->input('room_id');
            $query->whereHas('roomUnit', fn ($uq) => $uq->where('room_id', $roomId));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('reservation_date', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('reservation_date', '<=', $request->input('end_date'));
        }

        $history = $query->orderBy('reservation_date', 'desc')
            ->orderBy('start_time', 'desc')
            ->paginate(15)
            ->withQueryString();

        $allRooms = Room::where('is_active', true)->orderBy('sort_order')->get();

        // Historical statistics
        $totalHistory = RoomReservation::count();
        $totalApproved = RoomReservation::where('status', 'approved')->count();
        $totalRejected = RoomReservation::where('status', 'rejected')->count();
        $totalPending = RoomReservation::where('status', 'pending')->count();
        $totalParticipants = RoomReservation::where('status', 'approved')->sum('participant_count');

        return view('admin.history', compact(
            'history',
            'allRooms',
            'totalHistory',
            'totalApproved',
            'totalRejected',
            'totalPending',
            'totalParticipants'
        ));
    }
}
