<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class PublicDosenController extends Controller
{
    public function index()
    {
        $dosenList = Dosen::with('mataKuliah')
            ->orderBy('nama')
            ->get();

        return view('public.dosen.index', compact('dosenList'));
    }

    public function show(Dosen $dosen)
    {
        $dosen->load('mataKuliah');
        $jadwal = $dosen->mataKuliah->groupBy('semester');

        return view('public.dosen.show', compact('dosen', 'jadwal'));
    }
}
