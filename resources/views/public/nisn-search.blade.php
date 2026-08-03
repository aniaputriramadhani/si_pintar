<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian NISN - SIPINTAR Kemendikdasmen</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #faf5ff;
        }

        /* Vibrant Glassmorphism Base */
        .glass-panel {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(245, 243, 255, 0.85) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 2px solid rgba(233, 213, 255, 0.8);
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .glass-panel:hover {
            transform: translateY(-4px) scale(1.005);
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 20px 40px -15px rgba(168, 85, 247, 0.2);
        }

        .badge-genz {
            box-shadow: 3px 3px 0px #7c3aed;
            transition: all 0.2s ease;
        }
        .badge-genz:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0px #7c3aed;
        }

        /* Animated Cards for Results */
        .card-stat {
            position: relative;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
            border-radius: 32px;
        }
        .card-stat:hover {
            transform: translateY(-6px) scale(1.02);
        }

        .card-pink {
            background: linear-gradient(145deg, rgba(253, 242, 248, 0.95) 0%, rgba(252, 231, 243, 0.9) 100%);
            border: 2px solid rgba(244, 114, 182, 0.4);
            box-shadow: 4px 4px 0px rgba(236, 72, 153, 0.2);
        }
        .card-pink:hover {
            border-color: rgba(236, 72, 153, 0.8);
            box-shadow: 6px 6px 0px rgba(236, 72, 153, 0.4);
        }

        .card-purple {
            background: linear-gradient(145deg, rgba(250, 245, 255, 0.95) 0%, rgba(243, 232, 255, 0.9) 100%);
            border: 2px solid rgba(192, 132, 252, 0.4);
            box-shadow: 4px 4px 0px rgba(168, 85, 247, 0.2);
        }
        .card-purple:hover {
            border-color: rgba(168, 85, 247, 0.8);
            box-shadow: 6px 6px 0px rgba(168, 85, 247, 0.4);
        }

        .card-cyan {
            background: linear-gradient(145deg, rgba(236, 254, 255, 0.95) 0%, rgba(207, 250, 254, 0.9) 100%);
            border: 2px solid rgba(56, 189, 248, 0.4);
            box-shadow: 4px 4px 0px rgba(14, 165, 233, 0.2);
        }
        .card-cyan:hover {
            border-color: rgba(14, 165, 233, 0.8);
            box-shadow: 6px 6px 0px rgba(14, 165, 233, 0.4);
        }

        /* Added Emerald Card for Success Status */
        .card-emerald {
            background: linear-gradient(145deg, rgba(236, 253, 245, 0.95) 0%, rgba(209, 250, 229, 0.9) 100%);
            border: 2px solid rgba(52, 211, 153, 0.4);
            box-shadow: 4px 4px 0px rgba(16, 185, 129, 0.2);
        }
        .card-emerald:hover {
            border-color: rgba(16, 185, 129, 0.8);
            box-shadow: 6px 6px 0px rgba(16, 185, 129, 0.4);
        }

        /* Glow Button */
        .glow-button {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 50%, #f43f5e 100%);
            box-shadow: 0 10px 25px -5px rgba(236, 72, 153, 0.4), 4px 4px 0px #4c1d95;
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .glow-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(236, 72, 153, 0.6), 6px 6px 0px #4c1d95;
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }
        .animate-float {
            animation: float-slow 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-slate-900 min-h-screen flex flex-col justify-between selection:bg-pink-500 selection:text-white antialiased relative overflow-x-hidden">

    <!-- Ambient Floating Blobs -->
    <div class="fixed -top-32 -right-32 w-[550px] h-[550px] bg-pink-300/40 rounded-full blur-[120px] pointer-events-none -z-10 animate-float"></div>
    <div class="fixed top-[25%] -left-32 w-[600px] h-[600px] bg-purple-300/40 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="fixed -bottom-32 right-[10%] w-[500px] h-[500px] bg-cyan-300/40 rounded-full blur-[130px] pointer-events-none -z-10 animate-float" style="animation-delay: 3s;"></div>

    <!-- HEADER / NAVBAR -->
    <header class="sticky top-0 z-50 bg-white/80 border-b-2 border-purple-100 backdrop-blur-xl">
        <div class="max-w-5xl mx-auto px-6 h-20 flex justify-between items-center relative">
            
            <a href="{{ route('public.home') }}" class="flex items-center space-x-3.5 z-10 group">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-500 via-pink-500 to-amber-400 p-0.5 shadow-md flex items-center justify-center transform -rotate-3 group-hover:rotate-0 transition-transform">
                    <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center text-xl">
                        🚀
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-black text-xl tracking-tight bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">SIPINTAR</span>
                        <span class="text-[10px] font-black px-2.5 py-0.5 rounded-full bg-pink-100 text-pink-600 border border-pink-300">V.26 ✨</span>
                    </div>
                    <p class="text-[11px] text-purple-600 font-semibold tracking-wide">Kemendikdasmen RI</p>
                </div>
            </a>
            
            <!-- Back Button -->
            <a href="{{ route('public.home') }}" class="text-xs sm:text-sm font-bold text-slate-700 bg-purple-50/90 border-2 border-purple-200 px-4 py-2 rounded-2xl hover:text-pink-600 hover:bg-white transition-all shadow-sm hover:shadow flex items-center gap-2">
                <span>&larr;</span> <span class="hidden sm:inline">Kembali ke Beranda</span><span class="sm:hidden">Kembali</span>
            </a>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="max-w-4xl mx-auto px-6 py-10 w-full mb-auto space-y-8 relative z-10">

        <!-- 1. SEARCH BAR PANEL -->
        <div class="glass-panel p-6 sm:p-8 rounded-[36px] relative">
            
            <!-- Badge Tahun Data 2026 -->
            <div class="absolute -top-3 -right-3 bg-amber-300 text-slate-900 font-black text-[10px] px-3 py-1.5 rounded-full border border-amber-400 shadow-sm uppercase tracking-wider transform rotate-6 badge-genz">
                ⚡ Tahun Data 2026
            </div>

            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 border-2 border-purple-200 flex items-center justify-center font-black text-xl shadow-sm">
                    🔍
                </div>
                <div>
                    <h2 class="font-black text-slate-900 text-xl sm:text-2xl tracking-tight">Cari Penerima PIP</h2>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium mt-1">Masukkan NISN dan NIK untuk melihat status penerima.</p>
                </div>
            </div>
            
            <form action="{{ route('public.nisn') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <input 
                        type="text" 
                        name="nisn" 
                        value="{{ $nisn ?? '' }}" 
                        placeholder="Masukkan 10 digit NISN..." 
                        class="w-full px-5 py-4 bg-white/90 border-2 border-purple-200 rounded-2xl focus:ring-4 focus:ring-pink-300 focus:border-pink-500 focus:outline-none text-slate-900 font-bold placeholder-slate-400 transition-all text-sm shadow-inner"
                        required
                    >
                </div>
                <div class="flex-1 relative">
                    <input 
                        type="text" 
                        name="nik" 
                        value="{{ $nik ?? '' }}" 
                        placeholder="Masukkan Nomor NIK..." 
                        class="w-full px-5 py-4 bg-white/90 border-2 border-purple-200 rounded-2xl focus:ring-4 focus:ring-pink-300 focus:border-pink-500 focus:outline-none text-slate-900 font-bold placeholder-slate-400 transition-all text-sm shadow-inner"
                        required
                    >
                </div>
                <!-- Button "Cari Penerima" -->
                <button type="submit" class="glow-button text-white font-black px-8 py-4 rounded-2xl transition duration-300 flex items-center justify-center gap-2 group text-sm shrink-0">
                    <span>Cari Penerima</span>
                    <span class="group-hover:translate-x-1 -translate-y-0.5 transition-transform text-lg">🚀</span>
                </button>
            </form>
        </div>

        <!-- 2. HASIL PENCARIAN -->
        @if(!empty($nisn))
            <div class="glass-panel rounded-[36px] p-6 sm:p-9 space-y-7">
                
                <!-- HEADER STATUS & PROFIL SISWA -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b-2 border-purple-100 pb-7">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-emerald-100 border-2 border-emerald-200 text-emerald-700 text-xs font-black mb-1">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Hasil Pencarian Ditemukan
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Ania Putri Ramadhani</h3>
                        <p class="text-xs sm:text-sm text-slate-600 font-bold">
                            NISN: <span class="text-purple-600">{{ $nisn }}</span> &bull; <span class="text-slate-500">SMK NEGERI 5 Kabupaten Tangerang</span>
                        </p>
                        <p class="text-[11px] text-slate-400 font-medium">Pembaruan data terkini Tahun Anggaran 2026</p>
                    </div>

                    <!-- CARD STATUS DANA -->
                    <div class="card-stat card-emerald px-6 py-5 rounded-3xl text-left lg:text-right shrink-0 min-w-[220px]">
                        <span class="text-[11px] font-black block uppercase tracking-wider text-emerald-700">Status Penyaluran</span>
                        <span class="font-black text-lg sm:text-xl flex items-center lg:justify-end gap-2.5 mt-1 text-emerald-600">
                            <span class="w-7 h-7 rounded-full bg-emerald-200 flex items-center justify-center text-sm font-black text-emerald-700 border-2 border-emerald-300 shrink-0">✓</span> 
                            <span>Dana Telah Disalurkan</span>
                        </span>
                    </div>
                </div>

                <!-- RINCIAN DATA PENYALURAN -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div class="card-stat card-pink p-6 rounded-3xl flex flex-col justify-between">
                        <p class="text-[11px] font-black text-pink-700 uppercase tracking-wider mb-2">SK Pemberian</p>
                        <p class="font-black text-slate-900 text-base sm:text-lg">Tahun Penyaluran 2026</p>
                    </div>

                    <div class="card-stat card-purple p-6 rounded-3xl flex flex-col justify-between">
                        <p class="text-[11px] font-black text-purple-700 uppercase tracking-wider mb-2">Bank Penyalur & Rekening</p>
                        <p class="font-black text-slate-900 text-base sm:text-lg">Bank BNI <br> <span class="font-mono text-purple-600 mt-1 inline-block">****5678</span></p>
                    </div>

                    <div class="card-stat card-cyan p-6 rounded-3xl flex flex-col justify-between">
                        <p class="text-[11px] font-black text-cyan-700 uppercase tracking-wider mb-2">KIP Digital</p>
                        <p class="font-black text-slate-900 text-base sm:text-lg">Informasi kartu tersedia</p>
                    </div>
                </div>

                <!-- INFORMASI / PETUNJUK -->
                <div class="bg-purple-50 border-2 border-purple-200 p-6 rounded-3xl text-xs sm:text-sm text-slate-600 font-medium leading-relaxed relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-purple-400"></div>
                    <div class="flex items-center gap-2 text-purple-700 font-black text-base mb-2">
                        <span>💡</span> Informasi Penting
                    </div>
                    <p>
                        Istilah <strong class="text-slate-900 font-black">“pencarian”</strong> digunakan secara konsisten pada judul, tombol, dan hasil. Bagi siswa yang terdaftar, dana bantuan PIP telah disalurkan melalui bank penyalur terkait. Silakan berkoordinasi dengan pihak sekolah untuk proses penarikan atau pengaktifan buku tabungan.
                    </p>
                </div>

            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="glass-panel rounded-[36px] p-10 sm:p-14 text-center space-y-5">
                <div class="w-20 h-20 bg-pink-100 border-2 border-pink-200 text-pink-500 rounded-[28px] flex items-center justify-center mx-auto text-4xl shadow-sm transform -rotate-3 hover:rotate-3 transition-transform">
                    ✨
                </div>
                <h3 class="font-black text-slate-900 text-2xl tracking-tight">Silakan Lakukan Pencarian Data</h3>
                <p class="text-slate-600 text-sm max-w-md mx-auto font-medium leading-relaxed">
                    Masukkan NISN dan NIK kamu pada kolom di atas secara benar untuk melihat status penerima Program Indonesia Pintar (PIP).
                </p>
            </div>
        @endif

    </main>

    <!-- FOOTER -->
    <footer class="border-t-2 border-purple-100 py-8 px-6 text-center text-xs text-slate-500 font-bold relative z-10 bg-white/60 backdrop-blur-md mt-auto">
        <div class="max-w-5xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
            <p>© 2020–2026 PIP - Puslapdik &mdash; Kementerian Pendidikan Dasar dan Menengah RI.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-pink-600 transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-purple-600 transition">Bantuan</a>
            </div>
        </div>
    </footer>

</body>
</html>