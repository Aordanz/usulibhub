@extends('layouts.app')

@section('title', 'Jadwal Ruangan Real-Time — Perpustakaan Universitas Sumatera Utara')
@section('meta_description', 'Lihat status ketersediaan dan jadwal pemakaian seluruh ruangan di Perpustakaan USU secara real-time. Cek kapan ruangan tersedia dan langsung reservasi.')

@section('content')
<!-- BREADCRUMB -->
<div class="flex items-center gap-2 text-xs text-[#64748B]">
    <a href="{{ route('beranda') }}" class="hover:text-[#0B6839] flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">home</span>
        <span>Beranda</span>
    </a>
    <span class="text-[#CBD5E1]">/</span>
    <span class="text-[#0B6839] font-bold">Jadwal Ruangan</span>
</div>

<!-- HERO HEADER -->
<section class="rounded-2xl usu-hero-bg text-white p-8 sm:p-10 shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="relative z-10 max-w-3xl space-y-3">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-xs text-[#F6AE01] text-xs font-bold">
            <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
            <span>Status Real-Time • Hari Ini</span>
        </div>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight">
            Jadwal & Ketersediaan Ruangan
        </h1>
        <p class="text-xs sm:text-sm text-white/90 leading-relaxed max-w-2xl">
            Pantau status pemakaian seluruh ruangan di Gedung Perpustakaan USU secara langsung. Lihat siapa yang sedang menggunakan ruangan, sampai jam berapa, dan kapan ruangan tersedia kembali.
        </p>
    </div>
    <div class="absolute right-4 bottom-0 top-0 opacity-10 flex items-center justify-end pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">calendar_month</span>
    </div>
</section>

<!-- LEGEND -->
<div class="flex flex-wrap items-center justify-between gap-4 text-xs bg-white rounded-xl border border-[#E2E8F0] px-5 py-3 shadow-xs">
    <div class="flex flex-wrap items-center gap-4">
        <span class="font-bold text-[#0F172A]">Keterangan Status:</span>
        <span class="inline-flex items-center gap-1.5 font-medium"><span class="w-3 h-3 rounded-full bg-[#10B981] shadow-[0_0_0_3px_rgba(16,185,129,0.2)]"></span> Tersedia</span>
        <span class="inline-flex items-center gap-1.5 font-medium"><span class="w-3 h-3 rounded-full bg-[#EF4444] shadow-[0_0_0_3px_rgba(239,68,68,0.2)]"></span> Sedang Digunakan</span>
        <span class="inline-flex items-center gap-1.5 font-medium"><span class="w-3 h-3 rounded-full bg-[#F59E0B] shadow-[0_0_0_3px_rgba(245,158,11,0.2)]"></span> Menunggu Review</span>
        <span class="inline-flex items-center gap-1.5 font-medium"><span class="w-3 h-3 rounded-full bg-[#94A3B8] shadow-[0_0_0_3px_rgba(148,163,184,0.2)]"></span> Jam Istirahat</span>
    </div>
    <div class="inline-flex items-center gap-1.5 text-[11px] text-[#0B6839] font-medium bg-[#F0FDF4] px-3 py-1 rounded-full border border-[#DCFCE7]">
        <span class="material-symbols-outlined text-xs animate-bounce">touch_app</span>
        <span>Arahkan kursor ke status untuk cek jam pinjam per-unit</span>
    </div>
</div>

