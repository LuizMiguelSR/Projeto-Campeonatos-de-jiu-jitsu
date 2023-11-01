<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Atletas;
use App\Models\AtletaInscricao;

class HomeController extends Controller
{
    public function index()
    {
        $campeonatos = Campeonato::where('status', 'Ativo')->get();
        return view('publico.inicio', compact('campeonatos'));
    }

    public function torneios()
    {
        $campeonatosPage = Campeonato::where('status', 'Ativo')->get();
        $campeonatosPage->paginate(4);
        $campeonatos = $campeonatosPage;
        return view('publico.torneios', compact('campeonatos', 'campeonatosPage'));
    }

    /**
     * Consulta de torneio com fase de inscrição atualizada
     */
    public function torneio($id)
    {
        $campeonato = Campeonato::find($id);
        return view('publico.torneio', compact('campeonato'));
    }

    /**
     * Filtro de torneios por titulo, tipo, estado, cidade, e status ativado e com paginação
     */
    public function filtrar(Request $request)
    {
        $titulo = $request->query('titulo');
        $tipo = $request->query('tipo');
        $estado = $request->query('estado');
        $cidade = $request->query('cidade');

        $query = Campeonato::query()->where('status', 'Ativo');

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

        $campeonatosPage = $query->paginate(4);
        $campeonatos = $campeonatosPage;

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('publico.torneios', compact('campeonatos', 'campeonatosPage', 'estados'));
    }

    public function show($id)
    {
        $campeonato = Campeonato::find($id);
        return view('publico.inscricaoAtleta', compact('campeonato'));
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|string|max:14',
            'email' => 'required|email|max:255|unique:atletas,email',
            'sexo' => 'required|in:Masculino,Feminino',
            'equipe' => 'required|string|max:255',
            'faixa' => 'required|in:Marrom,Preta',
            'peso' => 'required|in:Leve,Pesado',
            'password' => 'required|min:8|confirmed',
            'captcha' => 'required|captcha',
        ];

        $mensagens = [
            'nome.required' => 'O campo Nome é obrigatório.',
            'data_nascimento.required' => 'O campo Data de Nascimento é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'sexo.required' => 'O campo Gênero é obrigatório.',
            'equipe.required' => 'O campo Equipe é obrigatório.',
            'faixa.required' => 'O campo Faixa é obrigatório.',
            'peso.required' => 'O campo Peso é obrigatório.',
            'password.required' => 'O campo Senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'captcha.required' => 'O campo Captcha é obrigatório.',
            'captcha.captcha' => 'O Captcha digitado está incorreto.',

        ];

        $request->validate($regras, $mensagens);
        $campeonato = Campeonato::find($request->id);
        return view('publico.inscricaoAtleta', compact('campeonato'));
    }
}
