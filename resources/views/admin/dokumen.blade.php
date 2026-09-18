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
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Dokumen Data PIP</h1>
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

<!-- 1. KARTU AKSI CEPAT / UTAMA (AKSI ADMIN) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mb-6">
    
    <!-- Card 1: Tambah Pemberitahuan -->
    <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-xl shadow-slate-200/40 border-t-4 border-t-[#0055FF] flex flex-col justify-between space-y-4">
        <div class="flex items-start justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#0055FF] flex items-center justify-center text-xl font-bold flex-shrink-0">
                    <!-- Icon Bullhorn/Megaphone -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A2.5 2.5 0 013 11.2V8.8a2.5 2.5 0 012.436-2.483L11 5.882v7.801l-5.564.001z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-extrabold text-[#071a33]">Pemberitahuan Baru</h3>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Rilis informasi resmi ke Dinas / Sekolah</p>
                </div>
            </div>
        </div>
        <button onclick="openModalPemberitahuan()" class="w-full py-3 bg-[#0055FF] hover:bg-blue-700 text-white font-bold text-sm rounded-xl shadow-lg shadow-blue-500/20 transition-all flex items-center justify-center gap-2">
            <!-- Icon Plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            <span>Buat Pemberitahuan</span>
        </button>
    </div>

    <!-- Card 2: Kelola Format Usulan -->
    <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-xl shadow-slate-200/40 border-t-4 border-t-emerald-500 flex flex-col justify-between space-y-4">
        <div class="flex items-start justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold flex-shrink-0">
                    <!-- Icon Spreadsheet/Excel -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-extrabold text-[#071a33]">Format Usulan</h3>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5" id="usulanVerText">Versi Aktif: 15 Juli 2026</p>
                </div>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase">Aktif</span>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="alert('Mengunduh Format Usulan terbaru...')" class="flex-1 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all flex items-center justify-center gap-1.5">
                <!-- Icon Download -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                <span>Unduh</span>
            </button>
            <button onclick="openModalUpdateFormat('Format Usulan PIP')" class="flex-1 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl transition-all flex items-center justify-center gap-1.5">
                <!-- Icon Upload -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Update Berkas</span>
            </button>
        </div>
    </div>

    <!-- Card 3: Kelola Format Pengembalian -->
    <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-xl shadow-slate-200/40 border-t-4 border-t-indigo-500 flex flex-col justify-between space-y-4">
        <div class="flex items-start justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl font-bold flex-shrink-0">
                    <!-- Icon Document/Word -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-extrabold text-[#071a33]">Format Pengembalian</h3>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5" id="pengembalianVerText">Versi Aktif: 02 Agustus 2026</p>
                </div>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-indigo-100 text-indigo-700 text-[10px] font-black uppercase">Aktif</span>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="alert('Mengunduh Format Pengembalian terbaru...')" class="flex-1 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all flex items-center justify-center gap-1.5">
                <!-- Icon Download -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                <span>Unduh</span>
            </button>
            <button onclick="openModalUpdateFormat('Format Pengembalian Dana')" class="flex-1 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl transition-all flex items-center justify-center gap-1.5">
                <!-- Icon Upload -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Update Berkas</span>
            </button>
        </div>
    </div>

</div>

<!-- 2. CARD FILTER DOKUMEN / PEMBERITAHUAN -->
<div class="rounded-3xl border border-slate-100 bg-white p-6 sm:p-7 space-y-4 w-full shadow-xl shadow-slate-200/40">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#0055FF] flex items-center justify-center font-bold text-base flex-shrink-0">
                <!-- Icon Filter -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg sm:text-xl font-extrabold text-[#071a33]">Filter Data Dokumen</h3>
                <p class="text-xs sm:text-sm font-semibold text-slate-400">Saring arsip berdasarkan jenis, target akun, kategori, atau nama dokumen</p>
            </div>
        </div>
        <button onclick="resetFilter()" class="text-xs sm:text-sm font-extrabold text-[#0055FF] hover:underline flex items-center gap-1.5">
            <!-- Icon Rotate/Reset -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Reset Filter</span>
        </button>
    </div>

    <!-- Form Grid Filter -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-1 items-end">
        
        <!-- Jenis Dokumen -->
        <div class="space-y-1.5">
            <label for="filterJenis" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Jenis Dokumen</label>
            <div class="relative">
                <select id="filterJenis" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] appearance-none cursor-pointer shadow-sm">
                    <option value="Semua">Semua Jenis</option>
                    <option value="SK">SK (Surat Keputusan)</option>
                    <option value="Pemberitahuan">Pemberitahuan Resmi</option>
                    <option value="Surat Edaran">Surat Edaran (SE)</option>
                    <option value="Panduan">Juknis / Panduan</option>
                </select>
                <!-- Icon Chevron Down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute right-3.5 top-3.5 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <!-- Target Akun -->
        <div class="space-y-1.5">
            <label for="filterTarget" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Target Sasaran</label>
            <div class="relative">
                <select id="filterTarget" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] appearance-none cursor-pointer shadow-sm">
                    <option value="Semua">Semua Target</option>
                    <option value="Dinas & Sekolah">Dinas &amp; Sekolah</option>
                    <option value="Dinas">Dinas Pendidikan Saja</option>
                    <option value="Sekolah">Sekolah Saja</option>
                    <option value="Bank Penyalur">Bank Penyalur</option>
                </select>
                <!-- Icon Chevron Down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute right-3.5 top-3.5 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <!-- Kategori -->
        <div class="space-y-1.5">
            <label for="filterKategori" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Kategori Program</label>
            <div class="relative">
                <select id="filterKategori" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] appearance-none cursor-pointer shadow-sm">
                    <option value="Semua">Semua Kategori</option>
                    <option value="Batas Waktu">Batas Waktu</option>
                    <option value="Aktivasi">Aktivasi Rekening</option>
                    <option value="Usulan">Usulan PIP</option>
                    <option value="Sistem">Sistem &amp; Pemeliharaan</option>
                    <option value="Mekanisme">Mekanisme &amp; Sosialisasi</option>
                </select>
                <!-- Icon Chevron Down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute right-3.5 top-3.5 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>

        <!-- Search Input -->
        <div class="space-y-1.5">
            <label for="searchJudul" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Cari Nama Berkas / Judul</label>
            <div class="relative">
                <input type="text" id="searchJudul" onkeyup="applyFilter()" placeholder="Ketik kata kunci..." class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] shadow-sm">
                <!-- Icon Search -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute left-3 top-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

    </div>
</div>

        <!-- 3. KARTU TABEL MANAGEMENT DOKUMEN -->
        <div class="rounded-3xl border border-slate-100 bg-white p-6 sm:p-7 space-y-4 w-full shadow-xl shadow-slate-200/40">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-lg sm:text-xl font-extrabold text-[#071a33]">Daftar Arsip &amp; Pemberitahuan Terpublikasi</h3>
                    <p class="text-xs sm:text-sm font-semibold text-slate-400">Arsip dokumen terunggah yang tampil di panel Dinas dan Sekolah</p>
                </div>
                <div class="text-xs font-extrabold text-slate-500 bg-slate-100 px-3.5 py-2 rounded-xl">
                    Total Berkas: <span id="totalDataCount" class="text-[#0055FF] font-black">0</span> File
                </div>
            </div>

            <!-- TABEL DOKUMEN ADMIN -->
            <div class="overflow-x-auto custom-scrollbar pt-1">
                <table class="w-full text-left border-collapse whitespace-nowrap min-w-[900px]">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 font-extrabold text-xs uppercase tracking-wider border-b border-slate-200">
                            <th class="py-3.5 px-4 rounded-l-xl text-center w-12">No.</th>
                            <th class="py-3.5 px-4">Tanggal Rilis</th>
                            <th class="py-3.5 px-4">Jenis &amp; Kategori</th>
                            <th class="py-3.5 px-4">Judul Dokumen / Informasi</th>
                            <th class="py-3.5 px-4">Target Sasaran</th>
                            <th class="py-3.5 px-4 text-center">Berkas Lampiran</th>
                            <th class="py-3.5 px-4 text-center rounded-r-xl">Aksi Admin</th>
                        </tr>
                    </thead>
                    <tbody id="tableDataBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                        <!-- Data dirender oleh JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="text-xs sm:text-sm text-slate-400 font-semibold pt-6 pb-4 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200">
            <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
            <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
        </div>

    </div>

    <!-- MODAL 1: TAMBAH PEMBERITAHUAN -->
    <div id="modalPemberitahuan" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-6 shadow-2xl">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <h3 class="text-lg font-extrabold text-[#071a33]">Buat Pemberitahuan / Rilis Dokumen</h3>
                <button onclick="closeModalPemberitahuan()" class="text-slate-400 hover:text-slate-600 font-bold"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <form onsubmit="handleFormSubmit(event)" class="space-y-4 text-xs font-bold">
                <div>
                    <label class="block text-slate-600 mb-1">Judul Dokumen / Informasi</label>
                    <input type="text" id="inputJudul" required placeholder="Contoh: Petunjuk Teknis Usulan PIP 2026" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:border-[#0055FF]">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-slate-600 mb-1">Jenis Dokumen</label>
                        <select id="inputJenis" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:border-[#0055FF]">
                            <option value="Pemberitahuan">Pemberitahuan</option>
                            <option value="SK">SK</option>
                            <option value="Surat Edaran">Surat Edaran</option>
                            <option value="Panduan">Panduan / Juknis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-slate-600 mb-1">Kategori</label>
                        <select id="inputKategori" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:border-[#0055FF]">
                            <option value="Batas Waktu">Batas Waktu</option>
                            <option value="Aktivasi">Aktivasi</option>
                            <option value="Usulan">Usulan</option>
                            <option value="Sistem">Sistem</option>
                            <option value="Mekanisme">Mekanisme</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-slate-600 mb-1">Target Sasaran</label>
                    <select id="inputTarget" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:border-[#0055FF]">
                        <option value="Dinas & Sekolah">Dinas & Sekolah</option>
                        <option value="Dinas">Dinas Pendidikan Saja</option>
                        <option value="Sekolah">Sekolah Saja</option>
                    </select>
                </div>
                <div>
                    <label class="block text-slate-600 mb-1">Unggah Lampiran Berkas (PDF/XLSX)</label>
                    <input type="file" id="inputFile" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-slate-500">
                </div>
                <div class="pt-3 flex gap-3">
                    <button type="button" onclick="closeModalPemberitahuan()" class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold">Batal</button>
                    <button type="submit" class="flex-1 py-3 bg-[#0055FF] hover:bg-blue-700 text-white rounded-xl font-bold shadow-lg shadow-blue-500/20">Terbitkan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL 2: UPDATE FORMAT BERKAS -->
    <div id="modalUpdateFormat" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 space-y-5 shadow-2xl">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-base font-extrabold text-[#071a33]" id="modalFormatTitle">Update Berkas Format</h3>
                <button onclick="closeModalUpdateFormat()" class="text-slate-400 hover:text-slate-600 font-bold"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <form onsubmit="handleFormatSubmit(event)" class="space-y-4 text-xs font-bold">
                <div>
                    <label class="block text-slate-600 mb-1">Pilih File Baru (.xlsx / .docx)</label>
                    <input type="file" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-slate-500">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeModalUpdateFormat()" class="flex-1 py-2.5 bg-slate-100 text-slate-700 rounded-xl">Batal</button>
                    <button type="submit" class="flex-1 py-2.5 bg-emerald-600 text-white rounded-xl shadow-lg shadow-emerald-500/20">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT UNTUK FILTER DAN RENDER DATA -->
    <script>
        // Data Master Dokumen Admin
        let masterDokumenData = [
            {
                no: 1,
                tanggal: "15 Jul 2026",
                jam: "10:30 WIB",
                kategori: "Batas Waktu",
                judul: "Batas Akhir Aktivasi Rekening PIP Tahap 2 Year 2026",
                nomor: "No: 0482/J5/LP/2026",
                targetAkun: "Dinas & Sekolah",
                status: "Baru",
                jenis: "Pemberitahuan",
                file: "Sur_Edaran.pdf",
                fileType: "pdf"
            },
            {
                no: 2,
                tanggal: "10 Jul 2026",
                jam: "14:15 WIB",
                kategori: "Usulan",
                judul: "SK Nominasi Penerima PIP SMA/SMK Tahun 2026",
                nomor: "No: 1120/SK/PUSLAPDIK/2026",
                targetAkun: "Sekolah",
                status: "Dibaca",
                jenis: "SK",
                file: "SK_Nominasi.xlsx",
                fileType: "excel"
            },
            {
                no: 3,
                tanggal: "02 Apr 2026",
                jam: "09:00 WIB",
                kategori: "Batas Waktu",
                judul: "Penyesuaian mekanisme PIP Tahun 2026",
                nomor: "No: 0211/J5/LP/2026",
                targetAkun: "Sekolah",
                status: "Baru",
                jenis: "Pemberitahuan",
                file: "Juknis_Mekanisme.pdf",
                fileType: "pdf"
            },
            {
                no: 4,
                tanggal: "26 Mar 2026",
                jam: "11:20 WIB",
                kategori: "Aktivasi",
                judul: "Batas waktu konfirmasi aktivasi rekening",
                nomor: "No: 0199/J5/LP/2026",
                targetAkun: "Dinas & Sekolah",
                status: "Dibaca",
                jenis: "Pemberitahuan",
                file: "Konfirmasi_Aktivasi.pdf",
                fileType: "pdf"
            },
            {
                no: 5,
                tanggal: "17 Feb 2026",
                jam: "16:45 WIB",
                kategori: "Sistem",
                judul: "Jadwal pemeliharaan sistem SIPINTAR",
                nomor: "No: 0050/J5/IT/2026",
                targetAkun: "Dinas",
                status: "Dibaca",
                jenis: "Pemberitahuan",
                file: "Info_Maintenance.pdf",
                fileType: "pdf"
            }
        ];

        // Render Tabel Utama
        function renderTable(data) {
            const tbody = document.getElementById("tableDataBody");
            const totalCount = document.getElementById("totalDataCount");
            
            if (!tbody) return;
            tbody.innerHTML = "";
            totalCount.textContent = data.length;

            if (data.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400 font-bold">
                            <i class="fa-solid fa-folder-open text-3xl mb-2 block"></i>
                            Tidak ada dokumen yang sesuai dengan kriteria filter.
                        </td>
                    </tr>
                `;
                return;
            }

            data.forEach((item, index) => {
                const tr = document.createElement("tr");
                tr.className = "hover:bg-slate-50/80 transition-colors";

                // Icon file badge
                const fileIcon = item.fileType === 'excel' ? 'fa-file-excel' : 'fa-file-pdf';
                const fileBg = item.fileType === 'excel' ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' : 'bg-red-50 text-red-600 hover:bg-red-100';

                // Target Akun Icon
                let targetIcon = 'fa-building-columns';
                if (item.targetAkun === 'Sekolah') targetIcon = 'fa-school';

                tr.innerHTML = `
                    <td class="py-4 px-4 text-center font-bold text-slate-400">${index + 1}</td>
                    <td class="py-4 px-4">
                        <span class="block font-bold text-[#071a33]">${item.tanggal}</span>
                        <span class="text-[11px] text-slate-400">${item.jam || '10:00 WIB'}</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="inline-block px-2.5 py-0.5 rounded-md bg-blue-100 text-[#0055FF] text-xs font-bold mb-1">${item.jenis}</span>
                        <span class="block text-xs text-slate-400 font-medium">${item.kategori}</span>
                    </td>
                    <td class="py-4 px-4 max-w-xs truncate">
                        <span class="font-extrabold text-[#071a33] block hover:text-[#0055FF] cursor-pointer" title="${item.judul}">${item.judul}</span>
                        <span class="text-xs text-slate-400">${item.nomor || 'No: Official Release'}</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-bold">
                            <i class="fa-solid ${targetIcon} text-slate-400 text-[10px]"></i> ${item.targetAkun}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <a href="#" onclick="alert('Mengunduh ${item.file}')" class="inline-flex items-center gap-1.5 px-3 py-1.5 ${fileBg} text-xs font-bold rounded-lg transition-colors">
                            <i class="fa-solid ${fileIcon}"></i> ${item.file}
                        </a>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <button onclick="alert('Melihat detail: ${item.judul}')" title="Detail / Preview" class="w-8 h-8 rounded-lg bg-blue-50 text-[#0055FF] hover:bg-blue-100 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-eye text-xs"></i>
                            </button>
                            <button onclick="deleteDocument(${item.no})" title="Hapus Dokumen" class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-trash text-xs"></i>
                            </button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Fungsi Filter Data
        function applyFilter() {
            const filterJenis = document.getElementById("filterJenis").value;
            const filterTarget = document.getElementById("filterTarget").value;
            const filterKategori = document.getElementById("filterKategori").value;
            const searchJudul = document.getElementById("searchJudul").value.toLowerCase();

            const filteredData = masterDokumenData.filter(item => {
                const matchJenis = (filterJenis === "Semua") || (item.jenis === filterJenis);
                const matchTarget = (filterTarget === "Semua") || (item.targetAkun.includes(filterTarget));
                const matchKategori = (filterKategori === "Semua") || (item.kategori === filterKategori);
                const matchJudul = item.judul.toLowerCase().includes(searchJudul);

                return matchJenis && matchTarget && matchKategori && matchJudul;
            });

            renderTable(filteredData);
        }

        // Reset Filter
        function resetFilter() {
            document.getElementById("filterJenis").value = "Semua";
            document.getElementById("filterTarget").value = "Semua";
            document.getElementById("filterKategori").value = "Semua";
            document.getElementById("searchJudul").value = "";
            applyFilter();
        }

        // Hapus Dokumen
        function deleteDocument(id) {
            if (confirm("Apakah Anda yakin ingin menghapus arsip dokumen ini?")) {
                masterDokumenData = masterDokumenData.filter(item => item.no !== id);
                applyFilter();
            }
        }

        // Handler Modal Pemberitahuan Baru
        function openModalPemberitahuan() {
            document.getElementById("modalPemberitahuan").classList.remove("hidden");
            document.getElementById("modalPemberitahuan").classList.add("flex");
        }
        function closeModalPemberitahuan() {
            document.getElementById("modalPemberitahuan").classList.add("hidden");
            document.getElementById("modalPemberitahuan").classList.remove("flex");
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            const judul = document.getElementById("inputJudul").value;
            const jenis = document.getElementById("inputJenis").value;
            const kategori = document.getElementById("inputKategori").value;
            const targetAkun = document.getElementById("inputTarget").value;
            const fileInput = document.getElementById("inputFile");
            const fileName = fileInput.files[0] ? fileInput.files[0].name : "Dokumen_Lampiran.pdf";

            const newItem = {
                no: Date.now(),
                tanggal: "Hari Ini",
                jam: "Baru saja",
                kategori: kategori,
                judul: judul,
                nomor: "No: " + Math.floor(1000 + Math.random() * 9000) + "/J5/LP/2026",
                targetAkun: targetAkun,
                status: "Baru",
                jenis: jenis,
                file: fileName,
                fileType: fileName.endsWith(".xlsx") ? "excel" : "pdf"
            };

            masterDokumenData.unshift(newItem);
            closeModalPemberitahuan();
            applyFilter();
            alert("Pemberitahuan & dokumen baru berhasil diterbitkan!");
        }

        // Handler Modal Update Format
        let activeFormatTarget = "";
        function openModalUpdateFormat(name) {
            activeFormatTarget = name;
            document.getElementById("modalFormatTitle").textContent = "Update " + name;
            document.getElementById("modalUpdateFormat").classList.remove("hidden");
            document.getElementById("modalUpdateFormat").classList.add("flex");
        }
        function closeModalUpdateFormat() {
            document.getElementById("modalUpdateFormat").classList.add("hidden");
            document.getElementById("modalUpdateFormat").classList.remove("flex");
        }
        function handleFormatSubmit(e) {
            e.preventDefault();
            const today = "16 September 2026";
            if (activeFormatTarget.includes("Usulan")) {
                document.getElementById("usulanVerText").textContent = "Versi Aktif: " + today;
            } else {
                document.getElementById("pengembalianVerText").textContent = "Versi Aktif: " + today;
            }
            closeModalUpdateFormat();
            alert("Format berkas " + activeFormatTarget + " berhasil diperbarui!");
        }

        // Inisialisasi Pertama
        document.addEventListener("DOMContentLoaded", () => {
            renderTable(masterDokumenData);
        });
    </script>
</body>
</html>