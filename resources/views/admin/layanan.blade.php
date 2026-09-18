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
                            <p class="mono text-small font-bold uppercase tracking-[.16em] text-[#0055FF]">Layanan & Berkas</p>
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Pengaduan</h1>
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

            <div class="px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="mx-auto max-w-[1540px] space-y-8">

                    <!-- CARD RINGKASAN STATISTIK -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full mb-6">
    <!-- TOTAL TIKET -->
    <div class="card-clean p-5 flex items-center gap-4 border border-slate-100 bg-white rounded-2xl shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-[#0055FF] flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
            </svg>
        </div>
        <div>
            <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Total Tiket</p>
            <h3 id="statTotal" class="text-2xl font-black text-slate-800 mt-0.5">8</h3>
        </div>
    </div>

    <!-- TIKET BARU -->
    <div class="card-clean p-5 flex items-center gap-4 border border-slate-100 bg-white rounded-2xl shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <div>
            <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Tiket Baru</p>
            <h3 id="statBaru" class="text-2xl font-black text-slate-800 mt-0.5">2</h3>
        </div>
    </div>

    <!-- DALAM PROSES -->
    <div class="card-clean p-5 flex items-center gap-4 border border-slate-100 bg-white rounded-2xl shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 animate-spin-slow" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </div>
        <div>
            <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Dalam Proses</p>
            <h3 id="statProses" class="text-2xl font-black text-slate-800 mt-0.5">2</h3>
        </div>
    </div>

    <!-- SELESAI -->
    <div class="card-clean p-5 flex items-center gap-4 border border-slate-100 bg-white rounded-2xl shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Selesai</p>
            <h3 id="statSelesai" class="text-2xl font-black text-slate-800 mt-0.5">3</h3>
        </div>
    </div>
</div>

