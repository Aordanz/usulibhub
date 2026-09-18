<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Perpustakaan Universitas Sumatera Utara</title>
    <meta name="description" content="Halaman login khusus admin dan pengelola Perpustakaan Universitas Sumatera Utara.">
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
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            usu: {
                                primary: '#0B6839',
                                secondary: '#15803D',
                                dark: '#074324',
                                deepdark: '#022513',
                                gold: '#F6AE01',
                                orange: '#F28800',
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
        * { box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
            margin: 0;
            min-height: 100vh;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block; vertical-align: middle; line-height: 1;
        }

        /* ── Left Branding Panel ── */
        .login-left {
            background: linear-gradient(150deg, #022513 0%, #074324 45%, #0B6839 80%, #15803D 100%);
            position: relative;
            overflow: hidden;
        }

        /* decorative circles */
        .login-left::before {
            content: '';
            position: absolute;
            width: 520px; height: 520px;
            border-radius: 50%;
            border: 1px solid rgba(246,174,1,0.12);
            top: -120px; left: -140px;
            animation: spinSlow 40s linear infinite;
        }
        .login-left::after {
            content: '';
            position: absolute;
            width: 340px; height: 340px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.08);
            bottom: -80px; right: -80px;
            animation: spinSlow 30s linear infinite reverse;
        }
        @keyframes spinSlow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            pointer-events: none;
        }
        .orb-1 {
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(246,174,1,0.18) 0%, transparent 70%);
            top: 10%; right: -60px;
        }
        .orb-2 {
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(21,128,61,0.3) 0%, transparent 70%);
            bottom: 15%; left: -40px;
        }

        /* ── Glass Card ── */
        .glass-card {
            background: rgba(255,255,255,0.96);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(11,104,57,0.12);
            border-radius: 20px;
            box-shadow: 0 20px 60px -10px rgba(7,67,36,0.12), 0 4px 20px -4px rgba(0,0,0,0.06);
        }

        /* ── Input Styles ── */
        .form-input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 1.5px solid #D6EADF;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            color: #0F172A;
            background: #FAFFFE;
            transition: all 0.15s ease;
            outline: none;
        }
        .form-input:focus {
            border-color: #0B6839;
            background: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(11,104,57,0.1);
        }
        .form-input::placeholder { color: #94A3B8; }
        .form-input.input-error {
            border-color: #EF4444;
            background: #FFF5F5;
            box-shadow: 0 0 0 3px rgba(239,68,68,0.08);
        }

        /* ── Submit Button ── */
        .btn-login {
            width: 100%;
            padding: 13px 20px;
            background: linear-gradient(135deg, #0B6839 0%, #074324 100%);
            color: #FFFFFF;
            font-weight: 700;
            font-size: 15px;
            font-family: inherit;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(11,104,57,0.3);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: 0.01em;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #074324 0%, #042B16 100%);
            box-shadow: 0 6px 20px rgba(11,104,57,0.4);
            transform: translateY(-1px);
        }
        .btn-login:active { transform: translateY(0); }

        /* ── Checkbox ── */
        .custom-checkbox {
            appearance: none;
            width: 18px; height: 18px;
            border: 1.5px solid #C3DCCC;
            border-radius: 5px;
            cursor: pointer;
            background: #FAFFFE;
            transition: all 0.15s ease;
            flex-shrink: 0;
        }
        .custom-checkbox:checked {
            background: #0B6839;
            border-color: #0B6839;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3E%3C/svg%3E");
            background-size: contain;
        }

        /* ── Stat badges on left ── */
        .stat-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            backdrop-filter: blur(8px);
        }

        /* password toggle */
        .input-wrapper { position: relative; }
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 20px;
            pointer-events: none;
        }
        .input-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 20px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            line-height: 1;
        }
        .input-toggle:hover { color: #0B6839; }

        /* floating dots animation */
        .dot-grid {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,0.08) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .login-left { display: none; }
        }
    </style>
