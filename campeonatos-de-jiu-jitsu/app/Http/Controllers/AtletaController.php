<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campeonato;
use App\Models\Atleta;
use App\Models\AtletaInscricao;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AtletaController extends Controller
{
    /**
     * Middleware especifico para autenticação de atletas
     */
    public function __construct()
    {
        $this->middleware('auth:atleta');
    }

    public function inicio()
    {
        $id = auth()->user()->id;
        $campeonatos = DB::table('atletas_inscricoes')
            ->join('campeonatos', 'atletas_inscricoes.campeonato_id', '=', 'campeonatos.id')
            ->select('atletas_inscricoes.*', 'campeonatos.titulo', 'campeonatos.data_realizacao', 'campeonatos.estado', 'campeonatos.cidade')
            ->where('atletas_inscricoes.atleta_id', $id)
            ->get();
            
        return view('publico.areaAtleta', compact('campeonatos'))->with('sucess', 'Login realizado com sucesso');
    }

    public function campeonatos()
    {
        return view('publico.areaAtleta')->with('sucess', 'Login realizado com sucesso');
    }

}
