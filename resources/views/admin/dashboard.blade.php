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

        <main id="konten-utama" class="min-w-0">
    <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 px-5 py-4 backdrop-blur-xl sm:px-8 lg:px-10">
        <div class="mx-auto flex max-w-[1500px] items-center justify-between gap-4">
            
            <!-- Judul Header -->
            <div class="flex items-center gap-3">
                <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">Si</span>
                <div>
                    <p class="mono text-small font-bold uppercase tracking-[.16em] text-[#0055FF]">Pusat kendali nasional</p>
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Dashboard Administrator</h1>
                </div>
            </div>

            <!-- Profil Admin (Ikon Panah Kosong Sudah Dihapus Total) -->
            <div class="flex items-center gap-3">
                <div class="hidden text-right sm:block">
                    <p class="text-lg font-extrabold">Admin Pusat</p>
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

    <div class="min-h-screen text-[#071a33] font-['Plus_Jakarta_Sans',sans-serif] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">

    <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">
        <!-- 4 KARTU STATISTIK UTAMA (Seragam dengan Aksen Warna Berbeda) -->
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
    
    <!-- 01 / TOTAL ALOKASI (Aksen Biru Utama) -->
    <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#0055FF]/40 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#0055FF]/10 pointer-events-none"></div>
        <span class="font-['DM_Mono'] text-small font-bold uppercase tracking-widest text-[#0055FF]">01 / TOTAL ALOKASI</span>
        <div class="mt-4">
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]">Rp 23.657.087.527</h4>
        </div>
        <div class="mt-5 flex items-center gap-2">
            <span class="rounded-xl bg-blue-50 px-3.5 py-1.5 text-large font-bold text-[#0055FF] border border-blue-100">
                27.676 Siswa
            </span>
        </div>
    </div>

    <!-- 02 / TOTAL PENYALURAN (Aksen Teal/Toska) -->
    <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#5ee8d6]/50 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#5ee8d6]/10 pointer-events-none"></div>
        <span class="font-['DM_Mono'] text-small font-bold uppercase tracking-widest text-teal-600">02 / TOTAL PENYALURAN</span>
        <div class="mt-4">
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]">Rp 18.828.261.405</h4>
        </div>
        <div class="mt-5 flex items-center gap-2">
            <span class="rounded-xl bg-teal-50 px-3.5 py-1.5 text-large font-bold text-teal-700 border border-teal-100">
                22.723 Siswa
            </span>
        </div>
    </div>

    <!-- 03 / PERSENTASE AKTIVASI (Aksen Ungu/Indigo) -->
    <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-indigo-200 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-indigo-50 pointer-events-none"></div>
        <span class="font-['DM_Mono'] text-small font-bold uppercase tracking-widest text-indigo-600">03 / PERSENTASE AKTIVASI</span>
        <div class="mt-4">
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]">72,8%</h4>
        </div>
        <div class="mt-5 flex items-center gap-2">
            <span class="rounded-xl bg-indigo-50 px-3.5 py-1.5 text-large font-bold text-indigo-700 border border-indigo-100">
                Keaktifan Rekening
            </span>
        </div>
    </div>

    <!-- 04 / SK PEMBATALAN (Aksen Merah/Rose) -->
    <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-rose-200 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-rose-50 pointer-events-none"></div>
        <span class="font-['DM_Mono'] text-small font-bold uppercase tracking-widest text-rose-600">04 / SK PEMBATALAN</span>
        <div class="mt-4">
            <h4 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]">279</h4>
        </div>
        <div class="mt-5 flex items-center gap-2">
            <span class="rounded-xl bg-rose-50 px-3.5 py-1.5 text-large font-bold text-rose-700 border border-rose-100">
                Kasus Dibatalkan
            </span>
        </div>
    </div>

</div>

