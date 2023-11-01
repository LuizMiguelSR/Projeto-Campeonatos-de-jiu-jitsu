<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtletaInscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'atletas_inscricoes';
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'email',
        'sexo',
        'equipe',
        'faixa',
        'peso',
        'password',
    ];
}
