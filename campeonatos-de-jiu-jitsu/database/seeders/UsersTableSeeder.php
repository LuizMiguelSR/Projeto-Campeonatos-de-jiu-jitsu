<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        // Insere um usuário de exemplo
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'Admin',
            'status' => 'Ativado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Rosa Maria',
            'email' => 'rosa@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'User',
            'status' => 'Ativado',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
