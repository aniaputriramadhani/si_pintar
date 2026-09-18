<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Wilayah Dinas Pendidikan SIPINTAR.">
    <title>Dashboard Dinas | SIPINTAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { --ink:#071a33; --blue:#0055FF; --aqua:#5ee8d6; }
        body { font-family:'Plus Jakarta Sans',sans-serif; background:#f8fafc; color:var(--ink); }
        .mono { font-family:'DM Mono',monospace; }
        .page-grid { background-image:linear-gradient(rgba(0,85,255,.055) 1px,transparent 1px),linear-gradient(90deg,rgba(0,85,255,.055) 1px,transparent 1px); background-size:54px 54px; }
        .sidebar-link { transition: all 0.2s ease-in-out; }
        .sidebar-link:hover:not(.active) { transform:translateX(4px); }
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
                            <span class="inline-flex items-center rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-xs font-black tracking-wider text-[#0055FF]">PORTAL DINAS</span>
                        </div>
                    </div>
                </a>

                <!-- Informasi Dinas Aktif (Widget Sidebar) -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-4">
                    <p id="sideNamaDinas" class="text-lg font-black text-slate-800 leading-snug">Dinas Pendidikan Kab/Kota</p>
                    <p id="sideKodeWilayah" class="mono text-xs font-bold text-blue-600 mt-1">WILAYAH DAERAH</p>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-6" aria-label="Navigasi Dinas">
                    
                    <!-- Kategori 1: Utama -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Utama</p>
                        
                        <!-- Dashboard -->
                        <a href="{{ Route::has('dinas.dashboard') ? route('dinas.dashboard') : url('/dinas/dashboard') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- Kategori 2: Pengelolaan & Monitoring -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Pengelolaan & Monitoring</p>
                        
                        <!-- Data PIP -->
                        <a href="{{ Route::has('dinas.datapip') ? route('dinas.datapip') : url('/dinas/data-pip') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/data-pip*') || request()->is('dinas/pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/data-pip*') || request()->is('dinas/pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data PIP</span>
                        </a>

                        <!-- Pemantauan -->
                        <a href="{{ Route::has('dinas.pemantauan') ? route('dinas.pemantauan') : url('/dinas/pemantauan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span>Pemantauan</span>
                        </a>

                        <!-- Rekap -->
                        <a href="{{ Route::has('dinas.rekap') ? route('dinas.rekap') : url('/dinas/rekap') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/rekap*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/rekap*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span>Rekap</span>
                        </a>

                        <!-- Verifikasi Usulan -->
                        <a href="{{ Route::has('dinas.verifikasi') ? route('dinas.verifikasi') : url('/dinas/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi Usulan</span>
                        </a>
                    </div>

                    <!-- Kategori 3: Layanan & Administrasi -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan & Administrasi</p>

                        <!-- Dokumen -->
                        <a href="{{ Route::has('dinas.dokumen') ? route('dinas.dokumen') : url('/dinas/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            <span>Dokumen</span>
                        </a>

                        <!-- Pengaduan -->
                        <a href="{{ Route::has('dinas.pengaduan') ? route('dinas.pengaduan') : url('/dinas/pengaduan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>Pengaduan</span>
                        </a>

                        <!-- Status dan Riwayat -->
                        <a href="{{ Route::has('dinas.status') ? route('dinas.status') : url('/dinas/status') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/status*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/status*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Status dan Riwayat</span>
                        </a>
                    </div>

                </nav>
            </div>

            <!-- Footer Card & Tombol Logout -->
            <div class="mt-8 pt-5 border-t border-slate-100 space-y-4">
                <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                    <p class="text-base font-bold text-slate-600 leading-snug">Dinas Pendidikan Wilayah</p>
                    <p class="text-sm font-extrabold text-slate-800 mt-1">SIPINTAR Daerah</p>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf 
                    <button type="submit" class="flex w-full items-center justify-center gap-3 rounded-2xl border border-red-200/60 bg-red-50/60 px-4 py-3.5 text-xl font-extrabold text-red-600 transition hover:bg-red-100 hover:border-red-200 focus:outline-none focus:ring-2 focus:ring-red-200">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN KONTEN UTAMA -->
        <main id="konten-utama" class="flex-1 min-w-0">
            
            <!-- TOP NAVBAR HEADER -->
            <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 px-5 py-4 backdrop-blur-xl sm:px-8 lg:px-10">
                <div class="mx-auto flex max-w-[1500px] items-center justify-between gap-4">
                    
                    <!-- Judul Header Topbar -->
                    <div class="flex items-center gap-3">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">DP</span>
                        <div>
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">Pusat Kendali Wilayah</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-3xl text-[#071a33]">Monitoring Data PIP</h1>
                        </div>
                    </div>

                    <!-- Profil Dinas / Status -->
                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p id="topNamaDinas" class="text-lg font-extrabold text-[#071a33]">Dinas Pendidikan</p>
                            <p class="text-base font-bold text-emerald-600 flex items-center justify-end gap-1.5">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span> Sistem Aktif
                            </p>
                        </div>

                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-white font-extrabold text-xl shadow-lg shadow-blue-600/30" aria-label="Profil Dinas">
                            DP
                        </div>
                    </div>

                </div>
            </header>

            <div class="min-h-screen text-[#071a33] font-['Plus_Jakarta_Sans',sans-serif] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- 1. BAGIAN ATAS: 3 KARTU STATISTIK UTAMA -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        
                        <!-- 01 / SEKOLAH TERPANTAU -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#0055FF]/40 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#0055FF]/10 pointer-events-none"></div>
                            <span class="font-['DM_Mono'] text-xs font-bold uppercase tracking-widest text-[#0055FF]">SEKOLAH TERPANTAU</span>
                            <div class="mt-4 flex items-baseline">
                                <h4 id="statSekolah" class="text-4xl sm:text-5xl font-extrabold tracking-tight text-[#071a33]">6</h4>
                                <span class="ml-2 text-sm font-bold text-slate-400">Sekolah</span>
                            </div>
                        </div>

                        <!-- 02 / SK PENETAPAN (Sudah Aktivasi & Belum Aktivasi) -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#5ee8d6]/50 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#5ee8d6]/10 pointer-events-none"></div>
                            <span class="font-['DM_Mono'] text-xs font-bold uppercase tracking-widest text-teal-600">SK PENETAPAN</span>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <div class="rounded-xl bg-blue-50/80 p-3 border border-blue-100">
                                    <p class="text-xs font-extrabold uppercase text-[#0055FF]">Sudah Aktivasi</p>
                                    <p id="statSudahAktivasi" class="mt-1 text-2xl sm:text-3xl font-extrabold text-[#071a33]">1.430</p>
                                </div>
                                <div class="rounded-xl bg-slate-50 p-3 border border-slate-200">
                                    <p class="text-xs font-extrabold uppercase text-slate-500">Belum Aktivasi</p>
                                    <p id="statBelumAktivasi" class="mt-1 text-2xl sm:text-3xl font-extrabold text-[#071a33]">512</p>
                                </div>
                            </div>
                        </div>

                        <!-- 03 / SK PEMBATALAN -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-rose-200 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-rose-50 pointer-events-none"></div>
                            <span class="font-['DM_Mono'] text-xs font-bold uppercase tracking-widest text-rose-600">SK PEMBATALAN</span>
                            <div class="mt-4 flex items-baseline">
                                <h4 id="statPembatalan" class="text-4xl sm:text-5xl font-extrabold tracking-tight text-[#071a33]">24</h4>
                                <span class="ml-2 text-sm font-bold text-slate-400">Kasus Dibatalkan</span>
                            </div>
                        </div>

                    </div>

                    <!-- 2. BAGIAN TENGAH: COMPONENT FILTER (Tahun, Bulan, Wilayah: Prov, Kab, Kec) -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                        <div class="mb-5 flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-filter text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-[#071a33]">Filter Wilayah & Waktu</h3>
                                    <p class="text-xs font-bold text-slate-500">Saring data penerima PIP berdasarkan parameter Tahun, Bulan, dan Wilayah Administrasi</p>
                                </div>
                            </div>
                            <button type="button" onclick="resetFilterPip()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                                <i class="fa-solid fa-rotate-right"></i> Reset Filter
                            </button>
                        </div>

                        <!-- Form Filter Layout (6 Input / Select) -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 items-end">
                            
                            <!-- Filter Tahun -->
                            <div>
                                <label for="filterTahun" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun</label>
                                <select id="filterTahun" onchange="applyFilterPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Semua Tahun</option>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>

                            <!-- Filter Bulan -->
                            <div>
                                <label for="filterBulan" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Bulan</label>
                                <select id="filterBulan" onchange="applyFilterPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Semua Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>

                            <!-- Filter Wilayah 1: Provinsi -->
                            <div>
                                <label for="filterProvinsi" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Provinsi</label>
                                <select id="filterProvinsi" onchange="updateKabupatenOptions(); applyFilterPip();" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Semua Provinsi</option>
                                    <option value="31">DKI Jakarta</option>
                                    <option value="32">Jawa Barat</option>
                                    <option value="33">Jawa Tengah</option>
                                    <option value="35">Jawa Timur</option>
                                </select>
                            </div>

                            <!-- Filter Wilayah 2: Kabupaten / Kota -->
                            <div>
                                <label for="filterKabupaten" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Kabupaten / Kota</label>
                                <select id="filterKabupaten" onchange="updateKecamatanOptions(); applyFilterPip();" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Semua Kab/Kota</option>
                                </select>
                            </div>

                            <!-- Filter Wilayah 3: Kecamatan -->
                            <div>
                                <label for="filterKecamatan" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Kecamatan</label>
                                <select id="filterKecamatan" onchange="applyFilterPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Semua Kecamatan</option>
                                </select>
                            </div>

                            <!-- Button Filter -->
                            <div>
                                <button type="button" onclick="applyFilterPip()" class="w-full rounded-2xl bg-[#0055FF] px-6 py-2.5 text-sm font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20 flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-magnifying-glass"></i> Terapkan
                                </button>
                            </div>

                        </div>
                    </section>

                    <!-- 3. BAGIAN BAWAH: GRAFIK & TABEL VISUALISASI -->
                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                        <div class="xl:col-span-3 rounded-[2.5rem] bg-white p-8 sm:p-10 border-2 border-slate-200 shadow-xl shadow-slate-200/50 flex flex-col justify-between">
                            <!-- Header Card -->
                            <div>
                                <span class="font-['DM_Mono'] text-sm sm:text-base font-black uppercase tracking-widest text-[#0055FF]">Visualisasi Bulanan</span>
                                <h3 class="text-2xl sm:text-3xl font-black text-[#071a33] mt-2 mb-2">Siswa Disalurkan per Bulan</h3>
                                <p class="text-base sm:text-lg font-bold text-slate-600 mb-8">Grafik tren penyaluran berdasarkan wilayah dan rentang waktu terpilih</p>
                            </div>
                            
                            <!-- Container Canvas Grafik -->
                            <div class="relative h-[480px] w-full mb-8">
                                <canvas id="lineChart"></canvas>
                            </div>

                            <!-- TABEL DATA DI BAWAH GRAFIK -->
                            <div class="overflow-x-auto rounded-2xl border-2 border-slate-300 mt-2">
                                <table class="w-full text-center text-sm sm:text-base font-bold text-slate-800">
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
                                    <tbody class="divide-y-2 divide-slate-200">
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
                    </div>

                    <!-- PANEL ANALISA DATA (Narasi Otomatis) -->
                    <div class="relative overflow-hidden rounded-[2.5rem] bg-white border border-slate-100 p-6 sm:p-8 text-[#071a33] shadow-xl shadow-slate-200/40">
                        <div class="absolute -right-10 -bottom-10 h-44 w-44 rounded-full bg-[#5ee8d6]/20 blur-2xl pointer-events-none"></div>
                        <div class="absolute -left-10 -top-10 h-32 w-32 rounded-full bg-[#0055FF]/10 blur-xl pointer-events-none"></div>

                        <div class="relative z-10 flex items-start gap-4 sm:gap-5">
                            <div class="rounded-2xl bg-blue-50/80 p-3.5 text-[#0055FF] shrink-0 border border-blue-100/80 shadow-sm">
                                <svg class="h-6 w-6 sm:h-7 sm:w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-['DM_Mono'] text-xs font-extrabold uppercase tracking-widest text-[#0055FF]">
                                    PANEL ANALISA DATA (NARASI OTOMATIS)
                                </h4>
                                <p id="textAnalisa" class="text-base sm:text-lg font-semibold text-slate-600 mt-2 leading-relaxed">
                                    Secara wilayah terpilih, penyaluran mencapai <span class="underline decoration-[#5ee8d6] decoration-4 font-extrabold text-[#071a33]">82% dari alokasi</span> (22.723 dari 27.676 siswa), dengan total dana disalurkan <span class="font-extrabold text-[#071a33]">Rp18.828.261.405</span>. Aktivasi mencapai <span class="font-extrabold text-[#071a33]">73%</span>, dengan 5.913 siswa belum aktivasi dan 279 kasus dibatalkan.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let myLineChart;

        // Data opsi Kabupaten & Kecamatan bertingkat
        const dataWilayah = {
            "31": {
                name: "DKI Jakarta",
                kabupaten: {
                    "3171": { name: "Jakarta Selatan", kecamatan: ["Kebayoran Baru", "Kebayoran Lama", "Cilandak", "Pesanggrahan"] },
                    "3173": { name: "Jakarta Barat", kecamatan: ["Grogol Petamburan", "Kebon Jeruk", "Kembangan"] }
                }
            },
            "32": {
                name: "Jawa Barat",
                kabupaten: {
                    "3201": { name: "Kab. Bogor", kecamatan: ["Cibinong", "Ciawi", "Cisarua"] },
                    "3273": { name: "Kota Bandung", kecamatan: ["Coblong", "Sukajadi", "Sumur Bandung"] }
                }
            }
        };

        // Mock data dummy untuk pembaruan grafik
        const mockDataChart = [267, 177, 117, 137, 28, 211, 145, 223, 106, 23, 355, 177];

        document.addEventListener("DOMContentLoaded", function () {
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            
            const gradientBg = ctxLine.createLinearGradient(0, 0, 0, 400);
            gradientBg.addColorStop(0, 'rgba(0, 85, 255, 0.25)');
            gradientBg.addColorStop(1, 'rgba(0, 85, 255, 0.0)');

            myLineChart = new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'Siswa Disalurkan',
                        data: mockDataChart,
                        borderColor: '#0055FF',
                        borderWidth: 3.5,
                        backgroundColor: gradientBg,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#0055FF',
                        pointBorderColor: '#FFFFFF',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { font: { weight: 'bold', size: 12 }, color: '#64748B' }
                        },
                        y: {
                            min: 0,
                            max: 450,
                            ticks: { stepSize: 50, font: { weight: 'bold', size: 12 }, color: '#64748B' },
                            grid: { color: '#F1F5F9' }
                        }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#071A33',
                            titleFont: { size: 14, weight: 'bold' },
                            bodyFont: { size: 13, weight: 'bold' },
                            padding: 12,
                            cornerRadius: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) { return context.raw + ' Siswa Disalurkan'; }
                            }
                        }
                    }
                }
            });
        });

        // Update Pilihan Kabupaten berdasarkan Provinsi terpilih
        function updateKabupatenOptions() {
            const provId = document.getElementById('filterProvinsi').value;
            const kabSelect = document.getElementById('filterKabupaten');
            const kecSelect = document.getElementById('filterKecamatan');

            kabSelect.innerHTML = '<option value="Semua" selected>Semua Kab/Kota</option>';
            kecSelect.innerHTML = '<option value="Semua" selected>Semua Kecamatan</option>';

            if (provId !== 'Semua' && dataWilayah[provId]) {
                const kabList = dataWilayah[provId].kabupaten;
                for (const code in kabList) {
                    const opt = document.createElement('option');
                    opt.value = code;
                    opt.textContent = kabList[code].name;
                    kabSelect.appendChild(opt);
                }
            }
        }

        // Update Pilihan Kecamatan berdasarkan Kabupaten terpilih
        function updateKecamatanOptions() {
            const provId = document.getElementById('filterProvinsi').value;
            const kabId = document.getElementById('filterKabupaten').value;
            const kecSelect = document.getElementById('filterKecamatan');

            kecSelect.innerHTML = '<option value="Semua" selected>Semua Kecamatan</option>';

            if (provId !== 'Semua' && kabId !== 'Semua' && dataWilayah[provId] && dataWilayah[provId].kabupaten[kabId]) {
                const kecList = dataWilayah[provId].kabupaten[kabId].kecamatan;
                kecList.forEach(kec => {
                    const opt = document.createElement('option');
                    opt.value = kec;
                    opt.textContent = kec;
                    kecSelect.appendChild(opt);
                });
            }
        }

        // Fungsi Filter Interaktif
        function applyFilterPip() {
            const tahun = document.getElementById('filterTahun').value;
            const bulan = document.getElementById('filterBulan').value;
            const prov = document.getElementById('filterProvinsi').value;

            // Pengacakan dummy visual untuk respon live filter
            let factor = 1;
            if (tahun === '2026') factor = 1.2;
            if (tahun === '2024') factor = 0.8;
            if (bulan !== 'Semua') factor *= 0.5;

            const updatedData = mockDataChart.map(v => Math.round(v * factor));
            myLineChart.data.datasets[0].data = updatedData;
            myLineChart.update();

            // Interaksi angka pada card atas
            document.getElementById('statSekolah').innerText = prov !== 'Semua' ? '4' : '6';
            document.getElementById('statSudahAktivasi').innerText = Math.round(1430 * factor).toLocaleString('id-ID');
            document.getElementById('statBelumAktivasi').innerText = Math.round(512 * factor).toLocaleString('id-ID');
        }

        function resetFilterPip() {
            document.getElementById('filterTahun').value = 'Semua';
            document.getElementById('filterBulan').value = 'Semua';
            document.getElementById('filterProvinsi').value = 'Semua';
            updateKabupatenOptions();
            applyFilterPip();
        }
    </script>
</body>
</html>