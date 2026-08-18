<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Campeonato;
use App\Models\Resultados;
use App\Imports\ResultadosCsvImport;
use Illuminate\Support\Facades\Storage;

class GerenciarResultadosController extends Controller
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
        $paginator = Campeonato::where('fase', 'Resultado')->paginate(8);
        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];
        $campeonatos = $paginator;
        return view('administrativo.painelResultados', compact('campeonatos', 'estados', 'paginator'));
    }

    public function upload($id)
    {
        return view('administrativo.enviarResultados', compact('id'));
    }

    public function download($arquivo)
    {
        $path = storage_path("app/public/arquivos/{$arquivo}");

        if (!Storage::exists("public/arquivos/{$arquivo}")) {
            abort(404);
        }

        return response()->download($path);
    }

    public function importarCSV(Request $request)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }

        $regras = [
            'file' => 'required',
            'file' => 'required|mimes:csv',
        ];
        $feedback = [
            'file.require' => 'O campo é obrigatório.',
            'file.mimes' => 'O arquivo deve ser no formato csv.',
        ];

        $request->validate($regras, $feedback);

        $file = $request->file('file');

        Excel::import(new ResultadosCsvImport, $file);

        return redirect()->route('gerenciar_resultados.inicio')->with('sucess', 'CSV importado com sucesso.');
    }

    /**
     * Metódo que responsável por realizar os filtros de dados
     */
    public function filtrar(Request $request)
    {
        $titulo = $request->query('titulo');
        $tipo = $request->query('tipo');
        $estado = $request->query('estado');
        $cidade = $request->query('cidade');

        $query = Campeonato::query();

        if ($titulo) {
            $query->where('titulo', 'like', '%' . $titulo . '%');
        }
        if ($tipo) {
            $query->where('tipo', $tipo);
        }
        if ($estado) {
            $query->where('estado', $estado);
        }
        if ($cidade) {
            $query->where('cidade', 'like', '%' . $cidade . '%');
        }

        $query->where('fase', 'Resultado');
        $paginator = $query->paginate(8);
        $campeonatos = $paginator;

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('administrativo.painelResultados', compact('campeonatos', 'paginator', 'estados'));
    }
}
