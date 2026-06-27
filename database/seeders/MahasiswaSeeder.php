<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswa = [
            [
                'npm' => '2110010045',
                'nidn' => '0412088501',
                'nama' => 'Rian Hidayat',
            ],
            [
                'npm' => '2110010082',
                'nidn' => '0425039002',
                'nama' => 'Siti Aminah',
            ],
        ];

        DB::table('mahasiswa')->insert($mahasiswa);
    }
}