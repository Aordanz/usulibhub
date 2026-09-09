@extends('layouts.app')

@section('title', 'Informasi Umum — Perpustakaan Universitas Sumatera Utara')
@section('meta_description', 'Portal Resmi Informasi Umum Perpustakaan Universitas Sumatera Utara: profil, jam layanan resmi, katalog online, repositori, e-journal, fasilitas, dan berita terkini.')

@section('content')
<!-- HERO SHOWCASE BANNER: SLIDER UTAMA LAYANAN PERPUSTAKAAN USU -->
<section id="beranda" class="space-y-4">
    <div class="usu-card overflow-hidden border-2 border-[#C2E4CD] shadow-xl bg-[#042514] relative group/slider rounded-2xl" id="layanan-slider-container">
        
        <!-- Animated 10-Second Progress Bar -->
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-black/40 z-30 overflow-hidden">
            <div id="slider-progress-bar" class="h-full bg-gradient-to-r from-[#F6AE01] via-[#10B981] to-[#FEC52E]" style="width: 0%;"></div>
        </div>

        <!-- Top Badges & Status Info -->
        <div class="absolute top-4 left-4 sm:top-5 sm:left-6 z-30 flex items-center gap-2 pointer-events-none">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-black/70 backdrop-blur-md text-white text-xs font-bold border border-white/20 shadow-sm">
                <img src="{{ asset('logousu.webp') }}" alt="Logo USU" class="w-4 h-4 object-contain">
                <span id="slider-current-badge">UPT Perpustakaan Universitas Sumatera Utara</span>
            </span>
        </div>

        <!-- Slider Track Container -->
        <div class="relative w-full h-[360px] sm:h-[440px] md:h-[480px] overflow-hidden">
            <div id="layanan-slider-track" class="flex h-full w-full transition-transform duration-700 ease-out" style="transform: translateX(0%);">
                
                <!-- SLIDE 1: LAYANAN LURING -->
                <div class="w-full shrink-0 h-full relative flex flex-col justify-end p-6 sm:p-10 md:p-12 text-white select-none">
                    <img src="{{ asset('images/layanan/luring.jpg') }}" alt="Layanan Luring Perpustakaan USU" class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover/slider:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#022513] via-[#022513]/70 to-black/20 pointer-events-none"></div>
                    
                    <!-- Clickable overlay linking directly to Layanan Luring -->
                    <a href="{{ route('layanan.luring') }}" class="absolute inset-0 z-10" aria-label="Buka Halaman Layanan Luring"></a>

                    <div class="relative z-20 space-y-2.5 max-w-2xl pointer-events-none">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#0B6839] text-[#F6AE01] text-xs font-bold border border-[#F6AE01]/40 shadow-sm pointer-events-auto">
                            <span class="material-symbols-outlined text-sm">storefront</span>
                            <span>Layanan Luring (Onsite)</span>
                        </div>
                        <h2 class="text-xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white leading-tight drop-shadow-md">
                            Layanan Sirkulasi & Koleksi Buku Cetak
                        </h2>
                        <p class="text-xs sm:text-sm text-white/95 leading-relaxed max-w-xl drop-shadow-xs">
                            Peminjaman, perpanjangan, pengembalian buku fisik, pembuatan KTM/kartu anggota, bimbingan literasi pemustaka, dan konsultasi referensi langsung di Gedung Perpustakaan USU.
                        </p>
                        <div class="pt-2 pointer-events-auto">
                            <a href="{{ route('layanan.luring') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#F6AE01] to-[#F28800] text-[#074324] font-extrabold text-xs sm:text-sm shadow-lg hover:shadow-[#F6AE01]/40 hover:scale-105 transition-all">
                                <span>Buka Layanan Luring</span>
                                <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2: LAYANAN DARING -->
                <div class="w-full shrink-0 h-full relative flex flex-col justify-end p-6 sm:p-10 md:p-12 text-white select-none">
                    <img src="{{ asset('images/layanan/daring.jpg') }}" alt="Layanan Daring Perpustakaan USU" class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover/slider:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#022513] via-[#022513]/70 to-black/20 pointer-events-none"></div>
                    
                    <!-- Clickable overlay linking directly to Layanan Daring -->
                    <a href="{{ route('layanan.daring') }}" class="absolute inset-0 z-10" aria-label="Buka Halaman Layanan Daring"></a>

                    <div class="relative z-20 space-y-2.5 max-w-2xl pointer-events-none">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#15803D] text-white text-xs font-bold border border-white/30 shadow-sm pointer-events-auto">
                            <span class="material-symbols-outlined text-sm">cloud_sync</span>
                            <span>Layanan Daring (Online)</span>
                        </div>
                        <h2 class="text-xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white leading-tight drop-shadow-md">
                            Portal Digital, E-Journal & SKBP Online
                        </h2>
                        <p class="text-xs sm:text-sm text-white/95 leading-relaxed max-w-xl drop-shadow-xs">
                            Pengurusan Surat Keterangan Bebas Pustaka (SKBP) mandiri wisuda, uji kemiripan dokumen Turnitin, akses pangkalan data jurnal ilmiah terindeks Scopus & ScienceDirect 24/7.
                        </p>
                        <div class="pt-2 pointer-events-auto">
                            <a href="{{ route('layanan.daring') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#F6AE01] to-[#F28800] text-[#074324] font-extrabold text-xs sm:text-sm shadow-lg hover:shadow-[#F6AE01]/40 hover:scale-105 transition-all">
                                <span>Buka Layanan Daring</span>
                                <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 3: LAYANAN AREA BELAJAR -->
                <div class="w-full shrink-0 h-full relative flex flex-col justify-end p-6 sm:p-10 md:p-12 text-white select-none">
                    <img src="{{ asset('images/layanan/area-belajar.jpg') }}" alt="Layanan Area Belajar Perpustakaan USU" class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover/slider:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#022513] via-[#022513]/70 to-black/20 pointer-events-none"></div>
                    
                    <!-- Clickable overlay linking directly to Layanan Area Belajar -->
                    <a href="{{ route('layanan.area-belajar') }}" class="absolute inset-0 z-10" aria-label="Buka Halaman Layanan Area Belajar"></a>

                    <div class="relative z-20 space-y-2.5 max-w-2xl pointer-events-none">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#EB680D] text-white text-xs font-bold border border-white/30 shadow-sm pointer-events-auto">
                            <span class="material-symbols-outlined text-sm">meeting_room</span>
                            <span>Layanan Area Belajar & Ruangan</span>
                        </div>
                        <h2 class="text-xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white leading-tight drop-shadow-md">
                            The Gade Creative Lounge & Ruang Kolaborasi
                        </h2>
                        <p class="text-xs sm:text-sm text-white/95 leading-relaxed max-w-xl drop-shadow-xs">
                            Coworking space modern TGCL Lantai 1, kubikel fokus individu RUBELIN kedap suara, dan ruang rapat resmi berkapasitas 6 hingga 18 orang dengan sistem booking online.
                        </p>
                        <div class="pt-2 flex flex-wrap items-center gap-3 pointer-events-auto">
                            <a href="{{ route('layanan.area-belajar') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#F6AE01] to-[#F28800] text-[#074324] font-extrabold text-xs sm:text-sm shadow-lg hover:shadow-[#F6AE01]/40 hover:scale-105 transition-all">
                                <span>Buka Fasilitas Area Belajar</span>
                                <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
                            </a>
                            <a href="{{ route('jadwal.ruangan') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-white/20 backdrop-blur-md text-white font-bold text-xs hover:bg-white/30 transition-all border border-white/30">
                                <span class="material-symbols-outlined text-sm">calendar_month</span>
                                <span>Lihat Jadwal Ruangan</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Navigation Arrows (Previous / Next) -->
        <button type="button" onclick="prevLayananSlide()" aria-label="Slide Sebelumnya" class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-black/50 hover:bg-[#0B6839] text-white backdrop-blur-md border border-white/25 flex items-center justify-center transition-all hover:scale-110 shadow-lg cursor-pointer">
            <span class="material-symbols-outlined text-2xl">chevron_left</span>
        </button>
        <button type="button" onclick="nextLayananSlide()" aria-label="Slide Selanjutnya" class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-black/50 hover:bg-[#0B6839] text-white backdrop-blur-md border border-white/25 flex items-center justify-center transition-all hover:scale-110 shadow-lg cursor-pointer">
            <span class="material-symbols-outlined text-2xl">chevron_right</span>
        </button>

        <!-- Interactive Slide Indicator Tabs (3 Services) -->
        <div class="bg-white/95 border-t border-[#D6EADF] p-2 sm:p-3 grid grid-cols-3 gap-2 z-20 relative">
            <button type="button" onclick="goToLayananSlide(0)" class="slider-tab-btn flex items-center gap-2 p-2 sm:p-2.5 rounded-xl text-left transition-all border border-[#0B6839] bg-[#F0FDF4] shadow-xs cursor-pointer" data-slide="0">
                <div class="w-8 h-8 rounded-lg bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0 border border-[#C2E4CD]">
                    <span class="material-symbols-outlined text-base">storefront</span>
                </div>
                <div class="min-w-0 hidden sm:block">
                    <span class="text-xs font-bold text-[#074324] block truncate">1. Layanan Luring</span>
                    <span class="text-[10px] text-[#64748B] block truncate">Sirkulasi & Koleksi Buku</span>
                </div>
                <span class="text-xs font-bold text-[#074324] sm:hidden">Luring</span>
            </button>

            <button type="button" onclick="goToLayananSlide(1)" class="slider-tab-btn flex items-center gap-2 p-2 sm:p-2.5 rounded-xl text-left transition-all border border-transparent hover:bg-[#F0FDF4] cursor-pointer" data-slide="1">
                <div class="w-8 h-8 rounded-lg bg-[#F0FDF4] text-[#15803D] flex items-center justify-center shrink-0 border border-[#C2E4CD]">
                    <span class="material-symbols-outlined text-base">cloud_sync</span>
                </div>
                <div class="min-w-0 hidden sm:block">
                    <span class="text-xs font-bold text-[#074324] block truncate">2. Layanan Daring</span>
                    <span class="text-[10px] text-[#64748B] block truncate">SKBP & E-Journal Online</span>
                </div>
                <span class="text-xs font-bold text-[#074324] sm:hidden">Daring</span>
            </button>

            <button type="button" onclick="goToLayananSlide(2)" class="slider-tab-btn flex items-center gap-2 p-2 sm:p-2.5 rounded-xl text-left transition-all border border-transparent hover:bg-[#FFFBEB] cursor-pointer" data-slide="2">
                <div class="w-8 h-8 rounded-lg bg-[#FFFBEB] text-[#B45309] flex items-center justify-center shrink-0 border border-[#FEF3C7]">
                    <span class="material-symbols-outlined text-base">meeting_room</span>
                </div>
                <div class="min-w-0 hidden sm:block">
                    <span class="text-xs font-bold text-[#074324] block truncate">3. Area Belajar</span>
                    <span class="text-[10px] text-[#64748B] block truncate">TGCL & Ruang Rapat</span>
                </div>
                <span class="text-xs font-bold text-[#074324] sm:hidden">Ruang</span>
            </button>
        </div>

    </div>
</section>



<!-- JAM LAYANAN RESMI PERPUSTAKAAN USU -->
<section id="jam-layanan" class="usu-card p-6 sm:p-8 bg-gradient-to-b from-[#F2F8F4] via-white to-[#F0FDF4] border-2 border-[#C2E4CD] shadow-sm space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-[#D6EADF] pb-5">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-1.5 h-4 rounded-full bg-[#F6AE01]"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[#0B6839]">Jadwal Operasional Resmi</span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Jam Layanan Perpustakaan USU</h2>
            <p class="text-xs sm:text-sm text-[#64748B] mt-1">Jadwal resmi pelayanan sirkulasi, ruang baca, dan akses digital Gedung Perpustakaan Universitas (Kampus Padang Bulan).</p>
        </div>
        <div class="shrink-0">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#0B6839] text-white shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#F6AE01] animate-pulse"></span>
                <span>Terbuka untuk Sivitas USU</span>
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs sm:text-sm">
        
        <!-- Senin -->
        <div class="p-4 rounded-xl bg-white border border-[#D6EADF] shadow-xs flex items-center justify-between gap-3 hover:border-[#0B6839] transition-all">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shadow-xs shrink-0">
                    <span class="material-symbols-outlined text-xl">calendar_today</span>
                </div>
                <div class="min-w-0">
                    <span class="font-bold text-[#074324] block">Senin</span>
                    <span class="text-[11px] text-[#64748B] block truncate">Pelayanan Penuh</span>
                </div>
            </div>
            <div class="text-right shrink-0 whitespace-nowrap">
                <span class="font-mono font-bold text-[#0B6839] text-xs sm:text-sm block">08.00 – 20.00 WIB</span>
                <span class="block text-[10px] text-[#64748B]">Layanan Fisik</span>
            </div>
        </div>

        <!-- Selasa - Kamis -->
        <div class="p-4 rounded-xl bg-white border border-[#D6EADF] shadow-xs flex items-center justify-between gap-3 hover:border-[#0B6839] transition-all">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shadow-xs shrink-0">
                    <span class="material-symbols-outlined text-xl">date_range</span>
                </div>
                <div class="min-w-0">
                    <span class="font-bold text-[#074324] block">Selasa – Kamis</span>
                    <span class="text-[11px] text-[#64748B] block truncate">Pelayanan Penuh</span>
                </div>
            </div>
            <div class="text-right shrink-0 whitespace-nowrap">
                <span class="font-mono font-bold text-[#0B6839] text-xs sm:text-sm block">08.00 – 20.00 WIB</span>
                <span class="block text-[10px] text-[#64748B]">Layanan Fisik</span>
            </div>
        </div>

        <!-- Jumat -->
        <div class="p-4 rounded-xl bg-white border border-[#D6EADF] shadow-xs flex items-center justify-between gap-3 hover:border-[#0B6839] transition-all">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shadow-xs shrink-0">
                    <span class="material-symbols-outlined text-xl">event_available</span>
                </div>
                <div class="min-w-0">
                    <span class="font-bold text-[#074324] block">Jumat</span>
                    <span class="text-[11px] text-[#64748B] block truncate">Jeda Shalat Jumat</span>
                </div>
            </div>
            <div class="text-right shrink-0 whitespace-nowrap">
                <span class="font-mono font-bold text-[#0B6839] text-xs sm:text-sm block">08.00 – 17.00 WIB</span>
                <span class="block text-[10px] text-[#64748B]">Layanan Fisik</span>
            </div>
        </div>

        <!-- Sabtu - Minggu -->
        <div class="p-4 rounded-xl bg-[#FEF2F2] border border-[#FEE2E2] shadow-xs flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-white text-[#EF4444] flex items-center justify-center border border-[#FEE2E2] shadow-xs shrink-0">
                    <span class="material-symbols-outlined text-xl">event_busy</span>
                </div>
                <div class="min-w-0">
                    <span class="font-bold text-[#991B1B] block">Sabtu – Minggu</span>
                    <span class="text-[11px] text-[#DC2626] block truncate">Hari Libur Akhir Pekan</span>
                </div>
            </div>
            <div class="text-right shrink-0 whitespace-nowrap">
                <span class="font-bold text-[#DC2626] text-xs sm:text-sm uppercase tracking-wider block">TUTUP</span>
                <span class="block text-[10px] text-[#EF4444]">Layanan Fisik</span>
            </div>
        </div>

        <!-- Ruang Baca Terbuka Lt. 1 -->
        <div class="p-4 rounded-xl bg-[#F0FDF4] border border-[#C2E4CD] shadow-xs flex items-center justify-between gap-3 hover:border-[#0B6839] transition-all">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-[#0B6839] text-[#F6AE01] flex items-center justify-center shadow-xs shrink-0">
                    <span class="material-symbols-outlined text-xl">chair</span>
                </div>
                <div class="min-w-0">
                    <span class="font-bold text-[#074324] block">Ruang Baca Terbuka (Lt. 1)</span>
                    <span class="text-[11px] text-[#0B6839] font-medium block truncate">Senin – Jumat</span>
                </div>
            </div>
            <div class="text-right shrink-0 whitespace-nowrap">
                <span class="font-mono font-bold text-[#074324] text-xs sm:text-sm block">08.00 – 21.00 WIB</span>
                <span class="block text-[10px] text-[#0B6839] font-semibold">Bebas Belajar</span>
            </div>
        </div>

        <!-- Akses Online 24/7 -->
        <div class="p-4 rounded-xl bg-[#FFFBEB] border border-[#FEF3C7] shadow-xs flex items-center justify-between gap-3 hover:border-[#F6AE01] transition-all">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-[#F6AE01] text-[#074324] flex items-center justify-center shadow-xs shrink-0">
                    <span class="material-symbols-outlined text-xl font-bold">public</span>
                </div>
                <div class="min-w-0">
                    <span class="font-bold text-[#B45309] block">Akses Online Mandiri</span>
                    <span class="text-[11px] text-[#78350F] block truncate">E-Journal, E-Book, Repositori</span>
                </div>
            </div>
            <div class="text-right shrink-0 whitespace-nowrap">
                <span class="font-bold text-[#B45309] text-xs sm:text-sm block">24 Jam / 7 Hari</span>
                <span class="block text-[10px] text-[#78350F] font-semibold">Non-stop</span>
            </div>
        </div>

    </div>

    <!-- Catatan Tata Tertib -->
    <div class="p-4 rounded-xl bg-white border border-[#C2E4CD] flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs text-[#64748B]">
        <div class="flex items-center gap-2 text-[#074324] font-medium">
            <span class="material-symbols-outlined text-base text-[#0B6839]">badge</span>
            <span>Pengunjung wajib memindai Kartu Tanda Mahasiswa (KTM) / Kartu Anggota di pintu masuk lobi utama.</span>
        </div>
        <span class="text-[11px] text-[#0B6839] font-bold px-2.5 py-1 rounded-md bg-[#F0FDF4] border border-[#C2E4CD] shrink-0">Loker Penitipan Barang Tersedia</span>
    </div>
</section>

<!-- PERPUSTAKAAN DALAM ANGKA (STATISTIK RESMI) -->
<section class="space-y-4">
    <div class="border-b border-[#D6EADF] pb-3">
        <div class="flex items-center gap-2 mb-1">
            <span class="w-1.5 h-4 rounded-full bg-[#F6AE01]"></span>
            <span class="text-xs font-bold uppercase tracking-wider text-[#0B6839]">Data Statistik Resmi</span>
        </div>
        <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Perpustakaan Dalam Angka</h2>
        <p class="text-xs sm:text-sm text-[#64748B]">Capaian layanan, koleksi, dan keterlibatan sivitas akademika Universitas Sumatera Utara.</p>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Stat 1: Anggota -->
        <div class="usu-card p-5 bg-white border-t-4 border-[#0B6839] flex items-center justify-between gap-3 hover:border-[#0B6839] hover:shadow-md transition-all">
            <div>
                <span class="text-2xl sm:text-3xl font-extrabold text-[#074324] tracking-tight block">27.826</span>
                <span class="text-xs font-bold text-[#0F172A] mt-0.5 block">Anggota Terdaftar</span>
                <span class="text-[10px] text-[#0B6839] font-semibold mt-1 inline-flex items-center gap-0.5">
                    <span class="material-symbols-outlined text-xs">verified</span> Mahasiswa & Dosen
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#F0FDF4] text-[#0B6839] border border-[#C2E4CD] flex items-center justify-center shrink-0 shadow-xs">
                <span class="material-symbols-outlined text-2xl">group</span>
            </div>
        </div>

        <!-- Stat 2: Peminjaman -->
        <div class="usu-card p-5 bg-white border-t-4 border-[#F6AE01] flex items-center justify-between gap-3 hover:border-[#F6AE01] hover:shadow-md transition-all">
            <div>
                <span class="text-2xl sm:text-3xl font-extrabold text-[#B45309] tracking-tight block">3.055.147</span>
                <span class="text-xs font-bold text-[#0F172A] mt-0.5 block">Jumlah Pinjaman</span>
                <span class="text-[10px] text-[#B45309] font-semibold mt-1 inline-flex items-center gap-0.5">
                    <span class="material-symbols-outlined text-xs">sync_alt</span> Sirkulasi Aktif
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#FFFBEB] text-[#B45309] border border-[#FEF3C7] flex items-center justify-center shrink-0 shadow-xs">
                <span class="material-symbols-outlined text-2xl">import_contacts</span>
            </div>
        </div>

        <!-- Stat 3: Koleksi Buku -->
        <div class="usu-card p-5 bg-white border-t-4 border-[#0B6839] flex items-center justify-between gap-3 hover:border-[#0B6839] hover:shadow-md transition-all">
            <div>
                <span class="text-2xl sm:text-3xl font-extrabold text-[#074324] tracking-tight block">150.615</span>
                <span class="text-xs font-bold text-[#0F172A] mt-0.5 block">Penjajaran Koleksi</span>
                <span class="text-[10px] text-[#0B6839] font-semibold mt-1 inline-flex items-center gap-0.5">
                    <span class="material-symbols-outlined text-xs">shelves</span> Judul & Eksemplar
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#F0FDF4] text-[#0B6839] border border-[#C2E4CD] flex items-center justify-center shrink-0 shadow-xs">
                <span class="material-symbols-outlined text-2xl">menu_book</span>
            </div>
        </div>

        <!-- Stat 4: Pengunjung -->
        <div class="usu-card p-5 bg-white border-t-4 border-[#F6AE01] flex items-center justify-between gap-3 hover:border-[#F6AE01] hover:shadow-md transition-all">
            <div>
                <span class="text-2xl sm:text-3xl font-extrabold text-[#B45309] tracking-tight block">256.191</span>
                <span class="text-xs font-bold text-[#0F172A] mt-0.5 block">Jumlah Pengunjung</span>
                <span class="text-[10px] text-[#B45309] font-semibold mt-1 inline-flex items-center gap-0.5">
                    <span class="material-symbols-outlined text-xs">trending_up</span> Kunjungan Fisik & Daring
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#FFFBEB] text-[#B45309] border border-[#FEF3C7] flex items-center justify-center shrink-0 shadow-xs">
                <span class="material-symbols-outlined text-2xl">sensor_occupied</span>
            </div>
        </div>

    </div>
</section>

<!-- PORTAL SISTEM INFORMASI & SUMBER DAYA ELEKTRONIK -->
<section class="space-y-4">
    <div class="border-b border-[#D6EADF] pb-3">
        <div class="flex items-center gap-2 mb-1">
            <span class="w-1.5 h-4 rounded-full bg-[#F6AE01]"></span>
            <span class="text-xs font-bold uppercase tracking-wider text-[#0B6839]">Sistem Informasi Terpadu</span>
        </div>
        <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Portal & Sumber Daya Digital Perpustakaan</h2>
        <p class="text-xs sm:text-sm text-[#64748B]">Akses katalog, pangkalan data jurnal ilmiah, repositori skripsi/tesis, dan panduan penelitian akademik.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

        <!-- 1. DIGILIB OPAC -->
        <a href="https://digilib.usu.ac.id" target="_blank" class="usu-card p-6 flex flex-col justify-between hover:border-[#0B6839] group transition-all">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B6839] to-[#074324] text-[#F6AE01] flex items-center justify-center group-hover:scale-105 transition-transform shadow-xs">
                    <span class="material-symbols-outlined text-2xl">search_check</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#0B6839] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#C2E4CD]">Katalog Online</span>
                    <h3 class="text-base font-bold text-[#074324] mt-1.5 group-hover:text-[#0B6839] transition-colors">Katalog Online (DIGILIB OPAC)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1.5">
                        Layanan katalog terpadu untuk mencari dan menelusuri ketersediaan koleksi buku tercetak di Perpustakaan Universitas dan cabang fakultas.
                    </p>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#D6EADF] flex items-center justify-between text-xs font-bold text-[#0B6839]">
                <span>Buka digilib.usu.ac.id</span>
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </div>
        </a>

        <!-- 2. Repositori USU -->
        <a href="https://repositori.usu.ac.id" target="_blank" class="usu-card p-6 flex flex-col justify-between hover:border-[#0B6839] group transition-all">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B6839] to-[#074324] text-[#F6AE01] flex items-center justify-center group-hover:scale-105 transition-transform shadow-xs">
                    <span class="material-symbols-outlined text-2xl">school</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#0B6839] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#C2E4CD]">Open Access</span>
                    <h3 class="text-base font-bold text-[#074324] mt-1.5 group-hover:text-[#0B6839] transition-colors">Repositori Institusi USU</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1.5">
                        Penyimpanan dan akses karya ilmiah sivitas akademika, skripsi, tesis, disertasi, dan laporan penelitian dosen Universitas Sumatera Utara.
                    </p>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#D6EADF] flex items-center justify-between text-xs font-bold text-[#0B6839]">
                <span>Buka repositori.usu.ac.id</span>
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </div>
        </a>

        <!-- 3. E-Journal & Database -->
        <a href="https://resourceguide.usu.ac.id" target="_blank" class="usu-card p-6 flex flex-col justify-between hover:border-[#0B6839] group transition-all">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B6839] to-[#074324] text-[#F6AE01] flex items-center justify-center group-hover:scale-105 transition-transform shadow-xs">
                    <span class="material-symbols-outlined text-2xl">article</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#0B6839] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#C2E4CD]">Database Internasional</span>
                    <h3 class="text-base font-bold text-[#074324] mt-1.5 group-hover:text-[#0B6839] transition-colors">Jurnal Elektronik (E-Journal)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1.5">
                        Akses pangkalan data jurnal ilmiah terlanggan (ScienceDirect, Scopus, SpringerLink, IEEE, Emerald, ProQuest, EBSCO) bagi sivitas USU.
                    </p>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#D6EADF] flex items-center justify-between text-xs font-bold text-[#0B6839]">
                <span>Akses Database Jurnal</span>
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </div>
        </a>

        <!-- 4. Buku Elektronik (E-Book) -->
        <a href="https://resourceguide.usu.ac.id" target="_blank" class="usu-card p-6 flex flex-col justify-between hover:border-[#0B6839] group transition-all">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B6839] to-[#074324] text-[#F6AE01] flex items-center justify-center group-hover:scale-105 transition-transform shadow-xs">
                    <span class="material-symbols-outlined text-2xl">tablet_mac</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#0B6839] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#C2E4CD]">Buku Digital</span>
                    <h3 class="text-base font-bold text-[#074324] mt-1.5 group-hover:text-[#0B6839] transition-colors">Buku Elektronik (E-Book)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1.5">
                        Ribuan judul buku teks elektronik dan monograf ilmiah berkualitas tinggi yang dapat dibaca dan diunduh melalui perangkat mobile & laptop.
                    </p>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#D6EADF] flex items-center justify-between text-xs font-bold text-[#0B6839]">
                <span>Jelajahi E-Book</span>
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </div>
        </a>

        <!-- 5. Resource Guide USU -->
        <a href="https://resourceguide.usu.ac.id" target="_blank" class="usu-card p-6 flex flex-col justify-between hover:border-[#0B6839] group transition-all">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B6839] to-[#074324] text-[#F6AE01] flex items-center justify-center group-hover:scale-105 transition-transform shadow-xs">
                    <span class="material-symbols-outlined text-2xl">travel_explore</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#0B6839] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#C2E4CD]">Panduan Riset</span>
                    <h3 class="text-base font-bold text-[#074324] mt-1.5 group-hover:text-[#0B6839] transition-colors">Panduan Sumber Daya (Resource Guide)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1.5">
                        Petunjuk navigasi basis data ilmiah per bidang ilmu (Kedokteran, Teknik, Pertanian, Hukum, Ekonomi, Ilmu Budaya, dll).
                    </p>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#D6EADF] flex items-center justify-between text-xs font-bold text-[#0B6839]">
                <span>Buka resourceguide.usu.ac.id</span>
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </div>
        </a>

        <!-- 6. Cek Pinjaman & Mandiri -->
        <a href="https://digilib.usu.ac.id/login.php" target="_blank" class="usu-card p-6 flex flex-col justify-between hover:border-[#0B6839] group transition-all">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B6839] to-[#074324] text-[#F6AE01] flex items-center justify-center group-hover:scale-105 transition-transform shadow-xs">
                    <span class="material-symbols-outlined text-2xl">account_circle</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#0B6839] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#C2E4CD]">Layanan Mandiri</span>
                    <h3 class="text-base font-bold text-[#074324] mt-1.5 group-hover:text-[#0B6839] transition-colors">Cek Pinjaman Buku & Akun</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1.5">
                        Cek status buku yang sedang dipinjam, tenggat pengembalian, perpanjangan masa pinjam mandiri, dan bebas pustaka.
                    </p>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-[#D6EADF] flex items-center justify-between text-xs font-bold text-[#0B6839]">
                <span>Masuk Akun Anggota</span>
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </div>
        </a>

    </div>
</section>

<!-- LAYANAN & FASILITAS PERPUSTAKAAN (RINGKASAN UMUM & SLIDER FOTO) -->
<section class="space-y-6" id="layanan-utama">
    <div class="border-b border-[#D6EADF] pb-3 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-1.5 h-4 rounded-full bg-[#F6AE01]"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[#0B6839]">Cakupan Layanan Unggulan</span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Layanan & Fasilitas Perpustakaan USU</h2>
            <p class="text-xs sm:text-sm text-[#64748B] mt-0.5">Eksplorasi layanan fisik, portal digital, dan area belajar modern UPT Perpustakaan Universitas Sumatera Utara.</p>
        </div>
        <div class="flex items-center gap-2 shrink-0">
            <span class="inline-flex items-center gap-1.5 text-xs text-[#64748B] font-medium bg-white px-3 py-1.5 rounded-full border border-[#D6EADF]">
                <span class="material-symbols-outlined text-sm text-[#0B6839]">verified</span>
                <span>4 Layanan & Unit Utama</span>
            </span>
        </div>
    </div>

    <!-- 4 RINGKASAN KARTU DETAIL DENGAN FOTO PREVIEW -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- Card 1: Layanan Luring -->
        <div class="usu-card overflow-hidden bg-white flex flex-col justify-between hover:border-[#0B6839] hover:shadow-md transition-all group">
            <div class="h-32 w-full overflow-hidden relative">
                <img src="{{ asset('images/layanan/luring.jpg') }}" alt="Layanan Luring" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <span class="absolute bottom-2.5 left-3 text-[11px] font-bold text-white flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm text-[#F6AE01]">storefront</span> Onsite
                </span>
            </div>
            <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between space-y-3">
                <div>
                    <h3 class="text-sm font-bold text-[#074324] group-hover:text-[#0B6839] transition-colors">Layanan Luring (Onsite)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1">
                        Sirkulasi peminjaman buku, aktivasi KTM/keanggotaan, bimbingan literasi informasi, dan layanan koleksi referensi di gedung perpustakaan.
                    </p>
                </div>
                <div class="pt-3 border-t border-[#D6EADF]">
                    <a href="{{ route('layanan.luring') }}" class="text-xs font-bold text-[#0B6839] hover:text-[#074324] inline-flex items-center gap-1 group/btn">
                        <span>Lihat Rincian Luring</span>
                        <span class="material-symbols-outlined text-xs group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 2: Layanan Daring -->
        <div class="usu-card overflow-hidden bg-white flex flex-col justify-between hover:border-[#0B6839] hover:shadow-md transition-all group">
            <div class="h-32 w-full overflow-hidden relative">
                <img src="{{ asset('images/layanan/daring.jpg') }}" alt="Layanan Daring" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <span class="absolute bottom-2.5 left-3 text-[11px] font-bold text-white flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm text-[#10B981]">cloud_sync</span> Online 24/7
                </span>
            </div>
            <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between space-y-3">
                <div>
                    <h3 class="text-sm font-bold text-[#074324] group-hover:text-[#0B6839] transition-colors">Layanan Daring (Online)</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1">
                        Pengurusan SKBP online untuk syarat wisuda, pemeriksaan kesamaan naskah uji plagiarisme Turnitin, dan pemesanan artikel ilmiah.
                    </p>
                </div>
                <div class="pt-3 border-t border-[#D6EADF]">
                    <a href="{{ route('layanan.daring') }}" class="text-xs font-bold text-[#15803D] hover:text-[#074324] inline-flex items-center gap-1 group/btn">
                        <span>Lihat Rincian Daring</span>
                        <span class="material-symbols-outlined text-xs group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 3: Area Belajar & Ruangan -->
        <div class="usu-card overflow-hidden bg-white flex flex-col justify-between hover:border-[#0B6839] hover:shadow-md transition-all group">
            <div class="h-32 w-full overflow-hidden relative">
                <img src="{{ asset('images/layanan/area-belajar.jpg') }}" alt="Area Belajar & Ruangan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <span class="absolute bottom-2.5 left-3 text-[11px] font-bold text-white flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm text-[#F6AE01]">meeting_room</span> Ruang Kolaboratif
                </span>
            </div>
            <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between space-y-3">
                <div>
                    <h3 class="text-sm font-bold text-[#074324] group-hover:text-[#0B6839] transition-colors">Area Belajar & Ruang Rapat</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1">
                        The Gade Creative Lounge (TGCL), kubikel hening RUBELIN, ruang rapat dosen/mahasiswa Lantai 1-3, dan ruang konferensi mini.
                    </p>
                </div>
                <div class="pt-3 border-t border-[#D6EADF] flex items-center justify-between">
                    <a href="{{ route('layanan.area-belajar') }}" class="text-xs font-bold text-[#B45309] hover:text-[#78350F] inline-flex items-center gap-1 group/btn">
                        <span>Fasilitas Ruang</span>
                        <span class="material-symbols-outlined text-xs group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    <a href="{{ route('jadwal.ruangan') }}" class="text-[11px] font-bold text-[#0B6839] hover:underline">
                        Jadwal &rarr;
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 4: Perpustakaan Cabang -->
        <div class="usu-card overflow-hidden bg-white flex flex-col justify-between hover:border-[#0B6839] hover:shadow-md transition-all group">
            <div class="h-32 w-full overflow-hidden relative">
                <img src="{{ asset('images/layanan/luring.webp') }}" alt="14 Cabang Fakultas" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <span class="absolute bottom-2.5 left-3 text-[11px] font-bold text-white flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm text-white">account_tree</span> 14 Unit
                </span>
            </div>
            <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between space-y-3">
                <div>
                    <h3 class="text-sm font-bold text-[#074324] group-hover:text-[#0B6839] transition-colors">14 Perpustakaan Cabang</h3>
                    <p class="text-xs text-[#64748B] leading-relaxed mt-1">
                        Jaringan unit perpustakaan di 14 Fakultas & Sekolah Pascasarjana di lingkungan USU untuk memperluas jangkauan referensi spesifik.
                    </p>
                </div>
                <div class="pt-3 border-t border-[#D6EADF]">
                    <a href="https://library.usu.ac.id/id/perpustakaan-cabang" target="_blank" class="text-xs font-bold text-[#0B6839] hover:text-[#074324] inline-flex items-center gap-1 group/btn">
                        <span>Daftar Cabang USU</span>
                        <span class="material-symbols-outlined text-xs group-hover/btn:translate-x-1 transition-transform">open_in_new</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- PERINGKAT INSTITUSI SCIMAGO & KEANGGOTAAN -->
<section class="usu-card p-6 sm:p-8 bg-gradient-to-br from-[#074324] via-[#053B1F] to-[#032714] text-white border-2 border-[#0B6839] shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
        <div class="lg:col-span-7 space-y-3">
            <div class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-[#F6AE01]">
                <span class="material-symbols-outlined text-sm">workspace_premium</span>
                <span>Peringkat & Reputasi Akademik Global</span>
            </div>
            <h3 class="text-xl sm:text-2xl font-extrabold text-white">Peringkat Institusi Scimago (SIR) & Keanggotaan</h3>
            <p class="text-xs sm:text-sm text-white/85 leading-relaxed">
                Dukungan pangkalan data referensi dan repositori ilmiah Perpustakaan USU berkontribusi aktif terhadap capaian pemeringkatan riset global Universitas Sumatera Utara.
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2">
                <div class="p-3.5 bg-white/10 backdrop-blur-xs rounded-xl border border-white/20 text-center hover:bg-white/15 transition-all">
                    <span class="text-2xl font-extrabold text-[#F6AE01] block">#40</span>
                    <span class="text-[10px] text-white/80 uppercase font-bold tracking-wider">Overall</span>
                </div>
                <div class="p-3.5 bg-white/10 backdrop-blur-xs rounded-xl border border-white/20 text-center hover:bg-white/15 transition-all">
                    <span class="text-2xl font-extrabold text-[#F6AE01] block">#20</span>
                    <span class="text-[10px] text-white/80 uppercase font-bold tracking-wider">Research</span>
                </div>
                <div class="p-3.5 bg-white/10 backdrop-blur-xs rounded-xl border border-white/20 text-center hover:bg-white/15 transition-all">
                    <span class="text-2xl font-extrabold text-[#F6AE01] block">#85</span>
                    <span class="text-[10px] text-white/80 uppercase font-bold tracking-wider">Innovation</span>
                </div>
                <div class="p-3.5 bg-white/10 backdrop-blur-xs rounded-xl border border-white/20 text-center hover:bg-white/15 transition-all">
                    <span class="text-2xl font-extrabold text-[#F6AE01] block">#27</span>
                    <span class="text-[10px] text-white/80 uppercase font-bold tracking-wider">Societal</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5 bg-white/10 backdrop-blur-sm p-5 rounded-2xl border border-white/20 space-y-3">
            <span class="text-xs font-bold text-[#F6AE01] uppercase tracking-wider block flex items-center gap-1.5">
                <span class="w-1.5 h-3.5 bg-[#F6AE01] rounded-full inline-block"></span>
                Mitra Jaringan & Keanggotaan:
            </span>
            <div class="space-y-2 text-xs text-white">
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/10 border border-white/10">
                    <div class="w-9 h-9 rounded-xl bg-[#0B6839] text-[#F6AE01] ring-1 ring-[#F6AE01]/40 flex items-center justify-center shrink-0 font-extrabold text-xs">RI</div>
                    <div>
                        <span class="font-bold text-white block">Perpustakaan Nasional RI (Perpusnas)</span>
                        <span class="text-[11px] text-white/70">Akses E-Resources Nasional Terintegrasi</span>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/10 border border-white/10">
                    <div class="w-9 h-9 rounded-xl bg-[#F6AE01] text-[#074324] flex items-center justify-center shrink-0 font-extrabold text-xs">DOAJ</div>
                    <div>
                        <span class="font-bold text-white block">Directory of Open Access Journals</span>
                        <span class="text-[11px] text-white/70">Indeks Jurnal Akses Terbuka Global</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BERITA & PENGUMUMAN TERBARU PERPUSTAKAAN -->
<section class="space-y-4">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-[#D6EADF] pb-3">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-1.5 h-4 rounded-full bg-[#F6AE01]"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[#0B6839]">Warta & Informasi</span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Berita & Pengumuman Terbaru</h2>
        </div>
        <a href="https://library.usu.ac.id/id/berita" target="_blank" class="text-xs font-bold text-[#0B6839] hover:underline inline-flex items-center gap-1">
            <span>Lihat Semua di library.usu.ac.id</span>
            <span class="material-symbols-outlined text-xs">open_in_new</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        
        <!-- Berita 1 -->
        <div class="usu-card overflow-hidden bg-white flex flex-col justify-between hover:border-[#0B6839] hover:shadow-md transition-all">
            <div class="p-5 space-y-2.5">
                <div class="flex items-center justify-between text-[11px] text-[#64748B]">
                    <span class="px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] font-bold border border-[#C2E4CD]">Berita</span>
                    <span>03 September 2026</span>
                </div>
                <h3 class="text-sm font-bold text-[#074324] leading-snug hover:text-[#0B6839] transition-colors">
                    Perkuat Mutu Perpustakaan, Pustakawan USU Jadi Narasumber Sosialisasi Akreditasi
                </h3>
                <p class="text-xs text-[#64748B] line-clamp-3 leading-relaxed">
                    Pustakawan Perpustakaan USU menjadi narasumber dalam forum peningkatan standar mutu akreditasi perpustakaan perguruan tinggi.
                </p>
            </div>
            <div class="px-5 pb-4 pt-2 border-t border-[#F1F5F9]">
                <a href="https://library.usu.ac.id/id/berita" target="_blank" class="text-xs font-bold text-[#0B6839] inline-flex items-center gap-1 hover:underline">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Berita 2 -->
        <div class="usu-card overflow-hidden bg-white flex flex-col justify-between hover:border-[#0B6839] hover:shadow-md transition-all">
            <div class="p-5 space-y-2.5">
                <div class="flex items-center justify-between text-[11px] text-[#64748B]">
                    <span class="px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] font-bold border border-[#C2E4CD]">Literasi Informasi</span>
                    <span>10 Agustus 2026</span>
                </div>
                <h3 class="text-sm font-bold text-[#074324] leading-snug hover:text-[#0B6839] transition-colors">
                    Perpustakaan USU Gelar Pelatihan Dasar Canva Batch II Program Liburan
                </h3>
                <p class="text-xs text-[#64748B] line-clamp-3 leading-relaxed">
                    Menutup rangkaian kelas literasi informasi liburan, mahasiswa USU dibekali kompetensi desain visual dan publikasi digital.
                </p>
            </div>
            <div class="px-5 pb-4 pt-2 border-t border-[#F1F5F9]">
                <a href="https://library.usu.ac.id/id/berita" target="_blank" class="text-xs font-bold text-[#0B6839] inline-flex items-center gap-1 hover:underline">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Berita 3 -->
        <div class="usu-card overflow-hidden bg-white flex flex-col justify-between hover:border-[#0B6839] hover:shadow-md transition-all">
            <div class="p-5 space-y-2.5">
                <div class="flex items-center justify-between text-[11px] text-[#64748B]">
                    <span class="px-2.5 py-0.5 rounded-full bg-[#F0FDF4] text-[#0B6839] font-bold border border-[#C2E4CD]">Transformasi Digital</span>
                    <span>10 Agustus 2026</span>
                </div>
                <h3 class="text-sm font-bold text-[#074324] leading-snug hover:text-[#0B6839] transition-colors">
                    Kepala Perpustakaan Hadiri KPDI ke-17: Transformasi Perpustakaan di Era AI
                </h3>
                <p class="text-xs text-[#64748B] line-clamp-3 leading-relaxed">
                    Penguatan integrasi teknologi kecerdasan buatan (AI) menuju Smart Academic Library berstandar internasional di lingkungan USU.
                </p>
            </div>
            <div class="px-5 pb-4 pt-2 border-t border-[#F1F5F9]">
                <a href="https://library.usu.ac.id/id/berita" target="_blank" class="text-xs font-bold text-[#0B6839] inline-flex items-center gap-1 hover:underline">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- KONTAK & LOKASI RESMI PERPUSTAKAAN USU -->
<section class="usu-card p-6 sm:p-8 bg-gradient-to-r from-[#F4F9F5] via-white to-[#F0FDF4] border-2 border-[#C2E4CD]">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <span class="text-xs font-extrabold uppercase tracking-wider text-[#0B6839] flex items-center gap-1.5">
                <span class="material-symbols-outlined text-base text-[#F6AE01]">location_on</span>
                <span>Lokasi Gedung Utama</span>
            </span>
            <p class="text-xs leading-relaxed text-[#475569]">
                <strong class="text-[#074324]">Gedung UPT Perpustakaan USU</strong><br>
                Jalan Perpustakaan No. 1, Kampus USU, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155.
            </p>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-extrabold uppercase tracking-wider text-[#0B6839] flex items-center gap-1.5">
                <span class="material-symbols-outlined text-base text-[#F6AE01]">mail</span>
                <span>Kontak & Surel Resmi</span>
            </span>
            <p class="text-xs leading-relaxed text-[#475569]">
                <strong class="text-[#074324]">Email:</strong> <a href="mailto:libraryp@usu.ac.id" class="text-[#0B6839] font-semibold hover:underline">libraryp@usu.ac.id</a><br>
                <strong class="text-[#074324]">Telepon:</strong> (061) 8218666<br>
                <strong class="text-[#074324]">Helpdesk:</strong> Tersedia di Lobi Lantai 1
            </p>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-extrabold uppercase tracking-wider text-[#0B6839] flex items-center gap-1.5">
                <span class="material-symbols-outlined text-base text-[#F6AE01]">verified</span>
                <span>Status Akreditasi</span>
            </span>
            <p class="text-xs leading-relaxed text-[#475569]">
                Terakreditasi <strong class="text-[#074324]">A (Unggul)</strong> oleh Perpustakaan Nasional Republik Indonesia. Mendukung pemenuhan Tri Dharma Perguruan Tinggi.
            </p>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>


    // =========================================================================
    // SLIDER FOTO LAYANAN (BERGESER SETIAP 10 DETIK + SEAMLESS PAUSE/RESUME ON HOVER)
    // =========================================================================
    const track = document.getElementById('layanan-slider-track');
    const progressBar = document.getElementById('slider-progress-bar');
    const counterEl = document.getElementById('slider-counter');
    const sliderContainer = document.getElementById('layanan-slider-container');
    const tabBtns = document.querySelectorAll('.slider-tab-btn');

    if (track && sliderContainer) {
        let currentLayananSlide = 0;
        const TOTAL_LAYANAN_SLIDES = 3;
        const LAYANAN_INTERVAL_MS = 10000; // 10 Detik
        let slideStartTime = performance.now();
        let slideElapsed = 0;
        let isLayananPaused = false;
        let progressRaf = null;

        function updateSlideUI() {
            track.style.transform = `translateX(-${currentLayananSlide * 100}%)`;
            if (counterEl) {
                counterEl.innerText = `${currentLayananSlide + 1} / ${TOTAL_LAYANAN_SLIDES}`;
            }
            tabBtns.forEach((btn, idx) => {
                if (idx === currentLayananSlide) {
                    btn.classList.add('bg-[#F0FDF4]', 'border-[#0B6839]', 'shadow-xs');
                    btn.classList.remove('border-transparent');
                } else {
                    btn.classList.remove('bg-[#F0FDF4]', 'border-[#0B6839]', 'shadow-xs');
                    btn.classList.add('border-transparent');
                }
            });
        }

        function resetSlideTimer() {
            slideStartTime = performance.now();
            slideElapsed = 0;
            if (progressBar) progressBar.style.width = '0%';
        }

        function loopLayanan(now) {
            if (!isLayananPaused) {
                slideElapsed = now - slideStartTime;
                if (slideElapsed >= LAYANAN_INTERVAL_MS) {
                    currentLayananSlide = (currentLayananSlide + 1) % TOTAL_LAYANAN_SLIDES;
                    updateSlideUI();
                    slideStartTime = performance.now();
                    slideElapsed = 0;
                }
                const pct = Math.min((slideElapsed / LAYANAN_INTERVAL_MS) * 100, 100);
                if (progressBar) progressBar.style.width = pct + '%';
            }
            progressRaf = requestAnimationFrame(loopLayanan);
        }

        window.nextLayananSlide = function() {
            currentLayananSlide = (currentLayananSlide + 1) % TOTAL_LAYANAN_SLIDES;
            updateSlideUI();
            resetSlideTimer();
        };

        window.prevLayananSlide = function() {
            currentLayananSlide = (currentLayananSlide - 1 + TOTAL_LAYANAN_SLIDES) % TOTAL_LAYANAN_SLIDES;
            updateSlideUI();
            resetSlideTimer();
        };

        window.goToLayananSlide = function(index) {
            currentLayananSlide = index;
            updateSlideUI();
            resetSlideTimer();
        };

        sliderContainer.addEventListener('mouseenter', () => {
            isLayananPaused = true;
        });

        sliderContainer.addEventListener('mouseleave', () => {
            if (isLayananPaused) {
                slideStartTime = performance.now() - slideElapsed;
                isLayananPaused = false;
            }
        });

        // Touch swipe for mobile devices
        let touchStartX = 0;
        sliderContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            isLayananPaused = true;
        }, { passive: true });

        sliderContainer.addEventListener('touchend', (e) => {
            const touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) {
                window.nextLayananSlide();
            } else if (touchEndX - touchStartX > 50) {
                window.prevLayananSlide();
            }
            slideStartTime = performance.now() - slideElapsed;
            isLayananPaused = false;
        }, { passive: true });

        updateSlideUI();
        progressRaf = requestAnimationFrame(loopLayanan);
    }


</script>
@endsection
