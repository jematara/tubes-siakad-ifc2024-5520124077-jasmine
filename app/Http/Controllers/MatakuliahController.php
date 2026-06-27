<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('admin.matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('admin.matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|max:8|unique:matakuliah,kode_matakuliah',
            'nama_matakuliah' => 'required|string|max:50',
            'sks'             => 'required|integer|min:1|max:3',
        ],
        [
            'kode_matakuliah.required' => 'Kode mata kuliah wajib diisi.',
            'kode_matakuliah.unique' => 'Kode mata kuliah sudah digunakan.',
            'sks.max' => 'Bobot SKS maksimal adalah 3.',
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(string $kode)
    {
        $matakuliah = Matakuliah::findOrFail($kode);
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, string $kode)
    {
        $matakuliah = Matakuliah::findOrFail($kode);

        $request->validate([
            'kode_matakuliah' => 'required|string|max:8|unique:matakuliah,kode_matakuliah,' . $matakuliah->kode_matakuliah . ',kode_matakuliah',
            'nama_matakuliah' => 'required|string|max:50',
            'sks'             => 'required|integer|min:1|max:3',
        ]);

        $matakuliah->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy(string $kode)
    {
        $matakuliah = Matakuliah::findOrFail($kode);
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}