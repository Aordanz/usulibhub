@extends('admin.layout')

@section('title', 'Jadwal Ruangan')
@section('page-title', 'Jadwal Ruangan')
@section('page-subtitle', 'Pantau jadwal pemakaian, slot ketersediaan, dan antrean reservasi ruangan')

@section('content')

{{-- ═══════════════════════════════════════════════════ --}}
{{-- FILTER & CONTROLS TOOLBAR                           --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="bg-white rounded-2xl border border-[#E8F0EC] p-5 mb-7 shadow-xs">
    <form method="GET" action="{{ route('admin.schedule') }}" class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        
        {{-- Left: Date & Room Filter --}}
        <div class="flex flex-wrap items-center gap-3">
            {{-- Date Input --}}
            <div class="flex items-center gap-2 bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl px-3 py-2">
                <span class="material-symbols-outlined text-[#0B6839] text-lg">calendar_today</span>
                <input 
                    type="date" 
                    name="date" 
                    value="{{ $selectedDate }}" 
                    class="bg-transparent text-xs sm:text-sm font-semibold text-[#0F172A] focus:outline-hidden cursor-pointer"
                    onchange="this.form.submit()"
                >
            </div>

            {{-- Room Filter --}}
            <div class="flex items-center gap-2 bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl px-3 py-2">
                <span class="material-symbols-outlined text-[#64748B] text-lg">meeting_room</span>
                <select name="room_id" class="bg-transparent text-xs sm:text-sm font-semibold text-[#0F172A] focus:outline-hidden cursor-pointer" onchange="this.form.submit()">
                    <option value="">Semua Ruangan</option>
                    @foreach($allRooms as $r)
                        <option value="{{ $r->id }}" {{ $selectedRoomId == $r->id ? 'selected' : '' }}>
                            {{ $r->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-[#0B6839] text-white text-xs font-bold rounded-xl hover:bg-[#074324] transition-colors flex items-center gap-1.5 shadow-xs">
                <span class="material-symbols-outlined text-sm">filter_alt</span>
                Terapkan
            </button>

            @if(request()->filled('date') || request()->filled('room_id'))
                <a href="{{ route('admin.schedule') }}" class="text-xs text-[#64748B] hover:text-red-500 font-medium px-2 py-2 flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">refresh</span>
                    Reset
                </a>
            @endif
        </div>

        {{-- Right: Quick Date Shortcuts --}}
        <div class="flex items-center gap-2">
            @php
                $todayStr = today()->format('Y-m-d');
                $tomorrowStr = today()->addDay()->format('Y-m-d');
                $dayAfterStr = today()->addDays(2)->format('Y-m-d');
            @endphp
            <a href="{{ route('admin.schedule', ['date' => $todayStr, 'room_id' => $selectedRoomId]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors {{ $selectedDate === $todayStr ? 'bg-[#0B6839] text-white' : 'bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0]' }}">
                Hari Ini
            </a>
            <a href="{{ route('admin.schedule', ['date' => $tomorrowStr, 'room_id' => $selectedRoomId]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors {{ $selectedDate === $tomorrowStr ? 'bg-[#0B6839] text-white' : 'bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0]' }}">
                Besok
            </a>
            <a href="{{ route('admin.schedule', ['date' => $dayAfterStr, 'room_id' => $selectedRoomId]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors {{ $selectedDate === $dayAfterStr ? 'bg-[#0B6839] text-white' : 'bg-[#F1F5F9] text-[#475569] hover:bg-[#E2E8F0]' }}">
                Lusa
            </a>
        </div>
    </form>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- STATS BAR                                           --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-7">
    
    {{-- Tanggal Aktif --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#F0FDF4]">
            <span class="material-symbols-outlined text-2xl text-[#0B6839]" style="font-variation-settings:'FILL' 1,'wght' 600;">today</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Tanggal Operasional</p>
            <p class="text-sm font-extrabold text-[#0F172A] leading-tight truncate">
                {{ \Carbon\Carbon::parse($selectedDate)->locale('id')->isoFormat('dddd, D MMMM Y') }}
            </p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">
                {{ $selectedDate === today()->format('Y-m-d') ? '• Hari ini (Real-time)' : 'Jadwal mendatang' }}
            </p>
        </div>
    </div>

    {{-- Total Ruangan Aktif --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#EEF2FF]">
            <span class="material-symbols-outlined text-2xl text-[#6366F1]" style="font-variation-settings:'FILL' 1,'wght' 600;">meeting_room</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Ruangan Ditampilkan</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ $rooms->count() }}</p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">dari total {{ $totalRooms }} ruangan aktif</p>
        </div>
    </div>

    {{-- Sesi Disetujui --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#ECFDF5]">
            <span class="material-symbols-outlined text-2xl text-[#059669]" style="font-variation-settings:'FILL' 1,'wght' 600;">check_circle</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Sesi Disetujui (Approved)</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ $approvedCount }}</p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">Reservasi aktif pada tanggal ini</p>
        </div>
    </div>

    {{-- Sesi Menunggu Review --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#FFFBEB]">
            <span class="material-symbols-outlined text-2xl text-[#D97706]" style="font-variation-settings:'FILL' 1,'wght' 600;">pending_actions</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Menunggu Persetujuan</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ $pendingCount }}</p>
            <p class="text-[11px] {{ $pendingCount > 0 ? 'text-amber-600 font-semibold' : 'text-[#94A3B8]' }} mt-0.5">
                {{ $pendingCount > 0 ? 'Perlu ditinjau admin' : 'Tidak ada antrean' }}
            </p>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- ROOM SCHEDULE TIMELINES / CARDS                     --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="space-y-6 mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-base font-bold text-[#0F172A]">Status Slot Operasional Per-Ruangan</h2>
            <p class="text-xs text-[#64748B]">Berikut rincian ketersediaan tiap slot waktu di setiap ruangan perpustakaan.</p>
        </div>
        <div class="hidden sm:flex items-center gap-3 text-xs">
            <span class="inline-flex items-center gap-1.5 font-medium text-[#334155]">
                <span class="w-2.5 h-2.5 rounded-full bg-[#10B981]"></span> Tersedia
            </span>
            <span class="inline-flex items-center gap-1.5 font-medium text-[#334155]">
                <span class="w-2.5 h-2.5 rounded-full bg-[#F59E0B]"></span> Menunggu Review
            </span>
            <span class="inline-flex items-center gap-1.5 font-medium text-[#334155]">
                <span class="w-2.5 h-2.5 rounded-full bg-[#EF4444]"></span> Digunakan
            </span>
            <span class="inline-flex items-center gap-1.5 font-medium text-[#334155]">
                <span class="w-2.5 h-2.5 rounded-full bg-[#94A3B8]"></span> Istirahat
            </span>
        </div>
    </div>

    @forelse($rooms as $room)
        <div class="bg-white rounded-2xl border border-[#E8F0EC] shadow-xs overflow-hidden">
            
            {{-- Room Header --}}
            <div class="p-5 border-b border-[#F1F5F9] bg-[#FAFCFA] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3.5">
                    <div class="w-11 h-11 rounded-xl bg-[#F0FDF4] border border-[#DCFCE7] text-[#0B6839] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-2xl">
                            {{ $room->slug === 'tgcl' ? 'groups' : ($room->slug === 'rubelin' ? 'school' : 'meeting_room') }}
                        </span>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#0F172A]">{{ $room->name }}</h3>
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B] mt-0.5">
                            <span class="inline-flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">location_on</span>
                                {{ $room->location ?? 'Gedung Perpustakaan' }}
                            </span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span class="inline-flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">group</span>
                                Kapasitas {{ $room->capacity }} Orang
                            </span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span class="font-medium text-[#0B6839]">{{ $room->units->count() }} Unit/Meja</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.reservations', ['search' => $room->name]) }}" class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] bg-white text-xs font-semibold text-[#475569] hover:bg-[#F8FAFC] hover:text-[#0B6839] transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">history</span>
                        Riwayat Reservasi
                    </a>
                </div>
            </div>

            {{-- Room Slots Grid --}}
            <div class="p-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3">
                    @foreach($room->slot_statuses as $slot)
                        @php
                            $slotBg = match($slot['status']) {
                                'available' => 'bg-[#F0FDF4] border-[#BBF7D0] text-[#166534]',
                                'pending'   => 'bg-[#FFFBEB] border-[#FDE68A] text-[#92400E]',
                                'booked'    => 'bg-[#FEF2F2] border-[#FECACA] text-[#991B1B]',
                                'partial'   => 'bg-[#EFF6FF] border-[#BFDBFE] text-[#1E40AF]',
                                'break'     => 'bg-[#F8FAFC] border-[#E2E8F0] text-[#64748B]',
                                default     => 'bg-[#F8FAFC] border-[#E2E8F0] text-[#64748B]',
                            };
                            $badgeBg = match($slot['status']) {
                                'available' => 'bg-[#DCFCE7] text-[#15803D]',
                                'pending'   => 'bg-[#FEF3C7] text-[#B45309]',
                                'booked'    => 'bg-[#FEE2E2] text-[#B91C1C]',
                                'partial'   => 'bg-[#DBEAFE] text-[#1D4ED8]',
                                'break'     => 'bg-[#E2E8F0] text-[#475569]',
                                default     => 'bg-[#E2E8F0] text-[#475569]',
                            };
                        @endphp
                        <div class="rounded-xl border p-3.5 flex flex-col justify-between {{ $slotBg }} transition-all hover:shadow-xs">
                            <div>
                                <div class="flex items-center justify-between gap-1 mb-1.5">
                                    <span class="text-[11px] font-bold">{{ $slot['time'] }}</span>
                                    <span class="text-[9.5px] font-bold px-1.5 py-0.5 rounded-full {{ $badgeBg }}">
                                        {{ $slot['label'] }}
                                    </span>
                                </div>
                                <p class="text-xs font-bold leading-snug line-clamp-1 text-[#0F172A]">{{ $slot['title'] }}</p>
                                <p class="text-[11px] opacity-80 line-clamp-2 mt-0.5">{{ $slot['detail'] }}</p>
                            </div>

                            @if($slot['status'] === 'pending')
                                <div class="mt-3 pt-2 border-t border-[#FDE68A]">
                                    <a href="{{ route('admin.reservations', ['status' => 'pending']) }}" class="text-[11px] font-bold text-[#B45309] hover:underline flex items-center gap-1">
                                        <span>Tinjau di Menu Reservasi</span>
                                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                    </a>
                                </div>
                            @elseif($slot['status'] === 'booked' || $slot['status'] === 'partial')
                                <div class="mt-3 pt-2 border-t border-black/5 flex items-center justify-between text-[10px] opacity-75">
                                    <span>Terkonfirmasi</span>
                                    <span class="material-symbols-outlined text-xs">check_circle</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    @empty
        <div class="bg-white rounded-2xl border border-[#E8F0EC] p-12 text-center shadow-xs">
            <span class="material-symbols-outlined text-5xl text-[#CBD5E1]">meeting_room</span>
            <p class="text-sm font-semibold text-[#64748B] mt-2">Tidak ada ruangan yang ditemukan</p>
            <p class="text-xs text-[#94A3B8] mt-1">Coba ubah filter atau aktifkan ruangan melalui menu Ruangan.</p>
        </div>
    @endforelse
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- DETAILED RESERVATIONS TABLE FOR SELECTED DATE       --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="admin-table-wrap">
    <div class="admin-table-header">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[#0B6839] text-lg">event_note</span>
            <div>
                <h3 class="text-sm font-bold text-[#0F172A]">Daftar Pemesanan pada Tanggal Ini</h3>
                <p class="text-xs text-[#94A3B8]">
                    {{ \Carbon\Carbon::parse($selectedDate)->locale('id')->isoFormat('dddd, D MMMM Y') }} (Total: {{ $reservationsOnDate->count() }} reservasi)
                </p>
            </div>
        </div>
        <a href="{{ route('admin.reservations') }}" class="text-xs font-semibold text-[#0B6839] hover:underline">
            Buka Semua Reservasi →
        </a>
    </div>

    @if($reservationsOnDate->isEmpty())
        <div class="py-12 text-center">
            <span class="material-symbols-outlined text-4xl text-[#CBD5E1]">event_available</span>
            <p class="text-sm font-semibold text-[#64748B] mt-2">Tidak ada reservasi pada tanggal ini</p>
            <p class="text-xs text-[#94A3B8] mt-0.5">Semua slot ruangan kosong dan dapat digunakan pemustaka.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Waktu Sesi</th>
                        <th>Ruangan & Unit</th>
                        <th>Pemohon / Penanggung Jawab</th>
                        <th>Keperluan Acara / Kegiatan</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservationsOnDate as $res)
                        <tr>
                            <td class="whitespace-nowrap">
                                <span class="font-bold text-[#0F172A] text-xs">
                                    {{ \Carbon\Carbon::parse($res->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($res->end_time)->format('H:i') }} WIB
                                </span>
                            </td>
                            <td>
                                <div class="font-semibold text-[#0F172A] text-sm">
                                    {{ $res->roomUnit?->room?->name ?? '—' }}
                                </div>
                                <div class="text-[11px] text-[#64748B]">
                                    Unit: {{ $res->roomUnit?->name ?? 'Semua Unit' }}
                                </div>
                            </td>
                            <td>
                                <div class="font-semibold text-[#0F172A] text-sm">
                                    {{ $res->user?->name ?? $res->organizer ?? '—' }}
                                </div>
                                <div class="text-[11px] text-[#94A3B8]">
                                    {{ $res->user?->email ?? $res->organizer ?? 'Mahasiswa' }}
                                </div>
                            </td>
                            <td>
                                <div class="font-semibold text-[#334155] text-xs">
                                    {{ $res->title }}
                                </div>
                                @if($res->notes)
                                    <div class="text-[11px] text-[#94A3B8] max-w-xs truncate">
                                        {{ $res->notes }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusClass = match($res->status) {
                                        'approved' => 'badge-approved',
                                        'rejected' => 'badge-rejected',
                                        default    => 'badge-pending',
                                    };
                                    $statusLabel = match($res->status) {
                                        'approved' => 'Disetujui',
                                        'rejected' => 'Ditolak',
                                        default    => 'Menunggu Review',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('admin.reservations', ['search' => $res->title]) }}" class="inline-flex items-center gap-1 text-xs font-semibold text-[#0B6839] hover:underline">
                                    <span>Kelola</span>
                                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
