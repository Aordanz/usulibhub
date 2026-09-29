@extends('admin.layout')

@section('title', 'Kelola Reservasi')
@section('page-title', 'Reservasi')
@section('page-subtitle', 'Kelola dan tinjau permohonan reservasi ruangan')

@section('content')

@if(session('success'))
    <div class="mb-5 px-4 py-3 rounded-xl bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] text-sm font-medium flex items-center gap-2">
        <span class="material-symbols-outlined text-lg" style="font-variation-settings:'FILL' 1,'wght' 500;">check_circle</span>
        {{ session('success') }}
    </div>
@endif

{{-- Filter & Search --}}
<div class="admin-table-wrap mb-6">
    <form method="GET" action="{{ route('admin.reservations') }}" class="p-4 flex flex-col sm:flex-row gap-3">
        <div class="flex-1 relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#94A3B8] text-lg">search</span>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul kegiatan atau nama pemohon..."
                   class="w-full pl-10 pr-4 py-2.5 text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-none focus:ring-2 focus:ring-[#0B6839]/20 focus:border-[#0B6839]">
        </div>
        <select name="status" class="px-4 py-2.5 text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-none focus:ring-2 focus:ring-[#0B6839]/20">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-[#0B6839] rounded-xl hover:bg-[#095C30] transition-colors">
            Filter
        </button>
        @if(request()->hasAny(['search', 'status']))
            <a href="{{ route('admin.reservations') }}" class="px-4 py-2.5 text-sm font-semibold text-[#64748B] border border-[#E2E8F0] rounded-xl hover:bg-[#F1F5F9] transition-colors text-center">
                Reset
            </a>
        @endif
    </form>
</div>

{{-- Reservations Table --}}
<div class="admin-table-wrap">
    <div class="admin-table-header">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[#0B6839] text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">event_available</span>
            <h3 class="text-sm font-bold text-[#0F172A]">Daftar Reservasi</h3>
            <span class="text-xs text-[#94A3B8]">({{ $reservations->total() }} total)</span>
        </div>
    </div>

    @if($reservations->isEmpty())
        <div class="py-16 text-center">
            <span class="material-symbols-outlined text-5xl text-[#CBD5E1]" style="font-variation-settings:'FILL' 1,'wght' 400;">event_busy</span>
            <p class="text-sm text-[#94A3B8] mt-3">Tidak ada reservasi ditemukan</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Pemohon</th>
                        <th>Kegiatan</th>
                        <th>Ruangan</th>
                        <th>Tanggal & Waktu</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>
                                <div class="min-w-0">
                                    <p class="font-semibold text-[#0F172A] text-sm truncate max-w-[130px]">
                                        {{ $reservation->user?->name ?? $reservation->organizer ?? '—' }}
                                    </p>
                                    <p class="text-[11px] text-[#94A3B8]">{{ $reservation->user?->nim_nip ?? '' }}</p>
                                </div>
                            </td>
                            <td>
                                <p class="text-[13px] text-[#334155] font-medium truncate max-w-[160px]">{{ $reservation->title }}</p>
                                @if($reservation->participant_count)
                                    <p class="text-[11px] text-[#94A3B8]">{{ $reservation->participant_count }} peserta</p>
                                @endif
                            </td>
                            <td>
                                <p class="text-[13px] text-[#334155]">{{ $reservation->roomUnit?->room?->name ?? '—' }}</p>
                                <p class="text-[11px] text-[#94A3B8]">{{ $reservation->roomUnit?->name ?? '' }}</p>
                            </td>
                            <td class="whitespace-nowrap">
                                <p class="text-[13px] text-[#334155]">{{ $reservation->reservation_date?->format('d M Y') }}</p>
                                <p class="text-[11px] text-[#94A3B8]">
                                    {{ $reservation->start_time?->format('H:i') }} - {{ $reservation->end_time?->format('H:i') }}
                                </p>
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
                            <td class="text-right">
                                @if($reservation->status === 'pending')
                                    <div class="flex items-center justify-end gap-1.5">
                                        {{-- Approve --}}
                                        <form method="POST" action="{{ route('admin.reservations.approve', $reservation) }}" onsubmit="return confirm('Setujui reservasi ini?')">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="w-8 h-8 rounded-lg bg-[#D1FAE5] hover:bg-[#A7F3D0] text-[#065F46] flex items-center justify-center transition-colors" title="Setujui">
                                                <span class="material-symbols-outlined text-lg">check</span>
                                            </button>
                                        </form>

                                        {{-- Reject --}}
                                        <button type="button" onclick="openRejectModal({{ $reservation->id }}, '{{ addslashes($reservation->title) }}')"
                                                class="w-8 h-8 rounded-lg bg-[#FEE2E2] hover:bg-[#FECACA] text-[#991B1B] flex items-center justify-center transition-colors" title="Tolak">
                                            <span class="material-symbols-outlined text-lg">close</span>
                                        </button>
                                    </div>
                                @else
                                    <span class="text-[11px] text-[#94A3B8]">
                                        @if($reservation->reviewed_at)
                                            {{ $reservation->reviewed_at->format('d M Y') }}
                                        @else
                                            —
                                        @endif
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($reservations->hasPages())
            <div class="p-4 border-t border-[#F1F5F9]">
                {{ $reservations->links('pagination::tailwind') }}
            </div>
        @endif
    @endif
</div>

{{-- Reject Modal --}}
<div id="reject-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 overflow-hidden">
        <div class="px-6 py-4 bg-[#FFF1F2] border-b border-[#FECACA]">
            <h3 class="text-sm font-bold text-[#991B1B] flex items-center gap-2">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">block</span>
                Tolak Reservasi
            </h3>
            <p class="text-xs text-[#991B1B]/70 mt-0.5" id="reject-modal-title"></p>
        </div>
        <form id="reject-form" method="POST">
            @csrf @method('PATCH')
            <div class="p-6">
                <label for="rejection_reason" class="block text-sm font-semibold text-[#0F172A] mb-2">Alasan Penolakan <span class="text-red-500">*</span></label>
                <textarea name="rejection_reason" id="rejection_reason" rows="3" required
                          class="w-full px-4 py-3 text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-none focus:ring-2 focus:ring-red-200 focus:border-red-400 resize-none"
                          placeholder="Tuliskan alasan penolakan reservasi ini..."></textarea>
            </div>
            <div class="px-6 py-4 bg-[#F8FAFC] border-t border-[#F1F5F9] flex justify-end gap-3">
                <button type="button" onclick="closeRejectModal()" class="px-4 py-2 text-sm font-semibold text-[#64748B] border border-[#E2E8F0] rounded-xl hover:bg-[#F1F5F9]">Batal</button>
                <button type="submit" class="px-5 py-2 text-sm font-semibold text-white bg-[#E11D48] rounded-xl hover:bg-[#BE123C]">Tolak Reservasi</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openRejectModal(id, title) {
        document.getElementById('reject-modal').style.display = 'flex';
        document.getElementById('reject-modal-title').textContent = title;
        document.getElementById('reject-form').action = '/admin/reservations/' + id + '/reject';
        document.getElementById('rejection_reason').value = '';
    }
    function closeRejectModal() {
        document.getElementById('reject-modal').style.display = 'none';
    }
    document.getElementById('reject-modal').addEventListener('click', function(e) {
        if (e.target === this) closeRejectModal();
    });
</script>
@endpush
