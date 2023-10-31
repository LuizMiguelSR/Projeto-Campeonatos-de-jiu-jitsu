<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campeonato;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class GerenciarCampeonatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campeonatos = Campeonato::all();
        return view('administrativo.painelCampeonatos', compact('campeonatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('administrativo.cadastrarCampeonato');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'titulo' => 'required|string',
            'codigo' => 'required|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'data_realizacao' => 'required|date',
            'sobre_evento' => 'required|string',
            'ginasio' => 'required|string',
            'informacoes_gerais' => 'required|string',
            'entrada_publico' => 'nullable|string',
            'tipo' => 'required|in:Kimono,No-Gi',
            'fase' => 'required|in:incricao,chaveamento,resultado',
            'status' => 'required|in:Ativo,Inativo',
        ];

        $mensagens = [
            // Mensagens personalizadas de validação podem ser adicionadas aqui, se necessário.
        ];

        $validador = Validator::make($request->all(), $regras, $mensagens);

        if ($validador->fails()) {
            return redirect('/gerenciar_campeonatos')
                        ->withErrors($validador)
                        ->withInput();
        }

        $imagem = $request->file('imagem');
        $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
        $imagem->move(public_path('images'), $nomeImagem);

        // Crie um novo array associativo com todos os dados do request
        $dados = [
            'titulo' => $request->input('titulo'),
            'codigo' => $request->input('codigo'),
            'imagem' => $nomeImagem,
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'data_realizacao' => $request->input('data_realizacao'),
            'sobre_evento' => $request->input('sobre_evento'),
            'ginasio' => $request->input('ginasio'),
            'informacoes_gerais' => $request->input('informacoes_gerais'),
            'entrada_publico' => $request->input('entrada_publico'),
            'tipo' => $request->input('tipo'),
            'fase' => $request->input('fase'),
            'status' => $request->input('status'),
            // Adicione outros campos conforme necessário
        ];

        // Salve o nome da imagem na sessão para uso posterior
        $request->session()->put('nomeImagem', $nomeImagem);

        // Agora, você pode usar a variável $dados conforme necessário

        return view('administrativo.cadastrarCampeonatoCrop', compact('dados'));
    }

    /**
     * Display the specified resource.
     */
    public function crop(Request $request)
    {
        $regras = [
            'titulo' => 'required|string',
            'codigo' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'data_realizacao' => 'required|date',
            'sobre_evento' => 'required|string',
            'ginasio' => 'required|string',
            'informacoes_gerais' => 'required|string',
            'entrada_publico' => 'nullable|string',
            'tipo' => 'required|in:Kimono,No-Gi',
            'fase' => 'required|in:incricao,chaveamento,resultado',
            'status' => 'required|in:Ativo,Inativo',
        ];

        $mensagens = [
            // Mensagens personalizadas de validação podem ser adicionadas aqui, se necessário.
        ];

        $validador = Validator::make($request->all(), $regras, $mensagens);

        if ($validador->fails()) {
            dd($validador);
            return redirect('/gerenciar_campeonatos')
                        ->withErrors($validador)
                        ->withInput();
        }

        $nomeImagem = $request->session()->get('nomeImagem');
        $x = $request->input('x');
        $y = $request->input('y');
        $w = $request->input('w');
        $h = $request->input('h');

        // Certifique-se de que o caminho da imagem está correto
        $caminhoCompleto = public_path('images/' . $nomeImagem);

        // Recorte da imagem usando Intervention Image
        $imagem = Image::make($caminhoCompleto)
        ->crop($w, $h, $x, $y)
        ->save(public_path('images/cropped_' . $nomeImagem)); // Salvando imagem cortada

        // Armazenar o caminho da imagem cortada no banco de dados
        $caminhoImagemCortada = 'images/cropped_' . $nomeImagem;

        // Limpar a sessão
        $request->session()->forget('nomeImagem');

        // Crie uma nova instância do modelo Campeonato
        $campeonato = new Campeonato;

        $campeonato->titulo = $request->input('titulo');
        $campeonato->codigo = $request->input('codigo');
        $campeonato->imagem = $caminhoImagemCortada;
        $campeonato->cidade = $request->input('cidade');
        $campeonato->estado = $request->input('estado');
        $campeonato->data_realizacao = $request->input('data_realizacao');
        $campeonato->sobre_evento = $request->input('sobre_evento');
        $campeonato->ginasio = $request->input('ginasio');
        $campeonato->informacoes_gerais = $request->input('informacoes_gerais');
        $campeonato->entrada_publico = $request->input('entrada_publico');
        $campeonato->tipo = $request->input('tipo');
        $campeonato->fase = $request->input('fase');
        $campeonato->status = $request->input('status');

        // Salva os dados no banco de dados
        $campeonato->save();

        return redirect()->route('gerenciar_campeonatos.index')->with('sucess', 'Campeonato cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
