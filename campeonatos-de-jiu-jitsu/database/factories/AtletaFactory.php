<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\Models\Atleta;

class AtletaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),
            'data_nascimento' => $this->faker->date,
            'sexo' => $this->faker->randomElement(['Masculino', 'Feminino']),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('12345678'),
            'created_at' => now(),
        ];
    }
}
