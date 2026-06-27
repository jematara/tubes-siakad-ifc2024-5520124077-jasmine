@extends('layouts.app')

@section('page_title', 'Tambah Kurikulum Mata Kuliah')

@section('content')
<div class="max-w-2xl bg-white p-8 rounded-xl shadow-xs border border-gray-200">
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h3 class="font-bold text-gray-800 text-lg">Formulir Mata Kuliah Baru</h3>
        <a href="{{ route('matakuliah.index') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700">← Kembali</a>
    </div>
    <form action="{{ route('matakuliah.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kode Mata Kuliah (Maks 8 Karakter)</label>
            <input type="text" name="kode_matakuliah" value="{{ old('kode_matakuliah') }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required placeholder="Contoh: IF-301">
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Mata Kuliah</label>
            <input type="text" name="nama_matakuliah" value="{{ old('nama_matakuliah') }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required placeholder="Contoh: Pemrograman Web Enterprise">
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Bobot SKS</label>
            <input type="number" name="sks" value="{{ old('sks') }}" min="1" max="3" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required placeholder="Contoh: 3">
        </div>
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-4 rounded-lg text-sm shadow-xs transition duration-200">Simpan Kurikulum</button>
    </form>
</div>
@endsection