<!-- ROOMS STATUS LIST -->
<section class="space-y-4">
    <div class="border-b border-[#E2E8F0] pb-3">
        <h2 class="text-lg font-bold text-[#0F172A]">Daftar Ruangan & Status Saat Ini</h2>
        <p class="text-xs text-[#64748B]">Arahkan kursor ke kartu ruangan untuk melihat jam pinjam dan ketersediaan per-ruangan/unit, atau klik <strong>Reservasi</strong> untuk memesan.</p>
    </div>

    <div class="space-y-3">

        <!-- TGCL -->
        <div class="usu-card transition-all duration-300 relative group/card overflow-hidden hover:shadow-md">
            <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-2xl">groups</span>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-[#0F172A]">The Gade Creative Lounge (TGCL)</h3>
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B]">
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">location_on</span> Lantai 1</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">group</span> Kapasitas 40 Orang</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span>Coworking Space</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 sm:shrink-0">
                    <div class="text-right cursor-pointer">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#10B981] border border-[#DCFCE7] shadow-xs group-hover/card:border-[#10B981] group-hover/card:shadow-sm transition-all">
                            <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
                            <span>Tersedia</span>
                        </div>
                        <p class="text-[10px] text-[#64748B] mt-0.5 flex items-center justify-end gap-1">
                            <span>Bebas tanpa antrean</span>
                            <span class="text-[#0B6839] font-medium hidden sm:inline underline decoration-dotted underline-offset-2">(sorot kartu)</span>
                        </p>
                    </div>

                    <button type="button" onclick="openRoomCardModal('tgcl')" class="usu-btn-primary px-4 py-2 text-xs font-semibold whitespace-nowrap flex items-center gap-1.5 shadow-xs hover:shadow-sm">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        <span>Rincian</span>
                    </button>
                </div>
            </div>

            <!-- Full-Width Expandable Drawer -->
            <div class="card-expand-drawer border-t border-transparent group-hover/card:border-[#E2E8F0] transition-colors duration-300">
                <div class="card-expand-content">
                    <div class="p-5 bg-[#F8FAF7]/90 border-t border-[#F1F5F9]">
                        <div class="flex items-center justify-between pb-3 mb-3 border-b border-[#E2E8F0]">
                            <div>
                                <h4 class="text-xs font-bold text-[#0F172A] flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm text-[#0B6839]">groups</span>
                                    The Gade Creative Lounge (TGCL)
                                </h4>
                                <p class="text-[10px] text-[#64748B]">Coworking Komunal • Kapasitas 40 Kursi</p>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#F0FDF4] text-[#10B981] border border-[#DCFCE7]">
                                Tersedia Bebas
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                            <div class="p-3 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
                                        <span class="text-xs font-bold text-[#0F172A]">Sesi Saat Ini</span>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#F0FDF4] text-[#10B981] font-semibold border border-[#DCFCE7]">Terbuka</span>
                                    </div>
                                    <p class="text-[11px] text-[#15803D] pl-3.5 mt-0.5">Bebas digunakan untuk belajar & diskusi mandiri</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-bold text-[#10B981] font-mono">10.30 - 20.00</span>
                                    <span class="block text-[9px] text-[#64748B]">WIB</span>
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-white border border-[#E2E8F0] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#94A3B8]"></span>
                                        <span class="text-xs font-semibold text-[#64748B]">Sesi Pagi (Selesai)</span>
                                    </div>
                                    <p class="text-[11px] text-[#64748B] pl-3.5 mt-0.5">Diskusi Komunitas Buku USU (Selesai)</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-medium text-[#64748B] font-mono">08.00 - 10.30</span>
                                    <span class="block text-[9px] text-[#94A3B8]">WIB</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-[#E2E8F0] flex items-center justify-between text-[11px] text-[#64748B]">
                            <span class="flex items-center gap-1 text-[#0B6839] font-medium">
                                <span class="material-symbols-outlined text-xs">power</span> Stopkontak & Wi-Fi Aktif
                            </span>
                            <span class="font-medium text-[#0F172A]">Langsung Datang / Reservasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RUBELIN (Ruang Belajar Individu) -->
        <div class="usu-card transition-all duration-300 relative group/card overflow-hidden hover:shadow-md">
            <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-2xl">chair_alt</span>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-[#0F172A]">Ruang Belajar Individu (RUBELIN)</h3>
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B]">
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">location_on</span> Lantai 1 Area Referensi</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">grid_view</span> 5 Unit Kubikel Hening</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 sm:shrink-0">
                    <div class="text-right cursor-pointer">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#10B981] border border-[#DCFCE7] shadow-xs group-hover/card:border-[#10B981] group-hover/card:shadow-sm transition-all">
                            <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
                            <span>3 Unit Tersedia</span>
                        </div>
                        <p class="text-[10px] text-[#64748B] mt-0.5 flex items-center justify-end gap-1">
                            <span>2 unit digunakan s/d 14.30</span>
                            <span class="text-[#0B6839] font-medium hidden sm:inline underline decoration-dotted underline-offset-2">(sorot kartu)</span>
                        </p>
                    </div>

                    <button type="button" onclick="openRoomCardModal('rubelin')" class="usu-btn-primary px-4 py-2 text-xs font-semibold whitespace-nowrap flex items-center gap-1.5 shadow-xs hover:shadow-sm">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        <span>Rincian</span>
                    </button>
                </div>
            </div>

            <!-- Full-Width Expandable Drawer -->
            <div class="card-expand-drawer border-t border-transparent group-hover/card:border-[#E2E8F0] transition-colors duration-300">
                <div class="card-expand-content">
                    <div class="p-5 bg-[#F8FAF7]/90 border-t border-[#F1F5F9]">
                        <div class="flex items-center justify-between pb-3 mb-3 border-b border-[#E2E8F0]">
                            <div>
                                <h4 class="text-xs font-bold text-[#0F172A] flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm text-[#0B6839]">chair_alt</span>
                                    Status 5 Unit Kubikel RUBELIN
                                </h4>
                                <p class="text-[10px] text-[#64748B]">Rincian jam pinjam per-unit kubikel hari ini</p>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]">
                                3 Siap • 2 Dipinjam
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2.5 text-xs">
                            <!-- Unit 1 -->
                            <div class="p-2.5 rounded-xl bg-white border border-[#FEE2E2] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#EF4444] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Kubikel 01</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#FEF2F2] text-[#EF4444] font-semibold border border-[#FEE2E2]">Dipinjam</span>
                                    </div>
                                    <p class="text-[10px] text-[#64748B] mt-1 line-clamp-2">Peneliti S2 Biologi • Riset Tesis</p>
                                </div>
                                <div class="text-right pt-1.5 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-extrabold text-[#EF4444] font-mono">09.00 - 14.30</span>
                                    <span class="text-[9px] text-[#94A3B8] ml-0.5">WIB</span>
                                </div>
                            </div>

                            <!-- Unit 2 -->
                            <div class="p-2.5 rounded-xl bg-white border border-[#FEE2E2] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#EF4444] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Kubikel 02</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#FEF2F2] text-[#EF4444] font-semibold border border-[#FEE2E2]">Dipinjam</span>
                                    </div>
                                    <p class="text-[10px] text-[#64748B] mt-1 line-clamp-2">Dosen FEB • Penulisan Jurnal</p>
                                </div>
                                <div class="text-right pt-1.5 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-extrabold text-[#EF4444] font-mono">10.00 - 14.30</span>
                                    <span class="text-[9px] text-[#94A3B8] ml-0.5">WIB</span>
                                </div>
                            </div>

                            <!-- Unit 3 -->
                            <div class="p-2.5 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#10B981] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Kubikel 03</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#F0FDF4] text-[#10B981] font-semibold border border-[#DCFCE7]">Tersedia</span>
                                    </div>
                                    <p class="text-[10px] text-[#15803D] mt-1 line-clamp-2">Kosong & Siap Dipakai</p>
                                </div>
                                <div class="text-right pt-1.5 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-bold text-[#10B981]">Siap Pakai</span>
                                    <span class="text-[9px] text-[#64748B] ml-0.5">Maks. 3 Jam</span>
                                </div>
                            </div>

                            <!-- Unit 4 -->
                            <div class="p-2.5 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#10B981] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Kubikel 04</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#F0FDF4] text-[#10B981] font-semibold border border-[#DCFCE7]">Tersedia</span>
                                    </div>
                                    <p class="text-[10px] text-[#15803D] mt-1 line-clamp-2">Kosong & Siap Dipakai</p>
                                </div>
                                <div class="text-right pt-1.5 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-bold text-[#10B981]">Siap Pakai</span>
                                    <span class="text-[9px] text-[#64748B] ml-0.5">Maks. 3 Jam</span>
                                </div>
                            </div>

                            <!-- Unit 5 -->
                            <div class="p-2.5 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#10B981] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Kubikel 05</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#F0FDF4] text-[#10B981] font-semibold border border-[#DCFCE7]">Tersedia</span>
                                    </div>
                                    <p class="text-[10px] text-[#15803D] mt-1 line-clamp-2">Kosong & Siap Dipakai</p>
                                </div>
                                <div class="text-right pt-1.5 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-bold text-[#10B981]">Siap Pakai</span>
                                    <span class="text-[9px] text-[#64748B] ml-0.5">Maks. 3 Jam</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-[#E2E8F0] flex items-center justify-between text-[11px] text-[#64748B]">
                            <span class="flex items-center gap-1 text-[#0B6839] font-medium">
                                <span class="material-symbols-outlined text-xs">headphones</span> Kubikel Hening Kedap Suara
                            </span>
                            <span class="font-bold text-[#0B6839]">Pesan Sekarang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ruang Rapat Lt 1 -->
        <div class="usu-card transition-all duration-300 relative group/card overflow-hidden hover:shadow-md">
            <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-2xl">meeting_room</span>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-[#0F172A]">Ruang Rapat / Diskusi Lantai 1</h3>
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B]">
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">location_on</span> Lantai 1</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span>2x Kap. 6 org & 1x Kap. 18 org</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 sm:shrink-0">
                    <div class="text-right cursor-pointer">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-[#FEF2F2] text-[#EF4444] border border-[#FEE2E2] shadow-xs group-hover/card:border-[#EF4444] group-hover/card:shadow-sm transition-all">
                            <span class="w-2 h-2 rounded-full bg-[#EF4444]"></span>
                            <span>Digunakan s/d 12.00</span>
                        </div>
                        <p class="text-[10px] text-[#64748B] mt-0.5 flex items-center justify-end gap-1">
                            <span>Rapat Prodi Teknik Informatika</span>
                            <span class="text-[#0B6839] font-medium hidden sm:inline underline decoration-dotted underline-offset-2">(sorot kartu)</span>
                        </p>
                    </div>

                    <button type="button" onclick="openRoomCardModal('rapat-lt1')" class="usu-btn-primary px-4 py-2 text-xs font-semibold whitespace-nowrap flex items-center gap-1.5 shadow-xs hover:shadow-sm">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        <span>Rincian</span>
                    </button>
                </div>
            </div>

            <!-- Full-Width Expandable Drawer -->
            <div class="card-expand-drawer border-t border-transparent group-hover/card:border-[#E2E8F0] transition-colors duration-300">
                <div class="card-expand-content">
                    <div class="p-5 bg-[#F8FAF7]/90 border-t border-[#F1F5F9]">
                        <div class="flex items-center justify-between pb-3 mb-3 border-b border-[#E2E8F0]">
                            <div>
                                <h4 class="text-xs font-bold text-[#0F172A] flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm text-[#0B6839]">meeting_room</span>
                                    Status 3 Ruang Diskusi Lt. 1
                                </h4>
                                <p class="text-[10px] text-[#64748B]">Rincian jam pinjam per-ruangan hari ini</p>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#F8FAF7] text-[#0F172A] border border-[#E2E8F0]">
                                3 Ruangan Total
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs">
                            <!-- Ruang Diskusi 1A -->
                            <div class="p-3 rounded-xl bg-white border border-[#FEE2E2] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#EF4444] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Ruang Diskusi 1A</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#FEF2F2] text-[#EF4444] font-semibold border border-[#FEE2E2]">Dipinjam</span>
                                    </div>
                                    <p class="text-[11px] text-[#64748B] mt-1">Kap. 6 Org • Rapat Prodi TI</p>
                                </div>
                                <div class="text-right pt-2 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-extrabold text-[#EF4444] font-mono">08.30 - 12.00</span>
                                    <span class="block text-[9px] text-[#94A3B8]">WIB (s/d 12.00)</span>
                                </div>
                            </div>

                            <!-- Ruang Diskusi 1B -->
                            <div class="p-3 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#10B981] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Ruang Diskusi 1B</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#F0FDF4] text-[#10B981] font-semibold border border-[#DCFCE7]">Tersedia</span>
                                    </div>
                                    <p class="text-[11px] text-[#15803D] mt-1">Kap. 6 Org • Kosong & Siap Dipakai</p>
                                </div>
                                <div class="text-right pt-2 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-bold text-[#10B981]">Siap Pakai</span>
                                    <span class="block text-[9px] text-[#64748B]">Bebas Pinjam</span>
                                </div>
                            </div>

                            <!-- Ruang Utama 1C -->
                            <div class="p-3 rounded-xl bg-white border border-[#FEF3C7] shadow-xs flex flex-col justify-between gap-2">
                                <div>
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-[#F59E0B] shrink-0"></span>
                                            <span class="text-xs font-bold text-[#0F172A]">Ruang Utama 1C</span>
                                        </div>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#FFFBEB] text-[#B45309] font-semibold border border-[#FEF3C7]">Tersedia sd 13.30</span>
                                    </div>
                                    <p class="text-[11px] text-[#B45309] mt-1">Kap. 18 Org • 13.30 Rapat Akreditasi</p>
                                </div>
                                <div class="text-right pt-2 border-t border-[#F1F5F9]">
                                    <span class="text-xs font-bold text-[#B45309] font-mono">Bebas sd 13.30</span>
                                    <span class="block text-[9px] text-[#94A3B8]">WIB</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-[#E2E8F0] flex items-center justify-between text-[11px] text-[#64748B]">
                            <span class="flex items-center gap-1 text-[#0B6839] font-medium">
                                <span class="material-symbols-outlined text-xs">videocam</span> Whiteboard & Proyektor Siap
                            </span>
                            <span class="font-semibold text-[#0B6839]">2 Ruangan Tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ruang Rapat Lt 2 -->
        <div class="usu-card transition-all duration-300 relative group/card overflow-hidden hover:shadow-md">
            <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-2xl">group_work</span>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-[#0F172A]">Ruang Rapat / Diskusi Lantai 2</h3>
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B]">
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">location_on</span> Lantai 2</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span>2 Ruang (Kapasitas 12 org/ruang)</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 sm:shrink-0">
                    <div class="text-right cursor-pointer">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-[#FEF2F2] text-[#EF4444] border border-[#FEE2E2] shadow-xs group-hover/card:border-[#EF4444] group-hover/card:shadow-sm transition-all">
                            <span class="w-2 h-2 rounded-full bg-[#EF4444]"></span>
                            <span>Digunakan s/d 15.00</span>
                        </div>
                        <p class="text-[10px] text-[#64748B] mt-0.5 flex items-center justify-end gap-1">
                            <span>Bimbingan Skripsi — Dr. Rina</span>
                            <span class="text-[#0B6839] font-medium hidden sm:inline underline decoration-dotted underline-offset-2">(sorot kartu)</span>
                        </p>
                    </div>

                    <button type="button" onclick="openRoomCardModal('rapat-lt2')" class="usu-btn-primary px-4 py-2 text-xs font-semibold whitespace-nowrap flex items-center gap-1.5 shadow-xs hover:shadow-sm">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        <span>Rincian</span>
                    </button>
                </div>
            </div>

            <!-- Full-Width Expandable Drawer -->
            <div class="card-expand-drawer border-t border-transparent group-hover/card:border-[#E2E8F0] transition-colors duration-300">
                <div class="card-expand-content">
                    <div class="p-5 bg-[#F8FAF7]/90 border-t border-[#F1F5F9]">
                        <div class="flex items-center justify-between pb-3 mb-3 border-b border-[#E2E8F0]">
                            <div>
                                <h4 class="text-xs font-bold text-[#0F172A] flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm text-[#0B6839]">group_work</span>
                                    Status 2 Ruang Diskusi Lt. 2
                                </h4>
                                <p class="text-[10px] text-[#64748B]">Rincian jam pinjam per-ruangan hari ini</p>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#F8FAF7] text-[#0F172A] border border-[#E2E8F0]">
                                1 Siap • 1 Dipinjam
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                            <!-- Ruang 2A -->
                            <div class="p-3 rounded-xl bg-white border border-[#FEE2E2] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#EF4444]"></span>
                                        <span class="text-xs font-bold text-[#0F172A]">Ruang Rapat 2A</span>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#FEF2F2] text-[#EF4444] font-semibold border border-[#FEE2E2]">Dipinjam</span>
                                    </div>
                                    <p class="text-[11px] text-[#64748B] pl-3.5 mt-0.5">Kap. 12 Org • Bimbingan Skripsi (Dr. Rina)</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-extrabold text-[#EF4444] font-mono">09.00 - 15.00</span>
                                    <span class="block text-[9px] text-[#94A3B8]">WIB (s/d 15.00)</span>
                                </div>
                            </div>

                            <!-- Ruang 2B -->
                            <div class="p-3 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
                                        <span class="text-xs font-bold text-[#0F172A]">Ruang Rapat 2B</span>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#F0FDF4] text-[#10B981] font-semibold border border-[#DCFCE7]">Tersedia</span>
                                    </div>
                                    <p class="text-[11px] text-[#15803D] pl-3.5 mt-0.5">Kap. 12 Org • Siap & Bebas Dipakai</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-bold text-[#10B981]">Siap Pakai</span>
                                    <span class="block text-[9px] text-[#64748B]">Bebas Pinjam</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-[#E2E8F0] flex items-center justify-between text-[11px] text-[#64748B]">
                            <span class="flex items-center gap-1 text-[#0B6839] font-medium">
                                <span class="material-symbols-outlined text-xs">tv</span> Dilengkapi Smart TV 55" & AC Dingin
                            </span>
                            <span class="font-semibold text-[#0B6839]">1 Ruangan Tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ruang Rapat Lt 3 -->
        <div class="usu-card transition-all duration-300 relative group/card overflow-hidden hover:shadow-md">
            <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-2xl">forum</span>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-[#0F172A]">Ruang Rapat Lantai 3</h3>
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B]">
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">location_on</span> Lantai 3</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span>1 Ruang (Kapasitas 8 Orang)</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 sm:shrink-0">
                    <div class="text-right cursor-pointer">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#10B981] border border-[#DCFCE7] shadow-xs group-hover/card:border-[#10B981] group-hover/card:shadow-sm transition-all">
                            <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
                            <span>Tersedia</span>
                        </div>
                        <p class="text-[10px] text-[#64748B] mt-0.5 flex items-center justify-end gap-1">
                            <span>Bebas s/d 15.30 WIB</span>
                            <span class="text-[#0B6839] font-medium hidden sm:inline underline decoration-dotted underline-offset-2">(sorot kartu)</span>
                        </p>
                    </div>

                    <button type="button" onclick="openRoomCardModal('rapat-lt3')" class="usu-btn-primary px-4 py-2 text-xs font-semibold whitespace-nowrap flex items-center gap-1.5 shadow-xs hover:shadow-sm">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        <span>Rincian</span>
                    </button>
                </div>
            </div>

            <!-- Full-Width Expandable Drawer -->
            <div class="card-expand-drawer border-t border-transparent group-hover/card:border-[#E2E8F0] transition-colors duration-300">
                <div class="card-expand-content">
                    <div class="p-5 bg-[#F8FAF7]/90 border-t border-[#F1F5F9]">
                        <div class="flex items-center justify-between pb-3 mb-3 border-b border-[#E2E8F0]">
                            <div>
                                <h4 class="text-xs font-bold text-[#0F172A] flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm text-[#0B6839]">forum</span>
                                    Ruang Rapat Eksekutif Lt. 3
                                </h4>
                                <p class="text-[10px] text-[#64748B]">Kapasitas 8 Orang • Meja Bundar</p>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#F0FDF4] text-[#10B981] border border-[#DCFCE7]">
                                Tersedia Saat Ini
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                            <div class="p-3 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
                                        <span class="text-xs font-bold text-[#0F172A]">Sesi Saat Ini</span>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#F0FDF4] text-[#10B981] font-semibold border border-[#DCFCE7]">Kosong</span>
                                    </div>
                                    <p class="text-[11px] text-[#15803D] pl-3.5 mt-0.5">Siap digunakan untuk rapat terbatas</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-bold text-[#10B981] font-mono">08.00 - 15.30</span>
                                    <span class="block text-[9px] text-[#64748B]">WIB</span>
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-white border border-[#FEF3C7] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                                        <span class="text-xs font-semibold text-[#B45309]">Jadwal Sore Mendatang</span>
                                    </div>
                                    <p class="text-[11px] text-[#B45309] pl-3.5 mt-0.5">Rapat Pustakawan & Koordinator</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-bold text-[#B45309] font-mono">15.30 - 17.30</span>
                                    <span class="block text-[9px] text-[#94A3B8]">WIB</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-[#E2E8F0] flex items-center justify-between text-[11px] text-[#64748B]">
                            <span class="flex items-center gap-1 text-[#0B6839] font-medium">
                                <span class="material-symbols-outlined text-xs">mic</span> Mic Konferensi & Kamera 360°
                            </span>
                            <span class="font-semibold text-[#0B6839]">Dapat Dipesan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ruang Konferensi -->
        <div class="usu-card transition-all duration-300 relative group/card overflow-hidden hover:shadow-md">
            <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-[#FFFBEB] text-[#B45309] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-2xl">podium</span>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-[#0F172A]">Ruang Konferensi (Auditorium Mini)</h3>
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-[#64748B]">
                            <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">location_on</span> Lantai 1</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span>Kapasitas 70 Orang</span>
                            <span class="text-[#CBD5E1]">•</span>
                            <span>Memerlukan Surat Pengajuan</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 sm:shrink-0">
                    <div class="text-right cursor-pointer">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-[#FFFBEB] text-[#F59E0B] border border-[#FEF3C7] shadow-xs group-hover/card:border-[#F59E0B] group-hover/card:shadow-sm transition-all">
                            <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                            <span>Menunggu Review</span>
                        </div>
                        <p class="text-[10px] text-[#64748B] mt-0.5 flex items-center justify-end gap-1">
                            <span>Pengajuan dari FT — 14.00-16.00</span>
                            <span class="text-[#0B6839] font-medium hidden sm:inline underline decoration-dotted underline-offset-2">(sorot kartu)</span>
                        </p>
                    </div>

                    <button type="button" onclick="openRoomCardModal('konferensi')" class="usu-btn-primary px-4 py-2 text-xs font-semibold whitespace-nowrap flex items-center gap-1.5 shadow-xs hover:shadow-sm">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        <span>Rincian</span>
                    </button>
                </div>
            </div>

            <!-- Full-Width Expandable Drawer -->
            <div class="card-expand-drawer border-t border-transparent group-hover/card:border-[#E2E8F0] transition-colors duration-300">
                <div class="card-expand-content">
                    <div class="p-5 bg-[#F8FAF7]/90 border-t border-[#F1F5F9]">
                        <div class="flex items-center justify-between pb-3 mb-3 border-b border-[#E2E8F0]">
                            <div>
                                <h4 class="text-xs font-bold text-[#0F172A] flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm text-[#B45309]">podium</span>
                                    Ruang Konferensi Lt. 1
                                </h4>
                                <p class="text-[10px] text-[#64748B]">Auditorium Mini • Kapasitas 70 Orang</p>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#FFFBEB] text-[#B45309] border border-[#FEF3C7]">
                                Review Berkas
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                            <div class="p-3 rounded-xl bg-white border border-[#FEF3C7] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                                        <span class="text-xs font-bold text-[#0F172A]">Pengajuan Masuk</span>
                                        <span class="text-[9px] px-1.5 py-0.2 rounded bg-[#FFFBEB] text-[#B45309] font-semibold border border-[#FEF3C7]">Verifikasi</span>
                                    </div>
                                    <p class="text-[11px] text-[#B45309] pl-3.5 mt-0.5">Seminar Nasional Himpunan FT</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-bold text-[#B45309] font-mono">14.00 - 16.00</span>
                                    <span class="block text-[9px] text-[#94A3B8]">WIB</span>
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-white border border-[#DCFCE7] shadow-xs flex items-center justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
                                        <span class="text-xs font-semibold text-[#15803D]">Sesi Pagi (Steril)</span>
                                    </div>
                                    <p class="text-[11px] text-[#15803D] pl-3.5 mt-0.5">Pembersihan ruangan & check sound</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-xs font-medium text-[#10B981] font-mono">08.00 - 13.30</span>
                                    <span class="block text-[9px] text-[#94A3B8]">WIB</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-[#E2E8F0] flex items-center justify-between text-[11px] text-[#64748B]">
                            <span class="flex items-center gap-1 text-[#B45309] font-medium">
                                <span class="material-symbols-outlined text-xs">description</span> Surat Resmi Diperlukan
                            </span>
                            <span class="font-medium text-[#0F172A]">Min. H-3 Kerja</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- INFO BOX -->
<section class="usu-card p-5 bg-[#F8FAF7] border-[#E2E8F0]">
    <div class="flex items-start gap-3">
        <div class="w-9 h-9 rounded-lg bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-xl">info</span>
        </div>
        <div class="space-y-1 text-xs text-[#475569]">
            <h4 class="font-bold text-[#0F172A] text-sm">Catatan Penting</h4>
            <ul class="list-disc list-inside space-y-0.5 text-[#64748B]">
                <li>Status ruangan diperbarui secara manual oleh petugas pustakawan bertugas.</li>
                <li>Jam istirahat perpustakaan: <strong>12.00 – 13.00 WIB</strong> (semua ruangan tidak dapat digunakan).</li>
                <li>Untuk reservasi di luar jam operasional (08.00–20.00 WIB), silakan hubungi petugas via WhatsApp.</li>
                <li>Ruang Konferensi memerlukan <strong>surat pengajuan resmi</strong> dari prodi/fakultas/organisasi kemahasiswaan.</li>
            </ul>
        </div>
    </div>
</section>

<!-- ROOM CARD DETAIL POP-UP MODAL -->
<div id="room-card-modal" class="fixed inset-0 z-50 bg-[#0F172A]/60 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 hidden transition-opacity duration-200">
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[92vh] flex flex-col shadow-2xl border border-[#E2E8F0] overflow-hidden transform transition-all duration-200 scale-95 opacity-0" id="room-modal-box">
        
        <!-- Header -->
        <div class="p-4 sm:p-5 border-b border-[#E2E8F0] bg-[#F8FAF7] flex items-start justify-between gap-4 shrink-0">
            <div class="flex items-center gap-3.5">
                <div id="rc-icon-bg" class="w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0 shadow-xs">
                    <span id="rc-icon" class="material-symbols-outlined text-2xl">meeting_room</span>
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1">
                        <span id="rc-category" class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-white text-[#0B6839] border border-[#DCFCE7]">Kategori</span>
                        <span id="rc-status-pill" class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#10B981] border border-[#DCFCE7]">Tersedia</span>
                    </div>
                    <h3 id="rc-title" class="text-base sm:text-lg font-bold text-[#0F172A] leading-tight">Nama Ruangan</h3>
                    <div class="flex flex-wrap items-center gap-2 text-xs text-[#64748B] mt-0.5">
                        <span id="rc-location" class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">location_on</span> Lantai 1</span>
                        <span class="text-[#CBD5E1]">•</span>
                        <span id="rc-capacity" class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-xs">group</span> Kapasitas</span>
                    </div>
                </div>
            </div>
            <button type="button" onclick="closeRoomCardModal()" class="w-8 h-8 rounded-lg text-[#94A3B8] hover:text-[#0F172A] hover:bg-white flex items-center justify-center transition-colors" title="Tutup">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>

        <!-- Navigation Tabs -->
        <div class="px-5 sm:px-6 bg-[#F8FAF7] border-b border-[#E2E8F0] flex items-center gap-2">
            <button type="button" id="tab-btn-calendar" onclick="switchRoomModalTab('calendar')" class="px-4 py-2.5 text-xs font-bold border-b-2 border-[#0B6839] text-[#0B6839] bg-white shadow-xs rounded-t-lg flex items-center gap-1.5 transition-all">
                <span class="material-symbols-outlined text-base">calendar_month</span>
                <span>Kalender & Jam Dipesan</span>
                <span class="px-1.5 py-0.2 rounded-full text-[9px] font-bold bg-[#DCFCE7] text-[#15803D]">Live</span>
            </button>
            <button type="button" id="tab-btn-info" onclick="switchRoomModalTab('info')" class="px-4 py-2.5 text-xs font-medium border-b-2 border-transparent text-[#64748B] hover:text-[#0F172A] flex items-center gap-1.5 transition-all">
                <span class="material-symbols-outlined text-base">info</span>
                <span>Deskripsi & Fasilitas</span>
            </button>
        </div>

        <!-- Body (Scrollable) -->
        <div class="p-5 sm:p-6 overflow-y-auto flex-1 text-xs sm:text-sm bg-white">
            
            <!-- TAB 1: KALENDER & JAM DIPESAN -->
            <div id="room-tab-calendar" class="space-y-4">
                <!-- Helper Banner -->
                <div class="p-3 sm:p-3.5 rounded-xl bg-[#F0FDF4] border border-[#DCFCE7] flex items-start gap-2.5 text-xs text-[#166534]">
                    <span class="material-symbols-outlined text-base text-[#10B981] shrink-0 mt-0.5">event_upcoming</span>
                    <div class="space-y-0.5">
                        <span class="font-bold">Informasi Ketersediaan Ruangan:</span>
                        <p class="text-[11px] text-[#15803D] leading-relaxed">
                            Pilih tanggal pada kalender untuk melihat jam berapa saja ruangan telah <strong>dipesan oleh pihak lain</strong> atau masih <strong>tersedia bebas</strong> untuk direservasi.
                        </p>
                    </div>
                </div>

                <!-- Calendar + Time Slots 2-Column Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">
                    
                    <!-- Left: Mini Calendar (lg:col-span-5) -->
                    <div class="lg:col-span-5 flex flex-col gap-3">
                        <div class="p-4 rounded-2xl bg-[#F8FAF7] border border-[#E2E8F0] shadow-xs space-y-3">
                            <!-- Calendar Month Header -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-base text-[#0B6839]">calendar_month</span>
                                    <h4 id="cal-month-year-title" class="font-bold text-xs sm:text-sm text-[#0F172A]">September 2026</h4>
                                </div>
                                <div class="flex items-center gap-1">
                                    <button type="button" onclick="changeCalendarMonth(-1)" class="w-7 h-7 rounded-lg bg-white border border-[#E2E8F0] hover:bg-[#F1F5F9] text-[#475569] flex items-center justify-center transition-colors" title="Bulan Sebelumnya">
                                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                                    </button>
                                    <button type="button" onclick="resetCalendarToToday()" class="px-2 py-1 rounded-lg bg-white border border-[#E2E8F0] hover:bg-[#F1F5F9] text-[10px] font-bold text-[#0B6839] transition-colors" title="Kembali ke Hari Ini">
                                        Hari Ini
                                    </button>
                                    <button type="button" onclick="changeCalendarMonth(1)" class="w-7 h-7 rounded-lg bg-white border border-[#E2E8F0] hover:bg-[#F1F5F9] text-[#475569] flex items-center justify-center transition-colors" title="Bulan Berikutnya">
                                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Day Headers (Min, Sen, Sel, Rab, Kam, Jum, Sab) -->
                            <div class="grid grid-cols-7 text-center text-[10px] font-bold text-[#64748B] py-1 border-b border-[#E2E8F0]">
                                <span class="text-[#EF4444]">Min</span>
                                <span>Sen</span>
                                <span>Sel</span>
                                <span>Rab</span>
                                <span>Kam</span>
                                <span>Jum</span>
                                <span>Sab</span>
                            </div>

                            <!-- Dates Grid (Generated by JS) -->
                            <div id="cal-dates-grid" class="grid grid-cols-7 gap-1 text-center">
                                <!-- Injected via renderCalendarGrid() -->
                            </div>

                            <!-- Calendar Legend -->
                            <div class="pt-2.5 border-t border-[#E2E8F0] flex flex-wrap items-center justify-between gap-2 text-[10px] text-[#64748B]">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-[#EF4444]"></span>
                                    <span>Ada Booking</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
                                    <span>Kosong</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-[#94A3B8]"></span>
                                    <span>Tutup</span>
                                </div>
                            </div>
                        </div>

                        <!-- Date Summary Card -->
                        <div id="cal-selected-summary" class="p-3.5 rounded-xl bg-white border border-[#E2E8F0] shadow-xs text-xs space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-semibold text-[#64748B]">Tanggal Terpilih:</span>
                                <span id="summary-date-badge" class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]">Hari Ini</span>
                            </div>
                            <div id="summary-date-text" class="font-bold text-[#0F172A] text-xs sm:text-sm">Rabu, 9 September 2026</div>
                            <div id="summary-status-desc" class="text-[11px] text-[#64748B] leading-snug">Memuat status jadwal...</div>
                        </div>
                    </div>

                    <!-- Right: Time Slots & Booked Hours List (lg:col-span-7) -->
                    <div class="lg:col-span-7 flex flex-col gap-3">
                        <!-- Top Header & Filter -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 pb-2 border-b border-[#E2E8F0]">
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-[#0F172A] flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-base text-[#0B6839]">schedule</span>
                                    <span>Jam Pemakaian Ruangan</span>
                                </h4>
                                <p class="text-[10px] text-[#64748B]">Operasional: 08.00 – 20.00 WIB (Senin – Sabtu)</p>
                            </div>

                            <!-- Filter Pills -->
                            <div class="inline-flex rounded-lg bg-[#F1F5F9] p-0.5 text-[10px] font-bold self-start sm:self-auto">
                                <button type="button" id="filter-btn-all" onclick="setSlotFilter('all')" class="px-2.5 py-1 rounded-md bg-white text-[#0B6839] shadow-xs transition-colors">
                                    Semua Jam
                                </button>
                                <button type="button" id="filter-btn-booked" onclick="setSlotFilter('booked')" class="px-2.5 py-1 rounded-md text-[#64748B] hover:text-[#0F172A] transition-colors">
                                    🔴 Dipesan (<span id="count-booked">0</span>)
                                </button>
                                <button type="button" id="filter-btn-available" onclick="setSlotFilter('available')" class="px-2.5 py-1 rounded-md text-[#64748B] hover:text-[#0F172A] transition-colors">
                                    🟢 Tersedia (<span id="count-available">0</span>)
                                </button>
                            </div>
                        </div>

                        <!-- Slots Timeline List Container -->
                        <div id="cal-slots-container" class="space-y-2.5 max-h-[370px] overflow-y-auto pr-1">
                            <!-- Injected dynamically by renderTimeSlots() -->
                        </div>

                        <!-- Notice Footer -->
                        <div class="p-3 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] flex items-center justify-between gap-3 text-xs">
                            <span class="text-[11px] text-[#64748B] flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm text-[#0B6839]">verified</span>
                                <span>Sinkron dengan Meja Petugas Perpustakaan USU</span>
                            </span>
                            <button type="button" onclick="handleRoomModalReserveClick()" class="usu-btn-primary px-3 py-1.5 text-[11px] font-bold flex items-center gap-1 shrink-0">
                                <span>Pesan Ruangan Ini</span>
                                <span class="material-symbols-outlined text-xs">arrow_forward</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- TAB 2: INFORMASI & FASILITAS -->
            <div id="room-tab-info" class="space-y-5 hidden">
                <!-- Deskripsi -->
                <div>
                    <h4 class="text-xs font-bold text-[#0F172A] uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-[#0B6839]">info</span>
                        <span>Deskripsi Ruangan</span>
                    </h4>
                    <p id="rc-desc" class="text-xs sm:text-sm leading-relaxed text-[#64748B]">Deskripsi lengkap ruangan.</p>
                </div>

                <!-- Jadwal & Sesi Hari Ini -->
                <div>
                    <h4 class="text-xs font-bold text-[#0F172A] uppercase tracking-wider mb-2 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-[#0B6839]">schedule</span>
                        <span>Ringkasan Sesi Hari Ini</span>
                    </h4>
                    <div id="rc-sessions-container" class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <!-- Session cards injected dynamically -->
                    </div>
                </div>

                <!-- Fasilitas -->
                <div>
                    <h4 class="text-xs font-bold text-[#0F172A] uppercase tracking-wider mb-2 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-[#0B6839]">check_circle</span>
                        <span>Fasilitas & Sarana Pendukung</span>
                    </h4>
                    <div id="rc-facilities-container" class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-[#475569]">
                        <!-- Facilities injected dynamically -->
                    </div>
                </div>

                <!-- Aturan & Ketentuan -->
                <div class="p-3.5 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] space-y-2">
                    <h4 class="font-bold text-[#0F172A] text-xs flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-[#0B6839]">gavel</span>
                        <span>Ketentuan Pemakaian Ruangan:</span>
                    </h4>
                    <ul id="rc-rules-container" class="list-disc list-inside text-xs space-y-1 text-[#64748B]">
                        <!-- Rules injected dynamically -->
                    </ul>
                </div>
            </div>

        </div>

        <!-- Footer Actions -->
        <div class="p-4 sm:p-5 border-t border-[#E2E8F0] bg-white flex flex-col sm:flex-row items-center justify-between gap-3 shrink-0">
            <button type="button" onclick="closeRoomCardModal()" class="w-full sm:w-auto px-5 py-2.5 rounded-xl border border-[#E2E8F0] text-xs font-bold text-[#64748B] hover:bg-[#F8FAF7] transition-colors order-2 sm:order-1">
                Tutup
            </button>
            <button type="button" id="rc-reserve-btn" onclick="handleRoomModalReserveClick()" class="w-full sm:w-auto usu-btn-primary px-6 py-2.5 text-xs font-bold flex items-center justify-center gap-2 shadow-sm order-1 sm:order-2">
                <span class="material-symbols-outlined text-sm">event_available</span>
                <span id="rc-reserve-btn-text">Lanjut Reservasi Ruangan</span>
            </button>
        </div>

    </div>
</div>

<style>
.card-expand-drawer {
    display: grid;
    grid-template-rows: 0fr;
    transition: grid-template-rows 320ms cubic-bezier(0.16, 1, 0.3, 1), opacity 240ms ease;
    opacity: 0;
}

.usu-card:hover .card-expand-drawer,
.card-expand-drawer.drawer-open {
    grid-template-rows: 1fr;
    opacity: 1;
}

.card-expand-content {
    min-height: 0;
    overflow: hidden;
}
</style>

<script>
const ROOM_DETAILS = {
    'tgcl': {
        key: 'tgcl',
        title: 'The Gade Creative Lounge (TGCL)',
        category: 'Coworking Space Komunal',
        icon: 'groups',
        location: 'Lantai 1 Gedung Perpustakaan USU',
        capacity: '40 Orang (Area Terbuka)',
        statusText: 'Tersedia Bebas',
        statusColor: 'green',
        desc: 'Coworking space modern hasil kerja sama dengan Pegadaian. Ruangan terbuka ber-AC yang nyaman untuk belajar mandiri, diskusi kelompok, dan kerja kolaboratif tanpa sekat kaku.',
        facilities: [
            '40+ Kursi & Meja Ergonomis',
            'Stopkontak di Setiap Meja',
            'Wi-Fi Kecepatan Tinggi (Eduroam & USU-Hotspot)',
            'AC Central & Pencahayaan Optimal',
            'Beanbag Area Santai'
        ],
        sessions: [
            { name: 'Sesi Saat Ini', status: 'Terbuka', badgeColor: 'green', desc: 'Bebas digunakan untuk belajar & diskusi mandiri', time: '10.30 - 20.00 WIB' },
            { name: 'Sesi Pagi', status: 'Selesai', badgeColor: 'gray', desc: 'Diskusi Komunitas Buku USU (Selesai)', time: '08.00 - 10.30 WIB' }
        ],
        rules: [
            'Dapat langsung digunakan tanpa reservasi jika kapasitas masih tersedia.',
            'Menjaga ketenangan dan kebersihan bersama.',
            'Dilarang membawa makanan berat ke dalam area lounge.'
        ],
        reserveLabel: 'Reservasi Slot TGCL'
    },
    'rubelin': {
        key: 'rubelin',
        title: 'Ruang Belajar Individu (RUBELIN)',
        category: 'Kubikel Hening Mandiri',
        icon: 'chair_alt',
        location: 'Lantai 1 Area Referensi Dosen & Pascasarjana',
        capacity: '5 Unit Kubikel Personal',
        statusText: '3 Unit Tersedia • 2 Dipinjam',
        statusColor: 'green',
        desc: '5 unit ruang belajar kubikel hening kedap suara khusus Dosen, Peneliti, dan Mahasiswa Pascasarjana (S2/S3) untuk fokus riset tesis/disertasi dan studi mandiri intensif.',
        facilities: [
            'Partisi Kedap Suara Hening',
            'Lampu Belajar LED Adjustable',
            '2x Stopkontak Listrik Mandiri',
            'Kursi Ergonomis High-back',
            'Akses Dekat Koleksi Buku Referensi'
        ],
        sessions: [
            { name: 'Kubikel 01', status: 'Dipinjam', badgeColor: 'red', desc: 'Peneliti S2 Biologi • Riset Tesis', time: '09.00 - 14.30 WIB' },
            { name: 'Kubikel 02', status: 'Dipinjam', badgeColor: 'red', desc: 'Dosen FEB • Penulisan Jurnal Scopus', time: '10.00 - 14.30 WIB' },
            { name: 'Kubikel 03', status: 'Tersedia', badgeColor: 'green', desc: 'Kosong & Siap Dipakai Langsung', time: 'Siap Pakai (Maks. 3 Jam)' },
            { name: 'Kubikel 04', status: 'Tersedia', badgeColor: 'green', desc: 'Kosong & Siap Dipakai Langsung', time: 'Siap Pakai (Maks. 3 Jam)' },
            { name: 'Kubikel 05', status: 'Tersedia', badgeColor: 'green', desc: 'Kosong & Siap Dipakai Langsung', time: 'Siap Pakai (Maks. 3 Jam)' }
        ],
        rules: [
            'Khusus Dosen, Peneliti, dan Mahasiswa Pascasarjana aktif USU.',
            'Maksimal peminjaman 3 jam per sesi (dapat diperpanjang jika tidak ada antrean).',
            'Wajib menjaga suasana hening dan tidak menerima panggilan telepon di dalam kubikel.'
        ],
        reserveLabel: 'Reservasi Unit RUBELIN'
    },
    'rapat-lt1': {
        key: 'rapat-lt1',
        title: 'Ruang Rapat / Diskusi Lantai 1',
        category: 'Ruang Rapat & Diskusi Terbuka',
        icon: 'meeting_room',
        location: 'Lantai 1 Gedung Perpustakaan USU',
        capacity: '3 Ruangan Total (2x 6 Orang, 1x 18 Orang)',
        statusText: '2 Tersedia • 1 Dipinjam',
        statusColor: 'red',
        desc: '3 unit ruang diskusi tertutup di Lantai 1 yang cocok untuk rapat prodi, bimbingan dosen, serta diskusi tugas kelompok.',
        facilities: [
            'Whiteboard Kaca & Spidol Lengkap',
            'Proyektor HD & Layar Presentasi',
            'Koneksi HDMI & Type-C Converter',
            'AC Split Mandiri',
            'Wi-Fi Dedicated Ruangan'
        ],
        sessions: [
            { name: 'Ruang Diskusi 1A', status: 'Dipinjam', badgeColor: 'red', desc: 'Kap. 6 Org • Rapat Prodi TI', time: '08.30 - 12.00 WIB' },
            { name: 'Ruang Diskusi 1B', status: 'Tersedia', badgeColor: 'green', desc: 'Kap. 6 Org • Kosong & Siap Dipakai', time: 'Siap Pakai (Bebas Pinjam)' },
            { name: 'Ruang Utama 1C', status: 'Tersedia sd 13.30', badgeColor: 'amber', desc: 'Kap. 18 Org • 13.30 ada Rapat Akreditasi', time: 'Bebas sd 13.30 WIB' }
        ],
        rules: [
            'Jumlah peserta minimal 4 orang untuk Ruang 1A/1B, dan minimal 10 orang untuk Ruang 1C.',
            'Reservasi dilakukan minimal 1 hari sebelumnya.',
            'Merapikan whiteboard dan mematikan AC/proyektor setelah selesai digunakan.'
        ],
        reserveLabel: 'Reservasi Ruang Diskusi Lt. 1'
    },
    'rapat-lt2': {
        key: 'rapat-lt2',
        title: 'Ruang Rapat / Diskusi Lantai 2',
        category: 'Ruang Rapat Kelompok',
        icon: 'group_work',
        location: 'Lantai 2 Gedung Perpustakaan USU',
        capacity: '2 Ruang (Kapasitas masing-masing 12 Orang)',
        statusText: '1 Siap • 1 Dipinjam',
        statusColor: 'red',
        desc: '2 ruang diskusi modern di Lantai 2 dilengkapi Smart TV 55 inci untuk presentasi nirkabel (wireless display), sangat ideal untuk sidang proposal, seminar kelompok, atau presentasi proyek.',
        facilities: [
            'Smart TV 55" dengan Screen Mirroring & HDMI',
            'Meja Konferensi U-Shape 12 Kursi',
            'Whiteboard Dinding',
            'AC Split & Ruangan Kedap Suara',
            'Stopkontak Multiple Port'
        ],
        sessions: [
            { name: 'Ruang Rapat 2A', status: 'Dipinjam', badgeColor: 'red', desc: 'Kap. 12 Org • Bimbingan Skripsi (Dr. Rina)', time: '09.00 - 15.00 WIB' },
            { name: 'Ruang Rapat 2B', status: 'Tersedia', badgeColor: 'green', desc: 'Kap. 12 Org • Siap & Bebas Dipakai', time: 'Siap Pakai (Bebas Pinjam)' }
        ],
        rules: [
            'Peserta minimal 6 orang per ruangan.',
            'Menyerahkan KTM salah satu penanggung jawab ke meja petugas saat check-in.',
            'Kabel HDMI dan remote TV dapat diambil di meja sirkulasi Lt. 2.'
        ],
        reserveLabel: 'Reservasi Ruang Diskusi Lt. 2'
    },
    'rapat-lt3': {
        key: 'rapat-lt3',
        title: 'Ruang Rapat Lantai 3 (Eksekutif)',
        category: 'Ruang Rapat Eksekutif',
        icon: 'forum',
        location: 'Lantai 3 Gedung Perpustakaan USU',
        capacity: '1 Ruang (Kapasitas 8 Orang)',
        statusText: 'Tersedia Saat Ini',
        statusColor: 'green',
        desc: 'Ruang rapat eksekutif di lantai 3 dengan suasana hening dan privat. Dilengkapi meja bundar dan kamera konferensi 360° untuk rapat hybrid.',
        facilities: [
            'Kamera Konferensi 360° & Mic Array Speakerphone',
            'Monitor Presentasi 50"',
            'Meja Bundar Eksekutif & Kursi Kulit Nyaman',
            'Acoustic Treatment Dinding Kedap Suara',
            'Wi-Fi Dedicated Cepat'
        ],
        sessions: [
            { name: 'Sesi Saat Ini', status: 'Kosong', badgeColor: 'green', desc: 'Siap digunakan untuk rapat terbatas', time: '08.00 - 15.30 WIB' },
            { name: 'Jadwal Sore Mendatang', status: 'Dipesan', badgeColor: 'amber', desc: 'Rapat Pustakawan & Koordinator', time: '15.30 - 17.30 WIB' }
        ],
        rules: [
            'Khusus untuk rapat pimpinan, dosen, bimbingan pasca, atau tamu universitas.',
            'Reservasi slot terlebih dahulu melalui portal web.',
            'Tersedia kopi & dispenser di pantry luar ruangan.'
        ],
        reserveLabel: 'Reservasi Ruang Rapat Lt. 3'
    },
    'konferensi': {
        key: 'konferensi',
        title: 'Ruang Konferensi (Auditorium Mini)',
        category: 'Auditorium & Mini Hall',
        icon: 'podium',
        location: 'Lantai 1 Sayap Barat Perpustakaan USU',
        capacity: 'Kapasitas 70 Orang (Theater Style)',
        statusText: 'Review Berkas Pengajuan',
        statusColor: 'amber',
        desc: 'Auditorium mini bertingkat dengan panggung, sound system profesional, dual projector, dan mic podium. Sangat representatif untuk seminar nasional, workshop, webinar, dan bedah buku.',
        facilities: [
            '70 Kursi Kuliah Lipat Berkualitas',
            'Panggung Mini & Podium Kayu Jati',
            'Dual Proyektor HD + Dual Screen Motorized',
            'Sound System & 4 Wireless Microphone',
            'Kamera Recording & Live Streaming Setup'
        ],
        sessions: [
            { name: 'Pengajuan Masuk', status: 'Verifikasi', badgeColor: 'amber', desc: 'Seminar Nasional Himpunan FT', time: '14.00 - 16.00 WIB' },
            { name: 'Sesi Pagi (Steril)', status: 'Steril', badgeColor: 'green', desc: 'Pembersihan ruangan & check sound', time: '08.00 - 13.30 WIB' }
        ],
        rules: [
            'Wajib menyertakan surat pengajuan resmi dari fakultas/prodi/lembaga.',
            'Pengajuan minimal H-3 sebelum tanggal pelaksanaan.',
            'Wajib melakukan gladi bersih teknis minimal H-1 bersama petugas IT perpustakaan.'
        ],
        reserveLabel: 'Ajukan Pemakaian Ruang Konferensi'
    }
};

// CALENDAR & BOOKING SCHEDULE STATE
let currentRoomModalKey = null;
let calCurrentYear = 2026;
let calCurrentMonth = 8; // 0-indexed: 8 = September
let calSelectedDateStr = '2026-09-09';
let calActiveFilter = 'all'; // 'all' | 'booked' | 'available'

const INDO_MONTHS = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

const INDO_DAYS = [
    'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
];

// Curated Booking Schedules for Specific Dates
const CURATED_SCHEDULES = {
    // TGCL
    'tgcl': {
        '2026-09-09': [
            { time: '08.00 - 10.30 WIB', status: 'booked', badge: 'Dipesan (Selesai)', title: 'Diskusi Komunitas Buku USU', organizer: 'UKM Literasi Mahasiswa', note: 'Diskusi mingguan bedah buku literatur sastra' },
            { time: '10.30 - 12.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Coworking Space Terbuka', organizer: 'Bebas Mahasiswa/Dosen', note: 'Siap digunakan untuk belajar mandiri tanpa reservasi' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Istirahat & Sterilisasi Ruangan', organizer: 'Petugas Perpustakaan USU', note: 'Layanan ruang rehat sejenak' },
            { time: '13.00 - 16.00 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Workshop UI/UX Design System', organizer: 'Google Developer Group (GDG) on Campus USU', note: 'Penanggung Jawab: Ahmad Fauzan (Fasilkom-TI)' },
            { time: '16.00 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Coworking Komunal Terbuka', organizer: 'Bebas Mahasiswa/Dosen', note: 'Slot kosong & stopkontak siap pakai' }
        ],
        '2026-09-10': [
            { time: '08.00 - 11.30 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Coworking Space Terbuka', organizer: 'Bebas Mahasiswa', note: 'Ruangan kosong & tenang' },
            { time: '11.30 - 12.00 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Sharing Session Inkubator Bisnis USU', organizer: 'Direktorat Prestasi Mahasiswa', note: 'PJ: Dr. Irwan Siregar' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Istirahat Perpustakaan', organizer: 'Petugas Perpustakaan USU', note: 'Sterilisasi area' },
            { time: '13.00 - 17.30 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Coworking Komunal Terbuka', organizer: 'Bebas Pemustaka', note: 'Kapasitas 40 kursi tersedia' },
            { time: '17.30 - 19.30 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Meetup Komunitas Python & AI USU', organizer: 'Komunitas Riset Informatika', note: 'Dipesan untuk presentasi riset AI' }
        ],
        '2026-09-11': [
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Coworking Komunal Terbuka', organizer: 'Bebas Sivitas Akademika', note: 'Tersedia 40 kursi' },
            { time: '12.00 - 13.30 WIB', status: 'break', badge: 'Jam Istirahat / Sholat Jumat', title: 'Istirahat Sholat Jumat', organizer: 'Perpustakaan USU', note: 'Semua ruangan tutup sementara' },
            { time: '13.30 - 16.00 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Mentoring Lomba Inovasi Nasional', organizer: 'BEM USU & Tim Mawapres', note: 'PJ: Nabila Azzahra' },
            { time: '16.00 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Coworking Komunal Terbuka', organizer: 'Bebas Mahasiswa', note: 'Bebas digunakan tanpa antrean' }
        ]
    },

    // RUBELIN
    'rubelin': {
        '2026-09-09': [
            { time: '08.00 - 09.00 WIB', status: 'available', badge: '5 Unit Tersedia', title: 'Kubikel 01 s/d 05 Bebas', organizer: 'Khusus Pasca / Peneliti', note: 'Kondisi steril dan hening' },
            { time: '09.00 - 14.30 WIB', status: 'booked', badge: 'Kubikel 01 Dipesan', title: 'Kubikel 01: Riset Tesis S2 Biologi', organizer: 'Peneliti: Rizky Ramadhan, S.Si', note: 'Fokus analisis genom tanaman lokal' },
            { time: '10.00 - 14.30 WIB', status: 'booked', badge: 'Kubikel 02 Dipesan', title: 'Kubikel 02: Penulisan Jurnal Scopus FEB', organizer: 'Dosen: Dr. Rina Safitri, S.E., M.Si.', note: 'Pengolahan data ekonometrika' },
            { time: '09.00 - 20.00 WIB', status: 'available', badge: 'Kubikel 03-05 Tersedia', title: 'Kubikel 03, 04, 05 Bebas Digunakan', organizer: 'Khusus Pascasarjana & Dosen', note: 'Siap langsung pakai (maks. 3 jam/sesi)' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Sterilisasi Hening Ruang Referensi', organizer: 'Perpustakaan USU', note: 'Pembersihan berkala kubikel' }
        ],
        '2026-09-10': [
            { time: '08.00 - 11.30 WIB', status: 'booked', badge: 'Kubikel 03 Dipesan', title: 'Kubikel 03: Penulisan Disertasi S3 Hukum', organizer: 'Peneliti: M. Yusuf, S.H., M.H.', note: 'Kajian hukum agraria Sumatera Utara' },
            { time: '08.00 - 20.00 WIB', status: 'available', badge: '4 Unit Tersedia', title: 'Kubikel 01, 02, 04, 05 Bebas Dipakai', organizer: 'Khusus Pasca / Dosen', note: 'Stopkontak & lampu LED siap pakai' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Istirahat Siang', organizer: 'Perpustakaan USU', note: 'Sterilisasi ruangan' },
            { time: '13.30 - 16.30 WIB', status: 'booked', badge: 'Kubikel 05 Dipesan', title: 'Kubikel 05: Riset Bioinformatika Kedokteran', organizer: 'Mahasiswa PPDS FK USU', note: 'Penelusuran database PubMed' }
        ]
    },

    // RAPAT LT 1
    'rapat-lt1': {
        '2026-09-09': [
            { time: '08.30 - 12.00 WIB', status: 'booked', badge: 'Ruang 1A Dipesan', title: 'Ruang 1A: Rapat Koordinasi Kurikulum TI', organizer: 'Prodi S1 Teknologi Informasi (Fasilkom-TI)', note: 'Peserta 6 Orang • Pembahasan Silabus MBKM' },
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Ruang 1B & 1C Tersedia', title: 'Ruang 1B (Kap. 6) & Ruang 1C (Kap. 18) Kosong', organizer: 'Bebas Direservasi', note: 'Proyektor & Whiteboard kaca siap digunakan' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Perpustakaan', organizer: 'Perpustakaan USU', note: 'Sterilisasi ruangan rapat' },
            { time: '13.30 - 16.30 WIB', status: 'booked', badge: 'Ruang 1C Dipesan', title: 'Ruang Utama 1C: Rapat Persiapan Akreditasi', organizer: 'Fakultas Teknik USU (Tim Akreditasi)', note: 'Peserta 14 Orang • Penanggung Jawab: Dr. Fahmi' },
            { time: '13.00 - 20.00 WIB', status: 'available', badge: 'Ruang 1A & 1B Tersedia', title: 'Ruang 1A & 1B Bebas Reservasi', organizer: 'Bebas Direservasi Sivitas', note: 'Dapat dipesan sekarang untuk sesi sore/malam' }
        ],
        '2026-09-10': [
            { time: '09.00 - 11.30 WIB', status: 'booked', badge: 'Ruang 1B Dipesan', title: 'Ruang 1B: Sidang Komprehensif Departemen Kimia', organizer: 'FMIPA USU • Ketua Sidang: Dr. Zulham', note: 'Peserta 5 Dosen Penguji' },
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Ruang 1A & 1C Tersedia', title: 'Ruang 1A & Ruang 1C Siap Digunakan', organizer: 'Bebas Direservasi', note: 'Tersedia proyektor HDMI' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Istirahat Siang', organizer: 'Perpustakaan USU', note: 'Semua ruangan jeda' },
            { time: '13.00 - 15.30 WIB', status: 'booked', badge: 'Ruang 1A Dipesan', title: 'Ruang 1A: Diskusi Perancangan Tugas Akhir Arsitektur', organizer: 'Kelompok Studio Arsitektur FT', note: 'Peserta 6 Orang Mahasiswa' },
            { time: '15.30 - 20.00 WIB', status: 'available', badge: 'Semua Ruang Tersedia', title: 'Ruang 1A, 1B, 1C Bebas', organizer: 'Bebas Reservasi', note: 'Slot malam kosong' }
        ]
    },

    // RAPAT LT 2
    'rapat-lt2': {
        '2026-09-09': [
            { time: '09.00 - 15.00 WIB', status: 'booked', badge: 'Ruang 2A Dipesan', title: 'Ruang 2A: Bimbingan Skripsi & Diskusi Lab', organizer: 'Dosen Pembimbing: Dr. Rina Safitri (Fasilkom-TI)', note: 'Peserta 8 Mahasiswa Bimbingan • Presentasi Progres' },
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Ruang 2B Tersedia', title: 'Ruang 2B (Kap. 12 Org) Kosong & Siap Pakai', organizer: 'Bebas Direservasi', note: 'Dilengkapi Smart TV 55" nirkabel' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Perpustakaan', organizer: 'Perpustakaan USU', note: 'Istirahat petugas' },
            { time: '13.00 - 20.00 WIB', status: 'available', badge: 'Ruang 2B Tersedia', title: 'Ruang 2B Bebas Digunakan', organizer: 'Bebas Direservasi', note: 'Koneksi HDMI & Screen Mirroring' },
            { time: '15.00 - 20.00 WIB', status: 'available', badge: 'Ruang 2A Tersedia', title: 'Ruang 2A Siap Digunakan (Sore)', organizer: 'Bebas Direservasi', note: 'Slot sore hingga malam masih kosong' }
        ],
        '2026-09-10': [
            { time: '08.30 - 11.30 WIB', status: 'booked', badge: 'Ruang 2B Dipesan', title: 'Ruang 2B: Rapat Dewan Redaksi Jurnal USU', organizer: 'Lembaga Penelitian USU (LPPM)', note: 'PJ: Prof. Hamdan • Review Artikel Ilmiah' },
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Ruang 2A Tersedia', title: 'Ruang 2A Kosong & Siap Dipakai', organizer: 'Bebas Reservasi', note: 'Smart TV & AC Split siap' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat', organizer: 'Perpustakaan USU', note: 'Pembersihan ruangan' },
            { time: '13.30 - 16.30 WIB', status: 'booked', badge: 'Ruang 2A Dipesan', title: 'Ruang 2A: Presentasi Proyek Magang MSIB', organizer: 'Tim Mahasiswa Magang Kemendikbud', note: 'Peserta 10 Mahasiswa' },
            { time: '16.30 - 20.00 WIB', status: 'available', badge: 'Semua Ruang Tersedia', title: 'Ruang 2A & 2B Kosong', organizer: 'Bebas Reservasi', note: 'Dapat dipesan sekarang' }
        ]
    },

    // RAPAT LT 3
    'rapat-lt3': {
        '2026-09-09': [
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Ruang Rapat Eksekutif Siap Dipakai', organizer: 'Bebas Reservasi', note: 'Meja bundar & kamera konferensi 360° siap' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Siang', organizer: 'Perpustakaan USU', note: 'Sterilisasi ruangan eksekutif' },
            { time: '13.00 - 15.30 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Slot Siang Kosong', organizer: 'Bebas Reservasi', note: 'Siap untuk rapat terbatas / pimpinan' },
            { time: '15.30 - 17.30 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Rapat Koordinasi Pustakawan & Koordinator Unit', organizer: 'Kepala Perpustakaan USU', note: 'Evaluasi layanan bulanan & SOP sirkulasi' },
            { time: '17.30 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Slot Malam Siap Reservasi', organizer: 'Bebas Reservasi', note: 'Tersedia pantry & dispenser kopi di luar' }
        ],
        '2026-09-10': [
            { time: '09.30 - 12.00 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Kunjungan Kerja Delegasi Perpustakaan Unand', organizer: 'Bagian Kerjasama Perpustakaan USU', note: 'Rapat benchmarking sistem otomasi perpustakaan' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat', organizer: 'Perpustakaan USU', note: 'Sterilisasi ruangan' },
            { time: '13.00 - 15.30 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Rapat Evaluasi Anggaran Triwulan', organizer: 'Bagian Keuangan & Perencanaan Perpustakaan', note: 'Peserta 8 Koordinator' },
            { time: '15.30 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Ruang Rapat Eksekutif Kosong', organizer: 'Bebas Reservasi', note: 'Dapat langsung direservasi' }
        ]
    },

    // KONFERENSI
    'konferensi': {
        '2026-09-09': [
            { time: '08.00 - 13.30 WIB', status: 'available', badge: 'Steril / Siap Pakai', title: 'Pembersihan Ruangan & Sound Check', organizer: 'Tim IT & Sound Perpustakaan', note: 'Dual proyektor & mic wireless diuji' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Petugas', organizer: 'Perpustakaan USU', note: 'Sterilisasi auditorium' },
            { time: '14.00 - 16.00 WIB', status: 'review', badge: 'Verifikasi Pengajuan', title: 'Pengajuan: Seminar Nasional Himpunan FT', organizer: 'Himpunan Mahasiswa Teknik Elektro', note: 'Estimasi 65 Peserta • Menunggu surat rekomendasi dekanat' },
            { time: '16.00 - 20.00 WIB', status: 'available', badge: 'Dapat Diajukan', title: 'Slot Sore/Malam Terbuka untuk Pengajuan', organizer: 'Fakultas / Prodi / Ormawa', note: 'Wajib surat pengajuan resmi min. H-3' }
        ],
        '2026-09-10': [
            { time: '08.30 - 12.30 WIB', status: 'booked', badge: 'Dipesan Resmi', title: 'Kuliah Umum: Transformasi Digital Perpustakaan di Era AI', organizer: 'BEM USU & Perpustakaan Universitas', note: 'Kapasitas penuh 70 Kursi • Disetujui WR I' },
            { time: '12.30 - 13.30 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Pembersihan Panggung & Ruangan', organizer: 'Petugas Perpustakaan USU', note: 'Pembersihan pasca acara' },
            { time: '13.30 - 20.00 WIB', status: 'available', badge: 'Dapat Diajukan', title: 'Slot Siap untuk Diajukan', organizer: 'Terbuka untuk Civitas', note: 'Pengajuan via portal web & persuratan resmi' }
        ]
    }
};

// DETERMINISTIC SCHEDULE RESOLVER FOR ANY DATE
function getRoomSchedule(roomKey, dateStr) {
    // Check specific curated schedule
    if (CURATED_SCHEDULES[roomKey] && CURATED_SCHEDULES[roomKey][dateStr]) {
        return CURATED_SCHEDULES[roomKey][dateStr];
    }

    const date = new Date(dateStr + 'T00:00:00');
    const dayOfWeek = date.getDay(); // 0 = Sunday, 6 = Saturday

    // Sunday: Library is closed
    if (dayOfWeek === 0) {
        return [
            {
                time: '08.00 - 20.00 WIB',
                status: 'closed',
                badge: 'Perpustakaan Tutup',
                title: 'Hari Minggu — Layanan Libur',
                organizer: 'Perpustakaan Universitas Sumatera Utara',
                note: 'Gedung Perpustakaan USU tutup pada hari Minggu. Silakan reservasi pada hari operasional (Senin s/d Sabtu).'
            }
        ];
    }

    // Saturday: Half-day / limited hours
    if (dayOfWeek === 6) {
        const hash = (date.getDate() * 7 + roomKey.length) % 3;
        if (hash === 0) {
            return [
                { time: '08.30 - 11.30 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Diskusi Kelompok Riset Akhir Pekan', organizer: 'Komunitas Mahasiswa Prestasi USU', note: 'Dipesan oleh kelompok riset mahasiswa' },
                { time: '11.30 - 14.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Slot Ruangan Siap Digunakan', organizer: 'Bebas Reservasi', note: 'Buka hingga pukul 14.00 WIB di hari Sabtu' }
            ];
        } else {
            return [
                { time: '08.00 - 14.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Ruangan Bebas Digunakan (Sabtu)', organizer: 'Bebas Reservasi', note: 'Operasional Sabtu: 08.00 – 14.00 WIB. Ruangan siap direservasi.' }
            ];
        }
    }

    // Weekdays (Monday - Friday): Generate realistic academic agenda based on deterministic hash
    const dayNumber = date.getDate();
    const seed = (dayNumber * 13 + roomKey.charCodeAt(0) + roomKey.charCodeAt(roomKey.length - 1)) % 4;

    const sampleBookings = [
        {
            org: 'Prodi Ilmu Komunikasi FISIP USU',
            topic: 'Sidang Ujian Proposal Skripsi & Bimbingan',
            contact: 'Dosen Pembimbing: Dr. Iskandar, M.Si.'
        },
        {
            org: 'Fakultas Farmasi USU (Tim Riset Herbal)',
            topic: 'Diskusi Kelompok Ekstraksi & Formulasi Obat',
            contact: 'Penanggung Jawab: Dr. Apt. Nurhasanah'
        },
        {
            org: 'Departemen Matematika FMIPA USU',
            topic: 'Workshop Analisis Data Statistik & SPSS',
            contact: 'Koordinator: Lab Komputasi FMIPA'
        },
        {
            org: 'Himpunan Mahasiswa Agroteknologi FP USU',
            topic: 'Rapat Koordinasi Seminar Nasional Pertanian',
            contact: 'Ketua Panitia: Rian Pratama'
        }
    ];

    const chosen = sampleBookings[seed];

    if (seed === 0) {
        // 1 Booking in morning, afternoon free
        return [
            { time: '09.00 - 12.00 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: chosen.topic, organizer: chosen.org, note: chosen.contact },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Perpustakaan', organizer: 'Perpustakaan USU', note: 'Sterilisasi ruangan' },
            { time: '13.00 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Ruangan Bebas Digunakan (Sesi Siang & Sore)', organizer: 'Bebas Reservasi', note: 'Slot kosong dan dapat langsung direservasi sekarang' }
        ];
    } else if (seed === 1) {
        // Morning free, 1 Booking in afternoon
        return [
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Ruangan Bebas Digunakan (Sesi Pagi)', organizer: 'Bebas Reservasi', note: 'Slot pagi siap pakai' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Perpustakaan', organizer: 'Perpustakaan USU', note: 'Sterilisasi ruangan' },
            { time: '13.30 - 16.30 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: chosen.topic, organizer: chosen.org, note: chosen.contact },
            { time: '16.30 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Slot Malam Siap Reservasi', organizer: 'Bebas Reservasi', note: 'Tersedia stopkontak & Wi-Fi' }
        ];
    } else if (seed === 2) {
        // 2 Bookings
        return [
            { time: '08.30 - 11.30 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: chosen.topic, organizer: chosen.org, note: chosen.contact },
            { time: '11.30 - 12.00 WIB', status: 'available', badge: 'Tersedia Singkat', title: 'Jeda Bebas Ruangan', organizer: 'Bebas Dipakai', note: 'Bebas 30 menit sebelum istirahat' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Perpustakaan', organizer: 'Perpustakaan USU', note: 'Pembersihan ruangan' },
            { time: '14.00 - 16.30 WIB', status: 'booked', badge: 'Dipesan Orang Lain', title: 'Bimbingan Tugas Akhir & Riset Kelompok', organizer: 'Prodi S1 Manajemen FEB USU', note: 'PJ: Dosen Pembimbing Utama' },
            { time: '16.30 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Ruangan Bebas Digunakan (Sore/Malam)', organizer: 'Bebas Reservasi', note: 'Siap untuk dipesan' }
        ];
    } else {
        // Fully free day!
        return [
            { time: '08.00 - 12.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Sesi Pagi: Ruangan Bebas Tanpa Pemesanan', organizer: 'Bebas Reservasi', note: 'Seluruh fasilitas siap digunakan' },
            { time: '12.00 - 13.00 WIB', status: 'break', badge: 'Jam Istirahat', title: 'Jam Istirahat Perpustakaan', organizer: 'Perpustakaan USU', note: 'Sterilisasi ruangan' },
            { time: '13.00 - 20.00 WIB', status: 'available', badge: 'Tersedia Bebas', title: 'Sesi Siang & Sore: Ruangan Bebas Penuh', organizer: 'Bebas Reservasi', note: 'Dapat langsung direservasi melalui tombol di bawah' }
        ];
    }
}

// DATE FORMATTING HELPERS
function formatDateKey(year, month, day) {
    const y = year;
    const m = String(month + 1).padStart(2, '0');
    const d = String(day).padStart(2, '0');
    return `${y}-${m}-${d}`;
}

function formatIndonesianDateText(dateStr) {
    const parts = dateStr.split('-');
    const year = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10) - 1;
    const day = parseInt(parts[2], 10);
    const d = new Date(year, month, day);
    const dayName = INDO_DAYS[d.getDay()];
    const monthName = INDO_MONTHS[month];
    return `${dayName}, ${day} ${monthName} ${year}`;
}

// RENDER CALENDAR GRID
function renderCalendarGrid() {
    const gridEl = document.getElementById('cal-dates-grid');
    if (!gridEl) return;

    document.getElementById('cal-month-year-title').innerText = `${INDO_MONTHS[calCurrentMonth]} ${calCurrentYear}`;

    // First day of month & total days
    const firstDayIndex = new Date(calCurrentYear, calCurrentMonth, 1).getDay(); // 0 = Sun
    const totalDays = new Date(calCurrentYear, calCurrentMonth + 1, 0).getDate();
    const prevMonthDays = new Date(calCurrentYear, calCurrentMonth, 0).getDate();

    let html = '';

    // Previous month filler days
    for (let i = firstDayIndex - 1; i >= 0; i--) {
        const prevDay = prevMonthDays - i;
        html += `
            <div class="h-9 flex flex-col items-center justify-center text-[10px] text-[#CBD5E1] rounded-lg cursor-not-allowed select-none">
                <span>${prevDay}</span>
            </div>
        `;
    }

    // Today representation
    const realToday = new Date();
    const realTodayStr = formatDateKey(realToday.getFullYear(), realToday.getMonth(), realToday.getDate());

    // Current month days
    for (let day = 1; day <= totalDays; day++) {
        const dateStr = formatDateKey(calCurrentYear, calCurrentMonth, day);
        const dayDate = new Date(calCurrentYear, calCurrentMonth, day);
        const isSunday = dayDate.getDay() === 0;
        const isSelected = dateStr === calSelectedDateStr;
        const isToday = dateStr === realTodayStr;

        // Check bookings for dot indicator
        const schedule = getRoomSchedule(currentRoomModalKey || 'tgcl', dateStr);
        const bookedCount = schedule.filter(s => s.status === 'booked').length;
        const hasReview = schedule.some(s => s.status === 'review');
        const isClosed = schedule.some(s => s.status === 'closed');

        let dotColor = 'bg-[#10B981]'; // free by default
        if (isClosed || isSunday) {
            dotColor = 'bg-[#94A3B8]'; // closed
        } else if (bookedCount > 0) {
            dotColor = 'bg-[#EF4444]'; // has bookings
        } else if (hasReview) {
            dotColor = 'bg-[#F59E0B]'; // under review
        }

        let cellClasses = 'h-9 rounded-xl flex flex-col items-center justify-center relative text-xs transition-all cursor-pointer font-medium ';
        if (isSelected) {
            cellClasses += 'bg-[#0B6839] text-white font-bold shadow-sm scale-105 z-10';
        } else if (isToday) {
            cellClasses += 'bg-[#F0FDF4] text-[#0B6839] font-bold border border-[#10B981] hover:bg-[#DCFCE7]';
        } else if (isSunday) {
            cellClasses += 'text-[#94A3B8] hover:bg-[#F1F5F9]';
        } else {
            cellClasses += 'text-[#0F172A] hover:bg-white hover:shadow-xs hover:border-[#E2E8F0] border border-transparent';
        }

        html += `
            <button type="button" onclick="selectCalendarDate('${dateStr}')" class="${cellClasses}" title="${formatIndonesianDateText(dateStr)}">
                <span>${day}</span>
                <span class="w-1.5 h-1.5 rounded-full ${isSelected ? 'bg-white' : dotColor} mt-0.5"></span>
            </button>
        `;
    }

    gridEl.innerHTML = html;
}

// SELECT A DATE ON THE CALENDAR
function selectCalendarDate(dateStr) {
    calSelectedDateStr = dateStr;
    renderCalendarGrid();
    renderTimeSlots();
}

// NAVIGATION MONTH
function changeCalendarMonth(delta) {
    calCurrentMonth += delta;
    if (calCurrentMonth < 0) {
        calCurrentMonth = 11;
        calCurrentYear--;
    } else if (calCurrentMonth > 11) {
        calCurrentMonth = 0;
        calCurrentYear++;
    }
    renderCalendarGrid();
}

function resetCalendarToToday() {
    const today = new Date();
    calCurrentYear = today.getFullYear();
    calCurrentMonth = today.getMonth();
    calSelectedDateStr = formatDateKey(today.getFullYear(), today.getMonth(), today.getDate());
    renderCalendarGrid();
    renderTimeSlots();
}

// SET TIME SLOT FILTER
function setSlotFilter(filterType) {
    calActiveFilter = filterType;

    const btnAll = document.getElementById('filter-btn-all');
    const btnBooked = document.getElementById('filter-btn-booked');
    const btnAvailable = document.getElementById('filter-btn-available');

    [btnAll, btnBooked, btnAvailable].forEach(btn => {
        btn.className = 'px-2.5 py-1 rounded-md text-[#64748B] hover:text-[#0F172A] transition-colors';
    });

    if (filterType === 'all') {
        btnAll.className = 'px-2.5 py-1 rounded-md bg-white text-[#0B6839] shadow-xs font-bold';
    } else if (filterType === 'booked') {
        btnBooked.className = 'px-2.5 py-1 rounded-md bg-white text-[#EF4444] shadow-xs font-bold';
    } else if (filterType === 'available') {
        btnAvailable.className = 'px-2.5 py-1 rounded-md bg-white text-[#10B981] shadow-xs font-bold';
    }

    renderTimeSlots();
}

// RENDER TIME SLOTS LIST FOR SELECTED DATE
function renderTimeSlots() {
    const container = document.getElementById('cal-slots-container');
    if (!container) return;

    const formattedDate = formatIndonesianDateText(calSelectedDateStr);
    document.getElementById('summary-date-text').innerText = formattedDate;

    // Is it today?
    const realToday = new Date();
    const realTodayStr = formatDateKey(realToday.getFullYear(), realToday.getMonth(), realToday.getDate());
    const badgeEl = document.getElementById('summary-date-badge');
    if (calSelectedDateStr === realTodayStr) {
        badgeEl.innerText = 'Hari Ini';
        badgeEl.className = 'px-2 py-0.5 rounded text-[10px] font-bold bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]';
    } else {
        badgeEl.innerText = 'Mendatang';
        badgeEl.className = 'px-2 py-0.5 rounded text-[10px] font-bold bg-[#F8FAF7] text-[#64748B] border border-[#E2E8F0]';
    }

    const schedule = getRoomSchedule(currentRoomModalKey || 'tgcl', calSelectedDateStr);

    const bookedSlots = schedule.filter(s => s.status === 'booked');
    const availableSlots = schedule.filter(s => s.status === 'available');

    document.getElementById('count-booked').innerText = bookedSlots.length;
    document.getElementById('count-available').innerText = availableSlots.length;

    // Summary description
    const summaryDesc = document.getElementById('summary-status-desc');
    if (schedule.some(s => s.status === 'closed')) {
        summaryDesc.innerHTML = `<span class="text-[#EF4444] font-medium">Layanan Libur</span> • Perpustakaan USU Tutup.`;
    } else if (bookedSlots.length > 0) {
        summaryDesc.innerHTML = `<strong class="text-[#EF4444]">${bookedSlots.length} sesi dipesan orang lain</strong> • ${availableSlots.length} slot jam masih bebas.`;
    } else {
        summaryDesc.innerHTML = `<strong class="text-[#10B981]">Ruangan Kosong Seharian</strong> • Bebas dipesan kapan saja.`;
    }

    // Filter slots according to active filter
    let visibleSlots = schedule;
    if (calActiveFilter === 'booked') {
        visibleSlots = schedule.filter(s => s.status === 'booked' || s.status === 'review');
    } else if (calActiveFilter === 'available') {
        visibleSlots = schedule.filter(s => s.status === 'available');
    }

    if (visibleSlots.length === 0) {
        container.innerHTML = `
            <div class="p-6 text-center rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] space-y-2">
                <span class="material-symbols-outlined text-3xl text-[#94A3B8]">filter_alt_off</span>
                <p class="text-xs font-bold text-[#0F172A]">Tidak Ada Sesi yang Sesuai Filter</p>
                <p class="text-[11px] text-[#64748B]">Tidak ditemukan jam peminjaman untuk filter yang Anda pilih di tanggal ini.</p>
                <button type="button" onclick="setSlotFilter('all')" class="usu-btn-secondary px-3 py-1.5 text-xs font-bold inline-flex items-center gap-1 mt-1">
                    <span>Lihat Semua Jam</span>
                </button>
            </div>
        `;
        return;
    }

    container.innerHTML = visibleSlots.map(s => {
        if (s.status === 'booked') {
            return `
                <div class="p-3.5 rounded-xl bg-[#FEF2F2]/60 border border-[#FEE2E2] shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3 transition-all hover:bg-[#FEF2F2]">
                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1 text-xs font-mono font-extrabold text-[#EF4444] bg-white px-2.5 py-0.5 rounded-md border border-[#FEE2E2] shadow-2xs">
                                <span class="material-symbols-outlined text-xs">timer</span>
                                <span>${s.time}</span>
                            </span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#EF4444] text-white flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-white animate-ping"></span>
                                <span>${s.badge}</span>
                            </span>
                        </div>
                        <h5 class="text-xs sm:text-sm font-bold text-[#0F172A] mt-1">${s.title}</h5>
                        <p class="text-[11px] text-[#475569] font-medium flex items-center gap-1">
                            <span class="material-symbols-outlined text-xs text-[#0B6839]">person</span>
                            <span>${s.organizer}</span>
                        </p>
                        <p class="text-[10px] text-[#64748B] italic">${s.note}</p>
                    </div>
                    <div class="sm:text-right shrink-0">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-white border border-[#FEE2E2] text-[10px] font-bold text-[#EF4444]">
                            <span class="material-symbols-outlined text-xs">block</span>
                            <span>Tidak Dapat Dipesan</span>
                        </span>
                    </div>
                </div>
            `;
        } else if (s.status === 'available') {
            return `
                <div class="p-3.5 rounded-xl bg-[#F0FDF4]/60 border border-[#DCFCE7] shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3 transition-all hover:bg-[#F0FDF4]">
                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1 text-xs font-mono font-extrabold text-[#0B6839] bg-white px-2.5 py-0.5 rounded-md border border-[#DCFCE7] shadow-2xs">
                                <span class="material-symbols-outlined text-xs">check_circle</span>
                                <span>${s.time}</span>
                            </span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#DCFCE7] text-[#15803D] border border-[#BBF7D0]">
                                ${s.badge}
                            </span>
                        </div>
                        <h5 class="text-xs sm:text-sm font-bold text-[#0F172A] mt-1">${s.title}</h5>
                        <p class="text-[11px] text-[#15803D] font-medium">${s.note}</p>
                    </div>
                    <div class="sm:text-right shrink-0">
                        <button type="button" onclick="reserveSpecificSlot('${s.time}')" class="usu-btn-primary px-3 py-1.5 text-xs font-bold flex items-center justify-center gap-1.5 shadow-2xs hover:shadow-xs whitespace-nowrap">
                            <span class="material-symbols-outlined text-xs">touch_app</span>
                            <span>Pilih Jam Ini</span>
                        </button>
                    </div>
                </div>
            `;
        } else if (s.status === 'break') {
            return `
                <div class="p-2.5 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] flex items-center justify-between gap-3 text-xs text-[#64748B]">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-md bg-[#F1F5F9] text-[#64748B] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xs">bedtime</span>
                        </span>
                        <div>
                            <span class="font-bold text-[#0F172A] font-mono">${s.time}</span> • <span class="font-medium">${s.title}</span>
                            <span class="block text-[10px] text-[#94A3B8]">${s.note}</span>
                        </div>
                    </div>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-[#F1F5F9] text-[#64748B] font-semibold border border-[#E2E8F0]">Jam Istirahat</span>
                </div>
            `;
        } else if (s.status === 'review') {
            return `
                <div class="p-3.5 rounded-xl bg-[#FFFBEB]/70 border border-[#FEF3C7] shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1 text-xs font-mono font-extrabold text-[#B45309] bg-white px-2.5 py-0.5 rounded-md border border-[#FEF3C7]">
                                <span class="material-symbols-outlined text-xs">pending</span>
                                <span>${s.time}</span>
                            </span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#FEF3C7] text-[#B45309] border border-[#FDE68A]">
                                ${s.badge}
                            </span>
                        </div>
                        <h5 class="text-xs sm:text-sm font-bold text-[#0F172A] mt-1">${s.title}</h5>
                        <p class="text-[11px] text-[#92400E] font-medium">${s.organizer}</p>
                        <p class="text-[10px] text-[#64748B]">${s.note}</p>
                    </div>
                    <div class="sm:text-right shrink-0">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-white border border-[#FEF3C7] text-[10px] font-bold text-[#B45309]">
                            <span>Dalam Proses Review</span>
                        </span>
                    </div>
                </div>
            `;
        } else {
            // Closed / Library Holiday
            return `
                <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] text-center space-y-1 text-xs">
                    <span class="material-symbols-outlined text-2xl text-[#94A3B8]">lock</span>
                    <h5 class="font-bold text-[#0F172A]">${s.title}</h5>
                    <p class="text-[11px] text-[#64748B] max-w-md mx-auto">${s.note}</p>
                </div>
            `;
        }
    }).join('');
}

// SWITCH TABS IN MODAL
function switchRoomModalTab(tabName) {
    const tabCal = document.getElementById('room-tab-calendar');
    const tabInfo = document.getElementById('room-tab-info');
    const btnCal = document.getElementById('tab-btn-calendar');
    const btnInfo = document.getElementById('tab-btn-info');

    if (tabName === 'calendar') {
        tabCal.classList.remove('hidden');
        tabInfo.classList.add('hidden');
        btnCal.className = 'px-4 py-2.5 text-xs font-bold border-b-2 border-[#0B6839] text-[#0B6839] bg-white shadow-xs rounded-t-lg flex items-center gap-1.5 transition-all';
        btnInfo.className = 'px-4 py-2.5 text-xs font-medium border-b-2 border-transparent text-[#64748B] hover:text-[#0F172A] flex items-center gap-1.5 transition-all';
    } else {
        tabCal.classList.add('hidden');
        tabInfo.classList.remove('hidden');
        btnCal.className = 'px-4 py-2.5 text-xs font-medium border-b-2 border-transparent text-[#64748B] hover:text-[#0F172A] flex items-center gap-1.5 transition-all';
        btnInfo.className = 'px-4 py-2.5 text-xs font-bold border-b-2 border-[#0B6839] text-[#0B6839] bg-white shadow-xs rounded-t-lg flex items-center gap-1.5 transition-all';
    }
}

// OPEN ROOM CARD MODAL WITH CALENDAR
function openRoomCardModal(roomKey) {
    const data = ROOM_DETAILS[roomKey];
    if (!data) return;
    currentRoomModalKey = roomKey;

    document.getElementById('rc-icon').innerText = data.icon;
    document.getElementById('rc-title').innerText = data.title;
    document.getElementById('rc-category').innerText = data.category;
    document.getElementById('rc-location').innerHTML = `<span class="material-symbols-outlined text-xs">location_on</span> ${data.location}`;
    document.getElementById('rc-capacity').innerHTML = `<span class="material-symbols-outlined text-xs">group</span> ${data.capacity}`;
    document.getElementById('rc-desc').innerText = data.desc;

    // Status pill & icon background color
    const statusPill = document.getElementById('rc-status-pill');
    const iconBg = document.getElementById('rc-icon-bg');
    statusPill.innerText = data.statusText;
    if (data.statusColor === 'green') {
        statusPill.className = 'text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#10B981] border border-[#DCFCE7]';
        iconBg.className = 'w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0 shadow-xs';
    } else if (data.statusColor === 'amber') {
        statusPill.className = 'text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#FFFBEB] text-[#F59E0B] border border-[#FEF3C7]';
        iconBg.className = 'w-12 h-12 rounded-xl bg-[#FFFBEB] text-[#B45309] flex items-center justify-center shrink-0 shadow-xs';
    } else {
        statusPill.className = 'text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#FEF2F2] text-[#EF4444] border border-[#FEE2E2]';
        iconBg.className = 'w-12 h-12 rounded-xl bg-[#FEF2F2] text-[#EF4444] flex items-center justify-center shrink-0 shadow-xs';
    }

    // Sessions (for Tab 2)
    const sessionsContainer = document.getElementById('rc-sessions-container');
    sessionsContainer.innerHTML = data.sessions.map(s => {
        let badgeBg = s.badgeColor === 'green' ? 'bg-[#F0FDF4] text-[#10B981] border-[#DCFCE7]' : (s.badgeColor === 'amber' ? 'bg-[#FFFBEB] text-[#B45309] border-[#FEF3C7]' : (s.badgeColor === 'red' ? 'bg-[#FEF2F2] text-[#EF4444] border-[#FEE2E2]' : 'bg-[#F1F5F9] text-[#64748B] border-[#E2E8F0]'));
        let dotBg = s.badgeColor === 'green' ? 'bg-[#10B981]' : (s.badgeColor === 'amber' ? 'bg-[#F59E0B]' : (s.badgeColor === 'red' ? 'bg-[#EF4444]' : 'bg-[#94A3B8]'));
        return `
            <div class="p-3 rounded-xl bg-white border border-[#E2E8F0] shadow-xs flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <div class="flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full ${dotBg} shrink-0"></span>
                        <span class="text-xs font-bold text-[#0F172A] truncate">${s.name}</span>
                        <span class="text-[9px] px-1.5 py-0.2 rounded font-semibold border ${badgeBg}">${s.status}</span>
                    </div>
                    <p class="text-[11px] text-[#64748B] pl-3.5 mt-0.5 truncate">${s.desc}</p>
                </div>
                <div class="text-right shrink-0">
                    <span class="text-xs font-bold ${s.badgeColor === 'red' ? 'text-[#EF4444]' : (s.badgeColor === 'amber' ? 'text-[#B45309]' : 'text-[#10B981]')} font-mono">${s.time}</span>
                </div>
            </div>
        `;
    }).join('');

    // Facilities (for Tab 2)
    const facilitiesContainer = document.getElementById('rc-facilities-container');
    facilitiesContainer.innerHTML = data.facilities.map(f => `
        <div class="flex items-center gap-2 p-2 rounded-lg bg-white border border-[#E2E8F0]">
            <span class="material-symbols-outlined text-sm text-[#0B6839]">check</span>
            <span class="truncate">${f}</span>
        </div>
    `).join('');

    // Rules (for Tab 2)
    const rulesContainer = document.getElementById('rc-rules-container');
    rulesContainer.innerHTML = data.rules.map(r => `<li>${r}</li>`).join('');

    // Reserve Button label
    document.getElementById('rc-reserve-btn-text').innerText = data.reserveLabel;

    // Reset calendar to today and active filter
    const now = new Date();
    calCurrentYear = now.getFullYear();
    calCurrentMonth = now.getMonth();
    calSelectedDateStr = formatDateKey(now.getFullYear(), now.getMonth(), now.getDate());
    calActiveFilter = 'all';

    // Switch to calendar tab by default
    switchRoomModalTab('calendar');
    setSlotFilter('all');
    renderCalendarGrid();
    renderTimeSlots();

    // Show modal with animation
    const modal = document.getElementById('room-card-modal');
    const box = document.getElementById('room-modal-box');
    modal.classList.remove('hidden');
    setTimeout(() => {
        box.classList.remove('scale-95', 'opacity-0');
        box.classList.add('scale-100', 'opacity-100');
    }, 10);
    document.body.style.overflow = 'hidden';
}

function closeRoomCardModal() {
    const modal = document.getElementById('room-card-modal');
    const box = document.getElementById('room-modal-box');
    if (box) {
        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-95', 'opacity-0');
    }
    setTimeout(() => {
        if (modal) modal.classList.add('hidden');
        document.body.style.overflow = '';
    }, 180);
}

// RESERVATION BUTTON CLICKS
function handleRoomModalReserveClick() {
    const key = currentRoomModalKey;
    const dateVal = calSelectedDateStr;
    closeRoomCardModal();
    if (key) {
        setTimeout(() => {
            openUniversalReservationModal(key, dateVal);
        }, 200);
    }
}

function reserveSpecificSlot(slotTime) {
    const key = currentRoomModalKey;
    const dateVal = calSelectedDateStr;
    closeRoomCardModal();
    if (key) {
        setTimeout(() => {
            openUniversalReservationModal(key, dateVal, slotTime);
        }, 200);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Backdrop click close
    const roomModal = document.getElementById('room-card-modal');
    if (roomModal) {
        roomModal.addEventListener('click', (e) => {
            if (e.target === roomModal) {
                closeRoomCardModal();
            }
        });
    }

    // Escape key close
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeRoomCardModal();
        }
    });

    // Mobile tap support: click card to toggle drawer
    const cards = document.querySelectorAll('.usu-card');
    cards.forEach(card => {
        card.addEventListener('click', (e) => {
            if (e.target.closest('button, a')) return;
            const drawer = card.querySelector('.card-expand-drawer');
            if (drawer && window.innerWidth < 1024) {
                const isOpen = drawer.classList.contains('drawer-open');
                document.querySelectorAll('.card-expand-drawer.drawer-open').forEach(d => {
                    d.classList.remove('drawer-open');
                });
                if (!isOpen) {
                    drawer.classList.add('drawer-open');
                }
            }
        });
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.usu-card') && window.innerWidth < 1024) {
            document.querySelectorAll('.card-expand-drawer.drawer-open').forEach(d => {
                d.classList.remove('drawer-open');
            });
        }
    });
});
</script>
@endsection
