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
        'campeonato_id',
        'atleta_id',
        'codigo',
        'cpf',
        'email',
        'senha',
        'sexo',
        'equipe',
        'faixa',
        'peso',
        'data_inscricao',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'campeonato_id');
    }

    public function atleta()
    {
        return $this->belongsTo(Atleta::class, 'atleta_id');
    }
}
