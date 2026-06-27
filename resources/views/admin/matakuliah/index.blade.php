@extends('layouts.app')

@section('page_title', 'Master Data Mata Kuliah')

@section('content')
<div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-800 text-lg">Kurikulum Mata Kuliah</h3>
        <a href="{{ route('matakuliah.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow-xs text-sm transition">+ Tambah Mata Kuliah</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-700 uppercase text-xs font-bold tracking-wider border-b border-gray-200">
                    <th class="p-4 w-1/4">Kode MK</th>
                    <th class="p-4">Nama Mata Kuliah</th>
                    <th class="p-4 text-center w-1/6">Bobot SKS</th>
                    <th class="p-4 text-center w-1/4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($matakuliah as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 font-mono font-bold text-xs text-indigo-600 tracking-wide">{{ $item->kode_matakuliah }}</td>
                    <td class="p-4 font-semibold text-gray-900">{{ $item->nama_matakuliah }}</td>
                    <td class="p-4 text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">{{ $item->sks }} SKS</span>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('matakuliah.edit', $item->kode_matakuliah) }}" class="text-amber-600 hover:text-amber-800 font-medium text-xs px-2.5 py-1.5 border border-amber-300 rounded-md bg-amber-50 hover:bg-amber-100 transition">Edit</a>
                            <form action="{{ route('matakuliah.destroy', $item->kode_matakuliah) }}" method="POST" onsubmit="return confirm('Menghapus kurikulum ini akan berdampak pada KRS mahasiswa. Lanjutkan?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:text-rose-800 font-medium text-xs px-2.5 py-1.5 border border-rose-300 rounded-md bg-rose-50 hover:bg-rose-100 transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-400 font-medium">Belum ada kurikulum mata kuliah terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection