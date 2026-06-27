@extends('layouts.app')

@section('page_title', 'Manajemen Jadwal Kuliah')

@section('content')
<div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-800 text-lg">Daftar Slot Jadwal Mengajar</h3>
        <a href="{{ route('jadwal.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow-xs text-sm transition">+ Tambah Jadwal Baru</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-700 uppercase text-xs font-bold tracking-wider border-b border-gray-200">
                    <th class="p-4">Mata Kuliah</th>
                    <th class="p-4">Dosen Pengajar</th>
                    <th class="p-4 text-center">Kelas</th>
                    <th class="p-4">Waktu</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($jadwal as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        <div class="font-semibold text-gray-900">{{ $item->matakuliah->nama_matakuliah }}</div>
                        <div class="text-xs text-gray-500 font-mono mt-0.5">{{ $item->kode_matakuliah }}</div>
                    </td>
                    <td class="p-4 font-medium text-gray-800">{{ $item->dosen->nama }}</td>
                    <td class="p-4 text-center"><span class="px-2.5 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-md">{{ $item->kelas }}</span></td>
                    <td class="p-4">
                        <span class="font-semibold text-slate-800">{{ $item->hari }}</span>
                        <div class="text-xs text-indigo-600 font-medium mt-0.5">{{ date('H:i', strtotime($item->jam_mulai)) }} - {{ date('H:i', strtotime($item->jam_selesai)) }} WIB</div>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('jadwal.edit', $item->id) }}" class="text-amber-600 hover:text-amber-800 font-medium text-xs px-2.5 py-1.5 border border-amber-300 rounded-md bg-amber-50 hover:bg-amber-100 transition">Edit</a>
                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:text-rose-800 font-medium text-xs px-2.5 py-1.5 border border-rose-300 rounded-md bg-rose-50 hover:bg-rose-100 transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-400 font-medium">Belum ada data jadwal yang terdaftar di sistem.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection