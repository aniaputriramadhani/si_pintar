<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Wilayah Dinas Pendidikan SIPINTAR.">
    <title>Dashboard Dinas | SIPINTAR</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
        .card-clean { background: #ffffff; border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 1rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1); }
        @media (prefers-reduced-motion:reduce) { *,::before,::after { animation-duration:.01ms!important; scroll-behavior:auto!important; transition-duration:.01ms!important; } }

        /* Custom Scrollbar Motif Garis Biru Putih */
        ::-webkit-scrollbar {
            width: 10px !important;
            height: 10px !important;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9 !important;
            border-left: 1px solid #e2e8f0 !important;
            border-radius: 9999px;
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

                <!-- Informasi Dinas Aktif -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-4">
                    <p id="sideNamaDinas" class="text-lg font-black text-slate-800 leading-snug">Dinas Pendidikan Kab/Kota</p>
                    <p id="sideKodeWilayah" class="mono text-xs font-bold text-blue-600 mt-1">WILAYAH DAERAH</p>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-6" aria-label="Navigasi Dinas">
                    
                    <!-- Kategori 1: Utama -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Utama</p>
                        
                        <a href="{{ Route::has('dinas.dashboard') ? route('dinas.dashboard') : url('/dinas/dashboard') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- Kategori 2: Pengelolaan & Monitoring -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Pengelolaan & Monitoring</p>
                        
                        <a href="{{ Route::has('dinas.datapip') ? route('dinas.datapip') : url('/dinas/data-pip') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/data-pip*') || request()->is('dinas/pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/data-pip*') || request()->is('dinas/pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data PIP</span>
                        </a>

                        <a href="{{ Route::has('dinas.pemantauan') ? route('dinas.pemantauan') : url('/dinas/pemantauan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span>Pemantauan</span>
                        </a>

                        <a href="{{ Route::has('dinas.rekap') ? route('dinas.rekap') : url('/dinas/rekap') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/rekap*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/rekap*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span>Rekap</span>
                        </a>

                        <a href="{{ Route::has('dinas.verifikasi') ? route('dinas.verifikasi') : url('/dinas/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi Usulan</span>
                        </a>
                    </div>

                    <!-- Kategori 3: Layanan & Administrasi -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan & Administrasi</p>

                        <a href="{{ Route::has('dinas.dokumen') ? route('dinas.dokumen') : url('/dinas/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            <span>Dokumen</span>
                        </a>

                        <a href="{{ Route::has('dinas.pengaduan') ? route('dinas.pengaduan') : url('/dinas/pengaduan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('dinas/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('dinas/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>Pengaduan</span>
                        </a>

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
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Pengaduan</h1>
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

            <!-- CARD RINGKASAN STATISTIK -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
                <div class="card-clean p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-[#0055FF] flex items-center justify-center font-black text-xl flex-shrink-0">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    <div>
                        <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Total Tiket</p>
                        <h3 id="statTotal" class="text-2xl font-black text-slate-800 mt-0.5">8</h3>
                    </div>
                </div>

                <div class="card-clean p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center font-black text-xl flex-shrink-0">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Tiket Baru</p>
                        <h3 id="statBaru" class="text-2xl font-black text-slate-800 mt-0.5">2</h3>
                    </div>
                </div>

                <div class="card-clean p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center font-black text-xl flex-shrink-0">
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                    <div>
                        <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Dalam Proses</p>
                        <h3 id="statProses" class="text-2xl font-black text-slate-800 mt-0.5">3</h3>
                    </div>
                </div>

                <div class="card-clean p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-black text-xl flex-shrink-0">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div>
                        <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Selesai</p>
                        <h3 id="statSelesai" class="text-2xl font-black text-slate-800 mt-0.5">3</h3>
                    </div>
                </div>
            </div>

            <!-- CARD FILTER TERPISAH -->
            <div class="card-clean p-6 sm:p-7 space-y-4 w-full">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">Filter Tiket Pengaduan</h2>
                            <p class="text-sm font-semibold text-slate-500">Filter status, kategori, atau nomor tiket</p>
                        </div>
                    </div>
                    <button onclick="resetFilter()" class="text-sm font-bold text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1.5">
                        <i class="fa-solid fa-rotate-right"></i> Reset Filter
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-1 items-end">
                    <div class="space-y-1.5">
                        <label for="filterStatus" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Status Tiket</label>
                        <div class="relative">
                            <select id="filterStatus" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                                <option value="Semua" selected>Semua Status</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Dalam Proses">Dalam Proses</option>
                                <option value="Baru">Baru</option>
                                <option value="Perlu Informasi">Perlu Informasi</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-base"></i>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="filterKategori" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Kategori Kendala</label>
                        <div class="relative">
                            <select id="filterKategori" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                                <option value="Semua">Semua Kategori</option>
                                <option value="Akun Pengguna">Akun Pengguna</option>
                                <option value="Dokumen">Dokumen</option>
                                <option value="Format Verifikasi">Format Verifikasi</option>
                                <option value="Aktivasi Rekening">Aktivasi Rekening</option>
                                <option value="Penyaluran Dana">Penyaluran Dana</option>
                                <option value="Data Siswa">Data Siswa</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-base"></i>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="filterKabupaten" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Kabupaten/Kota</label>
                        <div class="relative">
                            <select id="filterKabupaten" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                                <option value="Semua">Semua Wilayah</option>
                                <option value="Kab. Bogor">Kab. Bogor</option>
                                <option value="Kota Surabaya">Kota Surabaya</option>
                                <option value="Kota Tangerang">Kota Tangerang</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-base"></i>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="searchTiket" class="text-xs font-extrabold text-slate-600 uppercase tracking-wider block">Cari Tiket / Deskripsi</label>
                        <div class="relative">
                            <input type="text" id="searchTiket" onkeyup="applyFilter()" placeholder="No Tiket / Kendala..." class="w-full bg-slate-50 border border-slate-300 rounded-2xl pl-10 pr-4 py-3.5 text-base font-bold text-slate-800 focus:outline-none focus:border-blue-500 shadow-sm">
                            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-4 text-slate-400 text-base"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LAYOUT TIKET INTERAKTIF DUA KANAN-KIRI (TINGGI SEJAJAR) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 w-full items-stretch">
                
                <!-- LIST TIKET (KIRI) -->
                <div class="lg:col-span-5 card-clean p-6 flex flex-col justify-between h-[600px]">
                    <div class="flex-shrink-0 flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                        <h3 class="text-xl font-extrabold text-slate-900">Daftar Tiket</h3>
                        <span id="ticketBadgeCount" class="px-3 py-1 bg-blue-100 text-blue-700 font-extrabold rounded-full text-xs">8 Tiket</span>
                    </div>

                    <!-- Container Card List Tiket (Scroll internal pas tinggi dengan area kanan) -->
                    <div id="ticketCardContainer" class="flex-1 overflow-y-auto pr-1.5 space-y-3">
                        <!-- Dynamic List Cards rendered via Javascript -->
                    </div>
                </div>

                <!-- DETAIL & CHAT INTERAKSI TIKET (KANAN) -->
                <div class="lg:col-span-7 card-clean p-6 h-[600px] flex flex-col justify-between">
                    
                    <!-- EMPTY STATE IDLE (Default jika belum ada tiket diklik) -->
                    <div id="idleStateContainer" class="flex flex-col items-center justify-center h-full text-center p-8 space-y-4">
                        <div class="w-20 h-20 rounded-3xl bg-blue-50 text-[#0055FF] flex items-center justify-center text-4xl shadow-sm border border-blue-100/80">
                            <i class="fa-regular fa-comments"></i>
                        </div>
                        <div class="max-w-md space-y-2">
                            <h4 class="text-xl font-extrabold text-slate-800">Detail Percakapan Tiket</h4>
                            <p class="text-base font-bold text-slate-400 leading-relaxed">
                                Pilih salah satu tiket dari daftar di sebelah kiri untuk melihat rincian pengaduan dan memulai percakapan.
                            </p>
                        </div>
                    </div>

                    <!-- DETAIL CHAT PANEL (Baru muncul ketika tiket diklik) -->
                    <div id="activeChatContainer" class="hidden flex-col h-full justify-between space-y-4">
                        <div class="flex-shrink-0 border-b border-slate-100 pb-3 flex items-center justify-between">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span id="activeTicketNo" class="text-xl font-black text-slate-900">#PIP-2026-1002</span>
                                    <span id="activeTicketCategory" class="text-sm font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">Dokumen</span>
                                </div>
                                <p id="activeTicketPengaju" class="text-sm font-semibold text-slate-500 mt-0.5">Operator Sekolah — Kab. Bogor (Jawa Barat)</p>
                            </div>
                            <span id="activeTicketStatus" class="px-3.5 py-1.5 rounded-full bg-blue-100 text-blue-800 text-xs font-black">Dalam Proses</span>
                        </div>

                        <!-- Chat Box Percakapan Dua Arah -->
                        <div id="chatBoxContainer" class="flex-1 bg-slate-50/80 border border-slate-200/80 rounded-2xl p-4 space-y-4 overflow-y-auto">
                            
                            <!-- Bubble Pesan Pengaju -->
                            <div class="flex flex-col items-start space-y-1">
                                <span class="text-xs font-extrabold text-slate-400 ml-1">Pengaju Tiket</span>
                                <div class="bg-white border border-slate-200 p-3.5 rounded-2xl rounded-tl-none shadow-sm max-w-[85%]">
                                    <p id="activeTicketDesc" class="text-base font-semibold text-slate-800">Dana belum tersalurkan ke rekening siswa.</p>
                                </div>
                            </div>

                            <!-- Dynamic Chat Response Inserted Here -->
                            <div id="dynamicChatBubbles" class="space-y-4"></div>

                        </div>

                        <!-- Form Balas Pesan Tiket -->
                        <div class="flex-shrink-0 flex gap-2 pt-1">
                            <input type="text" id="inputBalasan" placeholder="Tulis balasan tanggapan tiket..." class="flex-1 bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3 text-base font-semibold text-slate-800 focus:outline-none focus:border-blue-500 shadow-sm">
                            <button onclick="kirimBalasan()" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-base rounded-2xl shadow-lg shadow-blue-600/20 transition-all flex items-center gap-2">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Kirim</span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

            <!-- FOOTER -->
            <footer class="text-sm text-slate-400 font-semibold pt-4 flex flex-col sm:flex-row justify-between items-center gap-2">
                <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
                <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
            </footer>

        </main>
    </div>

    <!-- SCRIPT INTERAKSI DATA TIKET -->
    <script>
        const ticketsData = [
            { no: "#PIP-2026-1001", kategori: "Akun Pengguna", desc: "Data siswa perlu diperbaiki", pengaju: "Operator SD Negeri 01", kab: "Kab. Bogor", prov: "Jawa Barat", tglDibuat: "2026-03-17", status: "Selesai", tglSelesai: "2026-03-18" },
            { no: "#PIP-2026-1002", kategori: "Dokumen", desc: "Dana belum tersalurkan ke rekening siswa", pengaju: "Operator Sekolah", kab: "Kab. Bogor", prov: "Jawa Barat", tglDibuat: "2026-07-14", status: "Dalam Proses", tglSelesai: "-" },
            { no: "#PIP-2026-1003", kategori: "Format Verifikasi", desc: "Kendala unduh berkas verifikasi usulan", pengaju: "SMP Negeri 2", kab: "Kota Surabaya", prov: "Jawa Timur", tglDibuat: "2026-06-19", status: "Baru", tglSelesai: "-" },
            { no: "#PIP-2026-1004", kategori: "Aktivasi Rekening", desc: "Kendala aktivasi rekening untuk beberapa siswa", pengaju: "SDN 04 Joyo", kab: "Kota Surabaya", prov: "Jawa Timur", tglDibuat: "2026-05-10", status: "Selesai", tglSelesai: "2026-05-12" },
            { no: "#PIP-2026-1005", kategori: "Penyaluran Dana", desc: "Verifikasi kuota usulan sekolah belum diproses", pengaju: "SMA 1 Tangerang", kab: "Kota Tangerang", prov: "Banten", tglDibuat: "2026-04-11", status: "Perlu Informasi", tglSelesai: "-" },
            { no: "#PIP-2026-1006", kategori: "Data Siswa", desc: "Sinkronisasi NIK siswa gagal pada sistem PIP", pengaju: "Operator SMP 3", kab: "Kota Tangerang", prov: "Banten", tglDibuat: "2026-02-01", status: "Selesai", tglSelesai: "2026-02-03" },
            { no: "#PIP-2026-1007", kategori: "Dokumen", desc: "Berkas SK nominasi belum terunduh secara sempurna", pengaju: "Operator SD 02", kab: "Kab. Bogor", prov: "Jawa Barat", tglDibuat: "2026-08-01", status: "Baru", tglSelesai: "-" },
            { no: "#PIP-2026-1008", kategori: "Akun Pengguna", desc: "Gagal reset kata sandi portal sekolah", pengaju: "SMK Negeri 1", kab: "Kota Surabaya", prov: "Jawa Timur", tglDibuat: "2026-08-10", status: "Dalam Proses", tglSelesai: "-" }
        ];

        let activeTicketNo = null; // Default null (Idle state)

        function getStatusBadgeClass(status) {
            switch(status) {
                case 'Selesai': return 'bg-emerald-100 text-emerald-700';
                case 'Dalam Proses': return 'bg-blue-100 text-blue-700';
                case 'Baru': return 'bg-purple-100 text-purple-700';
                case 'Perlu Informasi': return 'bg-amber-100 text-amber-700';
                default: return 'bg-slate-100 text-slate-700';
            }
        }

        function renderCards() {
            const container = document.getElementById('ticketCardContainer');
            const statusFilter = document.getElementById('filterStatus').value;
            const katFilter = document.getElementById('filterKategori').value;
            const kabFilter = document.getElementById('filterKabupaten').value;
            const searchQuery = document.getElementById('searchTiket').value.toLowerCase();

            const filtered = ticketsData.filter(t => {
                const matchStatus = statusFilter === 'Semua' || t.status === statusFilter;
                const matchKat = katFilter === 'Semua' || t.kategori === katFilter;
                const matchKab = kabFilter === 'Semua' || t.kab === kabFilter;
                const matchSearch = t.no.toLowerCase().includes(searchQuery) || t.desc.toLowerCase().includes(searchQuery);
                return matchStatus && matchKat && matchKab && matchSearch;
            });

            document.getElementById('ticketBadgeCount').textContent = `${filtered.length} Tiket`;

            if(filtered.length === 0) {
                container.innerHTML = `<p class="text-center py-8 text-slate-400 font-bold">Tidak ada tiket ditemukan.</p>`;
                return;
            }

            container.innerHTML = filtered.map(t => {
                const isActive = t.no === activeTicketNo;
                const borderClass = isActive ? 'border-2 border-blue-600 bg-blue-50/40 shadow-sm' : 'border border-slate-200/80 bg-white hover:border-blue-300';
                return `
                    <div onclick="selectTicket('${t.no}')" class="p-4 rounded-2xl cursor-pointer transition-all ${borderClass}">
                        <div class="flex items-center justify-between">
                            <span class="font-black text-slate-900 text-base">${t.no}</span>
                            <span class="px-2.5 py-1 rounded-full text-xs font-black ${getStatusBadgeClass(t.status)}">${t.status}</span>
                        </div>
                        <p class="text-sm font-bold text-slate-700 mt-1.5 line-clamp-1">${t.desc}</p>
                        <div class="flex items-center justify-between mt-3 text-xs font-semibold text-slate-400">
                            <span>${t.kategori}</span>
                            <span class="font-mono">${t.tglDibuat}</span>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function selectTicket(no) {
            activeTicketNo = no;
            const t = ticketsData.find(item => item.no === no);
            
            if(t) {
                // Sembunyikan Idle State, Tampilkan Active Chat
                document.getElementById('idleStateContainer').classList.add('hidden');
                const activeContainer = document.getElementById('activeChatContainer');
                activeContainer.classList.remove('hidden');
                activeContainer.classList.add('flex');

                document.getElementById('activeTicketNo').textContent = t.no;
                document.getElementById('activeTicketCategory').textContent = t.kategori;
                document.getElementById('activeTicketPengaju').textContent = `${t.pengaju} — ${t.kab} (${t.prov})`;
                document.getElementById('activeTicketDesc').textContent = t.desc;
                
                const statusBadge = document.getElementById('activeTicketStatus');
                statusBadge.textContent = t.status;
                statusBadge.className = `px-3.5 py-1.5 rounded-full text-xs font-black ${getStatusBadgeClass(t.status)}`;

                // Load Mock Percakapan
                const dynamicBubbles = document.getElementById('dynamicChatBubbles');
                dynamicBubbles.innerHTML = `
                    <div class="flex flex-col items-end space-y-1">
                        <span class="text-xs font-extrabold text-blue-500 mr-1">Tanggapan Dinas / Admin @admin_pusat</span>
                        <div class="bg-blue-600 text-white p-3.5 rounded-2xl rounded-tr-none shadow-md max-w-[85%]">
                            <p class="text-base font-medium leading-relaxed">Halo, mohon kirimkan data pendukung untuk proses verifikasi kendala ${t.kategori.toLowerCase()}.</p>
                        </div>
                    </div>
                `;
            }
            renderCards();
        }

        function applyFilter() {
            renderCards();
        }

        function resetFilter() {
            document.getElementById('filterStatus').value = 'Semua';
            document.getElementById('filterKategori').value = 'Semua';
            document.getElementById('filterKabupaten').value = 'Semua';
            document.getElementById('searchTiket').value = '';
            applyFilter();
        }

        function kirimBalasan() {
            const val = document.getElementById('inputBalasan').value.trim();
            if(!val) return;
            const container = document.getElementById('dynamicChatBubbles');
            const newBubble = `
                <div class="flex flex-col items-end space-y-1">
                    <span class="text-xs font-extrabold text-blue-500 mr-1">Tanggapan Dinas / Admin</span>
                    <div class="bg-blue-600 text-white p-3.5 rounded-2xl rounded-tr-none shadow-md max-w-[85%]">
                        <p class="text-base font-medium leading-relaxed">${val}</p>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newBubble);
            document.getElementById('inputBalasan').value = '';
            
            const chatBox = document.getElementById('chatBoxContainer');
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Init Load (Idle State)
        renderCards();
    </script>
</body>
</html>