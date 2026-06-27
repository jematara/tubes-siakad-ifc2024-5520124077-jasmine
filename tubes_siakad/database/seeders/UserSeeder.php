<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@kampus.ac.id',
                'password' => Hash::make('12345'),
                'role' => 'admin',
                'username' => 'admin01',
            ],
            [
                'name' => 'Rian Hidayat',
                'email' => 'rian.hidayat@mahasiswa.ac.id',
                'password' => Hash::make('12345'),
                'role' => 'mahasiswa',
                'username' => '2110010045',
            ]
        ];

        DB::table('users')->insert($users);
    }
}
