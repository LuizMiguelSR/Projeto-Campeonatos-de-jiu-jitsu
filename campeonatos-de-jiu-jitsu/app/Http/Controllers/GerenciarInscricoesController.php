<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AtletaInscricao;
use App\Models\Campeonato;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class GerenciarInscricoesController extends Controller
{
    /**
     * Construtor responsável pela autenticação e nível de privilégio
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        $paginator = DB::table('atletas_inscricoes')
            ->join('campeonatos', 'atletas_inscricoes.campeonato_id', '=', 'campeonatos.id')
            ->select('atletas_inscricoes.*', 'campeonatos.titulo', 'campeonatos.estado', 'campeonatos.cidade')
            ->paginate(8);

        $resultados = $paginator;
        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('administrativo.painelInscricoes', compact('resultados', 'paginator', 'estados'));
    }

    /**
     * Metódo que responsável por realizar os filtros de dados
     */
    public function filtrar(Request $request)
    {
        $campeonatos = Campeonato::all();

        $nome = $request->query('nome');
        $sexo = $request->query('sexo');
        $titulo = $request->query('titulo');
        $estado = $request->query('estado');
        $cidade = $request->query('cidade');

        $query = DB::table('atletas_inscricoes')
            ->join('campeonatos', 'atletas_inscricoes.campeonato_id', '=', 'campeonatos.id')
            ->select('atletas_inscricoes.*', 'campeonatos.titulo', 'campeonatos.estado', 'campeonatos.cidade');

        if ($nome) {
            $query->where('atletas_inscricoes.nome', 'like', '%' . $nome . '%');
        }
        if ($sexo) {
            $query->where('atletas_inscricoes.sexo', $sexo);
        }
        if ($titulo) {
            $query->where('campeonatos.titulo', 'like', '%' . $titulo . '%');
        }
        if ($estado) {
            $query->where('campeonatos.estado', $estado);
        }
        if ($cidade) {
            $query->where('campeonatos.cidade', 'like', '%' . $cidade . '%');
        }

        $paginator = $query->paginate(8);
        $resultados = $paginator;

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('administrativo.painelInscricoes', compact('paginator', 'resultados', 'estados'));
    }

    /**
     * Metódos responsáveis em salvar em pdf e csv a listagem de inscrições
     */
    public function pdfInscricoes(Request $request)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }
        $data = DB::table('atletas_inscricoes')
            ->join('campeonatos', 'atletas_inscricoes.campeonato_id', '=', 'campeonatos.id')
            ->select('atletas_inscricoes.*', 'campeonatos.titulo', 'campeonatos.estado', 'campeonatos.cidade')
            ->get();

        $pdf = PDF::loadView('administrativo.download', compact('data'))->setPaper('a4', 'landscape');

        return $pdf->download('inscritos.pdf');
    }

    public function csvInscricoes(Request $request)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }
        return Excel::download(new UsersExport(), 'inscricoes.csv');
    }

}
