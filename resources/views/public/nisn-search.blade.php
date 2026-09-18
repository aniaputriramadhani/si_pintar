<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hasil Pencarian NISN - SIPINTAR Kemendikdasmen">
    <title>Hasil Pencarian NISN - SIPINTAR Kemendikdasmen</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { 
            --ink: #071a33; 
            --blue: #0055FF; 
            --aqua: #5ee8d6; 
            --paper: #f8fafc; 
        }
        * { box-sizing: border-box; }
        body { 
            margin: 0; 
            color: var(--ink); 
            background: var(--paper); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            overflow-x: hidden; 
        }
        .mono { font-family: 'DM Mono', monospace; }
        
        /* Background Grid Kotak Konsisten dengan welcome.blade.php */
        .page-wrapper { 
            background-color: var(--paper); 
            background-image: linear-gradient(#0055ff12 1px, transparent 1px), linear-gradient(90deg, #0055ff12 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* Halo Decorative Element */
        .halo-right {
            position: absolute;
            z-index: 1;
            top: -2rem;
            right: -24rem;
            width: 68rem;
            height: 60rem;
            border-radius: 9999px;
            border: 2px solid rgba(0, 85, 255, 0.12);
            box-shadow: 0 0 0 50px rgba(0, 85, 255, 0.03), 0 0 0 120px rgba(0, 85, 255, 0.01);
            pointer-events: none;
        }

        /* Card Scaffolding & Glassmorphism */
        .glow { box-shadow: 0 20px 50px -12px rgba(0,0,0,0.08), 0 0 0 1px rgba(255,255,255,0.6) inset; }
        .glass { background: linear-gradient(140deg, rgba(255,255,255,0.92), rgba(255,255,255,0.78)); border: 1px solid rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); }
        .hover-lift { transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease; }
        .hover-lift:hover { transform: translateY(-4px) scale(1.01); box-shadow: 0 20px 40px -12px rgba(0,85,255,0.15); }
        
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow { animation: spinSlow 50s linear infinite; }

        @keyframes slideDown { from { transform: translateY(-100%); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .header-animate { animation: slideDown 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased relative">

    <!-- HEADER STICKY -->
    <header class="sticky top-0 z-50 border-b border-blue-900/10 bg-white/80 backdrop-blur-md header-animate shadow-sm transition-all">
        <div class="mx-auto flex h-24 max-w-[1540px] items-center justify-between gap-4 px-6 sm:px-10 lg:px-12">
            <a href="{{ route('public.home') }}" class="flex items-center gap-4 rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-300">
                <img src="https://pip.kemendikdasmen.go.id/img/logo-sipintar.png" alt="Logo SIPINTAR" class="h-14 w-auto object-contain">
                <span>
                    <span class="block text-xl font-extrabold tracking-tight text-[#071a33]">SIPINTAR</span>
                    <span class="block text-sm font-bold uppercase tracking-wider text-slate-600">Program Indonesia Pintar</span>
                </span>
            </a>

            <!-- Back Button -->
            <a href="{{ route('public.home') }}" class="inline-flex min-h-[46px] items-center gap-2 rounded-xl border-2 border-slate-200 bg-white px-5 text-sm font-extrabold text-[#071a33] transition hover:border-[#0055FF] hover:text-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-100 shadow-sm">
                <i class="fa-solid fa-arrow-left"></i>
                <span class="hidden sm:inline">Kembali ke Beranda</span>
                <span class="sm:hidden">Kembali</span>
            </a>
        </div>
    </header>

    <!-- MAIN WRAPPER (GRID KOTAK) -->
    <div class="page-wrapper relative overflow-hidden flex-1 py-12">
        <div class="halo-right animate-spin-slow pointer-events-none hidden lg:block"></div>

        <main class="relative z-10 max-w-5xl mx-auto px-6 sm:px-10 space-y-8">

            <!-- 1. FORM PENCARIAN -->
            <div class="glow relative overflow-hidden rounded-[2.5rem] bg-white p-1.5 transition-all duration-300">
                <div class="relative rounded-[2.2rem] bg-[#f9fcff] p-6 sm:p-10 border border-blue-50">
                    <div class="absolute right-0 top-0 h-40 w-40 rounded-bl-full bg-[#d9edff] opacity-50 pointer-events-none"></div>

                    <div class="relative flex flex-wrap items-center justify-between gap-4 mb-6">
                        <div class="flex items-center gap-4">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-[#071a33] text-[#5ee8d6] text-xl">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <div>
                                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#071a33]">Cari Penerima PIP</h2>
                                <p class="text-sm sm:text-base text-slate-600 font-medium mt-1">Masukkan NISN dan NIK untuk melihat status penerima.</p>
                            </div>
                        </div>

                        <span class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50/80 px-4 py-1.5 mono text-xs font-bold uppercase tracking-wider text-[#0055FF]">
                            <span class="h-2 w-2 rounded-full bg-[#0055FF] animate-pulse"></span> Data 2026
                        </span>
                    </div>

                    <form action="{{ route('public.nisn') }}" method="GET" class="relative z-10 flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <label for="nisn" class="mb-1.5 block text-xs font-extrabold uppercase tracking-wider text-slate-700">NISN Siswa <span class="text-red-600">*</span></label>
                            <input 
                                id="nisn"
                                type="text" 
                                name="nisn" 
                                value="{{ $nisn ?? '' }}" 
                                placeholder="Masukkan 10 digit NISN..." 
                                class="w-full min-h-[56px] px-5 bg-white border-2 border-slate-200 rounded-xl focus:border-[#0055FF] focus:ring-4 focus:ring-blue-100 focus:outline-none text-[#071a33] font-bold placeholder-slate-400 transition text-base shadow-sm"
                                required
                            >
                        </div>
                        <div class="flex-1">
                            <label for="nik" class="mb-1.5 block text-xs font-extrabold uppercase tracking-wider text-slate-700">NIK Siswa <span class="text-red-600">*</span></label>
                            <input 
                                id="nik"
                                type="text" 
                                name="nik" 
                                value="{{ $nik ?? '' }}" 
                                placeholder="Masukkan Nomor NIK..." 
                                class="w-full min-h-[56px] px-5 bg-white border-2 border-slate-200 rounded-xl focus:border-[#0055FF] focus:ring-4 focus:ring-blue-100 focus:outline-none text-[#071a33] font-bold placeholder-slate-400 transition text-base shadow-sm"
                                required
                            >
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="group inline-flex min-h-[56px] w-full md:w-auto items-center justify-center rounded-xl bg-[#0055FF] px-8 text-base font-extrabold text-white shadow-lg shadow-blue-600/25 transition hover:bg-[#0044cc] hover:-translate-y-0.5 shrink-0">
                                <span>Cari Penerima</span>
                                <span class="ml-2 transition-transform group-hover:translate-x-1">→</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 2. HASIL PENCARIAN -->
            @if(!empty($nisn))
                <div class="glow rounded-[2.5rem] bg-white p-6 sm:p-10 space-y-8 border border-blue-50">
                    
                    <!-- HEADER SISWA & STATUS -->
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-slate-100 pb-8">
                        <div class="space-y-2">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-extrabold">
                                <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Hasil Pencarian Ditemukan
                            </div>
                            <h3 class="text-3xl sm:text-4xl font-extrabold text-[#071a33] tracking-tight">Ania Putri Ramadhani</h3>
                            <p class="text-sm sm:text-base text-slate-600 font-bold">
                                NISN: <span class="text-[#0055FF] mono">{{ $nisn }}</span> &bull; <span class="text-slate-500">SMK NEGERI 5 Kabupaten Tangerang</span>
                            </p>
                            <p class="text-xs text-slate-400 font-medium">Pembaruan data terkini Tahun Anggaran 2026</p>
                        </div>

                        <!-- CARD STATUS DANA -->
                        <div class="hover-lift bg-emerald-50/80 border-2 border-emerald-200 p-6 rounded-3xl text-left lg:text-right shrink-0 min-w-[240px]">
                            <span class="text-xs font-extrabold uppercase tracking-wider text-emerald-800 block">Status Penyaluran</span>
                            <span class="font-extrabold text-xl flex items-center lg:justify-end gap-3 mt-2 text-emerald-600">
                                <span class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center text-sm font-black shrink-0 shadow-sm">✓</span> 
                                <span>Dana Telah Disalurkan</span>
                            </span>
                        </div>
                    </div>

                    <!-- RINCIAN CARD GRID -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="hover-lift bg-slate-50/80 border border-slate-200/80 p-6 rounded-3xl flex flex-col justify-between space-y-3">
                            <span class="text-xs font-extrabold text-blue-600 uppercase tracking-wider">SK Pemberian</span>
                            <p class="font-extrabold text-[#071a33] text-lg">Tahun Penyaluran 2026</p>
                        </div>

                        <div class="hover-lift bg-slate-50/80 border border-slate-200/80 p-6 rounded-3xl flex flex-col justify-between space-y-3">
                            <span class="text-xs font-extrabold text-blue-600 uppercase tracking-wider">Bank Penyalur & Rekening</span>
                            <p class="font-extrabold text-[#071a33] text-lg">
                                Bank BNI <br>
                                <span class="mono text-[#0055FF] text-base font-bold mt-1 inline-block">****5678</span>
                            </p>
                        </div>

                        <div class="hover-lift bg-slate-50/80 border border-slate-200/80 p-6 rounded-3xl flex flex-col justify-between space-y-3">
                            <span class="text-xs font-extrabold text-blue-600 uppercase tracking-wider">KIP Digital</span>
                            <p class="font-extrabold text-[#071a33] text-lg">Informasi kartu tersedia</p>
                        </div>
                    </div>

                    <!-- PETUNJUK INFORMASI -->
                    <div class="bg-blue-50/60 border border-blue-200/80 p-6 rounded-3xl text-sm text-slate-700 leading-relaxed relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-2 h-full bg-[#0055FF]"></div>
                        <div class="flex items-center gap-2.5 text-[#0055FF] font-extrabold text-base mb-2">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Informasi Penting</span>
                        </div>
                        <p class="font-medium">
                            Istilah <strong class="text-[#071a33] font-extrabold">“pencarian”</strong> digunakan secara konsisten pada judul, tombol, dan hasil. Bagi siswa yang terdaftar, dana bantuan PIP telah disalurkan melalui bank penyalur terkait. Silakan berkoordinasi dengan pihak sekolah untuk proses penarikan atau pengaktifan buku tabungan.
                        </p>
                    </div>

                </div>
            @else
                <!-- EMPTY STATE -->
                <div class="glow rounded-[2.5rem] bg-white p-10 sm:p-16 text-center space-y-5 border border-blue-50">
                    <div class="w-20 h-20 bg-blue-50 border border-blue-100 text-[#0055FF] rounded-3xl flex items-center justify-center mx-auto text-3xl shadow-sm">
                        <i class="fa-solid fa-folder-open"></i>
                    </div>
                    <h3 class="font-extrabold text-[#071a33] text-2xl sm:text-3xl tracking-tight">Silakan Lakukan Pencarian Data</h3>
                    <p class="text-slate-600 text-base max-w-md mx-auto font-medium leading-relaxed">
                        Masukkan NISN dan NIK kamu pada kolom di atas secara benar untuk melihat status penerima Program Indonesia Pintar (PIP).
                    </p>
                </div>
            @endif

        </main>
    </div>

    <!-- FOOTER -->
    <footer class="relative bg-white/60 backdrop-blur-md border-t border-blue-900/10 py-8 px-6 text-slate-600 font-medium text-xs sm:text-sm z-10">
        <div class="max-w-[1540px] mx-auto flex flex-col sm:flex-row justify-between items-center gap-4 px-4 sm:px-8">
            <p>© 2020–2026 PIP - Puslapdik &mdash; Kementerian Pendidikan Dasar dan Menengah RI.</p>
            <div class="flex gap-6 font-bold text-slate-700">
                <a href="#" class="hover:text-[#0055FF] transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-[#0055FF] transition">Bantuan</a>
            </div>
        </div>
    </footer>

</body>
</html>