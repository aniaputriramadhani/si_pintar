<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPINTAR - Penyaluran Wilayah</title>
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
                    <span>WILAYAH</span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mt-1">Penyaluran Wilayah</h1>
                <p class="text-base font-semibold text-slate-500 mt-0.5">Rincian alokasi dana dan penerima berdasarkan jenjang pendidikan di wilayah Anda.</p>
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

        <!-- CARD 1: FILTER TAHUN TERPISAH (DESIGN COCHOK NASIONAL) -->
        <div class="card-clean p-6 space-y-4 w-full">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg">
                        <i class="fa-solid fa-filter"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900">Filter Data Wilayah</h2>
                        <p class="text-xs font-semibold text-slate-500">Pilih tahun untuk memperbarui tampilan data penyaluran seluruh wilayah</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <label for="filterTahunWilayah" class="text-xs font-extrabold text-slate-500 uppercase tracking-wider whitespace-nowrap">Tahun:</label>
                    <div class="relative w-44">
                        <select id="filterTahunWilayah" onchange="renderWilayahTable()" class="w-full bg-slate-50 border border-slate-300 rounded-2xl px-4 py-2.5 text-sm font-bold text-slate-800 focus:outline-none focus:border-blue-500 appearance-none cursor-pointer shadow-sm">
                            <option value="2026" selected>2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-3 text-slate-400 pointer-events-none text-xs"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: TABEL DATA PENYALURAN WILAYAH -->
        <div class="card-clean p-6 sm:p-7 space-y-6 w-full">
            
            <!-- Header Card -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg">
                        <i class="fa-solid fa-table-list"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-slate-900">Data Penyaluran Per Wilayah</h3>
                        <p class="text-xs font-semibold text-slate-500">Rincian alokasi dana dan penerima berdasarkan jenjang pendidikan</p>
                    </div>
                </div>
                <button class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-sm px-5 py-2.5 rounded-2xl transition shadow-md shadow-blue-600/20">
                    <i class="fa-solid fa-download"></i>
                    Download Data
                </button>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse whitespace-nowrap min-w-[700px]">
                    <thead>
                        <tr class="bg-slate-100/80 text-slate-600 font-extrabold text-xs uppercase tracking-wider border-b border-slate-200">
                            <th class="p-4 rounded-l-xl">Jenjang</th>
                            <th class="p-4 text-right">Disalurkan</th>
                            <th class="p-4 text-right">Pemberian</th>
                            <th class="p-4 text-right">Aktivasi Nominasi</th>
                            <th class="p-4 text-right rounded-r-xl">Relaksasi</th>
                        </tr>
                    </thead>
                    <tbody id="tableWilayahBody" class="divide-y divide-slate-100 text-base font-semibold text-slate-800">
                        <!-- Content rendered by JS -->
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
        const databaseWilayah = {
            "2026": [
                { jenjang: "SD", disalurkan: "6.948.586", pemberian: "6.292.035", aktivasi: "656.551", relaksasi: "0" },
                { jenjang: "SMP", disalurkan: "2.980.979", pemberian: "2.734.869", aktivasi: "246.110", relaksasi: "0" },
                { jenjang: "SMA", disalurkan: "1.167.946", pemberian: "994.030", aktivasi: "173.916", relaksasi: "0" },
                { jenjang: "SMK", disalurkan: "1.154.191", pemberian: "944.429", aktivasi: "209.762", relaksasi: "0" }
            ],
            "2025": [
                { jenjang: "SD", disalurkan: "6.500.000", pemberian: "5.900.000", aktivasi: "600.000", relaksasi: "0" },
                { jenjang: "SMP", disalurkan: "2.800.000", pemberian: "2.550.000", aktivasi: "250.000", relaksasi: "0" },
                { jenjang: "SMA", disalurkan: "1.050.000", pemberian: "900.000", aktivasi: "150.000", relaksasi: "0" },
                { jenjang: "SMK", disalurkan: "1.100.000", pemberian: "900.000", aktivasi: "200.000", relaksasi: "0" }
            ],
            "2024": [
                { jenjang: "SD", disalurkan: "6.100.000", pemberian: "5.500.000", aktivasi: "600.000", relaksasi: "0" },
                { jenjang: "SMP", disalurkan: "2.600.000", pemberian: "2.380.000", aktivasi: "220.000", relaksasi: "0" },
                { jenjang: "SMA", disalurkan: "980.000", pemberian: "840.000", aktivasi: "140.000", relaksasi: "0" },
                { jenjang: "SMK", disalurkan: "1.000.000", pemberian: "820.000", aktivasi: "180.000", relaksasi: "0" }
            ]
        };

        function renderWilayahTable() {
            const tahun = document.getElementById('filterTahunWilayah').value;
            const dataList = databaseWilayah[tahun] || databaseWilayah["2026"];
            const tbody = document.getElementById('tableWilayahBody');
            tbody.innerHTML = '';

            let totalDisalurkan = 0, totalPemberian = 0, totalAktivasi = 0, totalRelaksasi = 0;

            dataList.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-blue-50/50 transition-all border-b border-slate-100';
                tr.innerHTML = `
                    <td class="p-4 font-bold text-slate-900">${item.jenjang}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.disalurkan}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.pemberian}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.aktivasi}</td>
                    <td class="p-4 text-right font-semibold text-slate-800">${item.relaksasi}</td>
                `;
                tbody.appendChild(tr);
            });
        }

        window.addEventListener('DOMContentLoaded', () => {
            renderWilayahTable();
        });
    </script>
</body>
</html>