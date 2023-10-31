<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'titulo',
        'imagem',
        'data_realizacao',
        'sobre_evento',
        'ginasio',
        'informacoes_gerais',
        'entrada_publico',
        'tipo',
        'fase',
        'status',
        'cidade',
        'estado',
    ];

}
