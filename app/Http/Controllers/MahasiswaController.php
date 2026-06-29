<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('admin.data_mahasiswa', compact('mahasiswas'));
    }

    public function create()
    {
        // Auto-generate next NIM
        $lastMahasiswa = Mahasiswa::orderBy('nim', 'desc')->first();
        $nextNIM = $lastMahasiswa ? (intval($lastMahasiswa->nim) + 1) : 2401001;
        
        return view('admin.crud.tambah_datamahasiswa', compact('nextNIM'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nim' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'jurusan' => 'required|string',
        'angkatan' => 'required|numeric',
        'email' => 'required|email|string|max:255',
        'no_hp' => 'required|string|max:15',
    ]);

    Mahasiswa::create([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'jurusan' => $request->jurusan,
        'angkatan' => $request->angkatan,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
}

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.crud.edit_datamahasiswa', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|string|max:255',
            'nama' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|string|max:255',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus!');
    }
}