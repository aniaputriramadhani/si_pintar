<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pengaduan Sekolah - SIPINTAR">
    <title>Pengaduan | SIPINTAR</title>
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

        /* Modal Styles */
        .modal-active {
            opacity: 1 !important;
            pointer-events: auto !important;
        }
        .modal-content-active {
            transform: scale(1) !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden">
    <!-- TOAST NOTIFIKASI -->
    <div id="toastNotification" class="fixed top-5 right-5 z-50 transform translate-y-[-100px] opacity-0 transition-all duration-300 flex items-center gap-3 bg-[#071a33] text-white px-5 py-3.5 rounded-2xl shadow-xl border border-slate-700">
        <i id="toastIcon" class="fa-solid fa-circle-check text-emerald-400 text-lg"></i>
        <span id="toastMessage" class="text-sm font-bold">Filter berhasil diperbarui!</span>
    </div>

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
                    <p id="sideNamaSekolah" class="text-lg font-black text-slate-800 leading-snug">SMPN 1 SOREANG</p>
                    <p id="sideNPSN" class="mono text-xs font-bold text-blue-600 mt-1">NPSN: 20206127</p>
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
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data PIP</span>
                        </a>

                        <!-- Verifikasi -->
                        <a href="{{ Route::has('sekolah.verifikasi') ? route('sekolah.verifikasi') : url('/sekolah/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi</span>
                        </a>

                        <!-- Konfirmasi -->
                        <a href="{{ Route::has('sekolah.konfirmasi') ? route('sekolah.konfirmasi') : url('/sekolah/konfirmasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Konfirmasi</span>
                        </a>

                        <!-- Pengembalian Negara -->
                        <a href="{{ Route::has('sekolah.pengembalian-negara') ? route('sekolah.pengembalian-negara') : url('/sekolah/pengembalian-negara') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
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

                        <!-- Pengaduan (Active Menu) -->
                        <a href="{{ Route::has('sekolah.pengaduan') ? route('sekolah.pengaduan') : url('/sekolah/pengaduan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all bg-[#0055FF] text-white shadow-md shadow-blue-500/20">
                            <svg class="h-7 w-7 flex-shrink-0 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
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
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Pengaduan</h1>
                        </div>
                    </div>

                    <!-- Profil Sekolah / Status -->
                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p id="topNamaSekolah" class="text-lg font-extrabold text-[#071a33]">SMPN 1 Soreang</p>
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

                    <!-- SECTION FILTER TIKET PENGADUAN -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                        <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-sliders text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-[#071a33]">Filter Tiket Pengaduan</h3>
                                    <p class="text-xs font-bold text-slate-500">Filter tiket pengaduan berdasarkan status atau upload pengaduan baru</p>
                                </div>
                            </div>
                            <button onclick="resetFilter()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                                <i class="fa-solid fa-rotate-right"></i> Reset Filter
                            </button>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-1">
                            <!-- Dropdown Status Filter -->
                            <div class="w-full sm:max-w-md">
                                <label for="statusFilter" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">STATUS PENGADUAN</label>
                                <div class="relative">
                                    <select id="statusFilter" onchange="filterTickets()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-4 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer appearance-none">
                                        <option value="Semua">Semua Status Tiket</option>
                                        <option value="Dalam Proses">Dalam Proses</option>
                                        <option value="Perlu Informasi">Perlu Informasi</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-4 top-4 text-slate-400 pointer-events-none text-xs"></i>
                                </div>
                            </div>

                            <!-- Tombol Upload Aduan -->
                            <button onclick="openModalUpload()" class="w-full sm:w-auto px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold rounded-2xl text-sm flex items-center justify-center gap-2 transition-all shadow-md shadow-emerald-600/20 sm:self-end">
                                <i class="fa-solid fa-file-arrow-up"></i>
                                <span>Upload Aduan (Formulir)</span>
                            </button>
                        </div>
                    </section>

                    <!-- TABEL PENGADUAN -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                        <!-- KOLOM PENGADUAN SAYA (12 COL - SEJAJAR PENUH) -->
                        <div class="lg:col-span-12 flex flex-col h-full">
                            <div class="flex h-full flex-col justify-between rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                                <div class="flex flex-col h-full space-y-4">
                                    <!-- Header Section -->
                                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                        <h3 class="text-xl font-black text-[#071a33]">Pengaduan Saya</h3>
                                    </div>

                                    <!-- TABEL PENGADUAN -->
                                    <div class="flex-1 overflow-x-auto">
                                        <table class="w-full text-left border-collapse whitespace-nowrap">
                                            <thead>
                                                <tr class="border-b-2 border-slate-200 bg-slate-50/80 text-slate-700">
                                                    <th class="py-3.5 px-3 font-black text-xs uppercase tracking-wider">No. Tiket</th>
                                                    <th class="py-3.5 px-3 font-black text-xs uppercase tracking-wider">Kategori</th>
                                                    <th class="py-3.5 px-3 font-black text-xs uppercase tracking-wider">Status</th>
                                                    <th class="py-3.5 px-3 font-black text-xs uppercase tracking-wider text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ticketTableBody" class="divide-y divide-slate-100 text-xs font-bold text-slate-800">
                                                <!-- Rendered dynamically by JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

    <!-- MODAL FORM UPLOAD PENGADUAN -->
    <div id="uploadModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300">
        <div id="modalContainer" class="bg-white rounded-3xl shadow-2xl border border-slate-100 w-full max-w-lg overflow-hidden transform scale-95 transition-all duration-300">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center text-white font-bold">
                        <i class="fa-solid fa-file-arrow-up text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-black text-base leading-tight">Formulir Upload Pengaduan</h3>
                        <p class="text-xs text-blue-100 mt-0.5">Kirimkan kendala atau berkas aduan Anda</p>
                    </div>
                </div>
                <button onclick="closeModalUpload()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Modal Body (Form) -->
            <form id="formUploadAduan" onsubmit="handleFormSubmit(event)" class="p-6 space-y-4">
                
                <!-- Kategori Kendala -->
                <div>
                    <label class="block text-xs font-black text-slate-700 mb-1.5 uppercase tracking-wide">Kategori Masalah <span class="text-red-500">*</span></label>
                    <select id="modalKategori" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-bold text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Aktivasi Rekening">Aktivasi Rekening</option>
                        <option value="Data Siswa">Perbaikan Data Siswa</option>
                        <option value="Dokumen">Kendala Dokumen / SK</option>
                        <option value="Pengembalian">Pengembalian Ke Kas Negara</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Judul Aduan -->
                <div>
                    <label class="block text-xs font-black text-slate-700 mb-1.5 uppercase tracking-wide">Judul Pengaduan <span class="text-red-500">*</span></label>
                    <input type="text" id="modalJudul" required placeholder="Contoh: Gagal Aktivasi Rekening Siswa A.N. Ahmad" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-bold text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
                </div>

                <!-- Deskripsi / Keterangan -->
                <div>
                    <label class="block text-xs font-black text-slate-700 mb-1.5 uppercase tracking-wide">Keterangan / Deskripsi <span class="text-red-500">*</span></label>
                    <textarea id="modalDeskripsi" rows="3" required placeholder="Jelaskan detail permasalahan yang dialami..." class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-xs font-bold text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition-all"></textarea>
                </div>

                <!-- Upload File Dropzone -->
                <div>
                    <label class="block text-xs font-black text-slate-700 mb-1.5 uppercase tracking-wide">Upload Berkas Pendukung (PDF/JPG/PNG)</label>
                    <div class="border-2 border-dashed border-slate-200 hover:border-blue-400 bg-slate-50/50 rounded-2xl p-4 text-center transition-all relative cursor-pointer group">
                        <input type="file" id="modalFile" onchange="updateFileName(this)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".pdf,.png,.jpg,.jpeg">
                        <div class="space-y-1">
                            <i class="fa-solid fa-cloud-arrow-up text-2xl text-slate-400 group-hover:text-blue-600 transition-colors"></i>
                            <p id="fileNameDisplay" class="text-xs font-bold text-slate-600">Klik atau seret file ke sini</p>
                            <p class="text-[10px] text-slate-400 font-medium">Maksimal ukuran file: 5 MB</p>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer Buttons -->
                <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeModalUpload()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-extrabold rounded-xl text-xs transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-xl text-xs flex items-center gap-2 transition-all shadow-md shadow-blue-600/30">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Kirim Pengaduan</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Data Tiket Pengaduan awal
        let ticketData = [
            {
                id: "#PIP-2026-0142",
                kategori: "Aktivasi Rekening",
                status: "Dalam Proses",
                aksiText: "Buka"
            },
            {
                id: "#PIP-2026-0138",
                kategori: "Data Siswa",
                status: "Perlu Informasi",
                aksiText: "Lengkapi"
            },
            {
                id: "#PIP-2026-0129",
                kategori: "Dokumen",
                status: "Selesai",
                aksiText: "Lihat"
            }
        ];

        // Function Render Tabel
        function renderTickets(tickets, isFiltered = false) {
            const tbody = document.getElementById('ticketTableBody');
            tbody.innerHTML = '';

            if (tickets.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center py-6 text-slate-400 font-semibold">
                            Tidak ada pengaduan untuk status ini.
                        </td>
                    </tr>
                `;
                return;
            }

            tickets.forEach(item => {
                const tr = document.createElement('tr');

                let rowBgClass = 'hover:bg-slate-50/80 transition-colors';
                let badgeClass = '';

                if (item.status === 'Dalam Proses') {
                    badgeClass = 'bg-blue-100 text-blue-700 border-blue-200';
                    if (isFiltered) {
                        rowBgClass = 'bg-blue-50/80 hover:bg-blue-100/70 border-l-4 border-l-blue-500 transition-colors';
                    }
                } else if (item.status === 'Perlu Informasi') {
                    badgeClass = 'bg-amber-100 text-amber-800 border-amber-200';
                    if (isFiltered) {
                        rowBgClass = 'bg-amber-50/80 hover:bg-amber-100/70 border-l-4 border-l-amber-500 transition-colors';
                    }
                } else if (item.status === 'Selesai') {
                    badgeClass = 'bg-emerald-100 text-emerald-800 border-emerald-200';
                    if (isFiltered) {
                        rowBgClass = 'bg-emerald-50/80 hover:bg-emerald-100/70 border-l-4 border-l-emerald-500 transition-colors';
                    }
                }

                tr.className = rowBgClass;

                tr.innerHTML = `
                    <td class="py-3.5 px-3 font-black mono text-slate-900">${item.id}</td>
                    <td class="py-3.5 px-3 font-medium text-slate-600">${item.kategori}</td>
                    <td class="py-3.5 px-3">
                        <span class="px-3 py-1 rounded-full text-[11px] font-extrabold border inline-block ${badgeClass}">
                            ${item.status}
                        </span>
                    </td>
                    <td class="py-3.5 px-3 text-center">
                        <button onclick="handleAction('${item.id}')" class="text-blue-600 hover:text-blue-800 font-black hover:underline">
                            ${item.aksiText}
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Filter Function
        function filterTickets() {
            const filterValue = document.getElementById('statusFilter').value;
            
            if (filterValue === "Semua") {
                renderTickets(ticketData, false);
                showToast("Menampilkan semua tiket");
            } else {
                const filtered = ticketData.filter(t => t.status === filterValue);
                renderTickets(filtered, true);
                showToast(`Filter aktif: ${filterValue}`);
            }
        }

        function resetFilter() {
            document.getElementById('statusFilter').value = "Semua";
            renderTickets(ticketData, false);
            showToast("Filter berhasil di-reset");
        }

        /* MODAL LOGIC */
        function openModalUpload() {
            const modal = document.getElementById('uploadModal');
            const container = document.getElementById('modalContainer');
            modal.classList.add('modal-active');
            setTimeout(() => {
                container.classList.add('modal-content-active');
            }, 10);
        }

        function closeModalUpload() {
            const modal = document.getElementById('uploadModal');
            const container = document.getElementById('modalContainer');
            container.classList.remove('modal-content-active');
            setTimeout(() => {
                modal.classList.remove('modal-active');
                document.getElementById('formUploadAduan').reset();
                document.getElementById('fileNameDisplay').innerText = "Klik atau seret file ke sini";
            }, 200);
        }

        function updateFileName(input) {
            const display = document.getElementById('fileNameDisplay');
            if (input.files && input.files[0]) {
                display.innerText = "Terpilih: " + input.files[0].name;
                display.classList.add('text-blue-600');
            } else {
                display.innerText = "Klik atau seret file ke sini";
                display.classList.remove('text-blue-600');
            }
        }

        // Handle Submit Form Upload
        function handleFormSubmit(e) {
            e.preventDefault();
            
            const kategori = document.getElementById('modalKategori').value;
            const randomNum = Math.floor(1000 + Math.random() * 9000);
            const newTicket = {
                id: `#PIP-2026-${randomNum}`,
                kategori: kategori,
                status: "Dalam Proses",
                aksiText: "Buka"
            };

            ticketData.unshift(newTicket);
            
            document.getElementById('statusFilter').value = "Semua";
            renderTickets(ticketData, false);

            closeModalUpload();
            showToast("Pengaduan berhasil dibuat & dikirim!");
        }

        // Helper Handlers
        function handleAction(ticketId) {
            alert(`Membuka detail tiket ${ticketId}`);
        }

        function showToast(message) {
            const toast = document.getElementById('toastNotification');
            document.getElementById('toastMessage').innerText = message;
            
            toast.classList.remove('translate-y-[-100px]', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-[-100px]', 'opacity-0');
            }, 2500);
        }

        // Initial Load
        window.addEventListener('DOMContentLoaded', () => {
            renderTickets(ticketData, false);
        });
    </script>
</body>
</html>