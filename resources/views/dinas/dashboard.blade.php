<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dinas - SIPINTAR Kemendikdasmen</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #faf5ff;
        }

        /* Vibrant Glassmorphism Panel */
        .glass-panel {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(245, 243, 255, 0.85) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 2px solid rgba(233, 213, 255, 0.8);
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .glass-panel:hover {
            transform: translateY(-2px) scale(1.002);
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 20px 40px -15px rgba(168, 85, 247, 0.15);
        }

        .badge-genz {
            box-shadow: 3px 3px 0px #7c3aed;
            transition: all 0.2s ease;
        }
        .badge-genz:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0px #7c3aed;
        }

        /* Glow Button */
        .glow-button {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 50%, #f43f5e 100%);
            box-shadow: 0 10px 25px -5px rgba(236, 72, 153, 0.3), 3px 3px 0px #4c1d95;
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .glow-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(236, 72, 153, 0.5), 5px 5px 0px #4c1d95;
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
        }
        .animate-float {
            animation: float-slow 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-slate-900 min-h-screen flex relative overflow-x-hidden selection:bg-pink-500 selection:text-white antialiased">

    <!-- Ambient Background Blobs -->
    <div class="fixed -top-32 -right-32 w-[550px] h-[550px] bg-pink-300/30 rounded-full blur-[120px] pointer-events-none -z-10 animate-float"></div>
    <div class="fixed top-[40%] -left-32 w-[600px] h-[600px] bg-purple-300/30 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="fixed -bottom-32 right-[10%] w-[500px] h-[500px] bg-cyan-300/30 rounded-full blur-[130px] pointer-events-none -z-10 animate-float" style="animation-delay: 3s;"></div>

    <!-- SIDEBAR -->
    <aside class="w-72 glass-panel border-r-2 border-purple-200/80 min-h-screen hidden lg:flex flex-col justify-between p-6 z-20 sticky top-0">
        <div>
            <!-- Sidebar Brand -->
            <div class="flex items-center gap-3 px-2 mb-8">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-600 to-pink-500 flex items-center justify-center text-white font-black text-xl shadow-md transform -rotate-3">
                    🏛️
                </div>
                <div>
                    <h2 class="font-black text-slate-900 text-base tracking-tight">SIPINTAR</h2>
                    <p class="text-[11px] font-bold text-purple-700">Portal Dinas Wilayah</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl bg-purple-600 text-white font-bold text-sm shadow-md transition-all">
                    <span>📊</span>
                    <span>Dashboard Dinas</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>🏫</span>
                    <span>Monitoring Sekolah</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>📈</span>
                    <span>Evaluasi & Mutu</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>⚙️</span>
                    <span>Pengaturan Sistem</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer / Logout -->
        <div class="pt-6 border-t-2 border-purple-100">
            <form action="#" method="POST">
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3.5 rounded-2xl bg-rose-50 hover:bg-rose-100 border-2 border-rose-200 text-rose-600 font-black text-xs transition-all shadow-sm">
                    <span>🚪</span>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0">
        
        <!-- Top Navbar -->
        <header class="glass-panel border-b-2 border-purple-200/80 px-6 sm:px-10 py-5 flex items-center justify-between sticky top-0 z-10 backdrop-blur-xl">
            <div class="flex items-center gap-4">
                <div class="lg:hidden w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-purple-700 font-bold">
                    🏛️
                </div>
                <div>
                    <h1 class="text-lg sm:text-xl font-black text-slate-900 tracking-tight">Dashboard Pengawasan Wilayah</h1>
                    <p class="text-xs font-bold text-slate-500">Monitoring data satuan pendidikan tingkat Provinsi dan Kabupaten/Kota</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- Scope Level Switcher -->
                <select id="scopeLevel" class="bg-purple-50/80 border-2 border-purple-200 text-slate-800 text-xs font-bold rounded-2xl px-4 py-2.5 outline-none focus:border-purple-600 transition-all shadow-sm">
                    <option value="provinsi">Tingkat Provinsi Banten</option>
                    <option value="kabupaten">Tingkat Kab. Tangerang</option>
                </select>

                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-black text-slate-900">Admin Dinas Pendidikan</span>
                    <span class="text-[10px] font-bold text-purple-600 uppercase tracking-wider">Scope: Regional</span>
                </div>
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-amber-300 to-pink-400 p-0.5 shadow-sm">
                    <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center font-black text-sm text-purple-700">
                        ⚡
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Body Content -->
        <div class="p-6 sm:p-10 space-y-8 max-w-7xl mx-auto w-full">

            <!-- Banner / Notification Card -->
            <div class="glass-panel p-6 sm:p-8 rounded-[32px] relative overflow-hidden bg-gradient-to-r from-purple-500/10 via-pink-500/10 to-amber-400/10 border-2 border-purple-200">
                <div class="absolute -right-10 -bottom-10 text-9xl opacity-10 pointer-events-none">📈</div>
                <div class="relative z-10">
                    <span class="bg-amber-300 text-slate-900 font-black text-[10px] px-3 py-1 rounded-full border border-amber-400 shadow-sm uppercase tracking-wider badge-genz inline-block mb-3">
                        ⚡ Integrasi Data Sektoral Aktif
                    </span>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 mb-2">Pusat Kendali & Evaluasi Mutu Pendidikan</h2>
                    <p class="text-slate-600 text-xs sm:text-sm font-semibold max-w-2xl leading-relaxed">
                        Mengawasi aktivitas pelaporan, rekapitulasi data siswa, serta validasi tingkat sekolah secara terpusat untuk memastikan pemerataan mutu pendidikan di daerah.
                    </p>
                </div>
            </div>

            <!-- Quick Stats Grid (Regional Scope) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Stat 1 -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-purple-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            🏫
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-purple-100 text-purple-700">Total Sekolah</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-1">1,248</h3>
                    <p class="text-slate-500 text-xs font-bold">Cakupan Wilayah Aktif</p>
                </div>

                <!-- Stat 2 -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-purple-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            👥
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-pink-100 text-pink-700">Total Siswa</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-1">452.120</h3>
                    <p class="text-slate-500 text-xs font-bold">+3.2% dari tahun lalu</p>
                </div>

                <!-- Stat 3 -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-purple-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            👩‍🏫
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-cyan-100 text-cyan-700">Pendidik</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-1">28.450</h3>
                    <p class="text-slate-500 text-xs font-bold">Rasio Guru & Siswa Ideal</p>
                </div>

                <!-- Stat 4 -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-purple-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            ⭐
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-amber-100 text-amber-800">Indeks Mutu</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-1">86.4</h3>
                    <p class="text-slate-500 text-xs font-bold">Kategori Baik Sekali</p>
                </div>

            </div>

            <!-- Table Section: Daftar Sekolah & Status Monitoring -->
            <div class="glass-panel p-6 sm:p-8 rounded-[32px] border-2 border-purple-200/80 shadow-sm">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-black text-slate-900">Daftar Sekolah & Pemantauan Wilayah</h3>
                        <p class="text-xs font-bold text-slate-500 mt-0.5">Daftar instansi pendidikan dalam pengawasan dinas</p>
                    </div>
                    <button class="glow-button text-white font-black px-5 py-3 rounded-2xl text-xs flex items-center gap-2">
                        <span>+ Unduh Rekapitulasi Laporan</span>
                    </button>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-purple-200 text-purple-800 text-[11px] font-black uppercase tracking-wider">
                                <th class="py-4 px-4">No</th>
                                <th class="py-4 px-4">Nama Sekolah / NPSN</th>
                                <th class="py-4 px-4">Wilayah / Kabupaten</th>
                                <th class="py-4 px-4">Jenjang</th>
                                <th class="py-4 px-4">Total Siswa</th>
                                <th class="py-4 px-4">Status Pengawasan</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-semibold text-slate-700 divide-y divide-purple-100">
                            <tr class="hover:bg-purple-50/50 transition-colors">
                                <td class="py-4 px-4 font-bold text-purple-700">1</td>
                                <td class="py-4 px-4 font-black text-slate-900">SMKN 5 Kab. Tangerang <span class="block text-[10px] font-bold text-purple-600">NPSN: 20613512</span></td>
                                <td class="py-4 px-4 text-slate-600">Kabupaten Tangerang</td>
                                <td class="py-4 px-4">SMK</td>
                                <td class="py-4 px-4 font-bold">1,120</td>
                                <td class="py-4 px-4">
                                    <span class="bg-emerald-100 text-emerald-700 font-black text-[10px] px-3 py-1 rounded-full border border-emerald-200">Sinkron & Aktif</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-purple-50/50 transition-colors">
                                <td class="py-4 px-4 font-bold text-purple-700">2</td>
                                <td class="py-4 px-4 font-black text-slate-900">SMAN 1 Kota Serang <span class="block text-[10px] font-bold text-purple-600">NPSN: 20601234</span></td>
                                <td class="py-4 px-4 text-slate-600">Kota Serang</td>
                                <td class="py-4 px-4">SMA</td>
                                <td class="py-4 px-4 font-bold">1,450</td>
                                <td class="py-4 px-4">
                                    <span class="bg-emerald-100 text-emerald-700 font-black text-[10px] px-3 py-1 rounded-full border border-emerald-200">Sinkron & Aktif</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-purple-50/50 transition-colors">
                                <td class="py-4 px-4 font-bold text-purple-700">3</td>
                                <td class="py-4 px-4 font-black text-slate-900">SLBN 1 Cilegon <span class="block text-[10px] font-bold text-purple-600">NPSN: 20609887</span></td>
                                <td class="py-4 px-4 text-slate-600">Kota Cilegon</td>
                                <td class="py-4 px-4">SLB</td>
                                <td class="py-4 px-4 font-bold">210</td>
                                <td class="py-4 px-4">
                                    <span class="bg-amber-100 text-amber-700 font-black text-[10px] px-3 py-1 rounded-full border border-amber-200">Pending Validasi</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-purple-50/50 transition-colors">
                                <td class="py-4 px-4 font-bold text-purple-700">4</td>
                                <td class="py-4 px-4 font-black text-slate-900">SMKN 2 Tangerang Selatan <span class="block text-[10px] font-bold text-purple-600">NPSN: 20615432</span></td>
                                <td class="py-4 px-4 text-slate-600">Tangerang Selatan</td>
                                <td class="py-4 px-4">SMK</td>
                                <td class="py-4 px-4 font-bold">1,380</td>
                                <td class="py-4 px-4">
                                    <span class="bg-emerald-100 text-emerald-700 font-black text-[10px] px-3 py-1 rounded-full border border-emerald-200">Sinkron & Aktif</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </main>

</body>
</html>