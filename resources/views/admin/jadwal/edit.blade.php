@extends('layouts.app')

@section('page_title', 'Ubah Alokasi Jadwal Kuliah')

@section('content')
<div class="max-w-2xl bg-white p-8 rounded-xl shadow-xs border border-gray-200">
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h3 class="font-bold text-gray-800 text-lg">Perbarui Alokasi Jadwal</h3>
        <a href="{{ route('jadwal.index') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700">← Kembali</a>
    </div>
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Mata Kuliah</label>
            <select name="kode_matakuliah" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required>
                @foreach($matakuliah as $mk)
                    <option value="{{ $mk->kode_matakuliah }}" {{ old('kode_matakuliah', $jadwal->kode_matakuliah) == $mk->kode_matakuliah ? 'selected' : '' }}>{{ $mk->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Dosen Pengajar</label>
            <select name="nidn" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required>
                @foreach($dosen as $dsn)
                    <option value="{{ $dsn->nidn }}" {{ old('nidn', $jadwal->nidn) == $dsn->nidn ? 'selected' : '' }}>{{ $dsn->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Hari</label>
                <select name="hari" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required>
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h)
                        <option value="{{ $h }}" {{ old('hari', $jadwal->hari) == $h ? 'selected' : '' }}>{{ $h }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Ruang Kelas (A-C)</label>
                <input type="text" name="kelas" value="{{ old('kelas', $jadwal->kelas) }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Jam Mulai (Timelapse)</label>
                <input type="time" name="jam_mulai" value="{{ old('jam_mulai', date('H:i', strtotime($jadwal->jam_mulai))) }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Jam Selesai (Timelapse)</label>
                <input type="time" name="jam_selesai" value="{{ old('jam_selesai', date('H:i', strtotime($jadwal->jam_selesai))) }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-2.5 outline-none transition" required>
            </div>
        </div>
        <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-2.5 px-4 rounded-lg text-sm shadow-xs transition duration-200">Perbarui Alokasi Jadwal</button>
    </form>
</div>
@endsection