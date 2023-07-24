<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Hapus data sebelumnya jika ada (opsional)
        DB::table('users')->truncate();

        // Data pengguna awal
        DB::table('users')->insert([
            'name' => 'admin',
            'role' => 0,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'lite',
            'role' => 1,
            'username' => 'lite',
            'email' => 'litetik382@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
