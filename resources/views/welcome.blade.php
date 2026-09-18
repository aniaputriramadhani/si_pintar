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
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-extrabold text-slate-500 uppercase block">Provinsi</label>
                            <select id="filterProvinsi" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-bold text-slate-800">
                                <option value="Semua" selected>(All)</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-extrabold text-slate-500 uppercase block">Kabupaten</label>
                            <select id="filterKabupaten" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-bold text-slate-800">
                                <option value="Semua" selected>(All)</option>
                                <option value="Kab. Bandung">Kab. Bandung</option>
                                <option value="Kab. Bogor">Kab. Bogor</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-extrabold text-slate-500 uppercase block">Kecamatan</label>
                            <div class="flex gap-2">
                                <select id="filterKecamatan" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-bold text-slate-800">
                                    <option value="Semua" selected>(All)</option>
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
                                    <th class="p-4 text-right">Alokasi</th>
                                    <th class="p-4 text-right">Disalurkan</th>
                                    <th class="p-4 text-right">Pemberian</th>
                                    <th class="p-4 text-right">Pemberian Dari Aktivasi</th>
                                    <th class="p-4 text-right rounded-r-xl">Relaksasi</th>
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
                                    <th class="p-4 text-right">Sum of Alokasi Dana (Rp)</th>
                                    <th class="p-4 text-right rounded-r-xl">Sum of Jumlah Siswa Alokasi</th>
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
                <div class="bg-white rounded-xl border border-slate-200 p-6 flex flex-col sm:flex-row justify-between items-center gap-4 shadow-sm">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Filter Data Wilayah</h2>
                        <p class="text-sm text-slate-500">Pilih tahun untuk memperbarui data</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class="text-sm font-semibold text-slate-700">Tahun:</label>
                        <select id="filterTahunWilayah" onchange="renderWilayahTable()" class="bg-slate-50 border border-slate-300 text-slate-800 text-base font-medium rounded-lg p-2.5 w-44">
                            <option value="2026" selected>2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Data Penyaluran Per Wilayah</h3>
                            <p class="text-sm text-slate-500">Rincian alokasi dana dan penerima berdasarkan jenjang</p>
                        </div>
                        <button class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                            Download Data
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs uppercase font-bold tracking-wider">
                                    <th class="py-3.5 px-6">Jenjang</th>
                                    <th class="py-3.5 px-6">Disalurkan</th>
                                    <th class="py-3.5 px-6">Pemberian</th>
                                    <th class="py-3.5 px-6">Aktivasi Nominasi</th>
                                    <th class="py-3.5 px-6">Relaksasi</th>
                                </tr>
                            </thead>
                            <tbody id="tableWilayahBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800">
                                <!-- Rendered Via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
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

    const databaseNasional = {
        "2026": {
            siswa: [
                { jenjang: "SD", alokasi: "10.360.614", disalurkan: "6.948.586", pemberian: "6.292.035", aktivasi: "656.551", relaksasi: "0" },
                { jenjang: "SMP", alokasi: "4.369.968", disalurkan: "2.980.979", pemberian: "2.734.869", aktivasi: "246.110", relaksasi: "0" },
                { jenjang: "SMA", alokasi: "1.935.774", disalurkan: "1.167.946", pemberian: "994.030", aktivasi: "173.916", relaksasi: "0" },
                { jenjang: "SMK", alokasi: "1.928.271", disalurkan: "1.154.191", pemberian: "944.429", aktivasi: "209.762", relaksasi: "0" }
            ],
            totalSiswa: { alokasi: "18.594.627", disalurkan: "12.251.702", pemberian: "10.965.363", aktivasi: "1.286.339", relaksasi: "0" },
            dana: [
                { jenjang: "SD", rupiah: "6.543.193.145", siswaAlokasi: "14.281" },
                { jenjang: "SMA", rupiah: "22.890.992.249", siswaAlokasi: "22.619" },
                { jenjang: "SMK", rupiah: "26.132.212.357", siswaAlokasi: "25.918" },
                { jenjang: "SMP", rupiah: "14.847.358.584", siswaAlokasi: "19.475" }
            ],
            totalDana: { rupiah: "70.413.756.335", siswaAlokasi: "82.293" }
        },
        "2025": {
            siswa: [
                { jenjang: "SD", alokasi: "9.850.000", disalurkan: "6.500.000", pemberian: "5.900.000", aktivasi: "600.000", relaksasi: "0" },
                { jenjang: "SMP", alokasi: "4.100.000", disalurkan: "2.800.000", pemberian: "2.550.000", aktivasi: "250.000", relaksasi: "0" }
            ],
            totalSiswa: { alokasi: "13.950.000", disalurkan: "9.300.000", pemberian: "8.450.000", aktivasi: "850.000", relaksasi: "0" },
            dana: [
                { jenjang: "SD", rupiah: "5.800.000.000", siswaAlokasi: "12.500" },
                { jenjang: "SMP", rupiah: "13.200.000.000", siswaAlokasi: "17.800" }
            ],
            totalDana: { rupiah: "19.000.000.000", siswaAlokasi: "30.300" }
        }
    };

    function renderTables(tahun, dataCustom = null) {
        const dataSelected = dataCustom || databaseNasional[tahun] || databaseNasional["2026"];

        const badgeSiswa = document.getElementById('badgeTahunSiswa');
        const badgeDana = document.getElementById('badgeTahunDana');
        
        if(badgeSiswa) badgeSiswa.innerText = `Tahun ${tahun}`;
        if(badgeDana) badgeDana.innerText = `Tahun ${tahun}`;

        const tbodySiswa = document.getElementById('tabelSiswaBody');
        if(tbodySiswa) {
            tbodySiswa.innerHTML = '';
            dataSelected.siswa.forEach(item => {
                tbodySiswa.innerHTML += `
                    <tr class="hover:bg-blue-50/50 transition border-b border-slate-100">
                        <td class="p-4 font-bold text-slate-900">${item.jenjang}</td>
                        <td class="p-4 text-right font-semibold">${item.alokasi}</td>
                        <td class="p-4 text-right font-semibold">${item.disalurkan}</td>
                        <td class="p-4 text-right font-semibold">${item.pemberian}</td>
                        <td class="p-4 text-right font-semibold">${item.aktivasi}</td>
                        <td class="p-4 text-right font-semibold">${item.relaksasi}</td>
                    </tr>`;
            });

            if (dataSelected.totalSiswa) {
                tbodySiswa.innerHTML += `
                    <tr class="bg-blue-600 text-white font-extrabold text-base">
                        <td class="p-4 rounded-l-xl">Total</td>
                        <td class="p-4 text-right">${dataSelected.totalSiswa.alokasi}</td>
                        <td class="p-4 text-right">${dataSelected.totalSiswa.disalurkan}</td>
                        <td class="p-4 text-right">${dataSelected.totalSiswa.pemberian}</td>
                        <td class="p-4 text-right">${dataSelected.totalSiswa.aktivasi}</td>
                        <td class="p-4 text-right rounded-r-xl">${dataSelected.totalSiswa.relaksasi}</td>
                    </tr>`;
            }
        }

        const tbodyDana = document.getElementById('tabelDanaBody');
        if(tbodyDana && dataSelected.dana) {
            tbodyDana.innerHTML = '';
            dataSelected.dana.forEach(item => {
                tbodyDana.innerHTML += `
                    <tr class="hover:bg-emerald-50/50 transition border-b border-slate-100">
                        <td class="p-4 font-bold text-slate-900">${item.jenjang}</td>
                        <td class="p-4 text-right font-semibold">Rp ${item.rupiah}</td>
                        <td class="p-4 text-right font-semibold">${item.siswaAlokasi}</td>
                    </tr>`;
            });

            if (dataSelected.totalDana) {
                tbodyDana.innerHTML += `
                    <tr class="bg-slate-900 text-white font-extrabold text-base">
                        <td class="p-4 rounded-l-xl">Grand Total</td>
                        <td class="p-4 text-right text-emerald-400">Rp ${dataSelected.totalDana.rupiah}</td>
                        <td class="p-4 text-right rounded-r-xl">${dataSelected.totalDana.siswaAlokasi}</td>
                    </tr>`;
            }
        }
    }

    function renderWilayahTable() {
        const tahun = document.getElementById('filterTahunWilayah')?.value || "2026";
        const tbodyWilayah = document.getElementById('tableWilayahBody');
        const dataWilayah = databaseNasional[tahun] || databaseNasional["2026"];
        
        if (tbodyWilayah) {
            tbodyWilayah.innerHTML = '';
            dataWilayah.siswa.forEach(item => {
                tbodyWilayah.innerHTML += `
                    <tr class="hover:bg-slate-50 transition border-b border-slate-100">
                        <td class="py-3.5 px-6 font-bold text-slate-900">${item.jenjang}</td>
                        <td class="py-3.5 px-6">${item.disalurkan}</td>
                        <td class="py-3.5 px-6">${item.pemberian}</td>
                        <td class="py-3.5 px-6">${item.aktivasi}</td>
                        <td class="py-3.5 px-6">${item.relaksasi}</td>
                    </tr>`;
            });
        }
    }

    function applyNationalFilter() {
        const tahun = document.getElementById('filterTahun').value;
        const provinsi = document.getElementById('filterProvinsi').value;
        const kabupaten = document.getElementById('filterKabupaten').value;
        const kecamatan = document.getElementById('filterKecamatan').value;

        if (provinsi === 'Semua' && kabupaten === 'Semua' && kecamatan === 'Semua') {
            renderTables(tahun);
            return;
        }

        const tbodySiswa = document.getElementById('tabelSiswaBody');
        if (tbodySiswa) {
            tbodySiswa.innerHTML = `<tr><td colspan="6" class="text-center p-4 text-slate-500 font-bold">Memuat data filter...</td></tr>`;
        }

        const queryParams = new URLSearchParams({ tahun, provinsi, kabupaten, kecamatan });

        fetch(`/api/penyaluran/data?${queryParams.toString()}`)
            .then(res => res.json())
            .then(res => {
                if (res.success && res.data) {
                    renderTables(tahun, res.data);
                } else {
                    renderTables(tahun);
                }
            })
            .catch(err => {
                console.error("Gagal mengambil data filter:", err);
                renderTables(tahun);
            });
    }

    function resetFilter() {
        document.getElementById('filterTahun').value = "2026";
        document.getElementById('filterProvinsi').value = "Semua";
        document.getElementById('filterKabupaten').value = "Semua";
        document.getElementById('filterKecamatan').value = "Semua";
        
        document.getElementById('filterKabupaten').innerHTML = '<option value="Semua">(All)</option>';
        document.getElementById('filterKecamatan').innerHTML = '<option value="Semua">(All)</option>';

        renderTables("2026");
    }

    function initCascadingDropdowns() {
        const provSelect = document.getElementById('filterProvinsi');
        const kabSelect = document.getElementById('filterKabupaten');
        const kecSelect = document.getElementById('filterKecamatan');

        if (provSelect) {
            provSelect.addEventListener('change', function() {
                const provVal = this.value;
                kabSelect.innerHTML = '<option value="Semua">(All)</option>';
                kecSelect.innerHTML = '<option value="Semua">(All)</option>';

                if (provVal !== 'Semua') {
                    fetch(`/api/kabupaten?provinsi=${provVal}`)
                        .then(res => res.json())
                        .then(data => {
                            data.forEach(item => {
                                kabSelect.innerHTML += `<option value="${item.name}">${item.name}</option>`;
                            });
                        })
                        .catch(err => console.log('Gagal load kabupaten:', err));
                }
            });
        }

        if (kabSelect) {
            kabSelect.addEventListener('change', function() {
                const kabVal = this.value;
                kecSelect.innerHTML = '<option value="Semua">(All)</option>';

                if (kabVal !== 'Semua') {
                    fetch(`/api/kecamatan?kabupaten=${kabVal}`)
                        .then(res => res.json())
                        .then(data => {
                            data.forEach(item => {
                                kecSelect.innerHTML += `<option value="${item.name}">${item.name}</option>`;
                            });
                        })
                        .catch(err => console.log('Gagal load kecamatan:', err));
                }
            });
        }
    }

    window.addEventListener('DOMContentLoaded', () => {
        renderTables("2026");
        renderWilayahTable();
        initCascadingDropdowns();
    });
</script>
</body>
</html>