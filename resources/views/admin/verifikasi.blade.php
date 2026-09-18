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
                                <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]">Rp 23.657.087.527</h4>
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
                <option value="Semua" selected>(Semua Status)</option>
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
                <option value="Semua" selected>(Semua Tahun)</option>
                <option value="2026">Tahun 2026</option>
                <option value="2025">Tahun 2025</option>
                <option value="2024">Tahun 2024</option>
            </select>
        </div>

        <!-- Filter Jenjang -->
        <div>
            <label for="filterJenjang" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Jenjang Pendidikan</label>
            <select id="filterJenjang" onchange="applyFilterVerifikasi()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>(Semua Jenjang)</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
            </select>
        </div>

        <!-- Filter Wilayah Terpadu -->
        <div>
            <label for="filterWilayah" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Cakupan Wilayah</label>
            <select id="filterWilayah" onchange="handleWilayahChange()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>(Semua Wilayah)</option>
                <optgroup label="Provinsi DKI Jakarta">
                    <option value="DKI Jakarta">Seluruh DKI Jakarta</option>
                    <option value="Jakarta Pusat">-- Kab/Kota: Jakarta Pusat</option>
                    <option value="Menteng">---- Kec: Menteng</option>
                </optgroup>
                <optgroup label="Provinsi Jawa Barat">
                    <option value="Jawa Barat">Seluruh Jawa Barat</option>
                    <option value="Kota Bandung">-- Kab/Kota: Kota Bandung</option>
                    <option value="Sumur Bandung">---- Kec: Sumur Bandung</option>
                </optgroup>
                <optgroup label="Provinsi Jawa Timur">
                    <option value="Jawa Timur">Seluruh Jawa Timur</option>
                    <option value="Kota Surabaya">-- Kab/Kota: Kota Surabaya</option>
                    <option value="Tegalsari">---- Kec: Tegalsari</option>
                </optgroup>
                <optgroup label="Provinsi Jawa Tengah">
                    <option value="Jawa Tengah">Seluruh Jawa Tengah</option>
                    <option value="Kota Semarang">-- Kab/Kota: Kota Semarang</option>
                    <option value="Semarang Tengah">---- Kec: Semarang Tengah</option>
                </optgroup>
                <optgroup label="Provinsi Sumatera Utara">
                    <option value="Sumatera Utara">Seluruh Sumatera Utara</option>
                    <option value="Kota Medan">-- Kab/Kota: Kota Medan</option>
                    <option value="Medan Kota">---- Kec: Medan Kota</option>
                </optgroup>
                <optgroup label="Provinsi Sulawesi Selatan">
                    <option value="Sulawesi Selatan">Seluruh Sulawesi Selatan</option>
                    <option value="Kota Makassar">-- Kab/Kota: Kota Makassar</option>
                    <option value="Ujung Pandang">---- Kec: Ujung Pandang</option>
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

