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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
    
    /* Background Utama Seluruh Halaman */
    .hero-wrapper { 
        background-color: var(--paper, #f8fafc); 
        background-image: linear-gradient(#0055ff12 1px, transparent 1px), linear-gradient(90deg, #0055ff12 1px, transparent 1px);
        background-size: 48px 48px;
    }

    /* Cincin Halo Melayang (Sisi Kiri) */
    .halo { 
        position: absolute; 
        z-index: 1; 
        width: 28rem; 
        height: 28rem; 
        border-radius: 999px; 
        border: 1px solid #1479ff25; 
        box-shadow: 0 0 0 38px #1479ff0b, 0 0 0 88px #1479ff08; 
    }

    /* Cincin Halo Kanan */
    .halo-right {
        position: absolute;
        z-index: 1;
        top: -2rem;
        right: -24rem;
        width: 68rem;
        height: 60rem;
        border-radius: 9999px;
        border: 2px solid rgba(0, 85, 255, 0.16);
        box-shadow: 0 0 0 50px rgba(0, 85, 255, 0.04), 0 0 0 120px rgba(0, 85, 255, 0.015);
        pointer-events: none;
    }

    /* Animasi Putar Halus & Lambat */
    @keyframes spinSlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
        animation: spinSlow 50s linear infinite;
    }
    
    /* Animations & Cards */
    .float { animation: float 8s ease-in-out infinite; }
    .reveal { animation: reveal 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; }
    .reveal-2 { animation-delay: 0.15s; } 
    .reveal-3 { animation-delay: 0.3s; }
    .glow { box-shadow: 0 20px 50px -12px rgba(0,0,0,0.08), 0 0 0 1px rgba(255,255,255,0.6) inset; }
    .glass { background: linear-gradient(140deg, rgba(255,255,255,0.92), rgba(255,255,255,0.78)); border: 1px solid rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); }
    
    .hover-lift { transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease; }
    .hover-lift:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 24px 48px -12px rgba(0,85,255,0.2); }
    
    @keyframes slideDown { from { transform: translateY(-100%); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    .header-animate { animation: slideDown 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

    @keyframes popUp {
        0% { transform: scale(0.8) translateY(40px); opacity: 0; }
        100% { transform: scale(1) translateY(0); opacity: 1; }
    }
    .pop-up { animation: popUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) both; }
    .pop-up-1 { animation-delay: 0.4s; }
    .pop-up-2 { animation-delay: 0.55s; }
    .pop-up-3 { animation-delay: 0.7s; }

    @keyframes float { 50% { transform: translateY(-16px) rotate(1deg); } }
    @keyframes reveal { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: none; } }

    /* Scrollbar Modal */
    .custom-scrollbar::-webkit-scrollbar { height: 8px; width: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>
</head>
<body class="flex flex-col min-h-screen">
    <a class="skip-link" href="#konten-utama">Lewati ke konten utama</a>

    <!-- HEADER STICKY -->
    <header class="fixed top-0 left-0 w-full z-40 border-b border-blue-900/10 bg-white/80 backdrop-blur-md header-animate shadow-sm transition-all">
        <div class="mx-auto grid h-24 max-w-[1540px] grid-cols-[1fr_auto_1fr] items-center gap-4 px-6 sm:px-10 lg:px-12">
            <a href="{{ route('public.home') }}" class="flex items-center gap-4 justify-self-start rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-300">
                <img src="https://pip.kemendikdasmen.go.id/img/logo-sipintar.png" alt="Logo SIPINTAR" class="h-14 w-auto object-contain">
                <span>
                    <span class="block text-xl font-extrabold tracking-tight">SIPINTAR</span>
                    <span class="block text-sm font-bold uppercase tracking-wider text-slate-600">Program Indonesia Pintar</span>
                </span>
            </a>

            <nav class="hidden items-center justify-self-center gap-8 xl:flex" aria-label="Navigasi utama">
                <a href="#pencarian" class="text-lg font-bold text-slate-700 transition hover:text-[#0055FF]">Cari Penerima</a>
                <a href="#program" class="text-lg font-bold text-slate-700 transition hover:text-[#0055FF]">Tentang PIP</a>
                <a href="#data-pemberian" class="text-lg font-bold text-slate-700 transition hover:text-[#0055FF]">Data Penyaluran</a>
            </nav>

            <div class="justify-self-end flex items-center gap-2">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex min-h-[46px] items-center rounded-xl bg-[#071a33] px-4 text-base font-bold text-white transition hover:bg-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-md">
                        Dashboard <span class="ml-2">→</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="inline-flex min-h-[46px] items-center rounded-xl bg-red-600 px-4 text-base font-bold text-white transition hover:bg-red-700 shadow-md">
                            Keluar
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="inline-flex min-h-[46px] items-center rounded-xl bg-[#071a33] px-4 text-base font-bold text-white transition hover:bg-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-md">
                        Masuk Pengelola <span class="ml-2">↗</span>
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <!-- WRAPPER BACKGROUND UTAMA -->
    <div class="hero-wrapper relative overflow-hidden text-[#071a33] pt-24 flex-1">
        
        <!-- Cincin Raksasa Kanan -->
        <div class="halo-right animate-spin-slow pointer-events-none hidden lg:block"></div>

        <main id="konten-utama" class="relative z-10 block">

            <!-- SECTION 1: HERO & PENCARIAN -->
            <section id="pencarian" class="relative overflow-hidden mx-auto grid min-h-[calc(100vh-6rem)] max-w-[1540px] items-center gap-12 px-6 py-12 sm:px-10 lg:grid-cols-[1.06fr_.94fr] lg:px-12 lg:py-16">
                
                <div class="halo float pointer-events-none -left-36 top-24 hidden lg:block"></div>

                <!-- Konten Kiri Hero -->
                <div class="relative z-10 max-w-3xl ml-4 sm:ml-8 lg:ml-12">
                    <div class="reveal inline-flex items-center gap-3 rounded-full border border-blue-200 bg-white/80 px-5 py-2.5 text-sm font-extrabold uppercase tracking-widest text-[#0055FF] shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#0055FF] animate-pulse"></span> Layanan informasi · Tahun Data 2026
                    </div>
                    <h1 class="reveal reveal-2 mt-8 text-[2.8rem] font-extrabold leading-[1.05] tracking-[-.04em] sm:text-6xl lg:text-7xl xl:text-[5.45rem]">
                        Pendidikan yang <span class="text-[#0055FF]">lebih dekat</span> untuk setiap mimpi.
                    </h1>
                    <p class="reveal reveal-3 mt-8 max-w-2xl text-2xl leading-relaxed text-slate-700">
                        SIPINTAR adalah ruang informasi Program Indonesia Pintar untuk membantu siswa, keluarga, dan satuan pendidikan memahami status bantuan pendidikan secara jelas dan mudah.
                    </p>
                    
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

                <!-- Form Pencarian Kanan Hero -->
                <div class="reveal reveal-2 relative z-10 mx-auto w-full max-w-2xl lg:max-w-none">
                    <div class="glow relative overflow-hidden rounded-[2.5rem] bg-white p-1.5 text-[#071a33] transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <div class="relative rounded-[2.2rem] bg-[#f9fcff] p-8 sm:p-10">
                            <div class="absolute right-0 top-0 h-40 w-40 rounded-bl-full bg-[#d9edff] opacity-60"></div>
                            
                            <div class="relative flex items-start justify-between gap-4">
                                <div>
                                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">Cari Penerima PIP</h2>
                                </div>
                                <span class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-[#071a33] text-[#5ee8d6]">
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
                                        <input id="nisn" name="nisn" inputmode="numeric" maxlength="10" autocomplete="off" placeholder="10 digit NISN" required class="min-h-[60px] w-full rounded-xl border-2 border-slate-300 bg-white px-5 text-lg font-bold focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition">
                                    </div>
                                    <div>
                                        <label for="nik" class="mb-2 block text-base font-extrabold text-slate-900">NIK Siswa <span class="font-medium text-slate-500">(opsional)</span></label>
                                        <input id="nik" name="nik" inputmode="numeric" maxlength="16" autocomplete="off" placeholder="16 digit NIK" class="min-h-[60px] w-full rounded-xl border-2 border-slate-300 bg-white px-5 text-lg font-bold focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition">
                                    </div>
                                </div>
                                <button type="submit" class="group inline-flex min-h-[60px] w-full items-center justify-center rounded-xl bg-[#0055FF] px-6 text-lg font-extrabold text-white shadow-xl shadow-blue-600/30 transition-all hover:-translate-y-1 hover:bg-[#0044cc]">
                                    Cari Penerima <span class="ml-3 transition group-hover:translate-x-1">→</span>
                                </button>
                            </form>
                            
                            <div class="relative mt-8 flex gap-4 border-t-2 border-slate-100 pt-6">
                                <span class="mt-1 text-2xl text-[#0055FF]">ⓘ</span>
                                <p class="text-lg leading-relaxed text-slate-600 font-medium">
                                    Gunakan data identitas yang sesuai. Bila membutuhkan bantuan, hubungi satuan pendidikan atau Dinas Pendidikan setempat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 2: TENTANG PIP -->
            <section id="program" class="relative z-10 mx-auto max-w-[1540px] px-6 py-16 sm:px-10 lg:px-12 lg:py-24 text-center">
                <div class="mx-auto max-w-7xl relative">
                    <h2 class="mt-8 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                        Apa itu <span class="text-[#0055FF]">Program Indonesia Pintar?</span>
                    </h2>

                    <p class="mx-auto mt-6 max-w-4xl text-xl sm:text-2xl leading-relaxed text-slate-700 font-medium">
                        Program Indonesia Pintar (PIP) adalah bantuan berupa uang tunai, perluasan akses, dan kesempatan belajar dari pemerintah yang diberikan kepada peserta didik dan mahasiswa yang berasal dari keluarga miskin atau rentan miskin untuk membiayai pendidikan.
                    </p>

                    <div class="mt-14 grid gap-8 sm:grid-cols-3">
                        <div class="hover-lift rounded-3xl bg-white/80 border border-slate-200/80 p-8 text-left shadow-sm">
                            <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-100 text-[#0055FF] text-2xl font-bold mb-6">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <h3 class="text-2xl font-extrabold text-slate-900">Mencegah Putus Sekolah</h3>
                            <p class="mt-3 text-lg text-slate-600 font-medium leading-relaxed">
                                Membantu anak usia sekolah agar tetap mendapatkan layanan pendidikan hingga tamat jenjang menengah.
                            </p>
                        </div>

                        <div class="hover-lift rounded-3xl bg-white/80 border border-slate-200/80 p-8 text-left shadow-sm">
                            <div class="grid h-14 w-14 place-items-center rounded-2xl bg-teal-100 text-teal-700 text-2xl font-bold mb-6">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                            </div>
                            <h3 class="text-2xl font-extrabold text-slate-900">Ringankan Biaya Personal</h3>
                            <p class="mt-3 text-lg text-slate-600 font-medium leading-relaxed">
                                Membantu meringankan beban biaya personal pendidikan seperti perlengkapan sekolah, transportasi, dan uang saku.
                            </p>
                        </div>

                        <div class="hover-lift rounded-3xl bg-white/80 border border-slate-200/80 p-8 text-left shadow-sm">
                            <div class="grid h-14 w-14 place-items-center rounded-2xl bg-indigo-100 text-indigo-700 text-2xl font-bold mb-6">
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                            <h3 class="text-2xl font-extrabold text-slate-900">Tepat Sasaran</h3>
                            <p class="mt-3 text-lg text-slate-600 font-medium leading-relaxed">
                                Menjangkau pemegang KIP serta siswa terpilih berdasarkan usulan sekolah dan pemangku kepentingan.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 3: DATA PENYALURAN -->
            <section id="data-pemberian" class="relative z-10 px-6 py-16 sm:px-10 lg:px-12 lg:py-24 border-t border-blue-100/60">
                <div class="relative mx-auto max-w-[1540px]">
                    <div class="flex flex-col justify-between gap-6 pb-12 md:flex-row md:items-end">
                        <div>
                            <p class="mono text-xl font-bold uppercase tracking-widest text-[#0055FF]">Data Penyaluran PIP</p>
                            <h2 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                                Informasi Publik Terbuka.
                            </h2>
                        </div>
                        <p class="max-w-md text-2xl leading-relaxed text-slate-600 font-medium bg-white/70 p-4 rounded-2xl backdrop-blur-md border border-white/80">
                            Transparansi penyaluran SK Pemberian Nasional hingga tingkat wilayah.
                        </p>
                    </div>
                    
                    <div class="grid gap-8 lg:grid-cols-2">
                        <!-- CARD 1: NASIONAL -->
                        <button type="button" onclick="openModal('modalNasional')" class="text-left group relative min-h-[380px] overflow-hidden rounded-[3rem] bg-white border-2 border-transparent hover:border-[#0055FF] p-10 transition-all hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-500/20 focus:outline-none focus:ring-4 focus:ring-blue-300 w-full">
                            <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-blue-50 to-transparent"></div>
                            <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full border-[40px] border-blue-100 transition-transform duration-700 group-hover:scale-110"></div>
                            
                            <div class="relative">
                                <span class="inline-block rounded-xl bg-blue-100 px-4 py-2 mono text-lg font-bold uppercase tracking-widest text-[#0055FF]">01 / Nasional</span>
                                <h3 class="mt-16 text-4xl font-extrabold tracking-tight text-slate-900">Penerima Nasional</h3>
                                <p class="mt-4 max-w-md text-2xl leading-relaxed text-slate-600">
                                    Ringkasan jumlah penerima dan nilai dana PIP yang disalurkan di seluruh Indonesia.
                                </p>
                                <span class="mt-10 inline-flex items-center gap-4 text-2xl font-extrabold text-[#0055FF]">
                                    Lihat Dashboard Nasional <span class="text-2xl transition-transform group-hover:translate-x-2">→</span>
                                </span>
                            </div>
                        </button>

                        <!-- CARD 2: WILAYAH -->
                        <button type="button" onclick="openModal('modalWilayah')" class="text-left group relative min-h-[380px] overflow-hidden rounded-[3rem] bg-white border-2 border-transparent hover:border-[#00E5FF] p-10 transition-all hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/20 focus:outline-none focus:ring-4 focus:ring-cyan-300 w-full">
                            <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-cyan-50 to-transparent"></div>
                            <div class="absolute -bottom-20 -right-20 h-80 w-80 rounded-full border-[40px] border-cyan-100 transition-transform duration-700 group-hover:scale-110"></div>
                            
                            <div class="relative">
                                <span class="inline-block rounded-xl bg-cyan-100 px-4 py-2 mono text-lg font-bold uppercase tracking-widest text-cyan-800">02 / Wilayah</span>
                                <h3 class="mt-16 text-4xl font-extrabold tracking-tight text-slate-900">Penerima per Wilayah</h3>
                                <p class="mt-4 max-w-md text-2xl leading-relaxed text-slate-600">
                                    Telusuri rincian data pemberian berdasarkan provinsi, kabupaten/kota, hingga satuan pendidikan.
                                </p>
                                <span class="mt-10 inline-flex items-center gap-4 text-2xl font-extrabold text-cyan-700">
                                    Pilih Wilayah Anda <span class="text-2xl transition-transform group-hover:translate-x-2">→</span>
                                </span>
                            </div>
                        </button>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <!-- FOOTER -->
    <footer class="relative bg-white/50 backdrop-blur-md px-6 py-16 text-slate-800 sm:px-10 lg:px-12 border-t border-blue-100">
        <div class="relative z-10 mx-auto max-w-[1540px]">
            <div class="grid gap-12 border-b border-blue-200/60 pb-12 md:grid-cols-3">
                <div class="flex flex-col gap-6">
                    <div class="flex items-center gap-4">
                        <img src="https://pip.kemendikdasmen.go.id/img/logo-sipintar.png" alt="Logo SIPINTAR" class="h-14 w-auto object-contain">
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
                        <li class="flex items-center gap-3"><span class="text-[#0055FF] text-2xl">•</span> Hotline 177</li>
                        <li class="flex items-center gap-3"><span class="text-[#0055FF] text-2xl">•</span> pengaduan@kemendikdasmen.go.id</li>
                        <li class="flex items-center gap-3"><span class="text-[#0055FF] text-2xl">•</span> ult.kemendikdasmen.go.id</li>
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
        </div>
    </footer>

    <!-- MODAL 1: PENERIMA NASIONAL -->
    <div id="modalNasional" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm p-4 sm:p-6 lg:p-10">
        <div class="relative w-full max-w-7xl mx-auto bg-[#f0f7ff] rounded-3xl shadow-2xl overflow-hidden border border-slate-200 my-8">
            <div class="p-6 bg-white border-b border-slate-200 flex items-center justify-between sticky top-0 z-30">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-black text-xl">
                        <i class="fa-solid fa-chart-column"></i>
                    </div>
                    <div>
                        <h2 class="font-black text-slate-900 text-lg">Penyaluran PIP Nasional</h2>
                        <p class="text-xs font-bold text-blue-600 uppercase">SIPINTAR Portal Data</p>
                    </div>
                </div>
                <button onclick="closeModal('modalNasional')" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-lg flex items-center justify-center transition">
                    ✕
                </button>
            </div>

            <div class="p-6 space-y-6 max-h-[80vh] overflow-y-auto custom-scrollbar">
                <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-extrabold text-lg">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-emerald-950">Data Pencairan Terkini</h3>
                            <p class="text-xs font-bold text-emerald-700">Update batas pencairan masing-masing jenjang</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl">SD: <span class="text-rose-600">2026-07-15</span></span>
                        <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl">SMP: <span class="text-rose-600">2026-07-15</span></span>
                        <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl">SMA: <span class="text-rose-600">2026-06-30</span></span>
                        <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl">SMK: <span class="text-rose-600">2026-06-30</span></span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg"><i class="fa-solid fa-filter"></i></div>
                            <div>
                                <h2 class="text-xl font-black text-slate-900">Filter Penyaluran</h2>
                                <p class="text-xs font-semibold text-slate-500">Pilih Tahun, Provinsi, Kabupaten, atau Kecamatan</p>
                            </div>
                        </div>
                        <button onclick="resetFilter()" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1.5"><i class="fa-solid fa-rotate-right"></i> Reset Filter</button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 items-end">
                        <div class="space-y-1.5">
                            <label class="text-xs font-extrabold text-slate-500 uppercase block">Tahun</label>
                            <select id="filterTahun" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-bold text-slate-800">
                                <option value="2026" selected>2026</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-extrabold text-slate-500 uppercase block">Provinsi</label>
                            <select id="filterProvinsi" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-bold text-slate-800">
                                <option value="Semua" selected>(Semua Provinsi)</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-extrabold text-slate-500 uppercase block">Kabupaten</label>
                            <select id="filterKabupaten" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-bold text-slate-800">
                                <option value="Semua" selected>(Semua Kabupaten/Kota)</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-extrabold text-slate-500 uppercase block">Kecamatan</label>
                            <div class="flex gap-2">
                                <select id="filterKecamatan" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-bold text-slate-800">
                                    <option value="Semua" selected>(Semua Kecamatan)</option>
                                </select>
                                <button onclick="applyNationalFilter()" class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-xl text-sm transition shadow-md shadow-blue-600/20">Tampil</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg"><i class="fa-solid fa-user-graduate"></i></div>
                            <h2 class="text-xl font-black text-slate-900">Rekapitulasi Siswa Penerima</h2>
                        </div>
                        <span class="text-xs font-extrabold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1.5 rounded-xl" id="badgeTahunSiswa">Tahun 2026</span>
                    </div>

                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[700px]">
                            <thead>
                                <tr class="bg-slate-100 text-slate-600 font-extrabold text-xs uppercase tracking-wider">
                                    <th class="p-4 rounded-l-xl">Jenjang</th>
                                    <th class="p-4 text-right">Alokasi Dana (Rp)</th>
                                    <th class="p-4 text-right">Dana Disalurkan (Rp)</th>
                                    <th class="p-4 text-right rounded-r-xl">% Serapan</th>
                                </tr>
                            </thead>
                            <tbody id="tabelSiswaBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800"></tbody>
                        </table>
                    </div>

                    <hr class="border-slate-100 my-6">

                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-lg"><i class="fa-solid fa-money-bill-wave"></i></div>
                            <h2 class="text-xl font-black text-slate-900">Rekapitulasi Dana (Rupiah)</h2>
                        </div>
                        <span class="text-xs font-extrabold text-emerald-600 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-xl" id="badgeTahunDana">Tahun 2026</span>
                    </div>

                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[700px]">
                            <thead>
                                <tr class="bg-slate-100 text-slate-600 font-extrabold text-xs uppercase tracking-wider">
                                    <th class="p-4 rounded-l-xl">Jenjang</th>
                                    <th class="p-4 text-right">Alokasi Dana (Rp)</th>
                                    <th class="p-4 text-right rounded-r-xl">Dana Disalurkan (Rp)</th>
                                </tr>
                            </thead>
                            <tbody id="tabelDanaBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2: PENERIMA PER WILAYAH -->
    <div id="modalWilayah" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm p-4 sm:p-6 lg:p-10">
        <div class="relative w-full max-w-7xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-200 my-8">
            <div class="p-6 bg-slate-50 border-b border-slate-200 flex items-center justify-between sticky top-0 z-30">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-black text-xl">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-lg">Penyaluran Per Wilayah</h2>
                        <p class="text-xs font-medium text-slate-500">Rincian Wilayah Seluruh Provinsi</p>
                    </div>
                </div>
                <button onclick="closeModal('modalWilayah')" class="w-10 h-10 rounded-full bg-white hover:bg-slate-200 text-slate-600 font-bold text-lg flex items-center justify-center border transition">
                    ✕
                </button>
            </div>

            <div class="p-6 space-y-6 max-h-[80vh] overflow-y-auto custom-scrollbar">
                <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-5 shadow-sm">
                    <div class="flex flex-col lg:flex-row justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-slate-900">Filter Data Wilayah</h2>
                            <p class="text-sm text-slate-500">Filter menggunakan data wilayah yang sama dengan Dashboard Nasional.</p>
                        </div>
                        <span id="badgeWilayahAktif" class="self-start bg-indigo-50 border border-indigo-200 text-indigo-700 text-xs font-extrabold px-3 py-2 rounded-xl">Seluruh Indonesia</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div><label class="text-xs font-extrabold text-slate-500 uppercase block mb-1.5">Tahun</label>
                            <select id="filterTahunWilayah" class="w-full bg-slate-50 border border-slate-300 text-slate-800 text-sm font-bold rounded-xl px-4 py-3"><option value="2026" selected>2026</option></select>
                        </div>
                        <div><label class="text-xs font-extrabold text-slate-500 uppercase block mb-1.5">Provinsi</label>
                            <select id="filterProvinsiWilayah" class="w-full bg-slate-50 border border-slate-300 text-slate-800 text-sm font-bold rounded-xl px-4 py-3"><option value="Semua" selected>(Semua Provinsi)</option></select>
                        </div>
                        <div><label class="text-xs font-extrabold text-slate-500 uppercase block mb-1.5">Kabupaten/Kota</label>
                            <select id="filterKabupatenWilayah" class="w-full bg-slate-50 border border-slate-300 text-slate-800 text-sm font-bold rounded-xl px-4 py-3"><option value="Semua" selected>(Semua Kabupaten/Kota)</option></select>
                        </div>
                        <div><label class="text-xs font-extrabold text-slate-500 uppercase block mb-1.5">Kecamatan</label>
                            <select id="filterKecamatanWilayah" class="w-full bg-slate-50 border border-slate-300 text-slate-800 text-sm font-bold rounded-xl px-4 py-3"><option value="Semua" selected>(Semua Kecamatan)</option></select>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button onclick="resetWilayahFilter()" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                        <button onclick="applyWilayahFilter()" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition shadow-md"><i class="fa-solid fa-filter"></i> Tampilkan</button>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-6 border-b border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900">Data Penyaluran Per Wilayah</h3>
                        <p class="text-sm text-slate-500">Rincian alokasi dana, dana disalurkan, dan persentase serapan berdasarkan jenjang.</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[760px]">
                            <thead><tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs uppercase font-bold tracking-wider">
                                <th class="py-3.5 px-6">Jenjang</th><th class="py-3.5 px-6">Wilayah</th><th class="py-3.5 px-6 text-right">Alokasi Dana (Rp)</th><th class="py-3.5 px-6 text-right">Dana Disalurkan (Rp)</th><th class="py-3.5 px-6 text-right">% Serapan</th>
                            </tr></thead>
                            <tbody id="tableWilayahBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800"></tbody>
                        </table>
                    </div>
                </div>                </div>
            </div>
        </div>
    </div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Data sumber: sheet NASIONAL_LP pada workbook yang diberikan.
    const databaseLP = {"2026":{"nasional":[{"jenjang":"SD","alokasi":624600000,"danaDisalurkan":312300000,"serapan":98.92063492063491},{"jenjang":"SMA","alokasi":2424600000,"danaDisalurkan":1229400000,"serapan":97.30555555555553},{"jenjang":"SMK","alokasi":1436400000,"danaDisalurkan":741600000,"serapan":58.85714285714287},{"jenjang":"SMP","alokasi":1146750000,"danaDisalurkan":574500000,"serapan":106.20985958485966}],"totalNasional":{"jenjang":"Grand Total","alokasi":5632350000,"danaDisalurkan":2857800000,"serapan":361.293192918193},"wilayah":[{"jenjang":"SD","level":"provinsi","provinsi":"Aceh","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":8100000,"serapan":2.571428571428571},{"jenjang":"SD","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":"Ingin Jaya","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":null,"alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":"Baiturrahman","alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"provinsi","provinsi":"Bali","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":10800000,"serapan":3.428571428571429},{"jenjang":"SD","level":"kabupaten","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":null,"alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.8571428571428572},{"jenjang":"SD","level":"kecamatan","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":"Kuta Utara","alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.8571428571428572},{"jenjang":"SD","level":"kabupaten","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":"Denpasar Barat","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"provinsi","provinsi":"Banten","kabupaten":null,"kecamatan":null,"alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kabupaten","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":"Ciruas","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"provinsi","provinsi":"DI Yogyakarta","kabupaten":null,"kecamatan":null,"alokasi":28350000,"danaDisalurkan":13500000,"serapan":4.285714285714286},{"jenjang":"SD","level":"kabupaten","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":null,"alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":"Mlati","alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kabupaten","provinsi":"DI Yogyakarta","kabupaten":"Kota Yogyakarta","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.142857142857143},{"jenjang":"SD","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kota Yogyakarta","kecamatan":"Gondokusuman","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kota Yogyakarta","kecamatan":"Umbulharjo","alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"provinsi","provinsi":"DKI Jakarta","kabupaten":null,"kecamatan":null,"alokasi":28350000,"danaDisalurkan":12600000,"serapan":3.9999999999999996},{"jenjang":"SD","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":"Cilandak","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":null,"alokasi":18900000,"danaDisalurkan":8550000,"serapan":2.714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":"Cakung","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":"Duren Sawit","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"provinsi","provinsi":"Jawa Barat","kabupaten":null,"kecamatan":null,"alokasi":237150000,"danaDisalurkan":120600000,"serapan":38.06349206349206},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":null,"alokasi":189900000,"danaDisalurkan":97200000,"serapan":30.63492063492063},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Arjasari","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Baleendah","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Banjaran","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Bojongsoang","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Cicalengka","alokasi":10350000,"danaDisalurkan":6750000,"serapan":1.9206349206349205},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Cileunyi","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Cimenyan","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Ciparay","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Ciwidey","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Dayeuhkolot","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Katapang","alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.857142857142857},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Kutawaringin","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Majalaya","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Margahayu","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pacet","alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pangalengan","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pasirjambu","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Rancaekek","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Solokanjeruk","alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.857142857142857},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Soreang","alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9450000,"serapan":3},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":"Cibinong","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":"Citeureup","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Garut","kecamatan":null,"alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Garut","kecamatan":"Cikajang","alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":null,"alokasi":18900000,"danaDisalurkan":10350000,"serapan":3.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Coblong","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Kiaracondong","alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.857142857142857},{"jenjang":"SD","level":"provinsi","provinsi":"Jawa Tengah","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":18900000,"serapan":6},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Tengah","kabupaten":"Kabupaten Banyumas","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9000000,"serapan":2.8571428571428568},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kabupaten Banyumas","kecamatan":"Purwokerto Timur","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kabupaten Banyumas","kecamatan":"Sokaraja","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.1428571428571423},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":"Banyumanik","alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":"Tembalang","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"provinsi","provinsi":"Jawa Timur","kabupaten":null,"kecamatan":null,"alokasi":28350000,"danaDisalurkan":13050000,"serapan":4.142857142857142},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Timur","kabupaten":"Kabupaten Malang","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9450000,"serapan":3},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kabupaten Malang","kecamatan":"Kepanjen","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kabupaten Malang","kecamatan":"Singosari","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kabupaten","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":null,"alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":"Sukolilo","alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"provinsi","provinsi":"Kalimantan Barat","kabupaten":null,"kecamatan":null,"alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.857142857142857},{"jenjang":"SD","level":"kabupaten","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":null,"alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.857142857142857},{"jenjang":"SD","level":"kecamatan","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":"Pontianak Kota","alokasi":9450000,"danaDisalurkan":5850000,"serapan":1.857142857142857},{"jenjang":"SD","level":"provinsi","provinsi":"Kalimantan Selatan","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":9450000,"serapan":3},{"jenjang":"SD","level":"kabupaten","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9450000,"serapan":3},{"jenjang":"SD","level":"kecamatan","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":"Astambul","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":"Martapura","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"provinsi","provinsi":"Kalimantan Timur","kabupaten":null,"kecamatan":null,"alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kabupaten","provinsi":"Kalimantan Timur","kabupaten":"Kota Samarinda","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"Kalimantan Timur","kabupaten":"Kota Samarinda","kecamatan":"Sungai Kunjang","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"provinsi","provinsi":"Lampung","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.142857142857143},{"jenjang":"SD","level":"kabupaten","provinsi":"Lampung","kabupaten":"Kota Bandar Lampung","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.142857142857143},{"jenjang":"SD","level":"kecamatan","provinsi":"Lampung","kabupaten":"Kota Bandar Lampung","kecamatan":"Kedaton","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Lampung","kabupaten":"Kota Bandar Lampung","kecamatan":"Tanjung Karang Pusat","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"provinsi","provinsi":"Maluku","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":8100000,"serapan":2.571428571428571},{"jenjang":"SD","level":"kabupaten","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":null,"alokasi":18900000,"danaDisalurkan":8100000,"serapan":2.571428571428571},{"jenjang":"SD","level":"kecamatan","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":"Nusaniwe","alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kecamatan","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":"Sirimau","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"provinsi","provinsi":"Nusa Tenggara Barat","kabupaten":null,"kecamatan":null,"alokasi":9450000,"danaDisalurkan":6300000,"serapan":2},{"jenjang":"SD","level":"kabupaten","provinsi":"Nusa Tenggara Barat","kabupaten":"Kota Mataram","kecamatan":null,"alokasi":9450000,"danaDisalurkan":6300000,"serapan":2},{"jenjang":"SD","level":"kecamatan","provinsi":"Nusa Tenggara Barat","kabupaten":"Kota Mataram","kecamatan":"Selaparang","alokasi":9450000,"danaDisalurkan":6300000,"serapan":2},{"jenjang":"SD","level":"provinsi","provinsi":"Nusa Tenggara Timur","kabupaten":null,"kecamatan":null,"alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"kabupaten","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":null,"alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"kecamatan","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":"Kelapa Lima","alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"provinsi","provinsi":"Papua","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.142857142857143},{"jenjang":"SD","level":"kabupaten","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.142857142857143},{"jenjang":"SD","level":"kecamatan","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":"Abepura","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":"Jayapura Utara","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"provinsi","provinsi":"Riau","kabupaten":null,"kecamatan":null,"alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kabupaten","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"kecamatan","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":"Sukajadi","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714284},{"jenjang":"SD","level":"provinsi","provinsi":"Sulawesi Selatan","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.142857142857143},{"jenjang":"SD","level":"kabupaten","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":"Pallangga","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kabupaten","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":"Rappocini","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"provinsi","provinsi":"Sulawesi Utara","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":8550000,"serapan":2.7142857142857144},{"jenjang":"SD","level":"kabupaten","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":null,"alokasi":18900000,"danaDisalurkan":8550000,"serapan":2.7142857142857144},{"jenjang":"SD","level":"kecamatan","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":"Malalayang","alokasi":9450000,"danaDisalurkan":3600000,"serapan":1.1428571428571428},{"jenjang":"SD","level":"kecamatan","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":"Wanea","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"provinsi","provinsi":"Sumatera Barat","kabupaten":null,"kecamatan":null,"alokasi":28350000,"danaDisalurkan":13950000,"serapan":4.428571428571429},{"jenjang":"SD","level":"kabupaten","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":"Tilatang Kamang","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kabupaten","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":null,"alokasi":18900000,"danaDisalurkan":9450000,"serapan":3},{"jenjang":"SD","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":"Koto Tangah","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":"Padang Barat","alokasi":9450000,"danaDisalurkan":4950000,"serapan":1.5714285714285714},{"jenjang":"SD","level":"provinsi","provinsi":"Sumatera Selatan","kabupaten":null,"kecamatan":null,"alokasi":18900000,"danaDisalurkan":9900000,"serapan":3.142857142857143},{"jenjang":"SD","level":"kabupaten","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":"Tanjung Batu","alokasi":9450000,"danaDisalurkan":4500000,"serapan":1.4285714285714286},{"jenjang":"SD","level":"kabupaten","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":null,"alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":"Ilir Timur I","alokasi":9450000,"danaDisalurkan":5400000,"serapan":1.7142857142857142},{"jenjang":"SD","level":"provinsi","provinsi":"Sumatera Utara","kabupaten":null,"kecamatan":null,"alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kabupaten","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":null,"alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SD","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":"Medan Johor","alokasi":9450000,"danaDisalurkan":4050000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"provinsi","provinsi":"Aceh","kabupaten":null,"kecamatan":null,"alokasi":189000000,"danaDisalurkan":91800000,"serapan":7.285714285714286},{"jenjang":"SMA","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":null,"alokasi":75600000,"danaDisalurkan":36000000,"serapan":2.8571428571428568},{"jenjang":"SMA","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":"Darul Imarah","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":"Ingin Jaya","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":null,"alokasi":113400000,"danaDisalurkan":55800000,"serapan":4.428571428571429},{"jenjang":"SMA","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":"Baiturrahman","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":"Kuta Alam","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":"Syiah Kuala","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Bali","kabupaten":null,"kecamatan":null,"alokasi":113400000,"danaDisalurkan":54000000,"serapan":4.285714285714286},{"jenjang":"SMA","level":"kabupaten","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":null,"alokasi":37800000,"danaDisalurkan":14400000,"serapan":1.1428571428571428},{"jenjang":"SMA","level":"kecamatan","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":"Kuta Utara","alokasi":37800000,"danaDisalurkan":14400000,"serapan":1.1428571428571428},{"jenjang":"SMA","level":"kabupaten","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":null,"alokasi":75600000,"danaDisalurkan":39600000,"serapan":3.142857142857143},{"jenjang":"SMA","level":"kecamatan","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":"Denpasar Barat","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":"Denpasar Selatan","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Banten","kabupaten":null,"kecamatan":null,"alokasi":151200000,"danaDisalurkan":75600000,"serapan":6},{"jenjang":"SMA","level":"kabupaten","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":null,"alokasi":75600000,"danaDisalurkan":39600000,"serapan":3.142857142857143},{"jenjang":"SMA","level":"kecamatan","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":"Ciruas","alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.8571428571428572},{"jenjang":"SMA","level":"kecamatan","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":"Kramatwatu","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kabupaten","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":null,"alokasi":75600000,"danaDisalurkan":36000000,"serapan":2.8571428571428568},{"jenjang":"SMA","level":"kecamatan","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":"Cipondoh","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":"Karawaci","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"provinsi","provinsi":"DI Yogyakarta","kabupaten":null,"kecamatan":null,"alokasi":113400000,"danaDisalurkan":66600000,"serapan":5.285714285714286},{"jenjang":"SMA","level":"kabupaten","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":null,"alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.857142857142857},{"jenjang":"SMA","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":"Depok","alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.857142857142857},{"jenjang":"SMA","level":"kabupaten","provinsi":"DI Yogyakarta","kabupaten":"Kota Yogyakarta","kecamatan":null,"alokasi":75600000,"danaDisalurkan":43200000,"serapan":3.4285714285714284},{"jenjang":"SMA","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kota Yogyakarta","kecamatan":"Gondokusuman","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kota Yogyakarta","kecamatan":"Umbulharjo","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"provinsi","provinsi":"DKI Jakarta","kabupaten":null,"kecamatan":null,"alokasi":151200000,"danaDisalurkan":68400000,"serapan":5.428571428571429},{"jenjang":"SMA","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":null,"alokasi":113400000,"danaDisalurkan":50400000,"serapan":4},{"jenjang":"SMA","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":"Cilandak","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":"Kebayoran Baru","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":"Pasar Minggu","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":"Duren Sawit","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"provinsi","provinsi":"Jawa Barat","kabupaten":null,"kecamatan":null,"alokasi":646200000,"danaDisalurkan":324000000,"serapan":25.555555555555557},{"jenjang":"SMA","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":null,"alokasi":495000000,"danaDisalurkan":244800000,"serapan":19.26984126984127},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Arjasari","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Banjaran","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Bojongsoang","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857144},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Ciwidey","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Dayeuhkolot","alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.8571428571428572},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Katapang","alokasi":41400000,"danaDisalurkan":19800000,"serapan":1.4126984126984126},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Kutawaringin","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pacet","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pangalengan","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pasirjambu","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Rancaekek","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Solokanjeruk","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Soreang","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Garut","kecamatan":null,"alokasi":75600000,"danaDisalurkan":45000000,"serapan":3.571428571428571},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Garut","kecamatan":"Cikajang","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Garut","kecamatan":"Tarogong Kidul","alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.857142857142857},{"jenjang":"SMA","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":null,"alokasi":75600000,"danaDisalurkan":34200000,"serapan":2.7142857142857144},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Cibeunying Kidul","alokasi":37800000,"danaDisalurkan":14400000,"serapan":1.1428571428571428},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Kiaracondong","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Jawa Tengah","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kabupaten","provinsi":"Jawa Tengah","kabupaten":"Kabupaten Banyumas","kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kabupaten Banyumas","kecamatan":"Sokaraja","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"provinsi","provinsi":"Jawa Timur","kabupaten":null,"kecamatan":null,"alokasi":77400000,"danaDisalurkan":46800000,"serapan":3.6071428571428568},{"jenjang":"SMA","level":"kabupaten","provinsi":"Jawa Timur","kabupaten":"Kabupaten Malang","kecamatan":null,"alokasi":39600000,"danaDisalurkan":27000000,"serapan":2.0357142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kabupaten Malang","kecamatan":"Singosari","alokasi":39600000,"danaDisalurkan":27000000,"serapan":2.0357142857142856},{"jenjang":"SMA","level":"kabupaten","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":"Rungkut","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Kalimantan Selatan","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kabupaten","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":null,"alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":"Astambul","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"provinsi","provinsi":"Kalimantan Timur","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":37800000,"serapan":3},{"jenjang":"SMA","level":"kabupaten","provinsi":"Kalimantan Timur","kabupaten":"Kota Samarinda","kecamatan":null,"alokasi":75600000,"danaDisalurkan":37800000,"serapan":3},{"jenjang":"SMA","level":"kecamatan","provinsi":"Kalimantan Timur","kabupaten":"Kota Samarinda","kecamatan":"Samarinda Ulu","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kecamatan","provinsi":"Kalimantan Timur","kabupaten":"Kota Samarinda","kecamatan":"Sungai Kunjang","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"provinsi","provinsi":"Maluku","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kabupaten","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":"Sirimau","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Nusa Tenggara Barat","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":36000000,"serapan":2.857142857142857},{"jenjang":"SMA","level":"kabupaten","provinsi":"Nusa Tenggara Barat","kabupaten":"Kota Mataram","kecamatan":null,"alokasi":75600000,"danaDisalurkan":36000000,"serapan":2.857142857142857},{"jenjang":"SMA","level":"kecamatan","provinsi":"Nusa Tenggara Barat","kabupaten":"Kota Mataram","kecamatan":"Cakranegara","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"Nusa Tenggara Barat","kabupaten":"Kota Mataram","kecamatan":"Selaparang","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"provinsi","provinsi":"Nusa Tenggara Timur","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kabupaten","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kecamatan","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":"Oebobo","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"provinsi","provinsi":"Papua","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":39600000,"serapan":3.142857142857143},{"jenjang":"SMA","level":"kabupaten","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":null,"alokasi":75600000,"danaDisalurkan":39600000,"serapan":3.142857142857143},{"jenjang":"SMA","level":"kecamatan","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":"Abepura","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kecamatan","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":"Jayapura Utara","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"provinsi","provinsi":"Riau","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":37800000,"serapan":3},{"jenjang":"SMA","level":"kabupaten","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":null,"alokasi":75600000,"danaDisalurkan":37800000,"serapan":3},{"jenjang":"SMA","level":"kecamatan","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":"Sukajadi","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":"Tampan","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Sulawesi Selatan","kabupaten":null,"kecamatan":null,"alokasi":113400000,"danaDisalurkan":54000000,"serapan":4.285714285714285},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":null,"alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":"Somba Opu","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":null,"alokasi":75600000,"danaDisalurkan":37800000,"serapan":3},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":"Rappocini","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":"Tamalanrea","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"provinsi","provinsi":"Sulawesi Utara","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":43200000,"serapan":3.428571428571429},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":null,"alokasi":75600000,"danaDisalurkan":43200000,"serapan":3.428571428571429},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":"Malalayang","alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.8571428571428572},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":"Wanea","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Sumatera Barat","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":"Lubuk Basung","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Sumatera Selatan","kabupaten":null,"kecamatan":null,"alokasi":113400000,"danaDisalurkan":59400000,"serapan":4.7142857142857135},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":"Indralaya","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":null,"alokasi":75600000,"danaDisalurkan":41400000,"serapan":3.2857142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":"Ilir Timur I","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":"Seberang Ulu I","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"provinsi","provinsi":"Sumatera Utara","kabupaten":null,"kecamatan":null,"alokasi":189000000,"danaDisalurkan":95400000,"serapan":7.571428571428571},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":null,"alokasi":75600000,"danaDisalurkan":41400000,"serapan":3.2857142857142856},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":"Lubuk Pakam","alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.8571428571428572},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":"Tanjung Morawa","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMA","level":"kabupaten","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":null,"alokasi":113400000,"danaDisalurkan":54000000,"serapan":4.285714285714286},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":"Medan Baru","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":"Medan Denai","alokasi":37800000,"danaDisalurkan":14400000,"serapan":1.1428571428571428},{"jenjang":"SMA","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":"Medan Johor","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"provinsi","provinsi":"Aceh","kabupaten":null,"kecamatan":null,"alokasi":113400000,"danaDisalurkan":57600000,"serapan":4.571428571428571},{"jenjang":"SMK","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":"Darul Imarah","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":null,"alokasi":75600000,"danaDisalurkan":39600000,"serapan":3.1428571428571423},{"jenjang":"SMK","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":"Kuta Alam","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":"Syiah Kuala","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMK","level":"provinsi","provinsi":"Bali","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":43200000,"serapan":3.4285714285714284},{"jenjang":"SMK","level":"kabupaten","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kecamatan","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":"Mengwi","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kabupaten","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kecamatan","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":"Denpasar Selatan","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"provinsi","provinsi":"Banten","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":39600000,"serapan":3.142857142857143},{"jenjang":"SMK","level":"kabupaten","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kecamatan","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":"Kramatwatu","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kabupaten","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kecamatan","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":"Karawaci","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"provinsi","provinsi":"DI Yogyakarta","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kabupaten","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":"Depok","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"provinsi","provinsi":"DKI Jakarta","kabupaten":null,"kecamatan":null,"alokasi":151200000,"danaDisalurkan":86400000,"serapan":6.857142857142857},{"jenjang":"SMK","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":null,"alokasi":75600000,"danaDisalurkan":43200000,"serapan":3.4285714285714284},{"jenjang":"SMK","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":"Kebayoran Baru","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714284},{"jenjang":"SMK","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":"Pasar Minggu","alokasi":37800000,"danaDisalurkan":25200000,"serapan":2},{"jenjang":"SMK","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":null,"alokasi":75600000,"danaDisalurkan":43200000,"serapan":3.4285714285714284},{"jenjang":"SMK","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":"Cakung","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":"Duren Sawit","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"provinsi","provinsi":"Jawa Barat","kabupaten":null,"kecamatan":null,"alokasi":189000000,"danaDisalurkan":97200000,"serapan":7.714285714285714},{"jenjang":"SMK","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":null,"alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.8571428571428572},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":"Citeureup","alokasi":37800000,"danaDisalurkan":23400000,"serapan":1.8571428571428572},{"jenjang":"SMK","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Garut","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Garut","kecamatan":"Tarogong Kidul","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":null,"alokasi":113400000,"danaDisalurkan":54000000,"serapan":4.285714285714286},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Cibeunying Kidul","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Coblong","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Kiaracondong","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"provinsi","provinsi":"Jawa Tengah","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kabupaten","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":"Tembalang","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"provinsi","provinsi":"Jawa Timur","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":34200000,"serapan":2.7142857142857144},{"jenjang":"SMK","level":"kabupaten","provinsi":"Jawa Timur","kabupaten":"Kabupaten Malang","kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kabupaten Malang","kecamatan":"Kepanjen","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kabupaten","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":null,"alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":"Sukolilo","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"provinsi","provinsi":"Kalimantan Barat","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":36000000,"serapan":2.8571428571428568},{"jenjang":"SMK","level":"kabupaten","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":null,"alokasi":75600000,"danaDisalurkan":36000000,"serapan":2.8571428571428568},{"jenjang":"SMK","level":"kecamatan","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":"Pontianak Kota","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"kecamatan","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":"Pontianak Selatan","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"provinsi","provinsi":"Maluku","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"kabupaten","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":null,"alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"kecamatan","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":"Nusaniwe","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"provinsi","provinsi":"Nusa Tenggara Timur","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kabupaten","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":null,"alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kecamatan","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":"Kelapa Lima","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"provinsi","provinsi":"Papua","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kabupaten","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kecamatan","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":"Abepura","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"provinsi","provinsi":"Sulawesi Selatan","kabupaten":null,"kecamatan":null,"alokasi":75600000,"danaDisalurkan":34200000,"serapan":2.7142857142857144},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":null,"alokasi":75600000,"danaDisalurkan":34200000,"serapan":2.7142857142857144},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":"Pallangga","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":"Somba Opu","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"provinsi","provinsi":"Sulawesi Utara","kabupaten":null,"kecamatan":null,"alokasi":37800000,"danaDisalurkan":27000000,"serapan":2.142857142857143},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":null,"alokasi":37800000,"danaDisalurkan":27000000,"serapan":2.142857142857143},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":"Malalayang","alokasi":37800000,"danaDisalurkan":27000000,"serapan":2.142857142857143},{"jenjang":"SMK","level":"provinsi","provinsi":"Sumatera Barat","kabupaten":null,"kecamatan":null,"alokasi":113400000,"danaDisalurkan":59400000,"serapan":4.714285714285714},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":null,"alokasi":75600000,"danaDisalurkan":39600000,"serapan":3.142857142857143},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":"Lubuk Basung","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":"Tilatang Kamang","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":null,"alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":"Koto Tangah","alokasi":37800000,"danaDisalurkan":19800000,"serapan":1.5714285714285714},{"jenjang":"SMK","level":"provinsi","provinsi":"Sumatera Selatan","kabupaten":null,"kecamatan":null,"alokasi":151200000,"danaDisalurkan":77400000,"serapan":6.142857142857142},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":null,"alokasi":75600000,"danaDisalurkan":43200000,"serapan":3.4285714285714284},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":"Indralaya","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":"Tanjung Batu","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":null,"alokasi":75600000,"danaDisalurkan":34200000,"serapan":2.7142857142857144},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":"Ilir Timur I","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857144},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kota Palembang","kecamatan":"Seberang Ulu I","alokasi":37800000,"danaDisalurkan":12600000,"serapan":0.9999999999999999},{"jenjang":"SMK","level":"provinsi","provinsi":"Sumatera Utara","kabupaten":null,"kecamatan":null,"alokasi":113400000,"danaDisalurkan":55800000,"serapan":4.428571428571429},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":null,"alokasi":75600000,"danaDisalurkan":34200000,"serapan":2.7142857142857144},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":"Lubuk Pakam","alokasi":37800000,"danaDisalurkan":16200000,"serapan":1.2857142857142856},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":"Tanjung Morawa","alokasi":37800000,"danaDisalurkan":18000000,"serapan":1.4285714285714286},{"jenjang":"SMK","level":"kabupaten","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":null,"alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMK","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":"Medan Denai","alokasi":37800000,"danaDisalurkan":21600000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"provinsi","provinsi":"Aceh","kabupaten":null,"kecamatan":null,"alokasi":47250000,"danaDisalurkan":23250000,"serapan":4.428571428571428},{"jenjang":"SMP","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":null,"alokasi":31500000,"danaDisalurkan":16500000,"serapan":3.1428571428571423},{"jenjang":"SMP","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":"Darul Imarah","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kabupaten Aceh Besar","kecamatan":"Ingin Jaya","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kabupaten","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":null,"alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Aceh","kabupaten":"Kota Banda Aceh","kecamatan":"Baiturrahman","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"provinsi","provinsi":"Bali","kabupaten":null,"kecamatan":null,"alokasi":63000000,"danaDisalurkan":27000000,"serapan":5.142857142857142},{"jenjang":"SMP","level":"kabupaten","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kecamatan","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":"Kuta Utara","alokasi":15750000,"danaDisalurkan":6000000,"serapan":1.1428571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Bali","kabupaten":"Kabupaten Badung","kecamatan":"Mengwi","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714286},{"jenjang":"SMP","level":"kabupaten","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kecamatan","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":"Denpasar Barat","alokasi":15750000,"danaDisalurkan":6000000,"serapan":1.1428571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Bali","kabupaten":"Kota Denpasar","kecamatan":"Denpasar Selatan","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"provinsi","provinsi":"Banten","kabupaten":null,"kecamatan":null,"alokasi":47250000,"danaDisalurkan":23250000,"serapan":4.428571428571428},{"jenjang":"SMP","level":"kabupaten","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":null,"alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Banten","kabupaten":"Kabupaten Serang","kecamatan":"Kramatwatu","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kabupaten","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":null,"alokasi":31500000,"danaDisalurkan":15750000,"serapan":3},{"jenjang":"SMP","level":"kecamatan","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":"Cipondoh","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Banten","kabupaten":"Kota Tangerang","kecamatan":"Karawaci","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"provinsi","provinsi":"DI Yogyakarta","kabupaten":null,"kecamatan":null,"alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kabupaten","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":null,"alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"DI Yogyakarta","kabupaten":"Kabupaten Sleman","kecamatan":"Mlati","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"provinsi","provinsi":"DKI Jakarta","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":15750000,"serapan":3},{"jenjang":"SMP","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":null,"alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Selatan","kecamatan":"Cilandak","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kabupaten","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":null,"alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"DKI Jakarta","kabupaten":"Kota Jakarta Timur","kecamatan":"Cakung","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"provinsi","provinsi":"Jawa Barat","kabupaten":null,"kecamatan":null,"alokasi":422250000,"danaDisalurkan":226500000,"serapan":39.9241452991453},{"jenjang":"SMP","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":null,"alokasi":358500000,"danaDisalurkan":193500000,"serapan":33.74557387057387},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Arjasari","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Baleendah","alokasi":15750000,"danaDisalurkan":9750000,"serapan":1.8571428571428572},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Banjaran","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Bojongsoang","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Cicalengka","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Cileunyi","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Cimenyan","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Ciparay","alokasi":16500000,"danaDisalurkan":9750000,"serapan":1.7678571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Ciwidey","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Dayeuhkolot","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Katapang","alokasi":15750000,"danaDisalurkan":11250000,"serapan":2.142857142857143},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Kutawaringin","alokasi":15750000,"danaDisalurkan":6000000,"serapan":1.1428571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Majalaya","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Margahayu","alokasi":15750000,"danaDisalurkan":10500000,"serapan":2},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pacet","alokasi":16500000,"danaDisalurkan":9000000,"serapan":1.6071428571428572},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pangalengan","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Pasirjambu","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Rancaekek","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Solokanjeruk","alokasi":15750000,"danaDisalurkan":6000000,"serapan":1.1428571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bandung","kecamatan":"Soreang","alokasi":57750000,"danaDisalurkan":33750000,"serapan":3.5134310134310134},{"jenjang":"SMP","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":null,"alokasi":31500000,"danaDisalurkan":14250000,"serapan":2.714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":"Cibinong","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kabupaten Bogor","kecamatan":"Citeureup","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kabupaten","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":null,"alokasi":32250000,"danaDisalurkan":18750000,"serapan":3.4642857142857144},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Cibeunying Kidul","alokasi":16500000,"danaDisalurkan":10500000,"serapan":1.8928571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Barat","kabupaten":"Kota Bandung","kecamatan":"Coblong","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"provinsi","provinsi":"Jawa Tengah","kabupaten":null,"kecamatan":null,"alokasi":47250000,"danaDisalurkan":21750000,"serapan":4.142857142857142},{"jenjang":"SMP","level":"kabupaten","provinsi":"Jawa Tengah","kabupaten":"Kabupaten Banyumas","kecamatan":null,"alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kabupaten Banyumas","kecamatan":"Purwokerto Timur","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kabupaten","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":null,"alokasi":31500000,"danaDisalurkan":14250000,"serapan":2.7142857142857144},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":"Banyumanik","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714286},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Tengah","kabupaten":"Kota Semarang","kecamatan":"Tembalang","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"provinsi","provinsi":"Jawa Timur","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kabupaten","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":"Rungkut","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Jawa Timur","kabupaten":"Kota Surabaya","kecamatan":"Sukolilo","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"provinsi","provinsi":"Kalimantan Barat","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":15750000,"serapan":3},{"jenjang":"SMP","level":"kabupaten","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":null,"alokasi":31500000,"danaDisalurkan":15750000,"serapan":3},{"jenjang":"SMP","level":"kecamatan","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":"Pontianak Kota","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Kalimantan Barat","kabupaten":"Kota Pontianak","kecamatan":"Pontianak Selatan","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"provinsi","provinsi":"Kalimantan Selatan","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":18000000,"serapan":3.4285714285714284},{"jenjang":"SMP","level":"kabupaten","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":null,"alokasi":31500000,"danaDisalurkan":18000000,"serapan":3.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":"Astambul","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Kalimantan Selatan","kabupaten":"Kabupaten Banjar","kecamatan":"Martapura","alokasi":15750000,"danaDisalurkan":10500000,"serapan":2},{"jenjang":"SMP","level":"provinsi","provinsi":"Kalimantan Timur","kabupaten":null,"kecamatan":null,"alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kabupaten","provinsi":"Kalimantan Timur","kabupaten":"Kota Samarinda","kecamatan":null,"alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Kalimantan Timur","kabupaten":"Kota Samarinda","kecamatan":"Samarinda Ulu","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"provinsi","provinsi":"Lampung","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":17250000,"serapan":3.2857142857142856},{"jenjang":"SMP","level":"kabupaten","provinsi":"Lampung","kabupaten":"Kota Bandar Lampung","kecamatan":null,"alokasi":31500000,"danaDisalurkan":17250000,"serapan":3.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Lampung","kabupaten":"Kota Bandar Lampung","kecamatan":"Kedaton","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Lampung","kabupaten":"Kota Bandar Lampung","kecamatan":"Tanjung Karang Pusat","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"provinsi","provinsi":"Maluku","kabupaten":null,"kecamatan":null,"alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kabupaten","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":null,"alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Maluku","kabupaten":"Kota Ambon","kecamatan":"Sirimau","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"provinsi","provinsi":"Nusa Tenggara Barat","kabupaten":null,"kecamatan":null,"alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kabupaten","provinsi":"Nusa Tenggara Barat","kabupaten":"Kota Mataram","kecamatan":null,"alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Nusa Tenggara Barat","kabupaten":"Kota Mataram","kecamatan":"Cakranegara","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"provinsi","provinsi":"Nusa Tenggara Timur","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":15000000,"serapan":2.8571428571428568},{"jenjang":"SMP","level":"kabupaten","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":null,"alokasi":31500000,"danaDisalurkan":15000000,"serapan":2.8571428571428568},{"jenjang":"SMP","level":"kecamatan","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":"Kelapa Lima","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"kecamatan","provinsi":"Nusa Tenggara Timur","kabupaten":"Kota Kupang","kecamatan":"Oebobo","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714286},{"jenjang":"SMP","level":"provinsi","provinsi":"Papua","kabupaten":null,"kecamatan":null,"alokasi":15750000,"danaDisalurkan":9750000,"serapan":1.857142857142857},{"jenjang":"SMP","level":"kabupaten","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":null,"alokasi":15750000,"danaDisalurkan":9750000,"serapan":1.857142857142857},{"jenjang":"SMP","level":"kecamatan","provinsi":"Papua","kabupaten":"Kota Jayapura","kecamatan":"Jayapura Utara","alokasi":15750000,"danaDisalurkan":9750000,"serapan":1.857142857142857},{"jenjang":"SMP","level":"provinsi","provinsi":"Riau","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":15750000,"serapan":3},{"jenjang":"SMP","level":"kabupaten","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":null,"alokasi":31500000,"danaDisalurkan":15750000,"serapan":3},{"jenjang":"SMP","level":"kecamatan","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":"Sukajadi","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Riau","kabupaten":"Kota Pekanbaru","kecamatan":"Tampan","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"provinsi","provinsi":"Sulawesi Selatan","kabupaten":null,"kecamatan":null,"alokasi":63000000,"danaDisalurkan":28500000,"serapan":5.428571428571428},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":null,"alokasi":31500000,"danaDisalurkan":15000000,"serapan":2.8571428571428568},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":"Pallangga","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kabupaten Gowa","kecamatan":"Somba Opu","alokasi":15750000,"danaDisalurkan":6000000,"serapan":1.1428571428571428},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":"Rappocini","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sulawesi Selatan","kabupaten":"Kota Makassar","kecamatan":"Tamalanrea","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"provinsi","provinsi":"Sulawesi Utara","kabupaten":null,"kecamatan":null,"alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":null,"alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sulawesi Utara","kabupaten":"Kota Manado","kecamatan":"Wanea","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"provinsi","provinsi":"Sumatera Barat","kabupaten":null,"kecamatan":null,"alokasi":63000000,"danaDisalurkan":27000000,"serapan":5.142857142857142},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":"Lubuk Basung","alokasi":15750000,"danaDisalurkan":6000000,"serapan":1.1428571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kabupaten Agam","kecamatan":"Tilatang Kamang","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714286},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":"Koto Tangah","alokasi":15750000,"danaDisalurkan":6000000,"serapan":1.1428571428571428},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Barat","kabupaten":"Kota Padang","kecamatan":"Padang Barat","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714284},{"jenjang":"SMP","level":"provinsi","provinsi":"Sumatera Selatan","kabupaten":null,"kecamatan":null,"alokasi":31500000,"danaDisalurkan":16500000,"serapan":3.142857142857143},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":null,"alokasi":31500000,"danaDisalurkan":16500000,"serapan":3.142857142857143},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":"Indralaya","alokasi":15750000,"danaDisalurkan":9000000,"serapan":1.7142857142857142},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Selatan","kabupaten":"Kabupaten Ogan Ilir","kecamatan":"Tanjung Batu","alokasi":15750000,"danaDisalurkan":7500000,"serapan":1.4285714285714286},{"jenjang":"SMP","level":"provinsi","provinsi":"Sumatera Utara","kabupaten":null,"kecamatan":null,"alokasi":47250000,"danaDisalurkan":21750000,"serapan":4.142857142857142},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":null,"alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kabupaten Deli Serdang","kecamatan":"Tanjung Morawa","alokasi":15750000,"danaDisalurkan":8250000,"serapan":1.5714285714285714},{"jenjang":"SMP","level":"kabupaten","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":null,"alokasi":31500000,"danaDisalurkan":13500000,"serapan":2.571428571428571},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":"Medan Baru","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856},{"jenjang":"SMP","level":"kecamatan","provinsi":"Sumatera Utara","kabupaten":"Kota Medan","kecamatan":"Medan Johor","alokasi":15750000,"danaDisalurkan":6750000,"serapan":1.2857142857142856}]}};

    const JENJANG_URUTAN = ['SD','SMP','SMA','SMK'];
    const rupiah = value => new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(Number(value || 0));
    const persen = value => `${Number(value || 0).toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}%`;
    const esc = value => String(value ?? '').replace(/[&<>"']/g, ch => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[ch]));

    function getWilayahRecords(tahun='2026', provinsi='Semua', kabupaten='Semua', kecamatan='Semua') {
        const rows = databaseLP[tahun]?.wilayah || [];
        let level='provinsi';
        if (kecamatan !== 'Semua') level='kecamatan';
        else if (kabupaten !== 'Semua') level='kabupaten';
        if (provinsi === 'Semua' && kabupaten === 'Semua' && kecamatan === 'Semua') return null;
        return rows.filter(r => r.level === level &&
            (provinsi === 'Semua' || r.provinsi === provinsi) &&
            (kabupaten === 'Semua' || r.kabupaten === kabupaten) &&
            (kecamatan === 'Semua' || r.kecamatan === kecamatan));
    }

    function renderTables(tahun='2026', dataCustom=null) {
        const data = databaseLP[tahun] || databaseLP['2026'];
        let siswa = [...data.nasional].sort((a,b)=>JENJANG_URUTAN.indexOf(a.jenjang)-JENJANG_URUTAN.indexOf(b.jenjang));
        let total = data.totalNasional;
        if (dataCustom) {
            siswa = JENJANG_URUTAN.map(j => dataCustom.find(r => r.jenjang === j)).filter(Boolean);
            total = {
                jenjang:'Grand Total',
                alokasi:siswa.reduce((s,r)=>s+Number(r.alokasi||0),0),
                danaDisalurkan:siswa.reduce((s,r)=>s+Number(r.danaDisalurkan||0),0),
                serapan:siswa.reduce((s,r)=>s+Number(r.serapan||0),0)
            };
        }
        document.getElementById('badgeTahunSiswa')?.replaceChildren(document.createTextNode(`Tahun ${tahun}`));
        document.getElementById('badgeTahunDana')?.replaceChildren(document.createTextNode(`Tahun ${tahun}`));
        const tbody=document.getElementById('tabelSiswaBody');
        if(tbody) {
            tbody.innerHTML=siswa.map(item=>`<tr class="hover:bg-blue-50/50 transition border-b border-slate-100"><td class="p-4 font-bold text-slate-900">${esc(item.jenjang)}</td><td class="p-4 text-right font-semibold">Rp ${rupiah(item.alokasi)}</td><td class="p-4 text-right font-semibold">Rp ${rupiah(item.danaDisalurkan)}</td><td class="p-4 text-right font-semibold">${persen(item.serapan)}</td></tr>`).join('') + `<tr class="bg-blue-600 text-white font-extrabold text-base"><td class="p-4 rounded-l-xl">Grand Total</td><td class="p-4 text-right">Rp ${rupiah(total.alokasi)}</td><td class="p-4 text-right">Rp ${rupiah(total.danaDisalurkan)}</td><td class="p-4 text-right rounded-r-xl">${persen(total.serapan)}</td></tr>`;
        }
        const dana=document.getElementById('tabelDanaBody');
        if(dana) {
            dana.innerHTML=siswa.map(item=>`<tr class="hover:bg-emerald-50/50 transition border-b border-slate-100"><td class="p-4 font-bold text-slate-900">${esc(item.jenjang)}</td><td class="p-4 text-right font-semibold">Rp ${rupiah(item.alokasi)}</td><td class="p-4 text-right font-semibold">Rp ${rupiah(item.danaDisalurkan)}</td></tr>`).join('') + `<tr class="bg-slate-900 text-white font-extrabold text-base"><td class="p-4 rounded-l-xl">Grand Total</td><td class="p-4 text-right text-emerald-400">Rp ${rupiah(total.alokasi)}</td><td class="p-4 text-right rounded-r-xl">Rp ${rupiah(total.danaDisalurkan)}</td></tr>`;
        }
    }

    function populateDropdowns() {
        const rows=databaseLP['2026'].wilayah;
        const provs=[...new Set(rows.filter(r=>r.level==='provinsi').map(r=>r.provinsi))].sort((a,b)=>a.localeCompare(b,'id'));
        const p=document.getElementById('filterProvinsi'), pw=document.getElementById('filterProvinsiWilayah');
        [p,pw].forEach(select=>{ if(select) select.innerHTML='<option value="Semua">(Semua Provinsi)</option>'+provs.map(v=>`<option value="${esc(v)}">${esc(v)}</option>`).join(''); });
        updateKabupatenOptions('filterProvinsi','filterKabupaten','filterKecamatan');
        updateKabupatenOptions('filterProvinsiWilayah','filterKabupatenWilayah','filterKecamatanWilayah');
    }

    function updateKabupatenOptions(provId,kabId,kecId) {
        const prov=document.getElementById(provId)?.value || 'Semua';
        const kab=document.getElementById(kabId); const kec=document.getElementById(kecId);
        if(!kab||!kec) return;
        const rows=databaseLP['2026'].wilayah.filter(r=>r.level==='kabupaten' && (prov==='Semua'||r.provinsi===prov));
        const vals=[...new Set(rows.map(r=>r.kabupaten))].sort((a,b)=>a.localeCompare(b,'id'));
        kab.innerHTML='<option value="Semua">(Semua Kabupaten/Kota)</option>'+vals.map(v=>`<option value="${esc(v)}">${esc(v)}</option>`).join('');
        kec.innerHTML='<option value="Semua">(Semua Kecamatan)</option>';
    }

    function updateKecamatanOptions(kabId,kecId,provId) {
        const kab=document.getElementById(kabId)?.value || 'Semua'; const prov=document.getElementById(provId)?.value || 'Semua'; const kec=document.getElementById(kecId);
        if(!kec) return;
        const rows=databaseLP['2026'].wilayah.filter(r=>r.level==='kecamatan' && (prov==='Semua'||r.provinsi===prov) && (kab==='Semua'||r.kabupaten===kab));
        const vals=[...new Set(rows.map(r=>r.kecamatan))].sort((a,b)=>a.localeCompare(b,'id'));
        kec.innerHTML='<option value="Semua">(Semua Kecamatan)</option>'+vals.map(v=>`<option value="${esc(v)}">${esc(v)}</option>`).join('');
    }

    function applyNationalFilter() {
        const tahun=document.getElementById('filterTahun')?.value||'2026';
        const provinsi=document.getElementById('filterProvinsi')?.value||'Semua';
        const kabupaten=document.getElementById('filterKabupaten')?.value||'Semua';
        const kecamatan=document.getElementById('filterKecamatan')?.value||'Semua';
        const rows=getWilayahRecords(tahun,provinsi,kabupaten,kecamatan);
        renderTables(tahun,rows);
    }

    function resetFilter() {
        document.getElementById('filterTahun').value='2026';
        document.getElementById('filterProvinsi').value='Semua';
        updateKabupatenOptions('filterProvinsi','filterKabupaten','filterKecamatan');
        document.getElementById('filterKabupaten').value='Semua';
        document.getElementById('filterKecamatan').value='Semua';
        renderTables('2026');
    }

    function renderWilayahTable() {
        const tahun=document.getElementById('filterTahunWilayah')?.value||'2026';
        const prov=document.getElementById('filterProvinsiWilayah')?.value||'Semua';
        const kab=document.getElementById('filterKabupatenWilayah')?.value||'Semua';
        const kec=document.getElementById('filterKecamatanWilayah')?.value||'Semua';
        const tbody=document.getElementById('tableWilayahBody'); if(!tbody) return;
        let rows=getWilayahRecords(tahun,prov,kab,kec);
        if(rows===null) rows=databaseLP[tahun].wilayah.filter(r=>r.level==='provinsi');
        rows.sort((a,b)=>JENJANG_URUTAN.indexOf(a.jenjang)-JENJANG_URUTAN.indexOf(b.jenjang) || String(a.provinsi).localeCompare(String(b.provinsi),'id'));
        const level=kec!=='Semua'?'Kecamatan':kab!=='Semua'?'Kabupaten/Kota':prov!=='Semua'?'Provinsi':'Provinsi';
        document.getElementById('badgeWilayahAktif')?.replaceChildren(document.createTextNode(prov==='Semua'?'Seluruh Indonesia':(kec!=='Semua'?kec:(kab!=='Semua'?kab:prov))));
        tbody.innerHTML=rows.length ? rows.map(item=>{
            const wilayah=item.level==='kecamatan'?item.kecamatan:(item.level==='kabupaten'?item.kabupaten:item.provinsi);
            return `<tr class="hover:bg-slate-50 transition border-b border-slate-100"><td class="py-3.5 px-6 font-bold text-slate-900">${esc(item.jenjang)}</td><td class="py-3.5 px-6">${esc(wilayah)}</td><td class="py-3.5 px-6 text-right">Rp ${rupiah(item.alokasi)}</td><td class="py-3.5 px-6 text-right">Rp ${rupiah(item.danaDisalurkan)}</td><td class="py-3.5 px-6 text-right">${persen(item.serapan)}</td></tr>`;
        }).join('') : `<tr><td colspan="5" class="py-8 px-6 text-center text-slate-500 font-bold">Data wilayah tidak ditemukan.</td></tr>`;
    }

    function applyWilayahFilter() { renderWilayahTable(); }
    function resetWilayahFilter() {
        document.getElementById('filterTahunWilayah').value='2026';
        document.getElementById('filterProvinsiWilayah').value='Semua';
        updateKabupatenOptions('filterProvinsiWilayah','filterKabupatenWilayah','filterKecamatanWilayah');
        document.getElementById('filterKabupatenWilayah').value='Semua';
        document.getElementById('filterKecamatanWilayah').value='Semua';
        renderWilayahTable();
    }

    function initCascadingDropdowns() {
        const pairs=[['filterProvinsi','filterKabupaten','filterKecamatan'],['filterProvinsiWilayah','filterKabupatenWilayah','filterKecamatanWilayah']];
        pairs.forEach(([p,k,c])=>{
            document.getElementById(p)?.addEventListener('change',()=>{ updateKabupatenOptions(p,k,c); });
            document.getElementById(k)?.addEventListener('change',()=>{ updateKecamatanOptions(k,c,p); });
        });
    }

    window.addEventListener('DOMContentLoaded', () => {
        populateDropdowns();
        renderTables('2026');
        renderWilayahTable();
        initCascadingDropdowns();
    });
</script>
</body>
</html>