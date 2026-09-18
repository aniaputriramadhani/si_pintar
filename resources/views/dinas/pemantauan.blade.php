<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Wilayah Dinas Pendidikan SIPINTAR.">
    <title>@yield('title', 'Dashboard Dinas | SIPINTAR')</title>
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
                    
                    <!-- Judul Header -->
                    <div class="flex items-center gap-3">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">DP</span>
                        <div>
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">PENGELOLAAN & MONITORING</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">@yield('header_title', 'Dashboard Dinas')</h1>
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
                                    <i class="fa-solid fa-filter text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-[#071a33]">Filter Pemantauan</h3>
                                    <p class="text-xs font-bold text-slate-500">Filter pemantauan berdasarkan Tahun, Jenjang, Wilayah, dan Nama Siswa/Sekolah</p>
                                </div>
                            </div>
                            <button type="button" onclick="resetFilterPemantauan()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                                <i class="fa-solid fa-rotate-right"></i> Reset Filter
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
                                    <i class="fa-solid fa-magnifying-glass"></i> Filter
                                </button>
                            </div>

                        </div>
                    </section>

                    <!-- CARD TABEL DATA PEMANTAUN DENGAN ROW COLORING KONSISTEN SEPERTI DATA PIP -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-4">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-list-check text-lg"></i>
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