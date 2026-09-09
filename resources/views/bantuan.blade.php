@extends('layouts.app')

@section('title', 'Pusat Bantuan — Perpustakaan Universitas Sumatera Utara')
@section('meta_description', 'Panduan resmi penggunaan layanan perpustakaan, tata cara peminjaman, perpanjangan, bebas pustaka, dan FAQ Perpustakaan USU.')

@section('content')
<!-- BREADCRUMB -->
<div class="flex items-center gap-2 text-xs text-[#64748B]">
    <a href="{{ route('beranda') }}" class="hover:text-[#0B6839] flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">home</span>
        <span>Beranda</span>
    </a>
    <span class="text-[#CBD5E1]">/</span>
    <span class="text-[#0B6839] font-bold">Pusat Bantuan</span>
</div>

<!-- HERO HEADER -->
<section class="rounded-2xl usu-hero-bg text-white p-8 sm:p-10 shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="relative z-10 max-w-3xl space-y-3">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-xs text-[#F6AE01] text-xs font-bold">
            <span class="material-symbols-outlined text-sm">help</span>
            <span>Pusat Panduan & Informasi Pemustaka</span>
        </div>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight">
            Pusat Bantuan Perpustakaan USU
        </h1>
        <p class="text-xs sm:text-sm text-white/90 leading-relaxed max-w-2xl">
            Panduan resmi penggunaan layanan perpustakaan, memahami tata cara peminjaman koleksi, perpanjangan, sanksi keterlambatan, dan informasi penting lainnya.
        </p>
    </div>
    <div class="absolute right-4 bottom-0 top-0 opacity-10 flex items-center justify-end pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">support_agent</span>
    </div>
</section>

<!-- QUICK NAV ANCHORS -->
<div class="flex flex-wrap items-center gap-2 text-xs bg-white rounded-xl border border-[#E2E8F0] px-5 py-3 shadow-xs">
    <span class="font-bold text-[#0F172A]">Navigasi Cepat:</span>
    <a href="#panduan-layanan" class="px-3 py-1.5 rounded-lg bg-[#F0FDF4] text-[#0B6839] font-semibold hover:bg-[#0B6839] hover:text-white transition-colors inline-flex items-center gap-1">
        <span class="material-symbols-outlined text-xs">menu_book</span> Panduan Layanan
    </a>
    <a href="#syarat-peminjaman" class="px-3 py-1.5 rounded-lg bg-[#F0FDF4] text-[#0B6839] font-semibold hover:bg-[#0B6839] hover:text-white transition-colors inline-flex items-center gap-1">
        <span class="material-symbols-outlined text-xs">library_books</span> Syarat Peminjaman
    </a>
    <a href="#faq" class="px-3 py-1.5 rounded-lg bg-[#FFFBEB] text-[#B45309] font-semibold hover:bg-[#B45309] hover:text-white transition-colors inline-flex items-center gap-1">
        <span class="material-symbols-outlined text-xs">quiz</span> FAQ
    </a>
</div>

