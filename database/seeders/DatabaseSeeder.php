<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'resepsionis',
                'email' => 'resepsionis@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'resepsionis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'salma',
                'email' => 'dokter@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ujang',
                'email' => 'ujang@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'pasien',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('patients')->insert([
            [
                'user_id' => '4',
                'name' => 'ujang',
                'birth_date' => '2000-10-20',
                'address' => 'jalan pancing masuk dalam kanan dikit',
                'tipe' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('doctors')->insert([
            [
                'user_id' => '3',
                'name' => 'salma',
                'birth_date' => '2005-10-20',
                'address' => 'Medan Johor',
                'specialization' => 'Umum',
                'license_number' => '003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
