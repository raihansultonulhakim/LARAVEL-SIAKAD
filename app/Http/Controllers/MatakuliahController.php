<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
{
    $matakuliah = Matakuliah::all();
    return view('admin.mata_kuliah', compact('matakuliah'));
}

public function create()
{
    $dosen = Dosen::orderBy('nama')->get();
    $kodeMk = Matakuliah::generateKodeMk();
    return view('admin.crud.tambah_matakuliah', compact('dosen', 'kodeMk'));
}

public function store(Request $request)
{
    $request->validate([
        'kode_mk' => 'required|string|max:255',
        'nama_mk' => 'required',
        'sks' => 'required',
        'semester' => 'required',
        'dosen_id' => 'nullable|exists:dosen,id',
    ]);

    Matakuliah::create([
        'kode_mk' => $request->kode_mk,
        'nama_mk' => $request->nama_mk,
        'sks' => $request->sks,
        'semester' => $request->semester,
        'dosen_pengampu' => $request->dosen_pengampu ?? null,
        'dosen_id' => $request->dosen_id ?? null,
    ]
    );
    return redirect()->route('matakuliah.index')->with('success','Data Dosen berhasil ditambahkan');
}

public function edit(Matakuliah $matakuliah)
{
    $dosen = Dosen::orderBy('nama')->get();
    return view('admin.crud.edit_matakuliah', compact('matakuliah','dosen'));
}

public function update(Request $request, Matakuliah $matakuliah)
{
    $request->validate([
        'kode_mk' => 'required|string|max:255',
        'nama_mk' => 'required',
        'sks' => 'required',
        'semester' => 'required',
        'dosen_id' => 'nullable|exists:dosen,id',
    ]);

    $matakuliah->update([
        'kode_mk' => $request->kode_mk,
        'nama_mk' => $request->nama_mk,
        'sks' => $request->sks,
        'semester' => $request->semester,
        'dosen_pengampu' => $request->dosen_pengampu ?? null,
        'dosen_id' => $request->dosen_id ?? null,
    ]);
    
    return redirect()->route('matakuliah.index')->with('success','Data Dosen berhasil diupdate');
}

public function destroy(Matakuliah $matakuliah)
{
    $matakuliah->delete();
    return redirect()->route('matakuliah.index')->with('success','Data Dosen berhasil dihapus');
}
}
