@extends('layouts.app')

@section('title', 'Layanan Daring (Online) — Perpustakaan Universitas Sumatera Utara')
@section('meta_description', 'Layanan Daring Resmi Perpustakaan USU meliputi Reservasi Koleksi Buku Standar, Pengurusan SKBP Online, Uji Turnitin Online, Pemesanan Penelusuran Literatur, dan Unggah Mandiri Karya Akhir.')

@section('content')
<!-- BREADCRUMB -->
<div class="flex items-center gap-2 text-xs text-[#64748B]">
    <a href="{{ route('beranda') }}" class="hover:text-[#0B6839] flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">home</span>
        <span>Beranda</span>
    </a>
    <span class="text-[#CBD5E1]">/</span>
    <span class="text-[#15803D] font-bold">Layanan Daring (Online)</span>
</div>

<!-- HERO HEADER -->
<section class="rounded-2xl usu-hero-bg text-white p-8 sm:p-10 shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="relative z-10 max-w-3xl space-y-3">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-xs text-[#F6AE01] text-xs font-bold">
            <span class="material-symbols-outlined text-sm">cloud_sync</span>
            <span>Layanan Perpustakaan Digital Mandiri</span>
        </div>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight">
            Layanan Daring (Online)
        </h1>
        <p class="text-xs sm:text-sm text-white/90 leading-relaxed max-w-2xl">
            Layanan digital Perpustakaan USU yang dapat diakses 24/7 di mana saja untuk kemudahan pemesanan buku fisik, pengurusan surat keterangan bebas pustaka (SKBP), uji plagiarisme Turnitin, penelusuran artikel ilmiah, dan penyerahan karya akhir.
        </p>
    </div>
    <div class="absolute right-4 bottom-0 top-0 opacity-10 flex items-center justify-end pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">cloud_sync</span>
    </div>
</section>

