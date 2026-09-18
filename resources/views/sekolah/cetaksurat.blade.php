<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Detail SK Pemberian - SIPINTAR">
    <title>Detail SK Pemberian | SIPINTAR</title>
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

        /* Print CSS Override */
        @media print {
            aside, header, footer, #toastNotification, .no-print {
                display: none !important;
            }
            body {
                background: white !important;
            }
            #printableArea {
                display: block !important;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden">
    <!-- TOAST NOTIFIKASI -->
    <div id="toastNotification" class="fixed top-5 right-5 z-50 transform translate-y-[-100px] opacity-0 transition-all duration-300 flex items-center gap-3 bg-[#071a33] text-white px-5 py-3.5 rounded-2xl shadow-xl border border-slate-700">
        <i id="toastIcon" class="fa-solid fa-circle-check text-emerald-400 text-lg"></i>
        <span id="toastMessage" class="text-sm font-bold">Aksi berhasil diproses!</span>
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
                        <a href="{{ Route::has('sekolah.dashboard') ? route('sekolah.dashboard') : url('/sekolah/dashboard') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- Kategori 2: Layanan PIP -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Layanan PIP</p>
                        <a href="{{ Route::has('sekolah.data-pip') ? route('sekolah.data-pip') : url('/sekolah/data-pip') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data PIP</span>
                        </a>
                        <a href="{{ Route::has('sekolah.verifikasi') ? route('sekolah.verifikasi') : url('/sekolah/verifikasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Verifikasi</span>
                        </a>
                        <a href="{{ Route::has('sekolah.konfirmasi') ? route('sekolah.konfirmasi') : url('/sekolah/konfirmasi') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Konfirmasi</span>
                        </a>
                        <a href="{{ Route::has('sekolah.pengembalian-negara') ? route('sekolah.pengembalian-negara') : url('/sekolah/pengembalian-negara') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                            <span>Pengembalian Negara</span>
                        </a>
                    </div>

                    <!-- Kategori 3: Administrasi -->
                    <div class="space-y-2">
                        <p class="px-4 text-xs font-black uppercase tracking-wider text-slate-400">Administrasi</p>
                        <a href="{{ Route::has('sekolah.dokumen') ? route('sekolah.dokumen') : url('/sekolah/dokumen') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            <span>Dokumen</span>
                        </a>
                        <a href="{{ Route::has('sekolah.pengaduan') ? route('sekolah.pengaduan') : url('/sekolah/pengaduan') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all text-slate-700 hover:bg-slate-100 hover:text-slate-900">
                            <svg class="h-7 w-7 flex-shrink-0 text-slate-400 group-hover:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>Pengaduan</span>
                        </a>

                        <!-- Detail SK Pemberian (Active Menu) -->
                        <a href="{{ Route::has('sekolah.cetak-surat') ? route('sekolah.cetak-surat') : url('/sekolah/cetak-surat') }}" 
                           class="sidebar-link group flex items-center gap-4 rounded-2xl px-4 py-3.5 text-xl font-bold transition-all bg-[#0055FF] text-white shadow-md shadow-blue-500/20">
                            <svg class="h-7 w-7 flex-shrink-0 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
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
                    
                    <div class="flex items-center gap-3">
                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#071a33] font-extrabold text-[#5ee8d6] lg:hidden">SD</span>
                        <div>
                            <p class="mono text-xs font-bold uppercase tracking-[.16em] text-[#0055FF]">Portal Dashboard Sekolah</p>
                            <h1 class="mt-1 text-2xl font-extrabold tracking-tight sm:text-4xl text-[#071a33]">Detail SK Pemberian</h1>
                        </div>
                    </div>

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

            <!-- KONTEN UTAMA DETAIL SK PEMBERIAN -->
            <div class="min-h-screen text-[#071a33] relative overflow-hidden px-4 py-6 sm:px-8 lg:px-12 lg:py-10">
                <div class="relative z-10 mx-auto max-w-[1540px] space-y-8">

                    <!-- BANNER DETAIL SISWA & SK -->
                    <section class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 border-l-8 border-l-[#0055FF]">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="px-3 py-1 rounded-md bg-blue-50 text-[#0055FF] border border-blue-100 text-xs font-black tracking-wider uppercase">Data Terverifikasi</span>
                                    <span class="text-xs font-bold text-slate-400">Tahun 2026</span>
                                </div>
                                <h2 class="text-2xl sm:text-3xl font-black text-[#071a33]">Andi Pratama — SK Pemberian Tahap 43</h2>
                                <p class="text-sm font-bold text-slate-500 mt-1">NISN: <span class="mono text-[#0055FF]">0087123456</span> · Kelas 6 · SDN 1 Bahagia Selatan</p>
                            </div>

                            <!-- ACTION BUTTONS -->
                            <div class="flex items-center gap-3 self-start md:self-center shrink-0">
                                <button id="btnUnduh" onclick="handleUnduhSK()" class="px-5 py-3 rounded-2xl border-2 border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-extrabold text-sm transition-all shadow-sm flex items-center gap-2 cursor-pointer">
                                    <i id="iconUnduh" class="fa-solid fa-download text-xs"></i>
                                    <span id="textUnduh">Unduh SK</span>
                                </button>
                                <button id="btnCetak" onclick="handleCetakSurat()" class="px-5 py-3 rounded-2xl bg-[#0055FF] hover:bg-blue-700 text-white font-extrabold text-sm transition-all shadow-md shadow-blue-600/20 flex items-center gap-2 cursor-pointer">
                                    <i id="iconCetak" class="fa-solid fa-print text-xs"></i>
                                    <span id="textCetak">Cetak Surat</span>
                                </button>
                            </div>
                        </div>
                    </section>

                    <!-- RINGKASAN SK (FULL-WIDTH SIMETRIS & FIT) -->
                    <div class="rounded-[2.5rem] bg-white border-2 border-slate-200 p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#0055FF]">
                                    <i class="fa-solid fa-file-contract text-lg"></i>
                                </div>
                                <h3 class="text-xl font-black text-[#071a33]">Ringkasan SK</h3>
                            </div>
                            <span class="px-3.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-black border border-emerald-200">
                                Aktif
                            </span>
                        </div>

                        <!-- 3 Kartu Grid yang Simetris & Responsif -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Nominal -->
                            <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-6 flex flex-col justify-between">
                                <p class="text-xs font-black text-slate-400 uppercase tracking-wider">Nominal Bantuan</p>
                                <p class="text-3xl font-black text-[#071a33] mt-2">Rp 450.000</p>
                            </div>

                            <!-- Status Rekening -->
                            <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-6 flex flex-col justify-between">
                                <p class="text-xs font-black text-slate-400 uppercase tracking-wider">Status Rekening</p>
                                <p class="text-xl font-bold text-emerald-600 mt-2 flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check"></i> Sudah Aktivasi
                                </p>
                            </div>

                            <!-- Status Penyaluran -->
                            <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-6 flex flex-col justify-between">
                                <p class="text-xs font-black text-slate-400 uppercase tracking-wider">Status Penyaluran</p>
                                <p class="text-xl font-bold text-slate-800 mt-2">Dana telah disalurkan</p>
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

    <!-- AREA TEMPLATE CETAK SURAT -->
    <div id="printableArea" class="hidden print:block p-8 bg-white text-slate-900 font-sans">
        <div class="text-center border-b-2 border-slate-900 pb-4 mb-6">
            <h1 class="text-2xl font-black uppercase tracking-wide">KEMENTERIAN PENDIDIKAN DASAR DAN MENENGAH</h1>
            <h2 class="text-lg font-bold">PUSAT LAYANAN PEMBIAYAAN PENDIDIKAN (PUSLAPDIK)</h2>
            <p class="text-xs text-slate-600 mt-1">SURAT KETERANGAN PENERIMA PROGRAM INDONESIA PINTAR (PIP) TAHUN 2026</p>
        </div>

        <div class="space-y-4 mb-8">
            <p class="text-sm">Menerangkan bahwa siswa di bawah ini:</p>
            <table class="w-full text-sm font-semibold">
                <tr><td class="py-1 w-40">Nama Siswa</td><td>: <strong>Andi Pratama</strong></td></tr>
                <tr><td class="py-1">NISN</td><td>: 0087123456</td></tr>
                <tr><td class="py-1">Sekolah</td><td>: SDN 1 Bahagia Selatan</td></tr>
                <tr><td class="py-1">Kelas</td><td>: 6 (Enam)</td></tr>
                <tr><td class="py-1">Status SK</td><td>: SK Pemberian Tahap 43</td></tr>
                <tr><td class="py-1">Nominal Bantuan</td><td>: Rp 450.000,-</td></tr>
                <tr><td class="py-1">Status Penyaluran</td><td>: Dana Telah Disalurkan</td></tr>
            </table>
            <p class="text-sm mt-4">Telah resmi tercatat sebagai penerima dana Program Indonesia Pintar (PIP) dan dapat menggunakan surat keterangan ini untuk keperluan administrasi sekolah/bank penyalur.</p>
        </div>

        <div class="flex justify-between items-end pt-12">
            <div class="text-xs text-slate-500">
                <p>Dokumen ini dicetak otomatis dari Sistem SIPINTAR Portal Sekolah</p>
                <p>Tanggal Cetak: <span id="printDate"></span></p>
            </div>
            <div class="text-center text-sm">
                <p>Kab. Subur Perkasa, 13 Agustus 2026</p>
                <p class="font-bold mt-12">Kepala SDN 1 Bahagia Selatan</p>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
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

        function handleUnduhSK() {
            const btn = document.getElementById('btnUnduh');
            const icon = document.getElementById('iconUnduh');
            const text = document.getElementById('textUnduh');

            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');
            icon.className = 'fa-solid fa-spinner fa-spin text-xs';
            text.innerText = 'Mengunduh...';

            setTimeout(() => {
                const dummyContent = `====================================================\nSK PEMBERIAN PIP TAHUN 2026 - TAHAP 43\n====================================================\nNama Siswa : Andi Pratama\nNISN       : 0087123456\nKelas      : 6\nNominal    : Rp 450.000\nStatus     : Aktif / Dana Disalurkan\n====================================================\nSIPINTAR - Puslapdik Kemendikdasmen RI\nDokumen Asli Resmi Terverifikasi Sistem`;
                
                const blob = new Blob([dummyContent], { type: 'text/plain;charset=utf-8' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'SK_Pemberian_PIP_Andi_Pratama_Tahap43.txt';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
                icon.className = 'fa-solid fa-check text-xs text-emerald-600';
                text.innerText = 'Tersimpan!';

                showToast('SK Pemberian berhasil diunduh');

                setTimeout(() => {
                    icon.className = 'fa-solid fa-download text-xs';
                    text.innerText = 'Unduh SK';
                }, 2000);
            }, 1200);
        }

        function handleCetakSurat() {
            const btn = document.getElementById('btnCetak');
            const icon = document.getElementById('iconCetak');
            const text = document.getElementById('textCetak');

            const now = new Date();
            document.getElementById('printDate').innerText = now.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            icon.className = 'fa-solid fa-spinner fa-spin text-xs';
            text.innerText = 'Membuka Printer...';

            setTimeout(() => {
                icon.className = 'fa-solid fa-print text-xs';
                text.innerText = 'Cetak Surat';
                
                window.print();
                showToast('Perintah cetak dikirim ke printer');
            }, 600);
        }
    </script>
</body>
</html>