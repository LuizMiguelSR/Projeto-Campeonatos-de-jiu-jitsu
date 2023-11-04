<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resultados extends Model
{
    use HasFactory;

    protected $table = 'resultados';

    protected $fillable = [
        'campeonato_id',
        'campeonato_codigo',
        'sexo',
        'faixa',
        'peso',
        'equipe',
        'primeiro_colocado',
        'segundo_colocado',
        'terceiro_colocado',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }
}
