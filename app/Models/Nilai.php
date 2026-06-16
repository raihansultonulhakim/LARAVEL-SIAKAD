<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = [
        'mahasiswa_id',
         'mata_kuliah_id',
            'sks',
                'semester',
                    'nilai_angka',
                        'nilai_huruf',
                            'indeks'];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function matakuliah() {
    return $this->belongsTo(Matakuliah::class, 'mata_kuliah_id');
}
}
