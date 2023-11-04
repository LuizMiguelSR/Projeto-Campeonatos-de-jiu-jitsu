<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CampeonatosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->sentence;
        $cidade = $this->faker->city;
        $estado = $this->faker->state;
        $dataRealizacao = $this->faker->date;
        $sobreEvento = $this->faker->paragraph;
        $ginasio = $this->faker->word;
        $informacoesGerais = $this->faker->paragraph;
        $entradaPublico = $this->faker->sentence;
        $tipo = $this->faker->word;
        $fase = $this->faker->word;
        $status = $this->faker->randomElement(['Em andamento', 'Concluído']);
        $created_at = $this->faker->dateTimeBetween('-1 year', 'now');

        return [
            'codigo' => $this->faker->unique()->numberBetween(100000, 999999),
            'titulo' => $titulo,
            'imagem' => $this->faker->imageUrl(),
            'cidade' => $cidade,
            'estado' => $estado,
            'data_realizacao' => $dataRealizacao,
            'sobre_evento' => $sobreEvento,
            'ginasio' => $ginasio,
            'informacoes_gerais' => $informacoesGerais,
            'entrada_publico' => $entradaPublico,
            'tipo' => $tipo,
            'fase' => $fase,
            'status' => $status,
            'created_at' => $created_at,
        ];
    }
}