<!-- BARIS FORM FILTER PENCARIAN -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 mt-8 shadow-xl shadow-slate-200/50">
    <form id="filter-form" action="{{ route('admin.dashboard') }}" method="GET" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5 items-end">
        <div>
            <label class="block text-base font-black text-slate-800 mb-2">Tahun</label>
            <select name="tahun" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-3 text-base sm:text-lg font-bold text-slate-900 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200">
                <option value="2026" {{ request('tahun', '2026') == '2026' ? 'selected' : '' }}>2026</option>
                <option value="2025" {{ request('tahun') == '2025' ? 'selected' : '' }}>2025</option>
                <option value="2024" {{ request('tahun') == '2024' ? 'selected' : '' }}>2024</option>
            </select>
        </div>
        <div>
            <label class="block text-base font-black text-slate-800 mb-2">Bulan</label>
            <select name="bulan" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-3 text-base sm:text-lg font-bold text-slate-900 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200">
                <option value="">Semua Bulan</option>
                <option value="1" {{ request('bulan') == '1' ? 'selected' : '' }}>Januari</option>
                <option value="2" {{ request('bulan') == '2' ? 'selected' : '' }}>Februari</option>
                <option value="3" {{ request('bulan') == '3' ? 'selected' : '' }}>Maret</option>
                <option value="4" {{ request('bulan') == '4' ? 'selected' : '' }}>April</option>
                <option value="5" {{ request('bulan') == '5' ? 'selected' : '' }}>Mei</option>
                <option value="6" {{ request('bulan') == '6' ? 'selected' : '' }}>Juni</option>
                <option value="7" {{ request('bulan') == '7' ? 'selected' : '' }}>Juli</option>
                <option value="8" {{ request('bulan') == '8' ? 'selected' : '' }}>Agustus</option>
                <option value="9" {{ request('bulan') == '9' ? 'selected' : '' }}>September</option>
                <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
            </select>
        </div>
        <div>
            <label class="block text-base font-black text-slate-800 mb-2">Jenjang</label>
            <select name="jenjang" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-3 text-base sm:text-lg font-bold text-slate-900 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200">
                <option value="">Semua Jenjang</option>
                <option value="SD" {{ request('jenjang') == 'SD' ? 'selected' : '' }}>Sekolah Dasar</option>
                <option value="SMP" {{ request('jenjang') == 'SMP' ? 'selected' : '' }}>Sekolah Menengah Pertama</option>
                <option value="SMA" {{ request('jenjang') == 'SMA' ? 'selected' : '' }}>Sekolah Menengah Atas</option>
                <option value="SMK" {{ request('jenjang') == 'SMK' ? 'selected' : '' }}>Sekolah Menengah Kejuruan</option>
            </select>
        </div>
        <div>
            <label class="block text-base font-black text-slate-800 mb-2">Pencarian</label>
            <input type="text" id="filter-search" name="search" value="{{ request('search') }}" placeholder="Cari sekolah / NPSN..." class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-3 text-base sm:text-lg font-bold text-slate-900 placeholder:text-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200">
        </div>
        <div>
            <button type="submit" class="w-full rounded-2xl bg-[#0055FF] px-5 py-3.5 text-lg font-black text-white shadow-lg transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Filter Data
            </button>
        </div>
    </form>
</section>

