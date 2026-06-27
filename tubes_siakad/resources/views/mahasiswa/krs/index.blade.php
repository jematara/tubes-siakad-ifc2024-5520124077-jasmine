@extends('layouts.app')
@section('page_title', 'Kartu Rencana Studi (KRS)')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-200 h-fit">
        <h3 class="font-bold text-gray-800 text-lg mb-4 border-b pb-2">Ambil Kelas Kuliah</h3>
        <form action="{{ route('krs.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Mata Kuliah Tersedia</label>
                <select name="kode_matakuliah" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2.5" required>
                    <option value="" disabled selected>-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliah_tersedia as $mk)
                        <option value="{{ $mk->kode_matakuliah }}">{{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS)</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm shadow-xs transition duration-200">Daftarkan ke KRS Saya</button>
        </form>
    </div>
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden">
            <div class="p-6 bg-gray-50 border-b border-gray-200">
                <h3 class="font-bold text-gray-800 text-lg">Mata Kuliah dalam KRS Anda</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100 text-slate-700 uppercase text-xs font-bold border-b border-gray-200">
                            <th class="p-4">Kode MK</th>
                            <th class="p-4">Nama Mata Kuliah</th>
                            <th class="p-4 text-center">Beban SKS</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @forelse($krs as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 font-mono font-bold text-xs text-indigo-600">{{ $item->kode_matakuliah }}</td>
                            <td class="p-4 font-medium text-gray-900">{{ $item->matakuliah->nama_matakuliah }}</td>
                            <td class="p-4 text-center font-bold">{{ $item->matakuliah->sks }}</td>
                            <td class="p-4 text-center">
                                <form action="{{ route('krs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda ingin membatalkan mata kuliah ini (Drop)?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline text-xs font-bold">Batalkan (Drop)</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-400 font-medium">Anda belum mengambil mata kuliah apa pun untuk semester ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-xs border border-gray-200 overflow-hidden">
            <div class="p-6 bg-gray-50 border-b border-gray-200">
                <h3 class="font-bold text-gray-800 text-md">Sinkronisasi Jadwal Rencana Kuliah Anda</h3>
            </div>
            <div class="p-6 space-y-4">
                @forelse($jadwal_saya as $jdwl)
                    <div class="flex justify-between items-center p-4 bg-indigo-50/50 border border-indigo-100 rounded-xl">
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">{{ $jdwl->matakuliah->nama_matakuliah }} (<span class="text-indigo-600">{{ $jdwl->kelas }}</span>)</h4>
                            <p class="text-xs text-gray-500 mt-1">Dosen: <span class="font-medium text-gray-700">{{ $jdwl->dosen->nama }}</span></p>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 bg-indigo-600 text-white text-xs font-bold rounded-full shadow-xs">{{ $jdwl->hari }}</span>
                            <p class="text-xs font-mono font-bold text-indigo-700 mt-2">{{ date('H:i', strtotime($jdwl->jam_mulai)) }} - {{ date('H:i', strtotime($jdwl->jam_selesai)) }} WIB</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-sm text-gray-400">Jadwal kuliah akan otomatis tampil setelah Anda menambahkan mata kuliah di atas.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection