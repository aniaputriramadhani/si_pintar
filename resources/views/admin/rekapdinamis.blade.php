<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Rekap Dinamis Administrator SIPINTAR.">
    <title>Rekap Dinamis Administrator | SIPINTAR</title>
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
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Utama</p>
                        <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : url('/admin/dashboard') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dashboard*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Data & Pemantauan</p>
                        <a href="{{ Route::has('pip.index') ? route('pip.index') : url('/admin/pip') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pip*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pip*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span>Data PIP</span>
                        </a>
                        <a href="{{ Route::has('admin.pemantauan') ? route('admin.pemantauan') : url('/admin/pemantauan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <span>Pemantauan</span>
                        </a>
                        <a href="{{ Route::has('admin.rekap') ? route('admin.rekap') : url('/admin/rekap') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/rekap*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/rekap*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span>Rekap</span>
                        </a>
                        <a href="{{ Route::has('admin.verifikasi') ? route('admin.verifikasi') : url('/admin/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/verifikasi*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/verifikasi*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi</span>
                        </a>
                    </div>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan & Berkas</p>
                        <a href="{{ Route::has('admin.dokumen') ? route('admin.dokumen') : url('/admin/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                            <span>Dokumen</span>
                        </a>
                        <a href="{{ Route::has('admin.layanan') ? route('admin.layanan') : url('/admin/layanan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/layanan*') || request()->is('admin/pengaduan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5 0a2.5 2.5 0 10-5 0 2.5 2.5 0 005 0zM10.5 15.5v-1a2.5 2.5 0 00-5 0v1"></path></svg>
                            <span>Pengaduan</span>
                        </a>
                    </div>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Sistem</p>
                        <a href="{{ Route::has('admin.pengguna') ? route('admin.pengguna') : url('/admin/pengguna') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pengguna*') || request()->is('admin/profile*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Profil</span>
                        </a>
                        <a href="{{ Route::has('admin.pengaturan') ? route('admin.pengaturan') : url('/admin/pengaturan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/pengaturan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/pengaturan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Pengaturan</span>
                        </a>
                    </div>
                </nav>
            </div>

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
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Rekap Dinamis</h1>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p class="text-lg font-extrabold text-slate-800">Admin Pusat</p>
                            <p class="text-base font-bold text-emerald-600">Sistem aktif</p>
                        </div>
                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-[#ffffff] shadow-lg shadow-blue-600/30" aria-label="Profil Admin Pusat">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Body Content -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- FORM FILTER DINAMIS -->
                <form id="formFilterRekap" method="GET" action="{{ route('rekap.dinamis') }}" class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50">
                    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                <i class="fa-solid fa-filter text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-[#071a33]">Filter Rekap Dinamis</h3>
                                <p class="text-xs font-bold text-slate-500">Filter data berdasarkan Tahun, Jenjang, Wilayah, dan Pencarian kata kunci</p>
                            </div>
                        </div>
                        <button type="button" onclick="resetFilterRekap()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
                            <i class="fa-solid fa-rotate-right"></i> Reset Filter
                        </button>
                    </div>

                    <div class="space-y-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4 items-start">
                            
                            <!-- 1. Filter Tahun -->
                            <div>
                                <label for="filterTahun" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun</label>
                                <select id="filterTahun" name="tahun" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" {{ request('tahun') == 'Semua' ? 'selected' : '' }}>Semua Tahun</option>
                                    @foreach($tahunList as $itemTahun)
                                        <option value="{{ $itemTahun }}" {{ (string) request('tahun') === (string) $itemTahun ? 'selected' : '' }}>{{ $itemTahun }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- 2. Filter Jenjang -->
                            <div>
                                <label for="filterJenjang" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Jenjang</label>
                                <select id="filterJenjang" name="jenjang" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Semua" {{ request('jenjang') == 'Semua' ? 'selected' : '' }}>Semua Jenjang</option>
                                    @foreach($jenjangList as $itemJenjang)
                                        <option value="{{ $itemJenjang }}" {{ request('jenjang') === $itemJenjang ? 'selected' : '' }}>{{ $itemJenjang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- 3. Filter Wilayah -->
                            <div>
                                <label for="filterWilayah" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Wilayah</label>
                                <select id="filterWilayah" name="wilayah" onchange="toggleTingkatWilayah()" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                                    <option value="Nasional" {{ request('wilayah') == 'Nasional' ? 'selected' : '' }}>Semua Wilayah</option>
                                    <option value="Provinsi" {{ request('wilayah') == 'Provinsi' ? 'selected' : '' }}>Tingkat Provinsi</option>
                                    <option value="Kabupaten" {{ request('wilayah') == 'Kabupaten' ? 'selected' : '' }}>Tingkat Kabupaten / Kota</option>
                                    <option value="Kecamatan" {{ request('wilayah') == 'Kecamatan' ? 'selected' : '' }}>Tingkat Kecamatan</option>
                                </select>
                            </div>

                            <!-- 4. Pencarian -->
                            <div>
                                <label for="filterPencarian" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Pencarian</label>
                                <div class="relative">
                                    <input type="text" id="filterPencarian" name="search" value="{{ request('search') }}" placeholder="Cari nama daerah / wilayah..." class="w-full rounded-2xl border-2 border-slate-300 bg-white pl-10 pr-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all placeholder:font-normal placeholder:text-slate-400">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Opsi Turunan Wilayah (Provinsi, Kabupaten, Kecamatan) -->
                        <div id="containerSubWilayah" class="hidden rounded-2xl border border-blue-100 bg-blue-50/50 p-4 transition-all">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-[#0055FF] mb-3">Detail Hirarki Wilayah</p>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                                <div id="wrapperProvinsi">
                                    <label for="selectProvinsi" class="block text-xs font-bold text-slate-600 mb-1">Provinsi</label>
                                    <select id="selectProvinsi" name="provinsi" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none">
                                        <option value="Semua">(All) Provinsi</option>
                                        @foreach($provinsiList as $itemProvinsi)
                                            <option value="{{ $itemProvinsi }}" {{ request('provinsi') === $itemProvinsi ? 'selected' : '' }}>{{ $itemProvinsi }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="wrapperKabupaten">
                                    <label for="selectKabupaten" class="block text-xs font-bold text-slate-600 mb-1">Kabupaten / Kota</label>
                                    <select id="selectKabupaten" name="kabupaten" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none">
                                        <option value="Semua">(All) Kabupaten</option>
                                        @foreach($kabupatenList as $itemKabupaten)
                                            <option value="{{ $itemKabupaten }}" {{ request('kabupaten') === $itemKabupaten ? 'selected' : '' }}>{{ $itemKabupaten }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="wrapperKecamatan">
                                    <label for="selectKecamatan" class="block text-xs font-bold text-slate-600 mb-1">Kecamatan</label>
                                    <select id="selectKecamatan" name="kecamatan" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none">
                                        <option value="Semua">(All) Kecamatan</option>
                                        @foreach($kecamatanList as $itemKecamatan)
                                            <option value="{{ $itemKecamatan }}" {{ request('kecamatan') === $itemKecamatan ? 'selected' : '' }}>{{ $itemKecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-5 flex flex-wrap items-center justify-end gap-3 pt-4 border-t border-slate-100">
                        <button type="button" class="rounded-2xl border-2 border-slate-200 bg-white px-6 py-2.5 text-sm font-extrabold text-slate-700 transition hover:bg-slate-50 flex items-center gap-2">
                            <i class="fa-solid fa-file-excel text-emerald-600"></i> Ekspor Excel
                        </button>
                        <button type="submit" class="rounded-2xl bg-[#0055FF] px-6 py-2.5 text-sm font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20 flex items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i> Tampilkan Rekap
                        </button>
                    </div>
                </form>

                <!-- TABEL DATA AGREGASI -->
                <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                <i class="fa-solid fa-table-cells text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-[#071a33]">Ringkasan Data Alokasi & Penyaluran</h3>
                                <p class="text-xs font-bold text-slate-500">Agregasi data berdasarkan filter yang dipilih (Top 10 Terbesar).</p>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[700px]">
                            <thead>
                                <tr class="border-b-2 border-slate-200 bg-slate-50/80 mono text-xs uppercase font-extrabold text-slate-500 tracking-wider">
                                    <th class="py-4 px-4 rounded-l-xl">JENJANG</th>
                                    <th class="py-4 px-4 text-right">ALOKASI DANA</th>
                                    <th class="py-4 px-4 text-right">ALOKASI SISWA</th>
                                    <th class="py-4 px-4 text-right">DANA DISALURKAN</th>
                                    <th class="py-4 px-4 text-right rounded-r-xl">SISA DANA</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                                @forelse($dataRekap as $row)
                                    <tr class="hover:bg-blue-50/40 transition-colors">
                                        <td class="py-4 px-4 font-bold text-[#071a33]">
                                            <span class="inline-block w-12 py-1 text-center text-xs font-extrabold rounded-lg bg-blue-50 text-[#0055FF] border border-blue-100">
                                                {{ $row->jenjang }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 text-right mono font-bold text-slate-800">
                                            Rp {{ number_format($row->alokasi_dana, 0, ',', '.') }}
                                        </td>
                                        <td class="py-4 px-4 text-right mono font-bold text-slate-800">
                                            {{ number_format($row->alokasi_siswa, 0, ',', '.') }}
                                        </td>
                                        <td class="py-4 px-4 text-right mono text-emerald-600 font-extrabold">
                                            Rp {{ number_format($row->dana_disalurkan, 0, ',', '.') }}
                                        </td>
                                        <td class="py-4 px-4 text-right mono text-amber-600 font-bold">
                                            Rp {{ number_format($row->sisa_dana, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-6 text-center text-slate-400 font-bold">Tidak ada data rekap yang sesuai dengan filter.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if(isset($grandTotal))
                            <tfoot>
                                <tr class="bg-slate-50/80 font-extrabold text-[#071a33] text-sm border-t-2 border-slate-200">
                                    <td class="py-4 px-4 font-black">Grand Total</td>
                                    <td class="py-4 px-4 text-right mono text-[#0055FF] font-black">
                                        Rp {{ number_format($grandTotal->alokasi_dana, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-4 text-right mono font-black">
                                        {{ number_format($grandTotal->alokasi_siswa, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-4 text-right mono text-emerald-600 font-black">
                                        Rp {{ number_format($grandTotal->dana_disalurkan, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-4 text-right mono text-amber-600 font-black">
                                        Rp {{ number_format($grandTotal->sisa_dana, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                </section>

                <!-- FOOTER KONSISTEN -->
                <div class="text-sm font-bold text-slate-400 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200/60">
                    <span>© 2020–{{ date('Y') }} Puslapdik · Kemendikdasmen RI</span>
                    <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
                </div>

            </div>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            toggleTingkatWilayah();

            document.querySelectorAll('#formFilterRekap select').forEach(function(select) {
                select.addEventListener('change', function() {
                    document.getElementById('formFilterRekap').submit();
                });
            });
        });

        function toggleTingkatWilayah() {
            const level = document.getElementById('filterWilayah').value;
            const container = document.getElementById('containerSubWilayah');
            const prov = document.getElementById('wrapperProvinsi');
            const kab = document.getElementById('wrapperKabupaten');
            const kec = document.getElementById('wrapperKecamatan');

            if (level === 'Nasional') {
                container.classList.add('hidden');
            } else {
                container.classList.remove('hidden');
                
                prov.style.display = (level === 'Provinsi' || level === 'Kabupaten' || level === 'Kecamatan') ? 'block' : 'none';
                kab.style.display = (level === 'Kabupaten' || level === 'Kecamatan') ? 'block' : 'none';
                kec.style.display = (level === 'Kecamatan') ? 'block' : 'none';
            }
        }

        function resetFilterRekap() {
            document.getElementById('filterTahun').value = "Semua";
            document.getElementById('filterJenjang').value = "Semua";
            document.getElementById('filterWilayah').value = "Nasional";
            document.getElementById('filterPencarian').value = "";
            document.getElementById('selectProvinsi').value = "Semua";
            document.getElementById('selectKabupaten').value = "Semua";
            document.getElementById('selectKecamatan').value = "Semua";
            toggleTingkatWilayah();
            
            // Submit form untuk merefresh data setelah reset
            document.getElementById('formFilterRekap').submit();
        }
    </script>
     
</body>
</html>
