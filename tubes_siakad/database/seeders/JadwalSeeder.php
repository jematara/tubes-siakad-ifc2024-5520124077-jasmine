<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $jadwal = [
            [
                'kode_matakuliah' => 'IF-301',
                'nidn' => '0412088501',
                'kelas' => 'A',
                'hari' => 'Senin',
                'jam_mulai' => '08:00',
                'jam_selesai' => '10:30',
            ],
            [
                'kode_matakuliah' => 'IF-302',
                'nidn' => '0425039002',
                'kelas' => 'B',
                'hari' => 'Rabu',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:20',
            ],
        ];

        DB::table('jadwal')->insert($jadwal);
    }
}