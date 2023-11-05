<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Resultados;
use App\Models\Campeonato;

class ResultadosController extends Controller
{

    public function resultado($titulo, $codigo, $id)
    {
        $resultados = Resultados::where('campeonato_id', $id)->get();
        $campeonatos = Campeonato::find($id);

        $equipes = DB::table('atletas_inscricoes')
        ->where('campeonato_id', $id)
        ->get();

        $equipesVencedoras = [];

        foreach ($resultados as $resultado) {
            $equipesVencedoras[] = [
                'primeiro_colocado' => $resultado->primeiro_colocado,
                'segundo_colocado' => $resultado->segundo_colocado,
                'terceiro_colocado' => $resultado->terceiro_colocado,
            ];
        }

        $equipesEncontradas = [];

        foreach ($equipes as $equipe) {
            foreach ($equipesVencedoras as $vencedora) {
                if (
                    $equipe->nome == $vencedora['primeiro_colocado'] ||
                    $equipe->nome == $vencedora['segundo_colocado'] ||
                    $equipe->nome == $vencedora['terceiro_colocado']
                ) {
                    $equipesEncontradas[] = $equipe;
                }
            }
        }

        if ($resultados->count() > 0) {
            return view('publico.resultados', compact('resultados', 'campeonatos', 'equipesEncontradas'));
        } else {
            return back()->with('sucess', 'Campeonato sem resultados divulgados ainda');
        }
    }
}
