<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USU Library Hub — Perpustakaan Universitas Sumatera Utara</title>
    <meta name="description" content="Pusat layanan digital terpadu Perpustakaan Universitas Sumatera Utara (USU) untuk sivitas akademika, peneliti, dan masyarakat.">
    <link rel="icon" href="https://usu.ac.id/favicon.ico" type="image/x-icon">

    <!-- Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Material Symbols Outlined -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Vite Assets / Inline Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            usu: {
                                primary: '#487629',
                                secondary: '#529A3D',
                                light: '#5CB733',
                                dark: '#31521F',
                                gold: '#F6AE01',
                                orange: '#F28800',
                                'deep-orange': '#EB680D',
                                bg: '#F7F8F6',
                                surface: '#FFFFFF',
                                border: '#E5E7E3',
                                text: '#172019',
                                'text-secondary': '#5F685F',
                                'text-muted': '#8A928A',
                            }
                        },
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', '"Inter"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        :root {
            --color-usu-primary: #487629;
            --color-usu-secondary: #529A3D;
            --color-usu-light: #5CB733;
            --color-usu-dark: #31521F;
            --color-usu-gold: #F6AE01;
            --color-usu-orange: #F28800;
            --color-usu-deep-orange: #EB680D;
            --color-usu-bg: #F7F8F6;
            --color-usu-surface: #FFFFFF;
            --color-usu-border: #E5E7E3;
            --color-usu-text: #172019;
            --color-usu-text-secondary: #5F685F;
            --color-usu-text-muted: #8A928A;
        }

        body {
            background-color: var(--color-usu-bg);
            color: var(--color-usu-text);
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
            line-height: 1;
        }

        .usu-card {
            background-color: #FFFFFF;
            border: 1px solid #E5E7E3;
            border-radius: 14px;
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.2s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.2s ease;
        }

        .usu-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px -4px rgba(49, 82, 31, 0.08);
            border-color: #D3D8D0;
        }

        .usu-btn-primary {
            background-color: #487629;
            color: #FFFFFF;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.15s ease;
        }
        .usu-btn-primary:hover {
            background-color: #31521F;
        }

        .usu-btn-secondary {
            background-color: #FFFFFF;
            color: #487629;
            border: 1px solid #487629;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.15s ease;
        }
        .usu-btn-secondary:hover {
            background-color: #F0F4EE;
        }

        /* Badge styles */
        .badge-google-form {
            background-color: #FFF7ED;
            color: #C2410C;
            border: 1px solid #FFEDD5;
        }
        .badge-online {
            background-color: #F0FDF4;
            color: #15803D;
            border: 1px solid #DCFCE7;
        }
        .badge-whatsapp {
            background-color: #ECFDF5;
            color: #047857;
            border: 1px solid #D1FAE5;
        }
        .badge-reservasi {
            background-color: #F0F4EE;
            color: #31521F;
            border: 1px solid #DCE3D9;
        }
        .badge-luring {
            background-color: #F3F4F6;
            color: #4B5563;
            border: 1px solid #E5E7EB;
        }

        /* Status indicators */
        .status-dot-tersedia {
            background-color: #5CB733;
            box-shadow: 0 0 0 3px rgba(92, 183, 51, 0.2);
        }
        .status-dot-terpakai {
            background-color: #DC2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
        }
        .status-dot-menunggu {
            background-color: #F6AE01;
            box-shadow: 0 0 0 3px rgba(246, 174, 1, 0.2);
        }
        .status-dot-tutup {
            background-color: #8A928A;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col selection:bg-[#F6AE01] selection:text-[#31521F]">

    <!-- Institutional Top Navigation Bar -->
    <header class="sticky top-0 z-40 bg-[#FFFFFF]/95 backdrop-blur-md border-b border-[#E5E7E3] shadow-[0_1px_3px_0_rgba(0,0,0,0.03)]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18">
                
                <!-- Left: Identity -->
                <a href="/" class="flex items-center gap-3.5 group">
                    <div class="w-10 h-10 rounded-lg bg-[#487629] text-white flex items-center justify-center shadow-xs group-hover:bg-[#31521F] transition-colors">
                        <span class="material-symbols-outlined text-2xl text-[#F6AE01]">local_library</span>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2">
                            <span class="text-lg font-bold tracking-tight text-[#172019]">USU Library <span class="text-[#487629]">Hub</span></span>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-[#F0F4EE] text-[#487629] border border-[#DCE3D9]">Portal Layanan</span>
                        </div>
                        <span class="text-[11px] font-medium text-[#5F685F]">Perpustakaan Universitas Sumatera Utara</span>
                    </div>
                </a>

                <!-- Center: Navigation Links (Desktop) -->
                <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-[#5F685F]">
                    <a href="#beranda" class="text-[#487629] font-semibold">Beranda</a>
                    <a href="#layanan" class="hover:text-[#487629] transition-colors">Layanan</a>
                    <a href="#fasilitas" class="hover:text-[#487629] transition-colors">Fasilitas & Ruang</a>
                    <a href="#jadwal" class="hover:text-[#487629] transition-colors">Jadwal Ruangan</a>
                    <a href="#jam-layanan" class="hover:text-[#487629] transition-colors">Jam Layanan</a>
                </nav>

                <!-- Right: Actions & User Menu -->
                <div class="flex items-center gap-3">
                    <button type="button" onclick="focusSearchInput()" class="hidden sm:flex items-center gap-2 px-3 py-1.5 text-xs text-[#5F685F] bg-[#F7F8F6] hover:bg-[#EAECE8] border border-[#E5E7E3] rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-sm">search</span>
                        <span>Cari</span>
                        <kbd class="px-1.5 py-0.5 text-[10px] font-semibold bg-white border border-[#E5E7E3] rounded text-[#8A928A]">⌘K</kbd>
                    </button>

                    <!-- Auth Dropdown State / Simulation -->
                    <div class="relative" id="user-menu-container">
                        <button type="button" id="login-btn" onclick="openLoginModal()" class="usu-btn-primary px-4 py-2 text-xs flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-sm">login</span>
                            <span>Masuk Akun</span>
                        </button>
                    </div>

                    <!-- Mobile Menu Trigger -->
                    <button type="button" id="mobile-menu-btn" onclick="toggleMobileMenu()" class="md:hidden p-2 text-[#5F685F] hover:text-[#172019] rounded-lg hover:bg-[#F0F4EE]">
                        <span class="material-symbols-outlined text-2xl">menu</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Panel -->
        <div id="mobile-nav-panel" class="hidden md:hidden border-t border-[#E5E7E3] bg-[#FFFFFF] px-4 py-4 space-y-3">
            <nav class="flex flex-col space-y-2 text-sm font-medium text-[#5F685F]">
                <a href="#beranda" class="px-3 py-2 rounded-lg bg-[#F0F4EE] text-[#487629] font-semibold">Beranda</a>
                <a href="#layanan" class="px-3 py-2 rounded-lg hover:bg-[#F7F8F6]">Layanan</a>
                <a href="#fasilitas" class="px-3 py-2 rounded-lg hover:bg-[#F7F8F6]">Fasilitas & Ruang</a>
                <a href="#jadwal" class="px-3 py-2 rounded-lg hover:bg-[#F7F8F6]">Jadwal Ruangan</a>
                <a href="#jam-layanan" class="px-3 py-2 rounded-lg hover:bg-[#F7F8F6]">Jam Layanan</a>
            </nav>
        </div>
    </header>

    <!-- Main Workspace Container -->
    <main class="flex-1 max-w-[1280px] w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 space-y-16 sm:space-y-20">
        
        <!-- SECTION 1: HOMEPAGE HERO & SERVICE DISCOVERY -->
        <section id="beranda" class="space-y-8">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#F0F4EE] border border-[#DCE3D9] text-[#487629] text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-[#5CB733] animate-pulse"></span>
                    <span>Pusat Layanan Terpadu Perpustakaan USU</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#172019] tracking-tight leading-[1.15]">
                    Temukan Layanan <span class="text-[#487629]">Perpustakaan USU</span>
                </h1>

                <p class="text-base sm:text-lg text-[#5F685F] leading-relaxed max-w-2xl mx-auto">
                    Semua layanan, fasilitas, dan kebutuhan perpustakaan dalam satu tempat untuk mendukung proses belajar dan riset Anda.
                </p>

            </div>

            <!-- Prominent Central Search Bar with Intelligent Suggestion Layer -->
            <div class="max-w-2xl mx-auto relative">
                <div class="relative flex items-center shadow-[0_2px_12px_rgba(0,0,0,0.06)] rounded-2xl bg-white border-2 border-[#E5E7E3] focus-within:border-[#487629] focus-within:ring-4 focus-within:ring-[#487629]/10 transition-all">
                    <div class="pl-4.5 pr-2 text-[#5F685F]">
                        <span class="material-symbols-outlined text-2xl">search</span>
                    </div>
                    <input 
                        type="text" 
                        id="main-search-input" 
                        placeholder="Cari layanan, fasilitas, atau ruangan..." 
                        class="w-full py-4 pr-12 text-sm sm:text-base text-[#172019] placeholder-[#8A928A] bg-transparent outline-none"
                        autocomplete="off"
                    >
                    <button type="button" id="clear-search-btn" class="hidden absolute right-4 text-[#8A928A] hover:text-[#172019]">
                        <span class="material-symbols-outlined text-xl">cancel</span>
                    </button>
                </div>

                <!-- Instant Search Suggestions Dropdown -->
                <div id="search-suggestions" class="hidden absolute left-0 right-0 top-full mt-2 bg-white rounded-xl border border-[#E5E7E3] shadow-lg z-30 overflow-hidden divide-y divide-[#E5E7E3]">
                    <div class="p-3 bg-[#F7F8F6] text-xs font-semibold text-[#5F685F] flex items-center justify-between">
                        <span>Hasil & Rekomendasi Pencarian</span>
                        <span id="suggestion-count" class="text-[11px] text-[#8A928A]">Tekan Enter untuk melihat semua</span>
                    </div>
                    <div id="suggestion-items" class="max-h-72 overflow-y-auto divide-y divide-[#F0F2EF]">
                        <!-- Populated by JavaScript -->
                    </div>
                </div>

                <!-- Quick Access Buttons -->
                <div class="mt-4 flex items-center justify-center gap-2 sm:gap-3 flex-wrap text-xs">
                    <span class="text-[#8A928A] font-medium hidden sm:inline">Akses Cepat:</span>
                    <button type="button" onclick="quickFilterAction('Reservasi Ruangan')" class="px-3 py-1.5 rounded-lg bg-white border border-[#E5E7E3] text-[#487629] hover:bg-[#F0F4EE] hover:border-[#DCE3D9] font-medium transition-colors flex items-center gap-1.5 shadow-2xs">
                        <span class="material-symbols-outlined text-sm text-[#487629]">meeting_room</span>
                        <span>Reservasi Ruangan</span>
                    </button>
                    <button type="button" onclick="openServiceDetailModal('turnitin')" class="px-3 py-1.5 rounded-lg bg-white border border-[#E5E7E3] text-[#487629] hover:bg-[#F0F4EE] hover:border-[#DCE3D9] font-medium transition-colors flex items-center gap-1.5 shadow-2xs">
                        <span class="material-symbols-outlined text-sm text-[#F6AE01]">spellcheck</span>
                        <span>Uji Turnitin</span>
                    </button>
                    <button type="button" onclick="openServiceDetailModal('penelusuran-literatur')" class="px-3 py-1.5 rounded-lg bg-white border border-[#E5E7E3] text-[#487629] hover:bg-[#F0F4EE] hover:border-[#DCE3D9] font-medium transition-colors flex items-center gap-1.5 shadow-2xs">
                        <span class="material-symbols-outlined text-sm text-[#529A3D]">travel_explore</span>
                        <span>Penelusuran Literatur</span>
                    </button>
                    <button type="button" onclick="openServiceDetailModal('reservasi-buku')" class="px-3 py-1.5 rounded-lg bg-white border border-[#E5E7E3] text-[#487629] hover:bg-[#F0F4EE] hover:border-[#DCE3D9] font-medium transition-colors flex items-center gap-1.5 shadow-2xs">
                        <span class="material-symbols-outlined text-sm text-[#487629]">auto_stories</span>
                        <span>Reservasi Buku</span>
                    </button>
                </div>

            </div>
        </section>

        <!-- SECTION 2: LAYANAN POPULER -->
        <section class="space-y-6">
            <div class="flex items-center justify-between border-b border-[#E5E7E3] pb-3.5">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#172019] tracking-tight">Layanan Populer</h2>
                    <p class="text-xs sm:text-sm text-[#5F685F]">Layanan yang paling sering digunakan oleh sivitas akademika USU.</p>
                </div>
                <a href="#layanan" class="text-xs sm:text-sm font-semibold text-[#487629] hover:underline flex items-center gap-1">
                    <span>Lihat Semua</span>
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                
                <!-- Populer 1: Uji Turnitin -->
                <div class="usu-card p-5 flex flex-col justify-between" data-service-id="turnitin">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-10 h-10 rounded-lg bg-[#FFF7ED] text-[#C2410C] flex items-center justify-center">
                                <span class="material-symbols-outlined text-2xl">spellcheck</span>
                            </div>
                            <span class="badge-google-form text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">description</span> Google Form
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019] leading-snug">Uji Turnitin</h3>
                        <p class="text-xs text-[#5F685F] line-clamp-2 leading-relaxed">
                            Pemeriksaan tingkat kemiripan naskah skripsi, tesis, disertasi, dan artikel publikasi ilmiah.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">S1, S2, S3 & Dosen</span>
                        <button type="button" onclick="openServiceDetailModal('turnitin')" class="text-xs font-bold text-[#487629] hover:text-[#31521F] flex items-center gap-1">
                            <span>Ajukan</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>
                </div>

                <!-- Populer 2: Penelusuran Literatur -->
                <div class="usu-card p-5 flex flex-col justify-between" data-service-id="penelusuran-literatur">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-10 h-10 rounded-lg bg-[#F0FDF4] text-[#15803D] flex items-center justify-center">
                                <span class="material-symbols-outlined text-2xl">travel_explore</span>
                            </div>
                            <span class="badge-online text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">public</span> Online
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019] leading-snug">Penelusuran Literatur</h3>
                        <p class="text-xs text-[#5F685F] line-clamp-2 leading-relaxed">
                            Bantuan penelusuran artikel jurnal internasional bereputasi (Scopus, ScienceDirect, IEEE, dll).
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Daring / Konsultasi</span>
                        <button type="button" onclick="openServiceDetailModal('penelusuran-literatur')" class="text-xs font-bold text-[#487629] hover:text-[#31521F] flex items-center gap-1">
                            <span>Konsultasi</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>
                </div>

                <!-- Populer 3: Reservasi Buku -->
                <div class="usu-card p-5 flex flex-col justify-between" data-service-id="reservasi-buku">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-10 h-10 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-2xl">auto_stories</span>
                            </div>
                            <span class="badge-reservasi text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">bookmark</span> OPAC Reservasi
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019] leading-snug">Reservasi Buku</h3>
                        <p class="text-xs text-[#5F685F] line-clamp-2 leading-relaxed">
                            Pemesanan buku cetak sirkulasi perpustakaan sebelum pengambilan langsung di lokasi.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Koleksi Fisik</span>
                        <button type="button" onclick="openServiceDetailModal('reservasi-buku')" class="text-xs font-bold text-[#487629] hover:text-[#31521F] flex items-center gap-1">
                            <span>Pesan Buku</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>
                </div>

                <!-- Populer 4: Reservasi Ruangan (Real-time card) -->
                <div class="usu-card p-5 flex flex-col justify-between border-l-4 border-l-[#487629]" data-service-id="reservasi-ruangan">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-10 h-10 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-2xl">domain</span>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[11px] font-bold bg-[#F0FDF4] text-[#15803D] border border-[#DCFCE7]">
                                <span class="w-2 h-2 rounded-full status-dot-tersedia"></span>
                                <span>3 Ruang Siap</span>
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019] leading-snug">Reservasi Ruangan</h3>
                        <p class="text-xs text-[#5F685F] line-clamp-2 leading-relaxed">
                            Peminjaman ruang diskusi, The Gade Creative Lounge, RUBELIN, dan ruang rapat.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Cek Jadwal & Slot</span>
                        <button type="button" onclick="scrollToSection('fasilitas')" class="text-xs font-bold text-[#487629] hover:text-[#31521F] flex items-center gap-1">
                            <span>Lihat Ruang</span>
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 3: JELAJAHI LAYANAN (CATEGORY TABS & COMPLETE LIST) -->
        <section id="layanan" class="space-y-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-[#E5E7E3] pb-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#172019] tracking-tight">Jelajahi Layanan</h2>
                    <p class="text-xs sm:text-sm text-[#5F685F]">Katalog lengkap seluruh layanan perpustakaan luring dan daring.</p>
                </div>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none">
                <button type="button" onclick="setCategoryFilter('semua')" data-category="semua" class="category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-[#487629] text-white whitespace-nowrap transition-all shadow-2xs">
                    Semua Layanan
                </button>
                <button type="button" onclick="setCategoryFilter('luring')" data-category="luring" class="category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-white text-[#5F685F] hover:bg-[#F0F4EE] hover:text-[#172019] border border-[#E5E7E3] whitespace-nowrap transition-all">
                    Layanan Luring
                </button>
                <button type="button" onclick="setCategoryFilter('daring')" data-category="daring" class="category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-white text-[#5F685F] hover:bg-[#F0F4EE] hover:text-[#172019] border border-[#E5E7E3] whitespace-nowrap transition-all">
                    Layanan Daring
                </button>
                <button type="button" onclick="setCategoryFilter('fasilitas')" data-category="fasilitas" class="category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-white text-[#5F685F] hover:bg-[#F0F4EE] hover:text-[#172019] border border-[#E5E7E3] whitespace-nowrap transition-all">
                    Fasilitas & Ruang
                </button>
                <button type="button" onclick="setCategoryFilter('keanggotaan')" data-category="keanggotaan" class="category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-white text-[#5F685F] hover:bg-[#F0F4EE] hover:text-[#172019] border border-[#E5E7E3] whitespace-nowrap transition-all">
                    Keanggotaan & Koleksi
                </button>
                <button type="button" onclick="setCategoryFilter('survei')" data-category="survei" class="category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-white text-[#5F685F] hover:bg-[#F0F4EE] hover:text-[#172019] border border-[#E5E7E3] whitespace-nowrap transition-all">
                    Survei & Umpan Balik
                </button>
            </div>

            <!-- Service Grid Container -->
            <div id="service-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                
                <!-- [LURING] 1. Layanan Sirkulasi -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="luring" data-keywords="sirkulasi peminjaman buku pengembalian perpanjangan denda koleksi cetak">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">sync_alt</span>
                            </div>
                            <span class="badge-luring text-[11px] font-semibold px-2 py-0.5 rounded-md">Luring / Di Tempat</span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Layanan Sirkulasi</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Informasi peminjaman, pengembalian, perpanjangan, dan sirkulasi koleksi buku fisik di meja layanan lantai 1.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Meja Sirkulasi Lantai 1</span>
                        <button type="button" onclick="openServiceDetailModal('sirkulasi')" class="usu-btn-secondary px-3 py-1.5 text-xs">
                            Lihat Layanan
                        </button>
                    </div>
                </div>

                <!-- [LURING] 2. Layanan Keanggotaan -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="luring" data-keywords="keanggotaan kartu anggota aktivasi ktm registrasi maba pemustaka">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">badge</span>
                            </div>
                            <span class="badge-luring text-[11px] font-semibold px-2 py-0.5 rounded-md">Luring / Di Tempat</span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Layanan Keanggotaan</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Pendaftaran anggota baru, aktivasi KTM sebagai kartu perpustakaan, dan perpanjangan masa aktif keanggotaan.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Lantai 1 Front Office</span>
                        <button type="button" onclick="openServiceDetailModal('keanggotaan')" class="usu-btn-secondary px-3 py-1.5 text-xs">
                            Lihat Layanan
                        </button>
                    </div>
                </div>

                <!-- [LURING] 3. Bimbingan Pengguna -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="luring" data-keywords="bimbingan pemustaka orientasi library tour pengenalan fasilitas panduan">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">support_agent</span>
                            </div>
                            <span class="badge-luring text-[11px] font-semibold px-2 py-0.5 rounded-md">Luring / Di Tempat</span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Bimbingan Pengguna</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Orientasi perpustakaan, panduan pemanfaatan OPAC, tata tertib, dan bimbingan langsung oleh staf pustakawan.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Info Desk</span>
                        <button type="button" onclick="openServiceDetailModal('bimbingan')" class="usu-btn-secondary px-3 py-1.5 text-xs">
                            Lihat Layanan
                        </button>
                    </div>
                </div>

                <!-- [LURING] 4. Layanan Referensi -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="luring" data-keywords="referensi rujukan kamus ensiklopedia karya rujukan khusus lantai 2">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">menu_book</span>
                            </div>
                            <span class="badge-luring text-[11px] font-semibold px-2 py-0.5 rounded-md">Luring / Di Tempat</span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Layanan Referensi</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Akses koleksi rujukan khusus, ensiklopedia, kamus, direktori, handbook, dan koleksi Sumatera Corner.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Lantai 2 Ruang Referensi</span>
                        <button type="button" onclick="openServiceDetailModal('referensi')" class="usu-btn-secondary px-3 py-1.5 text-xs">
                            Lihat Layanan
                        </button>
                    </div>
                </div>

                <!-- [LURING] 5. Kelas Literasi Informasi -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="luring" data-keywords="kelas literasi informasi workshop pelatihan mendeley zotero sitasi jurnal">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">co_present</span>
                            </div>
                            <span class="badge-luring text-[11px] font-semibold px-2 py-0.5 rounded-md">Workshop / Tatap Muka</span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Kelas Literasi Informasi</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Pelatihan intensif strategi pencarian database e-journal bereputasi, manajemen sitasi Mendeley, dan orisinalitas riset.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Jadwal Berkala</span>
                        <button type="button" onclick="openServiceDetailModal('kelas-literasi')" class="usu-btn-secondary px-3 py-1.5 text-xs">
                            Daftar Kelas
                        </button>
                    </div>
                </div>

                <!-- [DARING] 6. SKBP Online (Surat Keterangan Bebas Pustaka) -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="daring" data-keywords="skbp online surat keterangan bebas pustaka wisuda yudisium kelulusan">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0FDF4] text-[#15803D] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">verified_user</span>
                            </div>
                            <span class="badge-online text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">public</span> Online
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">SKBP Online</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Penerbitan Surat Keterangan Bebas Pustaka secara online untuk syarat pendaftaran yudisium dan wisuda mahasiswa.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Syarat Wisuda</span>
                        <button type="button" onclick="openServiceDetailModal('skbp')" class="usu-btn-primary px-3 py-1.5 text-xs">
                            Ajukan SKBP
                        </button>
                    </div>
                </div>

                <!-- [DARING] 7. Unggah Mandiri Karya Akhir -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="daring" data-keywords="unggah mandiri karya akhir repositori skripsi tesis disertasi upload repository">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0FDF4] text-[#15803D] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">cloud_upload</span>
                            </div>
                            <span class="badge-online text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">public</span> Online Portal
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Unggah Mandiri Karya Akhir</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Portal mandiri untuk penyerahan naskah digital skripsi, tesis, dan disertasi ke Repositori Institusi USU.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Repositori USU</span>
                        <button type="button" onclick="openServiceDetailModal('unggah-mandiri')" class="usu-btn-primary px-3 py-1.5 text-xs">
                            Unggah Dokumen
                        </button>
                    </div>
                </div>

                <!-- [DARING] 8. Permintaan Karya Akhir Repository -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="daring" data-keywords="permintaan karya akhir repository fulltext restricted skripsi tesis pdf">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#FFF7ED] text-[#C2410C] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">folder_zip</span>
                            </div>
                            <span class="badge-google-form text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">description</span> Google Form
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Permintaan Karya Akhir Repository</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Permohonan akses berkas lengkap (full-text) untuk dokumen riset terproteksi di repositori perpustakaan.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Akses Full-text</span>
                        <button type="button" onclick="openServiceDetailModal('permintaan-karya-akhir')" class="usu-btn-primary px-3 py-1.5 text-xs">
                            Minta Akses
                        </button>
                    </div>
                </div>

                <!-- [DARING] 9. Usulan Bahan Perpustakaan -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="daring" data-keywords="usulan bahan perpustakaan beli buku pengadaan jurnal usulan koleksi ebook">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#FFF7ED] text-[#C2410C] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                            </div>
                            <span class="badge-google-form text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">description</span> Google Form
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Usulan Bahan Perpustakaan</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Formulir rekomendasi pembelian buku teks, langganan e-journal, dan bahan pustaka baru bagi dosen & mahasiswa.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Pengadaan Koleksi</span>
                        <button type="button" onclick="openServiceDetailModal('usulan-buku')" class="usu-btn-primary px-3 py-1.5 text-xs">
                            Ajukan Usulan
                        </button>
                    </div>
                </div>

                <!-- [KEANGGOTAAN] 10. Pendaftaran Anggota Tamu -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="keanggotaan" data-keywords="pendaftaran anggota tamu alumni luar usu peneliti eksternal kunjungan kartu">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">person_add</span>
                            </div>
                            <span class="badge-reservasi text-[11px] font-semibold px-2 py-0.5 rounded-md">Layanan Tamu</span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Pendaftaran Anggota Tamu</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Layanan keanggotaan dan izin baca di tempat untuk alumni USU, mahasiswa perguruan tinggi lain, dan peneliti luar.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Pemustaka Luar</span>
                        <button type="button" onclick="openServiceDetailModal('anggota-tamu')" class="usu-btn-secondary px-3 py-1.5 text-xs">
                            Daftar Tamu
                        </button>
                    </div>
                </div>

                <!-- [SURVEI] 11. Survei Kepuasan & Umpan Balik -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="survei" data-keywords="survei kepuasan pemustaka indeks saran evaluasi fasilitas umpan balik">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#FFF7ED] text-[#C2410C] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">rate_review</span>
                            </div>
                            <span class="badge-google-form text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">description</span> Kuesioner
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Survei Kepuasan Pengguna</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Sampaikan evaluasi, penilaian kualitas layanan, dan masukan Anda untuk peningkatan mutu fasilitas Perpustakaan USU.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Evaluasi Rutin</span>
                        <a href="https://bit.ly/SurveiPelayananPerpustakaan2026" target="_blank" rel="noopener noreferrer" class="usu-btn-secondary px-3 py-1.5 text-xs text-center">
                            Isi Survei
                        </a>
                    </div>
                </div>

                <!-- [SURVEI] 12. Kotak Saran & Bantuan -->
                <div class="service-item usu-card p-5 flex flex-col justify-between" data-category="survei" data-keywords="kotak saran pengaduan helpdesk kontak konsultasi pustakawan">
                    <div class="space-y-3">
                        <div class="flex items-start justify-between gap-2">
                            <div class="w-9 h-9 rounded-lg bg-[#ECFDF5] text-[#047857] flex items-center justify-center">
                                <span class="material-symbols-outlined text-xl">chat</span>
                            </div>
                            <span class="badge-whatsapp text-[11px] font-semibold px-2 py-0.5 rounded-md flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">chat</span> WhatsApp Helpdesk
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-[#172019]">Kotak Saran & Pengaduan</h3>
                        <p class="text-xs text-[#5F685F] leading-relaxed">
                            Hubungi langsung tim layanan perpustakaan untuk pengaduan kendala akses, saran perbaikan, atau bantuan darurat.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-[#E5E7E3] flex items-center justify-between">
                        <span class="text-[11px] font-medium text-[#8A928A]">Respon Cepat</span>
                        <button type="button" onclick="openWhatsAppHelpdesk()" class="usu-btn-secondary px-3 py-1.5 text-xs">
                            Hubungi Staf
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 4: FASILITAS & RUANGAN (WITH REALTIME AVAILABILITY) -->
        <section id="fasilitas" class="space-y-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-[#E5E7E3] pb-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#5CB733] animate-pulse"></span>
                        <h2 class="text-xl sm:text-2xl font-bold text-[#172019] tracking-tight">Fasilitas & Ruangan</h2>
                    </div>
                    <p class="text-xs sm:text-sm text-[#5F685F] mt-0.5">Lihat fasilitas perpustakaan dan ketersediaan ruangan secara langsung.</p>
                </div>
                <div class="flex items-center gap-4 text-xs">
                    <span class="flex items-center gap-1.5 text-[#172019]"><span class="w-2.5 h-2.5 rounded-full status-dot-tersedia"></span> Tersedia</span>
                    <span class="flex items-center gap-1.5 text-[#172019]"><span class="w-2.5 h-2.5 rounded-full status-dot-terpakai"></span> Terpakai</span>
                    <span class="flex items-center gap-1.5 text-[#172019]"><span class="w-2.5 h-2.5 rounded-full status-dot-menunggu"></span> Menunggu</span>
                </div>
            </div>

            <!-- Room Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Room 1: TGCL -->
                <div class="usu-card overflow-hidden flex flex-col justify-between" id="room-card-tgcl">
                    <div class="relative h-44 bg-[#EAECE8] overflow-hidden group">
                        <!-- Stylized SVG Architectural Graphic Representation -->
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#487629]/15 to-[#31521F]/25 text-[#31521F]">
                            <span class="material-symbols-outlined text-5xl mb-1 text-[#487629]">groups</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#31521F]">The Gade Creative Lounge</span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-white text-[#15803D] shadow-sm border border-[#DCFCE7]">
                                <span class="w-2 h-2 rounded-full status-dot-tersedia"></span>
                                <span>Tersedia</span>
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 bg-[#172019]/80 backdrop-blur-xs text-white text-[11px] px-2.5 py-0.5 rounded-md font-medium">
                            Lantai 1 • Kapasitas 40 Orang
                        </div>
                    </div>
                    <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-[#172019]">The Gade Creative Lounge (TGCL)</h3>
                            <p class="text-xs text-[#5F685F] leading-relaxed">
                                Ruang kreatif kolaboratif dengan fasilitas Smart TV, Bean Bags, Podcast Pod, dan Wi-Fi berkecepatan tinggi.
                            </p>
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Smart TV</span>
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Pod Diskusi</span>
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">AC Sentral</span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-[#E5E7E3] grid grid-cols-2 gap-2">
                            <button type="button" onclick="scrollToSection('jadwal')" class="usu-btn-secondary py-2 text-xs text-center">
                                Lihat Jadwal
                            </button>
                            <button type="button" onclick="openReservationModal('tgcl')" class="usu-btn-primary py-2 text-xs text-center">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 2: RUBELIN -->
                <div class="usu-card overflow-hidden flex flex-col justify-between" id="room-card-rubelin">
                    <div class="relative h-44 bg-[#EAECE8] overflow-hidden group">
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#487629]/15 to-[#31521F]/25 text-[#31521F]">
                            <span class="material-symbols-outlined text-5xl mb-1 text-[#487629]">chair_alt</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#31521F]">Ruang Belajar Mandiri</span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-white text-[#15803D] shadow-sm border border-[#DCFCE7]">
                                <span class="w-2 h-2 rounded-full status-dot-tersedia"></span>
                                <span>Tersedia (18 Slot)</span>
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 bg-[#172019]/80 backdrop-blur-xs text-white text-[11px] px-2.5 py-0.5 rounded-md font-medium">
                            Lantai 2 • 24 Cubicle Mandiri
                        </div>
                    </div>
                    <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-[#172019]">Ruang Belajar Mandiri (RUBELIN)</h3>
                            <p class="text-xs text-[#5F685F] leading-relaxed">
                                Ruang belajar pribadi tenang dengan bilik partisi individu, stopkontak, dan lampu baca untuk fokus belajar.
                            </p>
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Quiet Zone</span>
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Stopkontak Tiap Meja</span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-[#E5E7E3] grid grid-cols-2 gap-2">
                            <button type="button" onclick="scrollToSection('jadwal')" class="usu-btn-secondary py-2 text-xs text-center">
                                Cek Slot
                            </button>
                            <button type="button" onclick="openReservationModal('rubelin')" class="usu-btn-primary py-2 text-xs text-center">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 3: Ruang Rapat / Diskusi 1 -->
                <div class="usu-card overflow-hidden flex flex-col justify-between" id="room-card-rapat-1">
                    <div class="relative h-44 bg-[#EAECE8] overflow-hidden group">
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#487629]/15 to-[#31521F]/25 text-[#31521F]">
                            <span class="material-symbols-outlined text-5xl mb-1 text-[#487629]">meeting_room</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#31521F]">Ruang Rapat 1</span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-white text-[#DC2626] shadow-sm border border-[#FEE2E2]">
                                <span class="w-2 h-2 rounded-full status-dot-terpakai"></span>
                                <span>Terpakai (sd 15.00)</span>
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 bg-[#172019]/80 backdrop-blur-xs text-white text-[11px] px-2.5 py-0.5 rounded-md font-medium">
                            Lantai 2 • Kapasitas 12 Orang
                        </div>
                    </div>
                    <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-[#172019]">Ruang Rapat / Diskusi 1</h3>
                            <p class="text-xs text-[#5F685F] leading-relaxed">
                                Ruang rapat kedap suara untuk bimbingan skripsi, rapat organisasi mahasiswa, dan riset kelompok.
                            </p>
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Whiteboard</span>
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Proyektor</span>
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Sound</span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-[#E5E7E3] grid grid-cols-2 gap-2">
                            <button type="button" onclick="scrollToSection('jadwal')" class="usu-btn-secondary py-2 text-xs text-center">
                                Lihat Jadwal
                            </button>
                            <button type="button" onclick="openReservationModal('rapat-1')" class="usu-btn-primary py-2 text-xs text-center">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 4: Ruang Konferensi -->
                <div class="usu-card overflow-hidden flex flex-col justify-between" id="room-card-konferensi">
                    <div class="relative h-44 bg-[#EAECE8] overflow-hidden group">
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#487629]/15 to-[#31521F]/25 text-[#31521F]">
                            <span class="material-symbols-outlined text-5xl mb-1 text-[#487629]">podium</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#31521F]">Ruang Konferensi</span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-white text-[#B45309] shadow-sm border border-[#FEF3C7]">
                                <span class="w-2 h-2 rounded-full status-dot-menunggu"></span>
                                <span>Menunggu Review</span>
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 bg-[#172019]/80 backdrop-blur-xs text-white text-[11px] px-2.5 py-0.5 rounded-md font-medium">
                            Lantai 3 • Kapasitas 80 Orang
                        </div>
                    </div>
                    <div class="p-5 space-y-3 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-[#172019]">Ruang Konferensi</h3>
                            <p class="text-xs text-[#5F685F] leading-relaxed">
                                Ruang seminar dan kuliah umum skala besar dengan panggung mini, sound system terintegrasi, dan dual proyektor.
                            </p>
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Dual Proyektor</span>
                                <span class="text-[10px] px-2 py-0.5 rounded bg-[#F0F4EE] text-[#487629] font-medium">Mic Wireless</span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-[#E5E7E3] grid grid-cols-2 gap-2">
                            <button type="button" onclick="scrollToSection('jadwal')" class="usu-btn-secondary py-2 text-xs text-center">
                                Lihat Jadwal
                            </button>
                            <button type="button" onclick="openReservationModal('konferensi')" class="usu-btn-primary py-2 text-xs text-center">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 5: ROOM TIMELINE / JADWAL RUANGAN HARI INI -->
        <section id="jadwal" class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-[#E5E7E3] pb-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#172019] tracking-tight">Jadwal Penggunaan Ruangan Hari Ini</h2>
                    <p class="text-xs sm:text-sm text-[#5F685F]">Visualisasi timeline ketersediaan ruangan real-time Perpustakaan USU.</p>
                </div>
                <div class="flex items-center gap-3 text-xs">
                    <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-[#5CB733]"></span> Tersedia</span>
                    <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-[#DC2626]"></span> Terpakai</span>
                    <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-[#F6AE01]"></span> Menunggu</span>
                    <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-[#8A928A]"></span> Tutup</span>
                </div>
            </div>

            <!-- Timeline Grid Table -->
            <div class="usu-card p-6 overflow-x-auto shadow-xs">
                <div class="min-w-[760px] space-y-4">
                    
                    <!-- Timeline Header (Hours 08.00 - 17.00) -->
                    <div class="grid grid-cols-12 gap-1 text-xs font-semibold text-[#5F685F] pb-2 border-b border-[#E5E7E3]">
                        <div class="col-span-3 text-[#172019]">Ruangan & Lokasi</div>
                        <div class="text-center">08.00</div>
                        <div class="text-center">09.00</div>
                        <div class="text-center">10.00</div>
                        <div class="text-center">11.00</div>
                        <div class="text-center">12.00</div>
                        <div class="text-center">13.00</div>
                        <div class="text-center">14.00</div>
                        <div class="text-center">15.00</div>
                        <div class="text-center">16.00</div>
                    </div>

                    <!-- Row 1: The Gade Creative Lounge -->
                    <div class="grid grid-cols-12 gap-1 items-center text-xs py-1.5 hover:bg-[#F7F8F6] rounded-lg px-1 transition-colors">
                        <div class="col-span-3 font-semibold text-[#172019] flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-[#487629]">groups</span>
                            <span>The Gade (TGCL)</span>
                        </div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="08.00-09.00: Tersedia">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="09.00-10.00: Tersedia">✓</div>
                        <div class="h-8 rounded bg-[#DC2626] text-white flex items-center justify-center font-bold text-[10px]" title="10.00-11.00: Diskusi FKG">Terpakai</div>
                        <div class="h-8 rounded bg-[#DC2626] text-white flex items-center justify-center font-bold text-[10px]" title="11.00-12.00: Diskusi FKG">Terpakai</div>
                        <div class="h-8 rounded bg-[#8A928A] text-white flex items-center justify-center text-[10px]" title="12.00-13.00: Ishoma">Istirahat</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="13.00-14.00: Tersedia">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="14.00-15.00: Tersedia">✓</div>
                        <div class="h-8 rounded bg-[#F6AE01] text-[#172019] flex items-center justify-center font-bold text-[10px]" title="15.00-16.00: Menunggu Konfirmasi">Review</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="16.00-17.00: Tersedia">✓</div>
                    </div>

                    <!-- Row 2: RUBELIN -->
                    <div class="grid grid-cols-12 gap-1 items-center text-xs py-1.5 hover:bg-[#F7F8F6] rounded-lg px-1 transition-colors">
                        <div class="col-span-3 font-semibold text-[#172019] flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-[#487629]">chair_alt</span>
                            <span>RUBELIN (Mandiri)</span>
                        </div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">18 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">16 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">12 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">8 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">10 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">14 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">15 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">19 Slot</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]" title="Slot bebas">22 Slot</div>
                    </div>

                    <!-- Row 3: Ruang Rapat 1 -->
                    <div class="grid grid-cols-12 gap-1 items-center text-xs py-1.5 hover:bg-[#F7F8F6] rounded-lg px-1 transition-colors">
                        <div class="col-span-3 font-semibold text-[#172019] flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-[#487629]">meeting_room</span>
                            <span>Ruang Rapat 1</span>
                        </div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#DC2626] text-white flex items-center justify-center font-bold text-[10px]">Terpakai</div>
                        <div class="h-8 rounded bg-[#DC2626] text-white flex items-center justify-center font-bold text-[10px]">Terpakai</div>
                        <div class="h-8 rounded bg-[#DC2626] text-white flex items-center justify-center font-bold text-[10px]">Terpakai</div>
                        <div class="h-8 rounded bg-[#DC2626] text-white flex items-center justify-center font-bold text-[10px]">Terpakai</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                    </div>

                    <!-- Row 4: Ruang Rapat 2 -->
                    <div class="grid grid-cols-12 gap-1 items-center text-xs py-1.5 hover:bg-[#F7F8F6] rounded-lg px-1 transition-colors">
                        <div class="col-span-3 font-semibold text-[#172019] flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-[#487629]">meeting_room</span>
                            <span>Ruang Rapat 2</span>
                        </div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#F6AE01] text-[#172019] flex items-center justify-center font-bold text-[10px]">Review</div>
                        <div class="h-8 rounded bg-[#F6AE01] text-[#172019] flex items-center justify-center font-bold text-[10px]">Review</div>
                        <div class="h-8 rounded bg-[#8A928A] text-white flex items-center justify-center text-[10px]">Istirahat</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                    </div>

                    <!-- Row 5: Ruang Konferensi -->
                    <div class="grid grid-cols-12 gap-1 items-center text-xs py-1.5 hover:bg-[#F7F8F6] rounded-lg px-1 transition-colors">
                        <div class="col-span-3 font-semibold text-[#172019] flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-[#487629]">podium</span>
                            <span>Ruang Konferensi</span>
                        </div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#8A928A] text-white flex items-center justify-center text-[10px]">Istirahat</div>
                        <div class="h-8 rounded bg-[#F6AE01] text-[#172019] flex items-center justify-center font-bold text-[10px]">Review</div>
                        <div class="h-8 rounded bg-[#F6AE01] text-[#172019] flex items-center justify-center font-bold text-[10px]">Review</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <div class="h-8 rounded bg-[#5CB733] text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION 6: JAM LAYANAN PERPUSTAKAAN -->
        <section id="jam-layanan" class="usu-card p-6 sm:p-8 bg-white border border-[#E5E7E3]">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="space-y-1">
                    <h2 class="text-lg sm:text-xl font-bold text-[#172019] flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#487629]">schedule</span>
                        <span>Jam Layanan Perpustakaan</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-[#5F685F]">Jadwal operasional layanan sirkulasi, referensi, dan area belajar.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    
                    <div class="p-3.5 rounded-xl bg-[#F7F8F6] border border-[#E5E7E3] flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-lg">calendar_month</span>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-[#172019] block">Senin – Kamis</span>
                            <span class="text-xs text-[#5F685F]">08.00 – 20.00 WIB</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-[#F7F8F6] border border-[#E5E7E3] flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-lg">event_available</span>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-[#172019] block">Jumat</span>
                            <span class="text-xs text-[#5F685F]">08.00 – 17.00 WIB</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-[#F0FDF4] border border-[#DCFCE7] flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#DCFCE7] text-[#15803D] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-lg">public</span>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-[#15803D] block">Akses Online</span>
                            <span class="text-xs text-[#15803D]/80">24 Jam / 7 Hari</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION 7: BANTUAN & KONTAK -->
        <section class="p-8 sm:p-10 rounded-2xl bg-[#31521F] text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm">
            <div class="space-y-2 text-center md:text-left">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-[#F6AE01] text-xs font-bold uppercase tracking-wider">
                    <span class="material-symbols-outlined text-sm">help</span> Bantuan Pemustaka
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-white tracking-tight">
                    Tidak menemukan layanan yang kamu cari?
                </h3>
                <p class="text-xs sm:text-sm text-[#E5E7E3] max-w-xl">
                    Temukan panduan penelusuran, informasi syarat bebas pustaka, atau hubungi pustakawan kami untuk bantuan langsung.
                </p>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-3 shrink-0">
                <button type="button" onclick="setCategoryFilter('semua'); scrollToSection('layanan')" class="px-4 py-2.5 rounded-xl bg-white/15 hover:bg-white/25 text-white font-semibold text-xs transition-colors border border-white/20">
                    Lihat Semua Layanan
                </button>
                <button type="button" onclick="openWhatsAppHelpdesk()" class="px-5 py-2.5 rounded-xl bg-[#F6AE01] hover:bg-[#F28800] text-[#31521F] font-bold text-xs transition-all shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-base">chat</span>
                    <span>Hubungi Perpustakaan</span>
                </button>
            </div>
        </section>

    </main>

    <!-- Professional University Footer -->
    <footer class="bg-[#FFFFFF] border-t border-[#E5E7E3] text-[#5F685F] text-xs mt-16">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-10 border-b border-[#E5E7E3]">
                
                <!-- Col 1: Identity & Address -->
                <div class="md:col-span-5 space-y-3">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#487629] text-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-lg text-[#F6AE01]">local_library</span>
                        </div>
                        <span class="text-base font-bold text-[#172019]">Perpustakaan Universitas Sumatera Utara</span>
                    </div>
                    <p class="text-xs leading-relaxed text-[#5F685F]">
                        Jalan Perpustakaan No. 1, Kampus USU, Padang Bulan,<br>
                        Medan, Sumatera Utara, 20155, Indonesia.
                    </p>
                    <div class="flex items-center gap-4 text-xs font-medium text-[#172019] pt-1">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-[#487629]">mail</span> libraryp@usu.ac.id</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-[#487629]">call</span> (061) 8218666</span>
                    </div>
                </div>

                <!-- Col 2: Layanan -->
                <div class="md:col-span-3 space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#172019] block">Layanan & Akses</span>
                    <ul class="space-y-1.5">
                        <li><a href="#layanan" onclick="setCategoryFilter('luring')" class="hover:text-[#487629] transition-colors">Layanan Sirkulasi & Fisik</a></li>
                        <li><a href="#layanan" onclick="setCategoryFilter('daring')" class="hover:text-[#487629] transition-colors">Uji Turnitin & Repositori</a></li>
                        <li><a href="#fasilitas" class="hover:text-[#487629] transition-colors">Peminjaman Ruangan</a></li>
                        <li><a href="https://repositori.usu.ac.id" target="_blank" class="hover:text-[#487629] transition-colors">Repositori Institusi USU</a></li>
                    </ul>
                </div>

                <!-- Col 3: Informasi & Tautan Resmi -->
                <div class="md:col-span-4 space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#172019] block">Portal Resmi USU</span>
                    <ul class="space-y-1.5">
                        <li><a href="https://usu.ac.id" target="_blank" class="hover:text-[#487629] transition-colors">Universitas Sumatera Utara (USU)</a></li>
                        <li><a href="https://library.usu.ac.id/id" target="_blank" class="hover:text-[#487629] transition-colors">Portal Utama Perpustakaan</a></li>
                        <li><a href="https://digilib.usu.ac.id" target="_blank" class="hover:text-[#487629] transition-colors">Katalog Digital (DIGILIB OPAC)</a></li>
                        <li><a href="https://resourceguide.usu.ac.id" target="_blank" class="hover:text-[#487629] transition-colors">USU Resource Guide</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#8A928A]">
                <p>&copy; 2026 Perpustakaan Universitas Sumatera Utara. Seluruh hak cipta dilindungi.</p>
                <p class="flex items-center gap-1 font-medium text-[#5F685F]">
                    <span>USU Library Digital Service Hub</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- ========================================================================= -->
    <!-- SERVICE DETAIL MODAL                                                      -->
    <!-- ========================================================================= -->
    <div id="service-modal" class="fixed inset-0 z-50 bg-[#172019]/50 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-7 shadow-xl border border-[#E5E7E3] space-y-5 animate-in fade-in zoom-in duration-150">
            <div class="flex items-start justify-between gap-3 border-b border-[#E5E7E3] pb-4">
                <div class="flex items-center gap-3">
                    <div id="modal-icon-bg" class="w-11 h-11 rounded-xl bg-[#F0F4EE] text-[#487629] flex items-center justify-center shrink-0">
                        <span id="modal-icon" class="material-symbols-outlined text-2xl">description</span>
                    </div>
                    <div>
                        <span id="modal-badge" class="badge-online text-[10px] font-semibold px-2 py-0.5 rounded-md inline-block mb-1">Layanan Daring</span>
                        <h3 id="modal-title" class="text-lg font-bold text-[#172019] leading-snug">Nama Layanan</h3>
                    </div>
                </div>
                <button type="button" onclick="closeServiceModal()" class="text-[#8A928A] hover:text-[#172019] p-1 rounded-lg hover:bg-[#F7F8F6]">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </button>
            </div>

            <div class="space-y-4 text-xs sm:text-sm text-[#5F685F]">
                <div>
                    <h4 class="font-bold text-[#172019] text-xs uppercase tracking-wider mb-1">Deskripsi Layanan</h4>
                    <p id="modal-desc" class="leading-relaxed">Deskripsi lengkap mengenai layanan perpustakaan ini.</p>
                </div>

                <div class="bg-[#F7F8F6] p-3.5 rounded-xl border border-[#E5E7E3] space-y-1.5">
                    <h4 class="font-bold text-[#172019] text-xs flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-[#487629]">fact_check</span>
                        <span>Syarat & Berkas yang Diperlukan:</span>
                    </h4>
                    <ul id="modal-requirements" class="list-disc list-inside text-xs space-y-1 text-[#5F685F]">
                        <!-- Populated by JS -->
                    </ul>
                </div>

                <div class="space-y-1.5">
                    <h4 class="font-bold text-[#172019] text-xs flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-[#487629]">timeline</span>
                        <span>Alur Proses:</span>
                    </h4>
                    <p id="modal-steps" class="text-xs leading-relaxed text-[#5F685F]"></p>
                </div>
            </div>

            <div class="pt-4 border-t border-[#E5E7E3] flex items-center justify-end gap-3">
                <button type="button" onclick="closeServiceModal()" class="usu-btn-secondary px-4 py-2 text-xs">
                    Tutup
                </button>
                <a id="modal-action-btn" href="#" target="_blank" class="usu-btn-primary px-5 py-2 text-xs inline-flex items-center gap-1.5">
                    <span>Lanjutkan ke Layanan</span>
                    <span class="material-symbols-outlined text-sm">open_in_new</span>
                </a>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- ROOM RESERVATION WORKFLOW MODAL                                           -->
    <!-- ========================================================================= -->
    <div id="reservation-modal" class="fixed inset-0 z-50 bg-[#172019]/50 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-7 shadow-xl border border-[#E5E7E3] space-y-5 animate-in fade-in zoom-in duration-150">
            <div class="flex items-start justify-between border-b border-[#E5E7E3] pb-4">
                <div>
                    <span class="text-[10px] font-bold text-[#487629] uppercase tracking-wider">Formulir Reservasi</span>
                    <h3 id="res-modal-room-title" class="text-lg font-bold text-[#172019]">Reservasi Ruangan</h3>
                </div>
                <button type="button" onclick="closeReservationModal()" class="text-[#8A928A] hover:text-[#172019] p-1 rounded-lg hover:bg-[#F7F8F6]">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </button>
            </div>

            <!-- 3-Step Form -->
            <form id="reservation-form" onsubmit="handleReservationSubmit(event)" class="space-y-4 text-xs sm:text-sm">
                <div>
                    <label class="block text-xs font-bold text-[#172019] mb-1">Pilih Ruangan</label>
                    <select id="res-room-select" class="w-full p-2.5 rounded-lg border border-[#E5E7E3] bg-[#F7F8F6] text-xs font-medium text-[#172019] outline-none focus:border-[#487629]">
                        <option value="tgcl">The Gade Creative Lounge (Lantai 1)</option>
                        <option value="rubelin">Ruang Belajar Mandiri - RUBELIN (Lantai 2)</option>
                        <option value="rapat-1">Ruang Rapat 1 (Lantai 2)</option>
                        <option value="konferensi">Ruang Konferensi (Lantai 3)</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-[#172019] mb-1">Tanggal</label>
                        <input type="date" id="res-date" required class="w-full p-2.5 rounded-lg border border-[#E5E7E3] bg-[#F7F8F6] text-xs text-[#172019] outline-none focus:border-[#487629]" value="2026-08-27">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#172019] mb-1">Sesi Waktu</label>
                        <select id="res-time-slot" class="w-full p-2.5 rounded-lg border border-[#E5E7E3] bg-[#F7F8F6] text-xs font-medium text-[#172019] outline-none focus:border-[#487629]">
                            <option value="08:00 - 10:00">08.00 – 10.00 WIB</option>
                            <option value="10:00 - 12:00">10.00 – 12.00 WIB</option>
                            <option value="13:00 - 15:00">13.00 – 15.00 WIB</option>
                            <option value="15:00 - 17:00">15.00 – 17.00 WIB</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-[#172019] mb-1">NIM / NIP</label>
                        <input type="text" id="res-nim" placeholder="Contoh: 211402001" required class="w-full p-2.5 rounded-lg border border-[#E5E7E3] bg-[#F7F8F6] text-xs text-[#172019] outline-none focus:border-[#487629]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#172019] mb-1">Nama Lengkap</label>
                        <input type="text" id="res-name" placeholder="Nama pemohon" required class="w-full p-2.5 rounded-lg border border-[#E5E7E3] bg-[#F7F8F6] text-xs text-[#172019] outline-none focus:border-[#487629]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172019] mb-1">Keperluan / Agenda</label>
                    <textarea id="res-purpose" rows="2" placeholder="Contoh: Diskusi tugas akhir kelompok / Bimbingan riset" required class="w-full p-2.5 rounded-lg border border-[#E5E7E3] bg-[#F7F8F6] text-xs text-[#172019] outline-none focus:border-[#487629]"></textarea>
                </div>

                <div class="pt-3 border-t border-[#E5E7E3] flex items-center justify-between">
                    <span class="text-[11px] text-[#8A928A]">Persetujuan instan untuk akun aktif</span>
                    <button type="submit" class="usu-btn-primary px-5 py-2 text-xs">
                        Kirim Reservasi
                    </button>
                </div>
            </form>

            <!-- Success State Message (hidden initially) -->
            <div id="reservation-success" class="hidden text-center py-4 space-y-3">
                <div class="w-12 h-12 rounded-full bg-[#F0FDF4] text-[#15803D] flex items-center justify-center mx-auto">
                    <span class="material-symbols-outlined text-3xl">check_circle</span>
                </div>
                <h4 class="text-base font-bold text-[#172019]">Reservasi Berhasil Diajukan!</h4>
                <p class="text-xs text-[#5F685F] max-w-xs mx-auto">
                    Kode reservasi Anda: <strong id="res-code" class="text-[#487629] font-mono font-bold">USU-RES-8821</strong>.<br>
                    Status dan verifikasi slot telah dikirimkan ke email sivitas Anda.
                </p>
                <button type="button" onclick="closeReservationModal()" class="usu-btn-secondary px-4 py-2 text-xs mt-2">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- SIMPLE LOGIN / SSO MODAL                                                  -->
    <!-- ========================================================================= -->
    <div id="login-modal" class="fixed inset-0 z-50 bg-[#172019]/50 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border border-[#E5E7E3] space-y-4 animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between border-b border-[#E5E7E3] pb-3">
                <h3 class="text-base font-bold text-[#172019]">Masuk Akun USU Library Hub</h3>
                <button type="button" onclick="closeLoginModal()" class="text-[#8A928A] hover:text-[#172019]">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>
            <p class="text-xs text-[#5F685F]">Gunakan akun SSO USU Single Sign-On untuk mengakses seluruh fitur peminjaman mandiri.</p>
            <div class="space-y-3">
                <button type="button" onclick="simulateLogin('Mahasiswa USU')" class="w-full py-2.5 px-4 bg-[#487629] hover:bg-[#31521F] text-white rounded-xl text-xs font-bold flex items-center justify-center gap-2 transition-colors">
                    <span class="material-symbols-outlined text-base">school</span>
                    <span>Masuk dengan SSO Mahasiswa</span>
                </button>
                <button type="button" onclick="simulateLogin('Dosen / Tenaga Pendidik')" class="w-full py-2.5 px-4 bg-[#F7F8F6] hover:bg-[#EAECE8] border border-[#E5E7E3] text-[#172019] rounded-xl text-xs font-bold flex items-center justify-center gap-2 transition-colors">
                    <span class="material-symbols-outlined text-base">badge</span>
                    <span>Masuk dengan SSO Dosen / Tendik</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Interactive Client Script -->
    <script>
        // Database of detailed services for modal & search suggestions
        const SERVICES_DATA = {
            'turnitin': {
                title: 'Permintaan Uji Turnitin',
                category: 'Layanan Daring',
                badgeClass: 'badge-google-form',
                icon: 'spellcheck',
                iconBg: 'bg-[#FFF7ED]',
                iconColor: 'text-[#C2410C]',
                desc: 'Layanan pemeriksaan orisinalitas naskah karya ilmiah (skripsi, tesis, disertasi, artikel jurnal) menggunakan software Turnitin resmi Perpustakaan USU.',
                requirements: [
                    'File naskah dalam format .docx atau .pdf (maksimal 20MB)',
                    'Identitas mahasiswa aktif / dosen USU (NIM/NIP valid)',
                    'Naskah sudah mencakup Bab 1 sampai Bab Penutup (tanpa lampiran besar)'
                ],
                steps: '1. Isi Google Form permohonan Turnitin -> 2. Tim pustakawan memproses naskah dalam 1x24 jam kerja -> 3. Hasil uji kemiripan (Similarity Report PDF) dikirimkan ke email terdaftar.',
                actionUrl: 'https://bit.ly/TurnitinUSU2026',
                actionText: 'Isi Google Form Turnitin'
            },
            'penelusuran-literatur': {
                title: 'Penelusuran Literatur Bereputasi',
                category: 'Layanan Daring',
                badgeClass: 'badge-online',
                icon: 'travel_explore',
                iconBg: 'bg-[#F0FDF4]',
                iconColor: 'text-[#15803D]',
                desc: 'Asistensi penelusuran artikel jurnal internasional bereputasi (Scopus, ScienceDirect, IEEE Xplore, Taylor & Francis, Springer) yang dilanggan oleh Universitas Sumatera Utara.',
                requirements: [
                    'Topik riset / kata kunci spesifik',
                    'Daftar jurnal atau DOI yang dibutuhkan (jika ada)',
                    'KTM / Akun SSO USU aktif'
                ],
                steps: '1. Ajukan topik melalui portal konsultasi daring -> 2. Pustakawan spesialis subjek akan mencari artikel full-text relevan -> 3. Artikel digital dikirimkan ke email pemustaka.',
                actionUrl: 'https://resourceguide.usu.ac.id',
                actionText: 'Akses Resource Guide'
            },
            'reservasi-buku': {
                title: 'Reservasi Buku Sirkulasi',
                category: 'Layanan Daring',
                badgeClass: 'badge-reservasi',
                icon: 'auto_stories',
                iconBg: 'bg-[#F0F4EE]',
                iconColor: 'text-[#487629]',
                desc: 'Pemesanan buku koleksi sirkulasi secara online melalui katalog OPAC sebelum diambil di perpustakaan pusat atau cabang.',
                requirements: [
                    'Nomor Barcode / Judul buku dari katalog DIGILIB OPAC',
                    'Status keanggotaan aktif tanpa tanggungan denda',
                    'Pengambilan buku maksimal 1x24 jam setelah reservasi disetujui'
                ],
                steps: '1. Cari buku di katalog OPAC -> 2. Klik tombol "Reservasi" pada detail buku -> 3. Tunjukkan notifikasi ke meja sirkulasi untuk peminjaman.',
                actionUrl: 'https://digilib.usu.ac.id',
                actionText: 'Buka DIGILIB OPAC'
            },
            'skbp': {
                title: 'Surat Keterangan Bebas Pustaka (SKBP)',
                category: 'Layanan Daring',
                badgeClass: 'badge-online',
                icon: 'verified_user',
                iconBg: 'bg-[#F0FDF4]',
                iconColor: 'text-[#15803D]',
                desc: 'Penerbitan surat digital yang menyatakan mahasiswa telah memenuhi seluruh kewajiban penyerahan karya akhir dan bebas dari pinjaman buku.',
                requirements: [
                    'Telah mengunggah naskah final di Repositori USU & disetujui',
                    'Tidak memiliki pinjaman buku aktif atau tunggakan denda',
                    'Surat bebas pinjam dari perpustakaan fakultas masing-masing'
                ],
                steps: '1. Login ke portal SKBP Online -> 2. Sistem memvalidasi repositori & pinjaman -> 3. SKBP ber-QR Code resmi terbit dan dapat diunduh.',
                actionUrl: 'https://library.usu.ac.id/id/skbp',
                actionText: 'Ajukan SKBP Online'
            },
            'unggah-mandiri': {
                title: 'Unggah Mandiri Karya Akhir',
                category: 'Layanan Daring',
                badgeClass: 'badge-online',
                icon: 'cloud_upload',
                iconBg: 'bg-[#F0FDF4]',
                iconColor: 'text-[#15803D]',
                desc: 'Penyerahan file digital tugas akhir/skripsi/tesis/disertasi ke Repositori Institusi USU sebagai arsip akademik dan syarat bebas pustaka.',
                requirements: [
                    'File naskah lengkap (Cover, Pengesahan, Bab 1-Penutup, Abstrak)',
                    'Lembar persetujuan publikasi karya ilmiah bermaterai',
                    'Format file sesuai pedoman standar Repositori USU (PDF)'
                ],
                steps: '1. Login ke repositori.usu.ac.id -> 2. Buat submission baru & unggah berkas -> 3. Verifikasi oleh editor perpustakaan dalam 2-3 hari kerja.',
                actionUrl: 'https://repositori.usu.ac.id',
                actionText: 'Buka Repositori USU'
            },
            'permintaan-karya-akhir': {
                title: 'Permintaan Berkas Repository',
                category: 'Layanan Daring',
                badgeClass: 'badge-google-form',
                icon: 'folder_zip',
                iconBg: 'bg-[#FFF7ED]',
                iconColor: 'text-[#C2410C]',
                desc: 'Permohonan pembukaan akses dokumen karya akhir yang berstatus restricted / tertutup untuk keperluan referensi akademik.',
                requirements: [
                    'URL link repositori judul yang diminta',
                    'Surat rekomendasi dosen pembimbing atau kartu mahasiswa aktif',
                    'Pernyataan tidak menyebarluaskan dokumen'
                ],
                steps: '1. Lengkapi formulir permintaan berkas -> 2. Pustakawan memeriksa kelayakan -> 3. Berkas digital dikirim via tautan terproteksi.',
                actionUrl: 'https://bit.ly/PermintaanRepositoriUSU',
                actionText: 'Isi Formulir Permintaan'
            },
            'usulan-buku': {
                title: 'Usulan Pengadaan Bahan Pustaka',
                category: 'Layanan Daring',
                badgeClass: 'badge-google-form',
                icon: 'add_shopping_cart',
                iconBg: 'bg-[#FFF7ED]',
                iconColor: 'text-[#C2410C]',
                desc: 'Formulir bagi sivitas akademika untuk mengajukan judul buku teks baru, buku referensi, e-book, atau langganan jurnal rujukan.',
                requirements: [
                    'Judul, Pengarang, Penerbit, dan ISBN buku yang diusulkan',
                    'Justifikasi relevansi mata kuliah / bidang riset di USU',
                    'Data pengusul (Mahasiswa / Dosen / Program Studi)'
                ],
                steps: '1. Isi data buku pada Google Form -> 2. Tim seleksi koleksi mengevaluasi usulan -> 3. Pengusul mendapat pemberitahuan saat buku tiba.',
                actionUrl: 'https://bit.ly/UsulanBukuUSU2026',
                actionText: 'Ajukan Usulan Buku'
            },
            'sirkulasi': {
                title: 'Layanan Sirkulasi & Peminjaman',
                category: 'Layanan Luring',
                badgeClass: 'badge-luring',
                icon: 'sync_alt',
                iconBg: 'bg-[#F0F4EE]',
                iconColor: 'text-[#487629]',
                desc: 'Layanan peminjaman, pengembalian, perpanjangan masa pinjam, serta informasi koleksi buku teks umum di meja sirkulasi Lantai 1.',
                requirements: [
                    'KTM Mahasiswa USU aktif / Kartu Anggota Perpustakaan',
                    'Maksimal 3 eksemplar buku untuk S1 (durasi 7 hari)',
                    'Perpanjangan dapat dilakukan 1x jika buku tidak sedang direservasi pemustaka lain'
                ],
                steps: '1. Ambil buku dari rak koleksi -> 2. Bawa buku dan KTM ke meja sirkulasi Lantai 1 -> 3. Petugas memindai barcode transaksi.',
                actionUrl: '#jam-layanan',
                actionText: 'Lihat Jam Layanan'
            },
            'keanggotaan': {
                title: 'Layanan Keanggotaan & KTM',
                category: 'Layanan Luring',
                badgeClass: 'badge-luring',
                icon: 'badge',
                iconBg: 'bg-[#F0F4EE]',
                iconColor: 'text-[#487629]',
                desc: 'Aktivasi barcode KTM untuk akses gate perpustakaan dan hak peminjaman koleksi cetak.',
                requirements: [
                    'KTM Mahasiswa USU yang masih berlaku',
                    'KRS semester berjalan yang telah disetujui PA',
                    'Foto profil formal (jika belum terdata di portal)'
                ],
                steps: '1. Datangi Front Office Lantai 1 -> 2. Tunjukkan KTM dan bukti registrasi semester -> 3. Petugas mengaktifkan status keanggotaan dalam 2 menit.',
                actionUrl: '#jam-layanan',
                actionText: 'Lokasi Front Office'
            },
            'bimbingan': {
                title: 'Bimbingan Pemustaka & Orientasi',
                category: 'Layanan Luring',
                badgeClass: 'badge-luring',
                icon: 'support_agent',
                iconBg: 'bg-[#F0F4EE]',
                iconColor: 'text-[#487629]',
                desc: 'Layanan pendampingan pengguna baru untuk memahami denah lantai, klasifikasi rak DDC, pemanfaatan OPAC, dan tata tertib.',
                requirements: [
                    'Terbuka untuk perorangan maupun rombongan mahasiswa baru / delegasi fakultas',
                    'Konfirmasi jadwal untuk rombongan lebih dari 10 orang'
                ],
                steps: '1. Temui pustakawan di Information Desk Lantai 1 -> 2. Ikuti sesi bimbingan singkat / library tour sesuai kebutuhan.',
                actionUrl: '#jam-layanan',
                actionText: 'Kunjungi Info Desk'
            },
            'referensi': {
                title: 'Layanan Referensi & Sumatera Corner',
                category: 'Layanan Luring',
                badgeClass: 'badge-luring',
                icon: 'menu_book',
                iconBg: 'bg-[#F0F4EE]',
                iconColor: 'text-[#487629]',
                desc: 'Koleksi rujukan khusus mencakup ensiklopedia, kamus umum & istilah, almanak, data statistik BPS, serta naskah khusus budaya Sumatera Utara.',
                requirements: [
                    'Koleksi referensi hanya dapat dibaca di tempat (tidak dipinjamkan keluar)',
                    'Disediakan fasilitas fotokopi terbatas / scanner mandiri sesuai aturan hak cipta'
                ],
                steps: '1. Naik ke Lantai 2 Ruang Referensi -> 2. Simpan tas di loker -> 3. Manfaatkan koleksi di meja baca referensi.',
                actionUrl: '#jam-layanan',
                actionText: 'Lokasi Lantai 2'
            },
            'kelas-literasi': {
                title: 'Pendaftaran Kelas Literasi Informasi',
                category: 'Workshop & Pelatihan',
                badgeClass: 'badge-luring',
                icon: 'co_present',
                iconBg: 'bg-[#F0F4EE]',
                iconColor: 'text-[#487629]',
                desc: 'Workshop reguler setiap hari Selasa & Kamis yang mengajarkan teknik penelusuran jurnal Scopus, sitasi Mendeley, dan kiat publikasi ilmiah.',
                requirements: [
                    'Mahasiswa tingkat akhir (S1/S2/S3) atau dosen USU',
                    'Membawa laptop pribadi dengan software Mendeley terpasang'
                ],
                steps: '1. Pilih jadwal sesi kelas -> 2. Isi form registrasi peserta -> 3. Hadir di Ruang Seminar Lantai 3 sesuai jadwal terpilih.',
                actionUrl: 'https://bit.ly/KelasLiterasiUSU2026',
                actionText: 'Daftar Sesi Kelas'
            },
            'anggota-tamu': {
                title: 'Pendaftaran Anggota Tamu & Eksternal',
                category: 'Keanggotaan',
                badgeClass: 'badge-reservasi',
                icon: 'person_add',
                iconBg: 'bg-[#F0F4EE]',
                iconColor: 'text-[#487629]',
                desc: 'Kartu baca perpustakaan bagi alumni USU, mahasiswa perguruan tinggi mitra (FKP2TN), peneliti instansi, dan masyarakat umum.',
                requirements: [
                    'KTP / Tanda pengenal resmi yang berlaku',
                    'Surat pengantar dari perguruan tinggi / instansi asal (untuk peneliti)',
                    'Biaya administrasi kartu tamu sesuai tarif PNBP resmi'
                ],
                steps: '1. Datang ke loket pendaftaran tamu Lantai 1 -> 2. Mengisi formulir identitas pemustaka luar -> 3. Kartu izin baca harian/bulanan diterbitkan.',
                actionUrl: '#jam-layanan',
                actionText: 'Prosedur Tamu'
            }
        };

        // Scroll Helper
        function scrollToSection(id) {
            const el = document.getElementById(id);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Quick Category Filter
        function setCategoryFilter(category) {
            const tabs = document.querySelectorAll('.category-tab');
            tabs.forEach(tab => {
                const cat = tab.getAttribute('data-category');
                if (cat === category) {
                    tab.className = 'category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-[#487629] text-white whitespace-nowrap transition-all shadow-2xs';
                } else {
                    tab.className = 'category-tab px-4 py-2 text-xs sm:text-sm font-semibold rounded-lg bg-white text-[#5F685F] hover:bg-[#F0F4EE] hover:text-[#172019] border border-[#E5E7E3] whitespace-nowrap transition-all';
                }
            });

            const items = document.querySelectorAll('.service-item');
            items.forEach(item => {
                const itemCat = item.getAttribute('data-category');
                if (category === 'semua' || itemCat === category) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Live Search & Instant Suggestions
        const searchInput = document.getElementById('main-search-input');
        const clearBtn = document.getElementById('clear-search-btn');
        const suggestionsBox = document.getElementById('search-suggestions');
        const suggestionsContainer = document.getElementById('suggestion-items');

        function focusSearchInput() {
            searchInput.focus();
            scrollToSection('beranda');
        }

        // Keyboard Shortcut ⌘K / Ctrl+K
        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                focusSearchInput();
            }
        });

        searchInput.addEventListener('input', function() {
            const val = this.value.trim().toLowerCase();
            
            if (val.length > 0) {
                clearBtn.classList.remove('hidden');
                renderSuggestions(val);
            } else {
                clearBtn.classList.add('hidden');
                suggestionsBox.classList.add('hidden');
                // Reset service grid filter
                document.querySelectorAll('.service-item').forEach(item => item.style.display = 'flex');
            }
        });

        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            clearBtn.classList.add('hidden');
            suggestionsBox.classList.add('hidden');
            document.querySelectorAll('.service-item').forEach(item => item.style.display = 'flex');
            searchInput.focus();
        });

        function renderSuggestions(query) {
            const matches = [];
            
            // Search in SERVICES_DATA
            for (let key in SERVICES_DATA) {
                const item = SERVICES_DATA[key];
                if (item.title.toLowerCase().includes(query) || item.desc.toLowerCase().includes(query) || key.includes(query)) {
                    matches.push({ type: 'service', key: key, title: item.title, category: item.category, icon: item.icon });
                }
            }

            // Search in Rooms
            const rooms = [
                { type: 'room', key: 'tgcl', title: 'The Gade Creative Lounge (TGCL)', category: 'Lantai 1 • Kapasitas 40 Orang', icon: 'groups' },
                { type: 'room', key: 'rubelin', title: 'Ruang Belajar Mandiri (RUBELIN)', category: 'Lantai 2 • 24 Cubicle', icon: 'chair_alt' },
                { type: 'room', key: 'rapat-1', title: 'Ruang Rapat / Diskusi 1', category: 'Lantai 2 • Kapasitas 12 Orang', icon: 'meeting_room' },
                { type: 'room', key: 'konferensi', title: 'Ruang Konferensi', category: 'Lantai 3 • Kapasitas 80 Orang', icon: 'podium' }
            ];

            rooms.forEach(r => {
                if (r.title.toLowerCase().includes(query) || r.category.toLowerCase().includes(query)) {
                    matches.push(r);
                }
            });

            if (matches.length > 0) {
                suggestionsBox.classList.remove('hidden');
                suggestionsContainer.innerHTML = matches.map(m => `
                    <div onclick="selectSuggestion('${m.type}', '${m.key}')" class="p-3 hover:bg-[#F0F4EE] cursor-pointer flex items-center justify-between transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-[#F0F4EE] text-[#487629] flex items-center justify-center">
                                <span class="material-symbols-outlined text-base">${m.icon}</span>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-[#172019] block">${m.title}</span>
                                <span class="text-[11px] text-[#5F685F]">${m.category}</span>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-sm text-[#8A928A]">north_west</span>
                    </div>
                `).join('');
            } else {
                suggestionsBox.classList.remove('hidden');
                suggestionsContainer.innerHTML = `
                    <div class="p-4 text-center text-xs text-[#8A928A]">
                        Tidak ada layanan atau ruangan yang cocok dengan "<strong>${query}</strong>".
                    </div>
                `;
            }

            // Also filter visible service items in grid
            const serviceItems = document.querySelectorAll('.service-item');
            serviceItems.forEach(item => {
                const text = item.innerText.toLowerCase();
                const keywords = item.getAttribute('data-keywords') || '';
                if (text.includes(query) || keywords.includes(query)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function selectSuggestion(type, key) {
            suggestionsBox.classList.add('hidden');
            if (type === 'service') {
                openServiceDetailModal(key);
            } else if (type === 'room') {
                openReservationModal(key);
            }
        }

        function quickFilterAction(keyword) {
            searchInput.value = keyword;
            searchInput.dispatchEvent(new Event('input'));
            scrollToSection('layanan');
        }

        // Close suggestions on outside click
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
                suggestionsBox.classList.add('hidden');
            }
        });

        // Service Modal Operations
        function openServiceDetailModal(serviceId) {
            const data = SERVICES_DATA[serviceId];
            if (!data) return;

            document.getElementById('modal-title').innerText = data.title;
            document.getElementById('modal-badge').innerText = data.category;
            document.getElementById('modal-badge').className = `${data.badgeClass} text-[10px] font-semibold px-2 py-0.5 rounded-md inline-block mb-1`;
            document.getElementById('modal-icon').innerText = data.icon;
            document.getElementById('modal-desc').innerText = data.desc;
            
            const reqList = document.getElementById('modal-requirements');
            reqList.innerHTML = data.requirements.map(r => `<li>${r}</li>`).join('');

            document.getElementById('modal-steps').innerText = data.steps;

            const actionBtn = document.getElementById('modal-action-btn');
            actionBtn.href = data.actionUrl;
            actionBtn.querySelector('span').innerText = data.actionText;

            document.getElementById('service-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeServiceModal() {
            document.getElementById('service-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Reservation Modal Operations
        function openReservationModal(roomId) {
            const selectEl = document.getElementById('res-room-select');
            if (roomId && selectEl) {
                selectEl.value = roomId;
            }
            document.getElementById('reservation-form').classList.remove('hidden');
            document.getElementById('reservation-success').classList.add('hidden');
            document.getElementById('reservation-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeReservationModal() {
            document.getElementById('reservation-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function handleReservationSubmit(e) {
            e.preventDefault();
            const roomName = document.getElementById('res-room-select').options[document.getElementById('res-room-select').selectedIndex].text;
            const code = 'USU-RES-' + Math.floor(1000 + Math.random() * 9000);
            
            document.getElementById('res-code').innerText = code;
            document.getElementById('reservation-form').classList.add('hidden');
            document.getElementById('reservation-success').classList.remove('hidden');
        }

        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-nav-panel');
            menu.classList.toggle('hidden');
        }

        // Login Modal Simulation
        function openLoginModal() {
            document.getElementById('login-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('login-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function simulateLogin(userRole) {
            closeLoginModal();
            const container = document.getElementById('user-menu-container');
            container.innerHTML = `
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#F0F4EE] border border-[#DCE3D9] text-xs">
                    <span class="w-2 h-2 rounded-full bg-[#5CB733]"></span>
                    <span class="font-bold text-[#487629]">Ahmad Rivaldi (${userRole})</span>
                    <button type="button" onclick="resetLoginState()" class="ml-2 text-[#8A928A] hover:text-[#DC2626]" title="Keluar">
                        <span class="material-symbols-outlined text-sm">logout</span>
                    </button>
                </div>
            `;
        }

        function resetLoginState() {
            const container = document.getElementById('user-menu-container');
            container.innerHTML = `
                <button type="button" id="login-btn" onclick="openLoginModal()" class="usu-btn-primary px-4 py-2 text-xs flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">login</span>
                    <span>Masuk Akun</span>
                </button>
            `;
        }

        function openWhatsAppHelpdesk() {
            window.open('https://wa.me/6281234567890?text=Halo%20Perpustakaan%20USU,%20saya%20ingin%20bertanya%20tentang%20layanan%20perpustakaan...', '_blank');
        }
    </script>
</body>
</html>
