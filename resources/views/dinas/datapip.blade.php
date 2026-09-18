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
        <main id="konten-utama" class="flex-1 min-w-0">
            
            <!-- TOP NAVBAR HEADER -->
            <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 px-5 py-4 backdrop-blur-xl sm:px-8 lg:px-10">
                <div class="mx-auto flex max-w-[1500px] items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">SD</span>
                        <div>
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">Pengelolaan & Monitoring</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Data PIP</h1>
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

            <!-- KONTEN UTAMA -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- CARD KHUSUS FILTER (Tahun, Jenjang, Wilayah/Kecamatan, Status Aktivasi) -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                        <div class="mb-5 flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-filter text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-[#071a33]">Filter Parameter Data PIP</h3>
                                    <p class="text-xs font-bold text-slate-500">Sesuaikan parameter pencarian berdasarkan tahun, jenjang, wilayah, dan status aktivasi</p>
                                </div>
                            </div>
                            <button type="button" onclick="resetFilterPip()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                                <i class="fa-solid fa-rotate-right"></i> Reset Filter
                            </button>
                        </div>

                        <!-- Grid Filter Parameter -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 items-end">
                            
                            <!-- 1. Filter Tahun -->
                            <div>
                                <label for="filterTahunPip" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun</label>
                                <select id="filterTahunPip" onchange="applyFilterPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="2026" selected>Tahun 2026</option>
                                    <option value="2025">Tahun 2025</option>
                                    <option value="2024">Tahun 2024</option>
                                </select>
                            </div>

                            <!-- 2. Filter Jenjang -->
                            <div>
                                <label for="filterJenjangPip" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Jenjang</label>
                                <select id="filterJenjangPip" onchange="applyFilterPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="SD" selected>Jenjang: SD</option>
                                    <option value="SMP">Jenjang: SMP</option>
                                    <option value="SMA">Jenjang: SMA</option>
                                    <option value="SMK">Jenjang: SMK</option>
                                </select>
                            </div>

                            <!-- 3. Filter Wilayah / Kecamatan -->
                            <div>
                                <label for="filterWilayahPip" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Wilayah / Kecamatan</label>
                                <select id="filterWilayahPip" onchange="applyFilterPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Semua Wilayah</option>
                                    <option value="Banggai">Kec. Banggai</option>
                                    <option value="Labobo">Kec. Labobo</option>
                                    <option value="Banggai Selatan">Kec. Banggai Selatan</option>
                                </select>
                            </div>

                            <!-- 4. Filter Status Aktivasi -->
                            <div>
                                <label for="filterStatusAktivasi" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Status Aktivasi</label>
                                <select id="filterStatusAktivasi" onchange="applyFilterPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Semua Status</option>
                                    <option value="Sudah Aktivasi">Sudah Aktivasi</option>
                                    <option value="Proses Bank">Proses Bank</option>
                                    <option value="Belum Aktivasi">Belum Aktivasi</option>
                                </select>
                            </div>

                            <!-- 5. Input Cari Siswa/Sekolah -->
                            <div class="sm:col-span-2 md:col-span-4 lg:col-span-1">
                                <label for="searchKeyword" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Pencarian</label>
                                <input type="text" id="searchKeyword" onkeyup="applyFilterPip()" placeholder="Cari siswa / sekolah..." class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] placeholder:text-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all">
                            </div>

                        </div>
                    </section>

                    <!-- TAB KATEGORI SK & TABEL DATA -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-6">
                        
                        <!-- TAB BUTTONS: SK Penetapan, SK Nominasi, SK Pembatalan, Status Unduhan -->
                        <div class="flex flex-wrap items-center gap-2 border-b border-slate-200 pb-4">
                            <button type="button" onclick="switchSkTab('penetapan')" id="tab-penetapan" class="sk-tab-btn px-5 py-3 rounded-2xl font-extrabold text-sm transition-all bg-[#0055FF] text-white shadow-md shadow-blue-500/20">
                                <i class="fa-solid fa-file-circle-check mr-1.5"></i> SK Penetapan
                            </button>

                            <button type="button" onclick="switchSkTab('nominasi')" id="tab-nominasi" class="sk-tab-btn px-5 py-3 rounded-2xl font-extrabold text-sm transition-all bg-slate-100 text-slate-600 hover:bg-slate-200 border border-transparent">
                                <i class="fa-solid fa-file-signature mr-1.5"></i> SK Nominasi
                            </button>

                            <button type="button" onclick="switchSkTab('pembatalan')" id="tab-pembatalan" class="sk-tab-btn px-5 py-3 rounded-2xl font-extrabold text-sm transition-all bg-slate-100 text-slate-600 hover:bg-slate-200 border border-transparent">
                                <i class="fa-solid fa-file-circle-xmark mr-1.5"></i> SK Pembatalan
                            </button>

                            <button type="button" onclick="switchSkTab('unduhan')" id="tab-unduhan" class="sk-tab-btn px-5 py-3 rounded-2xl font-extrabold text-sm transition-all bg-slate-100 text-slate-600 hover:bg-slate-200 border border-transparent">
                                <i class="fa-solid fa-download mr-1.5"></i> Status Unduhan
                            </button>
                        </div>

                        <!-- HEADER STATS RINGKAS -->
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div>
                                <h3 id="currentTabTitle" class="text-2xl font-black text-[#071a33]">Daftar Penerima - SK Penetapan</h3>
                                <p class="text-xs font-bold text-slate-500">Menampilkan hasil saringan data penerima dana PIP sesuai kriteria</p>
                            </div>

                            <span class="px-4 py-2 rounded-xl bg-blue-50 text-[#0055FF] text-xs font-black border border-blue-100">
                                Total Data: <span id="totalSiswaPipCount">0</span> Siswa
                            </span>
                        </div>

                        <!-- TABEL DATA PIP (TANPA OPSI / AKSI DI DALAM TABEL) -->
                        <div class="overflow-x-auto rounded-2xl border border-slate-200">
                            <table class="w-full text-left border-collapse whitespace-nowrap min-w-[700px]">
                                <thead>
                                    <tr class="border-b-2 border-slate-200 bg-slate-50 text-slate-700 text-xs font-black uppercase tracking-wider">
                                        <th class="py-4 px-5">Nama Siswa</th>
                                        <th class="py-4 px-4">Sekolah</th>
                                        <th class="py-4 px-4">Kecamatan</th>
                                        <th class="py-4 px-4 text-center">Tahap</th>
                                        <th class="py-4 px-4 text-center">Nominal</th>
                                        <th class="py-4 px-5 text-center">Status Aktivasi</th>
                                    </tr>
                                </thead>
                                <tbody id="tablePipBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-800">
                                    <!-- Rendered dynamically by JavaScript -->
                                </tbody>
                            </table>
                        </div>

                    </section>

                    <!-- FOOTER -->
                    <div class="text-sm font-bold text-slate-400 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200/60">
                        <span>© 2020–{{ date('Y') }} Puslapdik · Kemendikdasmen RI</span>
                        <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- SCRIPT DATA & TAB HANDLER -->
    <script>
        let currentSkTab = 'penetapan';

        const masterPipData = [
            { namaSiswa: "Andi Pratama", sekolah: "SDN 1 Banggai", kecamatan: "Banggai", jenjang: "SD", tahun: "2026", tahap: "43", nominal: "Rp 450.000", statusAktivasi: "Sudah Aktivasi", kategoriSk: "penetapan" },
            { namaSiswa: "Siti Aisyah", sekolah: "SDN 2 Labobo", kecamatan: "Labobo", jenjang: "SD", tahun: "2026", tahap: "42", nominal: "Rp 450.000", statusAktivasi: "Proses Bank", kategoriSk: "penetapan" },
            { namaSiswa: "Vina Handoko", sekolah: "SDN 1 Bahagia", kecamatan: "Banggai Selatan", jenjang: "SD", tahun: "2026", tahap: "5", nominal: "Rp 450.000", statusAktivasi: "Belum Aktivasi", kategoriSk: "nominasi" },
            { namaSiswa: "Indra Hidayat", sekolah: "SDN 3 Banggai", kecamatan: "Banggai", jenjang: "SD", tahun: "2025", tahap: "2", nominal: "Rp 450.000", statusAktivasi: "Belum Aktivasi", kategoriSk: "pembatalan" },
            { namaSiswa: "Rina Ramadhan", sekolah: "SDN 1 Labobo", kecamatan: "Labobo", jenjang: "SD", tahun: "2026", tahap: "3", nominal: "Rp 450.000", statusAktivasi: "Sudah Aktivasi", kategoriSk: "unduhan" },
            { namaSiswa: "Dedi Rahayu", sekolah: "SDN 1 Bahagia", kecamatan: "Banggai Selatan", jenjang: "SD", tahun: "2025", tahap: "5", nominal: "Rp 450.000", statusAktivasi: "Sudah Aktivasi", kategoriSk: "penetapan" }
        ];

        function renderPipTable(data) {
            const tbody = document.getElementById('tablePipBody');
            const totalCountSpan = document.getElementById('totalSiswaPipCount');
            tbody.innerHTML = '';
            totalCountSpan.innerText = data.length;

            if (data.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-10 text-slate-400 font-bold text-sm">
                            Tidak ada data penerima PIP yang sesuai dengan kriteria filter.
                        </td>
                    </tr>
                `;
                return;
            }

            data.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50 transition-colors';

                let badgeAktivasi = '';
                if (item.statusAktivasi === 'Sudah Aktivasi') {
                    badgeAktivasi = `<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-emerald-700">Sudah Aktivasi</span>`;
                } else if (item.statusAktivasi === 'Proses Bank') {
                    badgeAktivasi = `<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-blue-100 text-blue-700">Proses Bank</span>`;
                } else {
                    badgeAktivasi = `<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-slate-100 text-slate-600">Belum Aktivasi</span>`;
                }

                tr.innerHTML = `
                    <td class="p-4 px-5 font-extrabold text-slate-800">${item.namaSiswa}</td>
                    <td class="p-4 text-slate-700 font-semibold">${item.sekolah}</td>
                    <td class="p-4 text-slate-600 font-medium">${item.kecamatan}</td>
                    <td class="p-4 text-center font-bold text-slate-700">${item.tahap}</td>
                    <td class="p-4 text-center font-bold text-slate-700">${item.nominal}</td>
                    <td class="p-4 text-center">${badgeAktivasi}</td>
                `;
                tbody.appendChild(tr);
            });
        }

        function switchSkTab(tabName) {
            currentSkTab = tabName;

            // Update Tab Button Styles
            const tabs = ['penetapan', 'nominasi', 'pembatalan', 'unduhan'];
            tabs.forEach(t => {
                const btn = document.getElementById(`tab-${t}`);
                if (t === tabName) {
                    btn.className = 'sk-tab-btn px-5 py-3 rounded-2xl font-extrabold text-sm transition-all bg-[#0055FF] text-white shadow-md shadow-blue-500/20';
                } else {
                    btn.className = 'sk-tab-btn px-5 py-3 rounded-2xl font-extrabold text-sm transition-all bg-slate-100 text-slate-600 hover:bg-slate-200 border border-transparent';
                }
            });

            // Update Header Title
            const titles = {
                'penetapan': 'Daftar Penerima - SK Penetapan',
                'nominasi': 'Daftar Calon Penerima - SK Nominasi',
                'pembatalan': 'Daftar Siswa - SK Pembatalan',
                'unduhan': 'Daftar Unduhan Data SK PIP'
            };
            document.getElementById('currentTabTitle').innerText = titles[tabName];

            applyFilterPip();
        }

        function applyFilterPip() {
            const tahun = document.getElementById('filterTahunPip').value;
            const jenjang = document.getElementById('filterJenjangPip').value;
            const wilayah = document.getElementById('filterWilayahPip').value;
            const status = document.getElementById('filterStatusAktivasi').value;
            const keyword = document.getElementById('searchKeyword').value.toLowerCase();

            const filtered = masterPipData.filter(item => {
                const matchTab = (item.kategoriSk === currentSkTab);
                const matchTahun = (item.tahun === tahun);
                const matchJenjang = (item.jenjang === jenjang);
                const matchWilayah = (wilayah === "Semua" || item.kecamatan === wilayah);
                const matchStatus = (status === "Semua" || item.statusAktivasi === status);
                const matchSearch = item.namaSiswa.toLowerCase().includes(keyword) || item.sekolah.toLowerCase().includes(keyword);

                return matchTab && matchTahun && matchJenjang && matchWilayah && matchStatus && matchSearch;
            });

            renderPipTable(filtered);
        }

        function resetFilterPip() {
            document.getElementById('filterTahunPip').value = "2026";
            document.getElementById('filterJenjangPip').value = "SD";
            document.getElementById('filterWilayahPip').value = "Semua";
            document.getElementById('filterStatusAktivasi').value = "Semua";
            document.getElementById('searchKeyword').value = "";
            switchSkTab('penetapan');
        }

        document.addEventListener('DOMContentLoaded', () => {
            applyFilterPip();
        });
    </script>
</body>
</html>