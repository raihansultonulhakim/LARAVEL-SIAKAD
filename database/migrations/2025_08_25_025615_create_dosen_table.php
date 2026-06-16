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
    Schema::create('dosen', function (Blueprint $table) {
        $table->id();
        $table->string('nip');
        $table->string('nama');
        $table->string('prodi');
        $table->string('jabatan_akademik');
        $table->string('email');
        $table->string('nomor_hp');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
