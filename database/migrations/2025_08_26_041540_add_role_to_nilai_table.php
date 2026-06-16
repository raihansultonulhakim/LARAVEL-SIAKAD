<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id'); // relasi ke tabel mahasiswas
            $table->unsignedBigInteger('mata_kuliah_id'); // relasi ke tabel mata_kuliah
            $table->integer('sks');
            $table->string('semester');
            $table->decimal('nilai_angka', 5, 2); // contoh: 85.50
            $table->string('nilai_huruf', 2);      // contoh: A, B, C
            $table->decimal('indeks', 3, 2);       // contoh: 4.00
            $table->timestamps();

            // foreign key
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
