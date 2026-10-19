<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard terpadu Administrator SIPINTAR.">
    <title>Dashboard Administrator | SIPINTAR</title>
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
        .dot-field { background-image:radial-gradient(#0055FF 1.4px,transparent 1.4px); background-size:22px 22px; }
        .glass { background:linear-gradient(140deg,rgba(255,255,255,.94),rgba(255,255,255,.78)); border:1px solid rgba(255,255,255,.95); box-shadow:0 16px 45px -28px rgba(7,26,51,.28); backdrop-filter:blur(18px); }
        .sidebar-link { transition: all 0.2s ease-in-out; }
        .sidebar-link:hover:not(.active) { transform:translateX(4px); }
        .bar { transform-origin:bottom; animation:rise .7s cubic-bezier(.16,1,.3,1) both; }
        @keyframes rise { from { transform:scaleY(.12); opacity:.2; } }
        @media (prefers-reduced-motion:reduce) { *,::before,::after { animation-duration:.01ms!important; scroll-behavior:auto!important; transition-duration:.01ms!important; } }

        /* ======================================================
           CUSTOM SCROLLBAR (BIRU SOFT & BIRU MUDA ES)
        ====================================================== */
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
                        
                        <!-- Tombol Utama Dokumen -->
                        <a href="{{ Route::has('admin.dokumen') ? route('admin.dokumen') : url('/admin/dokumen') }}" 
                           class="sidebar-link group flex items-center justify-between rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->is('admin/dokumen*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}">
                            <div class="flex items-center gap-4">
                                <svg class="h-7 w-7 flex-shrink-0 {{ request()->is('admin/dokumen*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                                <span>Dokumen</span>
                            </div>
                            <!-- Indikator Panah Dropdown -->
                            <svg class="h-5 w-5 transition-transform duration-200 {{ request()->is('admin/dokumen*') ? 'text-white rotate-180' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>

                        <!-- Submenu (Akan muncul di dalam sidebar tepat di bawah tombol Dokumen ketika aktif) -->
                        @if(request()->is('admin/dokumen*'))
                        <div class="space-y-1 pl-4 pt-1">
                            <!-- Format Dokumen -->
                            <a href="{{ route('admin.dokumen', ['tab' => 'dokumen']) }}" 
                               class="flex items-center rounded-xl px-4 py-2.5 text-base font-semibold transition-all {{ request('tab', 'dokumen') == 'dokumen' ? 'bg-slate-200/70 text-slate-900 font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ request('tab', 'dokumen') == 'dokumen' ? 'bg-[#0055FF]' : 'bg-slate-400' }} mr-3"></span>
                                Format Dokumen
                            </a>

                            <!-- Lampiran SK -->
                            <a href="{{ route('admin.dokumen', ['tab' => 'sk']) }}" 
                               class="flex items-center rounded-xl px-4 py-2.5 text-base font-semibold transition-all {{ request('tab') == 'sk' ? 'bg-slate-200/70 text-slate-900 font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ request('tab') == 'sk' ? 'bg-[#0055FF]' : 'bg-slate-400' }} mr-3"></span>
                                Lampiran SK
                            </a>

                            <!-- Pemberitahuan -->
                            <a href="{{ route('admin.dokumen', ['tab' => 'pemberitahuan']) }}" 
                               class="flex items-center rounded-xl px-4 py-2.5 text-base font-semibold transition-all {{ request('tab') == 'pemberitahuan' ? 'bg-slate-200/70 text-slate-900 font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ request('tab') == 'pemberitahuan' ? 'bg-[#0055FF]' : 'bg-slate-400' }} mr-3"></span>
                                Pemberitahuan
                            </a>
                        </div>
                        @endif

                        <!-- Menu Pengaduan -->
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

    <!-- STICKY HEADER NAVBAR -->
    <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 px-5 py-4 backdrop-blur-xl sm:px-8 lg:px-10">
        <div class="mx-auto flex max-w-[1540px] items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">Si</span>
                <div>
                    <p class="mono text-small font-bold uppercase tracking-[.16em] text-[#0055FF]">Layanan & Berkas</p>
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Dokumen Data PIP</h1>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="hidden text-right sm:block">
                    <p class="text-lg font-extrabold text-slate-800">Admin Pusat</p>
                    <p class="text-base font-bold text-emerald-600">Sistem aktif</p>
                </div>
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-white shadow-lg shadow-blue-600/30">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </header>

    <div class="px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
        <div class="mx-auto max-w-[1540px] space-y-8">

            {{-- ==========================================
                 1. CARD FORMAT DOKUMEN & LAMPIRAN SK
                 ========================================== --}}

            @if(!request('tab') || request('tab') == 'dokumen')

                {{-- FORMAT DOKUMEN --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <!-- FORMAT USULAN -->
                    <div class="min-h-[190px] rounded-3xl border border-slate-100 bg-white p-7 shadow-xl shadow-slate-200/40 border-t-4 border-t-emerald-500 flex flex-col justify-between gap-6">

                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <span class="px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase">AKTIF</span>
                                <h3 class="font-extrabold text-slate-800 text-lg mt-3">Format Usulan</h3>
                                <p class="text-sm font-semibold text-slate-400 mt-1">Versi Aktif: 15 Jul 2026</p>
                            </div>

                            <div class="rounded-2xl bg-emerald-50 p-3 text-emerald-600">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2zM15 3v5h4M9 13h6M9 17h6" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button onclick="unduhBerkas('Format Usulan')" class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-sm font-bold transition-all">
                                Unduh
                            </button>

                            <button onclick="openModalUpdateFormat('Format Usulan')" class="flex-1 px-4 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-bold shadow-lg shadow-emerald-600/20 transition-all">
                                Update Berkas
                            </button>
                        </div>
                    </div>

                    <!-- FORMAT PENGEMBALIAN -->
                    <div class="min-h-[190px] rounded-3xl border border-slate-100 bg-white p-7 shadow-xl shadow-slate-200/40 border-t-4 border-t-indigo-500 flex flex-col justify-between gap-6">

                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <span class="px-3 py-1.5 rounded-full bg-indigo-100 text-indigo-700 text-[10px] font-black uppercase">AKTIF</span>
                                <h3 class="font-extrabold text-slate-800 text-lg mt-3">Format Pengembalian</h3>
                                <p class="text-sm font-semibold text-slate-400 mt-1">Versi Aktif: 02 Agu 2026</p>
                            </div>

                            <div class="rounded-2xl bg-indigo-50 p-3 text-indigo-600">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2zM15 3v5h4M9 13h6M9 17h6" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button onclick="unduhBerkas('Format Pengembalian')" class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-sm font-bold transition-all">
                                Unduh
                            </button>

                            <button onclick="openModalUpdateFormat('Format Pengembalian')" class="flex-1 px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-bold shadow-lg shadow-indigo-600/20 transition-all">
                                Update Berkas
                            </button>
                        </div>
                    </div>

                </div>

            @elseif(request('tab') == 'sk')

                {{-- LAMPIRAN SK --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <!-- SK PEMBERIAN -->
                    <div class="min-h-[190px] rounded-3xl border border-blue-100 bg-white p-7 shadow-xl shadow-slate-200/40 border-t-4 border-t-[#0055FF] flex flex-col justify-between gap-6">

                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <span class="px-3 py-1.5 rounded-full bg-blue-100 text-[#0055FF] text-[10px] font-black uppercase">SK RESMI</span>
                                <h3 class="font-extrabold text-slate-800 text-lg mt-3">SK Pemberian</h3>
                                <p class="text-sm font-semibold text-slate-400 mt-1">Kelola dokumen Surat Keputusan Pemberian</p>
                            </div>

                            <div class="rounded-2xl bg-blue-50 p-3 text-[#0055FF]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2zM15 3v5h4M9 13h6M9 17h6" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button onclick="unduhBerkas('SK Pemberian')" class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-sm font-bold transition-all">
                                Unduh SK
                            </button>

                            <button onclick="kelolaSK('SK Pemberian')" class="flex-1 px-4 py-3 bg-[#0055FF] hover:bg-blue-700 text-white rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 transition-all">
                                Kelola SK
                            </button>
                        </div>
                    </div>

                    <!-- SK PEMBATALAN -->
                    <div class="min-h-[190px] rounded-3xl border border-rose-100 bg-white p-7 shadow-xl shadow-slate-200/40 border-t-4 border-t-rose-500 flex flex-col justify-between gap-6">

                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <span class="px-3 py-1.5 rounded-full bg-rose-100 text-rose-600 text-[10px] font-black uppercase">SK KHUSUS</span>
                                <h3 class="font-extrabold text-slate-800 text-lg mt-3">SK Pembatalan</h3>
                                <p class="text-sm font-semibold text-slate-400 mt-1">Kelola dokumen Surat Keputusan Pembatalan</p>
                            </div>

                            <div class="rounded-2xl bg-rose-50 p-3 text-rose-600">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2zM15 3v5h4M9 13h6M9 17h6" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button onclick="unduhBerkas('SK Pembatalan')" class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-sm font-bold transition-all">
                                Unduh SK
                            </button>

                            <button onclick="kelolaSK('SK Pembatalan')" class="flex-1 px-4 py-3 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-sm font-bold shadow-lg shadow-rose-500/20 transition-all">
                                Kelola SK
                            </button>
                        </div>
                    </div>

                </div>

            @endif


            {{-- ==========================================
                 2. FILTER DAN TABEL HANYA TAB PEMBERITAHUAN
                 ========================================== --}}

            @if(request('tab') == 'pemberitahuan')

                <!-- FILTER DOKUMEN -->
                <div class="rounded-3xl border border-slate-100 bg-white p-6 sm:p-7 space-y-4 w-full shadow-xl shadow-slate-200/40">

                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#0055FF] flex items-center justify-center font-bold text-base flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg sm:text-xl font-extrabold text-[#071a33]">Filter Data Dokumen</h3>
                                <p class="text-xs sm:text-sm font-semibold text-slate-400">Saring arsip berdasarkan jenis, target akun, kategori, atau nama dokumen</p>
                            </div>
                        </div>

                        <button onclick="resetFilter()" class="text-xs sm:text-sm font-extrabold text-[#0055FF] hover:underline flex items-center gap-1.5">
                            <span>Reset Filter</span>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-1 items-end">

                        <div class="space-y-1.5">
                            <label for="filterJenis" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Jenis Dokumen</label>
                            <select id="filterJenis" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] cursor-pointer shadow-sm">
                                <option value="Semua">Semua Jenis</option>
                                <option value="SK">SK (Surat Keputusan)</option>
                                <option value="Pemberitahuan">Pemberitahuan Resmi</option>
                                <option value="Surat Edaran">Surat Edaran (SE)</option>
                                <option value="Panduan">Juknis / Panduan</option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label for="filterTarget" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Target Sasaran</label>
                            <select id="filterTarget" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] cursor-pointer shadow-sm">
                                <option value="Semua">Semua Target</option>
                                <option value="Dinas & Sekolah">Dinas &amp; Sekolah</option>
                                <option value="Dinas">Dinas Pendidikan Saja</option>
                                <option value="Sekolah">Sekolah Saja</option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label for="filterKategori" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Kategori Program</label>
                            <select id="filterKategori" onchange="applyFilter()" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] cursor-pointer shadow-sm">
                                <option value="Semua">Semua Kategori</option>
                                <option value="Batas Waktu">Batas Waktu</option>
                                <option value="Aktivasi">Aktivasi Rekening</option>
                                <option value="Usulan">Usulan PIP</option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label for="searchJudul" class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider block">Cari Nama Berkas</label>
                            <input type="text" id="searchJudul" onkeyup="applyFilter()" placeholder="Ketik kata kunci..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-[#071a33] focus:outline-none focus:border-[#0055FF] shadow-sm">
                        </div>

                    </div>
                </div>

                <!-- TABEL ARSIP -->
                <div class="rounded-3xl border border-slate-100 bg-white p-6 sm:p-7 space-y-4 w-full shadow-xl shadow-slate-200/40">

                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
                        <div>
                            <h3 class="text-lg sm:text-xl font-extrabold text-[#071a33]">Daftar Arsip &amp; Berkas Terpublikasi</h3>
                            <p class="text-xs sm:text-sm font-semibold text-slate-400">Arsip dokumen terunggah yang tampil di panel Dinas dan Sekolah</p>
                        </div>

                        <div class="text-xs font-extrabold text-slate-500 bg-slate-100 px-3.5 py-2 rounded-xl">
                            Total Berkas: <span id="totalDataCount" class="text-[#0055FF] font-black">0</span> File
                        </div>
                    </div>

                    <div class="overflow-x-auto custom-scrollbar pt-1">
                        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[900px]">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 font-extrabold text-xs uppercase tracking-wider border-b border-slate-200">
                                    <th class="py-3.5 px-4 rounded-l-xl text-center w-12">No.</th>
                                    <th class="py-3.5 px-4">Tanggal Rilis</th>
                                    <th class="py-3.5 px-4">Jenis &amp; Kategori</th>
                                    <th class="py-3.5 px-4">Judul Dokumen / Informasi</th>
                                    <th class="py-3.5 px-4">Target Sasaran</th>
                                    <th class="py-3.5 px-4 text-center">Berkas Lampiran</th>
                                    <th class="py-3.5 px-4 text-center rounded-r-xl">Aksi Admin</th>
                                </tr>
                            </thead>

                            <tbody id="tableDataBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                                <!-- Data dirender melalui JavaScript -->
                            </tbody>
                        </table>
                    </div>

                </div>

            @endif


            <!-- FOOTER -->
            <div class="text-xs sm:text-sm text-slate-400 font-semibold pt-6 pb-4 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200">
                <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
                <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
            </div>

        </div>
    </div>
</main>

<!-- ==========================================
     MODAL UPDATE BERKAS / KELOLA SK
     ========================================== -->

<div id="dokumenModal" class="hidden fixed inset-0 z-[100] bg-slate-900/50 backdrop-blur-sm items-center justify-center p-4">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-6 sm:p-8">

        <div class="flex items-center justify-between mb-6">
            <div>
                <span class="text-xs font-black uppercase tracking-wider text-[#0055FF]">Manajemen Berkas</span>
                <h2 id="modalTitle" class="text-2xl font-extrabold text-[#071a33] mt-1">Kelola Dokumen</h2>
            </div>

            <button onclick="closeDokumenModal()" class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-500 text-xl font-bold">
                &times;
            </button>
        </div>

        <div class="rounded-2xl bg-blue-50 border border-blue-100 p-4 mb-5">
            <p class="text-sm font-bold text-[#0055FF]">Dokumen yang dipilih</p>
            <p id="modalDocumentName" class="text-lg font-extrabold text-[#071a33] mt-1">-</p>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-xs font-extrabold text-slate-500 uppercase tracking-wider mb-2">
                    Pilih berkas baru
                </label>

                <input type="file" id="dokumenFileInput" accept=".pdf,.doc,.docx,.xlsx,.xls" class="block w-full text-sm text-slate-600 border border-slate-200 rounded-xl p-3 bg-slate-50">
            </div>

            <p class="text-xs text-slate-400">
                Mode demo: berkas yang dipilih belum disimpan ke server. Hubungkan formulir ini dengan endpoint Laravel untuk menyimpan berkas secara permanen.
            </p>
        </div>

        <div class="flex gap-3 mt-7">
            <button onclick="closeDokumenModal()" class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-sm">
                Batal
            </button>

            <button onclick="simpanBerkasDemo()" class="flex-1 px-4 py-3 bg-[#0055FF] hover:bg-blue-700 text-white rounded-xl font-bold text-sm">
                Simpan
            </button>
        </div>

    </div>
</div>

    
<!-- JAVASCRIPT UNTUK FILTER DAN RENDER DATA -->
<script>
    // ==========================================
    // DATA MASTER DOKUMEN ADMIN
    // ==========================================

    let masterDokumenData = [
        {
            no: 1,
            tanggal: "15 Jul 2026",
            jam: "10:30 WIB",
            kategori: "Batas Waktu",
            judul: "Batas Akhir Aktivasi Rekening PIP Tahap 2 Year 2026",
            nomor: "No: 0482/J5/LP/2026",
            targetAkun: "Dinas & Sekolah",
            status: "Baru",
            jenis: "Pemberitahuan",
            file: "Sur_Edaran.pdf",
            fileType: "pdf"
        },
        {
            no: 2,
            tanggal: "10 Jul 2026",
            jam: "14:15 WIB",
            kategori: "Usulan",
            judul: "SK Nominasi Penerima PIP SMA/SMK Tahun 2026",
            nomor: "No: 1120/SK/PUSLAPDIK/2026",
            targetAkun: "Sekolah",
            status: "Dibaca",
            jenis: "SK",
            file: "SK_Nominasi.xlsx",
            fileType: "excel"
        },
        {
            no: 3,
            tanggal: "02 Apr 2026",
            jam: "09:00 WIB",
            kategori: "Batas Waktu",
            judul: "Penyesuaian mekanisme PIP Tahun 2026",
            nomor: "No: 0211/J5/LP/2026",
            targetAkun: "Sekolah",
            status: "Baru",
            jenis: "Pemberitahuan",
            file: "Juknis_Mekanisme.pdf",
            fileType: "pdf"
        },
        {
            no: 4,
            tanggal: "26 Mar 2026",
            jam: "11:20 WIB",
            kategori: "Aktivasi",
            judul: "Batas waktu konfirmasi aktivasi rekening",
            nomor: "No: 0199/J5/LP/2026",
            targetAkun: "Dinas & Sekolah",
            status: "Dibaca",
            jenis: "Pemberitahuan",
            file: "Konfirmasi_Aktivasi.pdf",
            fileType: "pdf"
        },
        {
            no: 5,
            tanggal: "17 Feb 2026",
            jam: "16:45 WIB",
            kategori: "Sistem",
            judul: "Jadwal pemeliharaan sistem SIPINTAR",
            nomor: "No: 0050/J5/IT/2026",
            targetAkun: "Dinas",
            status: "Dibaca",
            jenis: "Pemberitahuan",
            file: "Info_Maintenance.pdf",
            fileType: "pdf"
        }
    ];


    // ==========================================
    // RENDER TABEL UTAMA
    // ==========================================

    function renderTable(data) {
        const tbody = document.getElementById("tableDataBody");
        const totalCount = document.getElementById("totalDataCount");

        if (!tbody) return;

        tbody.innerHTML = "";

        if (totalCount) {
            totalCount.textContent = data.length;
        }

        if (data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="py-12 text-center text-slate-400 font-bold">
                        <i class="fa-solid fa-folder-open text-3xl mb-2 block"></i>
                        Tidak ada dokumen yang sesuai dengan kriteria filter.
                    </td>
                </tr>
            `;
            return;
        }

        data.forEach((item, index) => {
            const tr = document.createElement("tr");
            tr.className = "hover:bg-slate-50/80 transition-colors";

            const fileIcon = item.fileType === "excel"
                ? "fa-file-excel"
                : "fa-file-pdf";

            const fileBg = item.fileType === "excel"
                ? "bg-emerald-50 text-emerald-700 hover:bg-emerald-100"
                : "bg-red-50 text-red-600 hover:bg-red-100";

            let targetIcon = "fa-building-columns";

            if (item.targetAkun === "Sekolah") {
                targetIcon = "fa-school";
            }

            // Hindari karakter HTML yang tidak aman
            const safeJudul = escapeHTML(item.judul);
            const safeFile = escapeHTML(item.file);
            const safeTanggal = escapeHTML(item.tanggal);
            const safeJam = escapeHTML(item.jam || "10:00 WIB");
            const safeJenis = escapeHTML(item.jenis);
            const safeKategori = escapeHTML(item.kategori);
            const safeTarget = escapeHTML(item.targetAkun);
            const safeNomor = escapeHTML(item.nomor || "No: Official Release");

            tr.innerHTML = `
                <td class="py-4 px-4 text-center font-bold text-slate-400">
                    ${index + 1}
                </td>

                <td class="py-4 px-4">
                    <span class="block font-bold text-[#071a33]">
                        ${safeTanggal}
                    </span>
                    <span class="text-[11px] text-slate-400">
                        ${safeJam}
                    </span>
                </td>

                <td class="py-4 px-4">
                    <span class="inline-block px-2.5 py-0.5 rounded-md bg-blue-100 text-[#0055FF] text-xs font-bold mb-1">
                        ${safeJenis}
                    </span>
                    <span class="block text-xs text-slate-400 font-medium">
                        ${safeKategori}
                    </span>
                </td>

                <td class="py-4 px-4 max-w-xs truncate">
                    <span class="font-extrabold text-[#071a33] block hover:text-[#0055FF] cursor-pointer" title="${safeJudul}">
                        ${safeJudul}
                    </span>
                    <span class="text-xs text-slate-400">
                        ${safeNomor}
                    </span>
                </td>

                <td class="py-4 px-4">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-bold">
                        <i class="fa-solid ${targetIcon} text-slate-400 text-[10px]"></i>
                        ${safeTarget}
                    </span>
                </td>

                <td class="py-4 px-4 text-center">
                    <button
                        onclick="unduhBerkas('${escapeJS(item.file)}')"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 ${fileBg} text-xs font-bold rounded-lg transition-colors"
                    >
                        <i class="fa-solid ${fileIcon}"></i>
                        ${safeFile}
                    </button>
                </td>

                <td class="py-4 px-4 text-center">
                    <div class="flex items-center justify-center gap-1.5">

                        <button
                            onclick="lihatDetailDokumen(${item.no})"
                            title="Detail / Preview"
                            class="w-8 h-8 rounded-lg bg-blue-50 text-[#0055FF] hover:bg-blue-100 flex items-center justify-center transition-all"
                        >
                            <i class="fa-solid fa-eye text-xs"></i>
                        </button>

                        <button
                            onclick="deleteDocument(${item.no})"
                            title="Hapus Dokumen"
                            class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 flex items-center justify-center transition-all"
                        >
                            <i class="fa-solid fa-trash text-xs"></i>
                        </button>

                    </div>
                </td>
            `;

            tbody.appendChild(tr);
        });
    }


    // ==========================================
    // KEAMANAN TEKS HTML
    // ==========================================

    function escapeHTML(value) {
        return String(value)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function escapeJS(value) {
        return String(value)
            .replace(/\\/g, "\\\\")
            .replace(/'/g, "\\'");
    }


    // ==========================================
    // FILTER DATA
    // ==========================================

    function applyFilter() {
        const filterJenisEl = document.getElementById("filterJenis");
        const filterTargetEl = document.getElementById("filterTarget");
        const filterKategoriEl = document.getElementById("filterKategori");
        const searchJudulEl = document.getElementById("searchJudul");

        // Filter hanya tersedia pada tab Pemberitahuan
        if (!filterJenisEl || !filterTargetEl || !filterKategoriEl || !searchJudulEl) {
            return;
        }

        const filterJenis = filterJenisEl.value;
        const filterTarget = filterTargetEl.value;
        const filterKategori = filterKategoriEl.value;
        const searchJudul = searchJudulEl.value.toLowerCase();

        const filteredData = masterDokumenData.filter(item => {
            const matchJenis =
                filterJenis === "Semua" || item.jenis === filterJenis;

            const matchTarget =
                filterTarget === "Semua" || item.targetAkun.includes(filterTarget);

            const matchKategori =
                filterKategori === "Semua" || item.kategori === filterKategori;

            const matchJudul =
                item.judul.toLowerCase().includes(searchJudul);

            return matchJenis && matchTarget && matchKategori && matchJudul;
        });

        renderTable(filteredData);
    }


    // ==========================================
    // RESET FILTER
    // ==========================================

    function resetFilter() {
        const jenis = document.getElementById("filterJenis");
        const target = document.getElementById("filterTarget");
        const kategori = document.getElementById("filterKategori");
        const judul = document.getElementById("searchJudul");

        if (jenis) jenis.value = "Semua";
        if (target) target.value = "Semua";
        if (kategori) kategori.value = "Semua";
        if (judul) judul.value = "";

        applyFilter();
    }


    // ==========================================
    // HAPUS DOKUMEN
    // ==========================================

    function deleteDocument(id) {
        if (confirm("Apakah Anda yakin ingin menghapus arsip dokumen ini?")) {
            masterDokumenData = masterDokumenData.filter(item => item.no !== id);
            applyFilter();
            alert("Dokumen berhasil dihapus dari daftar.");
        }
    }


    // ==========================================
    // DETAIL DOKUMEN
    // ==========================================

    function lihatDetailDokumen(id) {
        const item = masterDokumenData.find(item => item.no === id);

        if (!item) {
            alert("Dokumen tidak ditemukan.");
            return;
        }

        alert(
            "DETAIL DOKUMEN\n\n" +
            "Judul: " + item.judul + "\n" +
            "Jenis: " + item.jenis + "\n" +
            "Kategori: " + item.kategori + "\n" +
            "Target: " + item.targetAkun + "\n" +
            "Berkas: " + item.file
        );
    }


    // ==========================================
    // UNDUH BERKAS
    // ==========================================
    // Catatan: Jika URL file asli sudah tersedia,
    // ganti isi fungsi ini dengan URL file tersebut.

    function unduhBerkas(namaBerkas) {
        const namaFile = String(namaBerkas);

        // Cari dokumen dalam data arsip
        const dokumen = masterDokumenData.find(
            item => item.file === namaFile
        );

        // Jika dokumen memiliki URL asli, arahkan ke URL tersebut
        if (dokumen && dokumen.url) {
            const link = document.createElement("a");
            link.href = dokumen.url;
            link.target = "_blank";
            link.rel = "noopener";
            link.click();
            return;
        }

        // Demo download jika file asli belum tersedia
        const isiFile =
            "DOKUMEN DATA PIP\n\n" +
            "Nama Berkas: " + namaFile + "\n" +
            "SIPINTAR - Sistem Informasi Program Indonesia Pintar\n\n" +
            "Ini adalah file demo.\n" +
            "Silakan hubungkan dengan URL file asli.";

        const blob = new Blob([isiFile], {
            type: "text/plain;charset=utf-8"
        });

        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");

        link.href = url;
        link.download = namaFile.replace(/\.[^/.]+$/, "") + "_Demo.txt";

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        URL.revokeObjectURL(url);

        alert("Berkas " + namaFile + " berhasil diunduh dalam mode demo.");
    }


    // ==========================================
    // MODAL PEMBERITAHUAN BARU
    // ==========================================

    function openModalPemberitahuan() {
        const modal = document.getElementById("modalPemberitahuan");

        if (!modal) {
            alert("Modal pemberitahuan belum tersedia di halaman.");
            return;
        }

        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    function closeModalPemberitahuan() {
        const modal = document.getElementById("modalPemberitahuan");

        if (!modal) return;

        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }


    // ==========================================
    // SUBMIT PEMBERITAHUAN BARU
    // ==========================================

    function handleFormSubmit(e) {
        e.preventDefault();

        const judul = document.getElementById("inputJudul").value;
        const jenis = document.getElementById("inputJenis").value;
        const kategori = document.getElementById("inputKategori").value;
        const targetAkun = document.getElementById("inputTarget").value;
        const fileInput = document.getElementById("inputFile");

        const fileName = fileInput.files[0]
            ? fileInput.files[0].name
            : "Dokumen_Lampiran.pdf";

        const newItem = {
            no: Date.now(),
            tanggal: "Hari Ini",
            jam: "Baru saja",
            kategori: kategori,
            judul: judul,
            nomor: "No: " + Math.floor(1000 + Math.random() * 9000) + "/J5/LP/2026",
            targetAkun: targetAkun,
            status: "Baru",
            jenis: jenis,
            file: fileName,
            fileType: fileName.endsWith(".xlsx") ? "excel" : "pdf"
        };

        masterDokumenData.unshift(newItem);

        closeModalPemberitahuan();
        applyFilter();

        alert("Pemberitahuan & dokumen baru berhasil diterbitkan!");
    }


    // ==========================================
// MODAL UPDATE FORMAT DOKUMEN
// ==========================================

let activeFormatTarget = "";

// ==========================================
// BUKA MODAL UPDATE FORMAT
// ==========================================
function openModalUpdateFormat(name) {

    activeFormatTarget = name;

    // Buat modal otomatis jika belum ada
    if (!document.getElementById("modalUpdateFormat")) {
        buatModalUpdateFormat();
    }

    const modal = document.getElementById("modalUpdateFormat");
    const modalTitle = document.getElementById("modalFormatTitle");
    const modalName = document.getElementById("modalFormatName");
    const fileInput = document.getElementById("inputFormatFile");
    const fileInfo = document.getElementById("formatFileInfo");

    if (modalTitle) {
        modalTitle.textContent = "Update " + name;
    }

    if (modalName) {
        modalName.textContent = name;
    }

    // Reset input setiap modal dibuka
    if (fileInput) {
        fileInput.value = "";
    }

    if (fileInfo) {
        fileInfo.innerHTML = `
            <div class="flex items-center gap-2 text-slate-400">
                <i class="fa-solid fa-file-arrow-up"></i>
                <span>Belum ada berkas dipilih</span>
            </div>
        `;
    }

    modal.classList.remove("hidden");
    modal.classList.add("flex");
}


// ==========================================
// BUAT MODAL UPDATE FORMAT OTOMATIS
// ==========================================
function buatModalUpdateFormat() {

    if (document.getElementById("modalUpdateFormat")) {
        return;
    }

    const modalHTML = `
        <div
            id="modalUpdateFormat"
            class="hidden fixed inset-0 z-[110] bg-slate-900/60 backdrop-blur-sm items-center justify-center p-4"
        >

            <div
                class="bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden"
                onclick="event.stopPropagation()"
            >

                <!-- HEADER -->
                <div class="px-6 sm:px-8 pt-6 sm:pt-7">

                    <div class="flex items-start justify-between gap-4">

                        <div>

                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase tracking-wider"
                            >
                                <i class="fa-solid fa-file-pen"></i>
                                Update Format
                            </span>

                            <h2
                                id="modalFormatTitle"
                                class="text-2xl font-extrabold text-[#071a33] mt-3"
                            >
                                Update Format
                            </h2>

                            <p class="text-sm font-semibold text-slate-400 mt-1">
                                Perbarui berkas format dokumen yang sedang aktif.
                            </p>

                        </div>

                        <button
                            type="button"
                            onclick="closeModalUpdateFormat()"
                            class="w-10 h-10 flex-shrink-0 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-500 hover:text-slate-700 text-xl font-bold transition-all"
                        >
                            &times;
                        </button>

                    </div>

                </div>


                <!-- FORM -->
                <form
                    id="formUpdateFormat"
                    onsubmit="handleFormatSubmit(event)"
                    class="px-6 sm:px-8 pb-7 pt-6"
                >

                    <!-- FORMAT YANG DIPILIH -->
                    <div class="rounded-2xl bg-blue-50 border border-blue-100 p-4 mb-5">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-11 h-11 rounded-xl bg-white text-[#0055FF] flex items-center justify-center shadow-sm"
                            >
                                <i class="fa-solid fa-file-lines"></i>
                            </div>

                            <div>

                                <p class="text-[10px] font-black uppercase tracking-wider text-[#0055FF]">
                                    Format yang diperbarui
                                </p>

                                <p
                                    id="modalFormatName"
                                    class="text-base font-extrabold text-[#071a33] mt-0.5"
                                >
                                    -
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- PILIH FILE -->
                    <div>

                        <label
                            for="inputFormatFile"
                            class="block text-xs font-extrabold text-slate-500 uppercase tracking-wider mb-2"
                        >
                            Pilih Berkas Baru
                        </label>

                        <label
                            for="inputFormatFile"
                            class="group block cursor-pointer"
                        >

                            <div
                                class="border-2 border-dashed border-slate-200 hover:border-[#0055FF] rounded-2xl p-6 text-center bg-slate-50 hover:bg-blue-50/40 transition-all"
                            >

                                <div
                                    class="w-14 h-14 mx-auto rounded-2xl bg-white text-[#0055FF] flex items-center justify-center shadow-sm mb-3 group-hover:scale-105 transition-transform"
                                >
                                    <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                </div>

                                <p class="text-sm font-extrabold text-slate-700">
                                    Klik untuk memilih berkas
                                </p>

                                <p class="text-xs font-semibold text-slate-400 mt-1">
                                    PDF, DOC, DOCX, XLS, atau XLSX
                                </p>

                                <p class="text-[11px] font-semibold text-slate-400 mt-1">
                                    Maksimal 10 MB
                                </p>

                                <input
                                    type="file"
                                    id="inputFormatFile"
                                    accept=".pdf,.doc,.docx,.xlsx,.xls"
                                    class="hidden"
                                    onchange="previewFormatFile(this)"
                                >

                            </div>

                        </label>

                    </div>


                    <!-- INFORMASI FILE -->
                    <div
                        id="formatFileInfo"
                        class="mt-4 rounded-xl bg-slate-50 border border-slate-100 p-3 text-xs font-bold"
                    >

                        <div class="flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-file-arrow-up"></i>
                            <span>Belum ada berkas dipilih</span>
                        </div>

                    </div>


                    <!-- INFO -->
                    <div
                        class="mt-4 rounded-xl bg-amber-50 border border-amber-100 p-3.5"
                    >

                        <div class="flex items-start gap-2.5">

                            <i class="fa-solid fa-circle-info text-amber-500 mt-0.5"></i>

                            <p class="text-xs leading-relaxed font-semibold text-amber-700">
                                Setelah disimpan, versi aktif akan diperbarui berdasarkan
                                tanggal update.
                                <span class="font-black">
                                    Mode demo belum menyimpan file secara permanen ke server.
                                </span>
                            </p>

                        </div>

                    </div>


                    <!-- BUTTON -->
                    <div class="flex gap-3 mt-6">

                        <button
                            type="button"
                            onclick="closeModalUpdateFormat()"
                            class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-sm transition-all"
                        >
                            Batal
                        </button>

                        <button
                            type="submit"
                            class="flex-1 px-4 py-3 bg-[#0055FF] hover:bg-blue-700 text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-500/20 transition-all"
                        >
                            <i class="fa-solid fa-floppy-disk mr-1.5"></i>
                            Simpan Update
                        </button>

                    </div>

                </form>

            </div>

        </div>
    `;

    document.body.insertAdjacentHTML("beforeend", modalHTML);

    const modal = document.getElementById("modalUpdateFormat");

    // Klik area luar modal untuk menutup
    modal.addEventListener("click", function(e) {

        if (e.target === modal) {
            closeModalUpdateFormat();
        }

    });
}


// ==========================================
// PREVIEW FILE YANG DIPILIH
// ==========================================
function previewFormatFile(input) {

    const fileInfo = document.getElementById("formatFileInfo");

    if (!fileInfo) {
        return;
    }

    if (!input.files || input.files.length === 0) {

        fileInfo.innerHTML = `
            <div class="flex items-center gap-2 text-slate-400">
                <i class="fa-solid fa-file-arrow-up"></i>
                <span>Belum ada berkas dipilih</span>
            </div>
        `;

        return;
    }

    const file = input.files[0];

    // Maksimal 10 MB
    const maxSize = 10 * 1024 * 1024;

    if (file.size > maxSize) {

        alert("Ukuran berkas terlalu besar. Maksimal 10 MB.");

        input.value = "";

        fileInfo.innerHTML = `
            <div class="flex items-center gap-2 text-rose-500">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>Ukuran berkas melebihi 10 MB</span>
            </div>
        `;

        return;
    }

    const extension = file.name
        .split(".")
        .pop()
        .toLowerCase();

    let icon = "fa-file";

    if (extension === "pdf") {
        icon = "fa-file-pdf";
    }

    if (extension === "doc" || extension === "docx") {
        icon = "fa-file-word";
    }

    if (extension === "xls" || extension === "xlsx") {
        icon = "fa-file-excel";
    }

    fileInfo.innerHTML = `
        <div class="flex items-center justify-between gap-3">

            <div class="flex items-center gap-3 min-w-0">

                <div
                    class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-[#0055FF] shadow-sm flex-shrink-0"
                >
                    <i class="fa-solid ${icon}"></i>
                </div>

                <div class="min-w-0">

                    <p class="text-sm font-extrabold text-slate-700 truncate">
                        ${escapeHTML(file.name)}
                    </p>

                    <p class="text-[11px] font-semibold text-slate-400 mt-0.5">
                        ${formatFileSize(file.size)} · ${extension.toUpperCase()}
                    </p>

                </div>

            </div>

            <i class="fa-solid fa-circle-check text-emerald-500 flex-shrink-0"></i>

        </div>
    `;
}


// ==========================================
// FORMAT UKURAN FILE
// ==========================================
function formatFileSize(bytes) {

    if (bytes === 0) {
        return "0 Byte";
    }

    const units = [
        "Byte",
        "KB",
        "MB",
        "GB"
    ];

    const index = Math.floor(
        Math.log(bytes) / Math.log(1024)
    );

    return (
        parseFloat(
            (bytes / Math.pow(1024, index)).toFixed(1)
        ) +
        " " +
        units[index]
    );
}


// ==========================================
// SIMPAN / UPDATE FORMAT
// ==========================================
function handleFormatSubmit(e) {

    e.preventDefault();

    const fileInput =
        document.getElementById("inputFormatFile");

    // Tidak ada file
    if (!fileInput || fileInput.files.length === 0) {

        alert(
            "Silakan pilih berkas " +
            activeFormatTarget +
            " terlebih dahulu."
        );

        return;
    }

    const file = fileInput.files[0];

    // Maksimal 10 MB
    const maxSize = 10 * 1024 * 1024;

    if (file.size > maxSize) {

        alert("Ukuran berkas terlalu besar. Maksimal 10 MB.");

        return;
    }

    // Validasi ekstensi
    const allowedExtensions = [
        "pdf",
        "doc",
        "docx",
        "xls",
        "xlsx"
    ];

    const extension = file.name
        .split(".")
        .pop()
        .toLowerCase();

    if (!allowedExtensions.includes(extension)) {

        alert(
            "Format file tidak didukung.\n\n" +
            "Gunakan PDF, DOC, DOCX, XLS, atau XLSX."
        );

        return;
    }


    // ==========================================
    // TANGGAL UPDATE
    // ==========================================

    const today = new Date().toLocaleDateString(
        "id-ID",
        {
            day: "2-digit",
            month: "short",
            year: "numeric"
        }
    );

    const versionText =
        "Versi Aktif: " + today;


    // ==========================================
    // CARI CARD FORMAT YANG DIPILIH
    // ==========================================

    let targetButton = null;

    if (activeFormatTarget === "Format Usulan") {

        targetButton = document.querySelector(
            'button[onclick="openModalUpdateFormat(\'Format Usulan\')"]'
        );

    } else if (activeFormatTarget === "Format Pengembalian") {

        targetButton = document.querySelector(
            'button[onclick="openModalUpdateFormat(\'Format Pengembalian\')"]'
        );

    }


    // ==========================================
    // UPDATE TANGGAL VERSI AKTIF
    // ==========================================

    if (targetButton) {

        const card =
            targetButton.closest(".min-h-\\[190px\\]");

        if (card) {

            const versionElement =
                card.querySelector(
                    "p.text-sm.font-semibold.text-slate-400.mt-1"
                );

            if (versionElement) {

                versionElement.textContent =
                    versionText;

            }
        }
    }


    // ==========================================
    // TUTUP MODAL
    // ==========================================

    closeModalUpdateFormat();


    // ==========================================
    // NOTIFIKASI BERHASIL
    // ==========================================

    alert(
        "Format berkas berhasil diperbarui!\n\n" +
        "Format: " + activeFormatTarget + "\n" +
        "Nama File: " + file.name + "\n" +
        "Ukuran: " + formatFileSize(file.size) + "\n" +
        "Tanggal Update: " + today + "\n\n" +
        "Mode demo: file belum disimpan permanen ke server."
    );


    // Reset input
    fileInput.value = "";
}


// ==========================================
// TUTUP MODAL UPDATE FORMAT
// ==========================================
function closeModalUpdateFormat() {

    const modal =
        document.getElementById("modalUpdateFormat");

    if (!modal) {
        return;
    }

    modal.classList.add("hidden");
    modal.classList.remove("flex");
}


// ==========================================
// ESC UNTUK MENUTUP MODAL
// ==========================================
document.addEventListener("keydown", function(e) {

    if (e.key === "Escape") {

        const modal =
            document.getElementById("modalUpdateFormat");

        if (modal && !modal.classList.contains("hidden")) {
            closeModalUpdateFormat();
        }

    }

});


    // ==========================================
    // KELOLA SK
    // ==========================================

    let activeSKTarget = "";

    function kelolaSK(namaSK) {
        activeSKTarget = namaSK;

        const modal = document.getElementById("modalKelolaSK");

        // Jika modal belum ada, buat otomatis
        if (!modal) {
            buatModalKelolaSK();
        }

        const modalSK = document.getElementById("modalKelolaSK");
        const title = document.getElementById("modalSKTitle");
        const nama = document.getElementById("modalSKName");
        const fileInput = document.getElementById("inputSKFile");

        if (title) {
            title.textContent = "Kelola " + namaSK;
        }

        if (nama) {
            nama.textContent = namaSK;
        }

        if (fileInput) {
            fileInput.value = "";
        }

        modalSK.classList.remove("hidden");
        modalSK.classList.add("flex");
    }


    // ==========================================
    // BUAT MODAL KELOLA SK OTOMATIS
    // ==========================================

    function buatModalKelolaSK() {
        if (document.getElementById("modalKelolaSK")) return;

        const modalHTML = `
            <div
                id="modalKelolaSK"
                class="hidden fixed inset-0 z-[100] bg-slate-900/50 backdrop-blur-sm items-center justify-center p-4"
            >
                <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-6 sm:p-8">

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-[#0055FF]">
                                Manajemen SK
                            </span>
                            <h2 id="modalSKTitle" class="text-2xl font-extrabold text-[#071a33] mt-1">
                                Kelola SK
                            </h2>
                        </div>

                        <button
                            onclick="closeModalKelolaSK()"
                            class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-500 text-xl font-bold"
                        >
                            &times;
                        </button>
                    </div>

                    <div class="rounded-2xl bg-blue-50 border border-blue-100 p-4 mb-5">
                        <p class="text-sm font-bold text-[#0055FF]">
                            Dokumen yang dipilih
                        </p>
                        <p id="modalSKName" class="text-lg font-extrabold text-[#071a33] mt-1">
                            -
                        </p>
                    </div>

                    <div class="space-y-4">

                        <div>
                            <label class="block text-xs font-extrabold text-slate-500 uppercase tracking-wider mb-2">
                                Pilih berkas SK
                            </label>

                            <input
                                type="file"
                                id="inputSKFile"
                                accept=".pdf,.doc,.docx,.xlsx,.xls"
                                class="block w-full text-sm text-slate-600 border border-slate-200 rounded-xl p-3 bg-slate-50"
                            />
                        </div>

                        <p class="text-xs text-slate-400">
                            Mode demo: berkas yang dipilih belum disimpan ke server.
                        </p>

                    </div>

                    <div class="flex gap-3 mt-7">

                        <button
                            onclick="closeModalKelolaSK()"
                            class="flex-1 px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-sm"
                        >
                            Batal
                        </button>

                        <button
                            onclick="simpanSKDemo()"
                            class="flex-1 px-4 py-3 bg-[#0055FF] hover:bg-blue-700 text-white rounded-xl font-bold text-sm"
                        >
                            Simpan SK
                        </button>

                    </div>

                </div>
            </div>
        `;

        document.body.insertAdjacentHTML("beforeend", modalHTML);
    }


    // ==========================================
    // TUTUP MODAL KELOLA SK
    // ==========================================

    function closeModalKelolaSK() {
        const modal = document.getElementById("modalKelolaSK");

        if (!modal) return;

        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }


    // ==========================================
    // SIMPAN SK DEMO
    // ==========================================

    function simpanSKDemo() {
        const fileInput = document.getElementById("inputSKFile");

        if (!fileInput || fileInput.files.length === 0) {
            alert("Silakan pilih berkas SK terlebih dahulu.");
            return;
        }

        const file = fileInput.files[0];

        alert(
            "Berkas " + activeSKTarget + " berhasil dipilih!\n\n" +
            "Nama File: " + file.name + "\n" +
            "Ukuran: " + (file.size / 1024).toFixed(1) + " KB\n\n" +
            "Mode demo: berkas belum disimpan ke server."
        );

        closeModalKelolaSK();
    }


    // ==========================================
    // INISIALISASI
    // ==========================================

    document.addEventListener("DOMContentLoaded", () => {
        // Tabel akan dirender jika tersedia di halaman
        if (document.getElementById("tableDataBody")) {
            renderTable(masterDokumenData);
        }
    });

</script>
</body>
</html>