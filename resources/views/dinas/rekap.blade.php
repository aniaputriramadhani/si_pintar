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
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">Pengelolaan & Monitoring</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Rekap Dinamis</h1>
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

            <!-- SECTION REKAP DINAMIS -->
            <div class="card-clean p-6 sm:p-7 space-y-6 w-full">
                
                <!-- Title Header & Subtitle -->
                <div>
                    <h2 class="text-2xl sm:text-3xl font-black text-slate-900">Rekap Dinamis Dinas</h2>
                    <p class="text-sm font-semibold text-slate-500 mt-1">Rekap dapat dilihat per kabupaten/kota dan sekolah serta diekspor ke Excel.</p>
                </div>

                <!-- Form Filter Bar -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <div class="relative min-w-[140px]">
                        <select id="filterTahun" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm font-bold text-slate-700 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm pr-8">
                            <option value="Semua">Semua Tahun</option>
                            <option value="2026" selected>Tahun 2026</option>
                            <option value="2025">Tahun 2025</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-3 text-slate-400 pointer-events-none text-xs"></i>
                    </div>

                    <div class="relative min-w-[180px]">
                        <select id="filterKabupaten" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm font-bold text-slate-700 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm pr-8">
                            <option value="Semua">Kabupaten/Kota Semua</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-3 text-slate-400 pointer-events-none text-xs"></i>
                    </div>

                    <div class="relative min-w-[160px]">
                        <select id="filterSekolah" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm font-bold text-slate-700 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm pr-8">
                            <option value="Semua">Sekolah Semua</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-3 text-slate-400 pointer-events-none text-xs"></i>
                    </div>

                    <button onclick="renderTable()" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl shadow-md shadow-blue-600/20 transition-all flex items-center gap-2">
                        Tampilkan
                    </button>

                    <button onclick="exportToExcel()" class="px-5 py-2.5 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-bold text-sm rounded-xl transition-all flex items-center gap-2 shadow-sm">
                        Ekspor Excel
                    </button>
                </div>

                <!-- Pivot Table Container -->
                <div class="overflow-x-auto rounded-xl border border-slate-200">
                    <table class="w-full text-left border-collapse text-sm" id="rekapTable">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-700 font-bold">
                                <td class="p-3 w-48 font-extrabold">Tahun</td>
                                <td colspan="3" class="p-3">
                                    <span id="selectedTahunLabel" class="inline-flex items-center gap-2 bg-white border border-slate-300 px-3 py-1 rounded-md text-xs font-extrabold shadow-sm">
                                        2026 <i class="fa-solid fa-caret-down text-slate-500"></i>
                                    </span>
                                </td>
                            </tr>
                            <tr class="bg-slate-100 text-slate-800 font-extrabold border-b border-slate-300">
                                <th class="p-3 border-r border-slate-200">
                                    <div class="flex items-center justify-between">
                                        <span>Row Labels</span>
                                        <i class="fa-solid fa-filter text-slate-400 text-xs"></i>
                                    </div>
                                </th>
                                <th class="p-3 text-right border-r border-slate-200">Count of Nama Sekolah</th>
                                <th class="p-3 text-right border-r border-slate-200">Sum of Siswa Sudah Aktivasi</th>
                                <th class="p-3 text-right">Sum of Siswa Belum Aktivasi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-slate-200 font-semibold text-slate-800">
                            <!-- Data pivot dinamis via JavaScript -->
                        </tbody>
                        <tfoot id="tableFoot" class="bg-slate-100 font-extrabold text-slate-900 border-t-2 border-slate-300">
                            <!-- Grand Total dinamis via JavaScript -->
                        </tfoot>
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

    <script>
        // Data Rekap
        const rekapData = [
            { kab: "Kab. Agung Damai", detail: [ { jenjang: "SD", sekolah: 11, aktif: 52, belum: 25 }, { jenjang: "SMA", sekolah: 10, aktif: 131, belum: 46 }, { jenjang: "SMK", sekolah: 10, aktif: 148, belum: 47 } ] },
            { kab: "Kab. Asri Bahagia", detail: [ { jenjang: "SD", sekolah: 10, aktif: 192, belum: 95 }, { jenjang: "SMA", sekolah: 11, aktif: 364, belum: 127 }, { jenjang: "SMP", sekolah: 9, aktif: 175, belum: 63 } ] },
            { kab: "Kab. Asri Damai", detail: [ { jenjang: "SD", sekolah: 10, aktif: 120, belum: 46 }, { jenjang: "SMA", sekolah: 12, aktif: 315, belum: 95 }, { jenjang: "SMK", sekolah: 11, aktif: 423, belum: 106 } ] },
            { kab: "Kab. Asri Sejahtera", detail: [ { jenjang: "SD", sekolah: 10, aktif: 122, belum: 56 }, { jenjang: "SMA", sekolah: 11, aktif: 383, belum: 111 }, { jenjang: "SMP", sekolah: 10, aktif: 399, belum: 135 } ] },
            { kab: "Kab. Banggai Marga", detail: [ { jenjang: "SD", sekolah: 10, aktif: 114, belum: 30 }, { jenjang: "SMA", sekolah: 10, aktif: 195, belum: 65 }, { jenjang: "SMK", sekolah: 12, aktif: 251, belum: 77 } ] },
            { kab: "Kab. Batu Muara", detail: [ { jenjang: "SD", sekolah: 10, aktif: 165, belum: 66 }, { jenjang: "SMA", sekolah: 11, aktif: 251, belum: 72 }, { jenjang: "SMP", sekolah: 11, aktif: 272, belum: 78 } ] },
            { kab: "Kab. Cahaya Muara", detail: [ { jenjang: "SD", sekolah: 11, aktif: 236, belum: 89 }, { jenjang: "SMA", sekolah: 9, aktif: 241, belum: 64 }, { jenjang: "SMP", sekolah: 10, aktif: 314, belum: 129 } ] },
            { kab: "Kab. Cipta Damai", detail: [ { jenjang: "SD", sekolah: 10, aktif: 186, belum: 90 }, { jenjang: "SMA", sekolah: 11, aktif: 393, belum: 158 }, { jenjang: "SMK", sekolah: 10, aktif: 313, belum: 100 } ] },
            { kab: "Kab. Damai Mulya", detail: [ { jenjang: "SD", sekolah: 9, aktif: 92, belum: 37 }, { jenjang: "SMA", sekolah: 9, aktif: 114, belum: 37 }, { jenjang: "SMK", sekolah: 9, aktif: 257, belum: 71 } ] },
            { kab: "Kab. Gunung Batu", detail: [ { jenjang: "SD", sekolah: 10, aktif: 90, belum: 39 }, { jenjang: "SMA", sekolah: 11, aktif: 302, belum: 122 }, { jenjang: "SMK", sekolah: 11, aktif: 191, belum: 76 } ] },
            { kab: "Kab. Harapan Sido", detail: [ { jenjang: "SD", sekolah: 10, aktif: 161, belum: 64 }, { jenjang: "SMA", sekolah: 11, aktif: 234, belum: 71 }, { jenjang: "SMK", sekolah: 10, aktif: 177, belum: 54 } ] },
            { kab: "Kab. Indah Harapan", detail: [ { jenjang: "SD", sekolah: 10, aktif: 94, belum: 35 }, { jenjang: "SMA", sekolah: 11, aktif: 233, belum: 100 }, { jenjang: "SMP", sekolah: 11, aktif: 95, belum: 31 } ] },
            { kab: "Kab. Kencana Makmur", detail: [ { jenjang: "SD", sekolah: 10, aktif: 244, belum: 92 }, { jenjang: "SMA", sekolah: 12, aktif: 248, belum: 92 }, { jenjang: "SMK", sekolah: 12, aktif: 259, belum: 86 } ] },
            { kab: "Kab. Lembah Cipta", detail: [ { jenjang: "SD", sekolah: 10, aktif: 172, belum: 50 }, { jenjang: "SMA", sekolah: 10, aktif: 140, belum: 54 }, { jenjang: "SMK", sekolah: 12, aktif: 352, belum: 103 } ] },
            { kab: "Kab. Luwuk Bersatu", detail: [ { jenjang: "SD", sekolah: 10, aktif: 105, belum: 36 }, { jenjang: "SMA", sekolah: 10, aktif: 103, belum: 42 }, { jenjang: "SMP", sekolah: 10, aktif: 70, belum: 26 } ] },
            { kab: "Kab. Makmur Merdeka", detail: [ { jenjang: "SD", sekolah: 10, aktif: 184, belum: 49 }, { jenjang: "SMA", sekolah: 10, aktif: 232, belum: 58 }, { jenjang: "SMK", sekolah: 10, aktif: 274, belum: 65 } ] },
            { kab: "Kab. Makmur Rejeki", detail: [ { jenjang: "SD", sekolah: 10, aktif: 139, belum: 43 }, { jenjang: "SMA", sekolah: 11, aktif: 356, belum: 84 }, { jenjang: "SMK", sekolah: 12, aktif: 453, belum: 147 } ] },
            { kab: "Kab. Mandiri Utama", detail: [ { jenjang: "SD", sekolah: 11, aktif: 129, belum: 42 }, { jenjang: "SMA", sekolah: 10, aktif: 154, belum: 36 }, { jenjang: "SMP", sekolah: 11, aktif: 217, belum: 63 } ] },
            { kab: "Kab. Marga Bumi", detail: [ { jenjang: "SD", sekolah: 12, aktif: 203, belum: 54 }, { jenjang: "SMA", sekolah: 9, aktif: 294, belum: 110 }, { jenjang: "SMP", sekolah: 10, aktif: 207, belum: 94 } ] },
            { kab: "Kab. Merdeka Cipta", detail: [ { jenjang: "SD", sekolah: 9, aktif: 194, belum: 71 }, { jenjang: "SMA", sekolah: 10, aktif: 215, belum: 74 }, { jenjang: "SMP", sekolah: 11, aktif: 157, belum: 52 } ] },
            { kab: "Kab. Merdeka Gunung", detail: [ { jenjang: "SD", sekolah: 9, aktif: 168, belum: 59 }, { jenjang: "SMA", sekolah: 11, aktif: 203, belum: 73 }, { jenjang: "SMK", sekolah: 10, aktif: 298, belum: 104 } ] },
            { kab: "Kab. Muara Damai", detail: [ { jenjang: "SD", sekolah: 10, aktif: 106, belum: 42 }, { jenjang: "SMA", sekolah: 11, aktif: 418, belum: 129 }, { jenjang: "SMK", sekolah: 11, aktif: 287, belum: 119 } ] },
            { kab: "Kab. Mulya Asri", detail: [ { jenjang: "SD", sekolah: 11, aktif: 89, belum: 32 }, { jenjang: "SMA", sekolah: 12, aktif: 140, belum: 59 }, { jenjang: "SMP", sekolah: 11, aktif: 300, belum: 136 } ] },
            { kab: "Kab. Pantai Batu", detail: [ { jenjang: "SD", sekolah: 10, aktif: 146, belum: 71 }, { jenjang: "SMA", sekolah: 9, aktif: 394, belum: 131 }, { jenjang: "SMP", sekolah: 11, aktif: 260, belum: 70 } ] },
            { kab: "Kab. Perkasa Damai", detail: [ { jenjang: "SD", sekolah: 11, aktif: 65, belum: 27 }, { jenjang: "SMA", sekolah: 11, aktif: 306, belum: 87 }, { jenjang: "SMK", sekolah: 10, aktif: 196, belum: 61 } ] },
            { kab: "Kab. Perkasa Selaras", detail: [ { jenjang: "SD", sekolah: 10, aktif: 197, belum: 65 }, { jenjang: "SMA", sekolah: 12, aktif: 121, belum: 32 }, { jenjang: "SMP", sekolah: 12, aktif: 218, belum: 97 } ] },
            { kab: "Kab. Permata Asri", detail: [ { jenjang: "SD", sekolah: 9, aktif: 102, belum: 42 }, { jenjang: "SMA", sekolah: 12, aktif: 308, belum: 130 }, { jenjang: "SMP", sekolah: 10, aktif: 208, belum: 98 } ] },
            { kab: "Kab. Permata Sentosa", detail: [ { jenjang: "SD", sekolah: 11, aktif: 140, belum: 67 }, { jenjang: "SMA", sekolah: 9, aktif: 244, belum: 95 }, { jenjang: "SMK", sekolah: 11, aktif: 278, belum: 115 } ] },
            { kab: "Kab. Puncak Merdeka", detail: [ { jenjang: "SD", sekolah: 12, aktif: 166, belum: 70 }, { jenjang: "SMA", sekolah: 11, aktif: 111, belum: 33 }, { jenjang: "SMK", sekolah: 11, aktif: 246, belum: 89 } ] },
            { kab: "Kab. Puncak Sido", detail: [ { jenjang: "SD", sekolah: 10, aktif: 206, belum: 72 }, { jenjang: "SMA", sekolah: 10, aktif: 189, belum: 46 }, { jenjang: "SMP", sekolah: 11, aktif: 350, belum: 123 } ] },
            { kab: "Kab. Rejeki Bersatu", detail: [ { jenjang: "SD", sekolah: 11, aktif: 81, belum: 36 }, { jenjang: "SMA", sekolah: 11, aktif: 257, belum: 91 }, { jenjang: "SMK", sekolah: 12, aktif: 442, belum: 154 } ] },
            { kab: "Kab. Sejahtera Cerah", detail: [ { jenjang: "SD", sekolah: 9, aktif: 182, belum: 67 }, { jenjang: "SMA", sekolah: 10, aktif: 204, belum: 47 }, { jenjang: "SMP", sekolah: 11, aktif: 281, belum: 79 } ] },
            { kab: "Kab. Sido Rejeki", detail: [ { jenjang: "SD", sekolah: 11, aktif: 156, belum: 45 }, { jenjang: "SMA", sekolah: 11, aktif: 233, belum: 111 }, { jenjang: "SMK", sekolah: 9, aktif: 135, belum: 58 } ] },
            { kab: "Kab. Subur Perkasa", detail: [ { jenjang: "SD", sekolah: 10, aktif: 121, belum: 48 }, { jenjang: "SMA", sekolah: 10, aktif: 298, belum: 163 }, { jenjang: "SMP", sekolah: 11, aktif: 137, belum: 61 } ] },
            { kab: "Kab. Sungai Perkasa", detail: [ { jenjang: "SD", sekolah: 12, aktif: 137, belum: 56 }, { jenjang: "SMA", sekolah: 12, aktif: 177, belum: 54 }, { jenjang: "SMP", sekolah: 11, aktif: 191, belum: 75 } ] },
            { kab: "Kab. Tanjung Luwuk", detail: [ { jenjang: "SD", sekolah: 11, aktif: 214, belum: 84 }, { jenjang: "SMA", sekolah: 11, aktif: 220, belum: 65 }, { jenjang: "SMP", sekolah: 10, aktif: 154, belum: 53 } ] },
            { kab: "Kab. Utama Batu", detail: [ { jenjang: "SD", sekolah: 12, aktif: 179, belum: 65 }, { jenjang: "SMA", sekolah: 9, aktif: 98, belum: 24 }, { jenjang: "SMK", sekolah: 9, aktif: 404, belum: 99 } ] },
            { kab: "Kab. Wijaya Sungai", detail: [ { jenjang: "SD", sekolah: 10, aktif: 195, belum: 60 }, { jenjang: "SMA", sekolah: 10, aktif: 106, belum: 43 }, { jenjang: "SMP", sekolah: 9, aktif: 88, belum: 36 } ] },
            { kab: "Kota Asri Cipta", detail: [ { jenjang: "SD", sekolah: 11, aktif: 114, belum: 33 }, { jenjang: "SMK", sekolah: 10, aktif: 130, belum: 64 }, { jenjang: "SMP", sekolah: 10, aktif: 133, belum: 59 } ] },
            { kab: "Kota Asri Morowali", detail: [ { jenjang: "SD", sekolah: 9, aktif: 151, belum: 58 }, { jenjang: "SMK", sekolah: 11, aktif: 113, belum: 38 }, { jenjang: "SMP", sekolah: 11, aktif: 186, belum: 53 } ] },
            { kab: "Kota Banggai Mulya", detail: [ { jenjang: "SD", sekolah: 10, aktif: 223, belum: 64 }, { jenjang: "SMK", sekolah: 10, aktif: 242, belum: 77 }, { jenjang: "SMP", sekolah: 12, aktif: 269, belum: 74 } ] },
            { kab: "Kota Banggai Tanjung", detail: [ { jenjang: "SD", sekolah: 10, aktif: 114, belum: 46 }, { jenjang: "SMK", sekolah: 10, aktif: 142, belum: 46 }, { jenjang: "SMP", sekolah: 9, aktif: 262, belum: 80 } ] }
        ];

        // Inisialisasi dropdown Kabupaten/Kota secara otomatis dari data
        function populateKabupatenDropdown() {
            const select = document.getElementById("filterKabupaten");
            rekapData.forEach(item => {
                const opt = document.createElement("option");
                opt.value = item.kab;
                opt.textContent = item.kab;
                select.appendChild(opt);
            });
        }

        // Fungsi Render Pivot Table
        function renderTable() {
            const selectedTahun = document.getElementById("filterTahun").value;
            const selectedKab = document.getElementById("filterKabupaten").value;
            const selectedSekolah = document.getElementById("filterSekolah").value;
            
            // Update Label Tahun
            document.getElementById("selectedTahunLabel").innerHTML = `${selectedTahun === "Semua" ? "(All)" : selectedTahun} <i class="fa-solid fa-caret-down text-slate-500"></i>`;

            const tbody = document.getElementById("tableBody");
            const tfoot = document.getElementById("tableFoot");

            tbody.innerHTML = "";
            tfoot.innerHTML = "";

            let grandTotalSekolah = 0;
            let grandTotalAktif = 0;
            let grandTotalBelum = 0;

            // Filter Kabupaten/Kota
            const filteredData = rekapData.filter(item => {
                return selectedKab === "Semua" || item.kab === selectedKab;
            });

            filteredData.forEach(item => {
                // Filter Detail Sekolah (Jenjang)
                const details = item.detail.filter(d => selectedSekolah === "Semua" || d.jenjang === selectedSekolah);

                if (details.length > 0) {
                    const totalSekolah = details.reduce((sum, d) => sum + d.sekolah, 0);
                    const totalAktif = details.reduce((sum, d) => sum + d.aktif, 0);
                    const totalBelum = details.reduce((sum, d) => sum + d.belum, 0);

                    grandTotalSekolah += totalSekolah;
                    grandTotalAktif += totalAktif;
                    grandTotalBelum += totalBelum;

                    // Row Utama (Kabupaten)
                    const trKab = document.createElement("tr");
                    trKab.className = "bg-slate-50 hover:bg-slate-100 transition-colors";
                    trKab.innerHTML = `
                        <td class="p-3 font-extrabold border-r border-slate-200 text-slate-900">${item.kab}</td>
                        <td class="p-3 text-right font-bold border-r border-slate-200">${totalSekolah.toLocaleString('id-ID')}</td>
                        <td class="p-3 text-right font-bold border-r border-slate-200">${totalAktif.toLocaleString('id-ID')}</td>
                        <td class="p-3 text-right font-bold">${totalBelum.toLocaleString('id-ID')}</td>
                    `;
                    tbody.appendChild(trKab);

                    // Row Detail (Sub-Jenjang Sekolah)
                    details.forEach(d => {
                        const trDetail = document.createElement("tr");
                        trDetail.className = "hover:bg-slate-50 transition-colors text-slate-600";
                        trDetail.innerHTML = `
                            <td class="p-3 pl-8 border-r border-slate-200 font-medium">${d.jenjang}</td>
                            <td class="p-3 text-right border-r border-slate-200">${d.sekolah.toLocaleString('id-ID')}</td>
                            <td class="p-3 text-right border-r border-slate-200">${d.aktif.toLocaleString('id-ID')}</td>
                            <td class="p-3 text-right">${d.belum.toLocaleString('id-ID')}</td>
                        `;
                        tbody.appendChild(trDetail);
                    });
                }
            });

            // Grand Total
            tfoot.innerHTML = `
                <tr>
                    <td class="p-3 border-r border-slate-200 font-black">Grand Total</td>
                    <td class="p-3 text-right border-r border-slate-200">${grandTotalSekolah.toLocaleString('id-ID')}</td>
                    <td class="p-3 text-right border-r border-slate-200">${grandTotalAktif.toLocaleString('id-ID')}</td>
                    <td class="p-3 text-right">${grandTotalBelum.toLocaleString('id-ID')}</td>
                </tr>
            `;
        }

        // Fungsi Ekspor ke Excel
        function exportToExcel() {
            const table = document.getElementById("rekapTable");
            let html = table.outerHTML;
            const url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);
            const downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);
            downloadLink.href = url;
            downloadLink.download = 'Rekap_Dinamis_Dinas.xls';
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }

        // Event Listener untuk Filter Otomatis
        document.addEventListener("DOMContentLoaded", () => {
            populateKabupatenDropdown();
            renderTable();

            document.getElementById("filterTahun").addEventListener("change", renderTable);
            document.getElementById("filterKabupaten").addEventListener("change", renderTable);
            document.getElementById("filterSekolah").addEventListener("change", renderTable);
        });
    </script>
</body>
</html>