<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // Hashed password
            'hak_akses' => 'admin',
            'jenis_mobil' => null,
            'plat_nomor' => null,
            'nomor_telepon' => null,
            'warna_mobil' => null,
            'foto_profil' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Example driver user
        DB::table('users')->insert([
            'name' => 'Driver',
            'email' => 'driver@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // Hashed password
            'hak_akses' => 'driver',
            'jenis_mobil' => 'Sedan',
            'plat_nomor' => 'B 1234 CD',
            'nomor_telepon' => '08123456789',
            'warna_mobil' => 'Hitam',
            'foto_profil' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Example client user
        DB::table('users')->insert([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // Hashed password
            'hak_akses' => 'client',
            'jenis_mobil' => null,
            'plat_nomor' => null,
            'nomor_telepon' => '08567890123',
            'warna_mobil' => null,
            'foto_profil' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}