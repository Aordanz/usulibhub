<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Admin Perpustakaan USU</title>
    <meta name="description" content="Panel administrasi Perpustakaan Universitas Sumatera Utara.">
    <link rel="icon" href="{{ asset('logousu.webp') }}" type="image/webp">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: { sans: ['"Plus Jakarta Sans"', '"Inter"', 'system-ui', 'sans-serif'] }
                    }
                }
            }
        </script>
    @endif

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
            background: #F1F5F9;
            margin: 0;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block; vertical-align: middle; line-height: 1;
        }

        /* ── Sidebar ── */
        #admin-sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #022513 0%, #042B16 60%, #074324 100%);
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0; top: 0; bottom: 0;
            z-index: 50;
            transition: transform 0.3s cubic-bezier(0.16,1,0.3,1);
            overflow-y: auto;
            scrollbar-width: none;
        }
        #admin-sidebar::-webkit-scrollbar { display: none; }

        .sidebar-logo-area {
            padding: 20px 20px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .sidebar-nav { flex: 1; padding: 12px 12px; }

        .nav-section-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: rgba(255,255,255,0.3);
            text-transform: uppercase;
            padding: 14px 8px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.65);
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.15s ease;
            margin-bottom: 2px;
            cursor: pointer;
        }
        .nav-item:hover {
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.95);
        }
        .nav-item.active {
            background: linear-gradient(135deg, rgba(246,174,1,0.18) 0%, rgba(246,174,1,0.08) 100%);
            color: #F6AE01;
            border: 1px solid rgba(246,174,1,0.2);
        }
        .nav-item.active .nav-icon { color: #F6AE01; }
        .nav-icon { font-size: 20px; flex-shrink: 0; }

        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid rgba(255,255,255,0.07);
        }

        /* ── Main Area ── */
        #admin-main {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s cubic-bezier(0.16,1,0.3,1);
        }

        /* ── Topbar ── */
        .admin-topbar {
            background: #FFFFFF;
            border-bottom: 1px solid #E2E8F0;
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: 0 1px 8px rgba(0,0,0,0.04);
        }

        /* ── Content ── */
        .admin-content {
            padding: 28px;
            flex: 1;
        }

        /* ── Stat Card ── */
        .stat-card {
            background: #FFFFFF;
            border: 1px solid #E8F0EC;
            border-radius: 16px;
            padding: 22px 24px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
            transition: all 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(11,104,57,0.1);
            border-color: #C3DCCC;
        }
        .stat-icon-wrap {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* ── Data Table ── */
        .admin-table-wrap {
            background: #FFFFFF;
            border: 1px solid #E8F0EC;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        }
        .admin-table-header {
            padding: 18px 22px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .admin-table { width: 100%; border-collapse: collapse; }
        .admin-table th {
            padding: 11px 22px;
            background: #F8FAFC;
            font-size: 11px;
            font-weight: 700;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            text-align: left;
            border-bottom: 1px solid #F1F5F9;
        }
        .admin-table td {
            padding: 13px 22px;
            font-size: 13.5px;
            color: #334155;
            border-bottom: 1px solid #F8FAFC;
        }
        .admin-table tr:last-child td { border-bottom: none; }
        .admin-table tr:hover td { background: #FAFFFE; }

        /* ── Badge ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 11.5px;
            font-weight: 600;
        }
        .badge-pending  { background: #FEF3C7; color: #92400E; }
        .badge-approved { background: #D1FAE5; color: #065F46; }
        .badge-rejected { background: #FEE2E2; color: #991B1B; }
        .badge-admin    { background: #E0E7FF; color: #3730A3; }
        .badge-mahasiswa{ background: #F0FDF4; color: #166534; border: 1px solid #BBF7D0; }

        /* Mobile overlay */
        #sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 49;
            backdrop-filter: blur(2px);
        }

        @media (max-width: 1024px) {
            #admin-sidebar { transform: translateX(-100%); }
            #admin-sidebar.open { transform: translateX(0); }
            #admin-main { margin-left: 0; }
            #sidebar-overlay.show { display: block; }
            .admin-content { padding: 20px 16px; }
        }

        /* Quick action btn */
        .quick-action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            padding: 16px;
            border-radius: 14px;
            border: 1.5px solid #E8F0EC;
            background: #FFFFFF;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s ease;
            color: #334155;
            text-align: center;
        }
        .quick-action-btn:hover {
            border-color: #0B6839;
            background: #F0FDF4;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(11,104,57,0.1);
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- Sidebar overlay for mobile --}}
<div id="sidebar-overlay" onclick="closeSidebar()"></div>

{{-- ═══════════ SIDEBAR ═══════════ --}}
<aside id="admin-sidebar" role="navigation" aria-label="Navigasi Admin">

    {{-- Logo --}}
    <div class="sidebar-logo-area">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-white/10 border border-white/15 flex items-center justify-center">
                <img src="{{ asset('logousu.webp') }}" alt="Logo USU" class="w-6 h-6 object-contain">
            </div>
            <div class="leading-none">
                <p class="text-[10px] font-semibold text-white/40 uppercase tracking-widest">Admin Panel</p>
                <p class="text-[13.5px] font-bold text-white">Perpustakaan USU</p>
            </div>
            <button onclick="closeSidebar()" class="ml-auto lg:hidden text-white/40 hover:text-white" aria-label="Tutup sidebar">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        <p class="nav-section-label">Utama</p>

        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon material-symbols-outlined" style="font-variation-settings:'FILL' {{ request()->routeIs('admin.dashboard') ? 1 : 0 }},'wght' 500;">dashboard</span>
            Dashboard
        </a>

        <p class="nav-section-label">Manajemen</p>

        <a href="{{ route('admin.users') }}" class="nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
            <span class="nav-icon material-symbols-outlined" style="font-variation-settings:'FILL' {{ request()->routeIs('admin.users*') ? 1 : 0 }},'wght' 500;">group</span>
            Pengguna
        </a>
        <a href="{{ route('admin.rooms') }}" class="nav-item {{ request()->routeIs('admin.rooms*') ? 'active' : '' }}">
            <span class="nav-icon material-symbols-outlined" style="font-variation-settings:'FILL' {{ request()->routeIs('admin.rooms*') ? 1 : 0 }},'wght' 500;">meeting_room</span>
            Ruangan
        </a>
        <a href="{{ route('admin.reservations') }}" class="nav-item {{ request()->routeIs('admin.reservations*') ? 'active' : '' }}">
            <span class="nav-icon material-symbols-outlined" style="font-variation-settings:'FILL' {{ request()->routeIs('admin.reservations*') ? 1 : 0 }},'wght' 500;">event_available</span>
            Reservasi
            @php $pendingCount = \App\Models\RoomReservation::where('status', 'pending')->count(); @endphp
            @if($pendingCount > 0)
                <span class="ml-auto text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-400/20 text-amber-300 border border-amber-400/30">
                    {{ $pendingCount }}
                </span>
            @endif
        </a>
        <a href="{{ route('admin.schedule') }}" class="nav-item {{ request()->routeIs('admin.schedule*') ? 'active' : '' }}">
            <span class="nav-icon material-symbols-outlined" style="font-variation-settings:'FILL' {{ request()->routeIs('admin.schedule*') ? 1 : 0 }},'wght' 500;">calendar_month</span>
            Jadwal Ruangan
        </a>
        <a href="{{ route('admin.history') }}" class="nav-item {{ request()->routeIs('admin.history*') ? 'active' : '' }}">
            <span class="nav-icon material-symbols-outlined" style="font-variation-settings:'FILL' {{ request()->routeIs('admin.history*') ? 1 : 0 }},'wght' 500;">history</span>
            Histori Reservasi
        </a>
    </nav>

    {{-- User info at bottom --}}
    <div class="sidebar-footer">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#F6AE01] to-[#F28800] flex items-center justify-center text-[#074324] font-extrabold text-sm shadow">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[13px] font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-white/40 truncate">{{ auth()->user()->email }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white/30 hover:text-red-400 transition-colors" title="Logout" aria-label="Logout">
                    <span class="material-symbols-outlined text-xl">logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- ═══════════ MAIN AREA ═══════════ --}}
