@extends('admin.layout')

@section('title', 'Kelola Ruangan')
@section('page-title', 'Ruangan')
@section('page-subtitle', 'Kelola data ruangan perpustakaan')

@section('content')

@if(session('success'))
    <div class="mb-5 px-4 py-3 rounded-xl bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] text-sm font-medium flex items-center gap-2">
        <span class="material-symbols-outlined text-lg" style="font-variation-settings:'FILL' 1,'wght' 500;">check_circle</span>
        {{ session('success') }}
    </div>
@endif

{{-- Rooms Grid --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
    @foreach($rooms as $room)
        <div class="admin-table-wrap overflow-visible {{ !$room->is_active ? 'opacity-60' : '' }}">
            <div class="p-5 space-y-3">
                {{-- Header --}}
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-11 h-11 rounded-xl bg-[#F0FDF4] border border-[#D1FAE5] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xl text-[#0B6839]" style="font-variation-settings:'FILL' 1,'wght' 500;">{{ $room->icon ?? 'meeting_room' }}</span>
                        </div>
                        <div class="min-w-0">
                            <h3 class="text-sm font-bold text-[#0F172A] truncate">{{ $room->name }}</h3>
                            <p class="text-[11px] text-[#94A3B8]">{{ $room->category }}</p>
                        </div>
                    </div>
                    <span class="badge {{ $room->is_active ? 'badge-approved' : 'badge-rejected' }} shrink-0">
                        {{ $room->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>

                {{-- Details --}}
                <div class="space-y-1.5 text-xs text-[#64748B]">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-[#94A3B8]">location_on</span>
                        {{ $room->location ?? 'Belum diatur' }} · Lantai {{ $room->floor ?? '-' }}
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-[#94A3B8]">groups</span>
                        Kapasitas {{ $room->total_capacity ?? '-' }} orang
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-[#94A3B8]">door_open</span>
                        {{ $room->units_count }} unit tersedia
                    </div>
                    @if($room->requires_letter)
                        <div class="flex items-center gap-2 text-amber-600">
                            <span class="material-symbols-outlined text-sm">description</span>
                            Perlu surat pengajuan
                        </div>
                    @endif
                </div>

                @if($room->description)
                    <p class="text-[11px] text-[#94A3B8] line-clamp-2 leading-relaxed">{{ $room->description }}</p>
                @endif
            </div>

            {{-- Actions --}}
            <div class="px-5 py-3 border-t border-[#F1F5F9] flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-[11px] text-[#94A3B8]">
                        {{ $room->is_reservable ? 'Dapat dipesan' : 'Tidak dapat dipesan' }}
                    </span>
                </div>
                <form method="POST" action="{{ route('admin.rooms.toggle', $room) }}">
                    @csrf @method('PATCH')
                    <button type="submit" class="text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors {{ $room->is_active ? 'text-red-600 hover:bg-red-50 border border-red-200' : 'text-[#0B6839] hover:bg-[#F0FDF4] border border-[#D1FAE5]' }}">
                        {{ $room->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@if($rooms->isEmpty())
    <div class="admin-table-wrap py-16 text-center">
        <span class="material-symbols-outlined text-5xl text-[#CBD5E1]" style="font-variation-settings:'FILL' 1,'wght' 400;">meeting_room</span>
        <p class="text-sm text-[#94A3B8] mt-3">Belum ada data ruangan</p>
    </div>
@endif

@endsection
