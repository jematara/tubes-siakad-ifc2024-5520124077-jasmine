<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('dosen')->get();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        return view('admin.mahasiswa.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm'  => 'required|string|size:10|unique:mahasiswa,npm',
            'nidn' => 'required|string|exists:dosen,nidn',
            'nama' => 'required|string|max:50'
        ],
        [
            'npm.required' => 'NPM wajib diisi.',
            'npm.size' => 'NPM harus tepat 10 karakter.',
            'npm.unique' => 'NPM sudah terdaftar.',
            'nidn.exists' => 'Dosen Wali yang dipilih tidak valid.',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function edit(string $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        $dosen = Dosen::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'dosen'));
    }

    public function update(Request $request, string $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);

        $request->validate([
            'npm'  => 'required|string|size:10|unique:mahasiswa,npm,' . $mahasiswa->npm . ',npm',
            'nidn' => 'required|string|exists:dosen,nidn',
            'nama' => 'required|string|max:50'
        ],
        [
            'npm.size' => 'NPM harus tepat 10 karakter.',
            'npm.unique' => 'NPM sudah digunakan oleh mahasiswa lain.',
            'nidn.exists' => 'Dosen Wali tidak valid.',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    public function destroy(string $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}