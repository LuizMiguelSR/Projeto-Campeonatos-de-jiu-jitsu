<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mews\Captcha\Captcha;
use App\Mail\NovaInscricao;
use App\Models\AtletaInscricao;
use App\Models\Resultados;
use App\Models\Campeonato;
use App\Models\Destaques;
use App\Models\Atleta;
use App\Models\User;


class HomeController extends Controller
{
    public function inicio()
    {
        $demais = Campeonato::where('status', 'Ativo')
            ->orderBy('created_at', 'desc')
            ->get();

        $destaques = Destaques::latest()->first();

        $campeonato = [];

        if ($destaques) {

            $idsCampeonatos = [
                'primeiro', 'segundo', 'terceiro', 'quarto',
                'quinto', 'sexto', 'setimo', 'oitavo'
            ];

            foreach ($idsCampeonatos as $idColuna) {
                $idCampeonato = $destaques->$idColuna;
                $campeonato[$idColuna] = Campeonato::where('id', $idCampeonato)
                    ->where('status', 'Ativo')
                    ->first();
            }
        }

        return view('publico.inicio', compact('campeonato', 'demais'));
    }

    public function torneios()
    {
        $campeonatosPage = Campeonato::where('status', 'Ativo')->get();
        $campeonatosPage->paginate(12);
        $campeonatos = $campeonatosPage;
        return view('publico.torneios', compact('campeonatos', 'campeonatosPage'));
    }

    /**
     * Consulta de torneio com fase de inscrição atualizada
     */
    public function torneio($titulo, $codigo, $id)
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

