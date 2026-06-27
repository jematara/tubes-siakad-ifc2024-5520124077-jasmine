@extends('layouts.app')

@section('page_title', 'Dashboard Utama Administrator')

@section('content')
<div class="space-y-8">
    <div class="bg-linear-to-r from-indigo-600 to-purple-600 rounded-2xl p-6 md:p-8 text-white shadow-md">
        <h2 class="text-2xl md:text-3xl font-black tracking-tight">Selamat Datang, Admin!</h2>
        <p class="text-indigo-100 text-sm md:text-base mt-2 max-w-xl">Gunakan panel di bawah ini untuk memantau status sistem dan memperbarui data perkuliahan.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Dosen</p>
                <h3 class="text-2xl font-black text-gray-800 mt-1">2</h3>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md mt-2 inline-block">Aktif Mengajar</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Mahasiswa</p>
                <h3 class="text-2xl font-black text-gray-800 mt-1">2</h3>
                <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-md mt-2 inline-block">Terdaftar Aktif</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Mata Kuliah</p>
                <h3 class="text-2xl font-black text-gray-800 mt-1">2</h3>
                <span class="text-xs font-semibold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md mt-2 inline-block">Kurikulum Aktif</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Slot Jadwal</p>
                <h3 class="text-2xl font-black text-gray-800 mt-1">2</h3>
                <span class="text-xs font-semibold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-md mt-2 inline-block">Terintegrasi</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6">
        <h3 class="font-bold text-gray-800 text-lg mb-4 border-b pb-2">Shortcut</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('dosen.create') }}" class="p-4 border border-gray-200 rounded-xl hover:border-indigo-500 hover:bg-indigo-50/30 transition text-center group">
                <span class="block text-sm font-bold text-gray-700 group-hover:text-indigo-600">+ Entri Dosen</span>
            </a>
            <a href="{{ route('mahasiswa.create') }}" class="p-4 border border-gray-200 rounded-xl hover:border-indigo-500 hover:bg-indigo-50/30 transition text-center group">
                <span class="block text-sm font-bold text-gray-700 group-hover:text-indigo-600">+ Entri Mahasiswa</span>
            </a>
            <a href="{{ route('matakuliah.create') }}" class="p-4 border border-gray-200 rounded-xl hover:border-indigo-500 hover:bg-indigo-50/30 transition text-center group">
                <span class="block text-sm font-bold text-gray-700 group-hover:text-indigo-600">+ Entri Mata Kuliah</span>
            </a>
            <a href="{{ route('jadwal.create') }}" class="p-4 border border-gray-200 rounded-xl hover:border-indigo-500 hover:bg-indigo-50/30 transition text-center group">
                <span class="block text-sm font-bold text-gray-700 group-hover:text-indigo-600">+ Susun Jadwal Baru</span>
            </a>
        </div>
    </div>
</div>
@endsection