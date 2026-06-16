<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ini wajib diimport
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen'; // pakai tabel 'dosen' (singular)
    
    protected $fillable = [
        'nip',
        'nama',
        'prodi',
        'jabatan_akademik',
        'email',
        'nomor_hp',
    ];
}