        $campeonatosPage = $query->paginate(12);
        $campeonatos = $campeonatosPage;

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('publico.torneios', compact('campeonatos', 'campeonatosPage', 'estados'));
    }

    /**
     * Metodos responsáveis por realizar uma nova inscrição com verificação mediante captcha, validação de dados verificação inscrição, mediante cpf se há uma inscrição repetida em um mesmo campeonato. Envio de email aos administradores do sistema quando uma inscrição é realizada.
     */
    public function inscricao($titulo, $codigo, $id)
    {
        $campeonato = Campeonato::find($id);

        if($campeonato->fase === 'Inscrição' && $campeonato->status === 'Ativo') {
            return view('publico.inscricaoAtleta', compact('campeonato'));
        } else {
            return redirect()->route('home.torneios')->with('sucess', 'O campeonato está com inscrições encerradas');
        }
    }

    public function armazenar(Request $request, Captcha $captcha)
    {
        $regras = [
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|string|max:14',
            'email' => 'required|email|max:255|',
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

        $id = $request->campeonato_id;
        $cpf = $request->cpf;
        $resultados = AtletaInscricao::where('campeonato_id', $id)->pluck('cpf');

        if($resultados->isEmpty()) {

            if(Atleta::where('cpf', $cpf)->first()) {
                $Atleta = Atleta::where('cpf', $cpf)->first();
                $dadosAtleta = [
                    'nome' => $request->input('nome'),
                    'email' => $request->input('email'),
                    'data_nascimento' => $request->input('data_nascimento'),
                ];

                if ($request->filled('password')) {
                    $dadosAtleta['password'] = Hash::make($request->input('password'));
                }

                $Atleta->update($dadosAtleta);
            } else {
                $dadosAtleta = [
                    'nome' => $request->input('nome'),
                    'cpf' => $request->input('cpf'),
                    'data_nascimento' => $request->input('data_nascimento'),
                    'sexo' => $request->input('sexo'),
                    'email' => $request->input('email'),
                ];

                if ($request->filled('password')) {
                    $dadosAtleta['password'] = Hash::make($request->input('password'));
                }

                $Atleta = new Atleta($dadosAtleta);
                $Atleta->save();

            }

            do {
                $codigo = rand(100000, 999999);
            } while (AtletaInscricao::where('codigo', $codigo)->exists());

            $data = now();

            $dadosInscricao = [
                'nome' => $request->input('nome'),
                'campeonato_id' => $request->input('campeonato_id'),
                'codigo' => $codigo,
                'atleta_id' => $Atleta->id,
                'data_nascimento' => $request->input('data_nascimento'),
                'cpf' => $request->input('cpf'),
                'email' => $request->input('email'),
                'sexo' => $request->input('sexo'),
                'equipe' => $request->input('equipe'),
                'faixa' => $request->input('faixa'),
                'peso' => $request->input('peso'),
                'data_inscricao' => $data,
                'senha' => $dadosAtleta['password'],
            ];

            $Inscricao = new AtletaInscricao($dadosInscricao);
            $Inscricao->save();

            $admins = User::all();

            foreach($admins as $admin) {
                $campeonato = Campeonato::find($id);
                $titulo = $campeonato->titulo;
                $nomeAdmin = $admin->name;
                $nomeAtleta = $request->input('nome');
                $email = $admin->email;
                Mail::to($email)->send(new NovaInscricao($nomeAdmin, $titulo, $nomeAtleta ));
            }

            return redirect()->route('home.torneios')->with('sucess', 'Inscrição realizada com sucesso.');

        } else {

            foreach ($resultados as $resultado => $value) {

                if($value == $cpf) {

                    return redirect()->route('home.torneios')->with('sucess', 'Competidor já cadastrado!');

                } else {

                    if(Atleta::where('cpf', $cpf)->first()) {
                        $Atleta = Atleta::where('cpf', $cpf)->first();
                        $dadosAtleta = [
                            'nome' => $request->input('nome'),
                            'email' => $request->input('email'),
                            'data_nascimento' => $request->input('data_nascimento'),
                        ];

                        if ($request->filled('password')) {
                            $dadosAtleta['password'] = Hash::make($request->input('password'));
                        }

                        $Atleta->update($dadosAtleta);
                    } else {
                        $dadosAtleta = [
                            'nome' => $request->input('nome'),
                            'cpf' => $request->input('cpf'),
                            'data_nascimento' => $request->input('data_nascimento'),
                            'sexo' => $request->input('sexo'),
                            'email' => $request->input('email'),
                        ];

                        if ($request->filled('password')) {
                            $dadosAtleta['password'] = Hash::make($request->input('password'));
                        }

                        $Atleta = new Atleta($dadosAtleta);
                        $Atleta->save();

                    }

                    do {
                        $codigo = rand(100000, 999999);
                    } while (AtletaInscricao::where('codigo', $codigo)->exists());

                    $data = now();

                    $dadosInscricao = [
                        'nome' => $request->input('nome'),
                        'campeonato_id' => $request->input('campeonato_id'),
                        'codigo' => $codigo,
                        'atleta_id' => $Atleta->id,
                        'data_nascimento' => $request->input('data_nascimento'),
                        'cpf' => $request->input('cpf'),
                        'email' => $request->input('email'),
                        'sexo' => $request->input('sexo'),
                        'equipe' => $request->input('equipe'),
                        'faixa' => $request->input('faixa'),
                        'peso' => $request->input('peso'),
                        'data_inscricao' => $data,
                        'senha' => $dadosAtleta['password'],
                    ];

                    $Inscricao = new AtletaInscricao($dadosInscricao);
                    $Inscricao->save();

                    $admins = User::all();

                    foreach($admins as $admin) {
                        $campeonato = Campeonato::find($id);
                        $titulo = $campeonato->titulo;
                        $nomeAdmin = $admin->name;
                        $nomeAtleta = $request->input('nome');
                        $email = $admin->email;
                        Mail::to($email)->send(new NovaInscricao($nomeAdmin, $titulo, $nomeAtleta ));
                    }

                    return redirect()->route('home.torneios')->with('sucess', 'Inscrição realizada com sucesso.');

                }
            }

        }
    }

}
