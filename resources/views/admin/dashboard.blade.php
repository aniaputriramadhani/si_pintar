<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrator - SIPINTAR Kemendikdasmen</title>
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
    <aside class="w-72 glass-panel border-r-2 border-purple-200/80 min-h-screen hidden lg:flex flex-col justify-between p-6 z-20 sticky top-0 overflow-y-auto">
        <div>
            <!-- Sidebar Brand -->
            <div class="flex items-center gap-3 px-2 mb-8">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-600 to-pink-500 flex items-center justify-center text-white font-black text-xl shadow-md transform -rotate-3">
                    🎓
                </div>
                <div>
                    <h2 class="font-black text-slate-900 text-base tracking-tight">SIPINTAR</h2>
                    <p class="text-[11px] font-bold text-purple-700">Administrator Pusat</p>
                </div>
            </div>

            <!-- Navigation Links Sesuai Notula (Admin Point 3) -->
            <nav class="space-y-1.5">
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl bg-purple-600 text-white font-bold text-sm shadow-md transition-all">
                    <span>📊</span> <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>📂</span> <span>Data PIP</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>👀</span> <span>Pemantauan</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>📈</span> <span>Rekap</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>✅</span> <span>Verifikasi</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>📄</span> <span>Dokumen</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>🎧</span> <span>Layanan</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>🏦</span> <span>Bank</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>👥</span> <span>Pengguna</span>
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-600 hover:text-purple-700 hover:bg-purple-100/60 font-bold text-sm transition-all">
                    <span>⚙️</span> <span>Sistem</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer / Logout -->
        <div class="pt-6 mt-6 border-t-2 border-purple-100">
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3.5 rounded-2xl bg-rose-50 hover:bg-rose-100 border-2 border-rose-200 text-rose-600 font-black text-xs transition-all shadow-sm">
                <span>🚪</span> <span>Keluar Sistem</span>
            </button>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0">
        
        <!-- Top Navbar -->
        <header class="glass-panel border-b-2 border-purple-200/80 px-6 sm:px-10 py-5 flex items-center justify-between sticky top-0 z-10 backdrop-blur-xl">
            <div class="flex items-center gap-4">
                <div class="lg:hidden w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-purple-700 font-bold">🎓</div>
                <div>
                    <h1 class="text-lg sm:text-xl font-black text-slate-900 tracking-tight">Dashboard Terpadu</h1>
                    <p class="text-xs font-bold text-slate-500">Pusat Kendali Penyaluran PIP Nasional</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <select class="bg-purple-50/80 border-2 border-purple-200 text-slate-800 text-xs font-bold rounded-2xl px-4 py-2.5 outline-none focus:border-purple-600 transition-all shadow-sm hidden sm:block">
                    <option>Tahun Penyaluran 2026</option>
                    <option>Tahun Penyaluran 2025</option>
                </select>

                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-black text-slate-900">Admin Pusat</span>
                    <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">Super Administrator</span>
                </div>
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-cyan-400 to-blue-500 p-0.5 shadow-sm">
                    <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center font-black text-sm text-blue-600">
                        👨‍💻
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Body Content -->
        <div class="p-6 sm:p-10 space-y-8 max-w-7xl mx-auto w-full">

            <!-- Analisa Data Terpadu (Notula Point 1) -->
            <div class="glass-panel p-6 sm:p-8 rounded-[32px] relative overflow-hidden bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-emerald-400/10 border-2 border-purple-200">
                <div class="absolute -right-10 -bottom-10 text-9xl opacity-10 pointer-events-none">🤖</div>
                <div class="relative z-10 flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
                    <div class="flex-1">
                        <span class="bg-indigo-600 text-white font-black text-[10px] px-3 py-1.5 rounded-full shadow-sm uppercase tracking-wider badge-genz inline-flex items-center gap-1.5 mb-4">
                            <span>✨</span> Panel Analisa Data
                        </span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900 mb-2">Status Penyaluran Nasional Terkini</h2>
                        <p class="text-slate-700 text-sm font-semibold leading-relaxed max-w-3xl">
                            Penyaluran PIP menunjukkan progres positif sebesar <strong class="text-emerald-600">97%</strong> untuk siswa. Terdapat <strong class="text-purple-700">11.250.587</strong> siswa dalam SK Pemberian dari total alokasi <strong class="text-indigo-600">19.482.627</strong> siswa. Total dana disalurkan menembus <strong class="text-pink-600">Rp7.047 Triliun</strong>. Rekomendasi: Percepat pemantauan aktivasi rekening pada 5 provinsi terendah.
                        </p>
                    </div>
                    <div class="shrink-0 bg-white/60 p-4 rounded-2xl border border-purple-100 shadow-sm text-center">
                        <div class="text-xs font-bold text-slate-500 mb-1">Update Terakhir</div>
                        <div class="text-sm font-black text-slate-900">Hari ini, 09:45 WIB</div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats Grid (Data Admin PIP) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Alokasi -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-blue-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            👥
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-blue-100 text-blue-700">Total Pagu</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-1">19.482.627</h3>
                    <p class="text-slate-500 text-xs font-bold">Total Dana: <span class="text-blue-600">Rp13.364 T</span></p>
                </div>

                <!-- SK Pemberian -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-emerald-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            📄
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700">SK Penerbitan</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mb-1">11.250.587</h3>
                    <p class="text-slate-500 text-xs font-bold">Pemberian: <span class="text-emerald-600">10.963.903</span> Siswa</p>
                </div>

                <!-- Progres Siswa -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-amber-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            📈
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-amber-100 text-amber-700">Pencapaian Siswa</span>
                    </div>
                    <div class="flex items-end gap-2 mb-2">
                        <h3 class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">97%</h3>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2 mt-2 mb-1 overflow-hidden">
                        <div class="bg-gradient-to-r from-amber-400 to-emerald-400 h-2 rounded-full" style="width: 97%"></div>
                    </div>
                </div>

                <!-- Progres Dana -->
                <div class="glass-panel p-6 rounded-[28px] border-2 border-rose-200/80 shadow-sm relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center font-black text-xl group-hover:scale-110 transition-transform">
                            💰
                        </div>
                        <span class="text-[10px] font-black px-2.5 py-1 rounded-full bg-rose-100 text-rose-700">Pencairan Dana</span>
                    </div>
                    <div class="flex items-end gap-2 mb-2">
                        <h3 class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">98.18%</h3>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2 mt-2 mb-1 overflow-hidden">
                        <div class="bg-gradient-to-r from-rose-400 to-pink-500 h-2 rounded-full" style="width: 98.18%"></div>
                    </div>
                </div>

            </div>

            <!-- Pekerjaan Prioritas (Tindak Lanjut Admin - Notula Point 1) & Detail Jenjang -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                
                <!-- Pekerjaan Prioritas -->
                <div class="glass-panel p-6 sm:p-8 rounded-[32px] border-2 border-purple-200/80 shadow-sm xl:col-span-1">
                    <h3 class="text-lg font-black text-slate-900 mb-1 flex items-center gap-2">
                        <span>⚡</span> Pekerjaan Prioritas
                    </h3>
                    <p class="text-xs font-bold text-slate-500 mb-6">Tugas yang memerlukan tindak lanjut segera</p>
                    
                    <div class="space-y-4">
                        <div class="bg-white/60 p-4 rounded-2xl border border-rose-100 hover:border-rose-300 transition-colors cursor-pointer group">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-xs font-black text-rose-600 bg-rose-100 px-2 py-0.5 rounded">Tenggat Mendekat</span>
                                <span class="text-slate-400 group-hover:text-rose-500">➔</span>
                            </div>
                            <h4 class="font-bold text-sm text-slate-900">Verifikasi 24.500 Usulan Tertunda</h4>
                            <p class="text-xs text-slate-500 mt-1">Batas akhir tahap ini pada 20 Juli 2026</p>
                        </div>

                        <div class="bg-white/60 p-4 rounded-2xl border border-amber-100 hover:border-amber-300 transition-colors cursor-pointer group">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-xs font-black text-amber-600 bg-amber-100 px-2 py-0.5 rounded">Monitoring Bank</span>
                                <span class="text-slate-400 group-hover:text-amber-500">➔</span>
                            </div>
                            <h4 class="font-bold text-sm text-slate-900">Antrean SP2D Bank BRI (Tahap 4)</h4>
                            <p class="text-xs text-slate-500 mt-1">Status: Tertunda karena validasi sistem</p>
                        </div>

                        <div class="bg-white/60 p-4 rounded-2xl border border-purple-100 hover:border-purple-300 transition-colors cursor-pointer group">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-xs font-black text-purple-600 bg-purple-100 px-2 py-0.5 rounded">Layanan Pengaduan</span>
                                <span class="text-slate-400 group-hover:text-purple-500">➔</span>
                            </div>
                            <h4 class="font-bold text-sm text-slate-900">142 Tiket Pengaduan Baru</h4>
                            <p class="text-xs text-slate-500 mt-1">Berasal dari pengguna Dinas tingkat Kab/Kota</p>
                        </div>
                    </div>
                </div>

                <!-- Detail Rekap per Jenjang -->
                <div class="glass-panel p-6 sm:p-8 rounded-[32px] border-2 border-purple-200/80 shadow-sm xl:col-span-2">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <div>
                            <h3 class="text-lg font-black text-slate-900 flex items-center gap-2">
                                <span>🏫</span> Detail Rekap per Jenjang
                            </h3>
                            <p class="text-xs font-bold text-slate-500 mt-0.5">Alokasi, SK Pemberian, dan progres penyaluran</p>
                        </div>
                        <button class="bg-purple-100 hover:bg-purple-200 text-purple-700 font-black px-4 py-2.5 rounded-xl text-xs transition-colors flex items-center gap-2">
                            <span>⬇️ Ekspor Excel</span>
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[600px]">
                            <thead>
                                <tr class="border-b-2 border-purple-200 text-purple-800 text-[11px] font-black uppercase tracking-wider">
                                    <th class="py-4 px-3">Jenjang</th>
                                    <th class="py-4 px-3 text-right">Alokasi</th>
                                    <th class="py-4 px-3 text-right">SK Pemberian</th>
                                    <th class="py-4 px-3 text-right">Jml SK</th>
                                    <th class="py-4 px-3 text-right">Jumlah Dana</th>
                                    <th class="py-4 px-3 w-40">Progres %</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-semibold text-slate-700 divide-y divide-purple-100/60">
                                <tr class="hover:bg-purple-50/50 transition-colors">
                                    <td class="py-3.5 px-3 flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                                        <span class="font-black text-slate-900">SD</span>
                                    </td>
                                    <td class="py-3.5 px-3 text-right">10.360.614</td>
                                    <td class="py-3.5 px-3 text-right font-bold text-emerald-600">7.151.171</td>
                                    <td class="py-3.5 px-3 text-right">110</td>
                                    <td class="py-3.5 px-3 text-right">Rp2.94 T</td>
                                    <td class="py-3.5 px-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 69.0%"></div>
                                            </div>
                                            <span class="text-[10px] font-black w-8">69.0%</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-purple-50/50 transition-colors">
                                    <td class="py-3.5 px-3 flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                                        <span class="font-black text-slate-900">SMP</span>
                                    </td>
                                    <td class="py-3.5 px-3 text-right">3.816.709</td>
                                    <td class="py-3.5 px-3 text-right font-bold text-emerald-600">2.520.078</td>
                                    <td class="py-3.5 px-3 text-right">108</td>
                                    <td class="py-3.5 px-3 text-right">Rp4.83 T</td>
                                    <td class="py-3.5 px-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-purple-500 h-1.5 rounded-full" style="width: 66.0%"></div>
                                            </div>
                                            <span class="text-[10px] font-black w-8">66.0%</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-purple-50/50 transition-colors">
                                    <td class="py-3.5 px-3 flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-cyan-500"></span>
                                        <span class="font-black text-slate-900">SMA</span>
                                    </td>
                                    <td class="py-3.5 px-3 text-right">3.039.164</td>
                                    <td class="py-3.5 px-3 text-right font-bold text-emerald-600">2.007.411</td>
                                    <td class="py-3.5 px-3 text-right">86</td>
                                    <td class="py-3.5 px-3 text-right">Rp3.85 T</td>
                                    <td class="py-3.5 px-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-cyan-500 h-1.5 rounded-full" style="width: 66.1%"></div>
                                            </div>
                                            <span class="text-[10px] font-black w-8">66.1%</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-purple-50/50 transition-colors">
                                    <td class="py-3.5 px-3 flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                        <span class="font-black text-slate-900">SMK</span>
                                    </td>
                                    <td class="py-3.5 px-3 text-right">1.378.140</td>
                                    <td class="py-3.5 px-3 text-right font-bold text-emerald-600">911.197</td>
                                    <td class="py-3.5 px-3 text-right">39</td>
                                    <td class="py-3.5 px-3 text-right">Rp1.74 T</td>
                                    <td class="py-3.5 px-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-amber-500 h-1.5 rounded-full" style="width: 66.1%"></div>
                                            </div>
                                            <span class="text-[10px] font-black w-8">66.1%</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </main>

</body>
</html>