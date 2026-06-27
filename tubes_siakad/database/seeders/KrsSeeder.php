<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KrsSeeder extends Seeder
{
    public function run(): void
    {
        $krs = [
            [
                'npm' => '2110010045',
                'kode_matakuliah' => 'IF-301',
            ],
        ];

        DB::table('krs')->insert($krs);
    }
}