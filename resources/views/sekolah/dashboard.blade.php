<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Sekolah SIPINTAR.">
    <title>Dashboard Sekolah | SIPINTAR</title>
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
                
                <!-- Dashboard (SekolahController) -->
                <a href="{{ Route::has('sekolah.dashboard') ? route('sekolah.dashboard') : url('/sekolah/dashboard') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- Kategori 2: Layanan PIP -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan PIP</p>
                
                <!-- Data PIP (DataPipController) -->
                <a href="{{ Route::has('sekolah.data-pip') ? route('sekolah.data-pip') : url('/sekolah/data-pip') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/data-pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/data-pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span>Data PIP</span>
                </a>

                <!-- Verifikasi (SekolahVerifikasiController) -->
                <a href="{{ Route::has('sekolah.verifikasi') ? route('sekolah.verifikasi') : url('/sekolah/verifikasi') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Verifikasi</span>
                </a>

                <!-- Konfirmasi (KonfirmasiController) -->
                <a href="{{ Route::has('sekolah.konfirmasi') ? route('sekolah.konfirmasi') : url('/sekolah/konfirmasi') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/konfirmasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/konfirmasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Konfirmasi</span>
                </a>

                <!-- Pengembalian Negara (PengembalianNegaraController) -->
                <a href="{{ Route::has('sekolah.pengembalian-negara') ? route('sekolah.pengembalian-negara') : url('/sekolah/pengembalian-negara') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/pengembalian-negara*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/pengembalian-negara*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                    <span>Pengembalian Negara</span>
                </a>
            </div>

            <!-- Kategori 3: Administrasi -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Administrasi</p>

                <!-- Dokumen (SekolahDokumenController) -->
                <a href="{{ Route::has('sekolah.dokumen') ? route('sekolah.dokumen') : url('/sekolah/dokumen') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    <span>Dokumen</span>
                </a>

                <!-- Pengaduan (SekolahPengaduanController) -->
                <a href="{{ Route::has('sekolah.pengaduan') ? route('sekolah.pengaduan') : url('/sekolah/pengaduan') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    <span>Pengaduan</span>
                </a>

                <!-- Cetak Surat (CetakSuratController) -->
                <a href="{{ Route::has('sekolah.cetak-surat') ? route('sekolah.cetak-surat') : url('/sekolah/cetak-surat') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('sekolah/cetak-surat*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('sekolah/cetak-surat*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
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
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Dashboard Sekolah</h1>
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

            <!-- KONTEN BANYAK CARD & DATA -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- 1. SECTION FILTER DATA SEKOLAH -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-4 mb-6 gap-3">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-filter text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black text-[#071a33]">Filter Data Sekolah</h3>
                                    <p class="text-base font-bold text-slate-500">Pilih nama sekolah &amp; tahun untuk memfilter seluruh data secara interaktif</p>
                                </div>
                            </div>
                            <button onclick="resetFilters()" class="inline-flex items-center gap-2 self-start sm:self-center text-base font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                                <i class="fa-solid fa-rotate-right"></i> Reset Filter
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Select Sekolah -->
                            <div>
                                <label class="block text-base font-black text-slate-800 mb-2">Filter Nama Sekolah</label>
                                <select id="filterSekolah" onchange="updateDashboardData()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-3.5 text-base sm:text-lg font-bold text-slate-900 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200">
                                    <option value="SDN 1 Bahagia Selatan" selected>SDN 1 Bahagia Selatan</option>
                                    <option value="SDN 2 Cipta Karya">SDN 2 Cipta Karya</option>
                                </select>
                            </div>

                            <!-- Select Tahun -->
                            <div>
                                <label class="block text-base font-black text-slate-800 mb-2">Filter Tahun</label>
                                <select id="filterTahun" onchange="updateDashboardData()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-3.5 text-base sm:text-lg font-bold text-slate-900 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200">
                                    <option value="Semua" selected>Semua Tahun</option>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    <!-- 2. PROFIL SEKOLAH & PENCAPAIAN PENYALURAN -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                        
                        <!-- Profil Sekolah Table Card -->
                        <div class="lg:col-span-6 rounded-[2.5rem] bg-white border-2 border-slate-200 p-7 sm:p-8 shadow-xl shadow-slate-200/50 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-[#0055FF]">
                                        <i class="fa-solid fa-id-card text-xl"></i>
                                    </div>
                                    <h3 class="text-2xl font-black text-[#071a33]">Profil Sekolah</h3>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-base sm:text-lg border-collapse">
                                        <tbody class="divide-y divide-slate-100">
                                            <tr>
                                                <td class="py-3.5 font-extrabold text-slate-500 w-2/5">Provinsi</td>
                                                <td id="profProvinsi" class="py-3.5 font-bold text-[#071a33]">Aceh</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3.5 font-extrabold text-slate-500">Kabupaten/Kota</td>
                                                <td id="profKabupaten" class="py-3.5 font-bold text-[#071a33]">Kab. Subur Perkasa</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3.5 font-extrabold text-slate-500">Kecamatan</td>
                                                <td id="profKecamatan" class="py-3.5 font-bold text-[#071a33]">Kec. Bahagia Selatan</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3.5 font-extrabold text-slate-500">NPSN</td>
                                                <td id="profNPSN" class="py-3.5 mono font-bold text-[#0055FF]">63948836</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3.5 font-extrabold text-slate-500">Jenjang</td>
                                                <td id="profJenjang" class="py-3.5 font-bold text-[#071a33]">SD</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Pencapaian Penyaluran Card -->
                        <div class="lg:col-span-6 rounded-[2.5rem] bg-white border-2 border-slate-200 p-7 sm:p-8 shadow-xl shadow-slate-200/50 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
                                    <div>
                                        <span class="mono text-xs font-bold uppercase tracking-widest text-[#0055FF]">INDIKATOR KINERJA</span>
                                        <h3 class="text-2xl font-black italic text-[#071a33] mt-0.5">Pencapaian Penyaluran</h3>
                                    </div>
                                    <span class="px-3.5 py-1.5 rounded-xl bg-blue-50 text-[#0055FF] text-xs font-black border border-blue-100">
                                        Persentase
                                    </span>
                                </div>

                                <div class="space-y-6 pt-2">
                                    <div class="flex items-center justify-between text-base sm:text-lg font-extrabold text-slate-700">
                                        <span>Siswa disalurkan dibanding aktivasi</span>
                                        <span id="textPercentage" class="text-3xl font-black text-emerald-600">85,9%</span>
                                    </div>

                                    <!-- Progress Bar -->
