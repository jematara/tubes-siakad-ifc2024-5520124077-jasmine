@extends('layouts.app')

@section('page_title', 'Master Data Mahasiswa')

@section('content')
<div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-800 text-lg">Daftar Mahasiswa Aktif</h3>
        <a href="{{ route('mahasiswa.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow-xs text-sm transition">+ Tambah Mahasiswa Baru</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-700 uppercase text-xs font-bold tracking-wider border-b border-gray-200">
                    <th class="p-4">NPM</th>
                    <th class="p-4">Nama Lengkap</th>
                    <th class="p-4">Dosen Wali</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($mahasiswa as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 font-mono font-bold text-gray-900 tracking-wide">{{ $item->npm }}</td>
                    <td class="p-4 font-semibold text-slate-800">{{ $item->nama }}</td>
                    <td class="p-4">
                        <div class="font-medium text-gray-700">{{ $item->dosen->nama }}</div>
                        <div class="text-xs text-gray-400 font-mono mt-0.5">NIDN: {{ $item->nidn }}</div>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('mahasiswa.edit', $item->npm) }}" class="text-amber-600 hover:text-amber-800 font-medium text-xs px-2.5 py-1.5 border border-amber-300 rounded-md bg-amber-50 hover:bg-amber-100 transition">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $item->npm) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:text-rose-800 font-medium text-xs px-2.5 py-1.5 border border-rose-300 rounded-md bg-rose-50 hover:bg-rose-100 transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-400 font-medium">Belum ada data mahasiswa yang terdaftar di sistem.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection