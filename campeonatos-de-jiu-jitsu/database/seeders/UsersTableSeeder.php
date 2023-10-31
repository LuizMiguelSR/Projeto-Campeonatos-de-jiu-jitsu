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
            'role' => 1,
            'status' => 'Ativado',
        ]);
        DB::table('users')->insert([
            'name' => 'Luiz Miguel',
            'email' => 'luizmsr0@gmail.com',
            'password' => Hash::make('12345678'), 
            'role' => 3,
            'status' => 'Ativado',
        ]);
        DB::table('users')->insert([
            'name' => 'Rosa Maria',
            'email' => 'rosa@email.com',
            'password' => Hash::make('12345678'), 
            'role' => 2,
            'status' => 'Ativado',
        ]);
    }
}
