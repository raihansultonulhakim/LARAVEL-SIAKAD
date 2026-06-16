<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{

public function index()
{
    $dosen = Dosen::all();
    return view('admin.data_dosen', compact('dosen'));
}

public function create()
{
    return view('admin.crud.tambah_datadosen');
}

public function store(Request $request)
{
    $request->validate([
        'nip' => 'required|string|max:255',
        'nama' => 'required',
        'prodi' => 'required',
        'jabatan_akademik' => 'required',
        'email' => 'required',
        'nomor_hp' => 'required|string|max:20',
    ]);

    Dosen::create([
        'nip' => $request->nip,
        'nama' => $request->nama,
        'prodi' => $request->prodi,
        'jabatan_akademik' => $request->jabatan_akademik,
        'email' => $request->email,
        'nomor_hp' => $request->nomor_hp,
    ]
    );
    return redirect()->route('dosen.index')->with('success','Data Dosen berhasil ditambahkan');
}

public function edit(Dosen $dosen)
{
    return view('admin.crud.edit_datadosen', compact('dosen'));
}

public function update(Request $request, Dosen $dosen)
{
    $request->validate([
        'nip' => 'required|string|max:255',
        'nama' => 'required',
        'prodi' => 'required',
        'jabatan_akademik' => 'required',
        'email' => 'required',
        'nomor_hp' => 'required|string|max:20',
    ]);

    $dosen->update($request->all());
    
    return redirect()->route('dosen.index')->with('success','Data Dosen berhasil diupdate');
}

public function destroy(Dosen $dosen)
{
    $dosen->delete();
    return redirect()->route('dosen.index')->with('success','Data Dosen berhasil dihapus');
}

}