<!-- BAGIAN GRAFIK & TABEL VISUALISASI -->
<div class="rounded-[2.5rem] bg-white p-8 sm:p-10 border-2 border-slate-200 shadow-xl shadow-slate-200/50 w-full flex flex-col justify-between mt-8">
    <!-- Header Card -->
    <div>
        <span class="font-['DM_Mono'] text-sm sm:text-base font-black uppercase tracking-widest text-[#0055FF]">Visualisasi Bulanan</span>
        <h3 class="text-2xl sm:text-3xl font-black text-[#071a33] mt-2 mb-2">Persentase Dana Penyaluran</h3>
        <p class="text-base sm:text-lg font-bold text-slate-600 mb-8">Grafik tren bulanan beserta rincian data persentase tiap jenjang pendidikan</p>
    </div>
    
    <!-- Container Canvas Grafik (Tinggi ditingkatkan) -->
    <div class="relative h-96 w-full mb-8">
        <canvas id="barChart"></canvas>
    </div>

    <!-- TABEL DATA DI BAWAH GRAFIK (Teks & Cell Lebih Besar) -->
    <div class="overflow-x-auto rounded-2xl border-2 border-slate-300 mt-2">
        <table class="w-full text-center text-sm sm:text-base font-bold text-slate-800">
            <!-- Header Bulan -->
            <thead class="bg-slate-100 text-slate-900 border-b-2 border-slate-300">
                <tr>
                    <th class="py-4 px-4 text-left bg-slate-200 font-black border-r-2 border-slate-300 text-base">Jenjang</th>
                    <th class="py-4 px-3">Jan</th>
                    <th class="py-4 px-3">Feb</th>
                    <th class="py-4 px-3">Mar</th>
                    <th class="py-4 px-3">Apr</th>
                    <th class="py-4 px-3">Mei</th>
                    <th class="py-4 px-3">Jun</th>
                    <th class="py-4 px-3">Jul</th>
                    <th class="py-4 px-3">Agu</th>
                    <th class="py-4 px-3">Sep</th>
                    <th class="py-4 px-3">Okt</th>
                    <th class="py-4 px-3">Nov</th>
                    <th class="py-4 px-3">Des</th>
                </tr>
            </thead>
            <!-- Isi Data Persentase -->
            <tbody class="divide-y-2 divide-slate-200">
                <!-- Baris SD -->
                <tr class="hover:bg-slate-100">
                    <td class="py-3.5 px-4 text-left font-black text-[#C0504D] bg-slate-50 border-r-2 border-slate-300 text-base">
                        <span class="inline-block w-3.5 h-3.5 rounded-sm bg-[#C0504D] mr-2"></span>SD
                    </td>
                    <td class="py-3.5 px-2">7.5%</td>
                    <td class="py-3.5 px-2">8.6%</td>
                    <td class="py-3.5 px-2">8.8%</td>
                    <td class="py-3.5 px-2">7.8%</td>
                    <td class="py-3.5 px-2">5.3%</td>
                    <td class="py-3.5 px-2">3.8%</td>
                    <td class="py-3.5 px-2">7.9%</td>
                    <td class="py-3.5 px-2">6.4%</td>
                    <td class="py-3.5 px-2">9.6%</td>
                    <td class="py-3.5 px-2">4.2%</td>
                    <td class="py-3.5 px-2">4.7%</td>
                    <td class="py-3.5 px-2">6.3%</td>
                </tr>
                <!-- Baris SMP -->
                <tr class="hover:bg-slate-100">
                    <td class="py-3.5 px-4 text-left font-black text-[#2b5c9e] bg-slate-50 border-r-2 border-slate-300 text-base">
                        <span class="inline-block w-3.5 h-3.5 rounded-sm bg-[#4F81BD] mr-2"></span>SMP
                    </td>
                    <td class="py-3.5 px-2">9.5%</td>
                    <td class="py-3.5 px-2">8.1%</td>
                    <td class="py-3.5 px-2">7.2%</td>
                    <td class="py-3.5 px-2">6.9%</td>
                    <td class="py-3.5 px-2">5.3%</td>
                    <td class="py-3.5 px-2">6.1%</td>
                    <td class="py-3.5 px-2">7.6%</td>
                    <td class="py-3.5 px-2">7.8%</td>
                    <td class="py-3.5 px-2">7.2%</td>
                    <td class="py-3.5 px-2">4.0%</td>
                    <td class="py-3.5 px-2">6.7%</td>
                    <td class="py-3.5 px-2">7.9%</td>
                </tr>
                <!-- Baris SMA -->
                <tr class="hover:bg-slate-100">
                    <td class="py-3.5 px-4 text-left font-black text-[#68822d] bg-slate-50 border-r-2 border-slate-300 text-base">
                        <span class="inline-block w-3.5 h-3.5 rounded-sm bg-[#9BBB59] mr-2"></span>SMA
                    </td>
                    <td class="py-3.5 px-2">10.3%</td>
                    <td class="py-3.5 px-2">8.8%</td>
                    <td class="py-3.5 px-2">8.0%</td>
                    <td class="py-3.5 px-2">5.0%</td>
                    <td class="py-3.5 px-2">5.1%</td>
                    <td class="py-3.5 px-2">6.3%</td>
                    <td class="py-3.5 px-2">8.7%</td>
                    <td class="py-3.5 px-2">7.9%</td>
                    <td class="py-3.5 px-2">6.9%</td>
                    <td class="py-3.5 px-2">4.0%</td>
                    <td class="py-3.5 px-2">4.2%</td>
                    <td class="py-3.5 px-2">8.9%</td>
                </tr>
                <!-- Baris SMK -->
                <tr class="hover:bg-slate-100">
                    <td class="py-3.5 px-4 text-left font-black text-[#5b437a] bg-slate-50 border-r-2 border-slate-300 text-base">
                        <span class="inline-block w-3.5 h-3.5 rounded-sm bg-[#8064A2] mr-2"></span>SMK
                    </td>
                    <td class="py-3.5 px-2">6.8%</td>
                    <td class="py-3.5 px-2">6.5%</td>
                    <td class="py-3.5 px-2">10.4%</td>
                    <td class="py-3.5 px-2">5.4%</td>
                    <td class="py-3.5 px-2">3.2%</td>
                    <td class="py-3.5 px-2">8.4%</td>
                    <td class="py-3.5 px-2">6.6%</td>
                    <td class="py-3.5 px-2">11.0%</td>
                    <td class="py-3.5 px-2">9.3%</td>
                    <td class="py-3.5 px-2">2.5%</td>
                    <td class="py-3.5 px-2">5.4%</td>
                    <td class="py-3.5 px-2">4.0%</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- TABEL PIVOT DISTRIBUSI WILAYAH -->
