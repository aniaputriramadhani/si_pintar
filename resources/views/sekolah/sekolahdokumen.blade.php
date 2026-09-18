<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Detail Siswa Dokumen - SIPINTAR">
    <title>SIPINTAR - Detail Siswa Dokumen</title>
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

        .card-clean {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(226, 232, 240, 0.8);
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

        .custom-scrollbar::-webkit-scrollbar {
            height: 6px !important;
            width: 6px !important;
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

                <!-- Informasi Sekolah Aktif (Widget Sidebar) -->
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

                        <!-- Pengembalian Negara -->
                        <a href="{{ Route::has('sekolah.pengembalian-negara') ? route('sekolah.pengembalian-negara') : url('/sekolah/pengembalian-negara') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/pengembalian-negara*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/pengembalian-negara*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                            <span>Pengembalian Negara</span>
                        </a>
                    </div>

                    <!-- Kategori 3: Administrasi -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Administrasi</p>

                        <!-- Dokumen (Active Menu) -->
                        <a href="{{ Route::has('sekolah.dokumen') ? route('sekolah.dokumen') : url('/sekolah/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all bg-[#0055FF] text-white shadow-md shadow-blue-500/20">
                            <svg class="h-7 w-7 flex-shrink-0 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
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
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">Portal Dashboard Sekolah</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Dokumen</h1>
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

                    <!-- CARD FILTER & DROPDOWN HALAMAN DETAIL SISWA -->
                    <div class="card-clean p-6 sm:p-8 space-y-5 w-full">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#0055FF] flex items-center justify-center font-bold text-lg">
                                    <i class="fa-solid fa-sliders"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-black text-[#071a33]">Filter &amp; Navigasi Siswa</h2>
                                    <p class="text-xs font-bold text-slate-500">Pilih bagian data atau filter berdasarkan status dokumen</p>
                                </div>
                            </div>
                            <button onclick="resetFilterDokumen()" class="text-xs font-extrabold text-[#0055FF] hover:text-blue-800 flex items-center gap-1.5 transition">
                                <i class="fa-solid fa-rotate-right"></i> Reset Filter
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-1 items-end">
                            
                            <!-- Dropdown 1: Halaman Detail Siswa -->
                            <div>
                                <label for="selectTabNav" class="text-xs font-extrabold text-slate-500 uppercase tracking-wider block mb-2">HALAMAN DETAIL SISWA</label>
                                <div class="relative">
                                    <select id="selectTabNav" onchange="navigateToTab(this.value)" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer appearance-none">
                                        <option value="ringkasan">Ringkasan</option>
                                        <option value="identitas">Identitas</option>
                                        <option value="riwayat-sk">Riwayat SK</option>
                                        <option value="rekening">Rekening &amp; Aktivasi</option>
                                        <option value="dokumen" selected>Dokumen (Aktif)</option>
                                        <option value="riwayat-perubahan">Riwayat Perubahan</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-xs"></i>
                                </div>
                            </div>

                            <!-- Dropdown 2: Filter Status Dokumen -->
                            <div>
                                <label for="filterStatusDoc" class="text-xs font-extrabold text-slate-500 uppercase tracking-wider block mb-2">KATEGORI STATUS DOKUMEN</label>
                                <div class="relative">
                                    <select id="filterStatusDoc" onchange="applyDocFilter()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer appearance-none">
                                        <option value="Semua" selected>Semua Status Dokumen</option>
                                        <option value="Lengkap">Lengkap</option>
                                        <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                                        <option value="Belum Ada">Belum Ada</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-xs"></i>
                                </div>
                            </div>

                            <!-- Tombol Action Filter -->
                            <div>
                                <button onclick="applyDocFilter()" class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-2xl text-sm transition-all shadow-md shadow-blue-600/20">
                                    <i class="fa-solid fa-magnifying-glass mr-1.5"></i> Terapkan Filter
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- MAIN GRID CONTENT (EQUAL HEIGHT 2 KOLOM) -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch">
                        
                        <!-- KOLOM KIRI (DOKUMEN SISWA) -->
                        <div class="lg:col-span-2 card-clean p-6 sm:p-7 h-full flex flex-col justify-between space-y-5">
                            <div>
                                <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-4">
                                    <h2 class="text-2xl font-black text-[#071a33]">Dokumen Siswa</h2>
                                    <span id="badgeWarningCount" class="px-3.5 py-1.5 rounded-full bg-amber-100 border border-amber-300 text-amber-800 text-xs font-black">
                                        1 Perlu Perbaikan
                                    </span>
                                </div>

                                <!-- TABEL DOKUMEN -->
                                <div class="overflow-x-auto custom-scrollbar">
                                    <table class="w-full text-left border-collapse whitespace-nowrap">
                                        <thead>
                                            <tr class="bg-slate-50 text-slate-500 font-extrabold text-xs uppercase tracking-wider border-b border-slate-200">
                                                <th class="p-4 rounded-l-xl">Dokumen</th>
                                                <th class="p-4">Status</th>
                                                <th class="p-4">Catatan</th>
                                                <th class="p-4 text-center rounded-r-xl">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="documentTableBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-800">
                                            <!-- Rendered dynamically by JS -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Status Footer Tambahan di Dalam Card -->
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400 font-bold">
                                <span>Total Item Dokumen: <strong class="text-slate-700 font-black" id="totalDocCount">3</strong></span>
                                <span class="text-emerald-600 font-black"><i class="fa-solid fa-shield-halved mr-1"></i> Terverifikasi Sistem</span>
                            </div>
                        </div>

                        <!-- KOLOM KANAN (INFORMASI SISWA - DISESUAIKAN TINGGINYA) -->
                        <div class="card-clean p-6 sm:p-7 h-full flex flex-col justify-between space-y-5">
                            <div>
                                <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-4">
                                    <h2 class="text-xl font-black text-[#071a33]">Informasi Siswa</h2>
                                    <span class="px-3 py-1 rounded-xl bg-slate-100 text-slate-500 text-[10px] font-black uppercase tracking-wider">
                                        DATA SIMULASI
                                    </span>
                                </div>

                                <div class="space-y-3.5">
                                    <!-- Item Nama -->
                                    <div class="bg-slate-50/80 border border-slate-200/80 rounded-2xl p-4">
                                        <span class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider block">NAMA SISWA</span>
                                        <p class="text-lg font-black text-slate-900 mt-0.5">Budi Santoso</p>
                                    </div>

                                    <!-- Item NISN -->
                                    <div class="bg-slate-50/80 border border-slate-200/80 rounded-2xl p-4">
                                        <span class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider block">NISN</span>
                                        <p class="text-base font-black font-mono text-slate-800 mt-0.5">0102******</p>
                                    </div>

                                    <!-- Item Status SK -->
                                    <div class="bg-slate-50/80 border border-slate-200/80 rounded-2xl p-4">
                                        <span class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider block">STATUS SK</span>
                                        <p class="text-base font-black text-blue-600 mt-0.5">SK Pemberian Tahap 43</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Card Informasi Kanan -->
                            <div class="pt-4 border-t border-slate-100">
                                <button onclick="alert('Memuat data riwayat lengkap...')" class="w-full py-2.5 rounded-xl border border-slate-200 text-slate-600 font-extrabold text-xs hover:bg-slate-50 transition">
                                    <i class="fa-solid fa-address-card mr-1.5"></i> Lihat Detail Biodata
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="text-sm font-bold text-slate-400 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200/60">
                        <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
                        <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        const masterDocuments = [
            {
                nama: "Identitas Siswa",
                status: "Lengkap",
                catatan: "-",
                aksi: "Lihat",
                aksiType: "view"
            },
            {
                nama: "Halaman Mutasi Tabungan",
                status: "Perlu Perbaikan",
                catatan: "Foto kurang jelas",
                aksi: "Unggah Ulang",
                aksiType: "reupload"
            },
            {
                nama: "Bukti Tarik ATM",
                status: "Belum Ada",
                catatan: "Jika tersedia",
                aksi: "Unggah",
                aksiType: "upload"
            }
        ];

        function renderDocuments(docs) {
            const tbody = document.getElementById('documentTableBody');
            tbody.innerHTML = '';

            document.getElementById('totalDocCount').innerText = docs.length;

            const warningCount = docs.filter(d => d.status === "Perlu Perbaikan").length;
            const warningBadge = document.getElementById('badgeWarningCount');
            if (warningCount > 0) {
                warningBadge.innerText = `${warningCount} Perlu Perbaikan`;
                warningBadge.classList.remove('hidden');
            } else {
                warningBadge.classList.add('hidden');
            }

            if (docs.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center py-8 text-slate-400 font-bold text-sm">
                            Tidak ada dokumen yang sesuai dengan status filter.
                        </td>
                    </tr>
                `;
                return;
            }

            docs.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/80 transition-all border-b border-slate-100';

                let statusBadge = '';
                if (item.status === 'Lengkap') {
                    statusBadge = `<span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-black border border-emerald-200">Lengkap</span>`;
                } else if (item.status === 'Perlu Perbaikan') {
                    statusBadge = `<span class="px-3 py-1 rounded-full bg-rose-100 text-rose-700 text-xs font-black border border-rose-200">Perlu Perbaikan</span>`;
                } else {
                    statusBadge = `<span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-black border border-amber-200">Belum Ada</span>`;
                }

                let actionBtn = '';
                if (item.aksiType === 'view') {
                    actionBtn = `<button onclick="handleAction('${item.nama}')" class="text-blue-600 font-extrabold hover:text-blue-800 text-sm">Lihat</button>`;
                } else if (item.aksiType === 'reupload') {
                    actionBtn = `<button onclick="handleAction('${item.nama}')" class="text-amber-600 font-extrabold hover:text-amber-800 text-sm">Unggah Ulang</button>`;
                } else {
                    actionBtn = `<button onclick="handleAction('${item.nama}')" class="text-emerald-600 font-extrabold hover:text-emerald-800 text-sm">Unggah</button>`;
                }

                tr.innerHTML = `
                    <td class="p-4 font-black text-slate-900">${item.nama}</td>
                    <td class="p-4">${statusBadge}</td>
                    <td class="p-4 text-slate-500 font-medium">${item.catatan}</td>
                    <td class="p-4 text-center">${actionBtn}</td>
                `;
                tbody.appendChild(tr);
            });
        }

        function applyDocFilter() {
            const selectedStatus = document.getElementById('filterStatusDoc').value;
            if (selectedStatus === "Semua") {
                renderDocuments(masterDocuments);
            } else {
                const filtered = masterDocuments.filter(d => d.status === selectedStatus);
                renderDocuments(filtered);
            }
        }

        function resetFilterDokumen() {
            document.getElementById('filterStatusDoc').value = "Semua";
            document.getElementById('selectTabNav').value = "dokumen";
            renderDocuments(masterDocuments);
        }

        function navigateToTab(tabValue) {
            if (tabValue !== 'dokumen') {
                alert(`Mengarahkan ke halaman/tab: ${tabValue}`);
            }
        }

        function handleAction(docName) {
            alert(`Aksi diproses untuk dokumen: ${docName}`);
        }

        window.addEventListener('DOMContentLoaded', () => {
            renderDocuments(masterDocuments);
        });
    </script>

</body>
</html>