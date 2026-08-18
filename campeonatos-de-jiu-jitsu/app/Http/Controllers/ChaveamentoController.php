<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Luta;
use App\Models\Atleta;
use App\Models\AtletaInscricao;
use Illuminate\Support\Facades\DB;

class ChaveamentoController extends Controller
{
    public function inicio($titulo, $codigo, $id)
    {
        $campeonato = Campeonato::find($id);
        return view('publico.chaveamentoListagem', compact('campeonato'));
    }

    public function integra($titulo, $codigo, $id, $faixa, $peso, $sexo)
    {
        $campeonato = Campeonato::find($id);
        return view('publico.chaveamentoListagem', compact('campeonato', 'faixa', 'peso', 'sexo'));
    }

}
