@extends('layouts.app')

@section('title', 'Layanan Area Belajar & Ruang Rapat — Perpustakaan Universitas Sumatera Utara')
@section('meta_description', 'Layanan Area Belajar dan Ruang Rapat Perpustakaan USU meliputi The Gade Creative Lounge (TGCL), Ruang Belajar Individu (RUBELIN), Ruang Rapat Lantai 1-3, dan Ruang Konferensi.')

@section('content')
<!-- BREADCRUMB -->
<div class="flex items-center gap-2 text-xs text-[#64748B]">
    <a href="{{ route('beranda') }}" class="hover:text-[#0B6839] flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">home</span>
        <span>Beranda</span>
    </a>
    <span class="text-[#CBD5E1]">/</span>
    <span class="text-[#B45309] font-bold">Layanan Area Belajar & Ruang Rapat</span>
</div>

<!-- HERO HEADER -->
<section class="rounded-2xl usu-hero-bg text-white p-8 sm:p-10 shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="relative z-10 max-w-3xl space-y-3">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-xs text-[#F6AE01] text-xs font-bold">
            <span class="material-symbols-outlined text-sm">meeting_room</span>
            <span>Fasilitas Ruang Diskusi, Kolaborasi & Riset</span>
        </div>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight">
            Area Belajar & Ruang Rapat
        </h1>
        <p class="text-xs sm:text-sm text-white/90 leading-relaxed max-w-2xl">
            Reservasi fasilitas ruangan modern di Gedung Perpustakaan Universitas Sumatera Utara, meliputi area coworking The Gade Creative Lounge (TGCL), 5 unit kubikel hening RUBELIN, ruang rapat Lantai 1 s.d. 3, serta auditorium mini Ruang Konferensi.
        </p>
    </div>
    <div class="absolute right-4 bottom-0 top-0 opacity-10 flex items-center justify-end pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">meeting_room</span>
    </div>
</section>

