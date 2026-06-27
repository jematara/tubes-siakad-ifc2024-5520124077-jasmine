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
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->char('npm', 10);
            $table->char('kode_matakuliah', 8);
            $table->timestamps();
        });

        Schema::table('krs', function (Blueprint $table) {
            $table->foreign('npm')->references('npm')->on('mahasiswa')->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('krs', function (Blueprint $table) {
            $table->foreign('kode_matakuliah')->references('kode_matakuliah')->on('matakuliah')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('krs', function (Blueprint $table) {
            $table->dropForeign('krs_npm_foreign');
            $table->dropColumn('krs');
        });

        Schema::table('krs', function (Blueprint $table) {
            $table->dropForeign('krs_kode_matakuliah_foreign');
            $table->dropColumn('kode_matakuliah');
        });

        Schema::dropIfExists('krs');
    }
};