<div class="rounded-[2.5rem] bg-white p-8 sm:p-10 border-2 border-slate-200 shadow-xl shadow-slate-200/50 flex flex-col justify-between mt-8">
    <div>
        <span class="font-['DM_Mono'] text-sm sm:text-base font-black uppercase tracking-widest text-[#0055FF]">Distribusi Wilayah</span>
        <h3 class="text-2xl sm:text-3xl font-black text-[#071a33] mt-2 mb-2">Provinsi Dana Disalurkan Terendah</h3>
        <p class="text-base sm:text-lg font-bold text-slate-600 mb-8">Rincian alokasi nominal wilayah terendah</p>
    </div>
    
    <!-- Tabel Pivot Style -->
<div class="overflow-x-auto rounded-2xl border-2 border-slate-300">
    <table class="w-full text-base sm:text-lg text-slate-900 font-bold">
        <!-- Header Pivot -->
        <thead class="bg-slate-200 text-slate-900 border-b-2 border-slate-300">
            <tr>
                <th class="py-4 px-6 text-left font-black border-r-2 border-slate-300">
                    <div class="flex items-center justify-between">
                        <span>Row Labels</span>
                        <span class="text-slate-600 text-sm">▼</span>
                    </div>
                </th>
                <th class="py-4 px-6 text-right font-black">Sum of Dana Disalurkan (Rp)</th>
            </tr>
        </thead>
        <!-- Body Data -->
        <tbody class="divide-y-2 divide-slate-200">
            <tr class="data-row hover:bg-slate-100" data-tahun="2026" data-jenjang="SD" data-[#sekolah]="sd n 1 jakarta">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Banten</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 1.808.572.861
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Kalimantan Selatan</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 2.209.059.644
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Lampung</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 2.087.192.873
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Maluku Utara</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 1.848.103.253
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Papua Barat Daya</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 1.802.687.688
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Papua Selatan</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 1.824.503.461
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Papua Tengah</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 2.024.086.190
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Sulawesi Barat</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 1.897.269.165
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Sulawesi Tengah</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 1.723.869.675
                </td>
            </tr>
            <tr class="hover:bg-slate-100">
                <td class="py-3.5 px-6 border-r-2 border-slate-200">Sulawesi Tenggara</td>
                <td class="py-3.5 px-6 text-right font-mono font-extrabold">
                    <span class="float-left text-slate-500 font-sans font-bold">Rp</span> 2.012.329.922
                </td>
            </tr>
        </tbody>
        <!-- Footer / Grand Total -->
        <tfoot class="bg-slate-200 font-black text-slate-900 border-t-4 border-slate-400">
            <tr>
                <td class="py-4 px-6 border-r-2 border-slate-300 text-lg">Grand Total</td>
                <td class="py-4 px-6 text-right font-mono text-xl font-black">
                    <span class="float-left text-slate-700 font-sans font-bold">Rp</span> 19.237.674.732
                </td>
            </tr>
        </tfoot>
    </table>
</div>

    <!-- Catatan kaki -->
    <div class="mt-6 text-right">
        <span class="text-sm font-black italic text-slate-500 font-['DM_Mono']">* Data bahan evaluasi resmi</span>
    </div>
</div>

<!-- PANEL ANALISA DATA (Diperbesar dengan Kontras Maksimal) -->
<div class="relative overflow-hidden rounded-[2.5rem] bg-blue-50/60 border-4 border-blue-200 p-8 sm:p-10 text-[#071a33] shadow-xl shadow-slate-200/50 mt-8">
    <div class="relative z-10 flex items-start gap-6">
        <div class="rounded-2xl bg-[#0055FF] p-4 text-white shrink-0 shadow-md">
            <svg class="h-8 w-8 sm:h-10 sm:w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div>
            <h4 class="font-['DM_Mono'] text-sm sm:text-base font-black uppercase tracking-widest text-[#0055FF]">
                PANEL ANALISA DATA
            </h4>
            <p class="text-lg sm:text-xl font-bold text-slate-800 mt-3 leading-relaxed">
                Secara nasional, penyaluran mencapai <span class="bg-teal-200/80 px-2 py-0.5 rounded-lg font-black text-[#071a33]">82% dari alokasi</span> (22.723 dari 27.676 siswa), dengan total dana disalurkan <span class="font-black text-[#0055FF] text-xl sm:text-2xl">Rp18.828.261.405</span>. Aktivasi mencapai <span class="font-black text-[#071a33]">73%</span>, dengan 5.913 siswa belum aktivasi dan 279 kasus dibatalkan.
            </p>
        </div>
    </div>
</div>

<!-- Library Chart.js & DataLabels -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        Chart.register(ChartDataLabels);

        // --- 1. GROUPED BAR CHART ---
        const ctxBar = document.getElementById('barChart')?.getContext('2d');
        let barChart = null;

        if (ctxBar) {
            barChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: @json($labelsBar ?? []),
                    datasets: [
                        {
                            label: 'SD',
                            data: @json($dataBar['SD'] ?? []),
                            backgroundColor: '#C0504D',
                            borderRadius: 4
                        },
                        {
                            label: 'SMP',
                            data: @json($dataBar['SMP'] ?? []),
                            backgroundColor: '#4F81BD',
                            borderRadius: 4
                        },
                        {
                            label: 'SMA',
                            data: @json($dataBar['SMA'] ?? []),
                            backgroundColor: '#9BBB59',
                            borderRadius: 4
                        },
                        {
                            label: 'SMK',
                            data: @json($dataBar['SMK'] ?? []),
                            backgroundColor: '#8064A2',
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: false,
                            grid: { display: false },
                            ticks: { 
                                font: { weight: 'bold', size: 11 }, 
                                color: '#64748B' 
                            }
                        },
                        y: {
                            stacked: false,
                            min: 0,
                            max: 12,
                            ticks: {
                                stepSize: 2,
                                callback: function(value) { 
                                    return value.toFixed(1).replace('.', ',') + '%'; 
                                },
                                font: { weight: 'bold', size: 11 },
                                color: '#64748B'
                            },
                            grid: { color: '#E2E8F0' }
                        }
                    },
                    plugins: {
                        datalabels: { display: false },
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: { weight: 'bold', size: 12 },
                                usePointStyle: true,
                                pointStyle: 'rectRounded',
                                padding: 16
                            }
                        },
                        tooltip: {
                            backgroundColor: '#071A33',
                            titleFont: { size: 13, weight: 'bold' },
                            bodyFont: { size: 12 },
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    let val = context.raw ? context.raw.toString().replace('.', ',') : '0';
                                    return context.dataset.label + ': ' + val + '%';
                                }
                            }
                        }
                    }
                }
            });
        }

        // --- 2. PIE CHART ---
        const ctxPie = document.getElementById('pieChart');
        let pieChart = null;
        
        if (ctxPie) {
            const isMobile = window.innerWidth < 640;
            pieChart = new Chart(ctxPie.getContext('2d'), {
                type: 'pie',
                data: {
                    labels: [
                        'Banten', 'Kalimantan Selatan', 'Lampung', 'Maluku Utara', 'Papua Barat Daya',
                        'Papua Selatan', 'Papua Tengah', 'Sulawesi Barat', 'Sulawesi Tengah', 'Sulawesi Tenggara'
                    ],
                    datasets: [{
                        data: [1808572861, 2209059644, 2087192873, 1848103253, 1802687688, 1824503461, 2024086190, 1897269165, 1723869675, 2012329922],
                        backgroundColor: [
                            '#0055FF', '#FB7185', '#5EE8D6', '#C084FC', '#FBBF24',
                            '#34D399', '#F472B6', '#60A5FA', '#A78BFA', '#F87171'
                        ],
                        borderWidth: 3,
                        borderColor: '#FFFFFF',
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: { padding: 10 },
                    plugins: {
                        datalabels: {
                            color: '#FFFFFF',
                            font: { weight: '900', size: 11 },
                            formatter: function(value, context) {
                                let total = context.chart._metasets[0].total;
                                return total ? ((value / total) * 100).toFixed(1) + '%' : '0%';
                            },
                            anchor: 'center',
                            align: 'center'
                        },
                        legend: {
                            position: isMobile ? 'bottom' : 'right',
                            labels: {
                                font: { weight: 'bold', size: 11 },
                                usePointStyle: true,
                                pointStyle: 'circle',
                                padding: 12
                            }
                        },
                        tooltip: {
                            backgroundColor: '#071A33',
                            padding: 14,
                            cornerRadius: 16,
                            titleFont: { size: 14, weight: 'bold' },
                            bodyFont: { size: 13, weight: 'bold' },
                            callbacks: {
                                title: function(tooltipItems) {
                                    return '📍 ' + tooltipItems[0].label;
                                },
                                label: function(context) {
                                    let formattedCurrency = new Intl.NumberFormat('id-ID', { 
                                        style: 'currency', 
                                        currency: 'IDR', 
                                        maximumFractionDigits: 0 
                                    }).format(context.raw);

                                    return ' Nominal: ' + formattedCurrency;
                                }
                            }
                        }
                    }
                }
            });
        }

        // --- 3. LOGIKA FILTER & PENCARIAN TEKS REAL-TIME ---
        
        // A. Fitur Pencarian Tabel secara Real-time (tanpa perlu submit form)
        const searchInput = document.getElementById('filter-search');
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const searchText = this.value.toLowerCase().trim();
                const tableRows = document.querySelectorAll('tbody tr');
                
                tableRows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    row.style.display = (!searchText || rowText.includes(searchText)) ? '' : 'none';
                });
            });
        }

        // B. Filter Dataset Bar Chart saat Dropdown Jenjang Mengalami Perubahan
        const jenjangSelect = document.querySelector('select[name="jenjang"]');
        if (jenjangSelect && barChart) {
            jenjangSelect.addEventListener('change', function () {
                const selectedJenjang = this.value;
                barChart.data.datasets.forEach(dataset => {
                    if (!selectedJenjang || dataset.label === selectedJenjang) {
                        dataset.hidden = false;
                    } else {
                        dataset.hidden = true;
                    }
                });
                barChart.update();
            });
        }
    });
</script>
              </main>
            </div>
</body>
</html>