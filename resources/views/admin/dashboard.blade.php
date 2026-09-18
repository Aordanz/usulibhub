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

    {{-- Pesan Masuk --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#FFF1F2]">
            <span class="material-symbols-outlined text-2xl text-[#E11D48]" style="font-variation-settings:'FILL' 1,'wght' 600;">mark_email_unread</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Pesan Belum Dibalas</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($stats['unread_messages']) }}</p>
            <p class="text-[11px] {{ $stats['unread_messages'] > 0 ? 'text-red-500 font-semibold' : 'text-[#94A3B8]' }} mt-0.5">
                {{ $stats['unread_messages'] > 0 ? 'Perlu perhatian' : 'Semua sudah dibalas' }}
            </p>
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
            <p class="text-xs text-white/60 font-medium">Berita Terpublikasi</p>
            <p class="text-3xl font-extrabold mt-1">{{ $stats['total_news'] }}</p>
            <p class="text-[11px] text-white/50 mt-0.5">Artikel aktif</p>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-white/10 border border-white/15 flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl text-[#93C5FD]" style="font-variation-settings:'FILL' 1,'wght' 600;">newspaper</span>
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
            <a href="#" class="text-xs font-semibold text-[#0B6839] hover:underline">Lihat Semua →</a>
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
            <a href="#" class="text-xs font-semibold text-[#0B6839] hover:underline">Lihat Semua →</a>
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
        <div class="grid grid-cols-2 gap-3">
            <a href="#" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#0B6839]" style="font-variation-settings:'FILL' 1,'wght' 500;">add_home_work</span>
                <span class="text-xs font-semibold">Tambah Ruangan</span>
            </a>
            <a href="#" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#6366F1]" style="font-variation-settings:'FILL' 1,'wght' 500;">edit_note</span>
                <span class="text-xs font-semibold">Tambah Berita</span>
            </a>
            <a href="#" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#EA580C]" style="font-variation-settings:'FILL' 1,'wght' 500;">pending_actions</span>
                <span class="text-xs font-semibold">Tinjau Reservasi</span>
            </a>
            <a href="#" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#E11D48]" style="font-variation-settings:'FILL' 1,'wght' 500;">mark_email_read</span>
                <span class="text-xs font-semibold">Balas Pesan</span>
            </a>
            <a href="#" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#0EA5E9]" style="font-variation-settings:'FILL' 1,'wght' 500;">person_add</span>
                <span class="text-xs font-semibold">Tambah User</span>
            </a>
            <a href="{{ route('beranda') }}" target="_blank" class="quick-action-btn">
                <span class="material-symbols-outlined text-2xl text-[#64748B]" style="font-variation-settings:'FILL' 1,'wght' 500;">open_in_new</span>
                <span class="text-xs font-semibold">Lihat Situs</span>
            </a>
        </div>
    </div>

    {{-- Pesan Masuk Terbaru --}}
    <div class="admin-table-wrap xl:col-span-2">
        <div class="admin-table-header">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[#E11D48] text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">forum</span>
                <h3 class="text-sm font-bold text-[#0F172A]">Pesan Masuk Terbaru</h3>
            </div>
            <a href="#" class="text-xs font-semibold text-[#0B6839] hover:underline">Lihat Semua →</a>
        </div>

        @if($latestMessages->isEmpty())
            <div class="py-12 text-center">
                <span class="material-symbols-outlined text-4xl text-[#CBD5E1]" style="font-variation-settings:'FILL' 1,'wght' 400;">mark_email_read</span>
                <p class="text-sm text-[#94A3B8] mt-2">Tidak ada pesan masuk</p>
            </div>
        @else
            <div class="divide-y divide-[#F1F5F9]">
                @foreach($latestMessages as $message)
                    <div class="px-5 py-3.5 flex items-start gap-3 hover:bg-[#FAFFFE] transition-colors">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#E11D48] to-[#9F1239] flex items-center justify-center text-white text-[11px] font-bold shrink-0">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <p class="text-sm font-semibold text-[#0F172A] truncate">{{ $message->name }}</p>
                                <p class="text-[11px] text-[#94A3B8] whitespace-nowrap shrink-0">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                            <p class="text-xs text-[#64748B] truncate">{{ $message->subject }}</p>
                            <p class="text-[11px] text-[#94A3B8] truncate">{{ Str::limit($message->message, 60) }}</p>
                        </div>
                        @if($message->status === 'pending')
                            <span class="badge badge-pending shrink-0">Baru</span>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