<div class="w-full bg-slate-100 h-9 rounded-2xl overflow-hidden p-1 border-2 border-slate-200">
    <div id="progressBar" 
         class="h-full rounded-xl transition-all duration-700 shadow-md" 
         style="width: 85.9%; background: linear-gradient(to right, #34d399, #059669);">
    </div>
</div>

                                    <p class="text-sm font-bold text-rose-500 italic">
                                        * siswa disalurkan dibanding aktivasi
                                    </p>
                                </div>
                            </div>

                            <div class="mt-8 pt-4 border-t border-slate-100 flex justify-between items-center text-sm font-extrabold text-slate-400">
                                <span>Informasi Capaian</span>
                                <span>Diperbarui Otomatis</span>
                            </div>
                        </div>

                    </div>

                    <!-- 3. 4 KARTU STATISTIK UTAMA (Style Konsisten dengan Admin) -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
                        
                        <!-- Card 1: Siswa Disalurkan -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#0055FF]/40 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#0055FF]/10 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-[#0055FF]">SISWA DISALURKAN</span>
                            <div class="mt-4">
                                <h4 id="valSiswaDisalurkan" class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#071a33]">24</h4>
                            </div>
                            <div class="mt-5 flex items-center gap-2">
                                <span class="rounded-xl bg-blue-50 px-3.5 py-1.5 text-sm font-extrabold text-[#0055FF] border border-blue-100">
                                    Total Tersalurkan
                                </span>
                            </div>
                        </div>

                        <!-- Card 2: Sudah Aktivasi -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-[#5ee8d6]/50 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-[#5ee8d6]/10 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-teal-600">SUDAH AKTIVASI</span>
                            <div class="mt-4">
                                <h4 id="valSudahAktivasi" class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#071a33]">298</h4>
                            </div>
                            <div class="mt-5 flex items-center gap-2">
                                <span class="rounded-xl bg-teal-50 px-3.5 py-1.5 text-sm font-extrabold text-teal-700 border border-teal-100">
                                    Siswa Telah Aktivasi
                                </span>
                            </div>
                        </div>

                        <!-- Card 3: Belum Aktivasi -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-amber-200 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-amber-50 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-amber-600">BELUM AKTIVASI</span>
                            <div class="mt-4">
                                <h4 id="valBelumAktivasi" class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#071a33]">163</h4>
                            </div>
                            <div class="mt-5 flex items-center gap-2">
                                <span class="rounded-xl bg-amber-50 px-3.5 py-1.5 text-sm font-extrabold text-amber-700 border border-amber-100">
                                    Siswa Belum Aktivasi
                                </span>
                            </div>
                        </div>

                        <!-- Card 4: SK Pembatalan -->
                        <div class="relative overflow-hidden rounded-[2rem] bg-white border-2 border-rose-200 p-7 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-rose-50 pointer-events-none"></div>
                            <span class="mono text-xs font-bold uppercase tracking-widest text-rose-600">SK PEMBATALAN</span>
                            <div class="mt-4">
                                <h4 id="valSKPembatalan" class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#071a33]">24</h4>
                            </div>
                            <div class="mt-5 flex items-center gap-2">
                                <span class="rounded-xl bg-rose-50 px-3.5 py-1.5 text-sm font-extrabold text-rose-700 border border-rose-100">
                                    Kasus Dibatalkan
                                </span>
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

    <!-- JAVASCRIPT LOGIC DARI SKRIP DAHULU -->
    <script>
        const databaseSekolah = {
            "SDN 1 Bahagia Selatan": {
                profil: {
                    provinsi: "Aceh",
                    kabupaten: "Kab. Subur Perkasa",
                    kecamatan: "Kec. Bahagia Selatan",
                    npsn: "63948836",
                    jenjang: "SD"
                },
                tahunData: {
                    "Semua": { siswaDisalurkan: 24, sudahAktivasi: 298, belumAktivasi: 163, skPembatalan: 24, persentase: 85.9 },
                    "2026": { siswaDisalurkan: 14, sudahAktivasi: 180, belumAktivasi: 95, skPembatalan: 12, persentase: 88.5 },
                    "2025": { siswaDisalurkan: 10, sudahAktivasi: 118, belumAktivasi: 68, skPembatalan: 12, persentase: 82.1 }
                }
            },
            "SDN 2 Cipta Karya": {
                profil: {
                    provinsi: "Aceh",
                    kabupaten: "Kab. Subur Perkasa",
                    kecamatan: "Kec. Cipta Jaya",
                    npsn: "63949912",
                    jenjang: "SD"
                },
                tahunData: {
                    "Semua": { siswaDisalurkan: 18, sudahAktivasi: 210, belumAktivasi: 110, skPembatalan: 15, persentase: 78.4 },
                    "2026": { siswaDisalurkan: 10, sudahAktivasi: 125, belumAktivasi: 60, skPembatalan: 8, persentase: 80.0 },
                    "2025": { siswaDisalurkan: 8, sudahAktivasi: 85, belumAktivasi: 50, skPembatalan: 7, persentase: 76.2 }
                }
            }
        };

        function updateDashboardData() {
            const namaSekolah = document.getElementById('filterSekolah').value;
            const tahun = document.getElementById('filterTahun').value;

            const sekolah = databaseSekolah[namaSekolah];
            const dataMetrics = sekolah.tahunData[tahun];

            // Update Header & Sidebar Widget Info
            document.getElementById('topNamaSekolah').innerText = namaSekolah;
            document.getElementById('sideNamaSekolah').innerText = namaSekolah;
            document.getElementById('sideNPSN').innerText = 'NPSN: ' + sekolah.profil.npsn;

            // Update Tabel Profil
            document.getElementById('profProvinsi').innerText = sekolah.profil.provinsi;
            document.getElementById('profKabupaten').innerText = sekolah.profil.kabupaten;
            document.getElementById('profKecamatan').innerText = sekolah.profil.kecamatan;
            document.getElementById('profNPSN').innerText = sekolah.profil.npsn;
            document.getElementById('profJenjang').innerText = sekolah.profil.jenjang;

            // Update Metric Stat Cards
            document.getElementById('valSiswaDisalurkan').innerText = dataMetrics.siswaDisalurkan.toLocaleString('id-ID');
            document.getElementById('valSudahAktivasi').innerText = dataMetrics.sudahAktivasi.toLocaleString('id-ID');
            document.getElementById('valBelumAktivasi').innerText = dataMetrics.belumAktivasi.toLocaleString('id-ID');
            document.getElementById('valSKPembatalan').innerText = dataMetrics.skPembatalan.toLocaleString('id-ID');

            // Update Progress Bar Indicator
            const formattedPercentage = dataMetrics.persentase.toFixed(1).replace('.', ',') + '%';
            document.getElementById('textPercentage').innerText = formattedPercentage;
            document.getElementById('progressBar').style.width = dataMetrics.persentase + '%';
        }

        function resetFilters() {
            document.getElementById('filterSekolah').value = 'SDN 1 Bahagia Selatan';
            document.getElementById('filterTahun').value = 'Semua';
            updateDashboardData();
        }

        window.addEventListener('DOMContentLoaded', () => {
            updateDashboardData();
        });
    </script>
</body>
</html>