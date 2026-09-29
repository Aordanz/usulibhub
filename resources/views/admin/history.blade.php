@extends('admin.layout')

@section('title', 'Histori Reservasi')
@section('page-title', 'Histori Reservasi')
@section('page-subtitle', 'Rekapitulasi dan log seluruh riwayat peminjaman ruangan perpustakaan')

@push('styles')
<style>
    @media print {
        #admin-sidebar, .admin-topbar, .filter-section, .pagination-wrap, .action-btn, footer {
            display: none !important;
        }
        #admin-main { margin-left: 0 !important; width: 100% !important; }
        .admin-content { padding: 0 !important; }
        .admin-table-wrap { border: 1px solid #CBD5E1 !important; box-shadow: none !important; }
        .print-header { display: block !important; }
    }
    .print-header { display: none; }
</style>
@endpush

@section('content')

{{-- Print Header (Only visible on print) --}}
<div class="print-header mb-6 pb-4 border-b-2 border-[#0B6839]">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-[#0B6839]">UPT PERPUSTAKAAN UNIVERSITAS SUMATERA UTARA</h1>
            <p class="text-xs text-[#64748B]">Laporan Rekapitulasi & Histori Reservasi Ruangan</p>
        </div>
        <div class="text-right text-xs text-[#64748B]">
            <p>Dicetak pada: {{ now()->locale('id')->isoFormat('dddd, D MMMM Y - HH:mm') }} WIB</p>
            <p>Oleh Admin: {{ auth()->user()->name }}</p>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- STATS OVERVIEW                                      --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-7">

    {{-- Total Riwayat --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#EEF2FF]">
            <span class="material-symbols-outlined text-2xl text-[#6366F1]" style="font-variation-settings:'FILL' 1,'wght' 600;">history</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Total Seluruh Riwayat</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($totalHistory) }}</p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">Semua permohonan tercatat</p>
        </div>
    </div>

    {{-- Total Disetujui --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#ECFDF5]">
            <span class="material-symbols-outlined text-2xl text-[#059669]" style="font-variation-settings:'FILL' 1,'wght' 600;">check_circle</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Disetujui / Selesai</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($totalApproved) }}</p>
            <p class="text-[11px] text-[#10B981] font-semibold mt-0.5">
                {{ $totalHistory > 0 ? round(($totalApproved / $totalHistory) * 100, 1) : 0 }}% tingkat persetujuan
            </p>
        </div>
    </div>

    {{-- Total Ditolak --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#FEF2F2]">
            <span class="material-symbols-outlined text-2xl text-[#DC2626]" style="font-variation-settings:'FILL' 1,'wght' 600;">cancel</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Permohonan Ditolak</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($totalRejected) }}</p>
            <p class="text-[11px] text-[#DC2626] font-semibold mt-0.5">
                {{ $totalHistory > 0 ? round(($totalRejected / $totalHistory) * 100, 1) : 0 }}% tingkat penolakan
            </p>
        </div>
    </div>

    {{-- Total Partisipan --}}
    <div class="stat-card">
        <div class="stat-icon-wrap bg-[#FFF7ED]">
            <span class="material-symbols-outlined text-2xl text-[#EA580C]" style="font-variation-settings:'FILL' 1,'wght' 600;">groups</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-[#64748B] font-medium">Total Pemustaka Terlayani</p>
            <p class="text-2xl font-extrabold text-[#0F172A] leading-tight">{{ number_format($totalParticipants) }}</p>
            <p class="text-[11px] text-[#94A3B8] mt-0.5">Akumulasi estimasi peserta</p>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- ADVANCED FILTER SECTION                             --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="admin-table-wrap p-5 mb-7 filter-section">
    <div class="flex items-center justify-between mb-4 pb-3 border-b border-[#F1F5F9]">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[#0B6839] text-lg">filter_alt</span>
            <h3 class="text-sm font-bold text-[#0F172A]">Filter & Pencarian Riwayat</h3>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="window.print()" class="px-3 py-1.5 rounded-lg border border-[#CBD5E1] bg-[#F8FAFC] text-xs font-semibold text-[#475569] hover:bg-white hover:text-[#0B6839] transition-colors flex items-center gap-1.5 shadow-2xs">
                <span class="material-symbols-outlined text-sm">print</span>
                Cetak Laporan
            </button>
        </div>
    </div>

    <form method="GET" action="{{ route('admin.history') }}" class="space-y-3">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            
            {{-- Search Keyword --}}
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#94A3B8] text-base">search</span>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari pemohon, NIM, judul..." 
                    class="w-full pl-9 pr-3 py-2 text-xs sm:text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-hidden focus:ring-2 focus:ring-[#0B6839]/20 focus:border-[#0B6839]"
                >
            </div>

            {{-- Room Filter --}}
            <div class="relative">
                <select name="room_id" class="w-full px-3 py-2 text-xs sm:text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-hidden focus:ring-2 focus:ring-[#0B6839]/20 focus:border-[#0B6839] cursor-pointer">
                    <option value="">Semua Ruangan</option>
                    @foreach($allRooms as $room)
                        <option value="{{ $room->id }}" {{ request('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Status Filter --}}
            <div class="relative">
                <select name="status" class="w-full px-3 py-2 text-xs sm:text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-hidden focus:ring-2 focus:ring-[#0B6839]/20 focus:border-[#0B6839] cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui (Approved)</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak (Rejected)</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu Review</option>
                </select>
            </div>

            {{-- Date Range (Start Date) --}}
            <div class="flex items-center gap-2">
                <input 
                    type="date" 
                    name="start_date" 
                    value="{{ request('start_date') }}" 
                    class="w-1/2 px-2.5 py-2 text-xs border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-hidden"
                    title="Dari Tanggal"
                >
                <span class="text-xs text-[#94A3B8]">s/d</span>
                <input 
                    type="date" 
                    name="end_date" 
                    value="{{ request('end_date') }}" 
                    class="w-1/2 px-2.5 py-2 text-xs border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-hidden"
                    title="Sampai Tanggal"
                >
            </div>
        </div>

        <div class="flex items-center justify-between pt-2">
            <div class="text-xs text-[#64748B]">
                Menampilkan <strong class="text-[#0F172A]">{{ $history->total() }}</strong> rekaman data histori.
            </div>
            <div class="flex items-center gap-2">
                @if(request()->hasAny(['search', 'room_id', 'status', 'start_date', 'end_date']))
                    <a href="{{ route('admin.history') }}" class="px-3 py-1.5 text-xs font-semibold text-[#64748B] hover:text-red-500 transition-colors">
                        Reset Filter
                    </a>
                @endif
                <button type="submit" class="px-4 py-2 bg-[#0B6839] text-white text-xs font-bold rounded-xl hover:bg-[#074324] transition-colors flex items-center gap-1.5 shadow-xs">
                    <span class="material-symbols-outlined text-sm">search</span>
                    Cari & Filter
                </button>
            </div>
        </div>
    </form>
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- DATA TABLE                                          --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div class="admin-table-wrap">
    <div class="admin-table-header">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[#0B6839] text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">manage_history</span>
            <h3 class="text-sm font-bold text-[#0F172A]">Tabel Histori Peminjaman</h3>
        </div>
        <span class="text-xs text-[#94A3B8]">Halaman {{ $history->currentPage() }} dari {{ $history->lastPage() }}</span>
    </div>

    @if($history->isEmpty())
        <div class="py-16 text-center">
            <span class="material-symbols-outlined text-5xl text-[#CBD5E1]">manage_history</span>
            <p class="text-sm font-semibold text-[#64748B] mt-3">Tidak ada data histori yang cocok</p>
            <p class="text-xs text-[#94A3B8] mt-1">Coba ubah kata kunci atau kriteria pencarian filter di atas.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID & Waktu Pelaksanaan</th>
                        <th>Pemohon & Organisasi</th>
                        <th>Ruangan & Unit</th>
                        <th>Kegiatan & Peserta</th>
                        <th>Status & Audit Peninjau</th>
                        <th class="text-right action-btn">Rincian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $item)
                        @php
                            $isPast = $item->reservation_date && $item->reservation_date->isPast();
                            $statusClass = match($item->status) {
                                'approved' => 'badge-approved',
                                'rejected' => 'badge-rejected',
                                default    => 'badge-pending',
                            };
                            $statusLabel = match($item->status) {
                                'approved' => 'Disetujui',
                                'rejected' => 'Ditolak',
                                default    => 'Menunggu',
                            };
                        @endphp
                        <tr>
                            {{-- ID & Waktu --}}
                            <td class="whitespace-nowrap">
                                <span class="text-[11px] font-mono font-bold text-[#64748B] bg-[#F1F5F9] px-2 py-0.5 rounded">
                                    #RSV-{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}
                                </span>
                                <div class="font-bold text-[#0F172A] text-xs mt-1.5">
                                    {{ $item->reservation_date?->format('d M Y') ?? '—' }}
                                </div>
                                <div class="text-[11px] text-[#64748B]">
                                    {{ $item->start_time?->format('H:i') }} - {{ $item->end_time?->format('H:i') }} WIB
                                </div>
                                <span class="inline-block mt-1 text-[9.5px] px-1.5 py-0.2 rounded font-medium {{ $isPast ? 'bg-[#F1F5F9] text-[#64748B]' : 'bg-[#ECFDF5] text-[#059669]' }}">
                                    {{ $isPast ? 'Selesai' : 'Mendatang' }}
                                </span>
                            </td>

                            {{-- Pemohon --}}
                            <td>
                                <div class="flex items-start gap-2.5">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#0B6839] to-[#074324] flex items-center justify-center text-white text-[11px] font-bold shrink-0 mt-0.5">
                                        {{ strtoupper(substr($item->user?->name ?? $item->organizer ?? 'U', 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-semibold text-[#0F172A] text-sm truncate max-w-[150px]">
                                            {{ $item->user?->name ?? $item->organizer ?? '—' }}
                                        </p>
                                        <p class="text-[11px] text-[#64748B]">
                                            {{ $item->user?->nim_nip ?? 'NIM/NIP: —' }}
                                        </p>
                                        <p class="text-[10.5px] text-[#94A3B8] truncate max-w-[140px]">
                                            {{ $item->organizer ?? $item->user?->fakultas ?? 'Civitas USU' }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- Ruangan --}}
                            <td>
                                <div class="font-semibold text-[#0F172A] text-[13px]">
                                    {{ $item->roomUnit?->room?->name ?? '—' }}
                                </div>
                                <div class="text-[11px] text-[#64748B]">
                                    Unit: {{ $item->roomUnit?->name ?? 'Semua Unit' }}
                                </div>
                                <div class="text-[10.5px] text-[#94A3B8]">
                                    {{ $item->roomUnit?->room?->location ?? 'Lantai 1' }}
                                </div>
                            </td>

                            {{-- Kegiatan & Peserta --}}
                            <td>
                                <p class="text-xs font-bold text-[#334155] line-clamp-1 max-w-[200px]" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </p>
                                <div class="flex items-center gap-2 text-[11px] text-[#64748B] mt-0.5">
                                    <span class="inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-xs text-[#94A3B8]">group</span>
                                        {{ $item->participant_count ?? 1 }} Orang
                                    </span>
                                    @if($item->letter_file)
                                        <span class="text-[#CBD5E1]">•</span>
                                        <span class="text-[10px] text-[#0B6839] font-semibold bg-[#F0FDF4] px-1.5 rounded border border-[#DCFCE7]">Ada Surat</span>
                                    @endif
                                </div>
                                @if($item->notes)
                                    <p class="text-[10.5px] text-[#94A3B8] line-clamp-1 mt-0.5 italic max-w-[200px]">
                                        "{{ $item->notes }}"
                                    </p>
                                @endif
                            </td>

                            {{-- Status & Peninjau --}}
                            <td>
                                <span class="badge {{ $statusClass }} mb-1">{{ $statusLabel }}</span>
                                @if($item->reviewer)
                                    <div class="text-[10.5px] text-[#64748B]">
                                        <span>Oleh: <strong>{{ $item->reviewer->name }}</strong></span>
                                    </div>
                                    <div class="text-[10px] text-[#94A3B8]">
                                        {{ $item->reviewed_at?->format('d M Y, H:i') }} WIB
                                    </div>
                                @elseif($item->status !== 'pending')
                                    <div class="text-[10.5px] text-[#94A3B8]">Oleh Sistem</div>
                                @endif

                                @if($item->status === 'rejected' && $item->rejection_reason)
                                    <div class="mt-1 text-[10px] text-red-600 bg-red-50 p-1.5 rounded border border-red-100 max-w-[170px] line-clamp-2" title="{{ $item->rejection_reason }}">
                                        <strong>Alasan:</strong> {{ $item->rejection_reason }}
                                    </div>
                                @endif
                            </td>

                            {{-- Action --}}
                            <td class="text-right action-btn whitespace-nowrap">
                                <button 
                                    type="button" 
                                    data-item="{{ json_encode([
                                        'id' => $item->id,
                                        'code' => 'RSV-' . str_pad($item->id, 4, '0', STR_PAD_LEFT),
                                        'title' => $item->title,
                                        'user_name' => $item->user?->name ?? $item->organizer ?? '—',
                                        'user_email' => $item->user?->email ?? '—',
                                        'user_nim' => $item->user?->nim_nip ?? '—',
                                        'organizer' => $item->organizer ?? 'Civitas USU',
                                        'room_name' => $item->roomUnit?->room?->name ?? '—',
                                        'unit_name' => $item->roomUnit?->name ?? '—',
                                        'location' => $item->roomUnit?->room?->location ?? '—',
                                        'date' => $item->reservation_date ? $item->reservation_date->locale('id')->isoFormat('dddd, D MMMM Y') : '—',
                                        'time' => ($item->start_time ? $item->start_time->format('H:i') : '—') . ' - ' . ($item->end_time ? $item->end_time->format('H:i') : '—') . ' WIB',
                                        'participant_count' => $item->participant_count ?? 1,
                                        'notes' => $item->notes ?? 'Tidak ada catatan khusus.',
                                        'status' => $item->status,
                                        'status_label' => $statusLabel,
                                        'reviewer_name' => $item->reviewer?->name ?? '—',
                                        'reviewed_at' => $item->reviewed_at ? $item->reviewed_at->format('d M Y, H:i') . ' WIB' : '—',
                                        'rejection_reason' => $item->rejection_reason ?? null,
                                        'created_at' => $item->created_at ? $item->created_at->format('d M Y, H:i') . ' WIB' : '—'
                                    ]) }}"
                                    onclick="openDetailModalFromEl(this)"
                                    class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] bg-white text-xs font-semibold text-[#0B6839] hover:bg-[#F0FDF4] hover:border-[#BBF7D0] transition-colors inline-flex items-center gap-1 shadow-2xs"
                                >
                                    <span class="material-symbols-outlined text-sm">visibility</span>
                                    <span>Detail</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($history->hasPages())
            <div class="p-4 border-t border-[#F1F5F9] pagination-wrap">
                {{ $history->links('pagination::tailwind') }}
            </div>
        @endif
    @endif
</div>

{{-- ═══════════════════════════════════════════════════ --}}
{{-- DETAIL MODAL                                        --}}
{{-- ═══════════════════════════════════════════════════ --}}
<div id="detail-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/50 backdrop-blur-xs p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto">
        {{-- Modal Header --}}
        <div class="p-5 border-b border-[#F1F5F9] bg-[#FAFCFA] flex items-center justify-between sticky top-0 bg-white/95 backdrop-blur-xs z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] border border-[#DCFCE7] text-[#0B6839] flex items-center justify-center">
                    <span class="material-symbols-outlined text-xl">receipt_long</span>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#0F172A]" id="m-title">Detail Reservasi</h3>
                    <p class="text-[11px] font-mono font-bold text-[#64748B]" id="m-code">#RSV-0000</p>
                </div>
            </div>
            <button type="button" onclick="closeDetailModal()" class="w-8 h-8 rounded-lg text-[#94A3B8] hover:text-[#0F172A] hover:bg-[#F1F5F9] flex items-center justify-center transition-colors">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>

        {{-- Modal Body --}}
        <div class="p-6 space-y-5 text-xs sm:text-sm">
            
            {{-- Status Banner --}}
            <div id="m-status-wrap" class="p-3.5 rounded-xl border flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-[#64748B] font-medium">Status Permohonan</p>
                    <p class="text-sm font-bold" id="m-status-text">Disetujui</p>
                </div>
                <div class="text-right text-[11px] text-[#64748B]">
                    <p>Diajukan pada:</p>
                    <p class="font-semibold text-[#0F172A]" id="m-created-at">—</p>
                </div>
            </div>

            {{-- Rejection Reason Alert if rejected --}}
            <div id="m-rejection-wrap" class="hidden p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-800">
                <p class="font-bold flex items-center gap-1.5 text-xs text-red-700">
                    <span class="material-symbols-outlined text-sm">error</span>
                    Alasan Penolakan:
                </p>
                <p class="mt-1 text-xs" id="m-rejection-reason">—</p>
            </div>

            {{-- Pemohon & Organisasi --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0]">
                <div>
                    <span class="text-[11px] text-[#94A3B8] uppercase font-bold tracking-wider">Pemohon / Pengaju</span>
                    <p class="font-bold text-[#0F172A] text-sm mt-0.5" id="m-user-name">—</p>
                    <p class="text-xs text-[#64748B]" id="m-user-nim">NIM: —</p>
                    <p class="text-xs text-[#64748B]" id="m-user-email">email@usu.ac.id</p>
                </div>
                <div>
                    <span class="text-[11px] text-[#94A3B8] uppercase font-bold tracking-wider">Organisasi / Instansi</span>
                    <p class="font-bold text-[#0F172A] text-sm mt-0.5" id="m-organizer">—</p>
                    <p class="text-xs text-[#64748B] mt-1">Estimasi Peserta: <strong id="m-participant-count" class="text-[#0F172A]">0</strong> Orang</p>
                </div>
            </div>

            {{-- Ruangan & Jadwal --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0]">
                <div>
                    <span class="text-[11px] text-[#94A3B8] uppercase font-bold tracking-wider">Ruangan & Unit</span>
                    <p class="font-bold text-[#0B6839] text-sm mt-0.5" id="m-room-name">—</p>
                    <p class="text-xs text-[#64748B]" id="m-unit-name">Unit: —</p>
                    <p class="text-xs text-[#94A3B8]" id="m-location">Lantai 1</p>
                </div>
                <div>
                    <span class="text-[11px] text-[#94A3B8] uppercase font-bold tracking-wider">Jadwal Pelaksanaan</span>
                    <p class="font-bold text-[#0F172A] text-xs sm:text-sm mt-0.5" id="m-date">—</p>
                    <p class="text-xs font-semibold text-[#0B6839] mt-0.5" id="m-time">— WIB</p>
                </div>
            </div>

            {{-- Deskripsi / Catatan --}}
            <div>
                <span class="text-[11px] text-[#94A3B8] uppercase font-bold tracking-wider">Catatan / Kebutuhan Acara</span>
                <div class="mt-1.5 p-3.5 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-xs text-[#334155] leading-relaxed" id="m-notes">
                    —
                </div>
            </div>

            {{-- Audit Peninjau --}}
            <div class="pt-3 border-t border-[#F1F5F9] flex items-center justify-between text-xs text-[#64748B]">
                <div>
                    <span>Ditinjau oleh: <strong class="text-[#0F172A]" id="m-reviewer-name">—</strong></span>
                </div>
                <div>
                    <span>Waktu Tinjau: <strong class="text-[#0F172A]" id="m-reviewed-at">—</strong></span>
                </div>
            </div>
        </div>

        {{-- Modal Footer --}}
        <div class="p-4 bg-[#F8FAFC] border-t border-[#F1F5F9] flex justify-end gap-2">
            <button type="button" onclick="closeDetailModal()" class="px-4 py-2 text-xs font-semibold text-[#64748B] border border-[#E2E8F0] rounded-xl hover:bg-white transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openDetailModalFromEl(el) {
        try {
            const data = JSON.parse(el.getAttribute('data-item'));
            openDetailModal(data);
        } catch (e) {
            console.error('Error parsing reservation data', e);
        }
    }

    function openDetailModal(data) {
        document.getElementById('detail-modal').style.display = 'flex';
        document.getElementById('m-title').textContent = data.title;
        document.getElementById('m-code').textContent = '#' + data.code;
        document.getElementById('m-user-name').textContent = data.user_name;
        document.getElementById('m-user-nim').textContent = 'NIM/NIP: ' + data.user_nim;
        document.getElementById('m-user-email').textContent = data.user_email;
        document.getElementById('m-organizer').textContent = data.organizer;
        document.getElementById('m-participant-count').textContent = data.participant_count;
        document.getElementById('m-room-name').textContent = data.room_name;
        document.getElementById('m-unit-name').textContent = 'Unit: ' + data.unit_name;
        document.getElementById('m-location').textContent = data.location;
        document.getElementById('m-date').textContent = data.date;
        document.getElementById('m-time').textContent = data.time;
        document.getElementById('m-notes').textContent = data.notes;
        document.getElementById('m-created-at').textContent = data.created_at;
        document.getElementById('m-reviewer-name').textContent = data.reviewer_name;
        document.getElementById('m-reviewed-at').textContent = data.reviewed_at;

        // Status banner styling
        const statusWrap = document.getElementById('m-status-wrap');
        const statusText = document.getElementById('m-status-text');
        statusText.textContent = data.status_label;

        if (data.status === 'approved') {
            statusWrap.className = 'p-3.5 rounded-xl border bg-[#ECFDF5] border-[#A7F3D0] text-[#065F46] flex items-center justify-between';
        } else if (data.status === 'rejected') {
            statusWrap.className = 'p-3.5 rounded-xl border bg-[#FEF2F2] border-[#FECACA] text-[#991B1B] flex items-center justify-between';
        } else {
            statusWrap.className = 'p-3.5 rounded-xl border bg-[#FFFBEB] border-[#FDE68A] text-[#92400E] flex items-center justify-between';
        }

        // Rejection reason
        const rejWrap = document.getElementById('m-rejection-wrap');
        if (data.status === 'rejected' && data.rejection_reason) {
            rejWrap.classList.remove('hidden');
            document.getElementById('m-rejection-reason').textContent = data.rejection_reason;
        } else {
            rejWrap.classList.add('hidden');
        }
    }

    function closeDetailModal() {
        document.getElementById('detail-modal').style.display = 'none';
    }

    document.getElementById('detail-modal').addEventListener('click', function(e) {
        if (e.target === this) closeDetailModal();
    });
</script>
@endpush
