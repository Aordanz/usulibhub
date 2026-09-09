<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Universitas Sumatera Utara')</title>
    <meta name="description" content="@yield('meta_description', 'Portal Resmi Layanan dan Reservasi Perpustakaan Universitas Sumatera Utara.')">
    <link rel="icon" href="{{ asset('logousu.webp') }}" type="image/webp">
    <link rel="apple-touch-icon" href="{{ asset('logousu.webp') }}">

    <!-- Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Material Symbols Outlined -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Tailwind CDN with inline fallback -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            usu: {
                                primary: '#0B6839',
                                secondary: '#15803D',
                                light: '#487629',
                                dark: '#074324',
                                gold: '#F6AE01',
                                orange: '#F28800',
                                bg: '#F8FAF7',
                                surface: '#FFFFFF',
                                border: '#E2E8F0',
                                text: '#0F172A',
                                muted: '#64748B',
                            }
                        },
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', '"Inter"', 'system-ui', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        .usu-hero-bg {
            background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%) !important;
        }
        body {
            background-color: #F8FAF7;
            color: #0F172A;
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
            line-height: 1;
        }

        .usu-card {
            background: #FFFFFF;
            border: 1px solid #D6EADF;
            border-radius: 16px;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .usu-card:hover {
            transform: translateY(-2px);
            border-color: #0B6839;
            box-shadow: 0 12px 28px -6px rgba(11, 104, 57, 0.16);
        }

        .usu-btn-primary {
            background: linear-gradient(135deg, #0B6839 0%, #074324 100%);
            color: #FFFFFF;
            font-weight: 700;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(11, 104, 57, 0.25);
            transition: all 0.15s ease;
        }
        .usu-btn-primary:hover {
            background: linear-gradient(135deg, #074324 0%, #042B16 100%);
            box-shadow: 0 4px 14px rgba(11, 104, 57, 0.35);
        }

        .usu-btn-secondary {
            background-color: #FFFFFF;
            color: #0B6839;
            border: 1.5px solid #CDE7D5;
            font-weight: 700;
            border-radius: 10px;
            transition: all 0.15s ease;
        }
        .usu-btn-secondary:hover {
            background-color: #F0FDF4;
            border-color: #0B6839;
            color: #074324;
        }

        .status-dot-tersedia {
            background-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }
        .status-dot-terpakai {
            background-color: #EF4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
        }
        .status-dot-menunggu {
            background-color: #F59E0B;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col selection:bg-[#F6AE01] selection:text-[#074324]">

    <!-- ========================================================================= -->
    <!-- INSTITUTIONAL TOP BAR                                                     -->
    <!-- ========================================================================= -->
    <div class="bg-[#074324] text-white text-[11px] font-medium border-b border-[#0B6839]/40 py-1.5 px-4 sm:px-6 lg:px-8">
        <div class="max-w-[1280px] mx-auto flex items-center justify-between">
            <div class="flex items-center gap-4 overflow-x-auto whitespace-nowrap scrollbar-none">
                <span class="text-[#F6AE01] font-bold flex items-center gap-1.5">
                    <img src="{{ asset('logousu.webp') }}" alt="USU" class="w-4 h-4 object-contain inline-block">
                    <span>USU Official:</span>
                </span>
                <a href="https://usu.ac.id/id" target="_blank" class="hover:text-[#F6AE01] transition-colors">Portal Utama USU</a>
                <span class="text-white/30">•</span>
                <a href="https://digilib.usu.ac.id" target="_blank" class="hover:text-[#F6AE01] transition-colors">DIGILIB OPAC</a>
                <span class="text-white/30">•</span>
                <a href="https://repositori.usu.ac.id" target="_blank" class="hover:text-[#F6AE01] transition-colors">Repositori USU</a>
                <span class="text-white/30">•</span>
                <a href="https://resourceguide.usu.ac.id" target="_blank" class="hover:text-[#F6AE01] transition-colors">Resource Guide</a>
            </div>
            
            <div class="hidden sm:flex items-center gap-3 shrink-0">
                <span class="inline-flex items-center gap-1.5 text-white/90">
                    <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
                    <span>Jam Layanan: Buka (08.00 – 20.00 WIB)</span>
                </span>
            </div>
        </div>
    </div>
    <!-- USU GOLD RIBBON ACCENT -->
    <div class="h-1 bg-gradient-to-r from-[#F6AE01] via-[#FEC52E] to-[#EB680D]"></div>

    <!-- ========================================================================= -->
    <!-- MAIN NAVBAR                                                               -->
    <!-- ========================================================================= -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-[#0B6839]/15 shadow-xs">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18 py-3">
                
                <!-- Left: Brand Identity + Navigation Links aligned together -->
                <div class="flex items-center gap-6 xl:gap-8">
                    <a href="{{ route('beranda') }}" class="flex items-center gap-3 group shrink-0">
                        <img src="{{ asset('logousu.webp') }}" alt="Logo Universitas Sumatera Utara" class="w-10 h-10 object-contain drop-shadow-xs group-hover:scale-105 transition-transform duration-200">
                        <div class="flex flex-col">
                            <span class="text-base sm:text-lg font-extrabold tracking-tight text-[#0F172A] whitespace-nowrap">Perpustakaan <span class="text-[#0B6839]">USU</span></span>
                            <span class="text-[11px] font-medium text-[#64748B] whitespace-nowrap">Universitas Sumatera Utara</span>
                        </div>
                    </a>

                    <!-- Navigation Menu -->
                    <nav class="hidden lg:flex items-center gap-1 text-sm font-semibold text-[#475569]">
                        <a href="{{ route('beranda') }}" class="px-3.5 py-2 rounded-lg {{ request()->routeIs('beranda') ? 'text-[#0B6839] bg-[#F0FDF4]' : 'hover:text-[#0B6839] hover:bg-[#F0FDF4]' }} transition-all">
                            Beranda
                        </a>

                        <!-- LAYANAN DROPDOWN -->
                        <div class="relative dropdown-wrapper group" id="layanan-dropdown-wrapper">
                            <button type="button" onclick="toggleLayananDropdown(event)" id="layanan-dropdown-btn" class="px-3.5 py-2 rounded-lg {{ request()->is('layanan*') ? 'text-[#0B6839] bg-[#F0FDF4]' : 'hover:text-[#0B6839] hover:bg-[#F0FDF4]' }} transition-all flex items-center gap-1.5 focus:outline-none">
                                <span>Layanan</span>
                                <span class="material-symbols-outlined text-lg transition-transform duration-200 group-hover:rotate-180" id="layanan-arrow-icon">expand_more</span>
                            </button>
                            
                            <!-- Dropdown Panel linking to separate pages -->
                            <div id="layanan-dropdown-menu" class="dropdown-menu opacity-0 invisible translate-y-1 pointer-events-none group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 group-hover:pointer-events-auto absolute left-0 top-full pt-1.5 w-80 z-50 transition-all duration-150">
                                <div class="bg-white rounded-2xl shadow-2xl border border-[#E2E8F0] p-2 divide-y divide-[#F1F5F9]">
                                    <a href="{{ route('layanan.luring') }}" class="flex items-start gap-3 p-3 rounded-xl hover:bg-[#F0FDF4] transition-colors group/item {{ request()->routeIs('layanan.luring') ? 'bg-[#F0FDF4]' : '' }}">
                                        <div class="w-9 h-9 rounded-xl bg-[#F0FDF4] text-[#0B6839] group-hover/item:bg-[#0B6839] group-hover/item:text-white flex items-center justify-center shrink-0 transition-colors">
                                            <span class="material-symbols-outlined text-xl">storefront</span>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-[#0F172A] group-hover/item:text-[#0B6839] transition-colors">Layanan Luring</div>
                                            <div class="text-[11px] text-[#64748B] leading-relaxed mt-0.5">Sirkulasi, keanggotaan, bimbingan, referensi & kelas literasi.</div>
                                        </div>
                                    </a>

                                    <a href="{{ route('layanan.daring') }}" class="flex items-start gap-3 p-3 rounded-xl hover:bg-[#F0FDF4] transition-colors group/item {{ request()->routeIs('layanan.daring') ? 'bg-[#F0FDF4]' : '' }}">
                                        <div class="w-9 h-9 rounded-xl bg-[#F0FDF4] text-[#15803D] group-hover/item:bg-[#15803D] group-hover/item:text-white flex items-center justify-center shrink-0 transition-colors">
                                            <span class="material-symbols-outlined text-xl">cloud_sync</span>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-[#0F172A] group-hover/item:text-[#15803D] transition-colors">Layanan Daring</div>
                                            <div class="text-[11px] text-[#64748B] leading-relaxed mt-0.5">Reservasi buku online, SKBP online, Turnitin & unggah mandiri.</div>
                                        </div>
                                    </a>

                                    <a href="{{ route('layanan.area-belajar') }}" class="flex items-start gap-3 p-3 rounded-xl hover:bg-[#FFFBEB] transition-colors group/item {{ request()->routeIs('layanan.area-belajar') ? 'bg-[#FFFBEB]' : '' }}">
                                        <div class="w-9 h-9 rounded-xl bg-[#FFFBEB] text-[#B45309] group-hover/item:bg-[#B45309] group-hover/item:text-white flex items-center justify-center shrink-0 transition-colors">
                                            <span class="material-symbols-outlined text-xl">meeting_room</span>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-[#0F172A] group-hover/item:text-[#B45309] transition-colors">Layanan Area Belajar & Ruang Rapat</div>
                                            <div class="text-[11px] text-[#64748B] leading-relaxed mt-0.5">The Gade (TGCL), RUBELIN, ruang rapat & ruang konferensi.</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- JADWAL RUANGAN -->
                        <a href="{{ route('jadwal.ruangan') }}" class="px-3.5 py-2 rounded-lg {{ request()->routeIs('jadwal.ruangan') ? 'text-[#0B6839] bg-[#F0FDF4]' : 'hover:text-[#0B6839] hover:bg-[#F0FDF4]' }} transition-all">
                            <span>Jadwal Ruangan</span>
                        </a>
                    </nav>
                </div>

                <!-- Right: Secondary Nav (Bantuan, Kontak) + Action Buttons -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Navigasi Kanan: Bantuan & Kontak -->
                    <nav class="hidden lg:flex items-center gap-1 text-sm font-semibold text-[#475569] border-r border-[#E2E8F0] pr-2 xl:pr-3 mr-1">
                        <a href="{{ route('bantuan') }}" class="px-3 py-2 rounded-lg {{ request()->routeIs('bantuan') ? 'text-[#0B6839] bg-[#F0FDF4]' : 'hover:text-[#0B6839] hover:bg-[#F0FDF4]' }} transition-all flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-base text-[#0B6839]">help</span>
                            <span>Bantuan</span>
                        </a>

                        <a href="{{ route('kontak') }}" class="px-3 py-2 rounded-lg {{ request()->routeIs('kontak') ? 'text-[#0B6839] bg-[#F0FDF4]' : 'hover:text-[#0B6839] hover:bg-[#F0FDF4]' }} transition-all flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-base text-[#0B6839]">contact_support</span>
                            <span>Kontak</span>
                        </a>
                    </nav>

                    <button type="button" onclick="focusSearchInput()" class="hidden md:flex items-center gap-2 px-3 py-2 text-xs text-[#64748B] bg-[#F8FAF7] hover:bg-[#E2E8F0] border border-[#E2E8F0] rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-sm">search</span>
                        <span>Cari</span>
                        <kbd class="px-1.5 py-0.5 text-[10px] font-semibold bg-white border border-[#CBD5E1] rounded text-[#64748B]">⌘K</kbd>
                    </button>

                    <button type="button" onclick="openUniversalReservationModal()" class="usu-btn-primary px-4 py-2.5 text-xs font-bold flex items-center gap-1.5 shadow-sm">
                        <span class="material-symbols-outlined text-base text-[#F6AE01]">calendar_add_on</span>
                        <span>Reservasi Sekarang</span>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button type="button" id="mobile-menu-btn" onclick="toggleMobileMenu()" class="lg:hidden p-2 text-[#475569] hover:text-[#0F172A] rounded-lg hover:bg-[#F1F5F9]">
                        <span class="material-symbols-outlined text-2xl">menu</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Panel -->
        <div id="mobile-nav-panel" class="hidden lg:hidden border-t border-[#E2E8F0] bg-white px-4 py-4 space-y-2 text-sm font-semibold">
            <div class="flex items-center gap-2.5 px-3 py-2 mb-2 bg-[#F8FAF7] rounded-xl border border-[#E2E8F0]">
                <img src="{{ asset('logousu.webp') }}" alt="Logo USU" class="w-8 h-8 object-contain">
                <div>
                    <span class="text-xs font-bold text-[#074324] block">Perpustakaan USU</span>
                    <span class="text-[10px] text-[#64748B] block font-normal">Portal Layanan & Fasilitas</span>
                </div>
            </div>
            <a href="{{ route('beranda') }}" class="block px-3 py-2 rounded-lg hover:bg-[#F8FAF7] text-[#0F172A]">Beranda</a>
            <div class="pt-2 pb-1 text-[11px] font-bold text-[#94A3B8] uppercase px-3">Halaman Layanan</div>
            <a href="{{ route('layanan.luring') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#F0FDF4] text-[#0B6839]">
                <span class="material-symbols-outlined text-base">storefront</span> Layanan Luring
            </a>
            <a href="{{ route('layanan.daring') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#F0FDF4] text-[#15803D]">
                <span class="material-symbols-outlined text-base">cloud_sync</span> Layanan Daring
            </a>
            <a href="{{ route('layanan.area-belajar') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#FFFBEB] text-[#B45309]">
                <span class="material-symbols-outlined text-base">meeting_room</span> Layanan Area Belajar & Ruang Rapat
            </a>
            <div class="pt-2 border-t border-[#E2E8F0] space-y-1">
                <a href="{{ route('jadwal.ruangan') }}" class="block px-3 py-2 rounded-lg hover:bg-[#F8FAF7] text-[#0F172A]">
                    Jadwal Ruangan
                </a>
                <a href="{{ route('bantuan') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#F0FDF4] text-[#0B6839]">
                    <span class="material-symbols-outlined text-base">help</span> Bantuan
                </a>
                <a href="{{ route('kontak') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-[#F0FDF4] text-[#0B6839]">
                    <span class="material-symbols-outlined text-base">contact_support</span> Kontak Kami
                </a>
            </div>
        </div>
        </div>
    </header>

    <!-- CONTENT PLACEHOLDER -->
    <main class="flex-1 max-w-[1280px] w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gradient-to-b from-[#074324] via-[#053B1F] to-[#032413] text-[#E2E8F0] text-xs mt-16 border-t-4 border-[#F6AE01]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-8 border-b border-[#0B6839]/60">
                
                <div class="md:col-span-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white/95 p-1 flex items-center justify-center ring-2 ring-[#F6AE01]/70 shadow-md shrink-0">
                            <img src="{{ asset('logousu.webp') }}" alt="Logo Universitas Sumatera Utara" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <span class="text-base font-extrabold text-white block">Perpustakaan <span class="text-[#F6AE01]">USU</span></span>
                            <span class="text-[11px] text-white/70 block">Universitas Sumatera Utara</span>
                        </div>
                    </div>
                    <p class="text-xs leading-relaxed text-white/80">
                        Jalan Perpustakaan No. 1, Kampus USU, Padang Bulan, Medan, Sumatera Utara 20155.<br>
                        Email: <a href="mailto:libraryp@usu.ac.id" class="text-[#F6AE01] hover:underline">libraryp@usu.ac.id</a> • Telepon: (061) 8218666
                    </p>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-[11px] text-[#F6AE01] border border-white/15">
                        <span class="material-symbols-outlined text-sm">verified</span>
                        <span>Akreditasi A (Unggul) — Perpustakaan Nasional RI</span>
                    </div>
                </div>

                <div class="md:col-span-3 space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#F6AE01] block flex items-center gap-1.5">
                        <span class="w-1.5 h-3.5 bg-[#F6AE01] rounded-full inline-block"></span>
                        Halaman Layanan
                    </span>
                    <ul class="space-y-2 font-medium text-white/85">
                        <li><a href="{{ route('layanan.luring') }}" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> Layanan Luring (Onsite)</a></li>
                        <li><a href="{{ route('layanan.daring') }}" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> Layanan Daring (Online)</a></li>
                        <li><a href="{{ route('layanan.area-belajar') }}" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> Area Belajar & Ruang Rapat</a></li>
                        <li><a href="{{ route('jadwal.ruangan') }}" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#F6AE01]">&bull;</span> Jadwal & Ketersediaan Ruang</a></li>
                        <li><a href="{{ route('bantuan') }}" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> Pusat Bantuan</a></li>
                        <li><a href="{{ route('kontak') }}" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> Kontak Kami</a></li>
                    </ul>
                </div>

                <div class="md:col-span-4 space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#F6AE01] block flex items-center gap-1.5">
                        <span class="w-1.5 h-3.5 bg-[#F6AE01] rounded-full inline-block"></span>
                        Tautan Portal Resmi USU
                    </span>
                    <ul class="space-y-2 font-medium text-white/85">
                        <li><a href="https://library.usu.ac.id/id" target="_blank" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> Portal Utama Perpustakaan USU</a></li>
                        <li><a href="https://digilib.usu.ac.id" target="_blank" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> DIGILIB OPAC (Katalog Buku)</a></li>
                        <li><a href="https://repositori.usu.ac.id" target="_blank" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> Repositori Institusi USU</a></li>
                        <li><a href="https://resourceguide.usu.ac.id" target="_blank" class="hover:text-[#F6AE01] transition-colors flex items-center gap-1.5"><span class="text-[#10B981]">&bull;</span> USU Resource Guide</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/60">
                <p>&copy; 2026 Perpustakaan Universitas Sumatera Utara. Seluruh hak cipta dilindungi.</p>
                <p class="font-medium text-white/80 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-[#10B981]"></span>
                    <span>USU Library Hub — The Era of Ultimate Excellence</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- ========================================================================= -->
    <!-- SERVICE DETAIL MODAL                                                      -->
    <!-- ========================================================================= -->
    <div id="service-modal" class="fixed inset-0 z-50 bg-[#0F172A]/50 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-[#E2E8F0] space-y-4">
            <div class="flex items-start justify-between gap-3 border-b border-[#E2E8F0] pb-3.5">
                <div class="flex items-center gap-3">
                    <div id="modal-icon-bg" class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center shrink-0">
                        <span id="modal-icon" class="material-symbols-outlined text-2xl">description</span>
                    </div>
                    <div>
                        <span id="modal-badge" class="text-[10px] font-bold px-2 py-0.5 rounded-md inline-block mb-0.5 bg-[#F0FDF4] text-[#0B6839]">Layanan</span>
                        <h3 id="modal-title" class="text-base font-bold text-[#0F172A] leading-snug">Nama Layanan</h3>
                    </div>
                </div>
                <button type="button" onclick="closeServiceModal()" class="text-[#94A3B8] hover:text-[#0F172A] p-1 rounded-lg hover:bg-[#F8FAF7]">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>

            <div class="space-y-3.5 text-xs sm:text-sm text-[#475569]">
                <div>
                    <h4 class="font-bold text-[#0F172A] text-xs uppercase tracking-wider mb-1">Deskripsi</h4>
                    <p id="modal-desc" class="text-xs leading-relaxed text-[#64748B]">Deskripsi lengkap layanan.</p>
                </div>

                <div class="bg-[#F8FAF7] p-3 rounded-xl border border-[#E2E8F0] space-y-1.5">
                    <h4 class="font-bold text-[#0F172A] text-xs flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-[#0B6839]">fact_check</span>
                        <span>Syarat & Berkas:</span>
                    </h4>
                    <ul id="modal-requirements" class="list-disc list-inside text-xs space-y-1 text-[#64748B]"></ul>
                </div>

                <div class="text-xs text-[#475569] space-y-1">
                    <p><strong>Kontak Resmi:</strong> <span id="modal-contact" class="text-[#0F172A] font-semibold"></span></p>
                    <p><strong>Lokasi / Akses:</strong> <span id="modal-location" class="text-[#0F172A] font-semibold"></span></p>
                </div>
            </div>

            <div class="pt-3 border-t border-[#E2E8F0] flex items-center justify-end gap-2.5">
                <button type="button" onclick="closeServiceModal()" class="usu-btn-secondary px-4 py-2 text-xs">
                    Tutup
                </button>
                <button id="modal-reserve-btn" type="button" onclick="handleModalReserveClick()" class="usu-btn-primary px-4 py-2 text-xs inline-flex items-center gap-1.5">
                    <span>Lanjutkan Reservasi</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- UNIFIED RESERVATION MODAL                                                 -->
    <!-- ========================================================================= -->
    <div id="universal-res-modal" class="fixed inset-0 z-50 bg-[#0F172A]/50 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-[#E2E8F0] space-y-4 max-h-[90vh] overflow-y-auto">
            <div class="flex items-start justify-between border-b border-[#E2E8F0] pb-3.5">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('logousu.webp') }}" alt="Logo USU" class="w-9 h-9 object-contain shrink-0">
                    <div>
                        <span class="text-[10px] font-bold text-[#0B6839] uppercase tracking-wider">Formulir Reservasi Resmi</span>
                        <h3 class="text-base font-bold text-[#0F172A]">Pengajuan Reservasi Layanan Perpustakaan USU</h3>
                    </div>
                </div>
                <button type="button" onclick="closeUniversalReservationModal()" class="text-[#94A3B8] hover:text-[#0F172A] p-1 rounded-lg hover:bg-[#F8FAF7]">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>

            <form id="universal-reservation-form" onsubmit="handleUniversalReservationSubmit(event)" class="space-y-3.5 text-xs sm:text-sm">
                <div>
                    <label class="block text-xs font-bold text-[#0F172A] mb-1">Pilihan Layanan / Ruangan</label>
                    <select id="univ-service-select" class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs font-medium text-[#0F172A] outline-none focus:border-[#0B6839]">
                        <optgroup label="Layanan Area Belajar & Ruang Rapat">
                            <option value="tgcl">The Gade Creative Lounge (Lantai 1 - Coworking)</option>
                            <option value="rubelin">Ruang Belajar Individu / RUBELIN (Lantai 1 - Hening Kedap Suara)</option>
                            <option value="rapat-lt1">Ruang Rapat Lantai 1 (Kapasitas 6 / 18 Orang)</option>
                            <option value="rapat-lt2">Ruang Rapat Lantai 2 (Kapasitas 12 Orang)</option>
                            <option value="rapat-lt3">Ruang Rapat Lantai 3 (Kapasitas 8 Orang)</option>
                            <option value="konferensi">Ruang Konferensi (Lantai 1 - Kapasitas 70 Orang)</option>
                        </optgroup>
                        <optgroup label="Layanan Luring (Onsite)">
                            <option value="sirkulasi">Layanan Sirkulasi & Peminjaman (Lantai 1)</option>
                            <option value="keanggotaan">Layanan Keanggotaan & Aktivasi KTM (Lantai 2)</option>
                            <option value="bimbingan">Layanan Bimbingan Pengguna & Orientasi</option>
                            <option value="referensi">Layanan Referensi Dosen & Pascasarjana (Lantai 1)</option>
                            <option value="kelas-literasi">Layanan Kelas Literasi Informasi & Pelatihan</option>
                        </optgroup>
                        <optgroup label="Layanan Daring (Online)">
                            <option value="reservasi-buku">Reservasi Koleksi Buku Standar (DIGILIB OPAC)</option>
                            <option value="skbp">Layanan Pengurusan SKBP Online (Syarat Wisuda)</option>
                            <option value="turnitin">Layanan Uji Turnitin Online (Plagiarisme)</option>
                            <option value="penelusuran-literatur">Pemesanan Penelusuran Literatur & Jurnal</option>
                            <option value="unggah-mandiri">Layanan Unggah Mandiri Karya Akhir (Repositori)</option>
                        </optgroup>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-[#0F172A] mb-1">Tanggal</label>
                        <input type="date" id="univ-date" required class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs text-[#0F172A] outline-none focus:border-[#0B6839]" value="2026-09-03">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#0F172A] mb-1">Sesi Waktu</label>
                        <select id="univ-time-slot" class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs font-medium text-[#0F172A] outline-none focus:border-[#0B6839]">
                            <option value="08:00 - 10:00 WIB">08.00 – 10.00 WIB</option>
                            <option value="10:00 - 12:00 WIB">10.00 – 12.00 WIB</option>
                            <option value="13:00 - 15:00 WIB">13.00 – 15.00 WIB</option>
                            <option value="15:00 - 17:00 WIB">15.00 – 17.00 WIB</option>
                            <option value="17:00 - 19:30 WIB">17.00 – 19.30 WIB</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-[#0F172A] mb-1">NIM / NIP</label>
                        <input type="text" id="univ-nim" placeholder="211402001 / NIP" required class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs text-[#0F172A] outline-none focus:border-[#0B6839]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#0F172A] mb-1">Nama Lengkap</label>
                        <input type="text" id="univ-name" placeholder="Nama pemohon" required class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs text-[#0F172A] outline-none focus:border-[#0B6839]">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-[#0F172A] mb-1">Fakultas / Prodi</label>
                        <input type="text" id="univ-fakultas" placeholder="Fasilkom-TI / Kedokteran / dll" required class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs text-[#0F172A] outline-none focus:border-[#0B6839]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#0F172A] mb-1">No. WhatsApp</label>
                        <input type="tel" id="univ-wa" placeholder="0812xxxxxxxx" required class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs text-[#0F172A] outline-none focus:border-[#0B6839]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#0F172A] mb-1">Keperluan / Keterangan</label>
                    <textarea id="univ-purpose" rows="2" placeholder="Contoh: Diskusi tugas akhir kelompok / Bimbingan riset / Pengambilan buku" required class="w-full p-2.5 rounded-lg border border-[#E2E8F0] bg-[#F8FAF7] text-xs text-[#0F172A] outline-none focus:border-[#0B6839]"></textarea>
                </div>

                <div class="pt-3 border-t border-[#E2E8F0] flex items-center justify-between">
                    <span class="text-[11px] text-[#94A3B8]">Sistem Resmi Perpustakaan USU</span>
                    <button type="submit" class="usu-btn-primary px-5 py-2 text-xs">
                        Kirim Formulir Reservasi
                    </button>
                </div>
            </form>

            <!-- Success State -->
            <div id="universal-res-success" class="hidden text-center py-4 space-y-3.5">
                <div class="w-12 h-12 rounded-full bg-[#F0FDF4] text-[#10B981] flex items-center justify-center mx-auto">
                    <span class="material-symbols-outlined text-3xl">check_circle</span>
                </div>
                <div>
                    <h4 class="text-base font-bold text-[#0F172A]">Reservasi Berhasil Diajukan!</h4>
                    <p class="text-xs text-[#64748B] max-w-sm mx-auto mt-1">
                        Kode Tiket: <strong id="univ-res-code" class="text-[#0B6839] font-mono font-bold text-sm">USU-RES-9281</strong>
                    </p>
                </div>
                <div class="bg-[#F8FAF7] p-3 rounded-xl border border-[#E2E8F0] text-left text-xs space-y-1 max-w-sm mx-auto text-[#64748B]">
                    <div><strong>Layanan/Ruang:</strong> <span id="res-summary-service" class="text-[#0F172A]"></span></div>
                    <div><strong>Waktu:</strong> <span id="res-summary-time" class="text-[#0F172A]"></span></div>
                    <div><strong>Pemohon:</strong> <span id="res-summary-name" class="text-[#0F172A]"></span></div>
                </div>
                <div class="flex items-center justify-center gap-2 pt-2">
                    <button type="button" onclick="closeUniversalReservationModal()" class="usu-btn-secondary px-4 py-2 text-xs">
                        Tutup
                    </button>
                    <button type="button" onclick="confirmToOfficer()" class="usu-btn-primary px-4 py-2 text-xs flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm">chat</span>
                        <span>Konfirmasi via WhatsApp</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- SHARED CLIENT SCRIPTS -->
    <script>
        const SERVICES_DATA = {
            'sirkulasi': {
                title: 'Layanan Sirkulasi (Peminjaman & Denda)',
                category: 'Layanan Luring (Onsite)',
                icon: 'sync_alt',
                desc: 'Layanan sirkulasi diselenggarakan di perpustakaan universitas dan 14 perpustakaan cabang menggunakan SIM online terintegrasi. Pengguna dapat meminjam buku, mengembalikan, memperpanjang pinjaman, dan membayar denda di lokasi terdekat.',
                requirements: [
                    'KTM Mahasiswa USU aktif / Kartu Anggota Perpustakaan',
                    'Maksimal 3 eksemplar buku sirkulasi untuk S1 (durasi 7 hari kerja)',
                    'Perpanjangan masa pinjam dapat dilakukan jika buku tidak sedang dipesan pemustaka lain'
                ],
                location: 'Meja Sirkulasi Lantai 1 & 14 Cabang',
                contact: 'HP/WA 0812-6215-8587',
                whatsapp: '6281262158587'
            },
            'keanggotaan': {
                title: 'Layanan Keanggotaan (Aktivasi KTM & SKBP Onsite)',
                category: 'Layanan Luring (Onsite)',
                icon: 'badge',
                desc: 'Layanan keanggotaan berada di lantai 2 gedung perpustakaan universitas. Pengguna dapat melakukan aktivasi keanggotaan, pengurusan surat keterangan bebas pustaka (SKBP) onsite, dan pendaftaran keanggotaan tamu eksternal.',
                requirements: [
                    'KTM Mahasiswa USU aktif / Kartu Pegawai Dosen/Tendik',
                    'KTP / Tanda pengenal resmi (untuk pemustaka tamu luar)',
                    'Bukti penyerahan karya akhir (untuk SKBP onsite)'
                ],
                location: 'Lantai 2 Gedung Perpustakaan Universitas',
                contact: 'HP/WA 0812-6215-8587',
                whatsapp: '6281262158587'
            },
            'bimbingan': {
                title: 'Layanan Bimbingan Pengguna',
                category: 'Layanan Luring (Onsite)',
                icon: 'support_agent',
                desc: 'Layanan pemberian bimbingan kepada pemustaka dalam menemukan informasi, baik sumber fisik yang dimiliki perpustakaan universitas, dilanggan secara online, maupun sumber luar perpustakaan secara cepat, tepat, dan akurat.',
                requirements: [
                    'Terbuka untuk mahasiswa perorangan maupun rombongan mahasiswa baru',
                    'Konfirmasi jadwal untuk rombongan delegasi fakultas/prodi'
                ],
                location: 'Information Desk / Ruang Bimbingan',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'referensi': {
                title: 'Layanan Referensi untuk Dosen & Mahasiswa Pascasarjana',
                category: 'Layanan Luring (Onsite)',
                icon: 'menu_book',
                desc: 'Layanan lantai 1 khusus dosen dan mahasiswa pascasarjana (S2/S3) yang membutuhkan keluasan ruang, kenyamanan, aksesibilitas informasi, penulisan artikel ilmiah, konsultasi riset, uji turnitin, terminal komputer publik, dan 5 unit RUBELIN.',
                requirements: [
                    'KTM Mahasiswa Pascasarjana (S2/S3) / Kartu Pegawai Dosen aktif USU',
                    'Membawa laptop pribadi atau memanfaatkan komputer publik yang disediakan'
                ],
                location: 'Lantai 1 Ruang Layanan Referensi Dosen & Pascasarjana',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'kelas-literasi': {
                title: 'Layanan Kelas Literasi Informasi',
                category: 'Layanan Luring / Pelatihan',
                icon: 'co_present',
                desc: 'Kegiatan sosialisasi dan pelatihan teknik penelusuran artikel e-journal & e-book bereputasi, manajemen sitasi Mendeley, dan orisinalitas riset. Diselenggarakan tatap muka atau daring sesuai permintaan.',
                requirements: [
                    'Permintaan akumulatif prodi via surat resmi ATAU permintaan individual minimal 5 orang',
                    'Peserta adalah mahasiswa/dosen aktif USU',
                    'Membawa laptop pribadi dengan software Mendeley terpasang'
                ],
                location: 'Ruang Seminar / Ruang Pelatihan',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'reservasi-buku': {
                title: 'Layanan Reservasi Koleksi Buku Standar',
                category: 'Layanan Daring (Online)',
                icon: 'auto_stories',
                desc: 'Pengguna dapat melakukan reservasi/pemesanan koleksi buku tercetak Perpustakaan USU secara online melalui katalog OPAC sebelum mengambil buku di lokasi.',
                requirements: [
                    'Akun SSO / Barcode KTM aktif',
                    'Buku berstatus sirkulasi di katalog DIGILIB OPAC',
                    'Pengambilan buku di meja sirkulasi maksimal 1x24 jam setelah reservasi disetujui'
                ],
                location: 'Online via s.id/USULib-ReservasiBuku',
                contact: 'HP/WA 0813-9677-7904',
                whatsapp: '6281396777904'
            },
            'skbp': {
                title: 'Layanan Pengurusan SKBP Online',
                category: 'Layanan Daring (Online)',
                icon: 'verified_user',
                desc: 'Pengurusan Surat Keterangan Bebas Pustaka (SKBP) secara online melalui kontak operator sirkulasi untuk melengkapi persyaratan wisuda tanpa harus berkunjung fisik.',
                requirements: [
                    'Sudah menyelesaikan unggah mandiri naskah akhir di Repositori USU',
                    'Bebas pinjaman buku dan tanggungan denda di perpustakaan universitas & cabang'
                ],
                location: 'Online Portal / Operator Sirkulasi',
                contact: 'HP/WA 0812-6215-8587',
                whatsapp: '6281262158587'
            },
            'turnitin': {
                title: 'Layanan Uji Turnitin Online',
                category: 'Layanan Daring (Online)',
                icon: 'spellcheck',
                desc: 'Pemeriksaan plagiarisme atas karya tulis dosen, tesis (S2), dan disertasi (S3) menggunakan aplikasi Turnitin resmi Perpustakaan USU.',
                requirements: [
                    'File naskah dalam format .docx atau .pdf',
                    'Identitas mahasiswa pasca / dosen USU aktif',
                    'Pengajuan via formulir https://bit.ly/askujiturnitinUSULibrary'
                ],
                location: 'Online via bit.ly/askujiturnitinUSULibrary',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'penelusuran-literatur': {
                title: 'Layanan Pemesanan Penelusuran Literatur',
                category: 'Layanan Daring (Online)',
                icon: 'travel_explore',
                desc: 'Bantuan pustakawan dalam mendapatkan artikel jurnal ilmiah nasional/internasional bereputasi (Scopus, ScienceDirect, IEEE, dll) dan e-Books untuk riset aktif dosen dan pascasarjana.',
                requirements: [
                    'Topik riset / judul artikel / DOI yang dibutuhkan',
                    'Khusus Dosen dan Mahasiswa Pascasarjana USU aktif (Gratis)'
                ],
                location: 'Online via bit.ly/reservasiartikelUSULibrary',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'unggah-mandiri': {
                title: 'Layanan Unggah Mandiri Karya Akhir',
                category: 'Layanan Daring (Online)',
                icon: 'cloud_upload',
                desc: 'Penyerahan file digital kertas karya (Diploma), skripsi (S1), karya akhir profesi, tesis (S2), dan disertasi (S3) yang telah disahkan ke Repositori Institusi USU.',
                requirements: [
                    'Naskah lengkap dengan lembar pengesahan bertanda tangan & stempel fakultas',
                    'Melampirkan abstrak bahasa Indonesia & Inggris',
                    'Mengikuti pedoman format PDF repositori resmi USU'
                ],
                location: 'Portal repositori.usu.ac.id',
                contact: 'HP/WA 0812-1205-7843',
                whatsapp: '6281212057843'
            },
            'tgcl': {
                title: 'The Gade Creative Lounge (TGCL)',
                category: 'Area Belajar & Ruang Rapat',
                icon: 'groups',
                desc: 'Penyediaan area Coworking Space bagi pengguna untuk belajar bersama, berdiskusi santai, dilengkapi 3 komputer publik, Wi-Fi cepat, catur, dan table soccer.',
                requirements: [
                    'Terbuka untuk seluruh sivitas akademika USU',
                    'Menjaga ketertiban fasilitas dan kebersihan area lounge'
                ],
                location: 'Lantai 1 Gedung Perpustakaan Universitas',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'rubelin': {
                title: 'Ruang Belajar Individu (RUBELIN)',
                category: 'Area Belajar & Ruang Rapat',
                icon: 'chair_alt',
                desc: '5 unit ruang belajar hening kedap suara khusus Dosen, Peneliti, dan Mahasiswa Pascasarjana (S2/S3) untuk fokus riset dan kuliah daring.',
                requirements: [
                    'Khusus Dosen, Peneliti, dan Mahasiswa Pascasarjana aktif USU',
                    'Melakukan reservasi slot terlebih dahulu'
                ],
                location: 'Lantai 1 Ruang Referensi Dosen & Pasca',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'rapat-lt1': {
                title: 'Ruang Rapat / Diskusi Lantai 1',
                category: 'Area Belajar & Ruang Rapat',
                icon: 'meeting_room',
                desc: '2 ruang rapat kapasitas maksimal 6 orang dan 1 ruang rapat kapasitas maksimal 18 orang dengan fasilitas whiteboard dan proyektor.',
                requirements: [
                    'Minimal peserta sesuai kapasitas ruangan',
                    'Reservasi jadwal minimal 1 hari sebelum pemakaian'
                ],
                location: 'Lantai 1 Gedung Perpustakaan',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'rapat-lt2': {
                title: 'Ruang Rapat / Diskusi Lantai 2',
                category: 'Area Belajar & Ruang Rapat',
                icon: 'group_work',
                desc: '2 unit ruang rapat dengan kapasitas maksimal 12 orang per ruang untuk bimbingan skripsi, rapat organisasi, dan riset kelompok.',
                requirements: [
                    'Kartu identitas pemohon penanggung jawab ruangan',
                    'Penggunaan sesuai durasi sesi reservasi'
                ],
                location: 'Lantai 2 Gedung Perpustakaan',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'rapat-lt3': {
                title: 'Ruang Rapat / Diskusi Lantai 3',
                category: 'Area Belajar & Ruang Rapat',
                icon: 'forum',
                desc: '1 unit ruang rapat kapasitas maksimal 8 orang dengan suasana hening di Lantai 3 untuk bimbingan tesis/disertasi dan pertemuan tertutup.',
                requirements: [
                    'Reservasi slot terlebih dahulu melalui sistem',
                    'Maksimal 8 orang peserta'
                ],
                location: 'Lantai 3 Gedung Perpustakaan',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            },
            'konferensi': {
                title: 'Ruang Konferensi (Auditorium Mini)',
                category: 'Area Belajar & Ruang Rapat',
                icon: 'podium',
                desc: 'Ruang kuliah umum, small event, seminar, dan pelatihan dengan kapasitas maksimal 70 orang dilengkapi sound system dan dual proyektor.',
                requirements: [
                    'Surat pengajuan acara resmi dari prodi/fakultas/organisasi kemahasiswaan',
                    'Penanggung jawab acara wajib mengkonfirmasi ke staf perpustakaan'
                ],
                location: 'Lantai 1 Gedung Perpustakaan Universitas',
                contact: 'HP/WA 0812-6260-2129',
                whatsapp: '6281262602129'
            }
        };

        let currentDetailServiceId = null;
        let lastGeneratedBooking = null;

        function scrollToSection(id) {
            const el = document.getElementById(id);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Dropdown toggle & selection handling
        let isDropdownOpen = false;
        function toggleLayananDropdown(e) {
            e.stopPropagation();
            const menu = document.getElementById('layanan-dropdown-menu');
            const arrow = document.getElementById('layanan-arrow-icon');
            isDropdownOpen = !isDropdownOpen;
            
            if (isDropdownOpen) {
                menu.classList.remove('opacity-0', 'invisible', 'translate-y-1', 'pointer-events-none');
                menu.classList.add('opacity-100', 'visible', 'translate-y-0', 'pointer-events-auto');
                if (arrow) arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('opacity-0', 'invisible', 'translate-y-1', 'pointer-events-none');
                menu.classList.remove('opacity-100', 'visible', 'translate-y-0', 'pointer-events-auto');
                if (arrow) arrow.style.transform = 'rotate(0deg)';
            }
        }

        function closeLayananDropdown() {
            const menu = document.getElementById('layanan-dropdown-menu');
            const arrow = document.getElementById('layanan-arrow-icon');
            isDropdownOpen = false;
            if (menu) {
                menu.classList.add('opacity-0', 'invisible', 'translate-y-1', 'pointer-events-none');
                menu.classList.remove('opacity-100', 'visible', 'translate-y-0', 'pointer-events-auto');
            }
            if (arrow) arrow.style.transform = 'rotate(0deg)';
        }

        document.addEventListener('click', function(e) {
            const wrapper = document.getElementById('layanan-dropdown-wrapper');
            if (wrapper && !wrapper.contains(e.target)) {
                closeLayananDropdown();
            }
        });

        // Detail Modal
        function openServiceDetailModal(serviceId) {
            const data = SERVICES_DATA[serviceId];
            if (!data) return;
            currentDetailServiceId = serviceId;

            document.getElementById('modal-title').innerText = data.title;
            document.getElementById('modal-badge').innerText = data.category;
            document.getElementById('modal-icon').innerText = data.icon;
            document.getElementById('modal-desc').innerText = data.desc;
            document.getElementById('modal-requirements').innerHTML = data.requirements.map(r => `<li>${r}</li>`).join('');
            document.getElementById('modal-contact').innerText = data.contact;
            document.getElementById('modal-location').innerText = data.location;

            document.getElementById('service-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeServiceModal() {
            document.getElementById('service-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function handleModalReserveClick() {
            const id = currentDetailServiceId;
            closeServiceModal();
            if (id) {
                openUniversalReservationModal(id);
            }
        }

        // Universal Reservation Modal
        function openUniversalReservationModal(serviceKey, dateVal, slotVal) {
            const selectEl = document.getElementById('univ-service-select');
            if (serviceKey && selectEl) {
                selectEl.value = serviceKey;
            }
            if (dateVal) {
                const dateEl = document.getElementById('univ-date');
                if (dateEl) dateEl.value = dateVal;
            }
            if (slotVal) {
                const slotEl = document.getElementById('univ-time-slot');
                if (slotEl) {
                    for (let i = 0; i < slotEl.options.length; i++) {
                        if (slotEl.options[i].value === slotVal || slotEl.options[i].text.includes(slotVal) || slotVal.includes(slotEl.options[i].value)) {
                            slotEl.selectedIndex = i;
                            break;
                        }
                    }
                }
            }
            document.getElementById('universal-reservation-form').classList.remove('hidden');
            document.getElementById('universal-res-success').classList.add('hidden');
            document.getElementById('universal-res-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeUniversalReservationModal() {
            document.getElementById('universal-res-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function handleUniversalReservationSubmit(e) {
            e.preventDefault();
            const serviceSelect = document.getElementById('univ-service-select');
            const serviceName = serviceSelect.options[serviceSelect.selectedIndex].text;
            const serviceKey = serviceSelect.value;
            const date = document.getElementById('univ-date').value;
            const slot = document.getElementById('univ-time-slot').value;
            const name = document.getElementById('univ-name').value;
            const nim = document.getElementById('univ-nim').value;
            const code = 'USU-RES-' + Math.floor(1000 + Math.random() * 9000);

            lastGeneratedBooking = {
                code: code,
                serviceName: serviceName,
                serviceKey: serviceKey,
                date: date,
                slot: slot,
                name: name,
                nim: nim,
                waOfficer: (SERVICES_DATA[serviceKey] && SERVICES_DATA[serviceKey].whatsapp) ? SERVICES_DATA[serviceKey].whatsapp : '6281262158587'
            };

            document.getElementById('univ-res-code').innerText = code;
            document.getElementById('res-summary-service').innerText = serviceName;
            document.getElementById('res-summary-time').innerText = `${date} (${slot})`;
            document.getElementById('res-summary-name').innerText = `${name} (${nim})`;

            document.getElementById('universal-reservation-form').classList.add('hidden');
            document.getElementById('universal-res-success').classList.remove('hidden');
        }

        function confirmToOfficer() {
            if (!lastGeneratedBooking) return;
            const msg = `Halo Pustakawan Perpustakaan USU, saya ingin konfirmasi reservasi resmi:\n\n- Kode Tiket: ${lastGeneratedBooking.code}\n- Layanan/Ruang: ${lastGeneratedBooking.serviceName}\n- Waktu & Sesi: ${lastGeneratedBooking.date} (${lastGeneratedBooking.slot})\n- Nama Pemohon: ${lastGeneratedBooking.name}\n- NIM/NIP: ${lastGeneratedBooking.nim}\n\nMohon petunjuk lebih lanjut. Terima kasih.`;
            const waUrl = `https://wa.me/${lastGeneratedBooking.waOfficer}?text=${encodeURIComponent(msg)}`;
            window.open(waUrl, '_blank');
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-nav-panel');
            menu.classList.toggle('hidden');
        }

        function focusSearchInput() {
            const input = document.getElementById('main-search-input');
            if (input) {
                input.focus();
            }
        }
    </script>

    @yield('scripts')
</body>
</html>
