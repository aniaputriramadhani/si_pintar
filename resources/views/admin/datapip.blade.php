<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manajemen Data PIP Administrator SIPINTAR.">
    <title>Data PIP Administrator | SIPINTAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { --ink:#071a33; --blue:#0055FF; --aqua:#5ee8d6; }
        body { font-family:'Plus Jakarta Sans',sans-serif; background:#f8fafc; color:var(--ink); }
        .mono { font-family:'DM Mono',monospace; }
        .page-grid { background-image:linear-gradient(rgba(0,85,255,.055) 1px,transparent 1px),linear-gradient(90deg,rgba(0,85,255,.055) 1px,transparent 1px); background-size:54px 54px; }
        .glass { background:linear-gradient(140deg,rgba(255,255,255,.94),rgba(255,255,255,.78)); border:1px solid rgba(255,255,255,.95); box-shadow:0 16px 45px -28px rgba(7,26,51,.28); backdrop-filter:blur(18px); }
        .sidebar-link { transition: all 0.2s ease-in-out; }
        .sidebar-link:hover:not(.active) { transform:translateX(4px); }

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

    <!-- Layout Container -->
    <div class="min-h-screen lg:flex">
        
        <!-- SIDEBAR KIRI -->
        <aside class="sticky top-0 z-20 hidden h-screen w-96 flex-shrink-0 flex-col justify-between overflow-y-auto border-r border-slate-200/80 bg-white p-6 shadow-sm lg:flex">
            <div class="space-y-8">
                
                <!-- Brand Header -->
                <a href="{{ route('public.home') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/80 p-4 transition hover:border-slate-200 hover:bg-slate-100/80 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-xl border border-slate-100 bg-white p-2 shadow-sm">
                        <img src="https://pip.kemendikdasmen.go.id/img/logo-sipintar.png" alt="Logo Kemendikdasmen" class="h-full w-full object-contain">
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="text-3xl font-black tracking-tight text-slate-800 transition-colors group-hover:text-[#0055FF] leading-tight truncate">SIPINTAR</span>
                        <div class="mt-1">
                            <span class="inline-flex items-center rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-xs font-black tracking-wider text-[#0055FF]">ADMINISTRATOR</span>
                        </div>
                    </div>
                </a>

                <!-- Navigation Links -->
        <nav class="space-y-6" aria-label="Navigasi administrator">
            
            <!-- Kategori 1: Utama -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Utama</p>
                
                <!-- Dashboard -->
                <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : url('/admin/dashboard') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}" {{ request()->is('admin/dashboard*') ? 'aria-current="page"' : '' }}>
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- Kategori 2: Data & Pemantauan -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Data & Pemantauan</p>
                
                <!-- Data PIP -->
                <a href="{{ Route::has('pip.index') ? route('pip.index') : url('/admin/pip') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Data PIP</span>
                </a>
                
                <!-- Pemantauan -->
                <a href="{{ Route::has('admin.pemantauan') ? route('admin.pemantauan') : url('/admin/pemantauan') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <span>Pemantauan</span>
                </a>
                
                <!-- Rekap -->
                <a href="{{ Route::has('admin.rekap') ? route('admin.rekap') : url('/admin/rekap') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/rekap*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/rekap*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span>Rekap</span>
                </a>
                
                <!-- Verifikasi -->
                <a href="{{ Route::has('admin.verifikasi') ? route('admin.verifikasi') : url('/admin/verifikasi') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Verifikasi</span>
                </a>
            </div>

            <!-- Kategori 3: Layanan & Berkas -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan & Berkas</p>
                
                <!-- Dokumen -->
                <a href="{{ Route::has('admin.dokumen') ? route('admin.dokumen') : url('/admin/dokumen') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                    <span>Dokumen</span>
                </a>
                
                <!-- Pengaduan -->
                <a href="{{ Route::has('admin.layanan') ? route('admin.layanan') : url('/admin/layanan') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5 0a2.5 2.5 0 10-5 0 2.5 2.5 0 005 0zM10.5 15.5v-1a2.5 2.5 0 00-5 0v1"></path></svg>
                    <span>Pengaduan</span>
                </a>
            </div>

            <!-- Kategori 4: Sistem -->
            <div class="space-y-2">
                <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Sistem</p>
                
                <!-- Profil -->
                <a href="{{ Route::has('admin.pengguna') ? route('admin.pengguna') : url('/admin/pengguna') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span>Profil</span>
                </a>
                
                <!-- Pengaturan -->
                <a href="{{ Route::has('admin.pengaturan') ? route('admin.pengaturan') : url('/admin/pengaturan') }}" 
                   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pengaturan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pengaturan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>Pengaturan</span>
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

        <form action="{{ Route::has('logout') ? route('logout') : url('/logout') }}" method="POST">
            @csrf 
            <button type="submit" class="flex w-full items-center justify-center gap-3 rounded-2xl border border-red-200/60 bg-red-50/60 px-4 py-3.5 text-xl font-extrabold text-red-600 transition hover:bg-red-100 hover:border-red-200 focus:outline-none focus:ring-2 focus:ring-red-200">
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </button>
        </form>
    </div>
</aside>

        <!-- MAIN CONTENT AREA -->
        <main id="konten-utama" class="min-w-0 flex-1">
            
            <!-- Sticky Header Navbar -->
            <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 px-5 py-4 backdrop-blur-xl sm:px-8 lg:px-10">
                <div class="mx-auto flex max-w-[1540px] items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">Si</span>
                        <div>
                            <p class="mono text-small font-bold uppercase tracking-[.16em] text-[#0055FF]">Data & Pemantauan</p>
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Manajemen Data PIP</h1>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p class="text-lg font-extrabold text-slate-800">Admin Pusat</p>
                            <p class="text-base font-bold text-emerald-600">Sistem aktif</p>
                        </div>
                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-white shadow-lg shadow-blue-600/30" aria-label="Profil Admin Pusat">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Body Content -->
<main id="konten-utama" class="min-w-0 flex-1">

    <!-- KONTEN BANYAK CARD & DATA -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
    <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

        <!-- ================= SECTION FILTER DATA PIP ================= -->
<form id="formFilterPip" method="GET" action="{{ route('pip.index') }}" class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 mb-8">
    <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <i class="fa-solid fa-filter text-lg"></i>
            </div>
            <div>
                <h3 class="text-xl font-black text-[#071a33]">Filter Data PIP</h3>
                <p class="text-xs font-bold text-slate-500">Filter data penerima PIP berdasarkan Tahun, Jenjang, Kategori SK, Wilayah, dan Nomor SK</p>
            </div>
        </div>
        <button type="button" onclick="resetFilterPip()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
            <i class="fa-solid fa-rotate-right"></i> Reset Filter
        </button>
    </div>

    <!-- Form Filter Layout (Responsive Grid) -->
    <div class="space-y-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-5 items-end">
            
            <!-- Filter Tahun -->
            <div>
                <label for="filterTahunPip" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun SK</label>
                <select id="filterTahunPip" name="tahun" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                    <option value="Semua">Semua Tahun</option>
                    @foreach($tahunList as $item)
                        <option value="{{ $item }}" {{ (string)$tahun === (string)$item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Jenjang (Urutan: SD, SMP, SMA, SMK) -->
            <div>
                <label for="filterJenjangPip" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Jenjang</label>
                <select id="filterJenjangPip" name="jenjang" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                    <option value="Semua">Semua Jenjang</option>
                    @php
                        $sortedJenjang = ['SD', 'SMP', 'SMA', 'SMK'];
                        $existingJenjang = collect($jenjangList ?? ['SD', 'SMP', 'SMA', 'SMK']);
                        $finalJenjangList = collect($sortedJenjang)->intersect($existingJenjang)->merge($existingJenjang->diff($sortedJenjang));
                    @endphp
                    @foreach($finalJenjangList as $item)
                        <option value="{{ $item }}" {{ $jenjang === $item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Kategori SK -->
            <div>
                <label for="filterKategoriSk" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Kategori SK</label>
                <select id="filterKategoriSk" name="status_sk" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                    <option value="Semua">Semua Kategori</option>
                    @foreach($statusSkList as $item)
                        <option value="{{ $item }}" {{ $statusSk === $item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Wilayah Utama (Nasional, Provinsi, Kabupaten, Kecamatan) -->
            <div>
                <label for="filterWilayahPip" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Wilayah</label>
                <select id="filterWilayahPip" name="wilayah_level" onchange="toggleTingkatWilayahPip()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                    <option value="Nasional">Semua Wilayah</option>
                    <option value="Provinsi">Tingkat Provinsi</option>
                    <option value="Kabupaten">Tingkat Kabupaten / Kota</option>
                    <option value="Kecamatan">Tingkat Kecamatan</option>
                </select>
            </div>

            <!-- Input Nomor SK / Pencarian -->
            <div>
                <label for="filterNomorSk" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Nomor SK</label>
                <input type="text" id="filterNomorSk" name="search" value="{{ $search }}" placeholder="Cth: 211/D4/PIP/2024" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] placeholder:text-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all">
            </div>

        </div>

        <!-- Opsi Turunan Wilayah Bertingkat (Provinsi, Kabupaten/Kota, Kecamatan) -->
        <div id="containerSubWilayahPip" class="hidden rounded-2xl border border-blue-100 bg-blue-50/50 p-4 transition-all">
            <p class="text-xs font-extrabold uppercase tracking-wider text-[#0055FF] mb-3">Detail Hirarki Wilayah</p>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div id="wrapperProvinsiPip">
                    <label for="filterProvinsiPip" class="block text-xs font-bold text-slate-600 mb-1">Provinsi</label>
                    <select id="filterProvinsiPip" name="provinsi" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none">
                        <option value="Semua">Semua Provinsi</option>
                        @foreach($provinsiList as $item)
                            <option value="{{ $item }}" {{ $provinsi === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="wrapperKabupatenPip">
                    <label for="filterKabupatenPip" class="block text-xs font-bold text-slate-600 mb-1">Kabupaten/Kota</label>
                    <select id="filterKabupatenPip" name="kabupaten" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none">
                        <option value="Semua">Semua Kabupaten/Kota</option>
                        @foreach($kabupatenList as $item)
                            <option value="{{ $item }}" {{ $kabupaten === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="wrapperKecamatanPip">
                    <label for="filterKecamatanPip" class="block text-xs font-bold text-slate-600 mb-1">Kecamatan</label>
                    <select id="filterKecamatanPip" name="kecamatan" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none">
                        <option value="Semua">Semua Kecamatan</option>
                        @foreach($kecamatanList as $item)
                            <option value="{{ $item }}" {{ $kecamatan === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Button Submit Filter -->
        <div class="flex justify-end pt-2">
            <button type="submit" class="rounded-2xl bg-[#0055FF] px-6 py-2.5 text-sm font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20 flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass"></i> Tampilkan Filter PIP
            </button>
        </div>
    </div>
</form>

<!-- ================= CARD TABEL DATA PIP ================= -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-4">

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <i class="fa-solid fa-list-check text-lg"></i>
            </div>

            <div>
                <h3 class="text-2xl font-black text-[#071a33]">
                    Daftar Penerima Data PIP
                </h3>

                <p class="text-xs font-bold text-slate-500">
                    Menampilkan detail data nominasi, pemberian, dan status aktivasi dana PIP siswa
                </p>
            </div>

        </div>

        <span class="px-4 py-2 rounded-xl bg-blue-50 text-[#0055FF] text-xs font-black border border-blue-100">
            Total Data:
            <span id="totalSiswaPipCount">
                {{ method_exists($dataPip, 'total') ? $dataPip->total() : count($dataPip) }}
            </span>
            Siswa
        </span>

    </div>


    <!-- ================= TABEL ================= -->
    <div class="overflow-x-auto">

        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[950px]">

            <thead>
                <tr class="border-b-2 border-slate-200 bg-slate-100 text-slate-800">

                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider rounded-l-xl">
                        Nama Siswa
                    </th>

                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">
                        NISN
                    </th>

                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">
                        Nama Sekolah
                    </th>

                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">
                        Nomor SK
                    </th>

                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">
                        Nominal Bantuan
                    </th>

                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">
                        Status Aktivasi
                    </th>

                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center rounded-r-xl">
                        Aksi - Detail
                    </th>

                </tr>
            </thead>


            <tbody
                id="tablePipBody"
                class="divide-y divide-slate-200 text-sm font-semibold text-slate-900">

                @forelse($dataPip as $item)

                    @php

                        $rowBg = 'bg-white hover:bg-slate-50';

                        if ($item->status_aktivasi === 'Sudah Aktivasi') {

                            $rowBg = 'bg-emerald-100/90 hover:bg-emerald-200/90 border-b-2 border-emerald-300';

                        } elseif ($item->status_aktivasi === 'Proses di Bank') {

                            $rowBg = 'bg-blue-100/90 hover:bg-blue-200/90 border-b-2 border-blue-300';

                        } else {

                            $rowBg = 'bg-rose-100/90 hover:bg-rose-200/90 border-b-2 border-rose-300';

                        }

                    @endphp


                    <tr class="{{ $rowBg }} transition-all font-bold">

                        <td class="p-4 text-[#071a33]">
                            {{ $item->nama_siswa }}
                        </td>

                        <td class="p-4 text-slate-800">
                            {{ $item->nisn }}
                        </td>

                        <td class="p-4 text-slate-800">
                            {{ $item->nama_sekolah }}
                        </td>

                        <td class="p-4 text-slate-700">
                            {{ $item->no_sk }}
                        </td>

                        <td class="p-4 text-slate-900">
                            Rp {{ number_format($item->nominal_dana, 0, ',', '.') }}
                        </td>


                        <!-- STATUS -->
                        <td class="p-4 text-center">

                            @if($item->status_aktivasi === 'Sudah Aktivasi')

                                <span class="px-3.5 py-1 rounded-full bg-emerald-600 text-white border border-emerald-700 text-xs font-black shadow-sm">
                                    Sudah Aktivasi
                                </span>

                            @elseif($item->status_aktivasi === 'Proses di Bank')

                                <span class="px-3.5 py-1 rounded-full bg-blue-600 text-white border border-blue-700 text-xs font-black shadow-sm">
                                    Proses di Bank
                                </span>

                            @else

                                <span class="px-3.5 py-1 rounded-full bg-rose-600 text-white border border-rose-700 text-xs font-black shadow-sm">
                                    Belum Aktivasi
                                </span>

                            @endif

                        </td>


                        <!-- DETAIL -->
                        <td class="p-4 text-center">

                            <button
                                type="button"
                                onclick="detailPip({{ Js::from($item) }})"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white border-2 border-blue-400 text-[#0055FF] hover:bg-blue-50 font-black text-xs transition shadow-sm">

                                <i class="fa-solid fa-eye"></i>

                                Lihat Detail

                            </button>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="p-6 text-center text-slate-500 font-bold bg-white">

                            Tidak ada data PIP yang cocok dengan filter.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- ================= PAGINATION ================= -->
    @if(method_exists($dataPip, 'links'))

        <div class="pt-4">

            {{ $dataPip->withQueryString()->links() }}

        </div>

    @endif

</section>



<!-- ========================================================= -->
<!-- ================= MODAL DETAIL PIP ====================== -->
<!-- ========================================================= -->

<div
    id="modalDetailPip"
    class="fixed inset-0 z-[99999] hidden items-center justify-center p-4 sm:p-6">


    <!-- OVERLAY -->
    <div
        class="absolute inset-0 bg-[#071a33]/75 backdrop-blur-sm"
        onclick="tutupDetailPip()">
    </div>


    <!-- MODAL -->
    <div
        class="relative z-10 w-full max-w-4xl max-h-[90vh] overflow-hidden rounded-[2rem] bg-white shadow-2xl border border-slate-200">


        <!-- HEADER -->
        <div class="flex items-center justify-between gap-4 px-6 py-5 sm:px-8 border-b border-slate-200 bg-gradient-to-r from-blue-50 to-white">

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-200">

                    <i class="fa-solid fa-user-graduate text-xl"></i>

                </div>

                <div>

                    <h3 class="text-xl sm:text-2xl font-black text-[#071a33]">
                        Detail Data PIP
                    </h3>

                    <p class="text-xs sm:text-sm font-semibold text-slate-500">
                        Informasi lengkap penerima Program Indonesia Pintar
                    </p>

                </div>

            </div>


            <!-- TOMBOL X -->
            <button
                type="button"
                onclick="tutupDetailPip()"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-500 hover:bg-rose-100 hover:text-rose-600 transition">

                <i class="fa-solid fa-xmark text-lg"></i>

            </button>

        </div>



        <!-- CONTENT -->
        <div class="overflow-y-auto max-h-[calc(90vh-145px)] p-6 sm:p-8">

            <div class="space-y-6">


                <!-- ================= STATUS ================= -->
                <div
                    id="detailPipStatusBox"
                    class="rounded-2xl border-2 border-slate-200 bg-slate-50 p-5">

                    <div class="flex items-center justify-between gap-4 flex-wrap">

                        <div class="flex items-center gap-3">

                            <div
                                id="detailPipStatusIcon"
                                class="h-11 w-11 rounded-xl flex items-center justify-center bg-slate-200 text-slate-600">

                                <i class="fa-solid fa-clock"></i>

                            </div>

                            <div>

                                <p class="text-xs font-black uppercase tracking-wider text-slate-500">
                                    Status Aktivasi
                                </p>

                                <p
                                    id="detailPipStatus"
                                    class="text-lg font-black text-slate-800">

                                    -

                                </p>

                            </div>

                        </div>


                        <div class="text-right">

                            <p class="text-xs font-bold text-slate-500">
                                Nominal Bantuan
                            </p>

                            <p
                                id="detailPipNominal"
                                class="text-xl font-black text-[#071a33]">

                                -

                            </p>

                        </div>

                    </div>

                </div>



                <!-- ================= IDENTITAS SISWA ================= -->
                <div>

                    <div class="flex items-center gap-2 mb-3">

                        <div class="h-8 w-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">

                            <i class="fa-solid fa-id-card"></i>

                        </div>

                        <h4 class="text-base font-black text-[#071a33]">
                            Identitas Siswa
                        </h4>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Nama Siswa
                            </p>

                            <p
                                id="detailPipNama"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                NISN
                            </p>

                            <p
                                id="detailPipNisn"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                NIK
                            </p>

                            <p
                                id="detailPipNik"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Jenjang Pendidikan
                            </p>

                            <p
                                id="detailPipJenjang"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>

                    </div>

                </div>



                <!-- ================= SEKOLAH & WILAYAH ================= -->
                <div>

                    <div class="flex items-center gap-2 mb-3">

                        <div class="h-8 w-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">

                            <i class="fa-solid fa-school"></i>

                        </div>

                        <h4 class="text-base font-black text-[#071a33]">
                            Sekolah & Wilayah
                        </h4>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">


                        <div class="sm:col-span-2 rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Nama Sekolah
                            </p>

                            <p
                                id="detailPipSekolah"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Provinsi
                            </p>

                            <p
                                id="detailPipProvinsi"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Kabupaten / Kota
                            </p>

                            <p
                                id="detailPipKabupaten"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Kecamatan
                            </p>

                            <p
                                id="detailPipKecamatan"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>

                    </div>

                </div>



                <!-- ================= INFORMASI PIP ================= -->
                <div>

                    <div class="flex items-center gap-2 mb-3">

                        <div class="h-8 w-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">

                            <i class="fa-solid fa-money-check-dollar"></i>

                        </div>

                        <h4 class="text-base font-black text-[#071a33]">
                            Informasi PIP
                        </h4>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Tahun PIP
                            </p>

                            <p
                                id="detailPipTahun"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                            <p class="text-[11px] font-black uppercase text-slate-400">
                                Kategori SK
                            </p>

                            <p
                                id="detailPipKategori"
                                class="mt-1 font-black text-slate-800">

                                -

                            </p>

                        </div>


                        <div class="sm:col-span-2 rounded-xl bg-blue-50 border border-blue-100 p-4">

                            <p class="text-[11px] font-black uppercase text-blue-500">
                                Nomor SK
                            </p>

                            <p
                                id="detailPipSk"
                                class="mt-1 font-black text-blue-900">

                                -

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- FOOTER MODAL -->
        <div class="flex justify-end px-6 sm:px-8 py-4 border-t border-slate-200 bg-slate-50">

            <button
                type="button"
                onclick="tutupDetailPip()"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#071a33] text-white font-black text-sm hover:bg-blue-700 transition shadow-lg">

                <i class="fa-solid fa-xmark"></i>

                Tutup

            </button>

        </div>

    </div>

</div>



<!-- ================= FOOTER ================= -->

<div class="text-sm font-bold text-slate-500 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200/60 mt-8">

    <span>
        © 2020–{{ date('Y') }} Puslapdik · Kemendikdasmen RI
    </span>

    <span>
        SIPINTAR - Sistem Informasi Program Indonesia Pintar
    </span>

</div>



<!-- ========================================================= -->
<!-- ================= JAVASCRIPT ============================ -->
<!-- ========================================================= -->

<script>

    /* =========================================================
       FILTER WILAYAH
    ========================================================= */

    function toggleTingkatWilayahPip() {

        const wilayahElement =
            document.getElementById('filterWilayahPip');

        if (!wilayahElement) {
            return;
        }

        const wilayahLevel =
            wilayahElement.value;

        const containerSub =
            document.getElementById('containerSubWilayahPip');

        const wrapProv =
            document.getElementById('wrapperProvinsiPip');

        const wrapKab =
            document.getElementById('wrapperKabupatenPip');

        const wrapKec =
            document.getElementById('wrapperKecamatanPip');


        if (!containerSub || !wrapProv || !wrapKab || !wrapKec) {
            return;
        }


        if (wilayahLevel === 'Nasional') {

            containerSub.classList.add('hidden');

            wrapProv.style.display = 'none';
            wrapKab.style.display = 'none';
            wrapKec.style.display = 'none';

        } else {

            containerSub.classList.remove('hidden');


            if (wilayahLevel === 'Provinsi') {

                wrapProv.style.display = 'block';
                wrapKab.style.display = 'none';
                wrapKec.style.display = 'none';

            }

            else if (wilayahLevel === 'Kabupaten') {

                wrapProv.style.display = 'block';
                wrapKab.style.display = 'block';
                wrapKec.style.display = 'none';

            }

            else if (wilayahLevel === 'Kecamatan') {

                wrapProv.style.display = 'block';
                wrapKab.style.display = 'block';
                wrapKec.style.display = 'block';

            }

        }

    }



    /* =========================================================
       RESET FILTER
    ========================================================= */

    function resetFilterPip() {

        const tahun =
            document.getElementById('filterTahunPip');

        const jenjang =
            document.getElementById('filterJenjangPip');

        const kategori =
            document.getElementById('filterKategoriSk');

        const wilayah =
            document.getElementById('filterWilayahPip');

        const nomorSk =
            document.getElementById('filterNomorSk');

        const form =
            document.getElementById('formFilterPip');


        if (tahun) {
            tahun.value = 'Semua';
        }

        if (jenjang) {
            jenjang.value = 'Semua';
        }

        if (kategori) {
            kategori.value = 'Semua';
        }

        if (wilayah) {
            wilayah.value = 'Nasional';
        }

        if (nomorSk) {
            nomorSk.value = '';
        }


        toggleTingkatWilayahPip();


        if (form) {
            form.submit();
        }

    }



    /* =========================================================
       BUKA MODAL DETAIL PIP
    ========================================================= */

    function detailPip(item) {

        console.log('DETAIL PIP:', item);


        /* ================= IDENTITAS ================= */

        const nama =
            document.getElementById('detailPipNama');

        const nisn =
            document.getElementById('detailPipNisn');

        const nik =
            document.getElementById('detailPipNik');

        const jenjang =
            document.getElementById('detailPipJenjang');


        if (nama) {
            nama.textContent =
                item.nama_siswa || '-';
        }

        if (nisn) {
            nisn.textContent =
                item.nisn || '-';
        }

        if (nik) {
            nik.textContent =
                item.nik || '-';
        }

        if (jenjang) {
            jenjang.textContent =
                item.jenjang || '-';
        }



        /* ================= SEKOLAH ================= */

        const sekolah =
            document.getElementById('detailPipSekolah');

        const provinsi =
            document.getElementById('detailPipProvinsi');

        const kabupaten =
            document.getElementById('detailPipKabupaten');

        const kecamatan =
            document.getElementById('detailPipKecamatan');


        if (sekolah) {
            sekolah.textContent =
                item.nama_sekolah || '-';
        }

        if (provinsi) {
            provinsi.textContent =
                item.provinsi || '-';
        }

        if (kabupaten) {
            kabupaten.textContent =
                item.kabupaten_kota || '-';
        }

        if (kecamatan) {
            kecamatan.textContent =
                item.kecamatan || '-';
        }



        /* ================= DATA PIP ================= */

        const tahun =
            document.getElementById('detailPipTahun');

        const kategori =
            document.getElementById('detailPipKategori');

        const nomorSk =
            document.getElementById('detailPipSk');


        if (tahun) {
            tahun.textContent =
                item.tahun || '-';
        }

        if (kategori) {
            kategori.textContent =
                item.kategori_sk || '-';
        }

        if (nomorSk) {
            nomorSk.textContent =
                item.no_sk || '-';
        }



        /* ================= NOMINAL ================= */

        const nominalElement =
            document.getElementById('detailPipNominal');

        const nominal =
            Number(item.nominal_dana || 0);


        if (nominalElement) {

            nominalElement.textContent =
                'Rp ' + nominal.toLocaleString('id-ID');

        }



        /* ================= STATUS ================= */

        const status =
            item.status_aktivasi || 'Belum Aktivasi';


        const statusBox =
            document.getElementById('detailPipStatusBox');

        const statusIcon =
            document.getElementById('detailPipStatusIcon');

        const statusText =
            document.getElementById('detailPipStatus');


        if (statusText) {

            statusText.textContent =
                status;

        }


        /* RESET STYLE */

        if (statusBox) {

            statusBox.className =
                'rounded-2xl border-2 p-5';

        }


        if (statusIcon) {

            statusIcon.className =
                'h-11 w-11 rounded-xl flex items-center justify-center';

        }



        /* ================= SUDAH AKTIVASI ================= */

        if (status === 'Sudah Aktivasi') {

            if (statusBox) {

                statusBox.classList.add(
                    'bg-emerald-50',
                    'border-emerald-200'
                );

            }


            if (statusIcon) {

                statusIcon.classList.add(
                    'bg-emerald-600',
                    'text-white'
                );

                statusIcon.innerHTML =
                    '<i class="fa-solid fa-circle-check"></i>';

            }


            if (statusText) {

                statusText.className =
                    'text-lg font-black text-emerald-700';

            }

        }



        /* ================= PROSES DI BANK ================= */

        else if (status === 'Proses di Bank') {

            if (statusBox) {

                statusBox.classList.add(
                    'bg-blue-50',
                    'border-blue-200'
                );

            }


            if (statusIcon) {

                statusIcon.classList.add(
                    'bg-blue-600',
                    'text-white'
                );

                statusIcon.innerHTML =
                    '<i class="fa-solid fa-building-columns"></i>';

            }


            if (statusText) {

                statusText.className =
                    'text-lg font-black text-blue-700';

            }

        }



        /* ================= BELUM AKTIVASI ================= */

        else {

            if (statusBox) {

                statusBox.classList.add(
                    'bg-rose-50',
                    'border-rose-200'
                );

            }


            if (statusIcon) {

                statusIcon.classList.add(
                    'bg-rose-600',
                    'text-white'
                );

                statusIcon.innerHTML =
                    '<i class="fa-solid fa-clock"></i>';

            }


            if (statusText) {

                statusText.className =
                    'text-lg font-black text-rose-700';

            }

        }



        /* ================= BUKA MODAL ================= */

        const modal =
            document.getElementById('modalDetailPip');


        if (!modal) {

            console.error(
                'ERROR: modalDetailPip tidak ditemukan.'
            );

            return;

        }


        modal.classList.remove('hidden');

        modal.classList.add('flex');

        document.body.classList.add('overflow-hidden');

    }



    /* =========================================================
       TUTUP MODAL
    ========================================================= */

    function tutupDetailPip() {

        const modal =
            document.getElementById('modalDetailPip');


        if (!modal) {
            return;
        }


        modal.classList.add('hidden');

        modal.classList.remove('flex');

        document.body.classList.remove('overflow-hidden');

    }



    /* =========================================================
       ESC UNTUK MENUTUP MODAL
    ========================================================= */

    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            const modal =
                document.getElementById('modalDetailPip');


            if (
                modal &&
                !modal.classList.contains('hidden')
            ) {

                tutupDetailPip();

            }

        }

    });



    /* =========================================================
       INIT
    ========================================================= */

    document.addEventListener('DOMContentLoaded', function() {

        toggleTingkatWilayahPip();

    });

</script>