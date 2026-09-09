@extends('layouts.app')

@section('title', 'Layanan Luring (Onsite) — Perpustakaan Universitas Sumatera Utara')
@section('meta_description', 'Layanan Luring (Onsite) Perpustakaan USU meliputi Sirkulasi, Keanggotaan, Bimbingan Pengguna, Ruang Referensi Dosen & Pascasarjana, serta Kelas Literasi Informasi.')

@section('content')
<!-- BREADCRUMB -->
<div class="flex items-center gap-2 text-xs text-[#64748B]">
    <a href="{{ route('beranda') }}" class="hover:text-[#0B6839] flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">home</span>
        <span>Beranda</span>
    </a>
    <span class="text-[#CBD5E1]">/</span>
    <span class="text-[#0B6839] font-bold">Layanan Luring (Onsite)</span>
</div>

<!-- HERO HEADER -->
<section class="rounded-2xl usu-hero-bg text-white p-8 sm:p-10 shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="relative z-10 max-w-3xl space-y-3">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-xs text-[#F6AE01] text-xs font-bold">
            <span class="material-symbols-outlined text-sm">storefront</span>
            <span>Layanan Perpustakaan Tatap Muka (Onsite)</span>
        </div>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight">
            Layanan Luring (Onsite)
        </h1>
        <p class="text-xs sm:text-sm text-white/90 leading-relaxed max-w-2xl">
            Layanan tatap muka langsung di Gedung Perpustakaan Universitas dan 14 Perpustakaan Cabang di seluruh Fakultas lingkungan USU, mencakup sirkulasi terpadu, aktivasi barcode KTM, bimbingan pengguna, serta pelatihan literasi informasi.
        </p>
    </div>
    <div class="absolute right-4 bottom-0 top-0 opacity-10 flex items-center justify-end pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">storefront</span>
    </div>
</section>

<!-- SERVICES LIST -->
<section class="space-y-6">
    <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-3">
        <div>
            <h2 class="text-lg font-bold text-[#0F172A]">Daftar Layanan Luring Resmi</h2>
            <p class="text-xs text-[#64748B]">Pilih layanan untuk melihat ketentuan, persyaratan, lokasi meja pelayanan, dan reservasi.</p>
        </div>
        <span class="text-xs font-bold text-[#0B6839] bg-[#F0FDF4] px-3 py-1 rounded-full border border-[#DCFCE7]">5 Layanan Aktif</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Card 1: Sirkulasi -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">sync_alt</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]">Lantai 1</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Layanan Sirkulasi</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Peminjaman, pengembalian, perpanjangan, dan pembayaran denda terintegrasi antar perpustakaan pusat & 14 cabang USU.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Lokasi:</strong> Meja Sirkulasi Lantai 1</div>
                    <div><strong>Ketentuan:</strong> Maks. 3 buku (7 hari kerja)</div>
                    <div><strong>Kontak:</strong> WA 0812-6215-8587</div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('sirkulasi')" class="usu-btn-secondary py-2 text-xs text-center">
                    Detail Info
                </button>
                <button type="button" onclick="openUniversalReservationModal('sirkulasi')" class="usu-btn-primary py-2 text-xs text-center">
                    Reservasi
                </button>
            </div>
        </div>

        <!-- Card 2: Keanggotaan -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">badge</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]">Lantai 2</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Layanan Keanggotaan</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Aktivasi barcode KTM mahasiswa, penerbitan kartu anggota tamu luar universitas, dan pengurusan SKBP onsite.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Lokasi:</strong> Lantai 2 Front Office</div>
                    <div><strong>Syarat:</strong> KTM Aktif / KTP Pengenal</div>
                    <div><strong>Kontak:</strong> WA 0812-6215-8587</div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('keanggotaan')" class="usu-btn-secondary py-2 text-xs text-center">
                    Detail Info
                </button>
                <button type="button" onclick="openUniversalReservationModal('keanggotaan')" class="usu-btn-primary py-2 text-xs text-center">
                    Reservasi
                </button>
            </div>
        </div>

        <!-- Card 3: Bimbingan Pengguna -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">support_agent</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]">Tatap Muka</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Layanan Bimbingan Pengguna</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Bimbingan pemustaka dalam menelusuri katalog buku, database daring langganan USU, dan orientasi perpustakaan.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Lokasi:</strong> Meja Informasi / Front Desk</div>
                    <div><strong>Sasaran:</strong> Mhs Baru, S1, S2, S3, Tamu</div>
                    <div><strong>Kontak:</strong> WA 0812-6260-2129</div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('bimbingan')" class="usu-btn-secondary py-2 text-xs text-center">
                    Detail Info
                </button>
                <button type="button" onclick="openUniversalReservationModal('bimbingan')" class="usu-btn-primary py-2 text-xs text-center">
                    Reservasi
                </button>
            </div>
        </div>

        <!-- Card 4: Referensi Dosen & Pascasarjana -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">menu_book</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]">Dosen & Pasca</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Referensi Dosen & Pascasarjana</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Ruang hening di Lantai 1 khusus dosen dan mahasiswa pascasarjana untuk riset, penulisan artikel ilmiah, dan komputer riset.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Lokasi:</strong> Lantai 1 Ruang Referensi</div>
                    <div><strong>Fasilitas:</strong> Wi-Fi, PC Publik, 5 RUBELIN</div>
                    <div><strong>Kontak:</strong> WA 0812-6260-2129</div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('referensi')" class="usu-btn-secondary py-2 text-xs text-center">
                    Detail Info
                </button>
                <button type="button" onclick="openUniversalReservationModal('referensi')" class="usu-btn-primary py-2 text-xs text-center">
                    Reservasi
                </button>
            </div>
        </div>

        <!-- Card 5: Kelas Literasi Informasi -->
        <div class="usu-card p-6 flex flex-col justify-between md:col-span-2 lg:col-span-2">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">co_present</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] border border-[#DCFCE7]">Pelatihan & Workshop</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Layanan Kelas Literasi Informasi</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Pelatihan teknik penelusuran database e-journal dan e-book internasional bereputasi (Scopus, ScienceDirect, IEEE, Cambridge), manajemen referensi Mendeley, dan kiat publikasi jurnal bereputasi.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div><strong>Ketentuan:</strong> Min. 5 mahasiswa/dosen aktif USU</div>
                    <div><strong>Kontak Pelatihan:</strong> WA 0812-6260-2129</div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] flex items-center justify-end gap-2">
                <button type="button" onclick="openServiceDetailModal('kelas-literasi')" class="usu-btn-secondary px-4 py-2 text-xs">
                    Syarat & Materi
                </button>
                <button type="button" onclick="openUniversalReservationModal('kelas-literasi')" class="usu-btn-primary px-5 py-2 text-xs">
                    Daftar / Reservasi Kelas
                </button>
            </div>
        </div>

    </div>
</section>
@endsection