<script>
    // Master Data LENGKAP dengan atribut Tahun, Jenjang, dan Wilayah
    const masterVerifikasiData = [
        { no: 1, sekolah: "SDN 01 Menteng", jenjang: "SD", kecamatan: "Menteng", kabupaten: "Jakarta Pusat", provinsi: "DKI Jakarta", pengusul: "Sekolah", jumlahSiswa: 45, status: "Perlu Verifikasi", tahun: "2026" },
        { no: 2, sekolah: "SMPN 3 Bandung", jenjang: "SMP", kecamatan: "Sumur Bandung", kabupaten: "Kota Bandung", provinsi: "Jawa Barat", pengusul: "Sekolah", jumlahSiswa: 120, status: "Diloloskan", tahun: "2026" },
        { no: 3, sekolah: "SMKN 2 Surabaya", jenjang: "SMK", kecamatan: "Tegalsari", kabupaten: "Kota Surabaya", provinsi: "Jawa Timur", pengusul: "Dinas Pendidikan", jumlahSiswa: 85, status: "Perlu Perbaikan", tahun: "2025" },
        { no: 4, sekolah: "SDN 15 Semarang", jenjang: "SD", kecamatan: "Semarang Tengah", kabupaten: "Kota Semarang", provinsi: "Jawa Tengah", pengusul: "Sekolah", jumlahSiswa: 30, status: "Ditolak", tahun: "2025" },
        { no: 5, sekolah: "SMA 1 Medan", jenjang: "SMA", kecamatan: "Medan Kota", kabupaten: "Kota Medan", provinsi: "Sumatera Utara", pengusul: "Dinas Pendidikan", jumlahSiswa: 150, status: "Diloloskan", tahun: "2026" },
        { no: 6, sekolah: "SDN 04 Makassar", jenjang: "SD", kecamatan: "Ujung Pandang", kabupaten: "Kota Makassar", provinsi: "Sulawesi Selatan", pengusul: "Sekolah", jumlahSiswa: 60, status: "Perlu Verifikasi", tahun: "2024" }
    ];

    function renderVerifikasiTable(data) {
        const tbody = document.getElementById('tableVerifikasiBody');
        const totalCountSpan = document.getElementById('totalUsulanCount');
        tbody.innerHTML = '';
        totalCountSpan.innerText = data.length;

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

        data.forEach(item => {
            const tr = document.createElement('tr');
            let rowBgClass = 'hover:bg-slate-100 transition-all border-b-2 border-slate-200';
            let badgeStatus = '';

            if (item.status === 'Diloloskan') {
                rowBgClass = 'bg-emerald-100 hover:bg-emerald-200 border-b-2 border-emerald-300 transition-all';
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-emerald-200 text-emerald-900 border border-emerald-400 text-xs font-black">Diloloskan</span>`;
            } else if (item.status === 'Perlu Verifikasi') {
                rowBgClass = 'bg-amber-100 hover:bg-amber-200 border-b-2 border-amber-300 transition-all';
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-amber-200 text-amber-900 border border-amber-400 text-xs font-black">Perlu Verifikasi</span>`;
            } else if (item.status === 'Perlu Perbaikan') {
                rowBgClass = 'bg-blue-100 hover:bg-blue-200 border-b-2 border-blue-300 transition-all';
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-blue-200 text-blue-900 border border-blue-400 text-xs font-black">Perlu Perbaikan</span>`;
            } else if (item.status === 'Ditolak') {
                rowBgClass = 'bg-rose-100 hover:bg-rose-200 border-b-2 border-rose-300 transition-all';
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-rose-200 text-rose-900 border border-rose-400 text-xs font-black">Ditolak</span>`;
            }

            tr.className = rowBgClass;
            tr.innerHTML = `
                <td class="p-4 mono font-bold text-slate-500">${item.no}</td>
                <td class="p-4 font-black text-[#071a33]">${item.sekolah}</td>
                <td class="p-4 font-semibold text-slate-700">${item.kecamatan}</td>
                <td class="p-4 font-bold text-slate-800">${item.kabupaten}</td>
                <td class="p-4 font-semibold text-slate-700">${item.provinsi}</td>
                <td class="p-4 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-md bg-white/80 text-slate-800 font-bold border border-slate-200 text-xs">${item.pengusul}</span>
                </td>
                <td class="p-4 text-right mono font-black text-[#0055FF]">${item.jumlahSiswa} Siswa</td>
                <td class="p-4 text-center">${badgeStatus}</td>
                <td class="p-4 text-center">
                    <button onclick="periksaVerifikasi('${item.sekolah}')" class="px-3.5 py-1.5 rounded-xl bg-[#0055FF] hover:bg-blue-700 text-white font-extrabold text-xs transition shadow-sm">Periksa</button>
                </td>
            `;
            tbody.appendChild(tr);
        });

        updateStatistics(masterVerifikasiData);
    }

    function updateStatistics(data) {
        document.getElementById('statTotalGrand').innerText = data.length;
        document.getElementById('statDiloloskanCount').innerText = data.filter(d => d.status === 'Diloloskan').length;
        document.getElementById('statProsesCount').innerText = data.filter(d => d.status === 'Perlu Verifikasi' || d.status === 'Perlu Perbaikan').length;
        document.getElementById('statDitolakCount').innerText = data.filter(d => d.status === 'Ditolak').length;
    }

    function handleWilayahChange() {
        applyFilterVerifikasi();
    }

    function applyFilterVerifikasi() {
        const status = document.getElementById('filterStatus').value;
        const tahun = document.getElementById('filterTahun').value;
        const jenjang = document.getElementById('filterJenjang').value;
        const wilayah = document.getElementById('filterWilayah').value;
        const search = document.getElementById('searchVerifikasi').value.toLowerCase();

        const filtered = masterVerifikasiData.filter(item => {
            const matchStatus = (status === "Semua" || item.status === status);
            const matchTahun = (tahun === "Semua" || item.tahun === tahun);
            const matchJenjang = (jenjang === "Semua" || item.jenjang === jenjang);
            
            // Logika pencocokan wilayah (Cakupan Provinsi, Kab, atau Kec)
            const matchWilayah = (wilayah === "Semua" || 
                                  item.provinsi === wilayah || 
                                  item.kabupaten === wilayah || 
                                  item.kecamatan === wilayah);

            const matchSearch = item.sekolah.toLowerCase().includes(search) || 
                                item.pengusul.toLowerCase().includes(search) ||
                                item.kabupaten.toLowerCase().includes(search) || 
                                item.kecamatan.toLowerCase().includes(search);

            return matchStatus && matchTahun && matchJenjang && matchWilayah && matchSearch;
        });

        renderVerifikasiTable(filtered);
    }

    function resetFilterVerifikasi() {
        document.getElementById('filterStatus').value = "Semua";
        document.getElementById('filterTahun').value = "Semua";
        document.getElementById('filterJenjang').value = "Semua";
        document.getElementById('filterWilayah').value = "Semua";
        document.getElementById('searchVerifikasi').value = "";
        renderVerifikasiTable(masterVerifikasiData);
    }

    function handleFileUpload(input) {
        if (input.files && input.files[0]) {
            alert(`File "${input.files[0].name}" berhasil diunggah.`);
        }
    }

    function periksaVerifikasi(sekolah) {
        alert(`Membuka form pemeriksaan untuk: ${sekolah}`);
    }

    document.addEventListener('DOMContentLoaded', () => {
        renderVerifikasiTable(masterVerifikasiData);
    });
</script>
</body>
</html>