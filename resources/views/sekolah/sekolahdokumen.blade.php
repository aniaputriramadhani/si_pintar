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
        
        <!-- ================= SIDEBAR KIRI ================= -->
        <aside class="sticky top-0 z-20 hidden h-screen w-96 flex-shrink-0 flex-col justify-between overflow-y-auto no-scrollbar border-r border-slate-200/80 bg-white p-6 shadow-sm lg:flex">

            <div class="space-y-8">

                <!-- HEADER BRAND -->
                <a href="{{ route('public.home') }}"
                   class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/80 p-4 transition hover:border-slate-200 hover:bg-slate-100/80">

                    <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-xl border border-slate-100 bg-white p-2 shadow-sm">
                        <img src="https://pip.kemendikdasmen.go.id/img/logo-sipintar.png"
                             alt="Logo Kemendikdasmen"
                             class="h-full w-full object-contain">
                    </div>

                    <div class="flex min-w-0 flex-col">
                        <span class="text-3xl font-black tracking-tight text-slate-800 leading-tight">
                            SIPINTAR
                        </span>

                        <div class="mt-1">
                            <span class="inline-flex items-center rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-xs font-black tracking-wider text-[#0055FF]">
                                PORTAL SEKOLAH
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Informasi Sekolah Aktif -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-4">
                    <p id="sideNamaSekolah" class="text-lg font-black text-slate-800 leading-snug">SMPN 1 SOREANG</p>
                    <p id="sideNPSN" class="mono text-xs font-bold text-blue-600 mt-1">NPSN: 20206127</p>
                </div>

                <!-- NAVIGASI -->
                <nav class="space-y-6" aria-label="Navigasi Sekolah">

                    <!-- KATEGORI UTAMA -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">
                            Utama
                        </p>

                        <!-- DASHBOARD -->
                        <a href="{{ Route::has('sekolah.dashboard') ? route('sekolah.dashboard') : url('/sekolah/dashboard') }}"
                           class="group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold text-slate-700 transition-all hover:bg-slate-100">

                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>

                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- KATEGORI LAYANAN PIP -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">
                            Layanan PIP
                        </p>

                        <!-- DATA PIP -->
                        <a href="{{ Route::has('sekolah.data-pip') ? route('sekolah.data-pip') : url('/sekolah/data-pip') }}"
                           class="group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold text-slate-700 transition-all hover:bg-slate-100">

                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>

                            <span>Data PIP</span>
                        </a>

                        <!-- VERIFIKASI -->
                        <a href="{{ Route::has('sekolah.verifikasi') ? route('sekolah.verifikasi') : url('/sekolah/verifikasi') }}"
                           class="group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold text-slate-700 transition-all hover:bg-slate-100">

                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>

                            <span>Verifikasi</span>
                        </a>

                        <!-- KONFIRMASI -->
                        <a href="{{ Route::has('sekolah.konfirmasi') ? route('sekolah.konfirmasi') : url('/sekolah/konfirmasi') }}"
                           class="group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold text-slate-700 transition-all hover:bg-slate-100">

                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7">
                                </path>
                            </svg>

                            <span>Konfirmasi</span>
                        </a>

                        <!-- PENGEMBALIAN NEGARA -->
                        <a href="{{ Route::has('sekolah.pengembalian-negara') ? route('sekolah.pengembalian-negara') : url('/sekolah/pengembalian-negara') }}"
                           class="group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold text-slate-700 transition-all hover:bg-slate-100">

                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6">
                                </path>
                            </svg>

                            <span>Pengembalian Negara</span>
                        </a>
                    </div>

                    <!-- KATEGORI ADMINISTRASI -->
                    <div class="space-y-2">

                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">
                            Administrasi
                        </p>

                        <!-- DOKUMEN + DROPDOWN -->
                        <div class="space-y-2">

                            <!-- TOMBOL UTAMA DOKUMEN -->
                            <button type="button"
                                    id="btnDokumenSidebar"
                                    onclick="toggleDokumenSidebar()"
                                    class="group flex w-full items-center justify-between gap-4 rounded-2xl bg-[#0055FF] px-4 py-3.5 text-left text-xl font-bold text-white shadow-md shadow-blue-500/20 transition-all">

                                <span class="flex items-center gap-4">

                                    <svg class="h-7 w-7 flex-shrink-0"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                        </path>
                                    </svg>

                                    <span>Dokumen</span>
                                </span>

                                <svg id="iconDokumenSidebar"
                                     class="h-5 w-5 transition-transform duration-200"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>

                            </button>

                            <!-- SUBMENU DOKUMEN -->
                            <div id="submenuDokumen"
                                 class="ml-5 space-y-1 border-l-2 border-blue-100 pl-3">

                                <!-- SUBMENU SK -->
                                <button type="button"
                                        id="menuSK"
                                        onclick="switchDocumentPage('sk')"
                                        class="submenu-dokumen active-submenu flex w-full items-center gap-3 rounded-xl bg-blue-50 px-4 py-3 text-left text-base font-extrabold text-[#0055FF] transition-all">

                                    <svg class="h-5 w-5 flex-shrink-0"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM9 8h6M9 12h6M9 16h4">
                                        </path>
                                    </svg>

                                    <span>SK</span>
                                </button>

                                <!-- SUBMENU PEMBERITAHUAN -->
                                <button type="button"
                                        id="menuPemberitahuan"
                                        onclick="switchDocumentPage('pemberitahuan')"
                                        class="submenu-dokumen flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-base font-extrabold text-slate-600 transition-all hover:bg-slate-100">

                                    <svg class="h-5 w-5 flex-shrink-0"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M15 17h5l-1.5-2V9a6.5 6.5 0 00-13 0v6L4 17h5m6 0a3 3 0 01-6 0">
                                        </path>
                                    </svg>

                                    <span>Pemberitahuan</span>

                                    <span class="ml-auto rounded-full bg-rose-100 px-2 py-0.5 text-[10px] font-black text-rose-600">
                                        3
                                    </span>
                                </button>

                            </div>
                        </div>

                        <!-- PENGADUAN -->
                        <a href="{{ Route::has('sekolah.pengaduan') ? route('sekolah.pengaduan') : url('/sekolah/pengaduan') }}"
                           class="group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold text-slate-700 transition-all hover:bg-slate-100">

                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>

                            <span>Pengaduan</span>
                        </a>

                        <!-- DETAIL SK PEMBERIAN -->
                        <a href="{{ Route::has('sekolah.cetak-surat') ? route('sekolah.cetak-surat') : url('/sekolah/cetak-surat') }}"
                           class="group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold text-slate-700 transition-all hover:bg-slate-100">

                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H9v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                </path>
                            </svg>

                            <span>Detail SK Pemberian</span>
                        </a>

                    </div>

                </nav>
            </div>

            <!-- FOOTER SIDEBAR -->
            <div class="mt-8 space-y-4 border-t border-slate-100 pt-5">

                <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                    <p class="text-base font-bold leading-snug text-slate-600">
                        Pusat Layanan Pembiayaan Pendidikan
                    </p>

                    <p class="mt-1 text-sm font-extrabold text-slate-800">
                        Kemendikdasmen RI
                    </p>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="flex w-full items-center justify-center gap-3 rounded-2xl border border-red-200/60 bg-red-50/60 px-4 py-3.5 text-xl font-extrabold text-red-600 transition hover:bg-red-100">

                        <svg class="h-7 w-7"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>

                        Keluar
                    </button>
                </form>

            </div>

        </aside>


        <!-- ================= MAIN KONTEN ================= -->
        <main id="konten-utama" class="min-w-0 flex-1 bg-transparent">

            <!-- TOP NAVBAR -->
            <header class="sticky top-0 z-30 border-b border-blue-900/10 bg-white/80 px-5 py-4 backdrop-blur-xl sm:px-8 lg:px-10">

                <div class="mx-auto flex max-w-[1500px] items-center justify-between gap-4">

                    <!-- JUDUL -->
                    <div class="flex items-center gap-3">

                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">
                            SD
                        </span>

                        <div>
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">Portal Dashboard Sekolah</p>

                            <h1 id="judulHalaman"
                                class="mt-1 text-2xl font-extrabold tracking-tight text-[#071a33] sm:text-4xl">
                                Dokumen
                            </h1>
                        </div>

                    </div>

                    <!-- PROFIL SEKOLAH -->
                    <div class="flex items-center gap-3">

                        <div class="hidden text-right sm:block">

                            <p id="topNamaSekolah"
                               class="text-lg font-extrabold text-[#071a33]">
                                SMPN 1 Soreang
                            </p>

                            <p class="flex items-center justify-end gap-1.5 text-base font-bold text-emerald-600">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                                Terverifikasi
                            </p>

                        </div>

                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0055FF] text-xl font-extrabold text-white shadow-lg shadow-blue-600/30">
                            SD
                        </div>

                    </div>

                </div>

            </header>


            <!-- AREA KONTEN -->
            <div class="relative min-h-screen overflow-hidden px-4 py-6 text-[#071a33] sm:px-8 lg:px-12 lg:py-10">

                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">


                    <!-- =================================================
                         HALAMAN SK
                         ================================================= -->
                    <section id="pageSK" class="space-y-8">


                        <!-- CARD FORMAT DOKUMEN -->
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                            <!-- FORMAT USULAN -->
                            <div class="card-clean rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-7">

                                <div class="flex items-start justify-between gap-4">

                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-[#0055FF]">
                                        <i class="fa-solid fa-file-signature text-2xl"></i>
                                    </div>

                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-[10px] font-black uppercase text-emerald-600">
                                        Tersedia
                                    </span>

                                </div>

                                <h3 class="mt-5 text-xl font-black text-[#071a33]">
                                    Format Usulan
                                </h3>

                                <p class="mt-2 min-h-[48px] text-sm font-medium leading-relaxed text-slate-500">
                                    Unduh format usulan untuk pengajuan dokumen administrasi sekolah.
                                </p>

                                <div class="mt-6 border-t border-slate-100 pt-5">

                                    <a href="{{ asset('documents/format-usulan.docx') }}"
                                       download
                                       class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#0055FF] px-4 py-3 text-sm font-extrabold text-white shadow-md shadow-blue-500/20 transition hover:bg-blue-700">

                                        <i class="fa-solid fa-download"></i>
                                        Unduh Format Usulan
                                    </a>

                                </div>

                            </div>


                            <!-- FORMAT DOKUMEN -->
                            <div class="card-clean rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-7">

                                <div class="flex items-start justify-between gap-4">

                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                                        <i class="fa-solid fa-file-lines text-2xl"></i>
                                    </div>

                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-[10px] font-black uppercase text-emerald-600">
                                        Tersedia
                                    </span>

                                </div>

                                <h3 class="mt-5 text-xl font-black text-[#071a33]">
                                    Format Dokumen
                                </h3>

                                <p class="mt-2 min-h-[48px] text-sm font-medium leading-relaxed text-slate-500">
                                    Unduh format dokumen resmi yang digunakan untuk kelengkapan administrasi.
                                </p>

                                <div class="mt-6 border-t border-slate-100 pt-5">

                                    <a href="{{ asset('documents/format-dokumen.docx') }}"
                                       download
                                       class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#0055FF] px-4 py-3 text-sm font-extrabold text-white shadow-md shadow-blue-500/20 transition hover:bg-blue-700">

                                        <i class="fa-solid fa-download"></i>
                                        Unduh Format Dokumen
                                    </a>

                                </div>

                            </div>

                        </div>


                        <!-- GRID DOKUMEN DAN INFORMASI SISWA -->
                        <div class="grid grid-cols-1 items-stretch gap-6 lg:grid-cols-3">


                            <!-- TABEL DOKUMEN SISWA -->
                            <div class="card-clean flex h-full flex-col justify-between space-y-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2 sm:p-7">

                                <div>

                                    <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">

                                        <h2 class="text-2xl font-black text-[#071a33]">
                                            Dokumen Siswa
                                        </h2>

                                        <span id="badgeWarningCount"
                                              class="rounded-full border border-amber-300 bg-amber-100 px-3.5 py-1.5 text-xs font-black text-amber-800">
                                            1 Perlu Perbaikan
                                        </span>

                                    </div>


                                    <div class="custom-scrollbar overflow-x-auto">

                                        <table class="w-full border-collapse whitespace-nowrap text-left">

                                            <thead>
                                                <tr class="border-b border-slate-200 bg-slate-50 text-xs font-extrabold uppercase tracking-wider text-slate-500">

                                                    <th class="rounded-l-xl p-4">Dokumen</th>
                                                    <th class="p-4">Status</th>
                                                    <th class="p-4">Catatan</th>
                                                    <th class="rounded-r-xl p-4 text-center">Aksi</th>

                                                </tr>
                                            </thead>

                                            <tbody id="documentTableBody"
                                                   class="divide-y divide-slate-100 text-sm font-semibold text-slate-800">
                                            </tbody>

                                        </table>

                                    </div>

                                </div>


                                <div class="flex items-center justify-between border-t border-slate-100 pt-4 text-xs font-bold text-slate-400">

                                    <span>
                                        Total Item Dokumen:
                                        <strong id="totalDocCount" class="font-black text-slate-700">
                                            3
                                        </strong>
                                    </span>

                                    <span class="font-black text-emerald-600">
                                        <i class="fa-solid fa-shield-halved mr-1"></i>
                                        Terverifikasi Sistem
                                    </span>

                                </div>

                            </div>


                            <!-- INFORMASI SISWA -->
                            <div class="card-clean flex h-full flex-col justify-between space-y-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-7">

                                <div>

                                    <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">

                                        <h2 class="text-xl font-black text-[#071a33]">
                                            Informasi Siswa
                                        </h2>

                                        <span class="rounded-xl bg-slate-100 px-3 py-1 text-[10px] font-black uppercase tracking-wider text-slate-500">
                                            DATA SIMULASI
                                        </span>

                                    </div>


                                    <div class="space-y-3.5">

                                        <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-4">

                                            <span class="block text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                                                NAMA SISWA
                                            </span>

                                            <p class="mt-0.5 text-lg font-black text-slate-900">
                                                Budi Santoso
                                            </p>

                                        </div>


                                        <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-4">

                                            <span class="block text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                                                NISN
                                            </span>

                                            <p class="mt-0.5 font-mono text-base font-black text-slate-800">
                                                0102******
                                            </p>

                                        </div>


                                        <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-4">

                                            <span class="block text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                                                STATUS SK
                                            </span>

                                            <p class="mt-0.5 text-base font-black text-blue-600">
                                                SK Pemberian Tahap 43
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                <div class="border-t border-slate-100 pt-4">

                                    <button type="button"
                                            onclick="alert('Memuat data riwayat lengkap...')"
                                            class="w-full rounded-xl border border-slate-200 py-2.5 text-xs font-extrabold text-slate-600 transition hover:bg-slate-50">

                                        <i class="fa-solid fa-address-card mr-1.5"></i>
                                        Lihat Detail Biodata
                                    </button>

                                </div>

                            </div>

                        </div>

                    </section>


                    <!-- =================================================
                         HALAMAN PEMBERITAHUAN
                         ================================================= -->
                    <section id="pagePemberitahuan" class="hidden space-y-8">

                        
                        <!-- CARD HEADER -->
                        <div class="card-clean overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5 sm:px-8">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-xl text-[#0055FF]">
                                        <i class="fa-solid fa-bell"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-2xl font-black text-[#071a33]">
                                            Pemberitahuan Terbaru
                                        </h2>

                                        <p class="mt-1 text-xs font-bold text-slate-400">
                                            Informasi penting dari sistem SIPINTAR
                                        </p>
                                    </div>

                                </div>

                                <button type="button"
                                        onclick="markNotificationsRead()"
                                        class="hidden text-xs font-extrabold text-[#0055FF] hover:text-blue-800 sm:block">
                                    Tandai dibaca
                                </button>

                            </div>


                            <!-- DAFTAR PEMBERITAHUAN -->
                            <div class="space-y-4 p-6 sm:p-8">


                                <!-- CARD 1 BATAS KONFIRMASI -->
                                <div class="notification-card rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-blue-200 hover:shadow-sm sm:p-6">

                                    <div class="flex items-start gap-4">

                                        <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-2xl text-amber-500">
                                            <i class="fa-solid fa-clock"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="flex flex-wrap items-start justify-between gap-2">

                                                <span class="rounded-md bg-amber-100 px-2.5 py-1 text-[10px] font-black uppercase tracking-wider text-amber-700">
                                                    Penting
                                                </span>

                                                <span class="text-xs font-bold text-slate-400">
                                                    20 Juli 2026
                                                </span>

                                            </div>

                                            <h3 class="mt-3 text-lg font-black text-[#071a33]">
                                                Batas Konfirmasi Aktivasi
                                            </h3>

                                            <p class="mt-1 text-sm font-medium leading-relaxed text-slate-500">
                                                Konfirmasi tahap aktivasi harus dilakukan sebelum batas waktu yang telah ditentukan.
                                            </p>

                                            <button type="button"
                                                    onclick="openNotificationDetail('Batas Konfirmasi Aktivasi')"
                                                    class="mt-4 text-xs font-extrabold text-[#0055FF] hover:underline">

                                                Lihat selengkapnya
                                                <i class="fa-solid fa-arrow-right ml-1"></i>

                                            </button>

                                        </div>

                                    </div>

                                </div>


                                <!-- CARD 2 FORMAT PENGEMBALIAN NEGARA -->
                                <div class="notification-card rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-blue-200 hover:shadow-sm sm:p-6">

                                    <div class="flex items-start gap-4">

                                        <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-2xl text-blue-500">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="flex flex-wrap items-start justify-between gap-2">

                                                <span class="rounded-md bg-blue-100 px-2.5 py-1 text-[10px] font-black uppercase tracking-wider text-blue-700">
                                                    Dokumen
                                                </span>

                                                <span class="text-xs font-bold text-slate-400">
                                                    Terbaru
                                                </span>

                                            </div>

                                            <h3 class="mt-3 text-lg font-black text-[#071a33]">
                                                Format Pengembalian Negara
                                            </h3>

                                            <p class="mt-1 text-sm font-medium leading-relaxed text-slate-500">
                                                Format terbaru untuk keperluan pengembalian dana negara telah tersedia pada menu dokumen.
                                            </p>

                                            <button type="button"
                                                    onclick="openNotificationDetail('Format Pengembalian Negara')"
                                                    class="mt-4 text-xs font-extrabold text-[#0055FF] hover:underline">

                                                Lihat selengkapnya
                                                <i class="fa-solid fa-arrow-right ml-1"></i>

                                            </button>

                                        </div>

                                    </div>

                                </div>


                                <!-- CARD 3 PERBAIKAN DATA SISWA -->
                                <div class="notification-card rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-blue-200 hover:shadow-sm sm:p-6">

                                    <div class="flex items-start gap-4">

                                        <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-rose-50 text-2xl text-rose-500">
                                            <i class="fa-solid fa-users"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="flex flex-wrap items-start justify-between gap-2">

                                                <span class="rounded-md bg-rose-100 px-2.5 py-1 text-[10px] font-black uppercase tracking-wider text-rose-700">
                                                    Tindak Lanjut
                                                </span>

                                                <span class="text-xs font-black text-rose-500">
                                                    9 Siswa
                                                </span>

                                            </div>

                                            <h3 class="mt-3 text-lg font-black text-[#071a33]">
                                                Perbaikan Data Siswa
                                            </h3>

                                            <p class="mt-1 text-sm font-medium leading-relaxed text-slate-500">
                                                Terdapat 9 siswa yang memerlukan tindak lanjut perbaikan data.
                                            </p>

                                            <button type="button"
                                                    onclick="openNotificationDetail('Perbaikan Data Siswa')"
                                                    class="mt-4 text-xs font-extrabold text-[#0055FF] hover:underline">

                                                Lihat selengkapnya
                                                <i class="fa-solid fa-arrow-right ml-1"></i>

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>


                    <!-- FOOTER -->
                    <div class="flex flex-col items-center justify-between gap-2 border-t border-slate-200/60 pt-6 text-center text-sm font-bold text-slate-400 sm:flex-row sm:text-left">

                        <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>

                        <span>
                            SIPINTAR - Sistem Informasi Program Indonesia Pintar
                        </span>

                    </div>

                </div>

            </div>

        </main>

    </div>


    <!-- =========================================================
         JAVASCRIPT LOGIC
         ========================================================= -->

    <script>

        /* ================= DATA DOKUMEN ================= */

        const masterDocuments = [
            {
                nama: "Identitas Siswa",
                status: "Lengkap",
                catatan: "-",
                aksiType: "view"
            },
            {
                nama: "Halaman Mutasi Tabungan",
                status: "Perlu Perbaikan",
                catatan: "Foto kurang jelas",
                aksiType: "reupload"
            },
            {
                nama: "Bukti Tarik ATM",
                status: "Belum Ada",
                catatan: "Jika tersedia",
                aksiType: "upload"
            }
        ];


        /* ================= DROPDOWN SIDEBAR ================= */

        let dokumenSidebarOpen = true;

        function toggleDokumenSidebar() {

            dokumenSidebarOpen = !dokumenSidebarOpen;

            const submenu = document.getElementById('submenuDokumen');
            const icon = document.getElementById('iconDokumenSidebar');

            if (dokumenSidebarOpen) {

                submenu.classList.remove('hidden');
                icon.classList.remove('rotate-180');

            } else {

                submenu.classList.add('hidden');
                icon.classList.add('rotate-180');

            }

        }


        /* ================= PERPINDAHAN HALAMAN ================= */

        function switchDocumentPage(page) {

            const pageSK = document.getElementById('pageSK');
            const pagePemberitahuan = document.getElementById('pagePemberitahuan');

            const menuSK = document.getElementById('menuSK');
            const menuPemberitahuan = document.getElementById('menuPemberitahuan');

            const judul = document.getElementById('judulHalaman');

            const activeClass = [
                'active-submenu',
                'bg-blue-50',
                'text-[#0055FF]'
            ];

            const inactiveClass = [
                'text-slate-600'
            ];

            if (page === 'sk') {

                pageSK.classList.remove('hidden');
                pagePemberitahuan.classList.add('hidden');

                judul.textContent = 'Dokumen';

                menuSK.classList.add(...activeClass);
                menuSK.classList.remove(...inactiveClass);

                menuPemberitahuan.classList.remove(...activeClass);
                menuPemberitahuan.classList.add(...inactiveClass);

            } else if (page === 'pemberitahuan') {

                pageSK.classList.add('hidden');
                pagePemberitahuan.classList.remove('hidden');

                judul.textContent = 'Pemberitahuan';

                menuPemberitahuan.classList.add(...activeClass);
                menuPemberitahuan.classList.remove(...inactiveClass);

                menuSK.classList.remove(...activeClass);
                menuSK.classList.add(...inactiveClass);

            }

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        }


        /* ================= RENDER TABEL DOKUMEN ================= */

        function renderDocuments(docs) {

            const tbody = document.getElementById('documentTableBody');

            tbody.innerHTML = '';

            document.getElementById('totalDocCount').innerText = docs.length;

            const warningCount = docs.filter(
                doc => doc.status === 'Perlu Perbaikan'
            ).length;

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
                        <td colspan="4"
                            class="py-8 text-center text-sm font-bold text-slate-400">
                            Tidak ada dokumen yang sesuai dengan filter.
                        </td>
                    </tr>
                `;

                return;

            }


            docs.forEach(item => {

                const tr = document.createElement('tr');

                tr.className = 'border-b border-slate-100 transition-all hover:bg-slate-50/80';


                let statusBadge = '';

                if (item.status === 'Lengkap') {

                    statusBadge = `
                        <span class="rounded-full border border-emerald-200 bg-emerald-100 px-3 py-1 text-xs font-black text-emerald-700">
                            Lengkap
                        </span>
                    `;

                } else if (item.status === 'Perlu Perbaikan') {

                    statusBadge = `
                        <span class="rounded-full border border-rose-200 bg-rose-100 px-3 py-1 text-xs font-black text-rose-700">
                            Perlu Perbaikan
                        </span>
                    `;

                } else {

                    statusBadge = `
                        <span class="rounded-full border border-amber-200 bg-amber-100 px-3 py-1 text-xs font-black text-amber-700">
                            Belum Ada
                        </span>
                    `;

                }


                let actionBtn = '';

                if (item.aksiType === 'view') {

                    actionBtn = `
                        <button type="button"
                                onclick="handleAction('${item.nama}')"
                                class="text-sm font-extrabold text-blue-600 hover:text-blue-800">
                            Lihat
                        </button>
                    `;

                } else if (item.aksiType === 'reupload') {

                    actionBtn = `
                        <button type="button"
                                onclick="handleAction('${item.nama}')"
                                class="text-sm font-extrabold text-amber-600 hover:text-amber-800">
                            Unggah Ulang
                        </button>
                    `;

                } else {

                    actionBtn = `
                        <button type="button"
                                onclick="handleAction('${item.nama}')"
                                class="text-sm font-extrabold text-emerald-600 hover:text-emerald-800">
                            Unggah
                        </button>
                    `;

                }


                tr.innerHTML = `
                    <td class="p-4 font-black text-slate-900">
                        ${item.nama}
                    </td>

                    <td class="p-4">
                        ${statusBadge}
                    </td>

                    <td class="p-4 font-medium text-slate-500">
                        ${item.catatan}
                    </td>

                    <td class="p-4 text-center">
                        ${actionBtn}
                    </td>
                `;

                tbody.appendChild(tr);

            });

        }


        /* ================= FILTER DOKUMEN ================= */

        function applyDocFilter() {

            const selectedStatus = document.getElementById('filterStatusDoc').value;

            if (selectedStatus === 'Semua') {

                renderDocuments(masterDocuments);

            } else {

                const filtered = masterDocuments.filter(
                    doc => doc.status === selectedStatus
                );

                renderDocuments(filtered);

            }

        }


        function resetFilterDokumen() {

            document.getElementById('filterStatusDoc').value = 'Semua';

            renderDocuments(masterDocuments);

        }


        /* ================= AKSI DOKUMEN ================= */

        function handleAction(docName) {

            alert(`Aksi diproses untuk dokumen: ${docName}`);

        }


        /* ================= PEMBERITAHUAN ================= */

        function openNotificationDetail(title) {

            alert(`Detail pemberitahuan: ${title}`);

        }


        function markNotificationsRead() {

            const notificationCards = document.querySelectorAll('.notification-card');

            notificationCards.forEach(card => {

                card.classList.remove('border-slate-200');
                card.classList.add('border-slate-100');

            });

            alert('Pemberitahuan ditandai sebagai telah dibaca.');

        }


        /* ================= INISIALISASI ================= */

        document.addEventListener('DOMContentLoaded', function() {

            renderDocuments(masterDocuments);

            switchDocumentPage('sk');

        });

    </script>
</body>
</html>