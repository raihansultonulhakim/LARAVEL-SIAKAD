<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class PublicMahasiswaController extends Controller
{
    /**
     * Display search form and (optional) result when ?nim= is provided.
     */
    public function index(Request $request)
    {
        $nim = $request->query('nim');
        $mahasiswa = null;
        $nilaiList = collect();
        $jadwal = collect();
        $ipk = null;
        $semester = null;

        if ($nim) {
            $mahasiswa = Mahasiswa::where('nim', $nim)->first();

            if ($mahasiswa) {
                // nilai mahasiswa beserta mata kuliah
                $nilaiList = Nilai::with('matakuliah')
                    ->where('mahasiswa_id', $mahasiswa->id)
                    ->get();

                // semester saat ini (ambil nilai max jika tersedia)
                $semester = $nilaiList->max('semester');

                // jadwal sederhana: tampilkan mata kuliah untuk semester tersebut
                if ($semester) {
                    $jadwal = Matakuliah::where('semester', $semester)->get();
                }

                // Hitung IPK (rata2 tertimbang) jika ada nilai angka dan sks
                $totalBobot = 0;
                $totalSks = 0;
                foreach ($nilaiList as $n) {
                    $sks = (float) ($n->sks ?? 0);
                    $angka = (float) ($n->nilai_angka ?? 0);
                    if ($sks > 0 && $angka > 0) {
                        $totalBobot += $sks * $angka;
                        $totalSks += $sks;
                    }
                }

                if ($totalSks > 0) {
                    $ipk = round($totalBobot / $totalSks, 2);
                }
            }
        }

        return view('public.cek_mahasiswa', compact('nim', 'mahasiswa', 'nilaiList', 'jadwal', 'ipk', 'semester'));
    }
}
