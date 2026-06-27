<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['dosen', 'matakuliah'])->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('admin.jadwal.create', compact('dosen', 'matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|string|exists:dosen,nidn',
            'kelas'           => 'required|string|size:1'
        ],
        [
            'hari'            => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'       => 'required|date_format:H:i',
            'jam_selesai'     => 'required|date_format:H:i|after:jam_mulai',
        ],
        [
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
        ]);

        $bentrok = Jadwal::where('nidn', $request->nidn)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('jam_mulai', '<', $request->jam_selesai)
                      ->where('jam_selesai', '>', $request->jam_mulai);
                });
            })->exists();

        if ($bentrok) {
            return redirect()->back()->withErrors(['nidn' => 'Dosen tersebut sudah memiliki jadwal lain pada rentang waktu ini.'])->withInput();
        }

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kuliah berhasil dibuat.');
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('admin.jadwal.edit', compact('jadwal', 'dosen', 'matakuliah'));
    }

    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'kode_matakuliah' => 'required|string|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|string|exists:dosen,nidn',
            'kelas'           => 'required|string|size:1|regex:/^[A-Z]$/',
            'hari'            => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'       => 'required|date_format:H:i',
            'jam_selesai'     => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $bentrok = Jadwal::where('id', '!=', $id)
            ->where('nidn', $request->nidn)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->where('jam_mulai', '<', $request->jam_selesai)
                      ->where('jam_selesai', '>', $request->jam_mulai);
            })->exists();

        if ($bentrok) {
            return redirect()->back()->withErrors(['nidn' => 'Dosen tersebut memiliki jadwal bentrok pada rentang waktu ini.'])->withInput();
        }

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kuliah berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kuliah berhasil dihapus.');
    }
}