<div id="admin-main">

    {{-- Topbar --}}
    <header class="admin-topbar">
        <div class="flex items-center gap-4">
            <button onclick="toggleSidebar()" class="lg:hidden text-[#64748B] hover:text-[#0B6839] transition-colors" aria-label="Toggle sidebar">
                <span class="material-symbols-outlined text-2xl">menu</span>
            </button>
            <div>
                <h1 class="text-base font-bold text-[#0F172A] leading-none">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs text-[#94A3B8] mt-0.5">@yield('page-subtitle', 'Selamat datang di panel admin')</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            {{-- Live clock --}}
            <div class="hidden sm:flex items-center gap-2 text-xs text-[#64748B] bg-[#F8FAFC] border border-[#E2E8F0] rounded-lg px-3 py-2">
                <span class="material-symbols-outlined text-base text-[#0B6839]" style="font-variation-settings:'FILL' 1,'wght' 500;">schedule</span>
                <span id="live-clock" class="font-semibold text-[#334155]">--:--:--</span>
                <span class="text-[#94A3B8]">WIB</span>
            </div>

            {{-- Date --}}
            <div class="hidden md:block text-xs text-[#94A3B8]">
                {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
            </div>

            {{-- Admin badge --}}
            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#F0FDF4] border border-[#BBF7D0]">
                <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
                <span class="text-xs font-semibold text-[#065F46]">Admin</span>
            </div>
        </div>
    </header>

    {{-- Page content --}}
    <main class="admin-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="px-7 py-4 border-t border-[#E2E8F0] bg-white">
        <p class="text-xs text-[#94A3B8]">© {{ date('Y') }} UPT Perpustakaan Universitas Sumatera Utara · Admin Panel v1.0</p>
    </footer>
</div>

<script>
    // Live clock
    function updateClock() {
        const el = document.getElementById('live-clock');
        if (el) {
            const now = new Date();
            el.textContent = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false });
        }
    }
    updateClock();
    setInterval(updateClock, 1000);

    // Sidebar toggle
    function toggleSidebar() {
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.toggle('open');
        overlay.classList.toggle('show');
    }
    function closeSidebar() {
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    }
</script>

@stack('scripts')
</body>
</html>
