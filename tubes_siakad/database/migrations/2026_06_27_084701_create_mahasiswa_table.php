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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->char('npm', 10)->primary();
            $table->char('nidn', 10);
            $table->string('nama', 50);
            $table->timestamps();
        });

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->foreign('nidn')->references('nidn')->on('dosen')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropForeign('books_nidn_foreign');
            $table->dropColumn('nidn');
        });
        
        Schema::dropIfExists('mahasiswa');
    }
};
