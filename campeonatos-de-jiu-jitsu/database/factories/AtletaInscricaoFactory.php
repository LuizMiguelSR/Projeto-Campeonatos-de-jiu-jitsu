<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\Models\AtletaInscricao;
use App\Models\Atleta;

class AtletaInscricaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define o modelo Atleta
        $factory->define(App\Models\Atleta::class, function (Faker $faker) {
            return [
                'nome' => $faker->name,
                'data_nascimento' => $faker->date,
                'cpf' => $faker->unique()->numerify('###.###.###-##'),
                'sexo' => $faker->randomElement(['Masculino', 'Feminino']),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
            ];
        });

        // Define o modelo AtletaInscricao
        $factory->define(App\Models\AtletaInscricao::class, function (Faker $faker) {
            // Cria um novo Atleta
            $atleta = Atleta::factory()->create();

            return [
                'campeonato_id' => 1,
                'atleta_id' => $atleta->id,
                'codigo' => rand(100000, 999999),
                'nome' => $atleta->nome,
                'data_nascimento' => $atleta->data_nascimento,
                'cpf' => $atleta->cpf,
                'sexo' => $atleta->sexo,
                'email' => $atleta->email,
                'senha' => $atleta->password,
                'equipe' => $faker->company,
                'faixa' => $faker->randomElement(['Marrom', 'Preta']),
                'peso' => $faker->randomElement(['Leve', 'Pesado']),
                'data_inscricao' => $faker->dateTimeBetween('-1 year', 'now'),
            ];
        });

        return [];
    }
}



