<?php

namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller; // IMPORT BASE CONTROLLER
use Illuminate\Http\Request;

class DinasController extends Controller
{
    /**
     * Tampilan Utama Dashboard Dinas
     */
    public function dashboard()
    {
        // Data ringkasan disesuaikan dengan key yang dipanggil di View
        $ringkasanDinas = [
            'total_sekolah'       => 128,
            'total_pemberian'     => 14500,
            'belum_aktivasi'      => 3740,
            'verifikasi_pending'  => 12,
            'persentase_aktivasi' => 74.2,
        ];

        // Variabel pendukung tampilan Blade Dinas
        $wilayahDinas = 'Kabupaten / Kota';
        $narasiAnalisisDinas = "Progres aktivasi rekening PIP di wilayah Anda telah mencapai 74.2% dari total 14.500 penerima SK Pemberian. Kecamatan dengan tingkat aktivasi tertunda tertinggi memerlukan monitoring langsung.";
        
        // Sample data progres per kecamatan
        $progresKecamatan = [
            (object)[
                'nama_kecamatan' => 'Kec. Cibinong',
                'persentase'     => 85,
                'teraktivasi'    => 1200,
                'total'          => 1411
            ],
            (object)[
                'nama_kecamatan' => 'Kec. Citeureup',
                'persentase'     => 62,
                'teraktivasi'    => 800,
                'total'          => 1290
            ],
            (object)[
                'nama_kecamatan' => 'Kec. Cileungsi',
                'persentase'     => 74,
                'teraktivasi'    => 950,
                'total'          => 1283
            ],
        ];

        $tiketAktif = 5;

        return view('dinas.dashboard', compact(
            'ringkasanDinas',
            'wilayahDinas',
            'narasiAnalisisDinas',
            'progresKecamatan',
            'tiketAktif'
        ));
    }

    /**
     * Tampilan Data PIP
     */
    public function datapip()
    {
        return view('dinas.datapip');
    }

    /**
     * Tampilan Pemantauan Aktivasi & Penyaluran
     */
    public function pemantauan()
    {
        return view('dinas.pemantauan');
    }

    /**
     * Tampilan Rekapitulasi Data
     */
    public function rekap()
    {
        return view('dinas.rekap');
    }

    /**
     * Tampilan Verifikasi Usulan
     */
    public function verifikasi()
    {
        return view('dinas.verifikasi');
    }

    /**
     * Tampilan Manajemen Dokumen
     */
    public function dokumen()
    {
        return view('dinas.dokumen');
    }

    /**
     * Fitur Tiket Pengaduan Dua Arah (Dinas <-> Admin Pusat)
     */
    public function pengaduan()
    {
        // Sample data tiket pengaduan
        $daftarTiket = [
            [
                'id' => 'TKT-2026-001',
                'subjek' => 'Kendala Perubahan Rekening Siswa SMK Negeri 1',
                'kategori' => 'Aktivasi Rekening',
                'status' => 'Diproses Pusat',
                'tanggal' => '2026-07-10',
            ],
            [
                'id' => 'TKT-2026-002',
                'subjek' => 'Siswa SK Nominasi Belum Terdata di Rekap Kecamatan',
                'kategori' => 'Data Siswa',
                'status' => 'Selesai',
                'tanggal' => '2026-07-05',
            ]
        ];

        return view('dinas.pengaduan', compact('daftarTiket'));
    }

    /**
     * Tampilan Status dan Riwayat
     */
    public function status()
    {
        return view('dinas.status');
    }

    /**
     * Fitur Rekap Dinamis & Riwayat Unduhan Data
     */
    public function rekapDinamis()
    {
        // Sample data riwayat unduhan
        $riwayatUnduhan = [
            [
                'nama_file' => 'Rekap_PIP_Kecamatan_Cibinong_2026.xlsx',
                'tanggal' => '2026-07-14 10:30',
                'ukuran' => '2.4 MB'
            ],
            [
                'nama_file' => 'Data_Siswa_Belum_Aktivasi_SMA_2026.csv',
                'tanggal' => '2026-07-12 14:15',
                'ukuran' => '1.1 MB'
            ]
        ];

        return view('dinas.rekap-dinamis', compact('riwayatUnduhan'));
    }
}