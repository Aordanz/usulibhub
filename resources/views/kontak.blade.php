@extends('layouts.app')

@section('title', 'Kontak Kami — Perpustakaan Universitas Sumatera Utara')
@section('meta_description', 'Pusat Informasi & Kontak Resmi Perpustakaan Universitas Sumatera Utara. Temukan lokasi, telepon, email, jam operasional, dan media sosial resmi.')

@section('content')
<!-- BREADCRUMB -->
<div class="flex items-center gap-2 text-xs text-[#64748B]">
    <a href="{{ route('beranda') }}" class="hover:text-[#0B6839] flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">home</span>
        <span>Beranda</span>
    </a>
    <span class="text-[#CBD5E1]">/</span>
    <span class="text-[#0B6839] font-bold">Kontak Kami</span>
</div>

<!-- HERO HEADER -->
<section class="rounded-2xl usu-hero-bg text-white p-8 sm:p-10 shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="relative z-10 max-w-3xl space-y-3">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-xs text-[#F6AE01] text-xs font-bold">
            <span class="material-symbols-outlined text-sm">contact_support</span>
            <span>Pusat Layanan & Informasi Publik</span>
        </div>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight">
            Hubungi & Kunjungi Kami
        </h1>
        <p class="text-xs sm:text-sm text-white/90 leading-relaxed max-w-2xl">
            Perpustakaan Universitas Sumatera Utara selalu siap membantu melayani kebutuhan literatur, riset akademik, konsultasi referensi, dan fasilitas belajar Anda.
        </p>
    </div>
    <div class="absolute right-4 bottom-0 top-0 opacity-10 flex items-center justify-end pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">location_on</span>
    </div>
</section>

<!-- CONTACT CARDS GRID -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

    <!-- Card: Lokasi Utama -->
    <div class="usu-card p-6 space-y-4 border-2 border-[#C2E4CD]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shrink-0">
                <span class="material-symbols-outlined text-xl">location_on</span>
            </div>
            <div>
                <h3 class="font-bold text-[#074324] text-sm">Lokasi Gedung Perpustakaan</h3>
                <p class="text-[11px] text-[#64748B]">Kampus USU Padang Bulan</p>
            </div>
        </div>
        <div class="text-xs text-[#475569] leading-relaxed space-y-1.5">
            <p>Jalan Perpustakaan No. 1, Kampus USU, Padang Bulan, Medan, Sumatera Utara 20155.</p>
        </div>
        <a href="https://maps.google.com/?q=Perpustakaan+Universitas+Sumatera+Utara" target="_blank" class="w-full py-2.5 rounded-xl border border-[#D6EADF] text-[#0B6839] font-bold text-xs flex items-center justify-center gap-1.5 hover:bg-[#0B6839] hover:text-white hover:border-[#0B6839] transition-colors">
            <span class="material-symbols-outlined text-sm">map</span> Buka di Google Maps
            <span class="material-symbols-outlined text-xs">open_in_new</span>
        </a>
    </div>

    <!-- Card: Telepon -->
    <div class="usu-card p-6 space-y-4 border-2 border-[#C2E4CD]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shrink-0">
                <span class="material-symbols-outlined text-xl">call</span>
            </div>
            <div>
                <h3 class="font-bold text-[#074324] text-sm">Telepon & WhatsApp</h3>
                <p class="text-[11px] text-[#64748B]">Jam kerja: 08.00 – 16.00 WIB</p>
            </div>
        </div>
        <div class="text-xs text-[#475569] leading-relaxed space-y-2">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#0B6839]">phone</span>
                <span class="font-mono font-semibold text-[#074324]">(061) 8218666</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#0B6839]">phone</span>
                <span class="font-mono font-semibold text-[#074324]">(061) 8219093</span>
            </div>
            <p class="text-[11px] text-[#64748B]">Hubungi untuk informasi sirkulasi, keanggotaan, dan layanan umum perpustakaan.</p>
        </div>
    </div>

    <!-- Card: Email -->
    <div class="usu-card p-6 space-y-4 border-2 border-[#C2E4CD]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shrink-0">
                <span class="material-symbols-outlined text-xl">mail</span>
            </div>
            <div>
                <h3 class="font-bold text-[#074324] text-sm">Email Resmi</h3>
                <p class="text-[11px] text-[#64748B]">Respon dalam 1–2 hari kerja</p>
            </div>
        </div>
        <div class="text-xs text-[#475569] leading-relaxed space-y-2">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#0B6839]">alternate_email</span>
                <a href="mailto:libraryp@usu.ac.id" class="font-semibold text-[#0B6839] hover:underline">libraryp@usu.ac.id</a>
            </div>
            <p class="text-[11px] text-[#64748B]">Untuk pengajuan kerjasama antar perpustakaan, pertanyaan layanan digital, atau informasi umum lainnya.</p>
        </div>
    </div>
</section>