</head>
<body>
<div class="min-h-screen flex">

    {{-- ═══════════════════════════════════════════════════════════ --}}
    {{-- LEFT: BRANDING PANEL                                        --}}
    {{-- ═══════════════════════════════════════════════════════════ --}}
    <div class="login-left hidden md:flex flex-col justify-between w-[46%] xl:w-[42%] p-10 xl:p-14 text-white">
        <div class="dot-grid"></div>
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>

        {{-- Logo & brand --}}
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-11 h-11 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center shadow-lg">
                    <img src="{{ asset('logousu.webp') }}" alt="Logo USU" class="w-7 h-7 object-contain">
                </div>
                <div>
                    <p class="text-xs font-semibold text-white/60 uppercase tracking-widest">UPT</p>
                    <p class="text-sm font-bold text-white leading-none">Perpustakaan USU</p>
                </div>
            </div>
        </div>

        {{-- Main hero text --}}
        <div class="relative z-10 space-y-5">
            {{-- Gold badge --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#F6AE01]/15 border border-[#F6AE01]/30 text-[#F6AE01] text-xs font-bold">
                <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1,'wght' 700;">verified</span>
                Panel Admin Resmi
            </div>

            <h1 class="text-3xl xl:text-4xl font-extrabold leading-tight text-white">
                Kelola Perpustakaan<br>
                <span class="text-[#F6AE01]">Universitas Sumatera Utara</span>
            </h1>
            <p class="text-sm xl:text-base text-white/70 leading-relaxed max-w-sm">
                Portal administrasi terpadu untuk mengelola ruangan, reservasi, pengguna, dan konten layanan perpustakaan.
            </p>

            {{-- Stats --}}
            <div class="grid grid-cols-2 gap-3 pt-2">
                <div class="stat-badge">
                    <span class="material-symbols-outlined text-[#F6AE01] text-xl" style="font-variation-settings:'FILL' 1,'wght' 600;">meeting_room</span>
                    <div>
                        <p class="text-base font-bold leading-none">12</p>
                        <p class="text-[11px] text-white/60">Ruangan Aktif</p>
                    </div>
                </div>
                <div class="stat-badge">
                    <span class="material-symbols-outlined text-[#10B981] text-xl" style="font-variation-settings:'FILL' 1,'wght' 600;">groups</span>
                    <div>
                        <p class="text-base font-bold leading-none">{{ \App\Models\User::where('role','mahasiswa')->count() }}</p>
                        <p class="text-[11px] text-white/60">Pengguna Terdaftar</p>
                    </div>
                </div>
                <div class="stat-badge">
                    <span class="material-symbols-outlined text-[#60A5FA] text-xl" style="font-variation-settings:'FILL' 1,'wght' 600;">event_available</span>
                    <div>
                        <p class="text-base font-bold leading-none">{{ \App\Models\RoomReservation::whereDate('reservation_date', today())->count() }}</p>
                        <p class="text-[11px] text-white/60">Reservasi Hari Ini</p>
                    </div>
                </div>
                <div class="stat-badge">
                    <span class="material-symbols-outlined text-[#F472B6] text-xl" style="font-variation-settings:'FILL' 1,'wght' 600;">mark_email_unread</span>
                    <div>
                        <p class="text-base font-bold leading-none">{{ \App\Models\ContactMessage::where('status','pending')->count() }}</p>
                        <p class="text-[11px] text-white/60">Pesan Masuk</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="relative z-10">
            <div class="flex items-center gap-2 text-white/40 text-xs">
                <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
                Sistem aktif · {{ now()->format('d M Y') }}
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════ --}}
    {{-- RIGHT: LOGIN FORM                                           --}}
    {{-- ═══════════════════════════════════════════════════════════ --}}
    <div class="flex-1 flex flex-col items-center justify-center p-6 sm:p-10 bg-[#F8FAF7] relative">

        {{-- background pattern --}}
        <div class="absolute inset-0 opacity-40 pointer-events-none"
             style="background-image: radial-gradient(circle at 80% 20%, rgba(11,104,57,0.06) 0%, transparent 50%), radial-gradient(circle at 20% 80%, rgba(246,174,1,0.05) 0%, transparent 50%);"></div>

        {{-- Back to home --}}
        <div class="w-full max-w-[420px] relative z-10">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-1.5 text-xs text-[#0B6839] font-semibold hover:gap-2.5 transition-all mb-8 group">
                <span class="material-symbols-outlined text-base group-hover:-translate-x-0.5 transition-transform">arrow_back</span>
                Kembali ke Beranda
            </a>

            {{-- Card --}}
            <div class="glass-card p-8 sm:p-10">

                {{-- Header --}}
                <div class="mb-8 space-y-1">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#0B6839] to-[#074324] flex items-center justify-center shadow-lg mb-4">
                        <span class="material-symbols-outlined text-white text-2xl" style="font-variation-settings:'FILL' 1,'wght' 600;">admin_panel_settings</span>
                    </div>
                    <h2 class="text-2xl font-extrabold text-[#0F172A]">Login Admin</h2>
                    <p class="text-sm text-[#64748B]">Masuk ke panel administrasi perpustakaan</p>
                </div>

                {{-- Error alert --}}
                @if ($errors->any())
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-red-50 border border-red-100 mb-6" role="alert">
                        <span class="material-symbols-outlined text-red-500 text-xl shrink-0 mt-0.5" style="font-variation-settings:'FILL' 1,'wght' 600;">error</span>
                        <div>
                            <p class="text-sm font-semibold text-red-700">Login Gagal</p>
                            <p class="text-xs text-red-600 mt-0.5">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                {{-- Session flash --}}
                @if (session('error'))
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-amber-50 border border-amber-100 mb-6" role="alert">
                        <span class="material-symbols-outlined text-amber-500 text-xl shrink-0 mt-0.5" style="font-variation-settings:'FILL' 1,'wght' 600;">warning</span>
                        <p class="text-sm text-amber-700">{{ session('error') }}</p>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" id="login-form" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#1E293B] mb-1.5">Alamat Email</label>
                        <div class="input-wrapper">
                            <span class="input-icon material-symbols-outlined">mail</span>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                required
                                autofocus
                                placeholder="admin@perpustakaan.usu.ac.id"
                                class="form-input {{ $errors->has('email') ? 'input-error' : '' }}"
                            >
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-[#1E293B] mb-1.5">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon material-symbols-outlined">lock</span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                autocomplete="current-password"
                                required
                                placeholder="••••••••"
                                class="form-input pr-11 {{ $errors->has('email') ? 'input-error' : '' }}"
                            >
                            <button type="button" id="toggle-password" class="input-toggle material-symbols-outlined" aria-label="Tampilkan password">
                                visibility
                            </button>
                        </div>
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center gap-2.5 select-none">
                        <input type="checkbox" id="remember" name="remember" class="custom-checkbox">
                        <label for="remember" class="text-sm text-[#475569] cursor-pointer">Ingat saya di perangkat ini</label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-login" id="login-submit-btn">
                        <span class="material-symbols-outlined text-xl" style="font-variation-settings:'FILL' 1,'wght' 600;">login</span>
                        Masuk ke Dashboard
                    </button>
                </form>

                {{-- Divider info --}}
                <div class="mt-7 pt-5 border-t border-[#E2E8F0]">
                    <div class="flex items-center gap-2 text-xs text-[#94A3B8]">
                        <span class="material-symbols-outlined text-base text-[#10B981]" style="font-variation-settings:'FILL' 1,'wght' 600;">shield</span>
                        Halaman ini hanya untuk Admin yang berwenang
                    </div>
                </div>
            </div>

            {{-- Footer note --}}
            <p class="text-center text-xs text-[#94A3B8] mt-6">
                © {{ date('Y') }} UPT Perpustakaan Universitas Sumatera Utara
            </p>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    const toggleBtn = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');
    toggleBtn.addEventListener('click', () => {
        const isHidden = passwordInput.type === 'password';
        passwordInput.type = isHidden ? 'text' : 'password';
        toggleBtn.textContent = isHidden ? 'visibility_off' : 'visibility';
    });

    // Submit button loading state
    const loginForm = document.getElementById('login-form');
    const submitBtn = document.getElementById('login-submit-btn');
    loginForm.addEventListener('submit', () => {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="material-symbols-outlined text-xl animate-spin" style="animation: spin 1s linear infinite;">progress_activity</span> Memproses...';
        submitBtn.style.opacity = '0.8';
    });
</script>

<style>
@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>
</body>
</html>
