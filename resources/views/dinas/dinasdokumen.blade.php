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

        /* Custom Class untuk Card Clean */
        .card-clean {
            background-color: #ffffff;
            border-radius: 1rem;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.03);
        }

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
                        
                        <!-- Dashboard (dashboard.blade.php) -->
                        <a href="{{ Route::has('dinas.dashboard') ? route('dinas.dashboard') : url('/dinas/dashboard') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- Kategori 2: Pengelolaan & Monitoring -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Pengelolaan & Monitoring</p>
                        
                        <!-- Data PIP (datapip.blade.php) -->
                        <a href="{{ Route::has('dinas.datapip') ? route('dinas.datapip') : url('/dinas/data-pip') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/data-pip*') || request()->is('dinas/pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/data-pip*') || request()->is('dinas/pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data PIP</span>
                        </a>

                        <!-- Pemantauan (pemantauan.blade.php) -->
                        <a href="{{ Route::has('dinas.pemantauan') ? route('dinas.pemantauan') : url('/dinas/pemantauan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span>Pemantauan</span>
                        </a>

                        <!-- Rekap (rekap.blade.php) -->
                        <a href="{{ Route::has('dinas.rekap') ? route('dinas.rekap') : url('/dinas/rekap') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/rekap*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/rekap*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span>Rekap</span>
                        </a>

                        <!-- Verifikasi Usulan (dinas.verifikasi.blade.php) -->
                        <a href="{{ Route::has('dinas.verifikasi') ? route('dinas.verifikasi') : url('/dinas/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi Usulan</span>
                        </a>
                    </div>

                    <!-- Kategori 3: Layanan & Administrasi -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan & Administrasi</p>

                        <!-- Dokumen (dinasdokumen.blade.php) -->
                        <a href="{{ Route::has('dinas.dokumen') ? route('dinas.dokumen') : url('/dinas/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            <span>Dokumen</span>
                        </a>

                        <!-- Pengaduan (pengaduan.blade.php) -->
                        <a href="{{ Route::has('dinas.pengaduan') ? route('dinas.pengaduan') : url('/dinas/pengaduan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>Pengaduan</span>
                        </a>

                        <!-- Status dan Riwayat (status.blade.php) -->
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
        <main id="konten-utama" class="flex-1 min-w-0 p-4 sm:p-6 lg:p-8 space-y-6">
            
            <!-- TOP NAVBAR HEADER -->
            <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 -mx-4 -mt-4 mb-6 px-5 py-4 backdrop-blur-xl sm:-mx-6 sm:-mt-6 sm:px-8 lg:-mx-8 lg:-mt-8 lg:px-10">
                <div class="mx-auto flex max-w-[1500px] items-center justify-between gap-4">
                    
                    <!-- Judul Header -->
                    <div class="flex items-center gap-3">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">DP</span>
                        <div>
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">Layanan & Administrasi</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Dokumen</h1>
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

            <!-- BAGIAN TAMPILAN KARTU DOKUMEN -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                
                <!-- Card 1: Unduh Format Usulan -->
                <div class="card-clean p-6 flex flex-col justify-between space-y-4 border-t-4 border-t-blue-600">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-xl font-extrabold text-slate-900">Unduh Format Usulan</h3>
                            <p class="text-sm font-semibold text-slate-500 mt-1">Format usulan sesuai mekanisme terbaru.</p>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-black uppercase">Terbaru</span>
                    </div>
                    <div class="pt-2">
                        <button class="w-full sm:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-base rounded-2xl shadow-lg shadow-blue-600/20 transition-all flex items-center justify-center gap-2">
                            <i class="fa-solid fa-download"></i> Unduh Format
                        </button>
                    </div>
                </div>

                <!-- Card 2: Format Dokumen -->
                <div class="card-clean p-6 space-y-4 border-t-4 border-t-slate-700">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <h3 class="text-xl font-extrabold text-slate-900">Format Dokumen</h3>
                        <span class="text-xs font-extrabold text-slate-400 bg-slate-100 px-2.5 py-1 rounded-lg">2 file</span>
                    </div>
                    <div class="space-y-3">
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 flex items-center justify-between hover:border-blue-300 transition-all cursor-pointer">
                            <div>
                                <h4 class="text-base font-bold text-slate-900">Format Verifikasi</h4>
                                <p class="text-xs font-medium text-slate-400 mt-0.5">Excel — 15 Juli 2026</p>
                            </div>
                            <i class="fa-solid fa-file-excel text-emerald-600 text-xl"></i>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 flex items-center justify-between hover:border-blue-300 transition-all cursor-pointer">
                            <div>
                                <h4 class="text-base font-bold text-slate-900">Format Pengembalian</h4>
                                <p class="text-xs font-medium text-slate-400 mt-0.5">Word — 15 Juli 2026</p>
                            </div>
                            <i class="fa-solid fa-file-word text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 1. CARD FILTER TERPISAH -->
            <div class="card-clean p-6 sm:p-7 space-y-4 w-full">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg">
                            <i class="fa-solid fa-filter"></i>
                        </div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Filter Pemberitahuan &amp; Dokumen</h2>
                            <p class="text-sm font-semibold text-slate-500">Filter data berdasarkan jenis dokumen, status baca, kategori, atau pencarian judul</p>
                        </div>
                    </div>
                    <button onclick="resetFilter()" class="text-sm font-bold text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1.5">
                        <i class="fa-solid fa-rotate-right"></i> Reset Filter
                    </button>
                </div>

                <!-- Form Grid Filter -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-1 items-end">
                    
                    <!-- Dropdown Jenis Dokumen (SK / Pemberitahuan) -->
                    <div class="space-y-1.5">
                        <label for="filterJenis" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Jenis Dokumen</label>
                        <div class="relative">
                            <select id="filterJenis" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                                <option value="Semua">Semua Dokumen</option>
                                <option value="SK">SK (Surat Keputusan)</option>
                                <option value="Pemberitahuan">Pemberitahuan</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-base"></i>
                        </div>
                    </div>

                    <!-- Dropdown Status (Baru / Dibaca) -->
                    <div class="space-y-1.5">
                        <label for="filterStatus" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Status Baca</label>
                        <div class="relative">
                            <select id="filterStatus" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                                <option value="Semua" selected>Semua Status</option>
                                <option value="Baru">Baru</option>
                                <option value="Dibaca">Dibaca</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-base"></i>
                        </div>
                    </div>

                    <!-- Dropdown Kategori -->
                    <div class="space-y-1.5">
                        <label for="filterKategori" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Kategori</label>
                        <div class="relative">
                            <select id="filterKategori" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                                <option value="Semua">Semua Kategori</option>
                                <option value="Batas Waktu">Batas Waktu</option>
                                <option value="Aktivasi">Aktivasi</option>
                                <option value="Sistem">Sistem</option>
                                <option value="Mekanisme">Mekanisme</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-base"></i>
                        </div>
                    </div>

                    <!-- Search Input Judul -->
                    <div class="space-y-1.5">
                        <label for="searchJudul" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Cari Judul</label>
                        <div class="relative">
                            <input type="text" id="searchJudul" onkeyup="applyFilter()" placeholder="Cari judul pemberitahuan..." class="w-full bg-slate-50 border border-slate-300 rounded-2xl pl-10 pr-4 py-3 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 shadow-sm">
                            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-4 text-slate-400 text-base"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 2. CARD TABEL PEMBERITAHUAN -->
            <div class="card-clean p-6 sm:p-7 space-y-4 w-full">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-3">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900">Daftar Pemberitahuan</h2>
                        <p class="text-sm font-semibold text-slate-500">Berita dan Peraturan digabung menjadi satu kanal informasi resmi.</p>
                    </div>
                    <div class="text-sm font-bold text-slate-500 bg-slate-100 px-4 py-2 rounded-xl">
                        Total: <span id="totalDataCount" class="text-blue-600 font-extrabold">0</span> Informasi
                    </div>
                </div>

                <!-- TABEL DOKUMEN / PEMBERITAHUAN -->
                <div class="overflow-x-auto custom-scrollbar pt-1">
                    <table class="w-full text-left border-collapse whitespace-nowrap min-w-[850px]">
                        <thead>
                            <tr class="bg-slate-100/80 text-slate-700 font-extrabold text-sm border-b border-slate-200">
                                <th class="p-4 rounded-l-xl text-center w-12">No.</th>
                                <th class="p-4">Tanggal</th>
                                <th class="p-4">Kategori</th>
                                <th class="p-4">Judul</th>
                                <th class="p-4">Target Akun</th>
                                <th class="p-4 text-center">Status</th>
                                <th class="p-4 text-center rounded-r-xl">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableDataBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800">
                            <!-- Rendered dynamically by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="text-sm text-slate-400 font-semibold pt-4 flex flex-col sm:flex-row justify-between items-center gap-2">
                <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
                <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
            </div>

        </main>
    </div>

    <!-- JAVASCRIPT UNTUK FILTER DAN RENDER DATA -->
    <script>
        // Data LENGKAP & SAMAPERSIS dari Excel Foto yang diberikan
        const masterDokumenData = [
            {
                no: 1,
                tanggal: "2026-04-02",
                kategori: "Batas Waktu",
                judul: "Penyesuaian mekanisme PIP Tahun 2026",
                targetAkun: "Sekolah",
                status: "Baru",
                jenis: "Pemberitahuan"
            },
            {
                no: 2,
                tanggal: "2026-03-26",
                kategori: "Aktivasi",
                judul: "Batas waktu konfirmasi aktivasi rekening",
                targetAkun: "Semua",
                status: "Dibaca",
                jenis: "Pemberitahuan"
            },
            {
                no: 3,
                tanggal: "2026-03-31",
                kategori: "Aktivasi",
                judul: "Format verifikasi terbaru",
                targetAkun: "Dinas",
                status: "Baru",
                jenis: "Pemberitahuan"
            },
            {
                no: 4,
                tanggal: "2026-01-06",
                kategori: "Batas Waktu",
                judul: "Format pengembalian dana ke negara",
                targetAkun: "Dinas",
                status: "Baru",
                jenis: "SK"
            },
            {
                no: 5,
                tanggal: "2026-02-17",
                kategori: "Sistem",
                judul: "Jadwal pemeliharaan sistem SIPINTAR",
                targetAkun: "Admin",
                status: "Dibaca",
                jenis: "Pemberitahuan"
            },
            {
                no: 6,
                tanggal: "2026-01-27",
                kategori: "Aktivasi",
                judul: "Pembaruan panduan pengguna",
                targetAkun: "Sekolah",
                status: "Dibaca",
                jenis: "Pemberitahuan"
            },
            {
                no: 7,
                tanggal: "2026-04-18",
                kategori: "Batas Waktu",
                judul: "Perpanjangan batas usulan sekolah",
                targetAkun: "Sekolah",
                status: "Dibaca",
                jenis: "SK"
            },
            {
                no: 8,
                tanggal: "2026-01-06",
                kategori: "Mekanisme",
                judul: "Sosialisasi fitur pengaduan tiket",
                targetAkun: "Semua",
                status: "Baru",
                jenis: "Pemberitahuan"
            }
        ];

        function renderTable(data) {
            const tbody = document.getElementById("tableDataBody");
            const totalCount = document.getElementById("totalDataCount");
            
            if (!tbody) return;
            tbody.innerHTML = "";
            totalCount.textContent = data.length;

            if (data.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="p-8 text-center text-slate-400 font-semibold">
                            Tidak ada data yang sesuai dengan filter.
                        </td>
                    </tr>
                `;
                return;
            }

            data.forEach((item, index) => {
                const tr = document.createElement("tr");
                tr.className = "hover:bg-slate-50/80 transition-colors";

                const isBaru = item.status === "Baru";
                const badgeStatus = isBaru
                    ? `<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-extrabold inline-block">Baru</span>`
                    : `<span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-extrabold inline-block">Dibaca</span>`;

                tr.innerHTML = `
                    <td class="p-4 text-center text-slate-500 font-bold">${index + 1}</td>
                    <td class="p-4 font-medium text-slate-600">${item.tanggal}</td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-bold border border-slate-200">${item.kategori}</span>
                    </td>
                    <td class="p-4 font-bold text-slate-800">
                        <div class="flex items-center gap-2">
                            <span>${item.judul}</span>
                            ${item.jenis === 'SK' ? '<span class="text-[10px] font-black bg-amber-100 text-amber-800 px-1.5 py-0.5 rounded">SK</span>' : ''}
                        </div>
                    </td>
                    <td class="p-4 text-slate-600 font-medium">${item.targetAkun}</td>
                    <td class="p-4 text-center">${badgeStatus}</td>
                    <td class="p-4 text-center">
                        <button class="px-3 py-1.5 bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-600 rounded-xl text-xs font-extrabold transition-all border border-slate-200">
                            Detail
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function applyFilter() {
            const jenis = document.getElementById("filterJenis").value;
            const status = document.getElementById("filterStatus").value;
            const kategori = document.getElementById("filterKategori").value;
            const search = document.getElementById("searchJudul").value.toLowerCase().trim();

            const filtered = masterDokumenData.filter(item => {
                const matchJenis = (jenis === "Semua") || (item.jenis === jenis);
                const matchStatus = (status === "Semua") || (item.status === status);
                const matchKategori = (kategori === "Semua") || (item.kategori === kategori);
                const matchJudul = item.judul.toLowerCase().includes(search);

                return matchJenis && matchStatus && matchKategori && matchJudul;
            });

            renderTable(filtered);
        }

        function resetFilter() {
            document.getElementById("filterJenis").value = "Semua";
            document.getElementById("filterStatus").value = "Semua";
            document.getElementById("filterKategori").value = "Semua";
            document.getElementById("searchJudul").value = "";
            renderTable(masterDokumenData);
        }

        // Render data saat halaman dimuat
        document.addEventListener("DOMContentLoaded", () => {
            renderTable(masterDokumenData);
        });
    </script>
</body>
</html>