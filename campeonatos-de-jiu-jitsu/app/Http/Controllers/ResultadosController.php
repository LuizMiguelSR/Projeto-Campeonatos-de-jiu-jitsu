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

        if ($resultados->count() > 0) {
            return view('publico.resultados', compact('resultados', 'campeonatos'));
        } else {
            return back()->with('sucess', 'Campeonato sem resultados divulgados ainda');
        }
    }
}
