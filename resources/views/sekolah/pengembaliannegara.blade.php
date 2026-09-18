<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pengembalian Negara SIPINTAR.">
    <title>Pengembalian Negara | SIPINTAR</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts & Font Awesome Icons -->
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
                            <span class="inline-flex items-center rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-xs font-black tracking-wider text-[#0055FF]">PORTAL SEKOLAH</span>
                        </div>
                    </div>
                </a>

                <!-- Informasi Sekolah Aktif -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-4">
                    <p id="sideNamaSekolah" class="text-lg font-black text-slate-800 leading-snug">SDN 1 Bahagia Selatan</p>
                    <p id="sideNPSN" class="mono text-xs font-bold text-blue-600 mt-1">NPSN: 63948836</p>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-6" aria-label="Navigasi Sekolah">
                    
                    <!-- Kategori 1: Utama -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Utama</p>
                        
                        <!-- Dashboard -->
                        <a href="{{ Route::has('sekolah.dashboard') ? route('sekolah.dashboard') : url('/sekolah/dashboard') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- Kategori 2: Layanan PIP -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan PIP</p>
                        
                        <!-- Data PIP -->
                        <a href="{{ Route::has('sekolah.data-pip') ? route('sekolah.data-pip') : url('/sekolah/data-pip') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/data-pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/data-pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data PIP</span>
                        </a>

                        <!-- Verifikasi -->
                        <a href="{{ Route::has('sekolah.verifikasi') ? route('sekolah.verifikasi') : url('/sekolah/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi</span>
                        </a>

                        <!-- Konfirmasi -->
                        <a href="{{ Route::has('sekolah.konfirmasi') ? route('sekolah.konfirmasi') : url('/sekolah/konfirmasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/konfirmasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/konfirmasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Konfirmasi</span>
                        </a>

                        <!-- Pengembalian Negara (Active Menu) -->
                        <a href="{{ Route::has('sekolah.pengembalian-negara') ? route('sekolah.pengembalian-negara') : url('/sekolah/pengembalian-negara') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all bg-[#0055FF] text-white shadow-md shadow-blue-500/20">
                            <svg class="h-7 w-7 flex-shrink-0 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                            <span>Pengembalian Negara</span>
                        </a>
                    </div>

                    <!-- Kategori 3: Administrasi -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Administrasi</p>

                        <!-- Dokumen -->
                        <a href="{{ Route::has('sekolah.dokumen') ? route('sekolah.dokumen') : url('/sekolah/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            <span>Dokumen</span>
                        </a>

                        <!-- Pengaduan -->
                        <a href="{{ Route::has('sekolah.pengaduan') ? route('sekolah.pengaduan') : url('/sekolah/pengaduan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>Pengaduan</span>
                        </a>

                        <!-- Detail SK Pemberian -->
                        <a href="{{ Route::has('sekolah.cetak-surat') ? route('sekolah.cetak-surat') : url('/sekolah/cetak-surat') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            <span>Detail SK Pemberian</span>
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
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">SD</span>
                        <div>
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">PORTAL DASHBOARD SEKOLAH</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Pengembalian Ke Negara</h1>
                        </div>
                    </div>

                    <!-- Profil Sekolah / Status -->
                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p id="topNamaSekolah" class="text-lg font-extrabold text-[#071a33]">SDN 1 Bahagia Selatan</p>
                            <p class="text-base font-bold text-emerald-600 flex items-center justify-end gap-1.5">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span> Terverifikasi
                            </p>
                        </div>

                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-white font-extrabold text-xl shadow-lg shadow-blue-600/30" aria-label="Profil Sekolah">
                            SD
                        </div>
                    </div>

                </div>
            </header>

            <!-- KONTEN UTAMA -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- SECTION FILTER DATA PENGEMBALIAN -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                        <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-filter text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-[#071a33]">Filter Data Pengembalian</h3>
                                    <p class="text-xs font-bold text-slate-500">Pilih Tahun, Tahap SK, atau Alasan Pengembalian untuk menyaring data</p>
                                </div>
                            </div>
                            <button type="button" onclick="resetFilter()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                                <i class="fa-solid fa-rotate-right"></i> Reset Filter
                            </button>
                        </div>

                        <!-- Form Filter Grid -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4 items-end">
                            
                            <!-- Filter Tahun SK -->
                            <div>
                                <label for="filterTahun" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun SK</label>
                                <select id="filterTahun" onchange="applyFilter()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Tahun Semua</option>
                                    <option value="2026">Tahun 2026</option>
                                    <option value="2025">Tahun 2025</option>
                                    <option value="2024">Tahun 2024</option>
                                </select>
                            </div>

                            <!-- Filter Tahap SK -->
                            <div>
                                <label for="filterTahap" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahap SK</label>
                                <select id="filterTahap" onchange="applyFilter()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Tahap Semua</option>
                                    <option value="1">Tahap 1</option>
                                    <option value="2">Tahap 2</option>
                                    <option value="3">Tahap 3</option>
                                    <option value="4">Tahap 4</option>
                                    <option value="5">Tahap 5</option>
                                </select>
                            </div>

                            <!-- Filter Alasan Pengembalian -->
                            <div>
                                <label for="filterAlasan" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Alasan Pengembalian</label>
                                <select id="filterAlasan" onchange="applyFilter()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" selected>Alasan Semua</option>
                                    <option value="Siswa sudah lulus sebelum pencairan">Siswa sudah lulus sebelum pencairan</option>
                                    <option value="Data ganda penerima">Data ganda penerima</option>
                                    <option value="Siswa mengundurkan diri">Siswa mengundurkan diri</option>
                                    <option value="Siswa pindah sekolah">Siswa pindah sekolah</option>
                                </select>
                            </div>

                            <!-- Button Filter & Unduh -->
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="applyFilter()" class="flex-1 rounded-2xl bg-[#0055FF] px-4 py-2.5 text-sm font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20 flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-magnifying-glass"></i> Filter
                                </button>
                                <button type="button" onclick="unduhFormat()" class="rounded-2xl border-2 border-slate-300 bg-white px-4 py-2.5 text-sm font-extrabold text-slate-700 transition hover:bg-slate-50 shadow-sm flex items-center justify-center gap-2 whitespace-nowrap">
                                    <i class="fa-solid fa-download text-[#0055FF]"></i> Unduh
                                </button>
                            </div>

                        </div>
                    </section>

                    <!-- TABEL MAIN DAFTAR SISWA (SERASI DENGAN KONFIRMASI) -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-4">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-users text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black text-[#071a33]">Daftar Pengembalian Negara</h3>
                                    <p class="text-xs font-bold text-slate-500">Menampilkan daftar siswa penerima bantuan yang dikembalikan ke kas negara</p>
                                </div>
                            </div>

                            <span class="px-4 py-2 rounded-xl bg-blue-50 text-[#0055FF] text-xs font-black border border-blue-100">
                                Total Data: <span id="totalSiswaCount">0</span> Siswa
                            </span>
                        </div>

                        <!-- TABEL DENGAN FORMAT SERASI -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse whitespace-nowrap min-w-[850px]">
                                <thead>
                                    <tr class="border-b-2 border-slate-200 bg-slate-50/80 text-slate-700">
                                        <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center w-12 rounded-l-xl">
                                            <input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)" class="w-4 h-4 rounded text-blue-600 focus:ring-blue-500 cursor-pointer">
                                        </th>
                                        <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Nama Siswa / NISN</th>
                                        <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Tahap / Tahun</th>
                                        <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-right">Nominal</th>
                                        <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Alasan Pengembalian</th>
                                        <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center rounded-r-xl">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tablePengembalianBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-800">
                                    <!-- Rendered dynamically by JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <!-- BOTTOM ACTION BAR -->
                        <div class="pt-4 border-t border-slate-100 flex justify-end items-center">
                            <button type="button" onclick="simpanPengembalian()" class="bg-[#0055FF] hover:bg-blue-700 text-white font-black py-3.5 px-8 rounded-2xl shadow-lg shadow-blue-600/30 transition-all flex items-center gap-2 text-base">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Simpan Pengembalian</span>
                            </button>
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

    <!-- JAVASCRIPT LOGIC DENGAN TAMPILAN KONSISTEN -->
    <script>
        const masterPengembalianData = [
            { no: 1, namaSiswa: "Umi Firmansyah", nisn: "4832016446", tahap: "4", nominal: 1000000, tahun: "2026", alasan: "Siswa sudah lulus sebelum pencairan" },
            { no: 2, namaSiswa: "Zahra Lestari", nisn: "8373509830", tahap: "1", nominal: 750000, tahun: "2024", alasan: "Siswa sudah lulus sebelum pencairan" },
            { no: 3, namaSiswa: "Budi Rahayu", nisn: "6399513933", tahap: "5", nominal: 450000, tahun: "2026", alasan: "Data ganda penerima" },
            { no: 4, namaSiswa: "Hana Santoso", nisn: "3459018519", tahap: "1", nominal: 1000000, tahun: "2024", alasan: "Siswa mengundurkan diri" },
            { no: 5, namaSiswa: "Umi Gunawan", nisn: "7330810207", tahap: "4", nominal: 450000, tahun: "2025", alasan: "Siswa sudah lulus sebelum pencairan" },
            { no: 6, namaSiswa: "Fitri Rahayu", nisn: "6592830781", tahap: "5", nominal: 1000000, tahun: "2026", alasan: "Data ganda penerima" },
            { no: 7, namaSiswa: "Joko Santoso", nisn: "2973322162", tahap: "2", nominal: 750000, tahun: "2025", alasan: "Data ganda penerima" },
            { no: 8, namaSiswa: "Galih Siregar", nisn: "7353348998", tahap: "5", nominal: 750000, tahun: "2025", alasan: "Siswa mengundurkan diri" },
            { no: 9, namaSiswa: "Indra Saputra", nisn: "9774323729", tahap: "2", nominal: 1000000, tahun: "2024", alasan: "Siswa mengundurkan diri" },
            { no: 10, namaSiswa: "Hana Siregar", nisn: "6321229280", tahap: "5", nominal: 450000, tahun: "2024", alasan: "Siswa sudah lulus sebelum pencairan" },
            { no: 11, namaSiswa: "Oki Firmansyah", nisn: "1653426173", tahap: "4", nominal: 750000, tahun: "2026", alasan: "Siswa sudah lulus sebelum pencairan" },
            { no: 12, namaSiswa: "Fajar Maharani", nisn: "1956585300", tahap: "1", nominal: 1000000, tahun: "2024", alasan: "Data ganda penerima" },
            { no: 13, namaSiswa: "Eka Firmansyah", nisn: "3698736639", tahap: "1", nominal: 750000, tahun: "2024", alasan: "Siswa pindah sekolah" },
            { no: 14, namaSiswa: "Dedi Susanto", nisn: "8266338939", tahap: "5", nominal: 1000000, tahun: "2026", alasan: "Siswa mengundurkan diri" },
            { no: 15, namaSiswa: "Umi Anggraini", nisn: "1614656030", tahap: "4", nominal: 1000000, tahun: "2025", alasan: "Siswa pindah sekolah" }
        ];

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
        }

        function renderPengembalianTable(data) {
            const tbody = document.getElementById('tablePengembalianBody');
            const totalCountSpan = document.getElementById('totalSiswaCount');
            tbody.innerHTML = '';
            
            if (totalCountSpan) {
                totalCountSpan.innerText = data.length;
            }

            if (data.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-8 text-slate-400 font-bold text-sm">
                            Tidak ada data siswa yang cocok dengan filter.
                        </td>
                    </tr>
                `;
                return;
            }

            data.forEach(item => {
                const tr = document.createElement('tr');

                // Styling Default
                let rowBgClass = 'hover:bg-slate-100 transition-all border-b-2 border-slate-200';
                let textNamaClass = 'text-[#071a33] font-bold';
                let textSubClass = 'text-slate-700';
                let textNominalClass = 'text-emerald-700 font-black';
                let alasanBadge = '';

                // Warna Baris dan Badge yang Konsisten
                if (item.alasan === 'Siswa mengundurkan diri') {
                    rowBgClass = 'bg-rose-100 hover:bg-rose-200 border-b-2 border-rose-300 transition-all';
                    textNamaClass = 'text-rose-950 font-black';
                    textSubClass = 'text-rose-900 font-bold';
                    textNominalClass = 'text-rose-950 font-black';
                    alasanBadge = `<span class="px-3.5 py-1 rounded-full bg-rose-200 text-rose-900 border border-rose-400 text-xs font-black inline-block">Siswa Mengundurkan Diri</span>`;
                } else if (item.alasan === 'Siswa sudah lulus sebelum pencairan') {
                    rowBgClass = 'bg-emerald-100 hover:bg-emerald-200 border-b-2 border-emerald-300 transition-all';
                    textNamaClass = 'text-emerald-950 font-black';
                    textSubClass = 'text-emerald-900 font-bold';
                    textNominalClass = 'text-emerald-950 font-black';
                    alasanBadge = `<span class="px-3.5 py-1 rounded-full bg-emerald-200 text-emerald-900 border border-emerald-400 text-xs font-black inline-block">Sudah Lulus Sebelum Pencairan</span>`;
                } else if (item.alasan === 'Data ganda penerima') {
                    rowBgClass = 'bg-amber-100 hover:bg-amber-200 border-b-2 border-amber-300 transition-all';
                    textNamaClass = 'text-amber-950 font-black';
                    textSubClass = 'text-amber-900 font-bold';
                    textNominalClass = 'text-amber-950 font-black';
                    alasanBadge = `<span class="px-3.5 py-1 rounded-full bg-amber-200 text-amber-900 border border-amber-400 text-xs font-black inline-block">Data Ganda Penerima</span>`;
                } else if (item.alasan === 'Siswa pindah sekolah') {
                    rowBgClass = 'bg-blue-100 hover:bg-blue-200 border-b-2 border-blue-300 transition-all';
                    textNamaClass = 'text-blue-950 font-black';
                    textSubClass = 'text-blue-900 font-bold';
                    textNominalClass = 'text-blue-950 font-black';
                    alasanBadge = `<span class="px-3.5 py-1 rounded-full bg-blue-200 text-blue-900 border border-blue-400 text-xs font-black inline-block">Siswa Pindah Sekolah</span>`;
                }

                tr.className = rowBgClass;

                tr.innerHTML = `
                    <td class="p-4 text-center">
                        <input type="checkbox" class="row-checkbox w-4 h-4 rounded text-blue-600 focus:ring-blue-500 cursor-pointer">
                    </td>
                    <td class="p-4">
                        <div class="${textNamaClass}">${item.namaSiswa}</div>
                        <div class="mono text-xs ${textSubClass}">NISN: ${item.nisn}</div>
                    </td>
                    <td class="p-4 text-center ${textSubClass}">
                        <span class="font-extrabold">Tahap ${item.tahap}</span>
                        <div class="text-xs opacity-80">Tahun ${item.tahun}</div>
                    </td>
                    <td class="p-4 text-right ${textNominalClass}">${formatRupiah(item.nominal)}</td>
                    <td class="p-4 text-center">${alasanBadge}</td>
                    <td class="p-4 text-center">
                        <select onchange="updateAlasan(${item.no}, this.value)" class="bg-white/80 hover:bg-white border-2 border-slate-300 text-slate-800 font-bold rounded-xl px-2.5 py-1 text-xs focus:outline-none focus:border-[#0055FF] cursor-pointer shadow-sm">
                            <option value="Siswa sudah lulus sebelum pencairan" ${item.alasan === 'Siswa sudah lulus sebelum pencairan' ? 'selected' : ''}>Pilih: Lulus</option>
                            <option value="Data ganda penerima" ${item.alasan === 'Data ganda penerima' ? 'selected' : ''}>Pilih: Data Ganda</option>
                            <option value="Siswa mengundurkan diri" ${item.alasan === 'Siswa mengundurkan diri' ? 'selected' : ''}>Pilih: Mengundurkan Diri</option>
                            <option value="Siswa pindah sekolah" ${item.alasan === 'Siswa pindah sekolah' ? 'selected' : ''}>Pilih: Pindah Sekolah</option>
                        </select>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function applyFilter() {
            const tahun = document.getElementById('filterTahun').value;
            const tahap = document.getElementById('filterTahap').value;
            const alasan = document.getElementById('filterAlasan').value;

            const filtered = masterPengembalianData.filter(item => {
                const matchTahun = (tahun === "Semua" || item.tahun === tahun);
                const matchTahap = (tahap === "Semua" || item.tahap === tahap);
                const matchAlasan = (alasan === "Semua" || item.alasan === alasan);

                return matchTahun && matchTahap && matchAlasan;
            });

            renderPengembalianTable(filtered);
        }

        function resetFilter() {
            document.getElementById('filterTahun').value = "Semua";
            document.getElementById('filterTahap').value = "Semua";
            document.getElementById('filterAlasan').value = "Semua";
            renderPengembalianTable(masterPengembalianData);
        }

        function updateAlasan(no, alasanBaru) {
            const item = masterPengembalianData.find(d => d.no === no);
            if (item) {
                item.alasan = alasanBaru;
                applyFilter(); // Memperbarui warna baris & badge secara real-time
            }
        }

        function toggleSelectAll(masterCheckbox) {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(cb => cb.checked = masterCheckbox.checked);
        }

        function unduhFormat() {
            alert("Mengunduh format data pengembalian negara...");
        }

        function simpanPengembalian() {
            alert("Data pengembalian negara berhasil disimpan!");
        }

        window.addEventListener('DOMContentLoaded', () => {
            renderPengembalianTable(masterPengembalianData);
        });
    </script>
</body>
</html>