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
   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->routeIs('admin.pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}" {{ request()->routeIs('admin.pemantauan*') ? 'aria-current="page"' : '' }}>
    <svg class="h-7 w-7 flex-shrink-0 {{ request()->routeIs('admin.pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
    </svg>
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
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Pemantauan Aktivasi Rekening</h1>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p class="text-lg font-extrabold text-slate-800">Admin Pusat</p>
                            <p class="text-base font-bold text-emerald-600">Sistem aktif</p>
                        </div>
                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-white shadow-lg shadow-blue-600/30">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Body Content -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- 4 CARD KARTU RINGKASAN STATUS -->
                    <section class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Belum Input</p>
                            <p class="mt-2 text-4xl font-black text-[#071a33]">82</p>
                            <p class="mt-1 text-xs font-bold text-amber-600">Sekolah</p>
                        </article>
                        <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Input Sebagian</p>
                            <p class="mt-2 text-4xl font-black text-[#071a33]">147</p>
                            <p class="mt-1 text-xs font-bold text-blue-600">Sekolah</p>
                        </article>
                        <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Sudah Konfirmasi</p>
                            <p class="mt-2 text-4xl font-black text-[#071a33]">1.420</p>
                            <p class="mt-1 text-xs font-bold text-emerald-600">Sekolah</p>
                        </article>
                        <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Kendala Aktivasi</p>
                            <p class="mt-2 text-4xl font-black text-rose-600">238</p>
                            <p class="mt-1 text-xs font-bold text-rose-500">Siswa</p>
                        </article>
                    </section>

                    <!-- SECTION FILTER PEMANTAUAN (Tahun, Jenjang, Wilayah, Cari) -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
    <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <!-- SVG Filter Native -->
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-black text-[#071a33]">Filter Pemantauan</h3>
                <p class="text-xs font-bold text-slate-500">Filter pemantauan berdasarkan Tahun, Jenjang, Wilayah, dan Nama Siswa/Sekolah</p>
            </div>
        </div>
        <button type="button" onclick="resetFilterPemantauan()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
            <!-- SVG Reset Native -->
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            Reset Filter
        </button>
    </div>

    <!-- Form Filter Layout -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-6 items-end">
        
        <!-- Filter Tahun -->
        <div>
            <label for="filterTahun" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun</label>
            <select id="filterTahun" onchange="applyFilterPemantauan()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua">Semua Tahun</option>
                <option value="2026" selected>2026</option>
                <option value="2025">2025</option>
            </select>
        </div>

        <!-- Filter Jenjang -->
        <div>
            <label for="filterJenjang" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Jenjang</label>
            <select id="filterJenjang" onchange="applyFilterPemantauan()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Jenjang</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
            </select>
        </div>

        <!-- Filter Wilayah (Provinsi, Kabupaten, Kecamatan) -->
        <div class="md:col-span-2">
            <label for="filterWilayah" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Wilayah (Prov/Kab/Kec)</label>
            <select id="filterWilayah" onchange="applyFilterPemantauan()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Wilayah</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah (Semua Kab/Kec)</option>
                <option value="Banten">Banten (Semua Kab/Kec)</option>
            </select>
        </div>

        <!-- Search Input -->
        <div>
            <label for="filterSearch" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Cari</label>
            <input type="text" id="filterSearch" oninput="applyFilterPemantauan()" placeholder="Cari nama / NISN / Sekolah..." class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all">
        </div>

        <!-- Button Filter -->
        <div>
            <button type="button" onclick="applyFilterPemantauan()" class="w-full rounded-2xl bg-[#0055FF] px-4 py-2.5 text-xs font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20 flex items-center justify-center gap-2">
                <!-- SVG Kaca Pembesar Native -->
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Filter
            </button>
        </div>

    </div>
</section>

<!-- CARD TABEL DATA PEMANTAUN DENGAN ROW COLORING KONSISTEN SEPERTI DATA PIP -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-4">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <!-- SVG List Check Native -->
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-black text-[#071a33]">Daftar Pemantauan Siswa & Sekolah</h3>
                <p class="text-xs font-bold text-slate-500">Menampilkan detail pemantauan aktivasi rekening per siswa dan sekolah</p>
            </div>
        </div>

        <span class="px-4 py-2 rounded-xl bg-blue-50 text-[#0055FF] text-xs font-black border border-blue-100">
            Total Data: <span id="totalDataCount">0</span> Anak
        </span>
    </div>

    <!-- FILTER STATUS INPUT BERGAYA TAB/PILL DISATUKAN DI ATAS TABEL -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2">
        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-400 mr-2">Status Input:</label>
        <select id="filterStatusInput" onchange="applyFilterPemantauan()" class="rounded-2xl border-2 border-slate-300 bg-white px-4 py-2 text-xs font-black text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
            <option value="Semua" selected>Semua Status Input</option>
            <option value="Sudah Input">Sudah Input</option>
            <option value="Input Sebagian">Input Sebagian</option>
            <option value="Belum Input">Belum Input</option>
        </select>
    </div>

    <!-- TABEL DENGAN DYNAMIC ROW COLORING SAMA SEPERTI PIP -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[850px]">
            <thead>
                <tr class="border-b-2 border-slate-200 bg-slate-50/80 text-slate-700">
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider rounded-l-xl">Nama Siswa / NISN</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Sekolah / Jenjang</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Wilayah (Kec/Kab/Prov)</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Status Input</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Konfirmasi Rekening</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center rounded-r-xl">Aksi</th>
                </tr>
            </thead>
            <tbody id="tablePemantauanBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-800">
                <!-- Rendered dynamically by JavaScript -->
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
    // DATA PEMANTAUAN SISWA LENGKAP
    const masterPemantauanData = [
        { namaSiswa: "Ahmad Rizky", nisn: "0051234567", sekolah: "SDN 1 Banggai", jenjang: "SD", wilayah: "Banggai, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Sudah Input", konfirmasi: "Ya", tahun: "2026" },
        { namaSiswa: "Siti Nurhaliza", nisn: "0062345678", sekolah: "SDN 1 Selatan", jenjang: "SD", wilayah: "Selatan, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Belum Input", konfirmasi: "Belum", tahun: "2026" },
        { namaSiswa: "Budi Santoso", nisn: "0043456789", sekolah: "SMPN 1 Labobo", jenjang: "SMP", wilayah: "Labobo, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Belum Input", konfirmasi: "Ya", tahun: "2026" },
        { namaSiswa: "Dewi Lestari", nisn: "0054567890", sekolah: "SMPN 1 Banggai", jenjang: "SMP", wilayah: "Banggai, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Input Sebagian", konfirmasi: "Belum", tahun: "2026" },
        { namaSiswa: "Fajar Pratama", nisn: "0035678901", sekolah: "SMAN 1 Bokan", jenjang: "SMA", wilayah: "Bokan, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Sudah Input", konfirmasi: "Belum", tahun: "2026" },
        { namaSiswa: "Gita Gutawa", nisn: "0026789012", sekolah: "SMAN 1 Banggai", jenjang: "SMA", wilayah: "Banggai, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Sudah Input", konfirmasi: "Belum", tahun: "2026" },
        { namaSiswa: "Hendra Wijaya", nisn: "0047890123", sekolah: "SMKN 1 Labobo", jenjang: "SMK", wilayah: "Labobo, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Belum Input", konfirmasi: "Ya", tahun: "2025" },
        { namaSiswa: "Indah Permata", nisn: "0058901234", sekolah: "SMKN 1 Banggai", jenjang: "SMK", wilayah: "Banggai, Kab. Banggai Laut, Sulawesi Tengah", statusInput: "Input Sebagian", konfirmasi: "Belum", tahun: "2026" },
        { namaSiswa: "Joko Widodo", nisn: "0069012345", sekolah: "SDN 1 Larangan", jenjang: "SD", wilayah: "Larangan, Kota Tangerang, Banten", statusInput: "Sudah Input", konfirmasi: "Belum", tahun: "2026" },
        { namaSiswa: "Kurniawan", nisn: "0070123456", sekolah: "SDN 2 Larangan", jenjang: "SD", wilayah: "Larangan, Kota Tangerang, Banten", statusInput: "Belum Input", konfirmasi: "Ya", tahun: "2026" },
        { namaSiswa: "Larasati", nisn: "0041234568", sekolah: "SMPN 1 Cileduk", jenjang: "SMP", wilayah: "Cileduk, Kota Tangerang, Banten", statusInput: "Sudah Input", konfirmasi: "Belum", tahun: "2026" },
        { namaSiswa: "Muhammad Ali", nisn: "0052345679", sekolah: "SMPN 2 Cileduk", jenjang: "SMP", wilayah: "Cileduk, Kota Tangerang, Banten", statusInput: "Sudah Input", konfirmasi: "Belum", tahun: "2026" }
    ];

    function renderPemantauanTable(data) {
        const tbody = document.getElementById('tablePemantauanBody');
        const totalCountSpan = document.getElementById('totalDataCount');
        tbody.innerHTML = '';
        totalCountSpan.innerText = data.length;

        if (data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-8 text-slate-400 font-bold text-sm">
                        Tidak ada data pemantauan yang cocok dengan filter.
                    </td>
                </tr>
            `;
            return;
        }

        data.forEach(item => {
            const tr = document.createElement('tr');

            // Default Styling
            let rowBgClass = 'hover:bg-slate-100 transition-all border-b-2 border-slate-200';
            let textNamaClass = 'text-[#071a33] font-bold';
            let textSubClass = 'text-slate-700';

            // KONSISTENSI PEWARNAAN BARIS SEPERTI TABEL PIP (Sudah Input = Emerald, Input Sebagian = Blue, Belum Input = Rose)
            if (item.statusInput === 'Sudah Input') {
                rowBgClass = 'bg-emerald-100 hover:bg-emerald-200 border-b-2 border-emerald-300 transition-all';
                textNamaClass = 'text-emerald-950 font-black';
                textSubClass = 'text-emerald-900 font-bold';
            } else if (item.statusInput === 'Input Sebagian') {
                rowBgClass = 'bg-blue-100 hover:bg-blue-200 border-b-2 border-blue-300 transition-all';
                textNamaClass = 'text-blue-950 font-black';
                textSubClass = 'text-blue-900 font-bold';
            } else if (item.statusInput === 'Belum Input') {
                rowBgClass = 'bg-rose-100 hover:bg-rose-200 border-b-2 border-rose-300 transition-all';
                textNamaClass = 'text-rose-950 font-black';
                textSubClass = 'text-rose-900 font-bold';
            }

            tr.className = rowBgClass;

            let badgeStatus = '';
            let actionButton = '';

            if (item.statusInput === 'Sudah Input') {
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-emerald-200 text-emerald-900 border border-emerald-400 text-xs font-black">Sudah Input</span>`;
                actionButton = `<button onclick="detailPemantauan('${item.namaSiswa}')" class="text-[#0055FF] hover:text-blue-900 font-black text-sm transition underline">Lihat Detail</button>`;
            } else if (item.statusInput === 'Input Sebagian') {
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-blue-200 text-blue-900 border border-blue-400 text-xs font-black">Input Sebagian</span>`;
                actionButton = `<button onclick="detailPemantauan('${item.namaSiswa}')" class="text-[#0055FF] hover:text-blue-900 font-black text-sm transition underline">Lihat Detail</button>`;
            } else if (item.statusInput === 'Belum Input') {
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-rose-200 text-rose-900 border border-rose-400 text-xs font-black">Belum Input</span>`;
                actionButton = `<button onclick="detailPemantauan('${item.namaSiswa}')" class="text-rose-800 hover:text-rose-950 font-black text-sm transition underline">Tindak Lanjut</button>`;
            }

            let badgeKonfirmasi = item.konfirmasi === 'Ya' 
                ? `<span class="px-3 py-1 rounded-full bg-emerald-500 text-white text-xs font-black">Ya</span>`
                : `<span class="px-3 py-1 rounded-full bg-rose-500 text-white text-xs font-black">Belum</span>`;

            tr.innerHTML = `
                <td class="p-4 ${textNamaClass}">
                    <div>${item.namaSiswa}</div>
                    <div class="text-xs font-mono font-medium text-slate-500">${item.nisn}</div>
                </td>
                <td class="p-4 ${textSubClass}">
                    <div>${item.sekolah}</div>
                    <span class="inline-block mt-1 px-2 py-0.5 rounded bg-slate-200 text-[#071a33] text-[10px] font-black">${item.jenjang}</span>
                </td>
                <td class="p-4 text-xs ${textSubClass}">${item.wilayah}</td>
                <td class="p-4 text-center">${badgeStatus}</td>
                <td class="p-4 text-center">${badgeKonfirmasi}</td>
                <td class="p-4 text-center">${actionButton}</td>
            `;
            tbody.appendChild(tr);
        });
    }

    function applyFilterPemantauan() {
        const tahun = document.getElementById('filterTahun').value;
        const jenjang = document.getElementById('filterJenjang').value;
        const wilayah = document.getElementById('filterWilayah').value;
        const statusInput = document.getElementById('filterStatusInput').value;
        const searchVal = document.getElementById('filterSearch').value.toLowerCase().trim();

        const filtered = masterPemantauanData.filter(item => {
            const matchTahun = (tahun === "Semua" || item.tahun === tahun);
            const matchJenjang = (jenjang === "Semua" || item.jenjang === jenjang);
            const matchWilayah = (wilayah === "Semua" || item.wilayah.toLowerCase().includes(wilayah.toLowerCase()));
            const matchStatus = (statusInput === "Semua" || item.statusInput === statusInput);
            
            const fullText = (item.namaSiswa + " " + item.nisn + " " + item.sekolah).toLowerCase();
            const matchSearch = (searchVal === "" || fullText.includes(searchVal));

            return matchTahun && matchJenjang && matchWilayah && matchStatus && matchSearch;
        });

        renderPemantauanTable(filtered);
    }

    function resetFilterPemantauan() {
        document.getElementById('filterTahun').value = "2026";
        document.getElementById('filterJenjang').value = "Semua";
        document.getElementById('filterWilayah').value = "Semua";
        document.getElementById('filterStatusInput').value = "Semua";
        document.getElementById('filterSearch').value = "";
        renderPemantauanTable(masterPemantauanData);
    }

    function detailPemantauan(nama) {
        alert(`Melihat detail pemantauan aktivasi untuk siswa: ${nama}`);
    }

    document.addEventListener('DOMContentLoaded', () => {
        renderPemantauanTable(masterPemantauanData);
    });
</script>
</body>
</html>