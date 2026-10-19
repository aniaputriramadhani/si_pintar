<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard terpadu Administrator SIPINTAR.">
    <title>Dashboard Administrator | SIPINTAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root { --ink:#071a33; --blue:#0055FF; --aqua:#5ee8d6; }
        body { font-family:'Plus Jakarta Sans',sans-serif; background:#f8fafc; color:var(--ink); }
        .mono { font-family:'DM Mono',monospace; }
        .page-grid { background-image:linear-gradient(rgba(0,85,255,.055) 1px,transparent 1px),linear-gradient(90deg,rgba(0,85,255,.055) 1px,transparent 1px); background-size:54px 54px; }
        .dot-field { background-image:radial-gradient(#0055FF 1.4px,transparent 1.4px); background-size:22px 22px; }
        .glass { background:linear-gradient(140deg,rgba(255,255,255,.94),rgba(255,255,255,.78)); border:1px solid rgba(255,255,255,.95); box-shadow:0 16px 45px -28px rgba(7,26,51,.28); backdrop-filter:blur(18px); }
        .sidebar-link { transition: all 0.2s ease-in-out; }
        .sidebar-link:hover:not(.active) { transform:translateX(4px); }
        .bar { transform-origin:bottom; animation:rise .7s cubic-bezier(.16,1,.3,1) both; }
        @keyframes rise { from { transform:scaleY(.12); opacity:.2; } }
        @media (prefers-reduced-motion:reduce) { *,::before,::after { animation-duration:.01ms!important; scroll-behavior:auto!important; transition-duration:.01ms!important; } }

        /* ======================================================
           CUSTOM SCROLLBAR (BIRU SOFT & BIRU MUDA ES)
        ====================================================== */
        ::-webkit-scrollbar {
            width: 12px !important;
            height: 12px !important;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9 !important;
            border-left: 1px solid #e2e8f0 !important;
        }

        ::-webkit-scrollbar-thumb {
            background: repeating-linear-gradient(
                -45deg,
                #3b82f6,          /* Biru pas / tidak pekat */
                #3b82f6 6px,
                #bfdbfe 6px,      /* Biru muda es soft */
                #bfdbfe 12px
            ) !important;
            border-radius: 9999px !important;
            border: 2px solid #f8fafc !important;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: repeating-linear-gradient(
                -45deg,
                #2563eb,
                #2563eb 6px,
                #93c5fd 6px,
                #93c5fd 12px
            ) !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden">
    <a href="#konten-utama" class="fixed -top-20 left-4 z-[60] rounded-xl bg-[#0055FF] px-5 py-3 text-lg font-extrabold text-white shadow-xl transition focus:top-4 focus:outline-none focus:ring-4 focus:ring-blue-200">Lewati ke konten utama</a>
    
    <!-- Background Decor -->
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden bg-gradient-to-br from-[#f5fbff] via-[#eaf6ff] to-[#eefcf8]">
        <div class="page-grid absolute inset-0"></div>
        <div class="absolute -right-40 -top-48 h-[38rem] w-[38rem] rounded-full bg-blue-300/20 blur-3xl"></div>
        <div class="absolute -bottom-44 -left-40 h-[34rem] w-[34rem] rounded-full bg-[#5ee8d6]/20 blur-3xl"></div>
    </div>

    <!-- Layout Grid -->
    <div class="min-h-screen lg:flex">
        
        <!-- SIDEBAR KIRI -->
<aside class="sticky top-0 z-20 hidden h-screen w-96 flex-shrink-0 flex-col justify-between overflow-y-auto no-scrollbar border-r border-slate-200/80 bg-white p-6 shadow-sm lg:flex">
    <div class="space-y-8">
        
        <!-- Header Brand Card -->
        <a href="{{ route('public.home') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/80 p-4 transition hover:border-slate-200 hover:bg-slate-100/80 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
            <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-xl border border-slate-100 bg-white p-2 shadow-sm">
                <img src="https://pip.kemendikdasmen.go.id/img/logo-sipintar.png" 
                     alt="Logo Kemendikdasmen" 
                     class="h-full w-full object-contain">
            </div>
            <div class="flex flex-col min-w-0">
                <span class="text-3xl font-black tracking-tight text-slate-800 transition-colors group-hover:text-[#0055FF] leading-tight truncate">SIPINTAR</span>
                <div class="mt-1">
                    <span class="inline-flex items-center rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-xs font-black tracking-wider text-[#0055FF]">ADMINISTRATOR</span>
                </div>
            </div>
        </a>

        <!-- Navigation Links -->
        <nav class="space-y-6" aria-label="Navigasi administrator">
            
            <!-- Kategori 1: Utama -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Utama</p>
                
                <!-- Dashboard -->
                <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : url('/admin/dashboard') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}" {{ request()->is('admin/dashboard*') ? 'aria-current="page"' : '' }}>
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- Kategori 2: Data & Pemantauan -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Data & Pemantauan</p>
                
                <!-- Data PIP -->
                <a href="{{ Route::has('pip.index') ? route('pip.index') : url('/admin/pip') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Data PIP</span>
                </a>
                
                <!-- Pemantauan -->
                <a href="{{ Route::has('admin.pemantauan') ? route('admin.pemantauan') : url('/admin/pemantauan') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <span>Pemantauan</span>
                </a>
                
                <!-- Rekap -->
                <a href="{{ Route::has('admin.rekap') ? route('admin.rekap') : url('/admin/rekap') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/rekap*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/rekap*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span>Rekap</span>
                </a>
                
                <!-- Verifikasi -->
                <a href="{{ Route::has('admin.verifikasi') ? route('admin.verifikasi') : url('/admin/verifikasi') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Verifikasi</span>
                </a>
            </div>

            <!-- Kategori 3: Layanan & Berkas -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan & Berkas</p>
                
                <!-- Dokumen -->
                <a href="{{ Route::has('admin.dokumen') ? route('admin.dokumen') : url('/admin/dokumen') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                    <span>Dokumen</span>
                </a>
                
                <!-- Pengaduan -->
                <a href="{{ Route::has('admin.layanan') ? route('admin.layanan') : url('/admin/layanan') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5 0a2.5 2.5 0 10-5 0 2.5 2.5 0 005 0zM10.5 15.5v-1a2.5 2.5 0 00-5 0v1"></path></svg>
                    <span>Pengaduan</span>
                </a>
            </div>

            <!-- Kategori 4: Sistem -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Sistem</p>
                
                <!-- Profil -->
                <a href="{{ Route::has('admin.pengguna') ? route('admin.pengguna') : url('/admin/pengguna') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span>Profil</span>
                </a>
                
                <!-- Pengaturan -->
                <a href="{{ Route::has('admin.pengaturan') ? route('admin.pengaturan') : url('/admin/pengaturan') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pengaturan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pengaturan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>Pengaturan</span>
                </a>
            </div>

        </nav>
    </div>

    <!-- Footer Card & Tombol Logout -->
    <div class="mt-8 pt-5 border-t border-slate-100 space-y-4">
        <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
            <p class="text-base font-bold text-slate-600 leading-snug">Pusat Layanan Pembiayaan Pendidikan</p>
            <p class="text-sm font-extrabold text-slate-800 mt-1">Kemendikdasmen RI</p>
        </div>

        <form action="{{ Route::has('logout') ? route('logout') : url('/logout') }}" method="POST">
            @csrf 
            <button type="submit" class="flex w-full items-center justify-center gap-3 rounded-2xl border border-red-200/60 bg-red-50/60 px-4 py-3.5 text-xl font-extrabold text-red-600 transition hover:bg-red-100 hover:border-red-200 focus:outline-none focus:ring-2 focus:ring-red-200">
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </button>
        </form>
    </div>
</aside>

        <!-- MAIN CONTENT AREA -->
        <main id="konten-utama" class="min-w-0 flex-1">
            
            <!-- Sticky Header Navbar -->
            <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 px-5 py-4 backdrop-blur-xl sm:px-8 lg:px-10">
                <div class="mx-auto flex max-w-[1540px] items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">Si</span>
                        <div>
                            <p class="mono text-small font-bold uppercase tracking-[.16em] text-[#0055FF]">Data & Pemantauan</p>
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Verifikasi Usulan</h1>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p class="text-lg font-extrabold text-slate-800">Admin Pusat</p>
                            <p class="text-base font-bold text-emerald-600">Sistem aktif</p>
                        </div>
                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-white shadow-lg shadow-blue-600/30" aria-label="Profil Admin Pusat">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <div class="relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                <!-- SECTION 2: 4 KARTU STATISTIK UTAMA (SESUAI DESIGN BARU TERLAMPIR) -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
                        
                        <!-- 01 / TOTAL ALOKASI (Aksen Biru Utama) -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#0055FF]/40 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#0055FF]/10 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-[#0055FF]">01 / TOTAL ALOKASI</span>
                            <div class="mt-4">
                                <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]">Rp 1.115.000.000</h4>
                            </div>
                            <div class="mt-5 flex items-center justify-between">
                                <span class="rounded-xl bg-blue-50 px-3.5 py-1.5 text-sm font-bold text-[#0055FF] border border-blue-100">
                                    <span id="statTotalGrand">1.426</span> Total Usulan
                                </span>
                            </div>
                        </div>

                        <!-- 02 / TOTAL PENYALURAN (Aksen Teal/Toska) -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#5ee8d6]/50 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#5ee8d6]/10 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-teal-600">02 / STATUS DILOLOSKAN</span>
                            <div class="mt-4">
                                <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]" id="statDiloloskanCount">397</h4>
                            </div>
                            <div class="mt-5 flex items-center gap-2">
                                <span class="rounded-xl bg-teal-50 px-3.5 py-1.5 text-sm font-bold text-teal-700 border border-teal-100">
                                    Memenuhi Syarat
                                </span>
                            </div>
                        </div>

                        <!-- 03 / PERLU VERIFIKASI & PERBAIKAN (Aksen Ungu/Indigo) -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-indigo-200 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-indigo-50 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-indigo-600">03 / PERLU VERIFIKASI / PERBAIKAN</span>
                            <div class="mt-4">
                                <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]" id="statProsesCount">783</h4>
                            </div>
                            <div class="mt-5 flex items-center gap-2">
                                <span class="rounded-xl bg-indigo-50 px-3.5 py-1.5 text-sm font-bold text-indigo-700 border border-indigo-100">
                                    390 Verifikasi | 393 Perbaikan
                                </span>
                            </div>
                        </div>

                        <!-- 04 / DITOLAK (Aksen Merah/Rose) -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-rose-200 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-rose-50 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-rose-600">04 / USULAN DITOLAK</span>
                            <div class="mt-4">
                                <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]" id="statDitolakCount">246</h4>
                            </div>
                            <div class="mt-5 flex items-center gap-2">
                                <span class="rounded-xl bg-rose-50 px-3.5 py-1.5 text-sm font-bold text-rose-700 border border-rose-100">
                                    Tidak Memenuhi Kriteria
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION FILTER VERIFIKASI USULAN -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <!-- SVG Filter Native -->
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-black text-[#071a33]">Filter Verifikasi Usulan</h3>
                <p class="text-xs font-bold text-slate-500">Filter data berdasarkan Status, Tahun, Jenjang, Wilayah, atau Kata Kunci</p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <button type="button" onclick="resetFilterVerifikasi()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                <!-- SVG Rotate Right Native -->
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Reset Filter
            </button>
            <label for="inputUnggahVerifikasi" class="cursor-pointer inline-flex items-center gap-2 rounded-2xl bg-[#0055FF] px-5 py-2.5 text-xs font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20">
                <!-- SVG File Upload Native -->
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                Unggah File Verifikasi
            </label>
            <input type="file" id="inputUnggahVerifikasi" class="hidden" onchange="handleFileUpload(this)" accept=".pdf,.xlsx,.csv">
        </div>
    </div>

    <!-- Grid Filter Utama (Status, Tahun, Jenjang, Wilayah Dropdown) -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4 items-end">
        
        <!-- Filter Status -->
        <div>
            <label for="filterStatus" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Status Usulan</label>
            <select id="filterStatus" onchange="applyFilterVerifikasi()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Status</option>
                <option value="Perlu Verifikasi">Perlu Verifikasi</option>
                <option value="Diloloskan">Diloloskan</option>
                <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                <option value="Ditolak">Ditolak</option>
            </select>
        </div>

        <!-- Filter Tahun -->
        <div>
            <label for="filterTahun" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun Usulan</label>
            <select id="filterTahun" onchange="applyFilterVerifikasi()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Tahun</option>
                <option value="2026">Tahun 2026</option>
                <option value="2025">Tahun 2025</option>
                <option value="2024">Tahun 2024</option>
            </select>
        </div>

        <!-- Filter Jenjang -->
        <div>
            <label for="filterJenjang" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Jenjang Pendidikan</label>
            <select id="filterJenjang" onchange="applyFilterVerifikasi()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Jenjang</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
            </select>
        </div>

        <!-- Filter Wilayah Terpadu -->
<div class="space-y-1">
    <label for="filterWilayah" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500">Wilayah (Kab/Kota/Kec)</label>
    <select id="filterWilayah" onchange="handleWilayahChange()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all">
        <option value="Semua">Semua Wilayah</option>
        <optgroup label="Provinsi Aceh">
            <option value="Aceh">Provinsi Aceh (Semua)</option>
            <option value="Kota Banda Aceh">Kota Banda Aceh (Kab/Kota)</option>
            <option value="Syiah Kuala">Kec. Syiah Kuala</option>
            <option value="Kuta Alam">Kec. Kuta Alam</option>
            <option value="Baiturrahman">Kec. Baiturrahman</option>
            <option value="Kabupaten Aceh Besar">Kab. Aceh Besar</option>
            <option value="Ingin Jaya">Kec. Ingin Jaya</option>
        </optgroup>
        <optgroup label="Provinsi Sumatera Utara">
            <option value="Sumatera Utara">Provinsi Sumatera Utara (Semua)</option>
            <option value="Kota Medan">Kota Medan</option>
            <option value="Medan Selayang">Kec. Medan Selayang</option>
            <option value="Kabupaten Deli Serdang">Kab. Deli Serdang</option>
        </optgroup>
        <optgroup label="Provinsi DKI Jakarta">
            <option value="DKI Jakarta">Provinsi DKI Jakarta (Semua)</option>
            <option value="Kota Jakarta Selatan">Kota Jakarta Selatan</option>
            <option value="Kecamatan Tebet">Kec. Tebet</option>
        </optgroup>
        <optgroup label="Provinsi Jawa Barat">
            <option value="Jawa Barat">Provinsi Jawa Barat (Semua)</option>
            <option value="Kota Bandung">Kota Bandung</option>
            <option value="Kabupaten Bandung">Kabupaten Bandung</option>
        </optgroup>
        <optgroup label="Provinsi Lainnya (Nasional)">
            <option value="Sumatera Barat">Provinsi Sumatera Barat</option>
            <option value="Riau">Provinsi Riau</option>
            <option value="Jawa Tengah">Provinsi Jawa Tengah</option>
            <option value="DI Yogyakarta">DI Yogyakarta</option>
            <option value="Jawa Timur">Provinsi Jawa Timur</option>
            <option value="Bali">Provinsi Bali</option>
            <option value="Sulawesi Selatan">Provinsi Sulawesi Selatan</option>
        </optgroup>
    </select>
</div>

    </div>

    <!-- Baris Tambahan: Pencarian Teks & Button Action -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 items-center pt-2">
        <div class="sm:col-span-3">
            <label for="searchVerifikasi" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-1">Pencarian Spesifik</label>
            <div class="relative">
                <input type="text" id="searchVerifikasi" onkeyup="applyFilterVerifikasi()" placeholder="Cari nama sekolah / kata kunci pengusul..." class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 pl-9 text-sm font-bold text-[#071a33] placeholder-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all">
                <!-- SVG Kaca Pembesar Input Native -->
                <svg class="h-4 w-4 absolute left-3.5 top-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        <div class="pt-5 sm:pt-0">
            <button type="button" onclick="applyFilterVerifikasi()" class="w-full rounded-2xl bg-[#0055FF] px-6 py-2.5 text-sm font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20 flex items-center justify-center gap-2">
                <!-- SVG Kaca Pembesar Button Native -->
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Filter
            </button>
        </div>
    </div>
</section>

<!-- TABEL VERIFIKASI -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-4">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <!-- SVG List Check Native -->
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 022 2h2a2 2 0 022-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-black text-[#071a33]">Daftar Usulan Verifikasi</h3>
                <p class="text-xs font-bold text-slate-500">Menampilkan detail usulan masuk dari sekolah dan dinas terkait</p>
            </div>
        </div>
        <span class="px-4 py-2 rounded-xl bg-blue-50 text-[#0055FF] text-xs font-black border border-blue-100">
            Total Data: <span id="totalUsulanCount">0</span> Usulan
        </span>

    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[900px]">
            <thead>
                <tr class="border-b-2 border-slate-200 bg-slate-50/80 text-slate-700">
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider rounded-l-xl">No</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Sekolah Pengusul</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Kecamatan</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Kabupaten/Kota</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Provinsi</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Pengusul</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-right">Jumlah Siswa</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Status</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center rounded-r-xl">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableVerifikasiBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-800">
                <!-- Dynamic Content JS -->
            </tbody>
        </table>
    </div>
</section>

                    <!-- FOOTER -->
                    <div class="text-sm font-bold text-slate-400 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200/60">
                        <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
                        <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
                    </div>

                </div>
            </div>
        </main>
    </div>

<!-- MODAL PERIKSA USULAN (POP-UP) -->
<div id="modalVerifikasi" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4">
    <div class="relative w-full max-w-2xl rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-2xl space-y-6">
        
        <!-- Header Modal -->
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-[#0055FF]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <h3 class="text-xl font-black text-[#071a33]" id="modalSekolah">Nama Sekolah</h3>
                    <p class="text-xs font-bold text-slate-500" id="modalDetailWilayah">Kecamatan, Kabupaten, Provinsi</p>
                </div>
            </div>
            <button onclick="tutupModal()" class="rounded-xl p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>

        <!-- Detail Informasi Usulan -->
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 rounded-2xl bg-slate-50 p-4 border border-slate-100">
            <div>
                <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">Pengusul</p>
                <p class="text-sm font-extrabold text-slate-800 mt-0.5" id="modalPengusul">-</p>
            </div>
            <div>
                <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">Jumlah Siswa</p>
                <p class="text-sm font-extrabold text-[#0055FF] mt-0.5" id="modalJumlahSiswa">-</p>
            </div>
            <div>
                <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">Tahun Anggaran</p>
                <p class="text-sm font-extrabold text-slate-800 mt-0.5" id="modalTahun">-</p>
            </div>
            <div class="col-span-2 sm:col-span-3 pt-2 border-t border-slate-200/60 flex items-center justify-between">
                <span class="text-xs font-bold text-slate-600">Status Saat Ini:</span>
                <span id="modalStatusBadge" class="px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-black">Perlu Verifikasi</span>
            </div>
        </div>

        <!-- Form Catatan Admin -->
        <div class="space-y-2">
            <label for="catatanAdmin" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500">Catatan Verifikasi / Alasan Perbaikan</label>
            <textarea id="catatanAdmin" rows="3" placeholder="Tuliskan catatan atau instruksi perbaikan untuk sekolah pengusul (opsional)..." class="w-full rounded-2xl border-2 border-slate-300 bg-white p-3 text-sm font-semibold text-[#071a33] placeholder-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all"></textarea>
        </div>

        <!-- Tombol Aksi Keputusan -->
        <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
            <button type="button" onclick="prosesKeputusan('Ditolak')" class="w-full sm:flex-1 rounded-2xl bg-rose-50 border border-rose-200 py-3 text-sm font-extrabold text-rose-600 transition hover:bg-rose-100">
                Tolak Usulan
            </button>
            <button type="button" onclick="prosesKeputusan('Perlu Perbaikan')" class="w-full sm:flex-1 rounded-2xl bg-indigo-50 border border-indigo-200 py-3 text-sm font-extrabold text-indigo-600 transition hover:bg-indigo-100">
                Minta Perbaikan
            </button>
            <button type="button" onclick="prosesKeputusan('Diloloskan')" class="w-full sm:flex-1 rounded-2xl bg-[#0055FF] py-3 text-sm font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-500/20">
                Loloskan (Setujui)
            </button>
        </div>

    </div>
</div>

<script>
    // ============================================================
    // DATA MASTER VERIFIKASI - 411 DATA DARI EXCEL
    // ============================================================
    // Data ini sengaja dipertahankan utuh. Jangan diubah menjadi
    // data dummy/potongan karena tabel dan filter menggunakan data ini.
    const masterVerifikasiData = [
    {
        "no": 1,
        "sekolah": "SMAN 5 Syiah Kuala",
        "npsn": "20250001",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Syiah Kuala",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 11,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 2,
        "sekolah": "SMAN 5 Syiah Kuala",
        "npsn": "20250001",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Syiah Kuala",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 76,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 3,
        "sekolah": "SMAN 5 Syiah Kuala",
        "npsn": "20250001",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Syiah Kuala",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 95,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 4,
        "sekolah": "SMKN 1 Syiah Kuala",
        "npsn": "20250002",
        "jenjang": "SMK",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Syiah Kuala",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 78,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 5,
        "sekolah": "SMKN 1 Syiah Kuala",
        "npsn": "20250002",
        "jenjang": "SMK",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Syiah Kuala",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 40,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 6,
        "sekolah": "SMKN 5 Kuta Alam",
        "npsn": "20250003",
        "jenjang": "SMK",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Kuta Alam",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 14,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 7,
        "sekolah": "SMKN 5 Kuta Alam",
        "npsn": "20250003",
        "jenjang": "SMK",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Kuta Alam",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 104,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 8,
        "sekolah": "SMKN 5 Kuta Alam",
        "npsn": "20250003",
        "jenjang": "SMK",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Kuta Alam",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 113,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 9,
        "sekolah": "SMAN 4 Kuta Alam",
        "npsn": "20250004",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Kuta Alam",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 49,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 10,
        "sekolah": "SMAN 4 Kuta Alam",
        "npsn": "20250004",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Kuta Alam",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 38,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 11,
        "sekolah": "SMPN 1 Baiturrahman",
        "npsn": "20250005",
        "jenjang": "SMP",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Baiturrahman",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 114,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 12,
        "sekolah": "SMPN 1 Baiturrahman",
        "npsn": "20250005",
        "jenjang": "SMP",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Baiturrahman",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 58,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 13,
        "sekolah": "SDN 3 Baiturrahman",
        "npsn": "20250006",
        "jenjang": "SD",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Baiturrahman",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 62,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 14,
        "sekolah": "SDN 3 Baiturrahman",
        "npsn": "20250006",
        "jenjang": "SD",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Baiturrahman",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 47,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 15,
        "sekolah": "SMAN 1 Baiturrahman",
        "npsn": "20250007",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kota Banda Aceh",
        "kecamatan": "Baiturrahman",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 65,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 16,
        "sekolah": "SDN 3 Ingin Jaya",
        "npsn": "20250008",
        "jenjang": "SD",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Ingin Jaya",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 83,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 17,
        "sekolah": "SDN 3 Ingin Jaya",
        "npsn": "20250008",
        "jenjang": "SD",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Ingin Jaya",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 65,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 18,
        "sekolah": "SMAN 2 Ingin Jaya",
        "npsn": "20250009",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Ingin Jaya",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 78,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 19,
        "sekolah": "SMPN 4 Ingin Jaya",
        "npsn": "20250010",
        "jenjang": "SMP",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Ingin Jaya",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 20,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 20,
        "sekolah": "SMPN 4 Ingin Jaya",
        "npsn": "20250010",
        "jenjang": "SMP",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Ingin Jaya",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 102,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 21,
        "sekolah": "SMAN 5 Darul Imarah",
        "npsn": "20250011",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Darul Imarah",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 15,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 22,
        "sekolah": "SMAN 5 Darul Imarah",
        "npsn": "20250011",
        "jenjang": "SMA",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Darul Imarah",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 64,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 23,
        "sekolah": "SMKN 3 Darul Imarah",
        "npsn": "20250013",
        "jenjang": "SMK",
        "provinsi": "Aceh",
        "kabupaten": "Kabupaten Aceh Besar",
        "kecamatan": "Darul Imarah",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 14,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 24,
        "sekolah": "SMAN 4 Medan Baru",
        "npsn": "20250014",
        "jenjang": "SMA",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Baru",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 57,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 25,
        "sekolah": "SMPN 2 Medan Baru",
        "npsn": "20250015",
        "jenjang": "SMP",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Baru",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 79,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 26,
        "sekolah": "SMPN 2 Medan Baru",
        "npsn": "20250015",
        "jenjang": "SMP",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Baru",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 108,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 27,
        "sekolah": "SMPN 2 Medan Baru",
        "npsn": "20250015",
        "jenjang": "SMP",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Baru",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 28,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 28,
        "sekolah": "SDN 3 Medan Johor",
        "npsn": "20250016",
        "jenjang": "SD",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Johor",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 89,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 29,
        "sekolah": "SMAN 4 Medan Johor",
        "npsn": "20250017",
        "jenjang": "SMA",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Johor",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 103,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 30,
        "sekolah": "SMPN 4 Medan Johor",
        "npsn": "20250018",
        "jenjang": "SMP",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Johor",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 31,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 31,
        "sekolah": "SMPN 4 Medan Johor",
        "npsn": "20250018",
        "jenjang": "SMP",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Johor",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 57,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 32,
        "sekolah": "SMKN 5 Medan Denai",
        "npsn": "20250019",
        "jenjang": "SMK",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Denai",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 112,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 33,
        "sekolah": "SMKN 5 Medan Denai",
        "npsn": "20250019",
        "jenjang": "SMK",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Denai",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 36,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 34,
        "sekolah": "SMAN 4 Medan Denai",
        "npsn": "20250020",
        "jenjang": "SMA",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kota Medan",
        "kecamatan": "Medan Denai",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 58,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 35,
        "sekolah": "SMKN 5 Lubuk Pakam",
        "npsn": "20250021",
        "jenjang": "SMK",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kabupaten Deli Serdang",
        "kecamatan": "Lubuk Pakam",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 99,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 36,
        "sekolah": "SMKN 5 Lubuk Pakam",
        "npsn": "20250021",
        "jenjang": "SMK",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kabupaten Deli Serdang",
        "kecamatan": "Lubuk Pakam",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 45,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 37,
        "sekolah": "SMAN 4 Lubuk Pakam",
        "npsn": "20250022",
        "jenjang": "SMA",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kabupaten Deli Serdang",
        "kecamatan": "Lubuk Pakam",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 22,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 38,
        "sekolah": "SMAN 4 Lubuk Pakam",
        "npsn": "20250022",
        "jenjang": "SMA",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kabupaten Deli Serdang",
        "kecamatan": "Lubuk Pakam",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 16,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 39,
        "sekolah": "SMAN 5 Tanjung Morawa",
        "npsn": "20250023",
        "jenjang": "SMA",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kabupaten Deli Serdang",
        "kecamatan": "Tanjung Morawa",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 48,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 40,
        "sekolah": "SMKN 1 Tanjung Morawa",
        "npsn": "20250025",
        "jenjang": "SMK",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kabupaten Deli Serdang",
        "kecamatan": "Tanjung Morawa",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 109,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 41,
        "sekolah": "SMKN 1 Tanjung Morawa",
        "npsn": "20250025",
        "jenjang": "SMK",
        "provinsi": "Sumatera Utara",
        "kabupaten": "Kabupaten Deli Serdang",
        "kecamatan": "Tanjung Morawa",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 49,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 42,
        "sekolah": "SDN 1 Padang Barat",
        "npsn": "20250027",
        "jenjang": "SD",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kota Padang",
        "kecamatan": "Padang Barat",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 8,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 43,
        "sekolah": "SDN 1 Padang Barat",
        "npsn": "20250027",
        "jenjang": "SD",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kota Padang",
        "kecamatan": "Padang Barat",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 18,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 44,
        "sekolah": "SDN 1 Padang Barat",
        "npsn": "20250027",
        "jenjang": "SD",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kota Padang",
        "kecamatan": "Padang Barat",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 120,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 45,
        "sekolah": "SMKN 2 Koto Tangah",
        "npsn": "20250028",
        "jenjang": "SMK",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kota Padang",
        "kecamatan": "Koto Tangah",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 24,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 46,
        "sekolah": "SDN 1 Koto Tangah",
        "npsn": "20250029",
        "jenjang": "SD",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kota Padang",
        "kecamatan": "Koto Tangah",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 12,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 47,
        "sekolah": "SMPN 4 Koto Tangah",
        "npsn": "20250030",
        "jenjang": "SMP",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kota Padang",
        "kecamatan": "Koto Tangah",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 70,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 48,
        "sekolah": "SMPN 4 Koto Tangah",
        "npsn": "20250030",
        "jenjang": "SMP",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kota Padang",
        "kecamatan": "Koto Tangah",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 93,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 49,
        "sekolah": "SMAN 3 Lubuk Basung",
        "npsn": "20250031",
        "jenjang": "SMA",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Lubuk Basung",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 68,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 50,
        "sekolah": "SMAN 3 Lubuk Basung",
        "npsn": "20250031",
        "jenjang": "SMA",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Lubuk Basung",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 57,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 51,
        "sekolah": "SMKN 5 Lubuk Basung",
        "npsn": "20250032",
        "jenjang": "SMK",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Lubuk Basung",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 24,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 52,
        "sekolah": "SMPN 5 Lubuk Basung",
        "npsn": "20250033",
        "jenjang": "SMP",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Lubuk Basung",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 86,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 53,
        "sekolah": "SMPN 5 Lubuk Basung",
        "npsn": "20250033",
        "jenjang": "SMP",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Lubuk Basung",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 24,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 54,
        "sekolah": "SMKN 3 Tilatang Kamang",
        "npsn": "20250034",
        "jenjang": "SMK",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Tilatang Kamang",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 83,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 55,
        "sekolah": "SMKN 3 Tilatang Kamang",
        "npsn": "20250034",
        "jenjang": "SMK",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Tilatang Kamang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 73,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 56,
        "sekolah": "SMPN 3 Tilatang Kamang",
        "npsn": "20250035",
        "jenjang": "SMP",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Tilatang Kamang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 110,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 57,
        "sekolah": "SDN 1 Tilatang Kamang",
        "npsn": "20250036",
        "jenjang": "SD",
        "provinsi": "Sumatera Barat",
        "kabupaten": "Kabupaten Agam",
        "kecamatan": "Tilatang Kamang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 94,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 58,
        "sekolah": "SMPN 5 Tampan",
        "npsn": "20250037",
        "jenjang": "SMP",
        "provinsi": "Riau",
        "kabupaten": "Kota Pekanbaru",
        "kecamatan": "Tampan",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 39,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 59,
        "sekolah": "SMAN 4 Tampan",
        "npsn": "20250038",
        "jenjang": "SMA",
        "provinsi": "Riau",
        "kabupaten": "Kota Pekanbaru",
        "kecamatan": "Tampan",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 75,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 60,
        "sekolah": "SMAN 4 Tampan",
        "npsn": "20250038",
        "jenjang": "SMA",
        "provinsi": "Riau",
        "kabupaten": "Kota Pekanbaru",
        "kecamatan": "Tampan",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 39,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 61,
        "sekolah": "SDN 4 Sukajadi",
        "npsn": "20250040",
        "jenjang": "SD",
        "provinsi": "Riau",
        "kabupaten": "Kota Pekanbaru",
        "kecamatan": "Sukajadi",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 114,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 62,
        "sekolah": "SDN 4 Sukajadi",
        "npsn": "20250040",
        "jenjang": "SD",
        "provinsi": "Riau",
        "kabupaten": "Kota Pekanbaru",
        "kecamatan": "Sukajadi",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 12,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 63,
        "sekolah": "SMPN 5 Sukajadi",
        "npsn": "20250041",
        "jenjang": "SMP",
        "provinsi": "Riau",
        "kabupaten": "Kota Pekanbaru",
        "kecamatan": "Sukajadi",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 31,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 64,
        "sekolah": "SMPN 5 Sukajadi",
        "npsn": "20250041",
        "jenjang": "SMP",
        "provinsi": "Riau",
        "kabupaten": "Kota Pekanbaru",
        "kecamatan": "Sukajadi",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 17,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 65,
        "sekolah": "SMAN 3 Ilir Timur I",
        "npsn": "20250043",
        "jenjang": "SMA",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kota Palembang",
        "kecamatan": "Ilir Timur I",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 53,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 66,
        "sekolah": "SMAN 3 Ilir Timur I",
        "npsn": "20250043",
        "jenjang": "SMA",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kota Palembang",
        "kecamatan": "Ilir Timur I",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 10,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 67,
        "sekolah": "SDN 4 Ilir Timur I",
        "npsn": "20250044",
        "jenjang": "SD",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kota Palembang",
        "kecamatan": "Ilir Timur I",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 49,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 68,
        "sekolah": "SDN 4 Ilir Timur I",
        "npsn": "20250044",
        "jenjang": "SD",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kota Palembang",
        "kecamatan": "Ilir Timur I",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 14,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 69,
        "sekolah": "SMKN 5 Seberang Ulu I",
        "npsn": "20250045",
        "jenjang": "SMK",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kota Palembang",
        "kecamatan": "Seberang Ulu I",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 37,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 70,
        "sekolah": "SMAN 3 Seberang Ulu I",
        "npsn": "20250046",
        "jenjang": "SMA",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kota Palembang",
        "kecamatan": "Seberang Ulu I",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 25,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 71,
        "sekolah": "SMAN 3 Seberang Ulu I",
        "npsn": "20250046",
        "jenjang": "SMA",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kota Palembang",
        "kecamatan": "Seberang Ulu I",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 101,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 72,
        "sekolah": "SMPN 1 Indralaya",
        "npsn": "20250047",
        "jenjang": "SMP",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Indralaya",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 44,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 73,
        "sekolah": "SMPN 1 Indralaya",
        "npsn": "20250047",
        "jenjang": "SMP",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Indralaya",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 41,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 74,
        "sekolah": "SMKN 3 Indralaya",
        "npsn": "20250048",
        "jenjang": "SMK",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Indralaya",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 119,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 75,
        "sekolah": "SMKN 3 Indralaya",
        "npsn": "20250048",
        "jenjang": "SMK",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Indralaya",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 10,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 76,
        "sekolah": "SMAN 4 Indralaya",
        "npsn": "20250049",
        "jenjang": "SMA",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Indralaya",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 73,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 77,
        "sekolah": "SMAN 4 Indralaya",
        "npsn": "20250049",
        "jenjang": "SMA",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Indralaya",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 65,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 78,
        "sekolah": "SDN 2 Tanjung Batu",
        "npsn": "20250050",
        "jenjang": "SD",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Tanjung Batu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 44,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 79,
        "sekolah": "SDN 2 Tanjung Batu",
        "npsn": "20250050",
        "jenjang": "SD",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Tanjung Batu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 71,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 80,
        "sekolah": "SDN 2 Tanjung Batu",
        "npsn": "20250050",
        "jenjang": "SD",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Tanjung Batu",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 98,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 81,
        "sekolah": "SMKN 4 Tanjung Batu",
        "npsn": "20250051",
        "jenjang": "SMK",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Tanjung Batu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 76,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 82,
        "sekolah": "SMKN 4 Tanjung Batu",
        "npsn": "20250051",
        "jenjang": "SMK",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Tanjung Batu",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 63,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 83,
        "sekolah": "SMKN 4 Tanjung Batu",
        "npsn": "20250051",
        "jenjang": "SMK",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Tanjung Batu",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 39,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 84,
        "sekolah": "SMPN 1 Tanjung Batu",
        "npsn": "20250052",
        "jenjang": "SMP",
        "provinsi": "Sumatera Selatan",
        "kabupaten": "Kabupaten Ogan Ilir",
        "kecamatan": "Tanjung Batu",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 110,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 85,
        "sekolah": "SDN 5 Kedaton",
        "npsn": "20250053",
        "jenjang": "SD",
        "provinsi": "Lampung",
        "kabupaten": "Kota Bandar Lampung",
        "kecamatan": "Kedaton",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 19,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 86,
        "sekolah": "SDN 5 Kedaton",
        "npsn": "20250053",
        "jenjang": "SD",
        "provinsi": "Lampung",
        "kabupaten": "Kota Bandar Lampung",
        "kecamatan": "Kedaton",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 111,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 87,
        "sekolah": "SMPN 5 Kedaton",
        "npsn": "20250054",
        "jenjang": "SMP",
        "provinsi": "Lampung",
        "kabupaten": "Kota Bandar Lampung",
        "kecamatan": "Kedaton",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 100,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 88,
        "sekolah": "SMPN 5 Kedaton",
        "npsn": "20250054",
        "jenjang": "SMP",
        "provinsi": "Lampung",
        "kabupaten": "Kota Bandar Lampung",
        "kecamatan": "Kedaton",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 8,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 89,
        "sekolah": "SMPN 1 Tanjung Karang Pusat",
        "npsn": "20250055",
        "jenjang": "SMP",
        "provinsi": "Lampung",
        "kabupaten": "Kota Bandar Lampung",
        "kecamatan": "Tanjung Karang Pusat",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 116,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 90,
        "sekolah": "SMPN 1 Tanjung Karang Pusat",
        "npsn": "20250055",
        "jenjang": "SMP",
        "provinsi": "Lampung",
        "kabupaten": "Kota Bandar Lampung",
        "kecamatan": "Tanjung Karang Pusat",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 33,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 91,
        "sekolah": "SDN 5 Tanjung Karang Pusat",
        "npsn": "20250056",
        "jenjang": "SD",
        "provinsi": "Lampung",
        "kabupaten": "Kota Bandar Lampung",
        "kecamatan": "Tanjung Karang Pusat",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 118,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 92,
        "sekolah": "SMAN 3 Kebayoran Baru",
        "npsn": "20250057",
        "jenjang": "SMA",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Kebayoran Baru",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 80,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 93,
        "sekolah": "SMAN 3 Kebayoran Baru",
        "npsn": "20250057",
        "jenjang": "SMA",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Kebayoran Baru",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 35,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 94,
        "sekolah": "SMKN 2 Kebayoran Baru",
        "npsn": "20250058",
        "jenjang": "SMK",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Kebayoran Baru",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 77,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 95,
        "sekolah": "SMKN 2 Kebayoran Baru",
        "npsn": "20250058",
        "jenjang": "SMK",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Kebayoran Baru",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 41,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 96,
        "sekolah": "SMAN 5 Pasar Minggu",
        "npsn": "20250059",
        "jenjang": "SMA",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Pasar Minggu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 95,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 97,
        "sekolah": "SMAN 5 Pasar Minggu",
        "npsn": "20250059",
        "jenjang": "SMA",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Pasar Minggu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 117,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 98,
        "sekolah": "SMKN 5 Pasar Minggu",
        "npsn": "20250060",
        "jenjang": "SMK",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Pasar Minggu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 84,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 99,
        "sekolah": "SDN 2 Cilandak",
        "npsn": "20250063",
        "jenjang": "SD",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Cilandak",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 11,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 100,
        "sekolah": "SDN 2 Cilandak",
        "npsn": "20250063",
        "jenjang": "SD",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Cilandak",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 25,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 101,
        "sekolah": "SDN 2 Cilandak",
        "npsn": "20250063",
        "jenjang": "SD",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Selatan",
        "kecamatan": "Cilandak",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 75,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 102,
        "sekolah": "SDN 2 Cakung",
        "npsn": "20250064",
        "jenjang": "SD",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Cakung",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 103,
        "sekolah": "SDN 2 Cakung",
        "npsn": "20250064",
        "jenjang": "SD",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Cakung",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 92,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 104,
        "sekolah": "SMPN 5 Cakung",
        "npsn": "20250065",
        "jenjang": "SMP",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Cakung",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 98,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 105,
        "sekolah": "SMKN 3 Cakung",
        "npsn": "20250066",
        "jenjang": "SMK",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Cakung",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 41,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 106,
        "sekolah": "SMKN 4 Duren Sawit",
        "npsn": "20250067",
        "jenjang": "SMK",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Duren Sawit",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 52,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 107,
        "sekolah": "SMKN 4 Duren Sawit",
        "npsn": "20250067",
        "jenjang": "SMK",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Duren Sawit",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 33,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 108,
        "sekolah": "SDN 1 Duren Sawit",
        "npsn": "20250068",
        "jenjang": "SD",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Duren Sawit",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 94,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 109,
        "sekolah": "SMAN 1 Duren Sawit",
        "npsn": "20250069",
        "jenjang": "SMA",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Duren Sawit",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 85,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 110,
        "sekolah": "SMAN 1 Duren Sawit",
        "npsn": "20250069",
        "jenjang": "SMA",
        "provinsi": "DKI Jakarta",
        "kabupaten": "Kota Jakarta Timur",
        "kecamatan": "Duren Sawit",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 36,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 111,
        "sekolah": "SDN 3 Coblong",
        "npsn": "20250070",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Coblong",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 52,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 112,
        "sekolah": "SDN 3 Coblong",
        "npsn": "20250070",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Coblong",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 48,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 113,
        "sekolah": "SMKN 1 Coblong",
        "npsn": "20250071",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Coblong",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 95,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 114,
        "sekolah": "SMKN 1 Coblong",
        "npsn": "20250071",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Coblong",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 74,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 115,
        "sekolah": "SMPN 1 Coblong",
        "npsn": "20250072",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Coblong",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 108,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 116,
        "sekolah": "SMPN 1 Coblong",
        "npsn": "20250072",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Coblong",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 59,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 117,
        "sekolah": "SMAN 4 Cibeunying Kidul",
        "npsn": "20250073",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Cibeunying Kidul",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 83,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 118,
        "sekolah": "SMAN 4 Cibeunying Kidul",
        "npsn": "20250073",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Cibeunying Kidul",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 42,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 119,
        "sekolah": "SMAN 4 Cibeunying Kidul",
        "npsn": "20250073",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Cibeunying Kidul",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 86,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 120,
        "sekolah": "SMKN 3 Cibeunying Kidul",
        "npsn": "20250074",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Cibeunying Kidul",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 42,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 121,
        "sekolah": "SMKN 3 Cibeunying Kidul",
        "npsn": "20250074",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Cibeunying Kidul",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 13,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 122,
        "sekolah": "SMKN 3 Cibeunying Kidul",
        "npsn": "20250074",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Cibeunying Kidul",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 54,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 123,
        "sekolah": "SMPN 1 Cibeunying Kidul",
        "npsn": "20250075",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Cibeunying Kidul",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 21,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 124,
        "sekolah": "SMKN 2 Kiaracondong",
        "npsn": "20250076",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Kiaracondong",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 14,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 125,
        "sekolah": "SMKN 2 Kiaracondong",
        "npsn": "20250076",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Kiaracondong",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 33,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 126,
        "sekolah": "SMAN 5 Kiaracondong",
        "npsn": "20250077",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Kiaracondong",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 77,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 127,
        "sekolah": "SMAN 5 Kiaracondong",
        "npsn": "20250077",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kota Bandung",
        "kecamatan": "Kiaracondong",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 37,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 128,
        "sekolah": "SMAN 4 Tarogong Kidul",
        "npsn": "20250080",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Garut",
        "kecamatan": "Tarogong Kidul",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 38,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 129,
        "sekolah": "SMAN 4 Tarogong Kidul",
        "npsn": "20250080",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Garut",
        "kecamatan": "Tarogong Kidul",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 64,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 130,
        "sekolah": "SDN 4 Cikajang",
        "npsn": "20250081",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Garut",
        "kecamatan": "Cikajang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 22,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 131,
        "sekolah": "SMAN 1 Cikajang",
        "npsn": "20250082",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Garut",
        "kecamatan": "Cikajang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 22,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 132,
        "sekolah": "SMAN 1 Cikajang",
        "npsn": "20250082",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Garut",
        "kecamatan": "Cikajang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 115,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 133,
        "sekolah": "SMPN 5 Cibinong",
        "npsn": "20250083",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bogor",
        "kecamatan": "Cibinong",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 65,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 134,
        "sekolah": "SDN 1 Cibinong",
        "npsn": "20250084",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bogor",
        "kecamatan": "Cibinong",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 98,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 135,
        "sekolah": "SMPN 2 Citeureup",
        "npsn": "20250085",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bogor",
        "kecamatan": "Citeureup",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 42,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 136,
        "sekolah": "SMPN 2 Citeureup",
        "npsn": "20250085",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bogor",
        "kecamatan": "Citeureup",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 23,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 137,
        "sekolah": "SMPN 2 Citeureup",
        "npsn": "20250085",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bogor",
        "kecamatan": "Citeureup",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 70,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 138,
        "sekolah": "SMKN 5 Citeureup",
        "npsn": "20250086",
        "jenjang": "SMK",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bogor",
        "kecamatan": "Citeureup",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 73,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 139,
        "sekolah": "SDN 2 Citeureup",
        "npsn": "20250087",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bogor",
        "kecamatan": "Citeureup",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 74,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 140,
        "sekolah": "SMAN 4 Cipondoh",
        "npsn": "20250089",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Cipondoh",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 34,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 141,
        "sekolah": "SMAN 4 Cipondoh",
        "npsn": "20250089",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Cipondoh",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 18,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 142,
        "sekolah": "SMKN 1 Karawaci",
        "npsn": "20250090",
        "jenjang": "SMK",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Karawaci",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 42,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 143,
        "sekolah": "SMAN 4 Karawaci",
        "npsn": "20250091",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Karawaci",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 8,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 144,
        "sekolah": "SMAN 4 Karawaci",
        "npsn": "20250091",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Karawaci",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 64,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 145,
        "sekolah": "SMAN 4 Karawaci",
        "npsn": "20250091",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Karawaci",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 44,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 146,
        "sekolah": "SMPN 3 Karawaci",
        "npsn": "20250092",
        "jenjang": "SMP",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Karawaci",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 14,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 147,
        "sekolah": "SMPN 3 Karawaci",
        "npsn": "20250092",
        "jenjang": "SMP",
        "provinsi": "Banten",
        "kabupaten": "Kota Tangerang",
        "kecamatan": "Karawaci",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 105,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 148,
        "sekolah": "SMAN 3 Ciruas",
        "npsn": "20250093",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Ciruas",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 33,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 149,
        "sekolah": "SMAN 3 Ciruas",
        "npsn": "20250093",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Ciruas",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 85,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 150,
        "sekolah": "SDN 4 Ciruas",
        "npsn": "20250094",
        "jenjang": "SD",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Ciruas",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 80,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 151,
        "sekolah": "SMPN 3 Kramatwatu",
        "npsn": "20250096",
        "jenjang": "SMP",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Kramatwatu",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 61,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 152,
        "sekolah": "SMPN 3 Kramatwatu",
        "npsn": "20250096",
        "jenjang": "SMP",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Kramatwatu",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 70,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 153,
        "sekolah": "SMPN 3 Kramatwatu",
        "npsn": "20250096",
        "jenjang": "SMP",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Kramatwatu",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 29,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 154,
        "sekolah": "SMAN 5 Kramatwatu",
        "npsn": "20250097",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Kramatwatu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 108,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 155,
        "sekolah": "SMAN 5 Kramatwatu",
        "npsn": "20250097",
        "jenjang": "SMA",
        "provinsi": "Banten",
        "kabupaten": "Kabupaten Serang",
        "kecamatan": "Kramatwatu",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 83,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 156,
        "sekolah": "SMKN 1 Tembalang",
        "npsn": "20250098",
        "jenjang": "SMK",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Tembalang",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 11,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 157,
        "sekolah": "SDN 2 Tembalang",
        "npsn": "20250099",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Tembalang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 13,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 158,
        "sekolah": "SDN 2 Tembalang",
        "npsn": "20250099",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Tembalang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 64,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 159,
        "sekolah": "SMPN 2 Tembalang",
        "npsn": "20250100",
        "jenjang": "SMP",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Tembalang",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 106,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 160,
        "sekolah": "SDN 3 Banyumanik",
        "npsn": "20250101",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Banyumanik",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 68,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 161,
        "sekolah": "SMPN 4 Banyumanik",
        "npsn": "20250102",
        "jenjang": "SMP",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Banyumanik",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 59,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 162,
        "sekolah": "SMPN 4 Banyumanik",
        "npsn": "20250102",
        "jenjang": "SMP",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Banyumanik",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 84,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 163,
        "sekolah": "SMPN 4 Banyumanik",
        "npsn": "20250102",
        "jenjang": "SMP",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kota Semarang",
        "kecamatan": "Banyumanik",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 41,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 164,
        "sekolah": "SDN 2 Purwokerto Timur",
        "npsn": "20250103",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Purwokerto Timur",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 107,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 165,
        "sekolah": "SDN 2 Purwokerto Timur",
        "npsn": "20250103",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Purwokerto Timur",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 90,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 166,
        "sekolah": "SDN 2 Purwokerto Timur",
        "npsn": "20250103",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Purwokerto Timur",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 8,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 167,
        "sekolah": "SMPN 3 Purwokerto Timur",
        "npsn": "20250104",
        "jenjang": "SMP",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Purwokerto Timur",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 76,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 168,
        "sekolah": "SMPN 3 Purwokerto Timur",
        "npsn": "20250104",
        "jenjang": "SMP",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Purwokerto Timur",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 18,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 169,
        "sekolah": "SDN 3 Sokaraja",
        "npsn": "20250105",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Sokaraja",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 96,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 170,
        "sekolah": "SDN 3 Sokaraja",
        "npsn": "20250105",
        "jenjang": "SD",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Sokaraja",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 100,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 171,
        "sekolah": "SMAN 5 Sokaraja",
        "npsn": "20250106",
        "jenjang": "SMA",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Sokaraja",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 44,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 172,
        "sekolah": "SMAN 5 Sokaraja",
        "npsn": "20250106",
        "jenjang": "SMA",
        "provinsi": "Jawa Tengah",
        "kabupaten": "Kabupaten Banyumas",
        "kecamatan": "Sokaraja",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 90,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 173,
        "sekolah": "SMAN 3 Depok",
        "npsn": "20250107",
        "jenjang": "SMA",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Depok",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 58,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 174,
        "sekolah": "SMAN 3 Depok",
        "npsn": "20250107",
        "jenjang": "SMA",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Depok",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 59,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 175,
        "sekolah": "SMAN 3 Depok",
        "npsn": "20250107",
        "jenjang": "SMA",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Depok",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 75,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 176,
        "sekolah": "SMKN 5 Depok",
        "npsn": "20250108",
        "jenjang": "SMK",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Depok",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 77,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 177,
        "sekolah": "SMKN 5 Depok",
        "npsn": "20250108",
        "jenjang": "SMK",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Depok",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 79,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 178,
        "sekolah": "SDN 1 Mlati",
        "npsn": "20250109",
        "jenjang": "SD",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Mlati",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 75,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 179,
        "sekolah": "SDN 1 Mlati",
        "npsn": "20250109",
        "jenjang": "SD",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Mlati",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 70,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 180,
        "sekolah": "SDN 1 Mlati",
        "npsn": "20250109",
        "jenjang": "SD",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Mlati",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 95,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 181,
        "sekolah": "SMPN 4 Mlati",
        "npsn": "20250110",
        "jenjang": "SMP",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Mlati",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 99,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 182,
        "sekolah": "SMPN 4 Mlati",
        "npsn": "20250110",
        "jenjang": "SMP",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Mlati",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 105,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 183,
        "sekolah": "SMPN 4 Mlati",
        "npsn": "20250110",
        "jenjang": "SMP",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kabupaten Sleman",
        "kecamatan": "Mlati",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 55,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 184,
        "sekolah": "SDN 1 Umbulharjo",
        "npsn": "20250111",
        "jenjang": "SD",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kota Yogyakarta",
        "kecamatan": "Umbulharjo",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 105,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 185,
        "sekolah": "SDN 1 Umbulharjo",
        "npsn": "20250111",
        "jenjang": "SD",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kota Yogyakarta",
        "kecamatan": "Umbulharjo",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 96,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 186,
        "sekolah": "SMAN 3 Umbulharjo",
        "npsn": "20250112",
        "jenjang": "SMA",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kota Yogyakarta",
        "kecamatan": "Umbulharjo",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 78,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 187,
        "sekolah": "SDN 3 Gondokusuman",
        "npsn": "20250113",
        "jenjang": "SD",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kota Yogyakarta",
        "kecamatan": "Gondokusuman",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 89,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 188,
        "sekolah": "SMAN 3 Gondokusuman",
        "npsn": "20250114",
        "jenjang": "SMA",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kota Yogyakarta",
        "kecamatan": "Gondokusuman",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 20,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 189,
        "sekolah": "SMAN 3 Gondokusuman",
        "npsn": "20250114",
        "jenjang": "SMA",
        "provinsi": "DI Yogyakarta",
        "kabupaten": "Kota Yogyakarta",
        "kecamatan": "Gondokusuman",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 74,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 190,
        "sekolah": "SMAN 2 Rungkut",
        "npsn": "20250115",
        "jenjang": "SMA",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Rungkut",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 111,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 191,
        "sekolah": "SMAN 2 Rungkut",
        "npsn": "20250115",
        "jenjang": "SMA",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Rungkut",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 67,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 192,
        "sekolah": "SMAN 2 Rungkut",
        "npsn": "20250115",
        "jenjang": "SMA",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Rungkut",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 48,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 193,
        "sekolah": "SMPN 3 Rungkut",
        "npsn": "20250116",
        "jenjang": "SMP",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Rungkut",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 115,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 194,
        "sekolah": "SMPN 3 Rungkut",
        "npsn": "20250116",
        "jenjang": "SMP",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Rungkut",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 86,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 195,
        "sekolah": "SDN 3 Sukolilo",
        "npsn": "20250117",
        "jenjang": "SD",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Sukolilo",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 98,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 196,
        "sekolah": "SDN 3 Sukolilo",
        "npsn": "20250117",
        "jenjang": "SD",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Sukolilo",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 66,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 197,
        "sekolah": "SMKN 4 Sukolilo",
        "npsn": "20250118",
        "jenjang": "SMK",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Sukolilo",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 85,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 198,
        "sekolah": "SMPN 1 Sukolilo",
        "npsn": "20250119",
        "jenjang": "SMP",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Sukolilo",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 24,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 199,
        "sekolah": "SMPN 1 Sukolilo",
        "npsn": "20250119",
        "jenjang": "SMP",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kota Surabaya",
        "kecamatan": "Sukolilo",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 20,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 200,
        "sekolah": "SDN 1 Kepanjen",
        "npsn": "20250120",
        "jenjang": "SD",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Kepanjen",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 72,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 201,
        "sekolah": "SMKN 3 Kepanjen",
        "npsn": "20250121",
        "jenjang": "SMK",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Kepanjen",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 21,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 202,
        "sekolah": "SMKN 3 Kepanjen",
        "npsn": "20250121",
        "jenjang": "SMK",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Kepanjen",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 106,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 203,
        "sekolah": "SDN 5 Singosari",
        "npsn": "20250122",
        "jenjang": "SD",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Singosari",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 85,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 204,
        "sekolah": "SDN 5 Singosari",
        "npsn": "20250122",
        "jenjang": "SD",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Singosari",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 119,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 205,
        "sekolah": "SMAN 5 Singosari",
        "npsn": "20250123",
        "jenjang": "SMA",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Singosari",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 36,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 206,
        "sekolah": "SMAN 5 Singosari",
        "npsn": "20250123",
        "jenjang": "SMA",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Singosari",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 113,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 207,
        "sekolah": "SMAN 5 Singosari",
        "npsn": "20250123",
        "jenjang": "SMA",
        "provinsi": "Jawa Timur",
        "kabupaten": "Kabupaten Malang",
        "kecamatan": "Singosari",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 118,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 208,
        "sekolah": "SMAN 4 Kuta Utara",
        "npsn": "20250124",
        "jenjang": "SMA",
        "provinsi": "Bali",
        "kabupaten": "Kabupaten Badung",
        "kecamatan": "Kuta Utara",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 209,
        "sekolah": "SMAN 4 Kuta Utara",
        "npsn": "20250124",
        "jenjang": "SMA",
        "provinsi": "Bali",
        "kabupaten": "Kabupaten Badung",
        "kecamatan": "Kuta Utara",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 100,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 210,
        "sekolah": "SMPN 3 Kuta Utara",
        "npsn": "20250125",
        "jenjang": "SMP",
        "provinsi": "Bali",
        "kabupaten": "Kabupaten Badung",
        "kecamatan": "Kuta Utara",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 111,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 211,
        "sekolah": "SMPN 3 Kuta Utara",
        "npsn": "20250125",
        "jenjang": "SMP",
        "provinsi": "Bali",
        "kabupaten": "Kabupaten Badung",
        "kecamatan": "Kuta Utara",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 115,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 212,
        "sekolah": "SMKN 1 Mengwi",
        "npsn": "20250127",
        "jenjang": "SMK",
        "provinsi": "Bali",
        "kabupaten": "Kabupaten Badung",
        "kecamatan": "Mengwi",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 50,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 213,
        "sekolah": "SMKN 1 Mengwi",
        "npsn": "20250127",
        "jenjang": "SMK",
        "provinsi": "Bali",
        "kabupaten": "Kabupaten Badung",
        "kecamatan": "Mengwi",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 105,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 214,
        "sekolah": "SMPN 3 Mengwi",
        "npsn": "20250128",
        "jenjang": "SMP",
        "provinsi": "Bali",
        "kabupaten": "Kabupaten Badung",
        "kecamatan": "Mengwi",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 108,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 215,
        "sekolah": "SMPN 4 Denpasar Selatan",
        "npsn": "20250130",
        "jenjang": "SMP",
        "provinsi": "Bali",
        "kabupaten": "Kota Denpasar",
        "kecamatan": "Denpasar Selatan",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 97,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 216,
        "sekolah": "SMAN 1 Denpasar Selatan",
        "npsn": "20250131",
        "jenjang": "SMA",
        "provinsi": "Bali",
        "kabupaten": "Kota Denpasar",
        "kecamatan": "Denpasar Selatan",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 105,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 217,
        "sekolah": "SMAN 1 Denpasar Selatan",
        "npsn": "20250131",
        "jenjang": "SMA",
        "provinsi": "Bali",
        "kabupaten": "Kota Denpasar",
        "kecamatan": "Denpasar Selatan",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 69,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 218,
        "sekolah": "SMAN 3 Denpasar Barat",
        "npsn": "20250132",
        "jenjang": "SMA",
        "provinsi": "Bali",
        "kabupaten": "Kota Denpasar",
        "kecamatan": "Denpasar Barat",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 17,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 219,
        "sekolah": "SMPN 4 Denpasar Barat",
        "npsn": "20250133",
        "jenjang": "SMP",
        "provinsi": "Bali",
        "kabupaten": "Kota Denpasar",
        "kecamatan": "Denpasar Barat",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 49,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 220,
        "sekolah": "SMPN 4 Denpasar Barat",
        "npsn": "20250133",
        "jenjang": "SMP",
        "provinsi": "Bali",
        "kabupaten": "Kota Denpasar",
        "kecamatan": "Denpasar Barat",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 106,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 221,
        "sekolah": "SDN 3 Denpasar Barat",
        "npsn": "20250134",
        "jenjang": "SD",
        "provinsi": "Bali",
        "kabupaten": "Kota Denpasar",
        "kecamatan": "Denpasar Barat",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 13,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 222,
        "sekolah": "SMAN 5 Selaparang",
        "npsn": "20250135",
        "jenjang": "SMA",
        "provinsi": "Nusa Tenggara Barat",
        "kabupaten": "Kota Mataram",
        "kecamatan": "Selaparang",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 28,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 223,
        "sekolah": "SMAN 5 Selaparang",
        "npsn": "20250135",
        "jenjang": "SMA",
        "provinsi": "Nusa Tenggara Barat",
        "kabupaten": "Kota Mataram",
        "kecamatan": "Selaparang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 96,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 224,
        "sekolah": "SDN 1 Selaparang",
        "npsn": "20250136",
        "jenjang": "SD",
        "provinsi": "Nusa Tenggara Barat",
        "kabupaten": "Kota Mataram",
        "kecamatan": "Selaparang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 74,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 225,
        "sekolah": "SDN 1 Selaparang",
        "npsn": "20250136",
        "jenjang": "SD",
        "provinsi": "Nusa Tenggara Barat",
        "kabupaten": "Kota Mataram",
        "kecamatan": "Selaparang",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 101,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 226,
        "sekolah": "SMPN 1 Cakranegara",
        "npsn": "20250137",
        "jenjang": "SMP",
        "provinsi": "Nusa Tenggara Barat",
        "kabupaten": "Kota Mataram",
        "kecamatan": "Cakranegara",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 87,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 227,
        "sekolah": "SMAN 1 Cakranegara",
        "npsn": "20250138",
        "jenjang": "SMA",
        "provinsi": "Nusa Tenggara Barat",
        "kabupaten": "Kota Mataram",
        "kecamatan": "Cakranegara",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 228,
        "sekolah": "SMPN 3 Oebobo",
        "npsn": "20250139",
        "jenjang": "SMP",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Oebobo",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 229,
        "sekolah": "SMPN 3 Oebobo",
        "npsn": "20250139",
        "jenjang": "SMP",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Oebobo",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 22,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 230,
        "sekolah": "SMAN 5 Oebobo",
        "npsn": "20250140",
        "jenjang": "SMA",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Oebobo",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 119,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 231,
        "sekolah": "SMAN 5 Oebobo",
        "npsn": "20250140",
        "jenjang": "SMA",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Oebobo",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 95,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 232,
        "sekolah": "SDN 3 Kelapa Lima",
        "npsn": "20250141",
        "jenjang": "SD",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Kelapa Lima",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 62,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 233,
        "sekolah": "SDN 3 Kelapa Lima",
        "npsn": "20250141",
        "jenjang": "SD",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Kelapa Lima",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 77,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 234,
        "sekolah": "SMPN 4 Kelapa Lima",
        "npsn": "20250142",
        "jenjang": "SMP",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Kelapa Lima",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 19,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 235,
        "sekolah": "SMPN 4 Kelapa Lima",
        "npsn": "20250142",
        "jenjang": "SMP",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Kelapa Lima",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 62,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 236,
        "sekolah": "SMKN 4 Kelapa Lima",
        "npsn": "20250143",
        "jenjang": "SMK",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Kelapa Lima",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 37,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 237,
        "sekolah": "SMKN 4 Kelapa Lima",
        "npsn": "20250143",
        "jenjang": "SMK",
        "provinsi": "Nusa Tenggara Timur",
        "kabupaten": "Kota Kupang",
        "kecamatan": "Kelapa Lima",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 49,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 238,
        "sekolah": "SMKN 2 Pontianak Kota",
        "npsn": "20250145",
        "jenjang": "SMK",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Kota",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 116,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 239,
        "sekolah": "SMKN 2 Pontianak Kota",
        "npsn": "20250145",
        "jenjang": "SMK",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Kota",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 41,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 240,
        "sekolah": "SDN 5 Pontianak Kota",
        "npsn": "20250146",
        "jenjang": "SD",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Kota",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 64,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 241,
        "sekolah": "SMKN 2 Pontianak Selatan",
        "npsn": "20250147",
        "jenjang": "SMK",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Selatan",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 18,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 242,
        "sekolah": "SMKN 2 Pontianak Selatan",
        "npsn": "20250147",
        "jenjang": "SMK",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Selatan",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 62,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 243,
        "sekolah": "SMKN 2 Pontianak Selatan",
        "npsn": "20250147",
        "jenjang": "SMK",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Selatan",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 44,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 244,
        "sekolah": "SMPN 2 Pontianak Selatan",
        "npsn": "20250148",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Selatan",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 71,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 245,
        "sekolah": "SMPN 2 Pontianak Selatan",
        "npsn": "20250148",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Barat",
        "kabupaten": "Kota Pontianak",
        "kecamatan": "Pontianak Selatan",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 50,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 246,
        "sekolah": "SDN 5 Martapura",
        "npsn": "20250149",
        "jenjang": "SD",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Martapura",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 81,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 247,
        "sekolah": "SMPN 4 Martapura",
        "npsn": "20250150",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Martapura",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 53,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 248,
        "sekolah": "SMPN 4 Martapura",
        "npsn": "20250150",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Martapura",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 18,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 249,
        "sekolah": "SMAN 5 Astambul",
        "npsn": "20250151",
        "jenjang": "SMA",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 72,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 250,
        "sekolah": "SMAN 5 Astambul",
        "npsn": "20250151",
        "jenjang": "SMA",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 79,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 251,
        "sekolah": "SMPN 1 Astambul",
        "npsn": "20250152",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 53,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 252,
        "sekolah": "SMPN 1 Astambul",
        "npsn": "20250152",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 253,
        "sekolah": "SMPN 1 Astambul",
        "npsn": "20250152",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 86,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 254,
        "sekolah": "SDN 2 Astambul",
        "npsn": "20250153",
        "jenjang": "SD",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 91,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 255,
        "sekolah": "SDN 2 Astambul",
        "npsn": "20250153",
        "jenjang": "SD",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 114,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 256,
        "sekolah": "SDN 2 Astambul",
        "npsn": "20250153",
        "jenjang": "SD",
        "provinsi": "Kalimantan Selatan",
        "kabupaten": "Kabupaten Banjar",
        "kecamatan": "Astambul",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 61,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 257,
        "sekolah": "SMAN 5 Samarinda Ulu",
        "npsn": "20250154",
        "jenjang": "SMA",
        "provinsi": "Kalimantan Timur",
        "kabupaten": "Kota Samarinda",
        "kecamatan": "Samarinda Ulu",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 8,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 258,
        "sekolah": "SMPN 3 Samarinda Ulu",
        "npsn": "20250155",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Timur",
        "kabupaten": "Kota Samarinda",
        "kecamatan": "Samarinda Ulu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 38,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 259,
        "sekolah": "SMPN 3 Samarinda Ulu",
        "npsn": "20250155",
        "jenjang": "SMP",
        "provinsi": "Kalimantan Timur",
        "kabupaten": "Kota Samarinda",
        "kecamatan": "Samarinda Ulu",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 67,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 260,
        "sekolah": "SDN 2 Sungai Kunjang",
        "npsn": "20250156",
        "jenjang": "SD",
        "provinsi": "Kalimantan Timur",
        "kabupaten": "Kota Samarinda",
        "kecamatan": "Sungai Kunjang",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 15,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 261,
        "sekolah": "SDN 2 Sungai Kunjang",
        "npsn": "20250156",
        "jenjang": "SD",
        "provinsi": "Kalimantan Timur",
        "kabupaten": "Kota Samarinda",
        "kecamatan": "Sungai Kunjang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 262,
        "sekolah": "SMAN 4 Sungai Kunjang",
        "npsn": "20250157",
        "jenjang": "SMA",
        "provinsi": "Kalimantan Timur",
        "kabupaten": "Kota Samarinda",
        "kecamatan": "Sungai Kunjang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 21,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 263,
        "sekolah": "SMAN 4 Sungai Kunjang",
        "npsn": "20250157",
        "jenjang": "SMA",
        "provinsi": "Kalimantan Timur",
        "kabupaten": "Kota Samarinda",
        "kecamatan": "Sungai Kunjang",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 112,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 264,
        "sekolah": "SMPN 5 Tamalanrea",
        "npsn": "20250158",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Tamalanrea",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 13,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 265,
        "sekolah": "SMPN 5 Tamalanrea",
        "npsn": "20250158",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Tamalanrea",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 117,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 266,
        "sekolah": "SMAN 2 Tamalanrea",
        "npsn": "20250159",
        "jenjang": "SMA",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Tamalanrea",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 64,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 267,
        "sekolah": "SMAN 3 Rappocini",
        "npsn": "20250160",
        "jenjang": "SMA",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Rappocini",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 97,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 268,
        "sekolah": "SDN 2 Rappocini",
        "npsn": "20250161",
        "jenjang": "SD",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Rappocini",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 39,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 269,
        "sekolah": "SMPN 3 Rappocini",
        "npsn": "20250162",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Rappocini",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 108,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 270,
        "sekolah": "SMPN 3 Rappocini",
        "npsn": "20250162",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Rappocini",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 82,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 271,
        "sekolah": "SMPN 3 Rappocini",
        "npsn": "20250162",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kota Makassar",
        "kecamatan": "Rappocini",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 105,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 272,
        "sekolah": "SMKN 5 Somba Opu",
        "npsn": "20250163",
        "jenjang": "SMK",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Somba Opu",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 75,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 273,
        "sekolah": "SMKN 5 Somba Opu",
        "npsn": "20250163",
        "jenjang": "SMK",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Somba Opu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 107,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 274,
        "sekolah": "SMKN 5 Somba Opu",
        "npsn": "20250163",
        "jenjang": "SMK",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Somba Opu",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 79,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 275,
        "sekolah": "SMAN 4 Somba Opu",
        "npsn": "20250164",
        "jenjang": "SMA",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Somba Opu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 87,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 276,
        "sekolah": "SMAN 4 Somba Opu",
        "npsn": "20250164",
        "jenjang": "SMA",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Somba Opu",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 29,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 277,
        "sekolah": "SMPN 5 Somba Opu",
        "npsn": "20250165",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Somba Opu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 74,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 278,
        "sekolah": "SMPN 5 Somba Opu",
        "npsn": "20250165",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Somba Opu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 113,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 279,
        "sekolah": "SMPN 2 Pallangga",
        "npsn": "20250166",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Pallangga",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 51,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 280,
        "sekolah": "SDN 4 Pallangga",
        "npsn": "20250167",
        "jenjang": "SD",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Pallangga",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 86,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 281,
        "sekolah": "SDN 4 Pallangga",
        "npsn": "20250167",
        "jenjang": "SD",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Pallangga",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 84,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 282,
        "sekolah": "SMKN 1 Pallangga",
        "npsn": "20250168",
        "jenjang": "SMK",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Pallangga",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 42,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 283,
        "sekolah": "SMKN 1 Pallangga",
        "npsn": "20250168",
        "jenjang": "SMK",
        "provinsi": "Sulawesi Selatan",
        "kabupaten": "Kabupaten Gowa",
        "kecamatan": "Pallangga",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 47,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 284,
        "sekolah": "SMKN 1 Malalayang",
        "npsn": "20250169",
        "jenjang": "SMK",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Malalayang",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 105,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 285,
        "sekolah": "SMKN 1 Malalayang",
        "npsn": "20250169",
        "jenjang": "SMK",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Malalayang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 42,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 286,
        "sekolah": "SDN 3 Malalayang",
        "npsn": "20250170",
        "jenjang": "SD",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Malalayang",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 45,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 287,
        "sekolah": "SDN 3 Malalayang",
        "npsn": "20250170",
        "jenjang": "SD",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Malalayang",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 12,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 288,
        "sekolah": "SMPN 1 Wanea",
        "npsn": "20250172",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Wanea",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 14,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 289,
        "sekolah": "SMPN 1 Wanea",
        "npsn": "20250172",
        "jenjang": "SMP",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Wanea",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 117,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 290,
        "sekolah": "SMAN 5 Wanea",
        "npsn": "20250173",
        "jenjang": "SMA",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Wanea",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 8,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 291,
        "sekolah": "SDN 2 Wanea",
        "npsn": "20250174",
        "jenjang": "SD",
        "provinsi": "Sulawesi Utara",
        "kabupaten": "Kota Manado",
        "kecamatan": "Wanea",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 33,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 292,
        "sekolah": "SDN 5 Sirimau",
        "npsn": "20250175",
        "jenjang": "SD",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Sirimau",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 56,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 293,
        "sekolah": "SMPN 5 Sirimau",
        "npsn": "20250176",
        "jenjang": "SMP",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Sirimau",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 105,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 294,
        "sekolah": "SMPN 5 Sirimau",
        "npsn": "20250176",
        "jenjang": "SMP",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Sirimau",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 19,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 295,
        "sekolah": "SMAN 2 Sirimau",
        "npsn": "20250177",
        "jenjang": "SMA",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Sirimau",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 94,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 296,
        "sekolah": "SMAN 2 Sirimau",
        "npsn": "20250177",
        "jenjang": "SMA",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Sirimau",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 111,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 297,
        "sekolah": "SMAN 2 Sirimau",
        "npsn": "20250177",
        "jenjang": "SMA",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Sirimau",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 38,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 298,
        "sekolah": "SDN 4 Nusaniwe",
        "npsn": "20250178",
        "jenjang": "SD",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Nusaniwe",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 97,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 299,
        "sekolah": "SDN 4 Nusaniwe",
        "npsn": "20250178",
        "jenjang": "SD",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Nusaniwe",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 113,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 300,
        "sekolah": "SMKN 3 Nusaniwe",
        "npsn": "20250179",
        "jenjang": "SMK",
        "provinsi": "Maluku",
        "kabupaten": "Kota Ambon",
        "kecamatan": "Nusaniwe",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 61,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 301,
        "sekolah": "SMAN 2 Abepura",
        "npsn": "20250180",
        "jenjang": "SMA",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Abepura",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 115,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 302,
        "sekolah": "SDN 3 Abepura",
        "npsn": "20250181",
        "jenjang": "SD",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Abepura",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 26,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 303,
        "sekolah": "SDN 3 Abepura",
        "npsn": "20250181",
        "jenjang": "SD",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Abepura",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 67,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 304,
        "sekolah": "SDN 3 Abepura",
        "npsn": "20250181",
        "jenjang": "SD",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Abepura",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 37,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 305,
        "sekolah": "SMKN 3 Abepura",
        "npsn": "20250182",
        "jenjang": "SMK",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Abepura",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 58,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 306,
        "sekolah": "SMKN 3 Abepura",
        "npsn": "20250182",
        "jenjang": "SMK",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Abepura",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 69,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 307,
        "sekolah": "SMAN 2 Jayapura Utara",
        "npsn": "20250183",
        "jenjang": "SMA",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Jayapura Utara",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 27,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 308,
        "sekolah": "SDN 1 Jayapura Utara",
        "npsn": "20250184",
        "jenjang": "SD",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Jayapura Utara",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 95,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 309,
        "sekolah": "SDN 1 Jayapura Utara",
        "npsn": "20250184",
        "jenjang": "SD",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Jayapura Utara",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 113,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 310,
        "sekolah": "SMPN 5 Jayapura Utara",
        "npsn": "20250185",
        "jenjang": "SMP",
        "provinsi": "Papua",
        "kabupaten": "Kota Jayapura",
        "kecamatan": "Jayapura Utara",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 44,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 311,
        "sekolah": "SDN 3 Soreang",
        "npsn": "20250186",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 110,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 312,
        "sekolah": "SDN 3 Soreang",
        "npsn": "20250186",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 97,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 313,
        "sekolah": "SDN 3 Soreang",
        "npsn": "20250186",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 39,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 314,
        "sekolah": "SMPN 2 Soreang",
        "npsn": "20250187",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 33,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 315,
        "sekolah": "SMAN 2 Soreang",
        "npsn": "20250188",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 39,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 316,
        "sekolah": "SMAN 2 Soreang",
        "npsn": "20250188",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 115,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 317,
        "sekolah": "SMAN 2 Soreang",
        "npsn": "20250188",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 20,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 318,
        "sekolah": "SDN 3 Ciwidey",
        "npsn": "20250189",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciwidey",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 90,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 319,
        "sekolah": "SDN 3 Ciwidey",
        "npsn": "20250189",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciwidey",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 114,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 320,
        "sekolah": "SMPN 1 Ciwidey",
        "npsn": "20250190",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciwidey",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 96,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 321,
        "sekolah": "SMPN 1 Ciwidey",
        "npsn": "20250190",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciwidey",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 32,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 322,
        "sekolah": "SMAN 1 Ciwidey",
        "npsn": "20250191",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciwidey",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 81,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 323,
        "sekolah": "SMAN 1 Ciwidey",
        "npsn": "20250191",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciwidey",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 74,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 324,
        "sekolah": "SDN 1 Pasirjambu",
        "npsn": "20250192",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 117,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 325,
        "sekolah": "SDN 1 Pasirjambu",
        "npsn": "20250192",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 27,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 326,
        "sekolah": "SDN 1 Pasirjambu",
        "npsn": "20250192",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 61,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 327,
        "sekolah": "SMPN 2 Pasirjambu",
        "npsn": "20250193",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 328,
        "sekolah": "SMPN 2 Pasirjambu",
        "npsn": "20250193",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 17,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 329,
        "sekolah": "SMPN 2 Pasirjambu",
        "npsn": "20250193",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 105,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 330,
        "sekolah": "SMAN 1 Pasirjambu",
        "npsn": "20250194",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 118,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 331,
        "sekolah": "SMAN 1 Pasirjambu",
        "npsn": "20250194",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pasirjambu",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 14,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 332,
        "sekolah": "SDN 1 Banjaran",
        "npsn": "20250195",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Banjaran",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 60,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 333,
        "sekolah": "SDN 1 Banjaran",
        "npsn": "20250195",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Banjaran",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 114,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 334,
        "sekolah": "SMPN 1 Banjaran",
        "npsn": "20250196",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Banjaran",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 74,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 335,
        "sekolah": "SMAN 3 Banjaran",
        "npsn": "20250197",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Banjaran",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 37,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 336,
        "sekolah": "SMAN 3 Banjaran",
        "npsn": "20250197",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Banjaran",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 28,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 337,
        "sekolah": "SDN 3 Katapang",
        "npsn": "20250198",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Katapang",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 11,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 338,
        "sekolah": "SDN 3 Katapang",
        "npsn": "20250198",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Katapang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 99,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 339,
        "sekolah": "SMAN 1 Katapang",
        "npsn": "20250200",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Katapang",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 24,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 340,
        "sekolah": "SDN 2 Margahayu",
        "npsn": "20250201",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Margahayu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 9,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 341,
        "sekolah": "SDN 2 Margahayu",
        "npsn": "20250201",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Margahayu",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 102,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 342,
        "sekolah": "SMPN 2 Margahayu",
        "npsn": "20250202",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Margahayu",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 93,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 343,
        "sekolah": "SDN 1 Dayeuhkolot",
        "npsn": "20250203",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Dayeuhkolot",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 81,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 344,
        "sekolah": "SMPN 3 Dayeuhkolot",
        "npsn": "20250204",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Dayeuhkolot",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 89,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 345,
        "sekolah": "SMPN 3 Dayeuhkolot",
        "npsn": "20250204",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Dayeuhkolot",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 50,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 346,
        "sekolah": "SMAN 1 Dayeuhkolot",
        "npsn": "20250205",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Dayeuhkolot",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 70,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 347,
        "sekolah": "SMAN 1 Dayeuhkolot",
        "npsn": "20250205",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Dayeuhkolot",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 111,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 348,
        "sekolah": "SMAN 1 Dayeuhkolot",
        "npsn": "20250205",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Dayeuhkolot",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 104,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 349,
        "sekolah": "SMPN 2 Bojongsoang",
        "npsn": "20250207",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Bojongsoang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 109,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 350,
        "sekolah": "SMPN 2 Bojongsoang",
        "npsn": "20250207",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Bojongsoang",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 54,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 351,
        "sekolah": "SMAN 3 Bojongsoang",
        "npsn": "20250208",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Bojongsoang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 70,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 352,
        "sekolah": "SDN 1 Baleendah",
        "npsn": "20250209",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Baleendah",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 48,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 353,
        "sekolah": "SDN 1 Baleendah",
        "npsn": "20250209",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Baleendah",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 20,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 354,
        "sekolah": "SDN 1 Baleendah",
        "npsn": "20250209",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Baleendah",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 97,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 355,
        "sekolah": "SMPN 2 Baleendah",
        "npsn": "20250210",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Baleendah",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 34,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 356,
        "sekolah": "SMPN 2 Baleendah",
        "npsn": "20250210",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Baleendah",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 96,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 357,
        "sekolah": "SDN 2 Majalaya",
        "npsn": "20250211",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Majalaya",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 25,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 358,
        "sekolah": "SMPN 3 Majalaya",
        "npsn": "20250212",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Majalaya",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 22,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 359,
        "sekolah": "SDN 2 Ciparay",
        "npsn": "20250213",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciparay",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 12,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 360,
        "sekolah": "SDN 2 Ciparay",
        "npsn": "20250213",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciparay",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 47,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 361,
        "sekolah": "SMPN 2 Ciparay",
        "npsn": "20250214",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciparay",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 103,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 362,
        "sekolah": "SMPN 2 Ciparay",
        "npsn": "20250214",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Ciparay",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 60,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 363,
        "sekolah": "SDN 3 Pacet",
        "npsn": "20250215",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pacet",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 58,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 364,
        "sekolah": "SDN 3 Pacet",
        "npsn": "20250215",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pacet",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 113,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 365,
        "sekolah": "SMPN 1 Pacet",
        "npsn": "20250216",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pacet",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 78,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 366,
        "sekolah": "SMPN 1 Pacet",
        "npsn": "20250216",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pacet",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 88,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 367,
        "sekolah": "SMAN 3 Pacet",
        "npsn": "20250217",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pacet",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 70,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 368,
        "sekolah": "SMAN 3 Pacet",
        "npsn": "20250217",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pacet",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 12,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 369,
        "sekolah": "SDN 2 Cicalengka",
        "npsn": "20250218",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cicalengka",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 64,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 370,
        "sekolah": "SMPN 3 Cicalengka",
        "npsn": "20250219",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cicalengka",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 89,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 371,
        "sekolah": "SMPN 3 Cicalengka",
        "npsn": "20250219",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cicalengka",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 109,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 372,
        "sekolah": "SMPN 3 Cicalengka",
        "npsn": "20250219",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cicalengka",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 55,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 373,
        "sekolah": "SDN 1 Rancaekek",
        "npsn": "20250220",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Rancaekek",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 70,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 374,
        "sekolah": "SDN 1 Rancaekek",
        "npsn": "20250220",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Rancaekek",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 106,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 375,
        "sekolah": "SMPN 1 Rancaekek",
        "npsn": "20250221",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Rancaekek",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 109,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 376,
        "sekolah": "SMPN 1 Rancaekek",
        "npsn": "20250221",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Rancaekek",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 104,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 377,
        "sekolah": "SMAN 2 Rancaekek",
        "npsn": "20250222",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Rancaekek",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 81,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 378,
        "sekolah": "SMAN 2 Rancaekek",
        "npsn": "20250222",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Rancaekek",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 17,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 379,
        "sekolah": "SMAN 2 Rancaekek",
        "npsn": "20250222",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Rancaekek",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 96,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 380,
        "sekolah": "SDN 2 Cileunyi",
        "npsn": "20250223",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cileunyi",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 80,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 381,
        "sekolah": "SDN 2 Cileunyi",
        "npsn": "20250223",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cileunyi",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 23,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 382,
        "sekolah": "SMPN 3 Cileunyi",
        "npsn": "20250224",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cileunyi",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 26,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 383,
        "sekolah": "SMPN 3 Cileunyi",
        "npsn": "20250224",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cileunyi",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 70,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 384,
        "sekolah": "SMPN 3 Cileunyi",
        "npsn": "20250224",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cileunyi",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 65,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 385,
        "sekolah": "SDN 2 Arjasari",
        "npsn": "20250225",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 73,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 386,
        "sekolah": "SDN 2 Arjasari",
        "npsn": "20250225",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 102,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 387,
        "sekolah": "SDN 2 Arjasari",
        "npsn": "20250225",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 49,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 388,
        "sekolah": "SMPN 2 Arjasari",
        "npsn": "20250226",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 102,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 389,
        "sekolah": "SMPN 2 Arjasari",
        "npsn": "20250226",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 116,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 390,
        "sekolah": "SMAN 2 Arjasari",
        "npsn": "20250227",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 33,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 391,
        "sekolah": "SMAN 2 Arjasari",
        "npsn": "20250227",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 30,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 392,
        "sekolah": "SMAN 2 Arjasari",
        "npsn": "20250227",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Arjasari",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 22,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 393,
        "sekolah": "SDN 2 Pangalengan",
        "npsn": "20250228",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pangalengan",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 32,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 394,
        "sekolah": "SDN 2 Pangalengan",
        "npsn": "20250228",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pangalengan",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 84,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 395,
        "sekolah": "SMPN 3 Pangalengan",
        "npsn": "20250229",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Pangalengan",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 27,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 396,
        "sekolah": "SDN 2 Cimenyan",
        "npsn": "20250231",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cimenyan",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 102,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 397,
        "sekolah": "SDN 2 Cimenyan",
        "npsn": "20250231",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cimenyan",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 80,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 398,
        "sekolah": "SMPN 2 Cimenyan",
        "npsn": "20250232",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cimenyan",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 17,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 399,
        "sekolah": "SMPN 2 Cimenyan",
        "npsn": "20250232",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cimenyan",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 18,
        "status": "Perlu Perbaikan",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 400,
        "sekolah": "SMPN 2 Cimenyan",
        "npsn": "20250232",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Cimenyan",
        "tahun": 2026,
        "pengusul": "Sekolah",
        "jumlahSiswa": 84,
        "status": "Ditolak",
        "catatan": "Lampiran Kurang Jelas",
        "aksi": "Periksa"
    },
    {
        "no": 401,
        "sekolah": "SDN 2 Solokanjeruk",
        "npsn": "20250233",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Solokanjeruk",
        "tahun": 2024,
        "pengusul": "Dinas",
        "jumlahSiswa": 22,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 402,
        "sekolah": "SDN 2 Solokanjeruk",
        "npsn": "20250233",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Solokanjeruk",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 35,
        "status": "Perlu Perbaikan",
        "catatan": "Data Orang Tua Belum Lengkap",
        "aksi": "Periksa"
    },
    {
        "no": 403,
        "sekolah": "SMAN 2 Solokanjeruk",
        "npsn": "20250235",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Solokanjeruk",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 49,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 404,
        "sekolah": "SMAN 2 Solokanjeruk",
        "npsn": "20250235",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Solokanjeruk",
        "tahun": 2026,
        "pengusul": "Dinas",
        "jumlahSiswa": 43,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 405,
        "sekolah": "SDN 2 Kutawaringin",
        "npsn": "20250236",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Kutawaringin",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 40,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 406,
        "sekolah": "SDN 2 Kutawaringin",
        "npsn": "20250236",
        "jenjang": "SD",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Kutawaringin",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 94,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 407,
        "sekolah": "SMPN 2 Kutawaringin",
        "npsn": "20250237",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Kutawaringin",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 108,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 408,
        "sekolah": "SMPN 2 Kutawaringin",
        "npsn": "20250237",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Kutawaringin",
        "tahun": 2025,
        "pengusul": "Sekolah",
        "jumlahSiswa": 57,
        "status": "Perlu Verifikasi",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Periksa"
    },
    {
        "no": 409,
        "sekolah": "SMAN 3 Kutawaringin",
        "npsn": "20250238",
        "jenjang": "SMA",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Kutawaringin",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 118,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 410,
        "sekolah": "SMPN 1 Soreang",
        "npsn": "20251000",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2024,
        "pengusul": "Sekolah",
        "jumlahSiswa": 110,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    },
    {
        "no": 411,
        "sekolah": "SMPN 1 Soreang",
        "npsn": "20251000",
        "jenjang": "SMP",
        "provinsi": "Jawa Barat",
        "kabupaten": "Kabupaten Bandung",
        "kecamatan": "Soreang",
        "tahun": 2025,
        "pengusul": "Dinas",
        "jumlahSiswa": 119,
        "status": "Diloloskan",
        "catatan": "Sesuai Cakupan Akun",
        "aksi": "Lanjutkan"
    }
];

    // ============================================================
    // HELPER
    // ============================================================
    function escapeHtml(value) {
        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function getStatusBadge(status) {
        if (status === 'Diloloskan') {
            return '<span class="px-3.5 py-1 rounded-full bg-emerald-200 text-emerald-900 border border-emerald-400 text-xs font-black">Diloloskan</span>';
        }
        if (status === 'Perlu Verifikasi') {
            return '<span class="px-3.5 py-1 rounded-full bg-amber-200 text-amber-900 border border-amber-400 text-xs font-black">Perlu Verifikasi</span>';
        }
        if (status === 'Perlu Perbaikan') {
            return '<span class="px-3.5 py-1 rounded-full bg-blue-200 text-blue-900 border border-blue-400 text-xs font-black">Perlu Perbaikan</span>';
        }
        if (status === 'Ditolak') {
            return '<span class="px-3.5 py-1 rounded-full bg-rose-200 text-rose-900 border border-rose-400 text-xs font-black">Ditolak</span>';
        }
        return '<span class="px-3.5 py-1 rounded-full bg-slate-200 text-slate-800 border border-slate-300 text-xs font-black">' + escapeHtml(status) + '</span>';
    }

    function getRowClass(status) {
        if (status === 'Diloloskan') {
            return 'bg-emerald-100 hover:bg-emerald-200 border-b-2 border-emerald-300 transition-all';
        }
        if (status === 'Perlu Verifikasi') {
            return 'bg-amber-100 hover:bg-amber-200 border-b-2 border-amber-300 transition-all';
        }
        if (status === 'Perlu Perbaikan') {
            return 'bg-blue-100 hover:bg-blue-200 border-b-2 border-blue-300 transition-all';
        }
        if (status === 'Ditolak') {
            return 'bg-rose-100 hover:bg-rose-200 border-b-2 border-rose-300 transition-all';
        }
        return 'hover:bg-slate-100 transition-all border-b-2 border-slate-200';
    }

    // ============================================================
    // TABEL
    // ============================================================
    function renderVerifikasiTable(data) {
        const tbody = document.getElementById('tableVerifikasiBody');
        const totalCountSpan = document.getElementById('totalUsulanCount');

        if (!tbody) return;

        tbody.innerHTML = '';
        if (totalCountSpan) totalCountSpan.innerText = data.length;

        if (data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center py-8 text-slate-400 font-bold text-sm">
                        Tidak ada data usulan yang cocok dengan kriteria filter.
                    </td>
                </tr>
            `;
            return;
        }

        data.forEach((item, index) => {
            const tr = document.createElement('tr');
            tr.className = getRowClass(item.status);

            tr.innerHTML = `
                <td class="p-4 mono font-bold text-slate-500">${index + 1}</td>
                <td class="p-4 font-black text-[#071a33]">${escapeHtml(item.sekolah)}</td>
                <td class="p-4 font-semibold text-slate-700">${escapeHtml(item.kecamatan)}</td>
                <td class="p-4 font-bold text-slate-800">${escapeHtml(item.kabupaten)}</td>
                <td class="p-4 font-semibold text-slate-700">${escapeHtml(item.provinsi)}</td>
                <td class="p-4 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-md bg-white/80 text-slate-800 font-bold border border-slate-200 text-xs">${escapeHtml(item.pengusul)}</span>
                </td>
                <td class="p-4 text-right mono font-black text-[#0055FF]">${escapeHtml(item.jumlahSiswa)} Siswa</td>
                <td class="p-4 text-center">${getStatusBadge(item.status)}</td>
                <td class="p-4 text-center">
                    <button type="button" onclick="periksaVerifikasi(${Number(item.no)})" class="px-3.5 py-1.5 rounded-xl bg-[#0055FF] hover:bg-blue-700 text-white font-extrabold text-xs transition shadow-sm">Periksa</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // ============================================================
    // DROPDOWN WILAYAH - DIBANGUN DARI SELURUH 411 DATA
    // ============================================================
    function buildWilayahOptions() {
        const select = document.getElementById('filterWilayah');
        if (!select) return;

        const currentValue = select.value || 'Semua';
        const hierarchy = {};

        masterVerifikasiData.forEach(item => {
            const provinsi = String(item.provinsi || '').trim();
            const kabupaten = String(item.kabupaten || '').trim();
            const kecamatan = String(item.kecamatan || '').trim();

            if (!provinsi) return;
            if (!hierarchy[provinsi]) hierarchy[provinsi] = {};
            if (!hierarchy[provinsi][kabupaten]) hierarchy[provinsi][kabupaten] = new Set();
            if (kecamatan) hierarchy[provinsi][kabupaten].add(kecamatan);
        });

        select.innerHTML = '<option value="Semua">Semua Wilayah</option>';

        Object.keys(hierarchy)
            .sort((a, b) => a.localeCompare(b, 'id'))
            .forEach(provinsi => {
                const group = document.createElement('optgroup');
                group.label = 'Provinsi ' + provinsi;

                const provOption = document.createElement('option');
                provOption.value = provinsi;
                provOption.textContent = 'Provinsi ' + provinsi + ' (Semua)';
                group.appendChild(provOption);

                Object.keys(hierarchy[provinsi])
                    .sort((a, b) => a.localeCompare(b, 'id'))
                    .forEach(kabupaten => {
                        if (!kabupaten) return;

                        const kabOption = document.createElement('option');
                        kabOption.value = kabupaten;
                        kabOption.textContent = kabupaten + ' (Kab/Kota)';
                        group.appendChild(kabOption);

                        [...hierarchy[provinsi][kabupaten]]
                            .sort((a, b) => a.localeCompare(b, 'id'))
                            .forEach(kecamatan => {
                                const kecOption = document.createElement('option');
                                kecOption.value = kecamatan;
                                kecOption.textContent = 'Kec. ' + kecamatan;
                                group.appendChild(kecOption);
                            });
                    });

                select.appendChild(group);
            });

        if ([...select.options].some(option => option.value === currentValue)) {
            select.value = currentValue;
        } else {
            select.value = 'Semua';
        }
    }

    function handleWilayahChange() {
        applyFilterVerifikasi();
    }

    // ============================================================
    // FILTER STATUS / TAHUN / JENJANG / WILAYAH / PENCARIAN
    // ============================================================
    function applyFilterVerifikasi() {
        const statusEl = document.getElementById('filterStatus');
        const tahunEl = document.getElementById('filterTahun');
        const jenjangEl = document.getElementById('filterJenjang');
        const wilayahEl = document.getElementById('filterWilayah');
        const searchEl = document.getElementById('searchVerifikasi');

        const status = statusEl ? statusEl.value : 'Semua';
        const tahun = tahunEl ? tahunEl.value : 'Semua';
        const jenjang = jenjangEl ? jenjangEl.value : 'Semua';
        const wilayah = wilayahEl ? wilayahEl.value : 'Semua';
        const search = searchEl ? searchEl.value.trim().toLowerCase() : '';

        const filtered = masterVerifikasiData.filter(item => {
            const matchStatus = status === 'Semua' || String(item.status) === String(status);
            const matchTahun = tahun === 'Semua' || String(item.tahun) === String(tahun);
            const matchJenjang = jenjang === 'Semua' || String(item.jenjang) === String(jenjang);
            const matchWilayah = wilayah === 'Semua' ||
                String(item.provinsi) === String(wilayah) ||
                String(item.kabupaten) === String(wilayah) ||
                String(item.kecamatan) === String(wilayah);

            const searchable = [
                item.sekolah,
                item.npsn,
                item.pengusul,
                item.provinsi,
                item.kabupaten,
                item.kecamatan,
                item.jenjang,
                item.status,
                item.catatan,
                item.tahun
            ].map(value => String(value ?? '').toLowerCase());

            const matchSearch = !search || searchable.some(value => value.includes(search));

            return matchStatus && matchTahun && matchJenjang && matchWilayah && matchSearch;
        });

        renderVerifikasiTable(filtered);
    }

    function resetFilterVerifikasi() {
        const ids = ['filterStatus', 'filterTahun', 'filterJenjang', 'filterWilayah'];
        ids.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = 'Semua';
        });

        const searchEl = document.getElementById('searchVerifikasi');
        if (searchEl) searchEl.value = '';

        renderVerifikasiTable(masterVerifikasiData);
    }

    // ============================================================
    // UPLOAD
    // ============================================================
    function handleFileUpload(input) {
        if (input.files && input.files[0]) {
            alert(`File "${input.files[0].name}" berhasil diunggah.`);
        }
    }

    // ============================================================
    // MODAL / PEMERIKSAAN
    // ============================================================
    let currentSelectedSekolah = null;

    function periksaVerifikasi(no) {
        const data = masterVerifikasiData.find(item => Number(item.no) === Number(no));
        if (!data) return;

        currentSelectedSekolah = data;

        const modalSekolah = document.getElementById('modalSekolah');
        const modalDetailWilayah = document.getElementById('modalDetailWilayah');
        const modalPengusul = document.getElementById('modalPengusul');
        const modalJumlahSiswa = document.getElementById('modalJumlahSiswa');
        const modalTahun = document.getElementById('modalTahun');
        const modalStatusBadge = document.getElementById('modalStatusBadge');
        const modal = document.getElementById('modalVerifikasi');

        if (modalSekolah) modalSekolah.innerText = data.sekolah;
        if (modalDetailWilayah) modalDetailWilayah.innerText = `${data.kecamatan}, ${data.kabupaten}, ${data.provinsi} (${data.jenjang})`;
        if (modalPengusul) modalPengusul.innerText = data.pengusul;
        if (modalJumlahSiswa) modalJumlahSiswa.innerText = `${data.jumlahSiswa} Siswa`;
        if (modalTahun) modalTahun.innerText = data.tahun;
        if (modalStatusBadge) modalStatusBadge.innerText = data.status;

        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function tutupModal() {
        const modal = document.getElementById('modalVerifikasi');
        if (!modal) return;
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    function prosesKeputusan(keputusan) {
        if (!currentSelectedSekolah) return;

        const catatanEl = document.getElementById('catatanAdmin');
        const catatan = catatanEl ? catatanEl.value : '';

        currentSelectedSekolah.status = keputusan;
        if (catatan.trim()) currentSelectedSekolah.catatan = catatan.trim();

        applyFilterVerifikasi();

        if (catatanEl) catatanEl.value = '';
        tutupModal();

        alert(`Berhasil memperbarui status "${currentSelectedSekolah.sekolah}" menjadi: ${keputusan}.`);
    }

    // ============================================================
    // INIT
    // ============================================================
    document.addEventListener('DOMContentLoaded', () => {
        // Card statistik TIDAK disentuh di sini.
        // Nilai card pada desain lama tetap dipertahankan.
        buildWilayahOptions();
        renderVerifikasiTable(masterVerifikasiData);
    });
</script>
</body>
</html>