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

        /* Custom Scrollbar */
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
                #3b82f6,
                #3b82f6 6px,
                #bfdbfe 6px,
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
    <!-- Accessibility Skip Link -->
    <a href="#konten-utama" class="fixed -top-20 left-4 z-[60] rounded-xl bg-[#0055FF] px-5 py-3 text-lg font-extrabold text-white shadow-xl transition focus:top-4 focus:outline-none focus:ring-4 focus:ring-blue-200">
        Lewati ke konten utama
    </a>
    
    <!-- Background Decor -->
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden bg-gradient-to-br from-[#f5fbff] via-[#eaf6ff] to-[#eefcf8]">
        <div class="page-grid absolute inset-0"></div>
        <div class="absolute -right-40 -top-48 h-[38rem] w-[38rem] rounded-full bg-blue-300/20 blur-3xl"></div>
        <div class="absolute -bottom-44 -left-40 h-[34rem] w-[34rem] rounded-full bg-[#5ee8d6]/20 blur-3xl"></div>
    </div>

    <!-- Layout Container -->
    <div class="min-h-screen lg:flex">
        
        <!-- SIDEBAR KIRI -->
        <aside class="sticky top-0 z-20 hidden h-screen w-96 flex-shrink-0 flex-col justify-between overflow-y-auto border-r border-slate-200/80 bg-white p-6 shadow-sm no-scrollbar lg:flex">
            <div class="space-y-8">
                
                <!-- Header Brand Card -->
                <a href="{{ route('public.home') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/80 p-4 transition hover:border-slate-200 hover:bg-slate-100/80 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-xl border border-slate-100 bg-white p-2 shadow-sm">
                        <img src="https://pip.kemendikdasmen.go.id/img/logo-sipintar.png" 
                     alt="Logo Kemendikdasmen" 
                     class="h-full w-full object-contain">
            </div>
                    <div class="flex min-w-0 flex-col">
                        <span class="truncate text-3xl font-black leading-tight tracking-tight text-slate-800 transition-colors group-hover:text-[#0055FF]">SIPINTAR</span>
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
                        <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : url('/admin/dashboard') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}" {{ request()->is('admin/dashboard*') ? 'aria-current="page"' : '' }}>
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- Kategori 2: Data & Pemantauan -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Data & Pemantauan</p>
                        
                        <a href="{{ Route::has('pip.index') ? route('pip.index') : url('/admin/pip') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span>Data PIP</span>
                        </a>
                        
                        <a href="{{ Route::has('admin.pemantauan') ? route('admin.pemantauan') : url('/admin/pemantauan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->routeIs('admin.pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}" {{ request()->routeIs('admin.pemantauan*') ? 'aria-current="page"' : '' }}>
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->routeIs('admin.pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>Pemantauan</span>
                        </a>
                        
                        <a href="{{ Route::has('admin.rekap') ? route('admin.rekap') : url('/admin/rekap') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/rekap*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/rekap*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span>Rekap</span>
                        </a>
                        
                        <a href="{{ Route::has('admin.verifikasi') ? route('admin.verifikasi') : url('/admin/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi</span>
                        </a>
                    </div>

                    <!-- Kategori 3: Layanan & Berkas -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan & Berkas</p>
                        
                        <a href="{{ Route::has('admin.dokumen') ? route('admin.dokumen') : url('/admin/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                            <span>Dokumen</span>
                        </a>
                        
                        <a href="{{ Route::has('admin.layanan') ? route('admin.layanan') : url('/admin/layanan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5 0a2.5 2.5 0 10-5 0 2.5 2.5 0 005 0zM10.5 15.5v-1a2.5 2.5 0 00-5 0v1"></path></svg>
                            <span>Pengaduan</span>
                        </a>
                    </div>

                    <!-- Kategori 4: Sistem -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Sistem</p>
                        
                        <a href="{{ Route::has('admin.pengguna') ? route('admin.pengguna') : url('/admin/pengguna') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Profil</span>
                        </a>
                        
                        <a href="{{ Route::has('admin.pengaturan') ? route('admin.pengaturan') : url('/admin/pengaturan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->routeIs('admin.pengaturan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}" {{ request()->routeIs('admin.pengaturan*') ? 'aria-current="page"' : '' }}>
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->routeIs('admin.pengaturan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Pengaturan</span>
                        </a>
                    </div>

                </nav>
            </div>

            <!-- Footer Card & Tombol Logout -->
            <div class="mt-8 space-y-4 border-t border-slate-100 pt-5">
                <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                    <p class="text-base font-bold leading-snug text-slate-600">Pusat Layanan Pembiayaan Pendidikan</p>
                    <p class="mt-1 text-sm font-extrabold text-slate-800">Kemendikdasmen RI</p>
                </div>

                <form action="{{ Route::has('logout') ? route('logout') : url('/logout') }}" method="POST">
                    @csrf 
                    <button type="submit" class="flex w-full items-center justify-center gap-3 rounded-2xl border border-red-200/60 bg-red-50/60 px-4 py-3.5 text-xl font-extrabold text-red-600 transition hover:border-red-200 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-200">
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
                            <p class="mono text-small font-bold uppercase tracking-[.16em] text-[#0055FF]">Sistem</p>
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Pengaturan</h1>
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

            <!-- Inner Content -->
            <div class="space-y-8 px-4 py-6 sm:px-8 lg:px-12 lg:py-8">
                
                @if(session('success'))
                <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-bold text-emerald-700 shadow-sm">
                    {{ session('success') }}
                </div>
                @endif

                <!-- KARTU PENGATURAN SISTEM (GRID 2 KOLOM UNTUK KESEIMBANGAN TAMPILAN) -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    
                    <!-- Card 1: Bersihkan Cache Aset -->
                    <div class="flex flex-col justify-between space-y-4 rounded-[2rem] border border-slate-100 bg-white p-6 shadow-xl shadow-slate-200/40">
                        <div>
                            <div class="flex items-center justify-between gap-2">
                                <h3 class="text-base font-extrabold text-[#071a33]">Bersihkan Cache Aset</h3>
                                <span class="rounded-full bg-emerald-100 px-3 py-0.5 text-xs font-bold text-emerald-700">Normal</span>
                            </div>
                            <p class="mt-2 text-xs font-medium leading-relaxed text-slate-500">
                                Gunakan jika pembaruan tampilan belum muncul pada pengguna.
                            </p>
                        </div>
                        <div class="pt-2">
                            <button type="button" class="w-auto rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-extrabold text-[#071a33] shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                                Bersihkan Cache
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Panduan Pengguna -->
                    <div class="flex flex-col justify-between space-y-4 rounded-[2rem] border border-slate-100 bg-white p-6 shadow-xl shadow-slate-200/40">
                        <div>
                            <div class="flex items-center justify-between gap-2">
                                <h3 class="text-base font-extrabold text-[#071a33]">Panduan Pengguna</h3>
                                <span class="rounded-full bg-blue-100 px-3 py-0.5 text-xs font-bold text-[#0055FF]">Dokumentasi</span>
                            </div>
                            <p class="mt-2 text-xs font-medium leading-relaxed text-slate-500">
                                Panduan alur & fungsi operasional untuk Administrator, Dinas, dan Sekolah.
                            </p>
                        </div>
                        <div class="pt-2">
                            <button type="button" class="w-auto rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-extrabold text-[#071a33] shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                                Buka Panduan
                            </button>
                        </div>
                    </div>

                </div>

                <!-- RIWAYAT AKTIVITAS SISTEM -->
                <div class="space-y-6 rounded-[2rem] border border-slate-100 bg-white p-6 shadow-xl shadow-slate-200/40 sm:p-8">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-extrabold text-[#071a33]">Riwayat Aktivitas Sistem</h2>
                        <span class="mono text-xs font-bold text-slate-400">Log Terbaru</span>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-left">
                            <thead>
                                <tr class="border-b border-slate-100 text-xs font-extrabold uppercase tracking-wider text-slate-400">
                                    <th class="px-4 pb-4 pt-2">Waktu</th>
                                    <th class="px-4 pb-4 pt-2">Aktivitas</th>
                                    <th class="px-4 pb-4 pt-2">Pelaksana</th>
                                    <th class="px-4 pb-4 pt-2 text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm font-bold text-[#071a33]">
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-4 py-4 text-xs font-medium text-slate-500">15 Jul 2026 09:15</td>
                                    <td class="px-4 py-4">Generate Rekap SIPINTAR</td>
                                    <td class="mono px-4 py-4 text-xs text-slate-600">@admin_pusat</td>
                                    <td class="px-4 py-4 text-right">
                                        <span class="inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-extrabold text-emerald-700">Berhasil</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-4 py-4 text-xs font-medium text-slate-500">15 Jul 2026 08:45</td>
                                    <td class="px-4 py-4">Bersihkan Cache Aset</td>
                                    <td class="mono px-4 py-4 text-xs text-slate-600">@admin_pusat</td>
                                    <td class="px-4 py-4 text-right">
                                        <span class="inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-extrabold text-emerald-700">Berhasil</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>