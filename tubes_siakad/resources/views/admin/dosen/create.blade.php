@extends('layouts.app')

@section('page_title', 'Tambah Data Dosen')

@section('content')
<div class="max-w-2xl bg-white p-8 rounded-xl shadow-xs border border-gray-200">
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h3 class="font-bold text-gray-800 text-lg">Formulir Dosen Baru</h3>
        <a href="{{ route('dosen.index') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700">← Kembali</a>
    </div>
    <form action="{{ route('dosen.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">NIDN (10 Karakter)</label>
            <input type="text" name="nidn" value="{{ old('nidn') }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required placeholder="Contoh: 0412088501">
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Lengkap & Gelar</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required placeholder="Contoh: Dr. Ahmad Subagja, M.T.">
        </div>
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-4 rounded-lg text-sm shadow-xs transition duration-200">Simpan Data Dosen</button>
    </form>
</div>
@endsection