<!-- SERVICES LIST -->
<section class="space-y-6">
    <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-3">
        <div>
            <h2 class="text-lg font-bold text-[#0F172A]">Daftar Layanan Daring Resmi</h2>
            <p class="text-xs text-[#64748B]">Pilih layanan untuk membuka portal resmi atau mengajukan permohonan online.</p>
        </div>
        <span class="text-xs font-bold text-[#15803D] bg-[#F0FDF4] px-3 py-1 rounded-full border border-[#DCFCE7]">5 Layanan Online</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Daring 1: Reservasi Buku -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#15803D] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">auto_stories</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#15803D] border border-[#DCFCE7]">Katalog OPAC</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Reservasi Koleksi Buku Standar</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Pemesanan buku cetak sirkulasi via daring sebelum diambil di perpustakaan agar buku disiapkan lebih awal oleh staf.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Kontak:</strong> HP/WA 0813-9677-7904</div>
                    <div><strong>Link Form:</strong> <a href="https://s.id/USULib-ReservasiBuku" target="_blank" class="text-[#15803D] underline font-medium">s.id/USULib-ReservasiBuku</a></div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('reservasi-buku')" class="usu-btn-secondary py-2 text-xs text-center">
                    Detail Syarat
                </button>
                <a href="https://s.id/USULib-ReservasiBuku" target="_blank" class="usu-btn-primary py-2 text-xs text-center inline-flex items-center justify-center gap-1">
                    <span>Buka Form</span>
                    <span class="material-symbols-outlined text-xs">open_in_new</span>
                </a>
            </div>
        </div>

        <!-- Daring 2: SKBP Online -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#15803D] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">verified_user</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#15803D] border border-[#DCFCE7]">Syarat Wisuda</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Pengurusan SKBP Online</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Penerbitan Surat Keterangan Bebas Pustaka (SKBP) secara online melalui operator sirkulasi untuk syarat wisuda/yudisium.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Kontak:</strong> HP/WA 0812-6215-8587</div>
                    <div><strong>Status:</strong> Terverifikasi bebas pinjaman & denda</div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('skbp')" class="usu-btn-secondary py-2 text-xs text-center">
                    Detail Alur
                </button>
                <button type="button" onclick="openUniversalReservationModal('skbp')" class="usu-btn-primary py-2 text-xs text-center">
                    Ajukan SKBP
                </button>
            </div>
        </div>

        <!-- Daring 3: Uji Turnitin -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#FFF7ED] text-[#C2410C] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">spellcheck</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#FFF7ED] text-[#C2410C] border border-[#FFEDD5]">Plagiarisme</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Layanan Uji Turnitin Online</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Pemeriksaan tingkat orisinalitas naskah skripsi, tesis (S2), disertasi (S3), dan karya publikasi ilmiah dosen.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Kontak:</strong> HP/WA 0812-6260-2129</div>
                    <div><strong>Link Form:</strong> <a href="https://bit.ly/askujiturnitinUSULibrary" target="_blank" class="text-[#C2410C] underline font-medium">bit.ly/askujiturnitinUSULibrary</a></div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('turnitin')" class="usu-btn-secondary py-2 text-xs text-center">
                    Ketentuan
                </button>
                <a href="https://bit.ly/askujiturnitinUSULibrary" target="_blank" class="usu-btn-primary py-2 text-xs text-center inline-flex items-center justify-center gap-1">
                    <span>Kirim File</span>
                    <span class="material-symbols-outlined text-xs">open_in_new</span>
                </a>
            </div>
        </div>

        <!-- Daring 4: Penelusuran Literatur -->
        <div class="usu-card p-6 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#15803D] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">travel_explore</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#15803D] border border-[#DCFCE7]">Scopus / IEEE</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Pemesanan Penelusuran Literatur</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Bantuan pustakawan dalam pencarian artikel jurnal internasional bereputasi (Scopus, ScienceDirect, IEEE) gratis untuk Dosen & Mahasiswa Pasca USU.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl space-y-1">
                    <div><strong>Kontak:</strong> HP/WA 0812-6260-2129</div>
                    <div><strong>Link Form:</strong> <a href="https://bit.ly/reservasiartikelUSULibrary" target="_blank" class="text-[#15803D] underline font-medium">bit.ly/reservasiartikelUSULibrary</a></div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] grid grid-cols-2 gap-2">
                <button type="button" onclick="openServiceDetailModal('penelusuran-literatur')" class="usu-btn-secondary py-2 text-xs text-center">
                    Detail Info
                </button>
                <a href="https://bit.ly/reservasiartikelUSULibrary" target="_blank" class="usu-btn-primary py-2 text-xs text-center inline-flex items-center justify-center gap-1">
                    <span>Pesan Artikel</span>
                    <span class="material-symbols-outlined text-xs">open_in_new</span>
                </a>
            </div>
        </div>

        <!-- Daring 5: Unggah Mandiri -->
        <div class="usu-card p-6 flex flex-col justify-between md:col-span-2 lg:col-span-2">
            <div class="space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#15803D] flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">cloud_upload</span>
                    </div>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#15803D] border border-[#DCFCE7]">Repositori USU</span>
                </div>
                <h3 class="text-base font-bold text-[#0F172A]">Unggah Mandiri Karya Akhir</h3>
                <p class="text-xs text-[#64748B] leading-relaxed">
                    Penyerahan mandiri berkas digital kertas karya (Diploma), skripsi (S1), tesis (S2), dan disertasi (S3) yang telah disahkan ke Repositori Institusi USU sebagai syarat kelulusan.
                </p>
                <div class="text-[11px] text-[#475569] bg-[#F8FAF7] p-3 rounded-xl grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div><strong>Kontak Repositori:</strong> HP/WA 0812-1205-7843</div>
                    <div><strong>Portal:</strong> <a href="https://repositori.usu.ac.id" target="_blank" class="text-[#15803D] underline font-medium">repositori.usu.ac.id</a></div>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E2E8F0] flex items-center justify-end gap-2">
                <button type="button" onclick="openServiceDetailModal('unggah-mandiri')" class="usu-btn-secondary px-4 py-2 text-xs">
                    Format & Panduan
                </button>
                <a href="https://repositori.usu.ac.id" target="_blank" class="usu-btn-primary px-5 py-2 text-xs inline-flex items-center gap-1">
                    <span>Buka Repositori</span>
                    <span class="material-symbols-outlined text-xs">open_in_new</span>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
