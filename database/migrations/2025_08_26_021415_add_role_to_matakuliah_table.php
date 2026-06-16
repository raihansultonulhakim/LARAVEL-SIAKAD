<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('mata_kuliah', function (Blueprint $table) {
        $table->id();
        $table->string('kode_mk');
        $table->string('nama_mk');
        $table->string('sks');
        $table->string('semester');
        $table->string('dosen_pengampu');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            //
        });
    }
};
