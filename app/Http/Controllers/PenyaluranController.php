<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyaluran; // Sesuaikan dengan model database milikmu

class PenyaluranController extends Controller
{
    public function getData(Request $request)
    {
        $query = Penyaluran::query();

        if ($request->has('tahun') && $request->tahun != 'Semua') {
            $query->where('tahun', $request->tahun);
        }
        if ($request->has('provinsi') && $request->provinsi != 'Semua') {
            $query->where('provinsi', $request->provinsi);
        }
        if ($request->has('kabupaten') && $request->kabupaten != 'Semua') {
            $query->where('kabupaten', $request->kabupaten);
        }
        if ($request->has('kecamatan') && $request->kecamatan != 'Semua') {
            $query->where('kecamatan', $request->kecamatan);
        }

        $data = $query->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}