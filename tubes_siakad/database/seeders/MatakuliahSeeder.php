<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $matakuliah = [
            [
                'kode_matakuliah' => 'IF-301',
                'nama_matakuliah' => 'Pemrograman Web II',
                'sks' => 3,
            ],
            [
                'kode_matakuliah' => 'IF-302',
                'nama_matakuliah' => 'Basis Data Lanjut',
                'sks' => 3,
            ],
        ];

        DB::table('matakuliah')->insert($matakuliah);
    }
}