<!-- LAYANAN TATAP MUKA -->
<section class="usu-card p-6 sm:p-8 bg-white border-2 border-[#C2E4CD] shadow-sm space-y-6">
    <div class="flex items-center gap-3 border-b border-[#D6EADF] pb-5">
        <div class="w-10 h-10 rounded-xl bg-[#FFFBEB] text-[#B45309] flex items-center justify-center border border-[#FEF3C7] shadow-xs shrink-0">
            <span class="material-symbols-outlined text-xl">meeting_room</span>
        </div>
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Layanan Tatap Muka di Gedung Perpustakaan</h2>
            <p class="text-xs sm:text-sm text-[#64748B] mt-0.5">Layanan yang tersedia di Gedung Perpustakaan USU, Kampus Padang Bulan.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs">
        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] space-y-1.5">
            <div class="flex items-center gap-2 text-[#074324] font-bold">
                <span class="material-symbols-outlined text-base text-[#0B6839]">desk</span> Meja Sirkulasi
            </div>
            <p class="text-[#64748B] leading-relaxed">Peminjaman, pengembalian, perpanjangan buku, dan pengajuan SKBP.</p>
            <p class="text-[11px] text-[#94A3B8]">Lantai 1 — Lobi Utama</p>
        </div>
        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] space-y-1.5">
            <div class="flex items-center gap-2 text-[#074324] font-bold">
                <span class="material-symbols-outlined text-base text-[#0B6839]">support_agent</span> Meja Informasi
            </div>
            <p class="text-[#64748B] leading-relaxed">Petunjuk lokasi koleksi, bimbingan referensi, dan konsultasi penelusuran literatur.</p>
            <p class="text-[11px] text-[#94A3B8]">Lantai 1 — Area Informasi</p>
        </div>
        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0] space-y-1.5">
            <div class="flex items-center gap-2 text-[#074324] font-bold">
                <span class="material-symbols-outlined text-base text-[#0B6839]">upload_file</span> Penyerahan Karya Ilmiah
            </div>
            <p class="text-[#64748B] leading-relaxed">Unggah mandiri dan penyerahan skripsi, tesis, disertasi ke repositori USU.</p>
            <p class="text-[11px] text-[#94A3B8]">Lantai 1 — Meja Layanan Digital</p>
        </div>
    </div>
</section>

<!-- MEDIA SOSIAL & KANAL DIGITAL -->
<section class="usu-card p-6 sm:p-8 bg-white border-2 border-[#C2E4CD] shadow-sm space-y-6">
    <div class="flex items-center gap-3 border-b border-[#D6EADF] pb-5">
        <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shadow-xs shrink-0">
            <span class="material-symbols-outlined text-xl">share</span>
        </div>
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Kanal Layanan Digital & Media Sosial</h2>
            <p class="text-xs sm:text-sm text-[#64748B] mt-0.5">Terhubung dengan Perpustakaan USU melalui berbagai media informasi resmi.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Instagram -->
        <a href="https://www.instagram.com/usulibraryofficial" target="_blank" class="group p-4 rounded-xl bg-white border border-[#E2E8F0] hover:border-[#0B6839] hover:shadow-md transition-all flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#E1306C] to-[#F77737] text-white flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-xl">photo_camera</span>
            </div>
            <div class="min-w-0">
                <p class="font-bold text-[#074324] text-xs group-hover:text-[#0B6839] truncate">Instagram Official</p>
                <p class="text-[11px] text-[#94A3B8] truncate">@usulibraryofficial</p>
            </div>
        </a>

        <!-- TikTok -->
        <a href="https://www.tiktok.com/@usulibrary" target="_blank" class="group p-4 rounded-xl bg-white border border-[#E2E8F0] hover:border-[#0B6839] hover:shadow-md transition-all flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#0F172A] text-white flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-xl">music_note</span>
            </div>
            <div class="min-w-0">
                <p class="font-bold text-[#074324] text-xs group-hover:text-[#0B6839] truncate">TikTok Official</p>
                <p class="text-[11px] text-[#94A3B8] truncate">@usulibrary</p>
            </div>
        </a>

        <!-- X / Twitter -->
        <a href="https://x.com/usulibrary" target="_blank" class="group p-4 rounded-xl bg-white border border-[#E2E8F0] hover:border-[#0B6839] hover:shadow-md transition-all flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#0F172A] text-white flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-xl">tag</span>
            </div>
            <div class="min-w-0">
                <p class="font-bold text-[#074324] text-xs group-hover:text-[#0B6839] truncate">X (Twitter) Official</p>
                <p class="text-[11px] text-[#94A3B8] truncate">@usulibrary</p>
            </div>
        </a>

        <!-- Website USU -->
        <a href="https://www.usu.ac.id/" target="_blank" class="group p-4 rounded-xl bg-white border border-[#E2E8F0] hover:border-[#0B6839] hover:shadow-md transition-all flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#0B6839] text-[#F6AE01] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-xl">language</span>
            </div>
            <div class="min-w-0">
                <p class="font-bold text-[#074324] text-xs group-hover:text-[#0B6839] truncate">Universitas Sumatera Utara</p>
                <p class="text-[11px] text-[#94A3B8] truncate">www.usu.ac.id</p>
            </div>
        </a>
    </div>
</section>

<!-- CTA BANNER -->
<section class="usu-card p-6 sm:p-8 text-white border-2 border-[#0B6839] shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>

    <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-6">
        <div class="space-y-2 text-center lg:text-left max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-[#F6AE01] text-xs font-bold">
                <span class="material-symbols-outlined text-sm">help</span>
                <span>Pusat Bantuan</span>
            </div>
            <h3 class="text-xl sm:text-2xl font-extrabold">Butuh Panduan Lebih Lengkap?</h3>
            <p class="text-xs sm:text-sm text-white/85 leading-relaxed">Kunjungi Pusat Bantuan kami untuk FAQ, panduan peminjaman, perpanjangan buku, dan informasi layanan lainnya.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3 shrink-0">
            <a href="{{ route('bantuan') }}" class="px-6 py-3 rounded-xl bg-white text-[#0B6839] font-bold text-xs sm:text-sm hover:bg-[#F0FDF4] transition shadow-md inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-base">help_center</span> Pusat Bantuan
            </a>
        </div>
    </div>
</section>
@endsection