<!-- SECTION 1: PANDUAN LAYANAN PERPUSTAKAAN -->
<section id="panduan-layanan" class="usu-card p-6 sm:p-8 bg-white border-2 border-[#C2E4CD] shadow-sm space-y-6 scroll-mt-24">
    <div class="flex items-center gap-3 border-b border-[#D6EADF] pb-5">
        <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shadow-xs shrink-0">
            <span class="material-symbols-outlined text-xl">menu_book</span>
        </div>
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Panduan Layanan Perpustakaan</h2>
            <p class="text-xs sm:text-sm text-[#64748B] mt-0.5">Informasi lengkap mengenai layanan yang tersedia di Perpustakaan USU.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Card: Keanggotaan -->
        <div class="p-5 rounded-xl bg-[#F0FDF4] border border-[#C2E4CD] space-y-3">
            <h3 class="font-bold text-[#0B6839] text-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">badge</span> Keanggotaan & Registrasi
            </h3>
            <ul class="space-y-2 text-xs text-[#475569] leading-relaxed">
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span>Seluruh mahasiswa aktif, dosen, dan tenaga kependidikan USU otomatis terdaftar sebagai anggota perpustakaan.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span>Wajib membawa <strong>Kartu Tanda Mahasiswa (KTM)</strong> atau Kartu Anggota Aktif saat bertransaksi di meja sirkulasi.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span>Masyarakat umum dapat mengakses ruang baca dengan menunjukkan identitas resmi (KTP / SIM).</span>
                </li>
            </ul>
        </div>

        <!-- Card: Katalog & Pencarian -->
        <div class="p-5 rounded-xl bg-[#F0FDF4] border border-[#C2E4CD] space-y-3">
            <h3 class="font-bold text-[#0B6839] text-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">search</span> Katalog & Pencarian Koleksi
            </h3>
            <ul class="space-y-2 text-xs text-[#475569] leading-relaxed">
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span>Gunakan <strong>DIGILIB OPAC</strong> (<a href="https://digilib.usu.ac.id" target="_blank" class="text-[#0B6839] underline decoration-dotted underline-offset-2">digilib.usu.ac.id</a>) untuk mencari koleksi buku, jurnal, dan skripsi.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span>Repositori digital tersedia di <a href="https://repositori.usu.ac.id" target="_blank" class="text-[#0B6839] underline decoration-dotted underline-offset-2">repositori.usu.ac.id</a> untuk akses karya ilmiah dan tugas akhir.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span>Panduan database dan e-journal dapat diakses melalui <a href="https://resourceguide.usu.ac.id" target="_blank" class="text-[#0B6839] underline decoration-dotted underline-offset-2">Resource Guide USU</a>.</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- SECTION 2: SYARAT PEMINJAMAN & PERPANJANGAN -->
<section id="syarat-peminjaman" class="usu-card p-6 sm:p-8 bg-white border-2 border-[#C2E4CD] shadow-sm space-y-6 scroll-mt-24">
    <div class="flex items-center gap-3 border-b border-[#D6EADF] pb-5">
        <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] text-[#0B6839] flex items-center justify-center border border-[#C2E4CD] shadow-xs shrink-0">
            <span class="material-symbols-outlined text-xl">library_books</span>
        </div>
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Syarat Peminjaman & Perpanjangan</h2>
            <p class="text-xs sm:text-sm text-[#64748B] mt-0.5">Kuota, durasi pinjam, dan informasi sanksi keterlambatan.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Card: Kuota Peminjaman -->
        <div class="p-5 rounded-xl bg-[#F0FDF4] border border-[#C2E4CD] space-y-3">
            <h3 class="font-bold text-[#0B6839] text-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">book</span> Kuota & Durasi Pinjam
            </h3>
            <ul class="space-y-2 text-xs text-[#475569] leading-relaxed">
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span><strong>Koleksi Standard (STD):</strong> Maksimal 3–5 eksemplar, durasi pinjam selama 7 hari kalender.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span><strong>Koleksi Pinjam Singkat (KPS):</strong> Maksimal 1–2 eksemplar, durasi pinjam 3 hari.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">check_circle</span>
                    <span><strong>Koleksi Referensi:</strong> Hanya dapat dibaca di tempat, tidak dapat dipinjam keluar.</span>
                </li>
            </ul>
        </div>

        <!-- Card: Perpanjangan & Sanksi -->
        <div class="p-5 rounded-xl bg-[#FFFBEB] border border-[#FEF3C7] space-y-3">
            <h3 class="font-bold text-[#B45309] text-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">autorenew</span> Perpanjangan & Sanksi
            </h3>
            <ul class="space-y-2 text-xs text-[#475569] leading-relaxed">
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">arrow_forward</span>
                    <span><strong>Perpanjangan (Renewal):</strong> Dapat dilakukan 1× sebelum jatuh tempo, selama buku tidak di-pesan pemustaka lain.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#F59E0B] shrink-0 mt-0.5">warning</span>
                    <span><strong>Keterlambatan:</strong> Dikenakan sanksi denda per hari sesuai Peraturan Perpustakaan USU yang berlaku.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-sm text-[#0B6839] shrink-0 mt-0.5">workspace_premium</span>
                    <span><strong>Bebas Pustaka:</strong> Persyaratan wisuda memerlukan pengembalian seluruh koleksi pinjaman terlebih dahulu.</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- SECTION 3: FAQ -->
<section id="faq" class="usu-card p-6 sm:p-8 bg-white border-2 border-[#C2E4CD] shadow-sm space-y-6 scroll-mt-24">
    <div class="flex items-center gap-3 border-b border-[#D6EADF] pb-5">
        <div class="w-10 h-10 rounded-xl bg-[#FFFBEB] text-[#B45309] flex items-center justify-center border border-[#FEF3C7] shadow-xs shrink-0">
            <span class="material-symbols-outlined text-xl">quiz</span>
        </div>
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#074324]">Pertanyaan yang Sering Diajukan (FAQ)</h2>
            <p class="text-xs sm:text-sm text-[#64748B] mt-0.5">Jawaban cepat untuk pertanyaan yang umum ditanyakan pemustaka.</p>
        </div>
    </div>

    <div class="space-y-3">
        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0]">
            <h3 class="font-bold text-[#074324] text-sm mb-1.5 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#F6AE01]">help</span> Siapa saja yang bisa meminjam buku di Perpustakaan USU?
            </h3>
            <p class="text-xs text-[#64748B] leading-relaxed pl-6">
                Seluruh mahasiswa aktif, dosen, dan tenaga kependidikan Universitas Sumatera Utara yang terdaftar serta memiliki Kartu Tanda Mahasiswa (KTM) / Kartu Anggota Perpustakaan yang aktif.
            </p>
        </div>

        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0]">
            <h3 class="font-bold text-[#074324] text-sm mb-1.5 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#F6AE01]">help</span> Bagaimana cara memperpanjang buku yang dipinjam?
            </h3>
            <p class="text-xs text-[#64748B] leading-relaxed pl-6">
                Perpanjangan dapat dilakukan 1× sebelum tanggal jatuh tempo melalui layanan sirkulasi di meja petugas atau menghubungi pustakawan via WhatsApp/telepon.
            </p>
        </div>

        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0]">
            <h3 class="font-bold text-[#074324] text-sm mb-1.5 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#F6AE01]">help</span> Bagaimana cara mengurus Surat Keterangan Bebas Pustaka (SKBP)?
            </h3>
            <p class="text-xs text-[#64748B] leading-relaxed pl-6">
                SKBP dapat diurus secara online melalui layanan daring perpustakaan, atau secara langsung di meja sirkulasi Lantai 1 dengan mengembalikan seluruh koleksi pinjaman dan menyerahkan formulir yang diperlukan.
            </p>
        </div>

        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0]">
            <h3 class="font-bold text-[#074324] text-sm mb-1.5 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#F6AE01]">help</span> Apakah ruangan diskusi bisa direservasi secara online?
            </h3>
            <p class="text-xs text-[#64748B] leading-relaxed pl-6">
                Ya! Anda dapat melihat jadwal ketersediaan ruangan melalui halaman <a href="{{ route('jadwal.ruangan') }}" class="text-[#0B6839] font-semibold underline decoration-dotted underline-offset-2">Jadwal Ruangan</a> dan melakukan reservasi langsung melalui fitur di website ini.
            </p>
        </div>

        <div class="p-4 rounded-xl bg-[#F8FAF7] border border-[#E2E8F0]">
            <h3 class="font-bold text-[#074324] text-sm mb-1.5 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-[#F6AE01]">help</span> Apakah Perpustakaan USU buka di hari Sabtu dan Minggu?
            </h3>
            <p class="text-xs text-[#64748B] leading-relaxed pl-6">
                Jadwal operasional dapat bervariasi. Silakan cek informasi jam layanan terbaru di <a href="{{ route('beranda') }}#jam-layanan" class="text-[#0B6839] font-semibold underline decoration-dotted underline-offset-2">halaman Beranda</a> bagian Jam Layanan.
            </p>
        </div>
    </div>
</section>

<!-- CALL TO ACTION BANNER -->
<section class="usu-card p-6 sm:p-8 text-white border-2 border-[#0B6839] shadow-lg relative overflow-hidden" style="background: linear-gradient(135deg, #022513 0%, #074324 55%, #0B6839 100%);">
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>

    <div class="relative z-10 text-center space-y-4">
        <h3 class="text-xl sm:text-2xl font-extrabold">Masih Butuh Bantuan Lain?</h3>
        <p class="text-xs sm:text-sm text-white/85">Tim pustakawan kami siap membantu kebutuhan referensi & informasi Anda.</p>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 bg-white text-[#0B6839] px-6 py-2.5 rounded-xl text-xs sm:text-sm font-bold hover:bg-[#F0FDF4] transition shadow-md">
                <span class="material-symbols-outlined text-base">mail</span> Hubungi Pustakawan
            </a>
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-white/15 text-white border border-white/20 px-6 py-2.5 rounded-xl text-xs sm:text-sm font-bold hover:bg-white/25 transition">
                <span class="material-symbols-outlined text-base">home</span> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection
