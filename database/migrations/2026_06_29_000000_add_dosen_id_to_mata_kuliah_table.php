<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id')->nullable()->after('dosen_pengampu');
        });

        // Backfill existing data where dosen_pengampu matches dosen.nama
        // Works for MySQL. Skip if no dosen table or no matching rows.
        try {
            DB::statement("UPDATE mata_kuliah mk JOIN dosen d ON mk.dosen_pengampu = d.nama SET mk.dosen_id = d.id");
        } catch (\Throwable $e) {
            // ignore if update fails in non-MySQL environments
        }

        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->dropForeign(['dosen_id']);
            $table->dropColumn('dosen_id');
        });
    }
};
