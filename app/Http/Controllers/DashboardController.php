<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matakuliah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalDosen = Dosen::count();
        $totalMataKuliah = Matakuliah::count();

        return view('admin.dashboard_siakad', compact('totalMahasiswa', 'totalDosen', 'totalMataKuliah'));
    }
}
