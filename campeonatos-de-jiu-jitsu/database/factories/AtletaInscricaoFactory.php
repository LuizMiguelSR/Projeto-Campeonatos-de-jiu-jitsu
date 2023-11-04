<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\AtletaInscricao;
use App\Models\Atleta;
use Illuminate\Support\Facades\Hash;

class AtletaInscricaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obter todos os IDs dos atletas que ainda não foram usados nas inscrições
        $atletasDisponiveis = Atleta::whereNotIn('id', AtletaInscricao::pluck('atleta_id')->toArray())
        ->pluck('id')
        ->toArray();

        // Verificar se há atletas disponíveis
        if (empty($atletasDisponiveis)) {
        // Se todos os atletas já foram usados, não crie uma nova inscrição
        return [];
        }

        // Escolher aleatoriamente um ID de atleta
        $atletaId = $this->faker->randomElement($atletasDisponiveis);

        // Obter os detalhes do atleta escolhido
        $atleta = Atleta::find($atletaId);

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
        'equipe' => $this->faker->company,
        'faixa' => $this->faker->randomElement(['Marrom', 'Preta']),
        'peso' => $this->faker->randomElement(['Leve', 'Pesado']),
        'data_inscricao' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