<!-- ROOMS LIST -->
<section class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-[#E2E8F0] pb-3">
        <div>
            <h2 class="text-lg font-bold text-[#0F172A]">Fasilitas Ruangan Tersedia</h2>
            <p class="text-xs text-[#64748B]">Pilih ruangan untuk melihat detail fasilitas atau melakukan reservasi slot.</p>
        </div>
        <div class="flex items-center gap-3 text-xs">
            <span class="flex items-center gap-1.5 font-medium text-[#0F172A]"><span class="w-2.5 h-2.5 rounded-full status-dot-tersedia"></span> Tersedia</span>
            <span class="flex items-center gap-1.5 font-medium text-[#0F172A]"><span class="w-2.5 h-2.5 rounded-full status-dot-terpakai"></span> Terpakai</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Ruang 1: TGCL -->
        <div class="usu-card overflow-hidden flex flex-col justify-between">
            <div class="relative h-40 bg-gradient-to-br from-[#0B6839]/15 to-[#074324]/25 flex flex-col items-center justify-center text-[#074324]">
                <span class="material-symbols-outlined text-5xl mb-1 text-[#0B6839]">groups</span>
                <span class="text-xs font-bold uppercase tracking-wider">The Gade Creative Lounge</span>
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-white text-[#10B981] shadow-xs border border-[#DCFCE7]">
                        <span class="w-2 h-2 rounded-full status-dot-tersedia"></span>
                        <span>Tersedia</span>
                    </span>
                </div>
                <div class="absolute bottom-3 left-3 bg-[#0F172A]/80 text-white text-[11px] px-2 py-0.5 rounded-md font-medium">
                    Lantai 1 • Kapasitas 40 Orang
                </div>
            </div>
            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#0F172A]">The Gade Creative Lounge (TGCL)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed">
                        Coworking space modern untuk diskusi kolaboratif, dilengkapi 3 komputer publik, pod diskusi, smart TV, dan game rekreasi catur/table soccer.
                    </p>
                </div>
                <div class="pt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                    <a href="{{ route('jadwal.ruangan') }}" class="usu-btn-secondary py-2 text-xs text-center block">
                        Cek Jadwal
                    </a>
                    <button type="button" onclick="openUniversalReservationModal('tgcl')" class="usu-btn-primary py-2 text-xs text-center">
                        Reservasi TGCL
                    </button>
                </div>
            </div>
        </div>

        <!-- Ruang 2: RUBELIN -->
        <div class="usu-card overflow-hidden flex flex-col justify-between">
            <div class="relative h-40 bg-gradient-to-br from-[#0B6839]/15 to-[#074324]/25 flex flex-col items-center justify-center text-[#074324]">
                <span class="material-symbols-outlined text-5xl mb-1 text-[#0B6839]">chair_alt</span>
                <span class="text-xs font-bold uppercase tracking-wider">Ruang Belajar Individu (RUBELIN)</span>
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-white text-[#10B981] shadow-xs border border-[#DCFCE7]">
                        <span class="w-2 h-2 rounded-full status-dot-tersedia"></span>
                        <span>5 Unit Siap</span>
                    </span>
                </div>
                <div class="absolute bottom-3 left-3 bg-[#0F172A]/80 text-white text-[11px] px-2 py-0.5 rounded-md font-medium">
                    Lantai 1 Area Referensi • 5 Kubikel Hening
                </div>
            </div>
            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#0F172A]">Ruang Belajar Individu (RUBELIN)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed">
                        5 unit kubikel hening kedap suara khusus Dosen, Peneliti, dan Mahasiswa Pascasarjana (S2/S3) untuk fokus riset dan kuliah online.
                    </p>
                </div>
                <div class="pt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                    <a href="{{ route('jadwal.ruangan') }}" class="usu-btn-secondary py-2 text-xs text-center block">
                        Cek Jadwal
                    </a>
                    <button type="button" onclick="openUniversalReservationModal('rubelin')" class="usu-btn-primary py-2 text-xs text-center">
                        Reservasi RUBELIN
                    </button>
                </div>
            </div>
        </div>

        <!-- Ruang 3: Ruang Rapat Lt 1 -->
        <div class="usu-card overflow-hidden flex flex-col justify-between">
            <div class="relative h-40 bg-gradient-to-br from-[#0B6839]/15 to-[#074324]/25 flex flex-col items-center justify-center text-[#074324]">
                <span class="material-symbols-outlined text-5xl mb-1 text-[#0B6839]">meeting_room</span>
                <span class="text-xs font-bold uppercase tracking-wider">Ruang Rapat Lantai 1</span>
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-white text-[#10B981] shadow-xs border border-[#DCFCE7]">
                        <span class="w-2 h-2 rounded-full status-dot-tersedia"></span>
                        <span>3 Ruangan</span>
                    </span>
                </div>
                <div class="absolute bottom-3 left-3 bg-[#0F172A]/80 text-white text-[11px] px-2 py-0.5 rounded-md font-medium">
                    Lantai 1 • 2x Kapasitas 6 org & 1x Kapasitas 18 org
                </div>
            </div>
            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#0F172A]">Ruang Rapat / Diskusi Lantai 1</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed">
                        Tersedia 2 ruang (kapasitas 6 orang) dan 1 ruang (kapasitas 18 orang) dengan whiteboard dan proyektor untuk bimbingan atau rapat riset.
                    </p>
                </div>
                <div class="pt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                    <a href="{{ route('jadwal.ruangan') }}" class="usu-btn-secondary py-2 text-xs text-center block">
                        Cek Jadwal
                    </a>
                    <button type="button" onclick="openUniversalReservationModal('rapat-lt1')" class="usu-btn-primary py-2 text-xs text-center">
                        Reservasi Ruang
                    </button>
                </div>
            </div>
        </div>

        <!-- Ruang 4: Ruang Rapat Lt 2 -->
        <div class="usu-card overflow-hidden flex flex-col justify-between">
            <div class="relative h-40 bg-gradient-to-br from-[#0B6839]/15 to-[#074324]/25 flex flex-col items-center justify-center text-[#074324]">
                <span class="material-symbols-outlined text-5xl mb-1 text-[#0B6839]">group_work</span>
                <span class="text-xs font-bold uppercase tracking-wider">Ruang Rapat Lantai 2</span>
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-white text-[#EF4444] shadow-xs border border-[#FEE2E2]">
                        <span class="w-2 h-2 rounded-full status-dot-terpakai"></span>
                        <span>Terpakai sd 15.00</span>
                    </span>
                </div>
                <div class="absolute bottom-3 left-3 bg-[#0F172A]/80 text-white text-[11px] px-2 py-0.5 rounded-md font-medium">
                    Lantai 2 • 2 Ruang (Kapasitas 12 Orang/ruang)
                </div>
            </div>
            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#0F172A]">Ruang Rapat / Diskusi Lantai 2</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed">
                        2 unit ruang rapat representatif dengan meja oval dan fasilitas presentasi lengkap untuk bimbingan skripsi dan rapat organisasi.
                    </p>
                </div>
                <div class="pt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                    <a href="{{ route('jadwal.ruangan') }}" class="usu-btn-secondary py-2 text-xs text-center block">
                        Cek Jadwal
                    </a>
                    <button type="button" onclick="openUniversalReservationModal('rapat-lt2')" class="usu-btn-primary py-2 text-xs text-center">
                        Reservasi Ruang
                    </button>
                </div>
            </div>
        </div>

        <!-- Ruang 5: Ruang Rapat Lt 3 -->
        <div class="usu-card overflow-hidden flex flex-col justify-between">
            <div class="relative h-40 bg-gradient-to-br from-[#0B6839]/15 to-[#074324]/25 flex flex-col items-center justify-center text-[#074324]">
                <span class="material-symbols-outlined text-5xl mb-1 text-[#0B6839]">forum</span>
                <span class="text-xs font-bold uppercase tracking-wider">Ruang Rapat Lantai 3</span>
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-white text-[#10B981] shadow-xs border border-[#DCFCE7]">
                        <span class="w-2 h-2 rounded-full status-dot-tersedia"></span>
                        <span>Tersedia</span>
                    </span>
                </div>
                <div class="absolute bottom-3 left-3 bg-[#0F172A]/80 text-white text-[11px] px-2 py-0.5 rounded-md font-medium">
                    Lantai 3 • 1 Ruang (Kapasitas 8 Orang)
                </div>
            </div>
            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#0F172A]">Ruang Rapat Lantai 3</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed">
                        Ruang privat yang tenang di Lantai 3, ideal untuk diskusi tim peneliti dosen, wawancara akademik, dan bimbingan disertasi.
                    </p>
                </div>
                <div class="pt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                    <a href="{{ route('jadwal.ruangan') }}" class="usu-btn-secondary py-2 text-xs text-center block">
                        Cek Jadwal
                    </a>
                    <button type="button" onclick="openUniversalReservationModal('rapat-lt3')" class="usu-btn-primary py-2 text-xs text-center">
                        Reservasi Ruang
                    </button>
                </div>
            </div>
        </div>

        <!-- Ruang 6: Ruang Konferensi -->
        <div class="usu-card overflow-hidden flex flex-col justify-between">
            <div class="relative h-40 bg-gradient-to-br from-[#0B6839]/15 to-[#074324]/25 flex flex-col items-center justify-center text-[#074324]">
                <span class="material-symbols-outlined text-5xl mb-1 text-[#0B6839]">podium</span>
                <span class="text-xs font-bold uppercase tracking-wider">Ruang Konferensi</span>
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-white text-[#F59E0B] shadow-xs border border-[#FEF3C7]">
                        <span class="w-2 h-2 rounded-full status-dot-menunggu"></span>
                        <span>Review Acara</span>
                    </span>
                </div>
                <div class="absolute bottom-3 left-3 bg-[#0F172A]/80 text-white text-[11px] px-2 py-0.5 rounded-md font-medium">
                    Lantai 1 • Kapasitas 70 Orang
                </div>
            </div>
            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#0F172A]">Ruang Konferensi (Auditorium Mini)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed">
                        Ruang seminar, kuliah umum, dan workshop berskala besar dilengkapi dual LCD proyektor, panggung mini, dan sound system profesional.
                    </p>
                </div>
                <div class="pt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                    <a href="{{ route('jadwal.ruangan') }}" class="usu-btn-secondary py-2 text-xs text-center block">
                        Cek Jadwal
                    </a>
                    <button type="button" onclick="openUniversalReservationModal('konferensi')" class="usu-btn-primary py-2 text-xs text-center">
                        Ajukan Ruangan
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
