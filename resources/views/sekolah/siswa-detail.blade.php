@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Detail Siswa - NISN: {{ $nisn }}</h2>
        
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="p-4 bg-blue-50 rounded-lg border border-blue-100">
                <span class="text-xs text-blue-600 font-semibold uppercase tracking-wider">Status SK</span>
                <p class="text-lg font-bold text-blue-900 mt-1">SK Nominasi 2026</p>
            </div>
            <div class="p-4 bg-amber-50 rounded-lg border border-amber-100">
                <span class="text-xs text-amber-600 font-semibold uppercase tracking-wider">Status Aktivasi</span>
                <p class="text-lg font-bold text-amber-900 mt-1">Belum Aktivasi</p>
            </div>
        </div>

        <div class="border-t pt-5 flex flex-wrap gap-4 items-center justify-between">
            <a href="#" class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium text-sm transition">
                📄 Cetak Surat Pengantar Aktivasi
            </a>

            <form action="{{ route('sekolah.siswa.upload', $nisn) }}" method="POST" enctype="multipart/form-data" class="flex gap-2 items-center">
                @csrf
                <input type="file" name="berkas_aktivasi" class="border rounded-lg p-1.5 text-sm bg-gray-50" required>
                <button type="submit" class="px-5 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-medium text-sm transition">
                    ⬆️ Unggah Berkas
                </button>
            </form>
        </div>
    </div>
</div>
@endsection