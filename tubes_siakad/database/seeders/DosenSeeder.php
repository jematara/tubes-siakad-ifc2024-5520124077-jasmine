<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        $dosen = [
            [
                'nidn' => '0412088501',
                'nama' => 'Dr. Ahmad Subagja, M.T.',
            ],
            [
                'nidn' => '0425039002',
                'nama' => 'Rina Wijaya, S.Kom., M.M.',
            ],
        ];

        DB::table('dosen')->insert($dosen);
    }
}