<!-- CARD FILTER TERPISAH -->
<div class="card-clean p-6 sm:p-7 space-y-4 w-full bg-white border border-slate-100 rounded-3xl shadow-sm mb-6">
    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                <!-- Icon Sliders/Filter -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </div>
            <div>
                <h2 class="text-xl sm:text-2xl font-black text-slate-900">Filter Tiket Pengaduan Admin</h2>
                <p class="text-sm font-semibold text-slate-500">Filter status, kategori, wilayah, atau pencarian deskripsi</p>
            </div>
        </div>
        <button onclick="resetFilter()" class="text-sm font-bold text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1.5">
            <!-- Icon Rotate/Reset -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Reset Filter</span>
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-1 items-end">
        <!-- Status Tiket -->
        <div class="space-y-1.5">
            <label for="filterStatus" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Status Tiket</label>
            <div class="relative">
                <select id="filterStatus" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                    <option value="Semua" selected>Semua Status</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Dalam Proses">Dalam Proses</option>
                    <option value="Baru">Baru</option>
                    <option value="Perlu Informasi">Perlu Informasi</option>
                </select>
                <!-- Icon Chevron Down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute right-4 top-4 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <!-- Kategori Kendala -->
        <div class="space-y-1.5">
            <label for="filterKategori" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Kategori Kendala</label>
            <div class="relative">
                <select id="filterKategori" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                    <option value="Semua">Semua Kategori</option>
                    <option value="Akun Pengguna">Akun Pengguna</option>
                    <option value="Dokumen">Dokumen</option>
                    <option value="Format Verifikasi">Format Verifikasi</option>
                    <option value="Aktivasi Rekening">Aktivasi Rekening</option>
                    <option value="Penyaluran Dana">Penyaluran Dana</option>
                    <option value="Data Siswa">Data Siswa</option>
                </select>
                <!-- Icon Chevron Down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute right-4 top-4 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <!-- Kabupaten/Kota -->
        <div class="space-y-1.5">
            <label for="filterKabupaten" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Kabupaten/Kota</label>
            <div class="relative">
                <select id="filterKabupaten" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                    <option value="Semua">Semua Wilayah</option>
                    <option value="Kab. Bogor">Kab. Bogor</option>
                    <option value="Kota Surabaya">Kota Surabaya</option>
                    <option value="Kota Tangerang">Kota Tangerang</option>
                </select>
                <!-- Icon Chevron Down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute right-4 top-4 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <!-- Pencarian -->
        <div class="space-y-1.5">
            <label for="searchTiket" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Cari Tiket / Deskripsi</label>
            <div class="relative">
                <input type="text" id="searchTiket" onkeyup="applyFilter()" placeholder="No Tiket / Kendala..." class="w-full bg-slate-50 border border-slate-300 rounded-2xl pl-10 pr-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 shadow-sm">
                <!-- Icon Search -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-3.5 top-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- LAYOUT TIKET INTERAKTIF DUA KANAN-KIRI -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 w-full items-stretch">
    
    <!-- LIST TIKET (KIRI) -->
    <div class="lg:col-span-5 card-clean p-6 flex flex-col justify-between h-[600px] bg-white border border-slate-100 rounded-3xl shadow-sm">
        <div class="flex-shrink-0 flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
            <h3 class="text-xl font-extrabold text-slate-900">Daftar Tiket Admin</h3>
            <span id="ticketBadgeCount" class="px-3 py-1 bg-blue-100 text-blue-700 font-extrabold rounded-full text-xs">8 Tiket</span>
        </div>

        <!-- Container Card List Tiket -->
        <div id="ticketCardContainer" class="flex-1 overflow-y-auto pr-1.5 space-y-3">
            <!-- Dynamic List Cards via JavaScript -->
        </div>
    </div>

    <!-- DETAIL & CHAT INTERAKSI TIKET (KANAN) -->
    <div class="lg:col-span-7 card-clean p-6 h-[600px] flex flex-col justify-between bg-white border border-slate-100 rounded-3xl shadow-sm">
        
        <!-- EMPTY STATE IDLE -->
        <div id="idleStateContainer" class="flex flex-col items-center justify-center h-full text-center p-8 space-y-4">
            <div class="w-20 h-20 rounded-3xl bg-blue-50 text-[#0055FF] flex items-center justify-center text-4xl shadow-sm border border-blue-100/80">
                <i class="fa-regular fa-comments"></i>
            </div>
            <div class="max-w-md space-y-2">
                <h4 class="text-xl font-extrabold text-slate-800">Detail Percakapan Tiket</h4>
                <p class="text-base font-bold text-slate-400 leading-relaxed">
                    Pilih salah satu tiket dari daftar di sebelah kiri untuk merespons pengaduan.
                </p>
            </div>
        </div>

        <!-- DETAIL CHAT PANEL -->
        <div id="activeChatContainer" class="hidden flex-col h-full justify-between space-y-4">
            <div class="flex-shrink-0 border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-2">
                        <span id="activeTicketNo" class="text-xl font-black text-slate-900">#PIP-2026-1002</span>
                        <span id="activeTicketCategory" class="text-sm font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">Dokumen</span>
                    </div>
                    <p id="activeTicketPengaju" class="text-sm font-semibold text-slate-500 mt-0.5">Operator Sekolah — Kab. Bogor (Jawa Barat)</p>
                </div>
                <span id="activeTicketStatus" class="px-3.5 py-1.5 rounded-full bg-blue-100 text-blue-800 text-xs font-black">Dalam Proses</span>
            </div>

            <!-- Chat Box Percakapan Dua Arah -->
            <div id="chatBoxContainer" class="flex-1 bg-slate-50/80 border border-slate-200/80 rounded-2xl p-4 space-y-4 overflow-y-auto">
                <!-- Bubble Pesan Pengaju -->
                <div class="flex flex-col items-start space-y-1">
                    <span class="text-xs font-extrabold text-slate-400 ml-1">Pengaju Tiket</span>
                    <div class="bg-white border border-slate-200 p-3.5 rounded-2xl rounded-tl-none shadow-sm max-w-[85%]">
                        <p id="activeTicketDesc" class="text-base font-semibold text-slate-800">Dana belum tersalurkan ke rekening siswa.</p>
                    </div>
                </div>

                <!-- Dynamic Chat Response -->
                <div id="dynamicChatBubbles" class="space-y-4"></div>
            </div>

            <!-- Form Balas Pesan Tiket -->
            <div class="flex-shrink-0 flex gap-2 pt-1">
                <input type="text" id="inputBalasan" placeholder="Tulis balasan tanggapan admin..." class="flex-1 bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3 text-base font-semibold text-slate-800 focus:outline-none focus:border-blue-500 shadow-sm">
                <button onclick="kirimBalasan()" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-base rounded-2xl shadow-lg shadow-blue-600/20 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Kirim</span>
                </button>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="text-sm text-slate-400 font-semibold pt-6 flex flex-col sm:flex-row justify-between items-center gap-2">
    <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
    <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
