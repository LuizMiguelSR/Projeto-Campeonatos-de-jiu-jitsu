<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AtletaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('atletas')->truncate();

        // Insere um usuário de exemplo
        DB::table('atletas')->insert([
            'nome' => 'Luiz Miguel',
            'cpf' => '15545879415',  // Coloquei aspas simples para manter como string
            'data_nascimento' => '2023-10-24',  // Coloquei aspas simples para manter como string
            'sexo' => 'Masculino',
            'email' => 'luizmsr0@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
