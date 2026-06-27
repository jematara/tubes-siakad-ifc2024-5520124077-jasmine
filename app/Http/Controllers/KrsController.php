<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        $npm = Auth::user()->username;
        
        $krs = Krs::where('npm', $npm)->with('matakuliah')->get();
        $kode_mk_diambil = $krs->pluck('kode_matakuliah');

        $matakuliah_tersedia = Matakuliah::whereNotIn('kode_matakuliah', $kode_mk_diambil)->get();

        $jadwal_saya = Jadwal::whereIn('kode_matakuliah', $kode_mk_diambil)->with('dosen')->get();

        return view('mahasiswa.krs.index', compact('krs', 'matakuliah_tersedia', 'jadwal_saya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|exists:matakuliah,kode_matakuliah',
        ]);

        $npm = Auth::user()->username;

        $sudahDiambil = Krs::where('npm', $npm)->where('kode_matakuliah', $request->kode_matakuliah)->exists();
        if ($sudahDiambil) {
            return redirect()->back()->with('error', 'Mata kuliah ini sudah ada di KRS Anda.');
        }

        $sks_sekarang = Krs::where('npm', $npm)
            ->join('matakuliah', 'krs.kode_matakuliah', '=', 'matakuliah.kode_matakuliah')
            ->sum('matakuliah.sks');

        $sks_target = Matakuliah::where('kode_matakuliah', $request->kode_matakuliah)->first()->sks;

        if (($sks_sekarang + $sks_target) > 24) {
            return redirect()->back()->with('error', 'Gagal mengambil kelas. Total SKS Anda melebihi batas maksimal 24 SKS.');
        }

        Krs::create([
            'npm' => $npm,
            'kode_matakuliah' => $request->kode_matakuliah
        ]);

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil ditambahkan ke KRS.');
    }

    public function destroy(string $id)
    {
        $krs = Krs::findOrFail($id);

        if ($krs->npm !== Auth::user()->username) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        $krs->delete();
        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil dihapus dari KRS (Drop).');
    }
}