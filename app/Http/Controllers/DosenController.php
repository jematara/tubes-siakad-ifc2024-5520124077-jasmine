<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|string|size:10|unique:dosen,nidn',
            'nama' => 'required|string|max:50'
        ],
        [
            'nidn.required' => 'NIDN wajib diisi.',
            'nidn.size' => 'NIDN harus tepat 10 karakter.',
            'nidn.unique' => 'NIDN sudah terdaftar di sistem.',
            'nama.required' => 'Nama dosen wajib diisi.'
        ]);

        Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan.');
    }

    public function edit(string $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);

        $request->validate([
            'nidn' => 'required|string|size:10|unique:dosen,nidn,' . $dosen->nidn . ',nidn',
            'nama' => 'required|string|max:50'
        ],
        [
            'nidn.size' => 'NIDN harus tepat 10 karakter.',
            'nidn.unique' => 'NIDN sudah digunakan oleh dosen lain.',
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diperbarui.');
    }

    public function destroy(string $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus.');
    }
}