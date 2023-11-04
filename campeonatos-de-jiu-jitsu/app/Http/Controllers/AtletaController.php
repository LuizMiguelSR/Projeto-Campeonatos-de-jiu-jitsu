<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campeonato;
use App\Models\Resultados;
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

    public function certificado()
    {
        $id = auth()->user()->id;
        $campeonatos = DB::table('atletas_inscricoes')
            ->join('campeonatos', 'atletas_inscricoes.campeonato_id', '=', 'campeonatos.id')
            ->select('atletas_inscricoes.*', 'campeonatos.titulo', 'campeonatos.data_realizacao', 'campeonatos.estado', 'campeonatos.cidade')
            ->where('atletas_inscricoes.atleta_id', $id)
            ->get();

        $resultados = Resultados::where('campeonato_id', $campeonatos[0]->campeonato_id)->get();

        foreach ($resultados as $resultado => $value) {
            if($value->primeiro_colocado == $campeonatos[0]->nome) {

                $posicao = 1;
                return view('publico.vitoriaCertificado', compact('campeonatos', 'posicao'));
            }

            if($value->segundo_colocado == $campeonatos[0]->nome) {
                $posicao = 2;
                return view('publico.vitoriaCertificado', compact('campeonatos', 'posicao'));
            }

            if($value->terceiro_colocado == $campeonatos[0]->nome) {
                $posicao = 3;
                return view('publico.vitoriaCertificado', compact('campeonatos', 'posicao'));
            }
        }

        return view('publico.participacaoCertificado', compact('campeonatos'));
    }

    public function pdfCertificado(Request $request)
    {
        $data = DB::table('atletas_inscricoes')
            ->join('campeonatos', 'atletas_inscricoes.campeonato_id', '=', 'campeonatos.id')
            ->select('atletas_inscricoes.*', 'campeonatos.titulo', 'campeonatos.estado', 'campeonatos.cidade')
            ->get();

        $pdf = PDF::loadView('administrativo.download', compact('data'))->setPaper('a4', 'landscape');

        return $pdf->download('inscritos.pdf');
    }

    public function campeonatos()
    {
        return view('publico.areaAtleta')->with('sucess', 'Login realizado com sucesso');
    }

}
