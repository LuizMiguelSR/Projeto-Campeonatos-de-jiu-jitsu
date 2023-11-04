<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Atleta;

class AtletasSeeder extends Seeder
{
    public function run(): void
    {
        Atleta::factory(40)->create();
    }
}
