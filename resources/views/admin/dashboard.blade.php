@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas & statistik perpustakaan hari ini')

@section('content')

{{-- ═══════════════════════════════════════════════════ --}}
{{-- STATS CARDS                                         --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-7">

    {{-- Total Pengguna --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#EEF2FF]">
            <span class="material-symbols-outlined text-2xl text-[#6366F1]" style="font-variation-settings:'FILL' 1,'wght' 600;">group</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Total Pengguna</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($stats['total_users']) }}</p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">Mahasiswa terdaftar</p>
        </div>
    </div>

    {{-- Ruangan Aktif --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#F0FDF4]">
            <span class="material-symbols-outlined text-2xl text-[#0B6839]" style="font-variation-settings:'FILL' 1,'wght' 600;">meeting_room</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Ruangan Aktif</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($stats['total_rooms']) }}</p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">Ruangan dapat dipesan</p>
        </div>
    </div>

    {{-- Reservasi Hari Ini --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#FFF7ED]">
            <span class="material-symbols-outlined text-2xl text-[#EA580C]" style="font-variation-settings:'FILL' 1,'wght' 600;">event_available</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Reservasi Hari Ini</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($stats['reservations_today']) }}</p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">{{ now()->format('d M Y') }}</p>
        </div>
    </div>

    {{-- Total Histori Reservasi --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#F0FDF4]">
            <span class="material-symbols-outlined text-2xl text-[#059669]" style="font-variation-settings:'FILL' 1,'wght' 600;">history</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Total Seluruh Reservasi</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($stats['total_history']) }}</p>
            <p class="text-[11px] text-[#059669] font-semibold mt-0.5">Histori tercatat</p>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- SECONDARY STATS                                      --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
    <div class="bg-gradient-to-r from-[#022513] to-[#074324] rounded-2xl p-5 flex items-center justify-between text-white border border-[#0B6839]/40">
        <div>
            <p class="text-xs text-white/60 font-medium">Reservasi Menunggu Persetujuan</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['pending_reservations'] }}</p>
            <p class="text-[11px] text-white/50 mt-0.5">Perlu ditinjau segera</p>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-white/10 border border-white/15 flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl text-[#F6AE01]" style="font-variation-settings:'FILL' 1,'wght' 600;">pending_actions</span>
        </div>
    </div>

    <div class="bg-gradient-to-r from-[#1E3A5F] to-[#1E40AF] rounded-2xl p-5 flex items-center justify-between text-white border border-blue-700/40">
        <div>
            <p class="text-xs text-white/60 font-medium">Reservasi Disetujui</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['confirmed_reservations'] }}</p>
            <p class="text-[11px] text-white/50 mt-0.5">Siap digunakan</p>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-white/10 border border-white/15 flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl text-[#93C5FD]" style="font-variation-settings:'FILL' 1,'wght' 600;">check_circle</span>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- TABLES ROW                                          --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-7">

    {{-- ── Reservasi Terbaru ── --}}
    <div class="admin-table-wrap">
        <div class="admin-table-header">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[#0B6839] text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">event_available</span>
                <h3 class="text-sm font-bold text-[#0F172A]">Reservasi Terbaru</h3>
            </div>
            <a href="{{ route('admin.reservations') }}" class="text-xs font-semibold text-[#0B6839] hover:underline">Lihat Semua →</a>
        </div>

        @if($latestReservations->isEmpty())
            <div class="py-12 text-center">
                <span class="material-symbols-outlined text-4xl text-[#CBD5E1]" style="font-variation-settings:'FILL' 1,'wght' 400;">event_busy</span>
                <p class="text-sm text-[#94A3B8] mt-2">Belum ada reservasi</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Pemohon</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestReservations as $reservation)
                            <tr>
                                <td>
                                    <div class="font-semibold text-[#0F172A] text-sm truncate max-w-[120px]">
                                        {{ $reservation->user?->name ?? $reservation->organizer ?? '—' }}
                                    </div>
                                    <div class="text-[11px] text-[#94A3B8]">{{ $reservation->title }}</div>
                                </td>
                                <td>
                                    <span class="text-[13px] text-[#334155]">
                                        {{ $reservation->roomUnit?->room?->name ?? '—' }}
                                    </span>
                                </td>
                                <td class="text-[13px] text-[#64748B] whitespace-nowrap">
                                    {{ $reservation->reservation_date?->format('d M Y') ?? '—' }}
                                </td>
                                <td>
                                    @php
                                        $statusClass = match($reservation->status) {
                                            'approved' => 'badge-approved',
                                            'rejected' => 'badge-rejected',
                                            default    => 'badge-pending',
                                        };
                                        $statusLabel = match($reservation->status) {
                                            'approved' => 'Disetujui',
                                            'rejected' => 'Ditolak',
                                            default    => 'Menunggu',
                                        };
                                    @endphp
                                    <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- ── Pengguna Terbaru ── --}}
    <div class="admin-table-wrap">
        <div class="admin-table-header">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[#6366F1] text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">person_add</span>
                <h3 class="text-sm font-bold text-[#0F172A]">Pengguna Terbaru</h3>
            </div>
            <a href="{{ route('admin.users') }}" class="text-xs font-semibold text-[#0B6839] hover:underline">Lihat Semua →</a>
        </div>

        @if($latestUsers->isEmpty())
            <div class="py-12 text-center">
                <span class="material-symbols-outlined text-4xl text-[#CBD5E1]" style="font-variation-settings:'FILL' 1,'wght' 400;">person_off</span>
                <p class="text-sm text-[#94A3B8] mt-2">Belum ada pengguna</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Fakultas</th>
                            <th>Bergabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestUsers as $user)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#0B6839] to-[#074324] flex items-center justify-center text-white text-[11px] font-bold shrink-0">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div class="font-semibold text-[#0F172A] text-sm truncate max-w-[100px]">{{ $user->name }}</div>
                                    </div>
                                </td>
                                <td class="text-[13px] text-[#64748B]">{{ $user->nim_nip ?? '—' }}</td>
                                <td class="text-[13px] text-[#64748B]">{{ $user->fakultas ?? '—' }}</td>
                                <td class="text-[12px] text-[#94A3B8] whitespace-nowrap">{{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- QUICK ACTIONS + RECENT MESSAGES                     --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Quick Actions --}}
    <div class="admin-table-wrap p-5">
        <h3 class="text-sm font-bold text-[#0F172A] mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-[#F6AE01] text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">bolt</span>
            Aksi Cepat
        </h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3">
            <a href="{{ route('admin.rooms') }}" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#0B6839]" style="font-variation-settings:'FILL' 1,'wght' 500;">add_home_work</span>
                <span class="text-xs font-semibold">Kelola Ruangan</span>
            </a>
            <a href="{{ route('admin.schedule') }}" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#6366F1]" style="font-variation-settings:'FILL' 1,'wght' 500;">calendar_month</span>
                <span class="text-xs font-semibold">Jadwal Ruangan</span>
            </a>
            <a href="{{ route('admin.reservations', ['status' => 'pending']) }}" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#EA580C]" style="font-variation-settings:'FILL' 1,'wght' 500;">pending_actions</span>
                <span class="text-xs font-semibold">Tinjau Reservasi</span>
            </a>
            <a href="{{ route('admin.history') }}" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#059669]" style="font-variation-settings:'FILL' 1,'wght' 500;">history</span>
                <span class="text-xs font-semibold">Histori Reservasi</span>
            </a>
            <a href="{{ route('admin.users') }}" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#0EA5E9]" style="font-variation-settings:'FILL' 1,'wght' 500;">group</span>
                <span class="text-xs font-semibold">Kelola Pengguna</span>
            </a>
        </div>
    </div>
</div>

@endsection
