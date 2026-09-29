@extends('admin.layout')

@section('title', 'Kelola Pengguna')
@section('page-title', 'Pengguna')
@section('page-subtitle', 'Kelola data pengguna perpustakaan')

@section('content')

{{-- Flash Messages --}}
@if(session('success'))
    <div class="mb-5 px-4 py-3 rounded-xl bg-[#D1FAE5] border border-[#A7F3D0] text-[#065F46] text-sm font-medium flex items-center gap-2">
        <span class="material-symbols-outlined text-lg" style="font-variation-settings:'FILL' 1,'wght' 500;">check_circle</span>
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="mb-5 px-4 py-3 rounded-xl bg-[#FEE2E2] border border-[#FECACA] text-[#991B1B] text-sm font-medium flex items-center gap-2">
        <span class="material-symbols-outlined text-lg" style="font-variation-settings:'FILL' 1,'wght' 500;">error</span>
        {{ session('error') }}
    </div>
@endif

{{-- Search & Filter --}}
<div class="admin-table-wrap mb-6">
    <form method="GET" action="{{ route('admin.users') }}" class="p-4 flex flex-col sm:flex-row gap-3">
        <div class="flex-1 relative">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#94A3B8] text-lg">search</span>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, atau NIM/NIP..."
                   class="w-full pl-10 pr-4 py-2.5 text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-none focus:ring-2 focus:ring-[#0B6839]/20 focus:border-[#0B6839]">
        </div>
        <select name="role" class="px-4 py-2.5 text-sm border border-[#E2E8F0] rounded-xl bg-[#F8FAFC] focus:outline-none focus:ring-2 focus:ring-[#0B6839]/20">
            <option value="">Semua Role</option>
            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="mahasiswa" {{ request('role') === 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
        </select>
        <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-[#0B6839] rounded-xl hover:bg-[#095C30] transition-colors">
            Cari
        </button>
        @if(request()->hasAny(['search', 'role']))
            <a href="{{ route('admin.users') }}" class="px-4 py-2.5 text-sm font-semibold text-[#64748B] border border-[#E2E8F0] rounded-xl hover:bg-[#F1F5F9] transition-colors text-center">
                Reset
            </a>
        @endif
    </form>
</div>

{{-- Users Table --}}
<div class="admin-table-wrap">
    <div class="admin-table-header">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[#6366F1] text-lg" style="font-variation-settings:'FILL' 1,'wght' 600;">group</span>
            <h3 class="text-sm font-bold text-[#0F172A]">Daftar Pengguna</h3>
            <span class="text-xs text-[#94A3B8]">({{ $users->total() }} total)</span>
        </div>
    </div>

    @if($users->isEmpty())
        <div class="py-16 text-center">
            <span class="material-symbols-outlined text-5xl text-[#CBD5E1]" style="font-variation-settings:'FILL' 1,'wght' 400;">person_off</span>
            <p class="text-sm text-[#94A3B8] mt-3">Tidak ada pengguna ditemukan</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Pengguna</th>
                        <th>NIM / NIP</th>
                        <th>Fakultas</th>
                        <th>Role</th>
                        <th>Bergabung</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#0B6839] to-[#074324] flex items-center justify-center text-white text-xs font-bold shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-semibold text-[#0F172A] text-sm truncate">{{ $user->name }}</p>
                                        <p class="text-[11px] text-[#94A3B8]">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-[13px] text-[#334155]">{{ $user->nim_nip ?? '—' }}</td>
                            <td class="text-[13px] text-[#64748B]">{{ $user->fakultas ?? '—' }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-mahasiswa' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-[12px] text-[#94A3B8] whitespace-nowrap">{{ $user->created_at->format('d M Y') }}</td>
                            <td class="text-right">
                                @if($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-[#94A3B8] hover:text-[#E11D48] transition-colors" title="Hapus">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-[11px] text-[#94A3B8] italic">Anda</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="p-4 border-t border-[#F1F5F9]">
                {{ $users->links('pagination::tailwind') }}
            </div>
        @endif
    @endif
</div>

@endsection
