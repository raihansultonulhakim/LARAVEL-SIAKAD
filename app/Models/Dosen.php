<?php

namespace App\Models;

use App\Models\Matakuliah;
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

    public function mataKuliah()
    {
        return $this->hasMany(Matakuliah::class, 'dosen_id', 'id');
    }

    public static function generateUniqueNip(): string
    {
        $min = 100001;

        if (! self::query()->exists()) {
            return (string) $min;
        }

        do {
            $nip = (string) random_int($min, 999999);
        } while (self::where('nip', $nip)->exists());

        return $nip;
    }
}
