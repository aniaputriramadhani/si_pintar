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
                #3b82f6,          /* Biru pas / tidak pekat */
                #3b82f6 6px,
                #bfdbfe 6px,      /* Biru muda es soft */
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
   class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all {{ request()->routeIs('admin.pemantauan*') ? 'bg-[#0055FF] text-white shadow-md shadow-blue-500/20' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900' }}" {{ request()->routeIs('admin.pemantauan*') ? 'aria-current="page"' : '' }}>
    <svg class="h-7 w-7 flex-shrink-0 {{ request()->routeIs('admin.pemantauan*') ? 'text-white' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
    </svg>
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
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl">Pemantauan Aktivasi Rekening</h1>
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

            <!-- Main Body Content -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- ================= 4 KARTU RINGKASAN STATUS ================= -->
<section class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
    <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
        <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Belum Input</p>
        <p class="mt-2 text-4xl font-black text-[#071a33]">62</p>
        <p class="mt-1 text-xs font-bold text-amber-600">Sekolah</p>
    </article>
    <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
        <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Input Sebagian</p>
        <p class="mt-2 text-4xl font-black text-[#071a33]">73</p>
        <p class="mt-1 text-xs font-bold text-blue-600">Sekolah</p>
    </article>
    <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
        <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Sudah Input</p>
        <p class="mt-2 text-4xl font-black text-[#071a33]">276</p>
        <p class="mt-1 text-xs font-bold text-emerald-600">Sudah Input Seluruh Siswa</p>
    </article>
    <article class="rounded-[2rem] bg-white border-2 border-slate-200 p-6 shadow-xl shadow-slate-200/50">
        <p class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Kendala Aktivasi</p>
        <p class="mt-2 text-4xl font-black text-rose-600">45</p>
        <p class="mt-1 text-xs font-bold text-rose-500">Siswa (Kendala Lapangan)</p>
    </article>
</section>

<!-- ================= SECTION FILTER PEMANTAUAN ================= -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 mb-8">
    <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-black text-[#071a33]">Filter Pemantauan</h3>
                <p class="text-xs font-bold text-slate-500">Filter berdasarkan Tahun, Jenjang, Kategori SK, Wilayah, dan NISN/Nama Sekolah</p>
            </div>
        </div>
        <button type="button" onclick="resetFilterPemantauan()" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#0055FF] hover:text-blue-800 transition">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            Reset Filter
        </button>
    </div>

    <!-- Form Filter Grid Layout (Urutan: Tahun, Jenjang, Kategori SK, Wilayah, Insert NISN/Nama Sekolah) -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 items-end">
        
        <!-- Filter Tahun -->
        <div>
            <label for="filterTahun" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Tahun</label>
            <select id="filterTahun" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Tahun</option>
                <option value="2026">2026</option>
                <option value="2024">2024</option>
            </select>
        </div>

        <!-- Filter Jenjang -->
        <div>
            <label for="filterJenjang" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Jenjang</label>
            <select id="filterJenjang" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Jenjang</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
            </select>
        </div>

        <!-- Filter Kategori SK -->
        <div>
            <label for="filterKategoriSk" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Kategori SK</label>
            <select id="filterKategoriSk" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Kategori</option>
                <option value="SK Pemberian">SK Pemberian</option>
                <option value="SK Nominasi">SK Nominasi</option>
            </select>
        </div>

        <!-- Filter Wilayah (Hanya 1 Dropdown Tunggal) -->
        <div>
            <label for="filterWilayah" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Wilayah</label>
            <select id="filterWilayah" class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3 py-2.5 text-xs font-bold text-[#071a33] focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="Semua" selected>Semua Wilayah</option>
                <option value="Aceh > Kabupaten Aceh Besar > Darul Imarah">Aceh &gt; Kab. Aceh Besar &gt; Darul Imarah</option>
                <option value="Aceh > Kabupaten Aceh Besar > Ingin Jaya">Aceh &gt; Kab. Aceh Besar &gt; Ingin Jaya</option>
                <option value="Banten > Kabupaten Tangerang > Rajeg">Banten &gt; Kab. Tangerang &gt; Rajeg</option>
            </select>
        </div>

        <!-- Insert NISN / Nama Sekolah -->
        <div>
            <label for="filterSearch" class="block text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-2">Insert NISN / Nama Sekolah</label>
            <input type="text" id="filterSearch" placeholder="Cth: 1452921965..." class="w-full rounded-2xl border-2 border-slate-300 bg-white px-3 py-2.5 text-xs font-bold text-[#071a33] placeholder:text-slate-400 focus:border-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all">
        </div>

    </div>

    <!-- Tombol Aksi Filter & Reset di Bawah -->
    <div class="mt-4 flex justify-end gap-3 pt-4 border-t border-slate-100">
        <button type="button" onclick="applyFilterPemantauan()" class="rounded-2xl bg-[#0055FF] px-6 py-2.5 text-xs font-extrabold text-white transition hover:bg-blue-700 shadow-md shadow-blue-600/20 flex items-center gap-2">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Terapkan Filter
        </button>
    </div>
</section>

<!-- ================= CARD TABEL DATA PEMANTAUAN ================= -->
<section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-4">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-black text-[#071a33]">Pemantauan Aktivasi Rekening</h3>
                <p class="text-xs font-bold text-slate-500">Menampilkan status input, kendala aktivasi, serta konfirmasi per siswa dan sekolah</p>
            </div>
        </div>

        <span class="px-4 py-2 rounded-xl bg-blue-50 text-[#0055FF] text-xs font-black border border-blue-100">
            Total Data: <span id="totalDataCount">0</span> Siswa
        </span>

    </div>

    <!-- TABEL UTAMA -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap min-w-[1100px]">
            <thead>
                <tr class="border-b-2 border-slate-200 bg-slate-50/80 text-slate-700">
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider rounded-l-xl">Nama Siswa / NISN</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Nama Sekolah</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Provinsi</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Kabupaten/Kota</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Kecamatan</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider">Kategori Kendala</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Input Data</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center">Sudah Konfirmasi</th>
                    <th class="py-4 px-4 font-black text-xs uppercase tracking-wider text-center rounded-r-xl">Aksi</th>
                </tr>
            </thead>
            <tbody id="tablePemantauanBody" class="divide-y divide-slate-100 text-sm font-semibold text-slate-800">
                <!-- Rendered dynamically by JavaScript -->
            </tbody>
        </table>
    </div>
</section>

<!-- FOOTER -->
<div class="text-sm font-bold text-slate-400 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2 border-t border-slate-200/60 mt-8">
    <span>© 2020–{{ date('Y') }} Puslapdik · Kemendikdasmen RI</span>
    <span>SIPINTAR - Sistem Informasi Program Indonesia Pintar</span>
</div>

<!-- ================= MODAL POPUP DETAIL PEMANTAUAN ================= -->
<div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm hidden transition-all duration-300">
    <div class="relative w-full max-w-2xl rounded-[2.5rem] bg-white border-2 border-slate-200 shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300" id="modalContainer">
        <!-- Modal Header -->
        <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5 bg-slate-50/80">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <h3 class="text-lg font-black text-[#071a33]">Detail Pemantauan Aktivasi Rekening</h3>
                    <p class="text-xs font-bold text-slate-500">Informasi lengkap status siswa dan sekolah penerima PIP</p>
                </div>
            </div>
            <button type="button" onclick="closeDetailModal()" class="grid h-9 w-9 place-items-center rounded-xl bg-slate-200 text-slate-700 hover:bg-slate-300 font-bold transition">✕</button>
        </div>

        <!-- Modal Body Content -->
        <div class="p-6 sm:p-8 space-y-6 max-h-[70vh] overflow-y-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Nama Siswa</span>
                    <p id="modalNamaSiswa" class="text-base font-extrabold text-[#071a33] mt-1">-</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">NISN</span>
                    <p id="modalNisn" class="text-base font-mono font-bold text-[#0055FF] mt-1">-</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Satuan Pendidikan (Sekolah)</span>
                    <p id="modalSekolah" class="text-base font-extrabold text-[#071a33] mt-1">-</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Jenjang & Kategori SK</span>
                    <p id="modalSkInfo" class="text-base font-extrabold text-[#071a33] mt-1">-</p>
                </div>
            </div>

            <div class="rounded-2xl bg-blue-50/50 p-4 border border-blue-100">
                <span class="text-xs font-extrabold uppercase tracking-wider text-blue-600">Wilayah Penempatan</span>
                <p id="modalWilayah" class="text-sm font-bold text-[#071a33] mt-1">-</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Status Input Data</span>
                    <div id="modalInputStatus" class="mt-2">-</div>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Kategori Kendala Lapangan</span>
                    <p id="modalKendala" class="text-sm font-bold text-rose-600 mt-2">-</p>
                </div>
            </div>

            <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100 flex items-center justify-between">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Konfirmasi Admin/Sekolah</span>
                    <p class="text-xs font-bold text-slate-600 mt-0.5">Status verifikasi kelayakan aktivasi rekening</p>
                </div>
                <div id="modalKonfirmasi">-</div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="flex items-center justify-end gap-3 border-t border-slate-100 px-6 py-4 bg-slate-50/80">
            <button type="button" onclick="closeDetailModal()" class="rounded-2xl bg-slate-200 px-5 py-2.5 text-xs font-extrabold text-slate-700 hover:bg-slate-300 transition">Tutup</button>
            <button type="button" onclick="alert('Data berhasil disimpan/diperbarui.'); closeDetailModal();" class="rounded-2xl bg-[#0055FF] px-6 py-2.5 text-xs font-extrabold text-white hover:bg-blue-700 shadow-md shadow-blue-600/20 transition">Simpan / Tindak Lanjut</button>
        </div>
    </div>
</div>

<script>
    // DATA PEMANTAUAN SISWA
    const masterPemantauanData = [
        { namaSiswa: "Teguh Marpaung", nisn: "1452921965", sekolah: "SMAN 5 Darul Imarah", jenjang: "SMA", kategoriSk: "SK Pemberian", tahun: "2024", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Eko Gunawan", nisn: "4348747928", sekolah: "SMAN 5 Darul Imarah", jenjang: "SMA", kategoriSk: "SK Pemberian", tahun: "2024", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Oki Ramadhan", nisn: "5812417264", sekolah: "SMAN 5 Darul Imarah", jenjang: "SMA", kategoriSk: "SK Pemberian", tahun: "2024", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "Pemenuhan Berkas Aktivasi", inputData: "Belum Input Siswa", konfirmasi: "Belum" },
        { namaSiswa: "Krisna Nugroho", nisn: "7570289461", sekolah: "SMAN 5 Darul Imarah", jenjang: "SMA", kategoriSk: "SK Pemberian", tahun: "2024", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "Geografis", inputData: "Input Sebagian Siswa", konfirmasi: "Belum" },
        { namaSiswa: "Kirana Permata", nisn: "4481532743", sekolah: "SMAN 5 Darul Imarah", jenjang: "SMA", kategoriSk: "SK Pemberian", tahun: "2024", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Hafiz Wijaya", nisn: "3234926454", sekolah: "SMAN 5 Darul Imarah", jenjang: "SMA", kategoriSk: "SK Pemberian", tahun: "2024", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Ferry Nasution", nisn: "8212737967", sekolah: "SMKN 3 Darul Imarah", jenjang: "SMK", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "Layanan Bank", inputData: "Input Sebagian Siswa", konfirmasi: "Belum" },
        { namaSiswa: "Bayu Ramadhan", nisn: "8353033907", sekolah: "SMKN 3 Darul Imarah", jenjang: "SMK", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "Dinas Pendidikan", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Belum" },
        { namaSiswa: "Galih Ramadhan", nisn: "5104255361", sekolah: "SMKN 3 Darul Imarah", jenjang: "SMK", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "Geografis", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Belum" },
        { namaSiswa: "Eko Saputra", nisn: "5539270823", sekolah: "SMKN 3 Darul Imarah", jenjang: "SMK", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "Satuan Pendidikan", inputData: "Input Sebagian Siswa", konfirmasi: "Belum" },
        { namaSiswa: "Anisa Lestari", nisn: "6200449183", sekolah: "SMKN 3 Darul Imarah", jenjang: "SMK", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Maya Nasution", nisn: "6343274655", sekolah: "SMPN 1 Darul Imarah", jenjang: "SMP", kategoriSk: "SK Nominasi", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "Satuan Pendidikan", inputData: "Input Sebagian Siswa", konfirmasi: "Belum" },
        { namaSiswa: "Ilham Safitri", nisn: "5410253324", sekolah: "SMPN 1 Darul Imarah", jenjang: "SMP", kategoriSk: "SK Nominasi", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Darul Imarah", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Bunga Lestari", nisn: "5206681331", sekolah: "SDN 3 Ingin Jaya", jenjang: "SD", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Ingin Jaya", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Ferry Hartono", nisn: "1372547626", sekolah: "SDN 3 Ingin Jaya", jenjang: "SD", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Ingin Jaya", kendala: "-", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Ya" },
        { namaSiswa: "Anisa Kurniawan", nisn: "3170407497", sekolah: "SDN 3 Ingin Jaya", jenjang: "SD", kategoriSk: "SK Pemberian", tahun: "2026", provinsi: "Aceh", kabupaten: "Kabupaten Aceh Besar", kecamatan: "Ingin Jaya", kendala: "Dinas Pendidikan", inputData: "Sudah Input Seluruh Siswa", konfirmasi: "Belum" }
    ];

    function renderPemantauanTable(data) {
        const tbody = document.getElementById('tablePemantauanBody');
        const totalCountSpan = document.getElementById('totalDataCount');
        tbody.innerHTML = '';
        totalCountSpan.innerText = data.length;

        if (data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center py-8 text-slate-400 font-bold text-sm">
                        Tidak ada data pemantauan yang cocok dengan filter wilayah/pencarian.
                    </td>
                </tr>
            `;
            return;
        }

        data.forEach(item => {
            const tr = document.createElement('tr');

            let rowBgClass = 'hover:bg-slate-100 transition-all border-b-2 border-slate-200';
            let textNamaClass = 'text-[#071a33] font-bold';
            let textSubClass = 'text-slate-700 font-semibold';

            if (item.inputData === 'Sudah Input Seluruh Siswa') {
                rowBgClass = 'bg-emerald-100 hover:bg-emerald-200 border-b-2 border-emerald-300 transition-all';
                textNamaClass = 'text-emerald-950 font-black';
                textSubClass = 'text-emerald-900 font-bold';
            } else if (item.inputData === 'Input Sebagian Siswa') {
                rowBgClass = 'bg-blue-100 hover:bg-blue-200 border-b-2 border-blue-300 transition-all';
                textNamaClass = 'text-blue-950 font-black';
                textSubClass = 'text-blue-900 font-bold';
            } else if (item.inputData === 'Belum Input Siswa') {
                rowBgClass = 'bg-rose-100 hover:bg-rose-200 border-b-2 border-rose-300 transition-all';
                textNamaClass = 'text-rose-950 font-black';
                textSubClass = 'text-rose-900 font-bold';
            }

            tr.className = rowBgClass;

            let badgeStatus = '';
            let actionButton = '';

            if (item.inputData === 'Sudah Input Seluruh Siswa') {
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-emerald-200 text-emerald-900 border border-emerald-400 text-xs font-black">Sudah Input Seluruh Siswa</span>`;
                actionButton = `<button onclick="detailPemantauan('${item.nisn}')" class="text-[#0055FF] hover:text-blue-900 font-black text-sm transition underline">Lihat Detail</button>`;
            } else if (item.inputData === 'Input Sebagian Siswa') {
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-blue-200 text-blue-900 border border-blue-400 text-xs font-black">Input Sebagian Siswa</span>`;
                actionButton = `<button onclick="detailPemantauan('${item.nisn}')" class="text-[#0055FF] hover:text-blue-900 font-black text-sm transition underline">Lihat Detail</button>`;
            } else {
                badgeStatus = `<span class="px-3.5 py-1 rounded-full bg-rose-200 text-rose-900 border border-rose-400 text-xs font-black">Belum Input Siswa</span>`;
                actionButton = `<button onclick="detailPemantauan('${item.nisn}')" class="text-rose-800 hover:text-rose-950 font-black text-sm transition underline">Tindak Lanjut</button>`;
            }

            let badgeKonfirmasi = item.konfirmasi === 'Ya' 
                ? `<span class="px-3 py-1 rounded-full bg-emerald-500 text-white text-xs font-black">Ya</span>`
                : `<span class="px-3 py-1 rounded-full bg-rose-500 text-white text-xs font-black">Belum</span>`;

            tr.innerHTML = `
                <td class="p-4 ${textNamaClass}">
                    <div>${item.namaSiswa}</div>
                    <div class="text-xs font-mono font-medium text-slate-500">${item.nisn}</div>
                </td>
                <td class="p-4 ${textSubClass}">
                    <div>${item.sekolah}</div>
                    <span class="inline-block mt-1 px-2 py-0.5 rounded bg-slate-200 text-[#071a33] text-[10px] font-black">${item.jenjang}</span>
                </td>
                <td class="p-4 text-xs ${textSubClass}">${item.provinsi}</td>
                <td class="p-4 text-xs ${textSubClass}">${item.kabupaten}</td>
                <td class="p-4 text-xs ${textSubClass}">${item.kecamatan}</td>
                <td class="p-4 text-xs ${textSubClass}"><span class="px-2.5 py-1 rounded bg-white/70 border border-slate-300 font-bold">${item.kendala}</span></td>
                <td class="p-4 text-center">${badgeStatus}</td>
                <td class="p-4 text-center">${badgeKonfirmasi}</td>
                <td class="p-4 text-center">${actionButton}</td>
            `;
            tbody.appendChild(tr);
        });
    }

    function applyFilterPemantauan() {
        const tahun = document.getElementById('filterTahun').value;
        const jenjang = document.getElementById('filterJenjang').value;
        const kategoriSk = document.getElementById('filterKategoriSk').value;
        const wilayah = document.getElementById('filterWilayah').value;
        const searchVal = document.getElementById('filterSearch').value.toLowerCase().trim();

        const filtered = masterPemantauanData.filter(item => {
            const matchTahun = (tahun === "Semua" || item.tahun === tahun);
            const matchJenjang = (jenjang === "Semua" || item.jenjang === jenjang);
            const matchKategori = (kategoriSk === "Semua" || item.kategoriSk === kategoriSk);
            
            let matchWilayah = true;
            if (wilayah !== "Semua") {
                const parts = wilayah.split(" > ");
                const pProv = parts[0];
                const pKab = parts[1];
                const pKec = parts[2];
                matchWilayah = (item.provinsi.toLowerCase() === pProv.toLowerCase() && 
                                item.kabupaten.toLowerCase().includes(pKab.toLowerCase()) && 
                                item.kecamatan.toLowerCase() === pKec.toLowerCase());
            }

            const fullText = (item.namaSiswa + " " + item.nisn + " " + item.sekolah).toLowerCase();
            const matchSearch = (searchVal === "" || fullText.includes(searchVal));

            return matchTahun && matchJenjang && matchKategori && matchWilayah && matchSearch;
        });

        renderPemantauanTable(filtered);
    }

    function resetFilterPemantauan() {
        document.getElementById('filterTahun').value = "Semua";
        document.getElementById('filterJenjang').value = "Semua";
        document.getElementById('filterKategoriSk').value = "Semua";
        document.getElementById('filterWilayah').value = "Semua";
        document.getElementById('filterSearch').value = "";
        renderPemantauanTable(masterPemantauanData);
    }

    // Fungsi Popup Modal Detail Pemantauan
    function detailPemantauan(nisn) {
        const data = masterPemantauanData.find(item => item.nisn === nisn);
        if (!data) return;

        document.getElementById('modalNamaSiswa').innerText = data.namaSiswa;
        document.getElementById('modalNisn').innerText = data.nisn;
        document.getElementById('modalSekolah').innerText = data.sekolah;
        document.getElementById('modalSkInfo').innerText = `${data.jenjang} - ${data.kategoriSk} (${data.tahun})`;
        document.getElementById('modalWilayah').innerText = `${data.provinsi} > ${data.kabupaten} > Kecamatan ${data.kecamatan}`;
        document.getElementById('modalKendala').innerText = data.kendala;

        let badgeHtml = '';
        if (data.inputData === 'Sudah Input Seluruh Siswa') {
            badgeHtml = `<span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-300 text-xs font-black">Sudah Input Seluruh Siswa</span>`;
        } else if (data.inputData === 'Input Sebagian Siswa') {
            badgeHtml = `<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 border border-blue-300 text-xs font-black">Input Sebagian Siswa</span>`;
        } else {
            badgeHtml = `<span class="px-3 py-1 rounded-full bg-rose-100 text-rose-800 border border-rose-300 text-xs font-black">Belum Input Siswa</span>`;
        }
        document.getElementById('modalInputStatus').innerHTML = badgeHtml;

        let konfirmHtml = data.konfirmasi === 'Ya'
            ? `<span class="px-3 py-1 rounded-full bg-emerald-500 text-white text-xs font-black">Terkonfirmasi (Ya)</span>`
            : `<span class="px-3 py-1 rounded-full bg-rose-500 text-white text-xs font-black">Belum Dikonfirmasi</span>`;
        document.getElementById('modalKonfirmasi').innerHTML = konfirmHtml;

        const modal = document.getElementById('detailModal');
        const container = document.getElementById('modalContainer');
        modal.classList.remove('hidden');
        setTimeout(() => {
            container.classList.remove('scale-95');
            container.classList.add('scale-100');
        }, 10);
    }

    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        const container = document.getElementById('modalContainer');
        container.classList.remove('scale-100');
        container.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }

    document.addEventListener('DOMContentLoaded', () => {
        renderPemantauanTable(masterPemantauanData);
    });
</script>