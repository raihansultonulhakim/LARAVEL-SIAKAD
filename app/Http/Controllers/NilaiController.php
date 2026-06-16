<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Menampilkan semua nilai
    public function index()
    {
        $nilai = Nilai::with(['mahasiswa', 'matakuliah'])->get();
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        return view('admin.nilai', compact('nilai', 'mahasiswa', 'matakuliah'));
    }

    // Menyimpan nilai baru
   public function store(Request $request)
{
    $request->validate([
        'mahasiswa_id'   => 'required|exists:mahasiswas,id',
        'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
        'sks'            => 'required|numeric',
        'semester'       => 'required|string|max:10',
        'nilai_angka'    => 'required|numeric',
        'nilai_huruf'    => 'required|string|max:2',
        'indeks'         => 'required|numeric',
    ]);

    Nilai::create([
        'mahasiswa_id'   => $request->mahasiswa_id,
        'mata_kuliah_id' => $request->mata_kuliah_id,
        'sks'            => $request->sks,   // ambil dari input form
        'semester'       => $request->semester,
        'nilai_angka'    => $request->nilai_angka,
        'nilai_huruf'    => $request->nilai_huruf,
        'indeks'         => $request->indeks,
    ]);

    return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan!');
}


    // Form edit nilai
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        return view('admin.edit_nilai', compact('nilai', 'mahasiswa', 'matakuliah'));
    }

    // Update nilai
    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'nilai_angka' => 'required|numeric',
            'nilai_huruf' => 'required|string|max:2',
            'indeks' => 'required|numeric',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui');
    }

    // Hapus nilai
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
    }
}
