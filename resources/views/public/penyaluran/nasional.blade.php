<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPINTAR - Penyaluran Nasional</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts & Font Awesome Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f7ff;
            background-image: linear-gradient(to right, rgba(186, 230, 253, 0.25) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(186, 230, 253, 0.25) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        .card-clean {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.95);
        }

        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="text-slate-800 min-h-screen flex antialiased">

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col min-w-0 w-full p-6 sm:p-8 space-y-6 overflow-y-auto">
        
        <!-- TOP HEADER BAR -->
        <header class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 w-full">
            <div>
                <div class="flex items-center gap-2 text-xs font-extrabold text-blue-600 uppercase tracking-wider">
                    <span>BERANDA</span>
                    <span>/</span>
                    <span>DATA PENYALURAN</span>
                    <span>/</span>
                    <span>NASIONAL</span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mt-1">Penyaluran Nasional</h1>
                <p class="text-base font-semibold text-slate-500 mt-0.5">Rekapitulasi alokasi dan realisasi pencairan dana PIP tingkat nasional.</p>
            </div>
            
            <div class="flex items-center gap-3 self-end sm:self-center">
                <div class="flex items-center gap-3 bg-white px-3.5 py-2 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="w-8 h-8 rounded-xl bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center">
                        SD
                    </div>
                    <div class="text-left hidden md:block">
                        <p class="text-xs font-black text-slate-800 leading-tight">SDN 1 Bahagia Selatan</p>
                        <p class="text-[10px] font-bold text-emerald-600 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Terverifikasi
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <!-- BANNER DATA PENCAIRAN -->
        <div class="bg-emerald-50/90 border border-emerald-200 rounded-2xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-extrabold text-lg shadow-md shadow-emerald-500/20">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <div>
                    <h3 class="text-lg font-black text-emerald-950">Data Pencairan Terkini</h3>
                    <p class="text-xs font-bold text-emerald-700">Tanggal update batas pencairan masing-masing jenjang pendidikan</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl shadow-sm">
                    SD: <span class="text-rose-600">2026-07-15</span>
                </span>
                <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl shadow-sm">
                    SMP: <span class="text-rose-600">2026-07-15</span>
                </span>
                <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl shadow-sm">
                    SMA: <span class="text-rose-600">2026-06-30</span>
                </span>
                <span class="bg-white border border-emerald-200 text-emerald-900 text-xs font-black px-3 py-1.5 rounded-xl shadow-sm">
                    SMK: <span class="text-rose-600">2026-06-30</span>
                </span>
            </div>
        </div>

        <!-- CARD FILTER TERPISAH -->
        <div class="card-clean p-6 space-y-4 w-full">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg">
                        <i class="fa-solid fa-filter"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900">Filter Penyaluran</h2>
                        <p class="text-xs font-semibold text-slate-500">Pilih Tahun, Provinsi, Kabupaten, atau Kecamatan untuk menyaring data</p>
                    </div>
                </div>
                <button onclick="resetFilter()" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1.5">
                    <i class="fa-solid fa-rotate-right"></i> Reset Filter
                </button>
            </div>

            <!-- Form Filter Layout Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-1 items-end">
                <div class="space-y-1.5">
                    <label for="filterTahun" class="text-xs font-extrabold text-slate-500 uppercase tracking-wider block">Tahun</label>
                    <div class="relative">
                        <select id="filterTahun" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3 text-sm font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                            <option value="2026" selected>2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-3.5 text-slate-400 pointer-events-none text-xs"></i>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="filterProvinsi" class="text-xs font-extrabold text-slate-500 uppercase tracking-wider block">Provinsi</label>
                    <div class="relative">
                        <select id="filterProvinsi" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3 text-sm font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                            <option value="Semua" selected>(All)</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-3.5 text-slate-400 pointer-events-none text-xs"></i>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="filterKabupaten" class="text-xs font-extrabold text-slate-500 uppercase tracking-wider block">Kabupaten</label>
                    <div class="relative">
                        <select id="filterKabupaten" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3 text-sm font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                            <option value="Semua" selected>(All)</option>
                            <option value="Kab. Bandung">Kab. Bandung</option>
                            <option value="Kab. Bogor">Kab. Bogor</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-3.5 text-slate-400 pointer-events-none text-xs"></i>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="filterKecamatan" class="text-xs font-extrabold text-slate-500 uppercase tracking-wider block">Kecamatan</label>
                    <div class="flex items-center gap-2">
                        <div class="relative flex-1">
                            <select id="filterKecamatan" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-3 text-sm font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                                <option value="Semua" selected>(All)</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-3.5 text-slate-400 pointer-events-none text-xs"></i>
                        </div>
                        <button onclick="applyNationalFilter()" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-2xl text-sm transition-all shadow-md shadow-blue-600/20 flex items-center justify-center gap-2 whitespace-nowrap">
                            <i class="fa-solid fa-magnifying-glass"></i> Tampil
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- REKAPITULASI TABEL SISWA & DANA -->
        <div class="card-clean p-6 sm:p-7 space-y-6 w-full">
            
            <!-- HEADER REKAP SISWA -->
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900">Rekapitulasi Siswa Penerima</h2>
                        <p class="text-xs font-semibold text-slate-500">Rincian jumlah siswa alokasi dan realisasi pencairan berdasarkan jenjang</p>
                    </div>
                </div>
                <span class="text-xs font-extrabold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1.5 rounded-xl" id="badgeTahunSiswa">Tahun 2026</span>
            </div>

            <!-- TABEL SISWA -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse whitespace-nowrap min-w-[700px]">
                    <thead>
                        <tr class="bg-slate-100/80 text-slate-600 font-extrabold text-xs uppercase tracking-wider border-b border-slate-200">
                            <th class="p-4 rounded-l-xl">Jenjang</th>
                            <th class="p-4 text-right">Alokasi</th>
                            <th class="p-4 text-right">Disalurkan</th>
                            <th class="p-4 text-right">Pemberian</th>
                            <th class="p-4 text-right">Pemberian Dari Aktivasi Nominasi</th>
                            <th class="p-4 text-right rounded-r-xl">Pemberian Relaksasi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelSiswaBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800">
                        <!-- Dynamic JavaScript Render -->
                    </tbody>
                </table>
            </div>

            <hr class="border-slate-100 my-6">

            <!-- HEADER REKAP DANA -->
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-lg">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900">Rekapitulasi Dana (Rupiah)</h2>
                        <p class="text-xs font-semibold text-slate-500">Jumlah nominal alokasi dana sesuai data spreadsheet nasional</p>
                    </div>
                </div>
                <span class="text-xs font-extrabold text-emerald-600 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-xl" id="badgeTahunDana">Tahun 2026</span>
            </div>

            <!-- TABEL DANA/RUPIAH -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse whitespace-nowrap min-w-[700px]">
                    <thead>
                        <tr class="bg-slate-100/80 text-slate-600 font-extrabold text-xs uppercase tracking-wider border-b border-slate-200">
                            <th class="p-4 rounded-l-xl">Jenjang (Row Labels)</th>
                            <th class="p-4 text-right">Sum of Alokasi Dana (Rp)</th>
                            <th class="p-4 text-right rounded-r-xl">Sum of Jumlah Siswa Alokasi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelDanaBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800">
                        <!-- Dynamic JavaScript Render -->
                    </tbody>
                </table>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="text-xs text-slate-400 font-semibold pt-4 flex flex-col sm:flex-row justify-between items-center gap-2">
            <span>© 2020–2026 Puslapdik · Kemendikdasmen RI</span>
            <span>SIPINTAR – Sistem Informasi Program Indonesia Pintar</span>
        </div>

    </main>

    <!-- JAVASCRIPT DATA & LOGIC -->
    <script>
        const databaseNasional = {
            "2026": {
                siswa: [
                    { jenjang: "SD", alokasi: "10.360.614", disalurkan: "6.948.586", pemberian: "6.292.035", aktivasi: "656.551", relaksasi: "0" },
                    { jenjang: "SMP", alokasi: "4.369.968", disalurkan: "2.980.979", pemberian: "2.734.869", aktivasi: "246.110", relaksasi: "0" },
                    { jenjang: "SMA", alokasi: "1.935.774", disalurkan: "1.167.946", pemberian: "994.030", aktivasi: "173.916", relaksasi: "0" },
                    { jenjang: "SMK", alokasi: "1.928.271", disalurkan: "1.154.191", pemberian: "944.429", aktivasi: "209.762", relaksasi: "0" }
                ],
                totalSiswa: { alokasi: "18.594.627", disalurkan: "12.251.702", pemberian: "10.965.363", aktivasi: "1.286.339", relaksasi: "0" },
                dana: [
                    { jenjang: "SD", rupiah: "6.543.193.145", siswaAlokasi: "14.281" },
                    { jenjang: "SMA", rupiah: "22.890.992.249", siswaAlokasi: "22.619" },
                    { jenjang: "SMK", rupiah: "26.132.212.357", siswaAlokasi: "25.918" },
                    { jenjang: "SMP", rupiah: "14.847.358.584", siswaAlokasi: "19.475" }
                ],
                totalDana: { rupiah: "70.413.756.335", siswaAlokasi: "82.293" }
            },
            "2025": {
                siswa: [
                    { jenjang: "SD", alokasi: "9.850.000", disalurkan: "6.500.000", pemberian: "5.900.000", aktivasi: "600.000", relaksasi: "0" },
                    { jenjang: "SMP", alokasi: "4.100.000", disalurkan: "2.800.000", pemberian: "2.550.000", aktivasi: "250.000", relaksasi: "0" },
                    { jenjang: "SMA", alokasi: "1.800.000", disalurkan: "1.050.000", pemberian: "900.000", aktivasi: "150.000", relaksasi: "0" },
                    { jenjang: "SMK", alokasi: "1.850.000", disalurkan: "1.100.000", pemberian: "900.000", aktivasi: "200.000", relaksasi: "0" }
                ],
                totalSiswa: { alokasi: "17.600.000", disalurkan: "11.450.000", pemberian: "10.250.000", aktivasi: "1.200.000", relaksasi: "0" },
                dana: [
                    { jenjang: "SD", rupiah: "5.800.000.000", siswaAlokasi: "12.500" },
                    { jenjang: "SMA", rupiah: "20.100.000.000", siswaAlokasi: "20.000" },
                    { jenjang: "SMK", rupiah: "24.000.000.000", siswaAlokasi: "23.500" },
                    { jenjang: "SMP", rupiah: "13.200.000.000", siswaAlokasi: "17.800" }
                ],
                totalDana: { rupiah: "63.100.000.000", siswaAlokasi: "73.800" }
            },
            "2024": {
                siswa: [
                    { jenjang: "SD", alokasi: "9.200.000", disalurkan: "6.100.000", pemberian: "5.500.000", aktivasi: "600.000", relaksasi: "0" },
                    { jenjang: "SMP", alokasi: "3.900.000", disalurkan: "2.600.000", pemberian: "2.380.000", aktivasi: "220.000", relaksasi: "0" },
                    { jenjang: "SMA", alokasi: "1.700.000", disalurkan: "980.000", pemberian: "840.000", aktivasi: "140.000", relaksasi: "0" },
                    { jenjang: "SMK", alokasi: "1.750.000", disalurkan: "1.000.000", pemberian: "820.000", aktivasi: "180.000", relaksasi: "0" }
                ],
                totalSiswa: { alokasi: "16.550.000", disalurkan: "10.680.000", pemberian: "9.540.000", aktivasi: "1.140.000", relaksasi: "0" },
                dana: [
                    { jenjang: "SD", rupiah: "5.200.000.000", siswaAlokasi: "11.200" },
                    { jenjang: "SMA", rupiah: "18.500.000.000", siswaAlokasi: "18.200" },
                    { jenjang: "SMK", rupiah: "22.100.000.000", siswaAlokasi: "21.900" },
                    { jenjang: "SMP", rupiah: "12.000.000.000", siswaAlokasi: "16.000" }
                ],
                totalDana: { rupiah: "57.800.000.000", siswaAlokasi: "67.300" }
            }
        };

        function renderTables(tahun) {
            const dataSelected = databaseNasional[tahun] || databaseNasional["2026"];

            document.getElementById('badgeTahunSiswa').innerText = `Tahun ${tahun}`;
            document.getElementById('badgeTahunDana').innerText = `Tahun ${tahun}`;

            // RENDER TABEL SISWA
            const tbodySiswa = document.getElementById('tabelSiswaBody');
            tbodySiswa.innerHTML = '';

            dataSelected.siswa.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-blue-50/50 transition-all border-b border-slate-100';
                tr.innerHTML = `
                    <td class="p-4 font-bold text-slate-900">${item.jenjang}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.alokasi}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.disalurkan}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.pemberian}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.aktivasi}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.relaksasi}</td>
                `;
                tbodySiswa.appendChild(tr);
            });

            const trTotalSiswa = document.createElement('tr');
            trTotalSiswa.className = 'bg-blue-600 text-white font-extrabold text-base';
            trTotalSiswa.innerHTML = `
                <td class="p-4 rounded-l-xl">Total</td>
                <td class="p-4 text-right">${dataSelected.totalSiswa.alokasi}</td>
                <td class="p-4 text-right">${dataSelected.totalSiswa.disalurkan}</td>
                <td class="p-4 text-right">${dataSelected.totalSiswa.pemberian}</td>
                <td class="p-4 text-right">${dataSelected.totalSiswa.aktivasi}</td>
                <td class="p-4 text-right rounded-r-xl">${dataSelected.totalSiswa.relaksasi}</td>
            `;
            tbodySiswa.appendChild(trTotalSiswa);

            // RENDER TABEL DANA
            const tbodyDana = document.getElementById('tabelDanaBody');
            tbodyDana.innerHTML = '';

            dataSelected.dana.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-emerald-50/50 transition-all border-b border-slate-100';
                tr.innerHTML = `
                    <td class="p-4 font-bold text-slate-900">${item.jenjang}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">Rp ${item.rupiah}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.siswaAlokasi}</td>
                `;
                tbodyDana.appendChild(tr);
            });

            const trTotalDana = document.createElement('tr');
            trTotalDana.className = 'bg-slate-900 text-white font-extrabold text-base';
            trTotalDana.innerHTML = `
                <td class="p-4 rounded-l-xl">Grand Total</td>
                <td class="p-4 text-right text-emerald-400">Rp ${dataSelected.totalDana.rupiah}</td>
                <td class="p-4 text-right rounded-r-xl">${dataSelected.totalDana.siswaAlokasi}</td>
            `;
            tbodyDana.appendChild(trTotalDana);
        }

        function applyNationalFilter() {
            const tahun = document.getElementById('filterTahun').value;
            renderTables(tahun);
        }

        function resetFilter() {
            document.getElementById('filterTahun').value = "2026";
            document.getElementById('filterProvinsi').value = "Semua";
            document.getElementById('filterKabupaten').value = "Semua";
            document.getElementById('filterKecamatan').value = "Semua";
            renderTables("2026");
        }

        window.addEventListener('DOMContentLoaded', () => {
            renderTables("2026");
        });
    </script>
</body>
</html>