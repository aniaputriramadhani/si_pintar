<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIPINTAR — Sistem Informasi Program Indonesia Pintar Kemendikdasmen.">
    <title>SIPINTAR | Program Indonesia Pintar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { 
            --ink: #071a33;
            --blue: #0055FF;
            --aqua: #5ee8d6; 
            --paper: #f8fafc; 
        }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--ink); background: var(--paper); font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
        .mono { font-family: 'DM Mono', monospace; }
        
        /* Accessibility */
        .skip-link { position: fixed; z-index: 100; left: 1rem; top: -5rem; border-radius: .75rem; background: var(--blue); color: white; padding: 1rem 1.25rem; font-weight: 800; font-size: 1.125rem; box-shadow: 0 10px 30px rgba(0,85,255,0.4); transition: top 0.3s ease; }
        .skip-link:focus { top: 1rem; }
        
        /* Backgrounds */
        .hero { background: linear-gradient(118deg, #f5fbff 0%, #e4f4ff 50%, #eefcf8 100%); isolation: isolate; }
        .hero::before { content: ''; position: absolute; inset: 0; z-index: -2; opacity: .48; background-image: linear-gradient(#1479ff14 1px, transparent 1px), linear-gradient(90deg, #1479ff14 1px, transparent 1px); background-size: 54px 54px; mask-image: linear-gradient(to bottom, black, transparent 88%); }
        .hero::after { content: ''; position: absolute; z-index: -1; right: -14vw; top: -38vh; height: 88vw; width: 88vw; max-width: 1200px; max-height: 1200px; border-radius: 999px; background: radial-gradient(circle at 42% 45%, #c8ebff 0 14%, #9fd8ff 33%, #d6f7ee 56%, transparent 71%); filter: blur(3px); opacity: .95; }
        .halo { position: absolute; z-index: -1; width: 28rem; height: 28rem; border-radius: 999px; border: 1px solid #1479ff25; box-shadow: 0 0 0 38px #1479ff0b, 0 0 0 88px #1479ff08; }
        
        .pattern-grid { background-image: radial-gradient(var(--blue) 1.5px, transparent 1.5px); background-size: 32px 32px; opacity: 0.05; }
        .pattern-dots { background-image: radial-gradient(#64748b 2px, transparent 2px); background-size: 20px 20px; opacity: 0.08; }
        .halo-blue-bottom { position: absolute; border-radius: 50%; background: radial-gradient(circle, rgba(0,85,255,0.15) 0%, transparent 70%); filter: blur(40px); }
        
        /* Header Scroll State */
        .header-scrolled { background-color: rgba(255, 255, 255, 0.9); backdrop-filter: blur(16px); box-shadow: 0 10px 30pxTentu! Saya telah memodifikasi kodemu sesuai dengan semua permintaan yang kamu butuhkan. Berikut adalah perubahan utamanya:

1. **Header Sticky & Animasi**: Header sekarang menggunakan posisi `fixed` agar selalu mengikuti (menempel di atas) saat di-scroll, lengkap dengan efek *blur* (`backdrop-blur-md`), dan ditambahkan animasi *slide-down* yang mulus saat web pertama kali dimuat.
2. **Posisi Teks (Rada ke Kanan, Rata Kiri)**: Saya menambahkan *margin-left* (`ml-4 sm:ml-8 lg:ml-12`) pada *wrapper* pembungkus teks Hero (Pendidikan yang lebih dekat...) dan teks Program (Dukungan nyata...) agar menjorok ke kanan namun tetap presisi rata kiri. 
3. **Teks Program Diperbesar**: Teks di bagian "Program Indonesia Pintar" sekarang ukurannya sudah diperbesar menjadi `text-5xl sm:text-6xl` untuk judul, dan `text-2xl` untuk deskripsinya agar lebih terbaca.
4. **Animasi Card yang *Bouncy***: Saya menambahkan *custom keyframes* `@keyframes popUp` dengan kurva `cubic-bezier` yang memberikan efek pantulan (*bounce*) saat card 01, 02, 03 muncul, dan ditambahkan efek *stagger* (muncul bergantian). Efek *scroll-reveal* untuk card di bawahnya juga saya buat lebih "melompat".

Berikut adalah kode lengkapnya:

```html
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIPINTAR — Sistem Informasi Program Indonesia Pintar Kemendikdasmen.">
    <title>SIPINTAR | Program Indonesia Pintar</title>
    <script src="[https://cdn.tailwindcss.com](https://cdn.tailwindcss.com)"></script>
    <link rel="preconnect" href="[https://fonts.googleapis.com](https://fonts.googleapis.com)">
    <link rel="preconnect" href="[https://fonts.gstatic.com](https://fonts.gstatic.com)" crossorigin>
    <link href="[https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap](https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap)" rel="stylesheet">
    <style>
        :root { 
            --ink: #071a33; 
            --blue: #0055FF; 
            --aqua: #5ee8d6; 
            --paper: #f8fafc; 
        }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--ink); background: var(--paper); font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
        .mono { font-family: 'DM Mono', monospace; }
        
        /* Accessibility */
        .skip-link { position: fixed; z-index: 100; left: 1rem; top: -5rem; border-radius: .75rem; background: var(--blue); color: white; padding: 1rem 1.25rem; font-weight: 800; font-size: 1.125rem; box-shadow: 0 10px 30px rgba(0,85,255,0.4); transition: top 0.3s ease; }
        .skip-link:focus { top: 1rem; }
        
        /* =========================================
           HERO BACKGROUND
           ========================================= */
        .hero { background: linear-gradient(118deg, #f5fbff 0%, #e4f4ff 50%, #eefcf8 100%); isolation: isolate; }
        .hero::before { content: ''; position: absolute; inset: 0; z-index: -2; opacity: .48; background-image: linear-gradient(#1479ff14 1px, transparent 1px), linear-gradient(90deg, #1479ff14 1px, transparent 1px); background-size: 54px 54px; mask-image: linear-gradient(to bottom, black, transparent 88%); }
        .hero::after { content: ''; position: absolute; z-index: -1; right: -14vw; top: -38vh; height: 88vw; width: 88vw; max-width: 1200px; max-height: 1200px; border-radius: 999px; background: radial-gradient(circle at 42% 45%, #c8ebff 0 14%, #9fd8ff 33%, #d6f7ee 56%, transparent 71%); filter: blur(3px); opacity: .95; }
        .halo { position: absolute; z-index: -1; width: 28rem; height: 28rem; border-radius: 999px; border: 1px solid #1479ff25; box-shadow: 0 0 0 38px #1479ff0b, 0 0 0 88px #1479ff08; }
        
        /* =========================================
           BOTTOM BACKGROUNDS
           ========================================= */
        .pattern-grid { background-image: radial-gradient(var(--blue) 1.5px, transparent 1.5px); background-size: 32px 32px; opacity: 0.05; }
        .pattern-dots { background-image: radial-gradient(#64748b 2px, transparent 2px); background-size: 20px 20px; opacity: 0.08; }
        .halo-blue-bottom { position: absolute; border-radius: 50%; background: radial-gradient(circle, rgba(0,85,255,0.15) 0%, transparent 70%); filter: blur(40px); }
        
        /* Animations & Cards */
        .float { animation: float 8s ease-in-out infinite; }
        .float-delay { animation: float 9s ease-in-out -4s infinite; }
        .reveal { animation: reveal 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .reveal-2 { animation-delay: 0.15s; } 
        .reveal-3 { animation-delay: 0.3s; }
        .glow { box-shadow: 0 20px 50px -12px rgba(0,0,0,0.15), 0 0 0 1px rgba(255,255,255,0.4) inset; }
        .glass { background: linear-gradient(140deg, rgba(255,255,255,0.95), rgba(255,255,255,0.85)); border: 1px solid #ffffff; backdrop-filter: blur(20px); }
        
        /* Hover Effects */
        .hover-lift { transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease; }
        .hover-lift:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 24px 48px -12px rgba(0,85,255,0.25); }
        
        /* Header Animation */
        @keyframes slideDown { from { transform: translateY(-100%); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .header-animate { animation: slideDown 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* Bouncy Pop-up for Cards */
        @keyframes popUp {
            0% { transform: scale(0.8) translateY(40px); opacity: 0; }
            100% { transform: scale(1) translateY(0); opacity: 1; }
        }
        .pop-up { animation: popUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) both; }
        .pop-up-1 { animation-delay: 0.4s; }
        .pop-up-2 { animation-delay: 0.55s; }
        .pop-up-3 { animation-delay: 0.7s; }

        /* Scroll Reveal (Lebih Bouncy) */
        .scroll-reveal { opacity: 0; transform: translateY(50px) scale(0.95); transition: opacity 0.8s cubic-bezier(0.34, 1.56, 0.64, 1), transform 0.8s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .scroll-reveal.is-visible { opacity: 1; transform: none; }
        
        @keyframes float { 50% { transform: translateY(-16px) rotate(1deg); } }
        @keyframes reveal { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: none; } }
    </style>
</head>
<body>
    <a class="skip-link" href="#konten-utama">Lewati ke konten utama</a>

    <!-- HEADER STICKY -->
<header class="fixed top-0 left-0 w-full z-50 border-b border-blue-900/10 bg-white/80 backdrop-blur-md header-animate shadow-sm transition-all">
    <div class="mx-auto grid h-24 max-w-[1540px] grid-cols-[1fr_auto_1fr] items-center gap-4 px-6 sm:px-10 lg:px-12">
        
        <!-- Logo & Brand -->
        <a href="{{ route('public.home') }}" class="flex items-center gap-4 justify-self-start rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-300">
            <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white shadow-sm text-xl font-extrabold tracking-tighter text-[#071a33]">Si</span>
            <span>
                <span class="block text-xl font-extrabold tracking-tight">SIPINTAR</span>
                <span class="block text-sm font-bold uppercase tracking-wider text-slate-600">Program Indonesia Pintar</span>
            </span>
        </a>

        <!-- Navigasi Utama (Di Tengah) -->
        <nav class="hidden items-center justify-self-center gap-8 xl:flex" aria-label="Navigasi utama">
            <a href="#pencarian" class="text-lg font-bold text-slate-700 transition hover:text-[#0055FF]">Cari Penerima</a>
            <a href="#program" class="text-lg font-bold text-slate-700 transition hover:text-[#0055FF]">Tentang PIP</a>
            <a href="#data-pemberian" class="text-lg font-bold text-slate-700 transition hover:text-[#0055px]">Data Penyaluran</a>
        </nav>

        <!-- Tombol Masuk Pengelola -->
        <div class="justify-self-end">
            <a href="{{ route('login') }}" class="inline-flex min-h-[46px] items-center rounded-xl bg-[#071a33] px-4 text-base font-bold text-white transition hover:bg-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-md shadow-blue-900/20">
                Masuk Pengelola <span class="ml-2" aria-hidden="true">↗</span>
            </a>
        </div>

    </div>
</header>

    <!-- AREA HERO -->
    <!-- pt-24 ditambahkan agar konten tidak tertutup header yang sekarang fixed -->
    <section class="hero relative min-h-[100svh] overflow-hidden text-[#071a33] pt-24">
        <div class="halo float pointer-events-none -left-36 top-44 hidden lg:block"></div>
        <div class="halo float-delay pointer-events-none bottom-[-17rem] right-[16%] hidden lg:block"></div>
        
        <main id="konten-utama" class="relative z-10">
            <section id="pencarian" class="mx-auto grid min-h-[calc(100svh-6rem)] max-w-[1540px] items-center gap-12 px-6 py-12 sm:px-10 lg:grid-cols-[1.06fr_.94fr] lg:px-12 lg:py-16">
                
                <!-- Kiri: Narasi (Digeser rada ke kanan dengan ml-4 sm:ml-8 lg:ml-12) -->
                <div class="max-w-3xl ml-4 sm:ml-8 lg:ml-12">
                    <div class="reveal inline-flex items-center gap-3 rounded-full border border-blue-200 bg-white/80 px-5 py-2.5 text-sm font-extrabold uppercase tracking-widest text-[#0055FF] shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#0055FF] animate-pulse"></span> Layanan informasi · Tahun Data 2026
                    </div>
                    <h1 class="reveal reveal-2 mt-8 text-[2.8rem] font-extrabold leading-[1.05] tracking-[-.04em] sm:text-6xl lg:text-7xl xl:text-[5.45rem]">
                        Pendidikan yang <span class="text-[#0055FF]">lebih dekat</span> untuk setiap mimpi.
                    </h1>
                    <p class="reveal reveal-3 mt-8 max-w-2xl text-xl leading-relaxed text-slate-700">
                        SIPINTAR adalah ruang informasi Program Indonesia Pintar untuk membantu siswa, keluarga, dan satuan pendidikan memahami status bantuan pendidikan secara jelas dan mudah.
                    </p>
                    
                    <!-- Card 01 02 03 dengan animasi pop-up bouncy -->
                    <div class="mt-10 grid max-w-2xl grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="glass hover-lift rounded-2xl px-5 py-4 pop-up pop-up-1">
                            <span class="block text-2xl font-extrabold text-[#0055FF]">01</span>
                            <span class="mt-2 block text-base font-bold text-slate-800">Cari penerima</span>
                        </div>
                        <div class="glass hover-lift rounded-2xl px-5 py-4 pop-up pop-up-2">
                            <span class="block text-2xl font-extrabold text-[#0055FF]">02</span>
                            <span class="mt-2 block text-base font-bold text-slate-800">Pantau informasi</span>
                        </div>
                        <div class="glass hover-lift rounded-2xl px-5 py-4 pop-up pop-up-3">
                            <span class="block text-2xl font-extrabold text-[#0055FF]">03</span>
                            <span class="mt-2 block text-base font-bold text-slate-800">Akses pengelola</span>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Form Pencarian -->
<div class="reveal reveal-2 relative mx-auto w-full max-w-2xl lg:max-w-none">
    <div class="glow relative overflow-hidden rounded-[2.5rem] bg-white p-1.5 text-[#071a33] transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
        <div class="relative rounded-[2.2rem] bg-[#f9fcff] p-8 sm:p-10">
            <div class="absolute right-0 top-0 h-40 w-40 rounded-bl-full bg-[#d9edff] opacity-60"></div>
            
            <div class="relative flex items-start justify-between gap-4">
                <div>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">Cari Penerima PIP</h2>
                </div>
                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-[#071a33] text-[#5ee8d6]" aria-hidden="true">
                    <svg viewBox="0 0 24 24" class="h-7 w-7 fill-none stroke-current" stroke-width="2.2"><circle cx="10.8" cy="10.8" r="6.2"/><path d="m15.5 15.5 4.5 4.5"/></svg>
                </span>
            </div>
            
            <p class="relative mt-4 text-lg sm:text-xl leading-relaxed text-slate-600">
                Masukkan NISN dan NIK siswa untuk melihat informasi SK Pemberian dan status penyaluran terkini.
            </p>
            
            <form action="{{ route('public.nisn') }}" method="GET" class="relative mt-8 space-y-6">
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="nisn" class="mb-2 block text-base font-extrabold text-slate-900">NISN Siswa <span class="text-red-600">*</span></label>
                        <input id="nisn" name="nisn" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" autocomplete="off" placeholder="10 digit NISN" required class="min-h-[60px] w-full rounded-xl border-2 border-slate-300 bg-white px-5 text-lg font-bold placeholder:font-medium placeholder:text-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition">
                    </div>
                    <div>
                        <label for="nik" class="mb-2 block text-base font-extrabold text-slate-900">NIK Siswa <span class="font-medium text-slate-500">(opsional)</span></label>
                        <input id="nik" name="nik" inputmode="numeric" pattern="[0-9]{16}" maxlength="16" autocomplete="off" placeholder="16 digit NIK" class="min-h-[60px] w-full rounded-xl border-2 border-slate-300 bg-white px-5 text-lg font-bold placeholder:font-medium placeholder:text-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition">
                    </div>
                </div>
                <button type="submit" class="group inline-flex min-h-[60px] w-full items-center justify-center rounded-xl bg-[#0055FF] px-6 text-lg font-extrabold text-white shadow-xl shadow-blue-600/30 transition-all hover:-translate-y-1 hover:bg-[#0044cc] focus:outline-none focus:ring-4 focus:ring-blue-300">
                    Cari Penerima <span class="ml-3 transition group-hover:translate-x-1" aria-hidden="true">→</span>
                </button>
            </form>
            
            <div class="relative mt-8 flex gap-4 border-t-2 border-slate-100 pt-6">
                <span class="mt-1 text-2xl text-[#0055FF]" aria-hidden="true">ⓘ</span>
                <p class="text-lg leading-relaxed text-slate-600 font-medium">
                    Gunakan data identitas yang sesuai. Bila membutuhkan bantuan, hubungi satuan pendidikan atau Dinas Pendidikan setempat.
                </p>
            </div>
        </div>
    </div>
</div>
</section>
</main>
</section>

    <!-- AREA BAWAH -->
    <div class="relative">
        <div class="absolute inset-0 pattern-dots pointer-events-none z-[-1]"></div>

        <!-- Narasi Program -->
        <section id="program" class="relative overflow-hidden bg-white px-6 py-20 sm:px-10 lg:px-12 lg:py-28 rounded-t-[3rem] -mt-8 shadow-[0_-20px_40px_rgba(0,0,0,0.03)] z-10 border-t border-slate-100">
            <div class="halo-blue-bottom float-delay w-[600px] h-[600px] -left-40 top-0 hidden lg:block opacity-30"></div>

            <div class="relative mx-auto grid max-w-[1540px] gap-12 lg:grid-cols-[.9fr_1.1fr] lg:gap-20">
                <!-- Teks ini dibesarkan dan digeser ke kanan (ml-4 sm:ml-8 lg:ml-12) tapi tetap rata kiri presisi -->
                <div class="scroll-reveal lg:sticky lg:top-40 lg:self-start ml-4 sm:ml-8 lg:ml-12">
                    <p class="mono text-lg font-bold uppercase tracking-widest text-[#0055FF]">Program Indonesia Pintar</p>
                    <h2 class="mt-5 text-5xl font-extrabold leading-[1.1] tracking-tight text-slate-900 sm:text-6xl">
                        Dukungan nyata <br>untuk masa depan.
                    </h2>
                    <p class="mt-6 max-w-xl text-2xl leading-relaxed text-slate-600">
                        PIP hadir agar peserta didik usia sekolah dari keluarga rentan tetap mendapatkan hak layanannya hingga lulus pendidikan menengah.
                    </p>
                </div>
                
                <!-- Cards diperbarui dengan class scroll-reveal yang lebih bouncy -->
                <div class="grid gap-6 sm:grid-cols-2 relative">
                    <article class="hover-lift scroll-reveal rounded-[2rem] bg-gradient-to-br from-[#0055FF] to-[#003db8] p-8 text-white sm:col-span-2 shadow-2xl shadow-blue-500/20">
                        <span class="mono text-base font-bold text-blue-200">01 / SASARAN PENERIMA</span>
                        <h3 class="mt-12 text-3xl font-extrabold tracking-tight sm:text-4xl">Sesuai Kriteria Prioritas.</h3>
                        <p class="mt-4 max-w-2xl text-lg leading-relaxed text-blue-50">
                            Disalurkan tepat sasaran sesuai data terpadu dan kriteria operasional terbaru. Informasi dibuat transparan untuk siswa dan orang tua.
                        </p>
                    </article>
                    <article class="hover-lift scroll-reveal rounded-[2rem] bg-[#e6f0ff] p-8 shadow-lg shadow-slate-200/50">
                        <span class="mono text-base font-bold text-[#0055FF]">02 / TUJUAN</span>
                        <h3 class="mt-10 text-2xl font-extrabold tracking-tight text-slate-900">Mencegah Putus Sekolah.</h3>
                        <p class="mt-4 text-lg leading-relaxed text-slate-700">
                            Memastikan tidak ada kendala biaya personal yang menghambat proses belajar.
                        </p>
                    </article>
                    <article class="hover-lift scroll-reveal rounded-[2rem] border-2 border-blue-100 bg-white p-8 shadow-lg shadow-slate-200/50">
                        <span class="mono text-base font-bold text-[#00E5FF]">03 / MEKANISME</span>
                        <h3 class="mt-10 text-2xl font-extrabold tracking-tight text-slate-900">Kebijakan 2026.</h3>
                        <p class="mt-4 text-lg leading-relaxed text-slate-700">
                            Seluruh status didasarkan pada pembaruan SK Pemberian resmi dari Puslapdik.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <!-- Sisa kodenya (Data Penyaluran & Footer) sama seperti yang kamu buat sebelumnya -->
        <section id="data-pemberian" class="relative bg-[#f8fbff] px-6 py-20 sm:px-10 lg:px-12 lg:py-28 overflow-hidden z-10">
            <div class="absolute inset-0 pattern-grid pointer-events-none"></div>
            <div class="absolute -right-64 top-20 w-96 h-96 bg-[#00E5FF] rounded-full mix-blend-multiply filter blur-[100px] opacity-30 float"></div>
            
            <div class="relative mx-auto max-w-[1540px]">
                <div class="flex flex-col justify-between gap-6 pb-12 md:flex-row md:items-end">
                    <div>
                        <p class="mono text-sm font-bold uppercase tracking-widest text-[#0055FF]">Data Penyaluran PIP</p>
                        <h2 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                            Informasi Publik Terbuka.
                        </h2>
                    </div>
                    <p class="max-w-md text-lg leading-relaxed text-slate-600 font-medium bg-white/70 p-4 rounded-xl backdrop-blur-md border border-white">
                        Transparansi penyaluran SK Pemberian Nasional hingga tingkat wilayah.
                    </p>
                </div>
                
                <div class="grid gap-8 lg:grid-cols-2">
                    <a href="#" class="group relative min-h-[380px] overflow-hidden rounded-[2.5rem] bg-white border-2 border-transparent hover:border-[#0055FF] p-10 transition-all hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-500/20 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-blue-50 to-transparent"></div>
                        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full border-[40px] border-blue-100 transition-transform duration-700 group-hover:scale-110"></div>
                        
                        <div class="relative">
                            <span class="inline-block rounded-xl bg-blue-100 px-4 py-2 mono text-sm font-bold uppercase tracking-widest text-[#0055FF]">01 / Nasional</span>
                            <h3 class="mt-16 text-4xl font-extrabold tracking-tight text-slate-900">Pemberian Nasional</h3>
                            <p class="mt-4 max-w-md text-lg leading-relaxed text-slate-600">
                                Ringkasan jumlah penerima dan nilai dana PIP yang disalurkan di seluruh Indonesia.
                            </p>
                            <span class="mt-10 inline-flex items-center gap-4 text-lg font-extrabold text-[#0055FF]">
                                Lihat Dashboard Nasional <span class="text-2xl transition-transform group-hover:translate-x-2" aria-hidden="true">→</span>
                            </span>
                        </div>
                    </a>

                    <a href="#" class="group relative min-h-[380px] overflow-hidden rounded-[2.5rem] bg-white border-2 border-transparent hover:border-[#00E5FF] p-10 transition-all hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20 focus:outline-none focus:ring-4 focus:ring-cyan-300">
                        <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-cyan-50 to-transparent"></div>
                        <div class="absolute -bottom-20 -right-20 h-80 w-80 rounded-full border-[40px] border-cyan-100 transition-transform duration-700 group-hover:scale-110"></div>
                        
                        <div class="relative">
                            <span class="inline-block rounded-xl bg-cyan-100 px-4 py-2 mono text-sm font-bold uppercase tracking-widest text-cyan-800">02 / Wilayah</span>
                            <h3 class="mt-16 text-4xl font-extrabold tracking-tight text-slate-900">Pemberian per Wilayah</h3>
                            <p class="mt-4 max-w-md text-lg leading-relaxed text-slate-600">
                                Telusuri rincian data pemberian berdasarkan provinsi, kabupaten/kota, hingga satuan pendidikan.
                            </p>
                            <span class="mt-10 inline-flex items-center gap-4 text-lg font-extrabold text-cyan-700">
                                Pilih Wilayah Anda <span class="text-2xl transition-transform group-hover:translate-x-2" aria-hidden="true">→</span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Ruang Kerja Pengelola CTA -->
        <section class="relative bg-white px-6 py-16 sm:px-10 lg:px-12 lg:py-24 z-10 border-t border-slate-100">
            <div class="relative mx-auto grid max-w-[1540px] items-center gap-10 rounded-[3rem] bg-gradient-to-r from-[#0055FF] to-[#00E5FF] px-8 py-16 text-white sm:px-12 lg:grid-cols-[1fr_auto] lg:px-20 lg:py-20 shadow-2xl shadow-blue-500/30 overflow-hidden">
                <div class="absolute -right-20 -top-20 h-96 w-96 rounded-full bg-white opacity-10 blur-3xl"></div>
                <div class="absolute -left-10 -bottom-10 h-64 w-64 rounded-full bg-white opacity-10 blur-2xl"></div>
                
                <div class="relative z-10">
                    <div class="inline-flex items-center gap-3 rounded-full bg-white/20 px-4 py-2 text-sm font-extrabold uppercase tracking-widest backdrop-blur-md">
                        Portal Internal
                    </div>
                    <h2 class="mt-6 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">Ruang Kerja Pengelola.</h2>
                    <p class="mt-6 max-w-2xl text-xl leading-relaxed text-white/90">
                        Akses khusus untuk Sekolah, Dinas Pendidikan, dan Administrator guna mengelola verifikasi, rekap, dan layanan terpadu.
                    </p>
                </div>
                <a href="{{ route('login') }}" class="relative z-10 inline-flex min-h-[72px] items-center justify-center rounded-2xl bg-white px-10 text-xl font-extrabold text-[#0055FF] transition-all hover:bg-slate-50 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-white/50">
                    Masuk ke Portal <span class="ml-3 text-2xl" aria-hidden="true">→</span>
                </a>
            </div>
        </section>

        <!-- Footer Terpadu -->
        <footer class="relative bg-[#f0f7ff] px-6 py-16 text-slate-800 sm:px-10 lg:px-12 overflow-hidden border-t-2 border-blue-100 z-10">
            <div class="absolute inset-0 pattern-grid pointer-events-none opacity-20"></div>
            <div class="absolute bottom-0 right-0 h-full w-1/2 bg-gradient-to-l from-blue-100/60 to-transparent pointer-events-none"></div>

            <div class="relative z-10 mx-auto max-w-[1540px]">
                <div class="grid gap-12 border-b border-blue-200 pb-12 md:grid-cols-3">
                    <div class="flex flex-col gap-6">
                        <div class="flex items-center gap-4">
                            <span class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-xl font-extrabold text-white shadow-lg shadow-blue-500/20">Si</span>
                            <div>
                                <p class="text-2xl font-extrabold text-slate-900">SIPINTAR</p>
                                <p class="text-sm font-bold uppercase tracking-wider text-[#0055FF]">Kemendikdasmen</p>
                            </div>
                        </div>
                        <p class="text-lg font-medium leading-relaxed text-slate-600 max-w-sm">
                            Pusat Layanan Pembiayaan Pendidikan <br>
                            Kementerian Pendidikan Dasar dan Menengah RI
                        </p>
                    </div>
                    
                    <div class="md:px-8">
                        <p class="text-xl font-extrabold text-slate-900">Hubungi Kami</p>
                        <ul class="mt-6 space-y-4 text-lg font-medium text-slate-600">
                            <li class="flex items-center gap-3">
                                <span class="text-[#0055FF] text-2xl">•</span> Hotline 177
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#0055FF] text-2xl">•</span> pengaduan@kemendikdasmen.go.id
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#0055FF] text-2xl">•</span> ult.kemendikdasmen.go.id
                            </li>
                        </ul>
                    </div>
                    
                    <div class="md:text-right">
                        <p class="text-xl font-extrabold text-slate-900">Informasi Sistem</p>
                        <div class="mt-6 space-y-3 text-lg font-medium text-slate-600 md:ml-auto">
                            <p>Versi Rilis 2026.1</p>
                            <p>Kebijakan Privasi & Syarat Ketentuan</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 flex flex-col items-center justify-between gap-4 sm:flex-row">
                    <p class="text-base font-bold text-slate-500">
                        © 2026 Hak Cipta Dilindungi. PIP - Puslapdik.
                    </p>
                    <div class="flex gap-4">
                        <div class="h-10 w-10 rounded-full bg-white grid place-items-center text-[#0055FF] shadow-sm border border-blue-100 font-bold hover:scale-110 transition-transform cursor-pointer">IG</div>
                        <div class="h-10 w-10 rounded-full bg-white grid place-items-center text-[#0055FF] shadow-sm border border-blue-100 font-bold hover:scale-110 transition-transform cursor-pointer">YT</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <script>
        const observer = new IntersectionObserver((entries) => entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('is-visible'), index * 100);
                observer.unobserve(entry.target);
            }
        }), { threshold: 0.15, rootMargin: "0px 0px -50px 0px" });
        
        document.querySelectorAll('.scroll-reveal').forEach((element) => observer.observe(element));
    </script>
</body>
</html>