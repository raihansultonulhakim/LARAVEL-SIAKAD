<?php

namespace App\Models;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'dosen_pengampu',
        'dosen_id',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public static function generateKodeMk(): string
    {
        $prefix = 'MK';
        $min = 1;
        $max = 999;

        do {
            $number = random_int($min, $max);
            $kode = sprintf('%s%03d', $prefix, $number);
        } while (self::where('kode_mk', $kode)->exists());

        return $kode;
    }
}