</footer>

<!-- SCRIPT INTERAKSI DATA TIKET ADMIN -->
<script>
    const ticketsData = [
        { no: "#PIP-2026-1001", kategori: "Akun Pengguna", desc: "Data siswa perlu diperbaiki", pengaju: "Operator SD Negeri 01", kab: "Kab. Bogor", prov: "Jawa Barat", tglDibuat: "2026-03-17", status: "Selesai", tglSelesai: "2026-03-18" },
        { no: "#PIP-2026-1002", kategori: "Dokumen", desc: "Dana belum tersalurkan ke rekening siswa", pengaju: "Operator Sekolah", kab: "Kab. Bogor", prov: "Jawa Barat", tglDibuat: "2026-07-14", status: "Dalam Proses", tglSelesai: "-" },
        { no: "#PIP-2026-1003", kategori: "Format Verifikasi", desc: "Kendala unduh berkas verifikasi usulan", pengaju: "SMP Negeri 2", kab: "Kota Surabaya", prov: "Jawa Timur", tglDibuat: "2026-06-19", status: "Baru", tglSelesai: "-" },
        { no: "#PIP-2026-1004", kategori: "Aktivasi Rekening", desc: "Kendala aktivasi rekening untuk beberapa siswa", pengaju: "SDN 04 Joyo", kab: "Kota Surabaya", prov: "Jawa Timur", tglDibuat: "2026-05-10", status: "Selesai", tglSelesai: "2026-05-12" },
        { no: "#PIP-2026-1005", kategori: "Penyaluran Dana", desc: "Verifikasi kuota usulan sekolah belum diproses", pengaju: "SMA 1 Tangerang", kab: "Kota Tangerang", prov: "Banten", tglDibuat: "2026-04-11", status: "Perlu Informasi", tglSelesai: "-" },
        { no: "#PIP-2026-1006", kategori: "Data Siswa", desc: "Sinkronisasi NIK siswa gagal pada sistem PIP", pengaju: "Operator SMP 3", kab: "Kota Tangerang", prov: "Banten", tglDibuat: "2026-02-01", status: "Selesai", tglSelesai: "2026-02-03" },
        { no: "#PIP-2026-1007", kategori: "Dokumen", desc: "Berkas SK nominasi belum terunduh secara sempurna", pengaju: "Operator SD 02", kab: "Kab. Bogor", prov: "Jawa Barat", tglDibuat: "2026-08-01", status: "Baru", tglSelesai: "-" },
        { no: "#PIP-2026-1008", kategori: "Akun Pengguna", desc: "Gagal reset kata sandi portal sekolah", pengaju: "SMK Negeri 1", kab: "Kota Surabaya", prov: "Jawa Timur", tglDibuat: "2026-08-10", status: "Dalam Proses", tglSelesai: "-" }
    ];

    let activeTicketNo = null;

    function getStatusBadgeClass(status) {
        switch(status) {
            case 'Selesai': return 'bg-emerald-100 text-emerald-700';
            case 'Dalam Proses': return 'bg-blue-100 text-blue-700';
            case 'Baru': return 'bg-purple-100 text-purple-700';
            case 'Perlu Informasi': return 'bg-amber-100 text-amber-700';
            default: return 'bg-slate-100 text-slate-700';
        }
    }

    function updateCounters() {
        document.getElementById('statTotal').textContent = ticketsData.length;
        document.getElementById('statBaru').textContent = ticketsData.filter(t => t.status === 'Baru').length;
        document.getElementById('statProses').textContent = ticketsData.filter(t => t.status === 'Dalam Proses').length;
        document.getElementById('statSelesai').textContent = ticketsData.filter(t => t.status === 'Selesai').length;
    }

    function renderCards() {
        const container = document.getElementById('ticketCardContainer');
        const statusFilter = document.getElementById('filterStatus').value;
        const katFilter = document.getElementById('filterKategori').value;
        const kabFilter = document.getElementById('filterKabupaten').value;
        const searchQuery = document.getElementById('searchTiket').value.toLowerCase();

        const filtered = ticketsData.filter(t => {
            const matchStatus = statusFilter === 'Semua' || t.status === statusFilter;
            const matchKat = katFilter === 'Semua' || t.kategori === katFilter;
            const matchKab = kabFilter === 'Semua' || t.kab === kabFilter;
            const matchSearch = t.no.toLowerCase().includes(searchQuery) || t.desc.toLowerCase().includes(searchQuery);
            return matchStatus && matchKat && matchKab && matchSearch;
        });

        document.getElementById('ticketBadgeCount').textContent = `${filtered.length} Tiket`;

        if(filtered.length === 0) {
            container.innerHTML = `<p class="text-center py-8 text-slate-400 font-bold">Tidak ada tiket ditemukan.</p>`;
            return;
        }

        container.innerHTML = filtered.map(t => {
            const isActive = t.no === activeTicketNo;
            const borderClass = isActive ? 'border-2 border-blue-600 bg-blue-50/40 shadow-sm' : 'border border-slate-200/80 bg-white hover:border-blue-300';
            return `
                <div onclick="selectTicket('${t.no}')" class="p-4 rounded-2xl cursor-pointer transition-all ${borderClass}">
                    <div class="flex items-center justify-between">
                        <span class="font-black text-slate-900 text-base">${t.no}</span>
                        <span class="px-2.5 py-1 rounded-full text-xs font-black ${getStatusBadgeClass(t.status)}">${t.status}</span>
                    </div>
                    <p class="text-sm font-bold text-slate-700 mt-1.5 line-clamp-1">${t.desc}</p>
                    <div class="flex items-center justify-between mt-3 text-xs font-semibold text-slate-400">
                        <span>${t.kategori}</span>
                        <span class="font-mono">${t.tglDibuat}</span>
                    </div>
                </div>
            `;
        }).join('');
    }

    function selectTicket(no) {
        activeTicketNo = no;
        const t = ticketsData.find(item => item.no === no);
        
        if(t) {
            document.getElementById('idleStateContainer').classList.add('hidden');
            const activeContainer = document.getElementById('activeChatContainer');
            activeContainer.classList.remove('hidden');
            activeContainer.classList.add('flex');

            document.getElementById('activeTicketNo').textContent = t.no;
            document.getElementById('activeTicketCategory').textContent = t.kategori;
            document.getElementById('activeTicketPengaju').textContent = `${t.pengaju} — ${t.kab} (${t.prov})`;
            document.getElementById('activeTicketDesc').textContent = t.desc;
            
            const statusBadge = document.getElementById('activeTicketStatus');
            statusBadge.textContent = t.status;
            statusBadge.className = `px-3.5 py-1.5 rounded-full text-xs font-black ${getStatusBadgeClass(t.status)}`;

            const dynamicBubbles = document.getElementById('dynamicChatBubbles');
            dynamicBubbles.innerHTML = `
                <div class="flex flex-col items-end space-y-1">
                    <span class="text-xs font-extrabold text-blue-500 mr-1">Tanggapan Admin Pusat</span>
                    <div class="bg-blue-600 text-white p-3.5 rounded-2xl rounded-tr-none shadow-md max-w-[85%]">
                        <p class="text-base font-medium leading-relaxed">Halo, silakan unggah dokumen pendukung terkait ${t.kategori.toLowerCase()} agar tim kami dapat memverifikasi lebih lanjut.</p>
                    </div>
                </div>
            `;
        }
        renderCards();
    }

    function applyFilter() {
        renderCards();
    }

    function resetFilter() {
        document.getElementById('filterStatus').value = 'Semua';
        document.getElementById('filterKategori').value = 'Semua';
        document.getElementById('filterKabupaten').value = 'Semua';
        document.getElementById('searchTiket').value = '';
        applyFilter();
    }

    function kirimBalasan() {
        const val = document.getElementById('inputBalasan').value.trim();
        if(!val) return;
        const container = document.getElementById('dynamicChatBubbles');
        const newBubble = `
            <div class="flex flex-col items-end space-y-1">
                <span class="text-xs font-extrabold text-blue-500 mr-1">Tanggapan Admin Pusat</span>
                <div class="bg-blue-600 text-white p-3.5 rounded-2xl rounded-tr-none shadow-md max-w-[85%]">
                    <p class="text-base font-medium leading-relaxed">${val}</p>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newBubble);
        document.getElementById('inputBalasan').value = '';
        
        const chatBox = document.getElementById('chatBoxContainer');
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    // Initialize
    updateCounters();
    renderCards();
</script>