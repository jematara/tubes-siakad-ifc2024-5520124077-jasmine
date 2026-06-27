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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->char('kode_matakuliah', 8);
            $table->char('nidn', 10);
            $table->char('kelas', 1);
            $table->string('hari', 10);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->foreign('kode_matakuliah')->references('kode_matakuliah')->on('matakuliah')->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->foreign('nidn')->references('nidn')->on('dosen')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign('jadwal_kode_matakuliah_foreign');
            $table->dropColumn('kode_matakuliah');
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign('jadwal_nidn_foreign');
            $table->dropColumn('nidn');
        });

        Schema::dropIfExists('jadwal');
    }
};
